<?php

namespace App\Http\Controllers;

use App\Models\Departments;
use App\Models\Program;
use App\Models\Student;
use Illuminate\Http\Request;

class MainController extends Controller
{
    //
    public function index(){
        return view('auth.login');
    }

    public function student(){

        $arrP['program'] = Program::all();
        $arr['depts'] = Departments::all();
        return view('auth.student_register')->with($arr)->with($arrP);
    }
}
