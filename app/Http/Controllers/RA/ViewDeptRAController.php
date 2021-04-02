<?php

namespace App\Http\Controllers\RA;

use App\Http\Controllers\Controller;
use App\Models\AllocatedResource;
use App\Models\Departments;
use Illuminate\Http\Request;

class ViewDeptRAController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arr['department'] = Departments::all();
        return view('pages.ra.view_department')->with($arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**=======================================================================================
     * Note this function is used to display the form for allocate resources allthough its not
     * the right place to be it should be in another controller but just this controller has a
     * create function i decided to use this
    */
    public function create()
    {
        return view('pages.ra.allocate_resource');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, AllocatedResource $allocatedResource)
    {
        // checking if you gett all the data from the form
         //return $request->input();

        $request->validate([
            'resource_type' => 'required',
            'select_custodian' => 'required',
        ]);

        //if form validated successfuly then alocate the resource
        
        $allocatedResource->resource_type = $request->resource_type;
        $allocatedResource->resource_amount = $request->resource_amount;

        $query = $allocatedResource->save(); //save your data to the model

        if ($query) {
            return redirect(route('ra.resource.index'));
        } else {
            return back()->with('fail', 'Something went wrong');
        }
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
