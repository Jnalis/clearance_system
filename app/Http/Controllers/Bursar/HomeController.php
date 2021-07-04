<?php

namespace App\Http\Controllers\Bursar;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){

        $students = Student::all();
        return view('pages.bursar.index', ['students' => $students]);
    }
}
