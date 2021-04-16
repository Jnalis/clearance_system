<?php

namespace App\Http\Controllers\HOD;

use App\Http\Controllers\Controller;
use App\Models\AllocatedResource;
use App\Models\IssuedResource;
use App\Models\LostResource;
use App\Models\Program;
use App\Models\Student;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $arrS['student'] = Student::all();
        $arrR['resource'] = AllocatedResource::all();
        $arrI['issue'] = IssuedResource::all();
        $arrL['lost'] = LostResource::all();
        $arrP['program'] = Program::all();
        return view('pages.hod.index')->with($arrS)->with($arrR)->with($arrI)->with($arrL)->with($arrP);
    }
}
