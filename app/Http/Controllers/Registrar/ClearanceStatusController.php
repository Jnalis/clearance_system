<?php

namespace App\Http\Controllers\Registrar;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use App\Models\Clearance;
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

        return view('pages.registrar.view_clearance_status', ['clearanceStatus' => $clearanceStatus]);

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
