<?php

namespace App\Http\Controllers;

use App\Category;
use App\Advent;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Language;
class RedactorController extends Controller
{
    public function getRed()
    {
        $categories = Category::get();
        $languages = Language::get();
        $col = Advent::count();
        $set = Advent::where('Advents.status', '=', 1)->count();
        $runtime = Advent::where('Advents.status', '=', 2)->count();
        $completed = Advent::where('Advents.status', '=', 3)->count();
        $completed_time= Advent::where('Advents.date_finish', '>',Carbon::now())->count();
        return view('redactor', ['col' => $col,'set' => $set,  'runtime' =>  $runtime, 'completed' =>  $completed,'completed_time' => $completed_time]);
    }


    public function data()
    {
       return  $Data = Advent:: leftJoin('categories', 'Advents.type_category', '=', 'categories.id')
            ->leftJoin('languages as one', 'Advents.language', '=', 'one.id')
            ->leftJoin('languages as two', 'Advents.language_translation', '=', 'two.id')
            ->leftJoin('users', 'Advents.user', '=', 'users.id')
            ->select('Advents.id  as  id', 'Advents.img as img', 'Advents.ad as ad', 'Advents.complexity as complexity',
                'one.language  as  language', 'two.language  as  translation', 'categories.category as category', 'Advents.date_start as date_start',
                'Advents.date_finish as date_finish', 'users.name as  user')
           ->orderby('Advents.id', 'desc');
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
                $Data= $this->data()->where('Advents.status', '=', 1)
                ->get();
                return view('categorys.SelectForUpdate', [ 'languages' => $languages, 'categories' => $categories,'Data' => $Data]);
        }
    public function get_run()
    {
        $categories = Category::get();
        $languages = Language::get();
        $Data= $this->data()->where('Advents.status', '=', 2)
            ->get();
        return view('categorys.SelectForUpdate', [ 'languages' => $languages, 'categories' => $categories,'Data' => $Data]);
    }
    public function get_comp()
    {
        $categories = Category::get();
        $languages = Language::get();
        $Data= $this->data()->where('Advents.status', '=', 3)
            ->get();
        return view('categorys.SelectForUpdate', [ 'languages' => $languages, 'categories' => $categories,'Data' => $Data]);
    }
    public function get_comp_time()
    {
        $categories = Category::get();
        $languages = Language::get();
        $Data= $this->data()->where('Advents.date_finish', '>',Carbon::now())
            ->get();
        return view('categorys.SelectForUpdate', [ 'languages' => $languages, 'categories' => $categories,'Data' => $Data]);
    }

}

