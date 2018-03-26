<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use DB;
use App\Categorypage;
class categoryController extends Controller
{

    public function getCategory() {
        $data=DB::table('categorypages')
            ->leftJoin('categories','categorypages.type_category','=','categories.id')
            ->leftJoin('languages','categorypages.language','=','languages.id')
            ->select('categorypages.img as img','categorypages.ad as ad','categorypages.complexity as complexity',
                'languages.language  as  language','categories.category as category','categorypages.id  as  id')
            ->orderBy('categorypages.id')
            ->get();

        return view('category',['data'=>$data]);
    }
    public function getDetails($id) {
        $data=DB::table('categorypages')
            ->leftJoin('categories','categorypages.type_category','=','categories.id')
            ->leftJoin('languages','categorypages.language','=','languages.id')
            ->select('categorypages.img as img','categorypages.ad as ad','categorypages.complexity as complexity',
                'categorypages.categoryPages as categoryPages',
                'languages.language  as  language','categories.category as category')
            ->where('categorypages.id', $id)->get();
        return view('categorys.details', ['data'=>$data]);
    }
    public function create()
    {
        return view('categorys.create');
    }
}
