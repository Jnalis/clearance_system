<?php

namespace App\Http\Controllers\Registrar;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use App\Models\Clearance;
use App\Models\Departments;
use App\Models\IssuedResource;
use App\Models\LostResource;
use App\Models\Resource;
use App\Models\Staff;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClearanceStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $clearanceStatus = Student::join('clearances', 'clearances.student_id', '=', 'students.student_id')->get();

        return view('pages.registrar.view_clearance_status', [
            'clearanceStatus' => $clearanceStatus,
        ]);
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
        // return $id;
        $department = Departments::all();


        $studentStatus = Student::join('clearances', 'clearances.student_id', '=', 'students.student_id')->where('clearances.id', $id)->first();

        $student_id = $studentStatus->student_id;

        //! student information from issued table
        $issuedInfo = IssuedResource::where('resource_issued_to', $student_id)->first();

        if ($issuedInfo) {
            $issuedStatus = 1;
            $clearanceStatus = 'NOT CLEARED';
            //! give me id of the resource issued to student
            $resourceIssuedId = IssuedResource::select('resource_issued')->firstWhere('resource_issued_to', $student_id)->resource_issued;

            //! give me resource info
            $resourceInfo = Resource::where('id', $resourceIssuedId)->first();
            $allocatedTo = $resourceInfo->allocated_to;
            $resourceDept = Staff::select('dept_code')->firstWhere('username', $allocatedTo)->dept_code;


            $issuedResourceName = $resourceInfo->resource_type;
            $issuedResourceValue = $resourceInfo->resource_amount;
            $issuedResourceDept = $resourceDept;
        } else {
            $issuedResourceName = null;
            $issuedResourceValue = null;
            $issuedStatus = null;
            $issuedResourceDept = null;
            $clearanceStatus = null;
        }


        //! student information from lost table
        $lostInfo = LostResource::where('lost_by', $student_id)->first();

        if ($lostInfo) {
            $lostStatus = 0;
            $clearanceStatus = 'NOT CLEARED';
            //! give me id of the resource lost by student
            $resourceLostId = LostResource::select('lost_resource')->firstWhere('lost_by', $student_id)->lost_resource;

            //! give me resource info
            $resourceInfo = Resource::where('id', $resourceLostId)->first();
            $allocatedTo = $resourceInfo->allocated_to;
            $resourceDept = Staff::select('dept_code')->firstWhere('username', $allocatedTo)->dept_code;

            $lostResourceName = $resourceInfo->resource_type;
            $lostResourceValue = $resourceInfo->resource_amount;
            $lostResourceDept = $resourceDept;
        } else {
            $lostResourceName = null;
            $lostResourceValue = null;
            $lostStatus = null;
            $lostResourceDept = null;
            $clearanceStatus = null;
        }




        return view('pages.registrar.view_clearance_form', [
            'studentStatus' => $studentStatus,
            'departments' => $department,
            'issuedResourceName' => $issuedResourceName,
            'issuedResourceValue' => $issuedResourceValue,
            'lostResourceName' => $lostResourceName,
            'lostResourceValue' => $lostResourceValue,
            'issuedStatus' => $issuedStatus,
            'lostStatus' => $lostStatus,
            'issuedResourceDept' => $issuedResourceDept,
            'lostResourceDept' => $lostResourceDept,
            'clearanceStatus' => $clearanceStatus,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($clearance)
    {
        //
        $clearanceID = $clearance;
        $clearanceStudentId = Clearance::select('student_id')->firstWhere('id', $clearance)->student_id;

        $studentName = Student::select('fullname')->firstWhere('student_id', $clearanceStudentId)->fullname;


        return view('pages.registrar.issue_certificate', [
            'clearanceID' => $clearanceID,
            'clearanceStudentId' => $clearanceStudentId,
            'studentName' => $studentName,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $clearanceID, Certificate $certificate)
    {
        //
        $request->validate([
            'certificateStatus' => 'required',
        ]);


        $clearanceStudentId = Clearance::select('student_id')->firstWhere('id', $clearanceID)->student_id;

        $certificate->certificate_status = $request->certificateStatus;
        $certificate->student_id  = $clearanceStudentId;
        $certificate->clearance_id   = $clearanceID;
        $certificate->issued_by    = Auth::user()->user_id;

        $query = $certificate->save();

        if ($query) {
            return redirect(route('registrar.certificate.index'))->with('success', 'Certificate issued successfully');
        } else {
            return back()->with('warning', 'Check your internet connection');
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
