<?php

namespace App\Http\Controllers\Dean;

use App\Http\Controllers\Controller;
use App\Models\IssuedResource;
use App\Models\Resource;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResourceIssuedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staffId = Auth::user()->user_id;

        $arr['issued_r'] = Student::select([
           'resources.id',
            'students.fullname',
            'students.student_id',
            'issued_resources.resource_issued',
            'issued_resources.resource_issued_to',
            'issued_resources.issued_by',
            'issued_resources.created_at',
            'issued_resources.date_to_return',
            'resources.resource_type',
            'resources.resource_amount',
            ])->join('issued_resources', 'issued_resources.resource_issued_to', '=', 'students.student_id')
             ->join('resources', 'resources.id', '=', 'issued_resources.resource_issued')
             ->where('issued_resources.issued_by', '=', $staffId)
             ->where('resources.issued', '=', 'YES')->get();

        return view('pages.dean.view_issued_resource')->with($arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
