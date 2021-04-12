<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Departments;
use App\Models\Staff;
use App\Models\Usertypes;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $arr['staff'] = Staff::all();
        $arrD['dept'] = Departments::all();
        $arrU['user_type'] = Usertypes::all();
        return view('pages.admin.index')->with($arr)->with($arrD)->with($arrU);
    }
}
