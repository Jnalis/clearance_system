<?php

namespace App\Http\Controllers\Dean;

use App\Http\Controllers\Controller;
use App\Models\IssuedResource;
use App\Models\LostResource;
use App\Models\Resource;
use Illuminate\Http\Request;

class ReturnLostController extends Controller
{
    //
    public function returnResource($id)
    {

        // return $id;

        Resource::where('id', '=', $id)->update(['issued' => 'NO']);
        IssuedResource::where('resource_issued', '=', $id)->delete();

        return redirect(route('dean.resource.index'))->with('success', 'Resource Returned Successfully');
    }



    public function resourceLost($id, LostResource $lostResource)
    {

        // return $id;

        //? i insert the lost resource in lost_resource table
        $info = IssuedResource::where('resource_issued', '=', $id)->first();
        $resourceID = $info->resource_issued;
        $studentID = $info->resource_issued_to;
        $added_by = auth()->user()->id;

        $lostResource->lost_resource = $resourceID;
        $lostResource->lost_by = $studentID;
        $lostResource->added_by = $added_by;

        $lostResource->save();

        /** 
         * ! here i update the available column in resource table to NO
         * ! also i update the allocated_to column in resource table to NULL
         * ! since the resource has been lost
         * ! i also delete the lost resource from issued_resource table
         */
        Resource::where('id', '=', $id)->update(['allocated_to' => NULL, 'available' => 'NO']);
        IssuedResource::where('resource_issued', '=', $id)->delete();


        return redirect(route('dean.lostResource.index'))->with('danger', 'Resource Recorded as Lost Item');
    }
}
