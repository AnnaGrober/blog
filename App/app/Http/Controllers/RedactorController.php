<?php

namespace App\Http\Controllers;

use App\Category;
use App\Categorypage;
use Illuminate\Http\Request;
use Carbon\Carbon;

class RedactorController extends Controller
{
    public function getRed()
    {
        $col = Categorypage::count();
        $runtime = Categorypage::where('categoryPages.status', '=', 1)->count();
        $completed= Categorypage::where('categoryPages.date_finish', '>',Carbon::now())->count();
        $Notcompleted= Categorypage::where('categoryPages.date_finish', '<=',Carbon::now())->count();
        return view('redactor', ['col' => $col, 'runtime' =>  $runtime, 'completed' =>  $completed,'Notcompleted' =>  $Notcompleted]);
    }
}
