<?php

namespace App\Http\Controllers\Demo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DemoController extends Controller
{
    //
    public function index(){
       return view('about');
    } //end of index function

    
    public function contactMethod(){
        return view('contact');
     } //end of index contactMethod
}
