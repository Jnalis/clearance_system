<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Clearance;
use App\Models\Clearancetype;
use App\Models\Departments;
use App\Models\IssuedResource;
use App\Models\LostResource;
use App\Models\Resource;
use App\Models\Staff;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;


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

        if ($clearanceTypeInfo) {

            $clearanceID = $clearanceTypeInfo->id;
            $clearanceDate = $clearanceTypeInfo->created_at;

            /**
             * this is used to give me fee status
             */
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
             * this give me clearance status
             */
            $clearanceStatus = $clearanceTypeInfo->clearance_status;

            /**
             * this give a value to clear the form
             */
            if ($clearanceStatus == 'CLEARED') {
                $clearAllStatus = 1;

                $issuedResourceName = null;
                $issuedResourceValue = null;
                $lostResourceName = null;
                $lostResourceValue = null;
                $LostResourceDept = null;
                $resourceDept = null;
                
            } else {
                $clearAllStatus = 0;


                /**
                 * give me information from issued table
                 */
                $checkStudentIDinIssuedResourceInfo = IssuedResource::where('resource_issued_to', $student_id)->first();
                /**
                 * give info from lost table
                 */
                $checkStudentIDinLostResourceInfo = LostResource::where('lost_by', $student_id)->first();

                $issued = $checkStudentIDinIssuedResourceInfo;
                $lost = $checkStudentIDinLostResourceInfo;

                if ($issued && $lost) {
                    $idFromIssued = $issued->resource_issued;
                    $idFromLost = $lost->lost_resource;
                    /**
                     * return resource issued
                     */
                    $resourceInfoIssued = Resource::select(
                        [
                            'resource_type',
                            'resource_amount',
                            'allocated_to',
                        ]
                    )->where('id', $idFromIssued)->first();

                    /**
                     * return resource lost
                     */
                    $resourceInfoLost = Resource::select(
                        [
                            'resource_type',
                            'resource_amount',
                            'allocated_to',
                        ]
                    )->where('id', $idFromLost)->first();

                    $staffInIssuedResource = $resourceInfoIssued->allocated_to;
                    $staffInLostResource = $resourceInfoLost->allocated_to;

                    /**
                     * gives me where resource comes from
                     */
                    $staffInIssuedDept = Staff::where('username', $staffInIssuedResource)->first();
                    /**
                     * gives me where resource comes from
                     */
                    $staffInLostDept = Staff::where('username', $staffInLostResource)->first();

                    $issuedResourceName = $resourceInfoIssued->resource_type;
                    $issuedResourceValue = $resourceInfoIssued->resource_amount;
                    $lostResourceName = $resourceInfoLost->resource_type;
                    $lostResourceValue = $resourceInfoLost->resource_amount;
                    $resourceDept = $staffInIssuedDept->dept_code;
                    $LostResourceDept = $staffInLostDept->dept_code;
                } elseif ($issued) {
                    $idFromIssued = $issued->resource_issued;
                    /**
                     * return resource issued
                     */
                    $resourceInfoIssued = Resource::select(
                        [
                            'resource_type',
                            'resource_amount',
                            'allocated_to',
                        ]
                    )->where('id', $idFromIssued)->first();

                    $staffAllocatedResource = $resourceInfoIssued->allocated_to;

                    /**
                     * gives me where resource comes from
                     */
                    $staffDept = Staff::where('username', $staffAllocatedResource)->first();

                    $issuedResourceName = $resourceInfoIssued->resource_type;
                    $issuedResourceValue = $resourceInfoIssued->resource_amount;
                    $resourceDept = $staffDept->dept_code;
                    $LostResourceDept = null;
                    $lostResourceName = null;
                    $lostResourceValue = null;
                } elseif ($lost) {
                    $idFromLost = $lost->lost_resource;

                    /**
                     * return resource lost
                     */
                    $resourceInfoLost = Resource::select(
                        [
                            'resource_type',
                            'resource_amount',
                            'allocated_to',
                        ]
                    )->where('id', $idFromLost)->first();

                    $staffAllocatedResource = $resourceInfoLost->allocated_to;

                    /**
                     * gives me where resource comes from
                     */
                    $staffDept = Staff::where('username', $staffAllocatedResource)->first();

                    $issuedResourceName = null;
                    $issuedResourceValue = null;
                    $resourceDept = null;
                    $lostResourceName = $resourceInfoLost->resource_type;
                    $lostResourceValue = $resourceInfoLost->resource_amount;
                    $LostResourceDept = $staffDept->dept_code;
                } else {
                    $issuedResourceName = null;
                    $issuedResourceValue = null;
                    $lostResourceName = null;
                    $lostResourceValue = null;
                    $LostResourceDept = null;
                    $resourceDept = null;
                }
            }



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
                'clearanceStatus' => $clearanceStatus,
                'clearAllStatus' => $clearAllStatus,
                'issuedResourceName' => $issuedResourceName,
                'issuedResourceValue' => $issuedResourceValue,
                'lostResourceName' => $lostResourceName,
                'lostResourceValue' => $lostResourceValue,
                'resourceDept' => $resourceDept,
                'LostResourceDept' => $LostResourceDept,
                'clearanceDate' => $clearanceDate,
            ]);
        } else {
            return redirect(route('student.initiateClearance'))->with('info', 'Please initiate a clearance to view your status');
        }
    }




    public function downloadPdf($id)
    {
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

        if ($clearanceTypeInfo) {

            $clearanceID = $clearanceTypeInfo->id;

            $clearanceDate = $clearanceTypeInfo->created_at;

            /**
             * this is used to give me fee status
             */
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
             * this give me clearance status
             */
            $clearanceStatus = $clearanceTypeInfo->clearance_status;

            /**
             * this give a value to clear the form
             */
            if ($clearanceStatus == 'CLEARED') {
                $clearAllStatus = 1;
            } else {
                $clearAllStatus = 0;
            }


            view()->share('pages.student.view_clearance_status', [
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
                'clearanceStatus' => $clearanceStatus,
                'clearAllStatus' => $clearAllStatus,
                'clearanceDate' => $clearanceDate,
            ]);


            $pdf = PDF::loadView('pages.student.view_clearance_status', [
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
                'clearanceStatus' => $clearanceStatus,
                'clearAllStatus' => $clearAllStatus,
                'clearanceDate' => $clearanceDate,
            ]);
            return $pdf->download('clearanceDoc.pdf');

        } else {
            return redirect(route('student.initiateClearance'))->with('info', 'Please initiate a clearance to view your status');
        }
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

        $studentInfoInClearanceTable = Clearance::where('student_id', $userID)->first();

        if ($studentInfoInClearanceTable == null) {
            // return 'ok';

            $resource_issued_to = IssuedResource::where('resource_issued_to', '=', $userID)->first();

            $lost_by = LostResource::where('lost_by', '=', $userID)->first();

            $fee_status = Student::where('student_id', '=', $userID)->where('fee_status', '=', 'PAID')->first();


            if ($resource_issued_to) {
                $resource_claim_issued = 'YES';
            } else {
                $resource_claim_issued = 'NO';
            }

            if ($lost_by) {
                $resource_claim_lost = 'YES';
            } else {
                $resource_claim_lost = 'NO';
            }

            $resource_claim_issued;
            $resource_claim_lost;


            if ($fee_status) {
                $feeStatus = 'PAID';
            } else {
                $feeStatus = 'UNPAID';
            }

            $feeStatus;



            if ($feeStatus == 'UNPAID' || $resource_claim_issued == 'YES' || $resource_claim_lost == 'YES') {
                $resourceClaim = 'YES';
                $clearance_status =  'NOT CLEARED';
            } else {
                $resourceClaim = 'NO';
                $clearance_status =  'CLEARED';
            }

            $resourceClaim;
            $clearance_status;


            $clearance->clearance_type = $request->clearancetype;
            $clearance->student_id = Auth::user()->user_id;
            $clearance->resource_claim = $resourceClaim;
            $clearance->library_claim = null;
            $clearance->tuition_fee_status = $feeStatus;
            $clearance->clearance_status = $clearance_status;

            $query = $clearance->save();


            if ($query) {
                return redirect(route('student.viewClearance'))->with('success', 'Clearance initiated');
            } else {
                return back()->with('danger', 'Something went wrong');
            }
        } else {
            return back()->with('danger', 'Please delete your previous clearance and initiate again');
        }
    }







    public function deleteClearance($id)
    {
        // return  $id;
        Clearance::destroy($id);
        return redirect(route('student.initiateClearance'))->with('danger', 'You have deleted your clearance successfully');
    }
}
