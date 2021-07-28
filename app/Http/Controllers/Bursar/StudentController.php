<?php

namespace App\Http\Controllers\Bursar;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $students = Student::all();
        return view('pages.bursar.view_student', ['students' => $students]);
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
    public function edit($student)
    {
        //
        // return $student;

        $students = Student::find($student);

        return view('pages.bursar.edit_student', ['students' => $students]);
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
        // return $request->input();

        $request->validate([
            'fee_status' => 'required'
        ]);

        $studentID = $request->segment(3);
        $fee_status = $request->fee_status;

        $query = Student::where('id', $studentID)->update([
            'fee_status' => $fee_status,
        ]);

        if ($query) {
            return redirect(route('bursar.student.index'))->with('success', 'Student fee updates successfully');
        } else {
            return back()->with('warning', 'Fails to update student fee, Check your internet connection');
        }

        // if ($fee_status == 'PAID' || $fee_status == 'UNPAID') {
        //     $query = Student::where('id', $studentID)->update([
        //         'fee_status' => $fee_status,
        //     ]);

        //     if ($query) {
        //         return redirect(route('bursar.student.index'))->with('success', 'Student fee updates successfully');
        //     } else {
        //         return back()->with('warning', 'Fails to update student fee, Check your internet connection');
        //     }
            
        // } else {
        //     return back()->with('warning', 'You must write the fee status as "PAID" or "UNPAID" and not other way');
        // }
        
        

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
