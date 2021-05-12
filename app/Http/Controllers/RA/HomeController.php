<?php

namespace App\Http\Controllers\RA;

use App\Http\Controllers\Controller;
use App\Models\AllocatedResource;
use App\Models\LostResource;
use App\Models\Resource;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $arr['resource'] = Resource::all();
        return view('pages.ra.index')->with($arr);
    } 
}
