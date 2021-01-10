<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function home(){
        return view('home');
    }

    public function project(){
        return view('project');
    }

    public function employee(){
        return view('employee');
    }
}
