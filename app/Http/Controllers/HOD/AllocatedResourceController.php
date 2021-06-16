<?php

namespace App\Http\Controllers\HOD;

use App\Http\Controllers\Controller;
use App\Models\AllocatedResource;
use Illuminate\Http\Request;
use App\Models\IssuedResource;
use App\Models\Resource;
use App\Models\SimsStudent;
use App\Models\Staff;
use App\Models\Student;

class AllocatedResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = auth()->user()->id;
        $arr['resource'] = Resource::where('allocated_to', '=', $id)->get();

        return view('pages.hod.view_allocated_resource')->with($arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = auth()->user()->id;
        $arr['data'] = Resource::where('allocated_to', '=', $id)->where('issued', '=', 'NO')->get();

        // $arrS['student'] = Student::all();   NIT/BCFCF/2016/2022

        return view('pages.hod.issue_resource')->with($arr);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Student $student, IssuedResource $issuedResource)
    {
        // checking if you get all the data from the form
        //  return $request->input();


        $request->validate([
            'student_reg_no' => 'required',
            'resource_type' => 'required',
            'date_to_return' => 'required',
        ]);


        $ID =  $request->student_reg_no;

        $student_info_from_db = Student::where('student_id', '=', $ID)->first();

        $resourceId = Resource::select('id')->firstWhere('resource_type', '=', $request->resource_type)->id;
        $staffId = auth()->user()->id;


        if ($student_info_from_db) {

            $student_id_from_db = $student_info_from_db->id;

            //! this is used to add info to issued_resources table
            $issuedResource->resource_issued  = $resourceId;
            $issuedResource->resource_issued_to = $student_id_from_db;
            $issuedResource->issued_by = $staffId;
            $issuedResource->date_to_return = $request->date_to_return;


            $query2 = $issuedResource->save();

            Resource::where('id', '=', $resourceId)->update(['issued' => 'YES']);

            if ($query2) {

                return redirect(route('hod.issuedResource.index'))->with('success', 'Resource issued successfully');
            } else {

                return back()->with('fail', 'Failed to issue resource to student, check your internet connection');
            }
        } else {

            //? this is like  SIMS API which gives us students infos
            $studentInfo = SimsStudent::where('student_id', '=', $ID)->first();


            if ($studentInfo) {
                //TODO this are individual data for student from sims
                $studentID = $studentInfo->student_id;
                $studentName = $studentInfo->fullname;
                $studentProgram = $studentInfo->program;
                $studentDepartment = $studentInfo->department;
                $studentEntryYear = $studentInfo->entry_year;
                $studentRegistered = $studentInfo->registered;


                //! this is used to add student information from sims 
                //! to our studentInfo table
                $student->student_id = $studentID;
                $student->fullname = $studentName;
                $student->program = $studentProgram;
                $student->department = $studentDepartment;
                $student->entry_year = $studentEntryYear;
                $student->registered = $studentRegistered;

                $query1 = $student->save();

                if ($query1) {

                    $ourStudentInfo = Student::where('student_id', '=', $studentID)->first();
                    $ourStudentID = $ourStudentInfo->id;

                    //! this is used to add info to issued_resources table
                    $issuedResource->resource_issued  = $resourceId;
                    $issuedResource->resource_issued_to = $ourStudentID;
                    $issuedResource->issued_by = $staffId;
                    $issuedResource->date_to_return = $request->date_to_return;


                    $query2 = $issuedResource->save();

                    Resource::where('id', '=', $resourceId)->update(['issued' => 'YES']);

                    if ($query2) {
                        return redirect(route('hod.issuedResource.index'))->with('success', 'Resource issued successfully');
                    } else {
                        return back()->with('fail', 'Failed to issue resource to student, check your internet connection');
                    }
                } else {
                    return back()->with('fail', 'Failed to get student information, check your internet connection');
                }
            } else {
                return back()->with('fail', 'Make sure student is already registered SIMS');
            }
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
