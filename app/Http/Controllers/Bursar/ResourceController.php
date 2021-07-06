<?php

namespace App\Http\Controllers\Bursar;

use App\Http\Controllers\Controller;
use App\Models\LostResource;
use App\Models\Resource;
use App\Models\Student;
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
        $lostResources = Resource::select([
            'lost_resources.id',
            'resources.resource_type',
            'resources.resource_amount',
            'students.fullname',
            'students.student_id',
            'lost_resources.refunded_status',


        ])->join('lost_resources', 'lost_resources.lost_resource', '=', 'resources.id')
            ->join('students', 'students.student_id', '=', 'lost_resources.lost_by')
            ->get();

        return view('pages.bursar.view_lost_resource', ['lostResources' => $lostResources]);
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
    public function edit($resource)
    {
        //
        $resources = LostResource::find($resource);

        $student_id = $resources->lost_by;
        $resourceLostID = $resources->lost_resource;

        $resourceInfo = Resource::select(['resource_type', 'resource_amount'])->find($resourceLostID);

        $studentInfo = Student::select(['fullname', 'student_id'])->where('student_id', $student_id)->first();

        return view('pages.bursar.edit_resource', [
            'resources' => $resources,
            'studentInfo' => $studentInfo,
            'resourceInfo' => $resourceInfo,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $request->validate([
            'resource_status' => 'required'
        ]);

        $resourceID = $request->segment(3);
        $status = $request->resource_status;

        if ($status == 'REFUNDED' || $status == 'NOT REFUNDED') {
            $query = LostResource::where('id', $resourceID)->delete();

            if ($query) {
                return redirect(route('bursar.resource.index'))->with('success', 'Student Resource Status updates successfully');
            } else {
                return back()->with('warning', 'Fails to update student status, Check your internet connection');
            }
        } else {
            return back()->with('warning', 'You must write the status of lost resource as "REFUNDED" or "NOT REFUNDED" and not other way');
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
    }
}
