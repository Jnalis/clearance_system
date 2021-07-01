<?php

namespace App\Http\Controllers\RA;

use App\Http\Controllers\Controller;
use App\Models\AllocatedResource;
use App\Models\Resource;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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


        $resources = Staff::join('resources', 'resources.allocated_to', '=', 'staff.username')->where('resources.allocated', '=', 'YES')->get();

        return view('pages.ra.view_allocated_resource', ['resources' => $resources]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arr['resource'] = Resource::where('allocated', '=', 'NO')->get();

        $arrC['custodian'] = Staff::where('usertype', '=', 'HOD')->orWhere('usertype', '=', 'Dean')->get();
        //return $arrC;
        return view('pages.ra.allocate_resource')->with($arr)->with($arrC);
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
            'resource_type' => 'required',
            'select_custodian' => 'required',
        ]);

        $staffId = Staff::select('username')
            ->firstWhere('fullname', '=', $request->select_custodian)->username;

        $name = $request->resource_type;

        $id = Resource::select('id')
            ->firstWhere('resource_type', '=', $name)->id;

        $query = Resource::where('id', '=', $id)
            ->update([
                'allocated_by' => Auth::user()->user_id,
                'allocated_to' => $staffId,
                'allocated' => 'YES',
            ]);


        if ($query) {
            return redirect(route('ra.allocatedResource.index'))->with('success', 'Resource allocated successfully');
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
        //getting resource id from allocated resource table
        //$id_to_update = Resource::select('id')->firstWhere('id', '=', $id)->id;

        // return $id;

        Resource::where('id', '=', $id)->update(['allocated' => 'NO']);

        return redirect(route('ra.allocatedResource.index'))->with('success', 'Resource removed from custodian successfully');
    }
}
