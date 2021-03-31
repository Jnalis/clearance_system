<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResourceAllocatorController extends Controller
{
    //
    public function dashboard()
    {
        return view('pages.ra.index');
    }


    public function add_new_resource()
    {
        return view('pages.ra.add_resource');
    }


    public function allocate_resource()
    {
        return view('pages.ra.allocate_resource');
    }


    public function view_custodians()
    {
        return view('pages.ra.view_custodians');
    }


    public function view_department()
    {
        return view('pages.ra.view_department');
    }


    public function view_lost_resource()
    {
        return view('pages.ra.view_lost_resource');
    }


    public function view_resource()
    {
        return view('pages.ra.view_resource');
    }
}
