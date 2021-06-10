<?php

namespace App\Http\Controllers\HOD;

use App\Http\Controllers\Controller;
use App\Models\AllocatedResource;
use App\Models\IssuedResource;
use App\Models\Resource;
use Illuminate\Http\Request;

class ReturnLostController extends Controller
{
    public function returnResource($id)
    {

        // return $id;

        Resource::where('id', '=', $id)->update(['issued' => 'NO']);

        return redirect(route('hod.allocatedResource.index'))->with('success', 'Resource Returned Successfully');
    }
    public function resourceLost($id)
    {

       // return $id;
        return Resource::select('id')->where('id', '=', $id)->get('id');

        return redirect(route('hod.allocatedResource.index'))->with('success', 'Resource Returned Successfully');
    }


}
