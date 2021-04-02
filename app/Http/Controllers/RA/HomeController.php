<?php

namespace App\Http\Controllers\RA;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('pages.ra.index');
    } 
}
