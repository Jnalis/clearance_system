<?php

namespace App\Http\Controllers\Registrar;

use App\Http\Controllers\Controller;
use App\Models\Clearancetype;
use App\Models\Student;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){

        $clearance = Clearancetype::all();

        $students = Student::all();

        return view('pages.registrar.index', [
            'clearance' => $clearance,
            'students' => $students
        ]);
    }
}
