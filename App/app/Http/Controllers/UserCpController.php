<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Category;
use App\Feedback;

use App\Advent;
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
        return  $Data = Advent:: leftJoin('categories', 'Advents.type_category', '=', 'categories.id')
            ->leftJoin('languages as one', 'Advents.language', '=', 'one.id')
            ->leftJoin('languages as two', 'Advents.language_translation', '=', 'two.id')
            ->leftJoin('users', 'Advents.user', '=', 'users.id')
        ->leftJoin('feedbacks', 'Advents.id', '=', 'feedbacks.application');
    }
    public function data_select()
    {
        return   $Data=  $this->data()
            ->select('Advents.img as img','Advents.ad as ad','Advents.complexity as complexity',
                'Advents.great_announcement as Advents','Advents.price as price',
                'Advents.link as link',    'Advents.great_announcement as pages',   'one.language  as  language','Advents.status as status',
                'two.language  as  translation','categories.category as category','users.name  as  user',
                'Advents.date_start as start',  'Advents.date_finish as finish' , 'Advents.id as id');
    }
    public function get_info()
    {
        $id = Auth::id();
        $user = User::find($id);
        $categories = Category::get();
        $languages = Language::get();
        $Data=  $this->data_select()
            ->where('Advents.user', $id)
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
        //$feedbacks= Feedback::get();
        $Data=  $this->data_select()
            ->where('Advents.user', $id)
            ->get();
        $Data3 = Feedback::leftJoin('Users', 'Feedbacks.user', '=', 'Users.id')
                ->LeftJoin('Advents', 'Feedbacks.application', '=', 'Advents.id')
        ->select('Users.name as name', 'Advents.id as id')->get();
        $Data2=  $this->data_select()
            ->where('feedbacks.user', $id)
            ->get();
        return view('categorys.project',compact('user', 'Data', 'categories', 'languages', 'Data2', 'Data3'));
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