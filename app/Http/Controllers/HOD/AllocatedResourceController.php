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

        $arrS['student'] = Student::all();

        return view('pages.hod.issue_resource')->with($arr)->with($arrS);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Resource $resource)
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

        $studentID = Student::select('id')
            ->firstWhere('student_id', '=', $request->student_reg_no)->id;

        $resourceId = Resource::select('id')
            ->firstWhere('resource_type', '=', $request->resource_type)->id;
        
        $staffId = auth()->user()->id;
        $date = $request->date_to_return;
        
        $query = Resource::where('id', '=', $resourceId)->update([
            'issued_by' => $staffId,
            'issued_to' => $studentID,
            'date_to_return' => $date,
            'issued' => 'YES',
            ]);
        


        if ($query) {
            return redirect(route('hod.issuedResource.index'))->with('success', 'Resource issued successfully');
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
