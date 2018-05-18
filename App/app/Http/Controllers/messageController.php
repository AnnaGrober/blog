<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class messageController extends Controller
{
    public function get_messages(){
        return view('messages');
    }
}