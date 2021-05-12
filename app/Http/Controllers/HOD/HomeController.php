<?php

namespace App\Http\Controllers\HOD;

use App\Http\Controllers\Controller;
use App\Models\AllocatedResource;
use App\Models\IssuedResource;
use App\Models\LostResource;
use App\Models\Program;
use App\Models\Resource;
use App\Models\Staff;
use App\Models\Student;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $arrS['student'] = Student::all();
        $arrR['resource'] = Resource::all();

        $d = Staff::firstWhere('id', '=', auth()->user()->id)->dept_code;

        $arrP['program'] = Program::where('dept_code', '=', $d)->get();

        
        return view('pages.hod.index')->with($arrS)->with($arrR)->with($arrP);
    }
}
