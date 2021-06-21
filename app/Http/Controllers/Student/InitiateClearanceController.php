<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Clearance;
use App\Models\Clearancetype;
use App\Models\IssuedResource;
use App\Models\LostResource;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InitiateClearanceController extends Controller
{
    public function index()
    {
        //
        $clearance = Clearance::join('students', 'students.student_id', '=', 'clearances.student_id')->where('clearances.student_id', '=', Auth::user()->user_id)->get();
        return view('pages.student.view_clearance_status', ['clearances' => $clearance]);
    }



    public function create()
    {
        //show the clearance form
        $clearanceType = Clearancetype::all();
        return view('pages.student.clearance_form', [
            'clearanceTypes' => $clearanceType,
        ]);
    }



    public function store(Request $request, Clearance $clearance)
    {
        //
        // return $request->input();
        // return $commentId = Comment::where('comment_to', '=', $id)->get();
        $checkStudent_id = Clearance::where('student_id', '=', Auth::user()->user_id)->first();

        if ($checkStudent_id) {
            return back()->with('danger', "Hey! you can not initiate more than one clearance, please check you'r clearance status");
        } else {
            $id = Student::select('id')
                ->firstWhere('student_id', '=', Auth::user()->user_id)->id;

            $resource_issued_to = IssuedResource::where('resource_issued_to', '=', $id)->first();
            $lost_by = LostResource::where('lost_by', '=', $id)->first();


            if ($resource_issued_to) {
                $resource_claim = 'YES';
            } else {
                $resource_claim = 'NO';
            }

            if ($lost_by) {
                $resource_claim = 'YES';
            } else {
                $resource_claim = 'NO';
            }

            $resource_claim;

            if ($resource_claim == 'YES') {
                $clearance_status =  'NOT CLEARED';
            } else {
                $clearance_status =  'CLEARED';
            }

            $clearance_status;


            $clearance->clearance_type = $request->clearancetype;
            $clearance->student_id = Auth::user()->user_id;
            $clearance->resource_claim = $resource_claim;
            $clearance->library_claim = null;
            $clearance->tuition_fee_status = null;
            $clearance->clearance_status = $clearance_status;

            $query = $clearance->save();

            if ($query) {
                return redirect(route('student.viewClearance'))->with('success', 'Clearance initiated');
            } else {
                return back()->with('danger', 'Something went wrong');
            }
        }
    }
}
