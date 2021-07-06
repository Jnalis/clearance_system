<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Clearance;
use App\Models\Clearancetype;
use App\Models\Departments;
use App\Models\IssuedResource;
use App\Models\LostResource;
use App\Models\Resource;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade as PDF;


class InitiateClearanceController extends Controller
{
    public function index()
    {
        //
        $student_id = Auth::user()->user_id;



        /**
         * this is used to give me some of info from student
         */
        $studentFromTableInfo = Student::where('student_id', $student_id)->first();
        $student_name = $studentFromTableInfo->fullname;
        $student_program = $studentFromTableInfo->program;
        $student_department = $studentFromTableInfo->department;
        $student_identity = $studentFromTableInfo->student_id;

        /** 
         * this give me clearance info
         */
        $clearanceTypeInfo = Clearance::where('student_id', $student_id)->first();
        $clearanceID = $clearanceTypeInfo->id;
        if ($clearanceTypeInfo) {
            $clearanceTypeStatus = 1;
            $clearanceType = $clearanceTypeInfo->clearance_type;
            $feeStatus = $clearanceTypeInfo->tuition_fee_status;
        } else {
            $clearanceTypeStatus = 0;
            $clearanceType = 'NO';
            $feeStatus = 'Initiate clearance to see it';
        }

        /**
         * this give me department
         */
        $departments = Departments::select(['dept_name', 'dept_code'])->get();

        /**
         * 
         */

        return view('pages.student.view_clearance_status', [
            // 'clearances' => $clearance,
            'student_name' => $student_name,
            'student_program' => $student_program,
            'student_department' => $student_department,
            'student_identity' => $student_identity,
            'clearanceTypeStatus' => $clearanceTypeStatus,
            'clearanceType' => $clearanceType,
            'clearanceID' => $clearanceID,
            'feeStatus' => $feeStatus,
            'departments' => $departments,
        ]);
    }




    public function downloadPdf()
    {

        $departments = Departments::all();

        $pdf = PDF::loadView('pages.student.view_clearance_status', [
            'departments' => $departments,
        ]);
        return $pdf->download('clearanceDoc.pdf');
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

        $userID = Auth::user()->user_id;

        $studentIDinClearance = Clearance::select('student_id')->firstWhere('student_id', $userID)->student_id;

        if ($studentIDinClearance) {
            return back()->with('danger', 'Please delete your previous clearance and initiate again');
        } else {
            $resource_issued_to = IssuedResource::where('resource_issued_to', '=', $userID)->first();

            $lost_by = LostResource::where('lost_by', '=', $userID)->first();

            $fee_status = Student::where('student_id', '=', $userID)->where('fee_status', '=', 'PAID')->first();


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


            if ($fee_status) {
                $feeStatus = 'PAID';
            } else {
                $feeStatus = 'UNPAID';
            }

            $feeStatus;



            if ($feeStatus == 'UNPAID' || $resource_claim == 'YES') {
                $clearance_status =  'NOT CLEARED';
            } else {
                $clearance_status =  'CLEARED';
            }

            $clearance_status;


            $clearance->clearance_type = $request->clearancetype;
            $clearance->student_id = Auth::user()->user_id;
            $clearance->resource_claim = $resource_claim;
            $clearance->library_claim = null;
            $clearance->tuition_fee_status = $feeStatus;
            $clearance->clearance_status = $clearance_status;

            $query = $clearance->save();


            if ($query) {
                return redirect(route('student.viewClearance'))->with('success', 'Clearance initiated');
            } else {
                return back()->with('danger', 'Something went wrong');
            }
        }
    }

    public function deleteClearance($id)
    {
        return  $id;
    }











































    public function getPdf($id)
    {
        // return $id;
        $student_id = Auth::user()->user_id;
        $studentFromTableInfo = Student::where('student_id', $student_id)->first();

        $student_name = $studentFromTableInfo->fullname;
        $student_program = $studentFromTableInfo->program;
        $student_department = $studentFromTableInfo->department;
        $student_identity = $studentFromTableInfo->student_id;


        $clearanceInfo = Clearance::where('id', $id)->first();
        $studentID = $clearanceInfo->student_id;


        $checkStudentIDinIssuedResourceInfo = IssuedResource::where('resource_issued_to', $studentID)->first();

        $checkStudentIDinLostResourceInfo = LostResource::where('lost_by', $studentID)->first();

        if ($checkStudentIDinIssuedResourceInfo) {
            $resourceID = $checkStudentIDinIssuedResourceInfo->resource_issued;

            $resourceInfo = Resource::select(['resource_type', 'resource_amount'])->where('id', $resourceID)->first();

            $student = $checkStudentIDinIssuedResourceInfo->resource_issued_to;

            $studentInfo = Student::where('student_id', $student)->first();
            $studentDept = $studentInfo->department;


            $studentInfoInLostResource = LostResource::where('lost_by', $student)->first();

            if ($studentInfoInLostResource) {
                $resource_status = $studentInfoInLostResource->refunded_status;

                $resource_status;

                $lostResourceID = $studentInfoInLostResource->lost_resource;

                $infoResource = Resource::where('id', $lostResourceID)->first();

                $departments = Departments::select(['id', 'dept_name', 'dept_code'])->get();

                $student_Dept = $studentDept;

                $resource_name = $resourceInfo->resource_type;
                $resource_value = $resourceInfo->resource_amount;

                $lostResourceName = $infoResource->resource_type;
                $lostResourceValue = $infoResource->resource_amount;

                $lostStatus = 0;

                return view('pages.student.pdf_template', [
                    'departments' => $departments,
                    'student_Dept' => $student_Dept,
                    'resource_name' => $resource_name,
                    'resource_value' => $resource_value,
                    'lostResourceName' => $lostResourceName,
                    'lostResourceValue' => $lostResourceValue,
                    'lostResourceStatus' => $resource_status,
                    'lostStatus' => $lostStatus,
                    'student_name' => $student_name,
                    'student_program' => $student_program,
                    'student_department' => $student_department,
                    'student_identity' => $student_identity,
                ]);
            } else {

                $departments = Departments::select(['id', 'dept_name', 'dept_code'])->get();

                $student_Dept = $studentDept;

                $resource_name = $resourceInfo->resource_type;
                $resource_value = $resourceInfo->resource_amount;

                $lostResourceStatus = null;
                $lostStatus = 1;

                return view('pages.student.pdf_template', [
                    'departments' => $departments,
                    'student_Dept' => $student_Dept,
                    'resource_name' => $resource_name,
                    'resource_value' => $resource_value,
                    'lostResourceStatus' => $lostResourceStatus,
                    'lostStatus' => $lostStatus,
                    'student_name' => $student_name,
                    'student_program' => $student_program,
                    'student_department' => $student_department,
                    'student_identity' => $student_identity,

                ]);
            }
        } elseif ($checkStudentIDinLostResourceInfo) {


            $resourceID = $checkStudentIDinLostResourceInfo->lost_resource;

            $resourceInfo = Resource::select(['resource_type', 'resource_amount'])->where('id', $resourceID)->first();

            $student = $checkStudentIDinLostResourceInfo->lost_by;

            $studentInfo = Student::where('student_id', $student)->first();
            $studentDept = $studentInfo->department;



            $departments = Departments::select(['id', 'dept_name', 'dept_code'])->get();

            $student_Dept = $studentDept;

            $resource_name = $resourceInfo->resource_type;
            $resource_value = $resourceInfo->resource_amount;

            $lostResourceStatus = null;
            $lostStatus = 1;

            return view('pages.student.pdf_template', [
                'departments' => $departments,
                'student_Dept' => $student_Dept,
                'resource_name' => $resource_name,
                'resource_value' => $resource_value,
                'lostResourceStatus' => $lostResourceStatus,
                'lostStatus' => $lostStatus,
                'student_name' => $student_name,
                'student_program' => $student_program,
                'student_department' => $student_department,
                'student_identity' => $student_identity,

            ]);
        } else {


            $studentInfo = Student::where('student_id', $studentID)->first();
            // $studentDept = $studentInfo->department;



            $departments = Departments::select(['id', 'dept_name', 'dept_code'])->get();

            $student_Dept = null;

            $resource_name = null;
            $resource_value = null;

            $lostResourceStatus = null;
            $lostStatus = 1;

            return view('pages.student.pdf_template', [
                'departments' => $departments,
                'student_Dept' => $student_Dept,
                'resource_name' => $resource_name,
                'resource_value' => $resource_value,
                'lostResourceStatus' => $lostResourceStatus,
                'lostStatus' => $lostStatus,
                'student_name' => $student_name,
                'student_program' => $student_program,
                'student_department' => $student_department,
                'student_identity' => $student_identity,

            ]);
        }
    }
}
