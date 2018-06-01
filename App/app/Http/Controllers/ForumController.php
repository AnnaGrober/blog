<?php

namespace App\Http\Controllers;

use App\Photo_for_forum;
use Illuminate\Http\Request;
use App\forum;
use App\subject;
use App\users;
use Illuminate\Mail\Message;
use Intervention\Image\Facades\Image as ImageInt;


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
            ->leftJoin('photo_for_forums', 'photo_for_forums.message', '=', 'forums.id')
            ->where ('subjects.id', $id)
            ->select ('users.name  as  user', 'users.id as user_id', 'forums.message as message', 'forums.id as id',
                'photo_for_forums.img as img')
            ->orderby('forums.id')
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
            'message' => request('mes') ,
            'user' =>request('user')
        ]);
        return back();
    }

    public function store_mes(Request $request){

        forum::insert([
            'subject' => request('subj_id'),
            'message' =>request('message_for_forum'),
            'user' =>request('user'),
        ]);
       if (request('file') != NULL) {
           $path = public_path() . '\upload';
           $file = $request->file('file');

           foreach ($file as $f) {
               $filename = str_random(20) . '.' . $f->getClientOriginalExtension() ?: 'png' || 'jpg' ;
               $img = ImageInt::make($f);
               $img->resize(100, 100)->save($path . '/' . $filename);
               // dd($filename, request('file'));
           }


           $mes = forum:: where('message', request('message_for_forum'))->value('id');
           Photo_for_forum::insert([
               'img' => $filename,
               'message' => $mes
           ]);
       }
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

public function del_subj($id){
       subject::where ('id', $id)
           -> delete();
       forum::where('subject', $id)
           ->delete();
    return back();
}

public function del_mes($id){
    forum::where('id', $id)
        ->delete();
    return back();
}



}