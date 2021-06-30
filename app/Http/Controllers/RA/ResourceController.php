<?php

namespace App\Http\Controllers\RA;

use App\Http\Controllers\Controller;
use App\Models\Resource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arr['resource'] = Resource::all();
        return view('pages.ra.view_resource')->with($arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.ra.add_resource');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Resource $resource)
    {
        // checking if you get all the data from the form
        // return $request->input();

        $request->validate([
            'resource_name' => 'required',
            'resource_amount' => 'required',
        ]);

        //if form validated successfully then add new usertype
        
        $resource->resource_type = $request->resource_name;
        $resource->resource_amount = $request->resource_amount;
        $resource->added_by = Auth::user()->user_id;

        $query = $resource->save(); //save your data to the model

        if ($query) {
            return redirect(route('ra.resource.index'))->with('success', 'Resource added successfully');
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
    public function edit(Resource $resource)
    {
        //
        $arr['resource'] = $resource;
        return view('pages.ra.edit_resource')->with($arr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Resource $resource)
    {
        // checking if you get all the data from the form
        // return $request->input();

        $request->validate([
            'resource_name' => 'required',
            'resource_amount' => 'required',
        ]);

        //if form validated successfully then add new usertype
        
        $resource->resource_type = $request->resource_name;
        $resource->resource_amount = $request->resource_amount;
        $resource->added_by = Auth::user()->user_id;

        $query = $resource->save(); //save your data to the model

        if ($query) {
            return redirect(route('ra.resource.index'))->with('success', 'Resource updated successfully');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
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
        Resource::destroy($id);
        return redirect(route('ra.resource.index'))->with('success', 'Resource deleted successfully');

    }
}
