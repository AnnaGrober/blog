<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\forum;
use App\subject;
use App\users;
use Illuminate\Mail\Message;


class ForumController extends Controller
{
    public function getSubject()
    {
        $subject = subject::
            orderby('id', 'desc')->paginate(10);
        $forums= forum:: leftJoin('subjects', 'forums.subject', '=', 'subjects.id')
            ->get();
        return view('forum',  ['subject' => $subject, 'forums'=> $forums]);
    }

    public function create(){
        return view('forum.create_forum');
    }
    public  function forum_open_create(){
        return view('forum.create_forum_message');
    }
    public function forum_open($id){
        $subject = subject::where ('id', $id)->value('subject_name');
        $subject_id = subject::where ('id', $id)->value('id');
        $forums= forum:: leftJoin('subjects', 'forums.subject', '=', 'subjects.id')
            ->leftJoin('users', 'users.id', '=', 'forums.user')
            ->where ('subjects.id', $id)
            ->select ('users.name  as  user', 'users.id as user_id', 'forums.message as message', 'forums.id as id')
            ->paginate(10);
        return view('forum.forumOpen',  ['subject' => $subject, 'forums'=> $forums,'subject_id' => $subject_id] );
    }
    public function store(){
        subject::insert([
            'subject_name' => request('subj'),
        ]);
       $subj_id= subject:: where('subject_name', request('subj'))->value('id');

        forum::insert([
            'subject' => $subj_id,
            'message' =>request('mes'),
            'user' =>request('user')
        ]);
        return back();
    }

    public function store_mes(){


        forum::insert([
            'subject' => request('subj_id'),
            'message' =>request('message_for_forum'),
            'user' =>request('user')
        ]);
        return back();
    }


    public function update_save() {

       $subj= request('subj');
       $mes=request('mes');
        $subj_id =request ('subj_id');
        $mes_id = Forum:: where ('subject', $subj_id)-> value('id');
//dd($subj,$mes, $subj_id, $mes_id);
            Subject::where('id', $subj_id)
                ->update([
                    'subject_name' => $subj]);
            Forum::where('id', $mes_id)
                ->update([
                    'message' => $mes]);
        return redirect('/forum');
    }


public function update_save_mes($id) {
    $mes_id = request('mes_id_hidden');
    $mes=request('upd_message_for_forum');

    //dd($mes, $mes_id);
    Forum::where('id', $mes_id)
        ->update([
            'message' => $mes]);
    return back();
}
}