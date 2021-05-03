<?php

namespace App\Http\Controllers\HOD;

use App\Http\Controllers\Controller;
use App\Models\AllocatedResource;
use App\Models\IssuedResource;
use Illuminate\Http\Request;

class ReturnLostController extends Controller
{
    public function returnResource($id){
        
        AllocatedResource::where('resource_id', '=', $id)
            ->update(['status' => 'NOT ISSUED']);
        IssuedResource::where('resource_id', '=', $id)->delete();

        return redirect(route('hod.allocatedResource.index'))->with('success', 'Resource Returned Successfull');

    }
}
