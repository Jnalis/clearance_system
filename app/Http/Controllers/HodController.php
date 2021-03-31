<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HodController extends Controller
{
    //
    public function dashboard()
    {
        return view('pages.hod.index');
    }

    
    public function view_student()
    {
        return view('pages.hod.view_student');
    }


    public function view_allocated_resource()
    {
        return view('pages.hod.view_allocated_resource');
    }


    public function issue_resource()
    {
        return view('pages.hod.issue_resource');
    }


    public function view_issued_resource()
    {
        return view('pages.hod.view_issued_resource');
    }


    public function view_returned_resource()
    {
        return view('pages.hod.view_returned_resource');
    }


    public function view_lost_resource()
    {
        return view('pages.hod.view_lost_resource');
    }
}
