<?php

namespace App\Http\Controllers\Registrar;

use App\Http\Controllers\Controller;
use App\Models\Clearancetype;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){

        $arr['clearance'] = Clearancetype::all();

        return view('pages.registrar.index')->with($arr);
    }
}
