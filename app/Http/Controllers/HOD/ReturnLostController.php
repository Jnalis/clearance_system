<?php

namespace App\Http\Controllers\HOD;

use App\Http\Controllers\Controller;
use App\Models\AllocatedResource;
use App\Models\IssuedResource;
use App\Models\LostResource;
use App\Models\Resource;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReturnLostController extends Controller
{
    public function returnResource($id)
    {

        // return $id;

        Resource::where('id', '=', $id)->update(['issued' => 'NO']);
        IssuedResource::where('resource_issued', '=', $id)->delete();

        return redirect(route('hod.allocatedResource.index'))->with('success', 'Resource Returned Successfully');
    }
    public function resourceLost($id, LostResource $lostResource)
    {

        // return $id;

        //? i insert the lost resource in lost_resource table
        $info = IssuedResource::where('resource_issued', '=', $id)->first();
        $resourceID = $info->resource_issued;
        $studentID = $info->resource_issued_to;
        $added_by = Auth::user()->user_id;

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
        Resource::where('id', '=', $id)
            ->update([
                'allocated_to' => NULL,
                 'available' => 'NO'
                ]);
                
        IssuedResource::where('resource_issued', '=', $id)->delete();


        return redirect(route('hod.lostResource.index'))->with('danger', 'Resource Recorded as Lost Item');
    }
}
