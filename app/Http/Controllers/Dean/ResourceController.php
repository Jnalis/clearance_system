<?php

namespace App\Http\Controllers\Dean;

use App\Http\Controllers\Controller;
use App\Models\AllocatedResource;
use App\Models\IssuedResource;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $arr['allocated_r'] = AllocatedResource::join('resources', 'resources.id', '=', 'allocated_resources.resource_id')->get();


        return view('pages.dean.view_allocated_resource')->with($arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.dean.issue_resource');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, IssuedResource $issuedResource)
    {
        // checking if you gett all the data from the form
        //return $request->input();

        $request->validate([
            'student_name' => 'required',
            'student_reg_no' => 'required',
            'resource_type' => 'required',
            'date_to_return' => 'required',
        ]);

        //if form validated successfuly then add new usertype
        
        $issuedResource->student_name = $request->student_name;
        $issuedResource->student_reg_no = $request->student_reg_no;
        $issuedResource->resource_type = $request->resource_type;
        $issuedResource->date_to_return = $request->date_to_return;

        $query = $issuedResource->save(); //save your data to the model

        if ($query) {
            return redirect(route('dean.issuedResource.index'));
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
