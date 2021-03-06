<?php

namespace App\Http\Controllers\Bursar;

use App\Http\Controllers\Controller;
use App\Models\Clearance;
use App\Models\Student;
use Illuminate\Http\Request;

class CautionMoneyController extends Controller
{
    //
    public function index($id)
    {
        // return $id;

        // die();

        $students = Clearance::select([
            'students.id',
            'students.fullname',
            'students.student_id',
            'students.caution_money_status'
        ])->join('students', 'students.student_id', '=', 'clearances.student_id')->where('clearances.id', $id)->first();


        return view('pages.bursar.issue_caution_money', [
            'students' => $students,
        ]);
    }


    public function store(Request $request){
        // return $request->input();

        $request->validate([
            'caution_money_status' => 'required',
        ]);

        $studentID =  $request->segment(3);

        $moneyStatus = $request->caution_money_status;


        $query = Student::where('id', $studentID)->update([
            'caution_money_status' => $moneyStatus,
        ]);

        if ($query) {
            return redirect(route('bursar.clearance.index'))->with('success', 'Caution money issued successfully');
        } else {
            return back()->with('warning', 'Fails to issue caution money, Check your internet connection');
        }


        // if ($moneyStatus == 'ISSUED' || $moneyStatus == 'NOT ISSUED') {

        //     $query = Student::where('id', $studentID)->update([
        //         'caution_money_status' => $moneyStatus,
        //     ]);

        //     if ($query) {
        //         return redirect(route('bursar.clearance.index'))->with('success', 'Caution money issued successfully');
        //     } else {
        //         return back()->with('warning', 'Fails to issue caution money, Check your internet connection');
        //     }
            
        // } else {
        //     return back()->with('warning', 'You must write the caution money status as "ISSUED" or "NOT ISSUED" and not other way');
        // }

    
        
    }
}
