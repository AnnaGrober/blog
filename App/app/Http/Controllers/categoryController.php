<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use DB;
use App\Categorypage;
class categoryController extends Controller
{

    public function getCategory() {
        $data=DB::table('categoryPages')
            ->leftJoin('categories','categoryPages.type_category','=','categories.id')
            ->leftJoin('languages as one','categoryPages.language','=','one.id')
            ->leftJoin('languages as two','categoryPages.language_translation','=','two.id')
            ->leftJoin('users','categoryPages.user','=','users.id')
            ->select('categoryPages.id  as  id','categoryPages.img as img','categoryPages.ad as ad','categoryPages.complexity as complexity',
                'one.language  as  language','two.language  as  translation','categories.category as category',
                'users.name as  user')
            ->get();

        return view('category',['data'=>$data]);
    }


    public function getDetails($id) {
        $data=DB::table('categorypages')
            ->leftJoin('categories','categorypages.type_category','=','categories.id')
            ->leftJoin('languages as one','categoryPages.language','=','one.id')
            ->leftJoin('languages as two','categoryPages.language_translation','=','two.id')
            ->leftJoin('users','categorypages.user','=','users.id')
            ->select('categorypages.img as img','categorypages.ad as ad','categorypages.complexity as complexity',
                'categorypages.categoryPages as categoryPages',
                'one.language  as  language','two.language  as  translation','categories.category as category','users.name  as  user')
            ->where('categorypages.id', $id)->get();
        return view('categorys.details', ['data'=>$data]);
    }
    public function create()
    {
        return view('create');
    }
}
