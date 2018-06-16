<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Advent;
use App\Category;
use App\Language;

class DemoController extends Controller
{
    public function liveSearch(Request $request)
    {



            $str = $request->str;

            $posts = Advent::where('ad', 'LIKE', '%' . $str . '%')
                ->get();

        return view('layouts/livesearchajax')->withPosts($posts);

    }

}