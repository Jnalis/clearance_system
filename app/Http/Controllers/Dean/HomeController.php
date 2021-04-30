<?php

namespace App\Http\Controllers\Dean;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){
        $arr['student'] = Student::all();
        return view('pages.dean.index')->with($arr);
    }
}
