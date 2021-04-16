<?php

namespace App\Http\Controllers;

use App\Models\Departments;
use Illuminate\Http\Request;

class MainController extends Controller
{
    //
    public function index(){
        return view('auth.login');
    }

    public function student(){

        $arr['depts'] = Departments::all();
        return view('auth.student_register')->with($arr);
    }
}
