<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Category;
use App\Feedback;

use App\Categorypage;
use App\Language;
use App\TestUsers;
class UserCpController extends Controller
{
    public function reg()
    {
        return view('reg');
    }
    //
    public function data()
    {
        return  $Data = Categorypage:: leftJoin('categories', 'categoryPages.type_category', '=', 'categories.id')
            ->leftJoin('languages as one', 'categoryPages.language', '=', 'one.id')
            ->leftJoin('languages as two', 'categoryPages.language_translation', '=', 'two.id')
            ->leftJoin('users', 'categoryPages.user', '=', 'users.id')
        ->leftJoin('feedbacks', 'categoryPages.id', '=', 'feedbacks.application');
    }
    public function data_select()
    {
        return   $Data=  $this->data()
            ->select('categorypages.img as img','categorypages.ad as ad','categorypages.complexity as complexity',
                'categorypages.category_pages as categoryPages','categorypages.price as price',
                'categorypages.link as link',    'categorypages.category_pages as pages',   'one.language  as  language',
                'two.language  as  translation','categories.category as category','users.name  as  user',
                'categorypages.date_start as start',  'categorypages.date_finish as finish' , 'categorypages.id as id');
    }
    public function get_info()
    {
        $id = Auth::id();
        $user = User::find($id);
        $categories = Category::get();
        $languages = Language::get();
        $Data=  $this->data_select()
            ->where('categorypages.user', $id)
            ->get();
        //dd($Data);
       return view('user_cp',compact('user', 'Data', 'categories', 'languages'));
    }
    public function get_project()
    {
        $id = Auth::id();
        $user = User::find($id);
        $categories = Category::get();
        $languages = Language::get();
        $feedbacks= Feedback::get();
        $Data=  $this->data_select()
            ->where('categorypages.user', $id)
            ->get();
        $Data2=  $this->data_select()
            ->where('feedbacks.user', $id)
            ->get();
        return view('categorys.project',compact('user', 'Data', 'categories', 'languages', 'Data2'));
    }




//public function get_info(User $user){
//        //  $users=DB::table('users')->get;
//        return view('user_cp',compact('user'));
//    }
    public function user_store()
    {
//     User::create(
//         request(array('login','email','password'))
////     );
        $user = new User;
        $user->login = request('login');
        $user->email = request('email');
        $user->password = bcrypt(request('password'));
        $user->photo = 'img/grey.jpg';
        $user->save();
        return redirect('/1');
    }
    public function avaUpload(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = User::find(Auth::id())->id . '.' . $request->image->getClientOriginalExtension();
        $request->image->move(public_path('/img'), $imageName);
        $user = User::find(Auth::id());
        $user->photo = $imageName;
        $user->save();
        return redirect('/user_cp');
    }
    public function store_about(Request $request)
    {
        $about='jjjj';
        if ($request->isMethod('post')) {
            $id = $request->id;
            $about = $request->about;
            User::where('id', $id)->update(['about' => $about]);
        }
        return $about;
    }
}