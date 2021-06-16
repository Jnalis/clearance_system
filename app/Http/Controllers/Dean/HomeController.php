<?php

namespace App\Http\Controllers\Dean;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Resource;
use App\Models\Student;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){
        $arr['student'] = Student::all();
        $arrR['resource'] = Resource::all();
        $arrC['comment'] = Comment::all();
        return view('pages.dean.index')->with($arr)->with($arrR)->with($arrC);
    }
}
