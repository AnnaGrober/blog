<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Categorypage;
use App\User;
use Carbon\Carbon;
class AdminController extends Controller
{
//    public function panel(){
//        return view('admin_panel');
//    }
    public function panel(Request $request){
        $user=User::get();
        $categ=Categorypage::get();
        $user_count=$user->count();
        $user_new= User::whereYear('created_at', '=', (Carbon::now())->year)
            ->whereMonth('created_at', '=',(Carbon::now())->month)
            ->count();
        $categ_count=$categ->count();
        $runtime = Categorypage::where('categoryPages.status', '=', 1)->count();
        $completed= Categorypage::where('categoryPages.date_finish', '>',Carbon::now())->count();
        $Notcompleted= Categorypage::where('categoryPages.date_finish', '<=',Carbon::now())->count();
        $finduser=$request->username;
        $data = User::select('users.id as id', 'users.name  as  login', 'users.photo as photo')
            ->where('name', 'like', '%' . $finduser . '%')
            ->get();
        response()->json($data);
        return view('admin_panel',compact('user_count','categ_count','user_new' ,'runtime', 'completed', 'Notcompleted','data'));
    }
    public function block1(Request $request){
        if($request->isMethod('post')){
            $id = $request->id;
            User::where('id', $id)->update(['block'=>1]);
            //return $request->id;
        }
//       $user=User::get();
//        dd($req->input());
//      $id=$req->id;
//      console.log($id);
        //$c= alert ( JSON.stringify( $id ) );
//        $id=$req->input('name');
//        $user1=User::find($id);
//        $block = User:: where('id', request($user1->id))->value($user->id);
        //return $req;
        //return redirect('/admin_panel');
    }
}