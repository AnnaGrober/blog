<?php

namespace App\Http\Controllers;

use App\Category;
use App\Categorypage;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Language;
class RedactorController extends Controller
{
    public function getRed()
    {
        $categories = Category::get();
        $languages = Language::get();
        $col = Categorypage::count();
        $set = Categorypage::where('categoryPages.status', '=', 1)->count();
        $runtime = Categorypage::where('categoryPages.status', '=', 2)->count();
        $completed = Categorypage::where('categoryPages.status', '=', 3)->count();
        $completed_time= Categorypage::where('categoryPages.date_finish', '>',Carbon::now())->count();
        return view('redactor', ['col' => $col,'set' => $set,  'runtime' =>  $runtime, 'completed' =>  $completed,'completed_time' => $completed_time]);
    }


    public function data()
    {
       return  $Data = Categorypage:: leftJoin('categories', 'categoryPages.type_category', '=', 'categories.id')
            ->leftJoin('languages as one', 'categoryPages.language', '=', 'one.id')
            ->leftJoin('languages as two', 'categoryPages.language_translation', '=', 'two.id')
            ->leftJoin('users', 'categoryPages.user', '=', 'users.id')
            ->select('categoryPages.id  as  id', 'categoryPages.img as img', 'categoryPages.ad as ad', 'categoryPages.complexity as complexity',
                'one.language  as  language', 'two.language  as  translation', 'categories.category as category', 'categoryPages.date_start as date_start',
                'categoryPages.date_finish as date_finish', 'users.name as  user')
           ->orderby('categoryPages.id', 'desc');
    }
    public function getAll()
    {
        $categories = Category::get();
        $languages = Language::get();
        $Data=  $this->data()->get();
            return view('categorys.SelectForUpdate', ['languages' => $languages, 'categories' => $categories, 'Data' => $Data]);
    }
        public function get_set()
        {
            $categories = Category::get();
            $languages = Language::get();
                $Data= $this->data()->where('categoryPages.status', '=', 1)
                ->get();
                return view('categorys.SelectForUpdate', [ 'languages' => $languages, 'categories' => $categories,'Data' => $Data]);
        }
    public function get_run()
    {
        $categories = Category::get();
        $languages = Language::get();
        $Data= $this->data()->where('categoryPages.status', '=', 2)
            ->get();
        return view('categorys.SelectForUpdate', [ 'languages' => $languages, 'categories' => $categories,'Data' => $Data]);
    }
    public function get_comp()
    {
        $categories = Category::get();
        $languages = Language::get();
        $Data= $this->data()->where('categoryPages.status', '=', 3)
            ->get();
        return view('categorys.SelectForUpdate', [ 'languages' => $languages, 'categories' => $categories,'Data' => $Data]);
    }
    public function get_comp_time()
    {
        $categories = Category::get();
        $languages = Language::get();
        $Data= $this->data()->where('categoryPages.date_finish', '>',Carbon::now())
            ->get();
        return view('categorys.SelectForUpdate', [ 'languages' => $languages, 'categories' => $categories,'Data' => $Data]);
    }

}

