<?php

namespace App\Http\Controllers\RA;

use App\Http\Controllers\Controller;
use App\Models\AllocatedResource;
use App\Models\Resource;
use App\Models\Staff;
use Illuminate\Http\Request;

class AllocateResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$arr['allocResources'] = AllocatedResource::all();


        $arr['data'] = Resource::join('allocated_resources', 'allocated_resources.resource_id', '=', 'resources.id')->get();

        return view('pages.ra.view_allocated_resource')->with($arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arr['resource'] = Resource::where('allocated', '=', 'NO')->get();

        $arrC['custodian'] = Staff::where('usertype', '=', 'HOD')->get();
        //return $arrC;
        return view('pages.ra.allocate_resource')->with($arr)->with($arrC);
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
        // return $request->input();

        $request->validate([
            'resource_type' => 'required',
            'select_custodian' => 'required',
        ]);

        $name = $request->resource_type;
        $id = Resource::select('id')->firstWhere('resource_type', '=', $name)->id;
        
        $staffId = Staff::select('id')->firstWhere('')

        //if form validated successfuly then alocate the resource
        $allocatedResource->allocated_by = auth()->id();
        $allocatedResource->allocated_to = $request->select_custodian;
        $allocatedResource->resource_id = $id;

        $query = $allocatedResource->save(); //save your data to the model

        
        Resource::where('id', '=', $id)->update(['allocated' => 'YES']);

        if ($query) {
            return redirect(route('ra.resource.index'))->with('success', 'Resource allocated successfull');
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
        //getting resource id from allocated resource table
        $id_to_update = AllocatedResource::select('resource_id')->firstWhere('id', '=', $id)->resource_id;

        AllocatedResource::destroy($id);

        Resource::where('id', '=', $id_to_update)->update(['allocated' => 'NO']);
        
        return redirect(route('ra.allocatedResource.index'))->with('danger', 'Resource removed from custodian successfull');
    }
}
