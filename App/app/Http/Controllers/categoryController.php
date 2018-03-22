<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use DB;
use App\Categorypage;
class categoryController extends Controller
{
     public function getCategory() {
        $categories = Categorypage::all();
        /*$categoriesName = DB::table('categorypages')
             ->join('categories', 'category', '=', 'categories.id')
             ->get();*/
        return view('category', compact('categories'/*,'categoriesName'*/));

    }
    public function getDetails($id) {
        $category = Categorypage::find($id);
        return view('categorys.details', compact('category'));

    }
    public function create()
    {
        return view('categorys.create');
    }
}
