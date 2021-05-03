<?php

namespace App\Http\Controllers\HOD;

use App\Http\Controllers\Controller;
use App\Models\AllocatedResource;
use Illuminate\Http\Request;
use App\Models\IssuedResource;
use App\Models\Resource;
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
        $arr['allocated_r'] = AllocatedResource::join('resources', 'resources.id', '=', 'allocated_resources.resource_id')->get();

        return view('pages.hod.view_allocated_resource')->with($arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arr['data'] = AllocatedResource::join('resources', 'resources.id', '=', 'allocated_resources.resource_id')->get();

        // $deptCode = Staff::select(['dept_code'])->firstWhere('id', '=', auth()->user()->id)->dept_code;
        // $arrS['student'] = Student::where('department', '=', $deptCode)->get();

        $arrS['student'] = Student::all();

        return view('pages.hod.issue_resource')->with($arr)->with($arrS);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, IssuedResource $issuedResource)
    {
        // checking if you gett all the data from the form
        // return $request->input();


        $request->validate([
            'student_reg_no' => 'required',
            'resource_type' => 'required',
            'date_to_return' => 'required',
        ]);

        //if form validated successfuly then add new usertype
        // $name = Student::select(['fullname'])->firstWhere('student_id', '=', $request->student_reg_no)->fullname;

        $studentID = Student::select(['id'])->firstWhere('student_id', '=', $request->student_reg_no)->id;

        $id = Resource::select(['id'])->firstWhere('resource_type', '=', $request->resource_type)->id;

        //$issuedResource->student_name = $name;
        $issuedResource->student_id = $studentID;
        $issuedResource->resource_id = $id;
        $issuedResource->date_to_return = $request->date_to_return;

        $query = $issuedResource->save(); //save your data to the model


        if ($query) {
            return redirect(route('hod.issuedResource.index'))->with('success', 'Resource issued successfull');
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
    }
}
