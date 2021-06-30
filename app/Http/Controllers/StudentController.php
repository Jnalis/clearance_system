<?php

namespace App\Http\Controllers;

use App\Models\SimsStudent;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    //

    public function index(Request $request, Student $student)
    {
        // return $request->input();

        $request->validate([
            'reg_no' => 'required',
        ]);

        $regNo = $request->reg_no;
        $studentFromOurDB = Student::where('student_id', '=', $regNo)->first();

        if ($studentFromOurDB) {
            //TODO this is for student who is available in our student table
            // $id = Hash::make($studentFromOurDB->id);
            $id = $studentFromOurDB->id;
            $password = $studentFromOurDB->password;

            if ($password == null) {
                return redirect(route('enterPassword', $id))->with('danger', 'Please enter your password to secure your account');
            } else {
                return redirect(route('login'))->with('info', 'Your already registered with password. Please login');
            }
        } else {
            //TODO this is for new student who are not in our student table
            $regNo = $request->reg_no;
            $studentInfoFromSIMS = SimsStudent::where('student_id', '=', $regNo)->first();

            if ($studentInfoFromSIMS) {
                
                $studentId = $studentInfoFromSIMS->student_id;
                $studentName = $studentInfoFromSIMS->fullname;
                $studentProgram = $studentInfoFromSIMS->program;
                $studentDepartment = $studentInfoFromSIMS->department;
                $studentEntryYear = $studentInfoFromSIMS->entry_year;
                $studentRegistered = $studentInfoFromSIMS->registered;

                $student->student_id = $studentId;
                $student->fullname = $studentName;
                $student->program = $studentProgram;
                $student->department = $studentDepartment;
                $student->department = $studentDepartment;
                $student->entry_year = $studentEntryYear;
                $student->registered = $studentRegistered;

                $query3 = $student->save();

                if ($query3) {
                    $regNo = $request->reg_no;
                    $studentFromOurDB = Student::where('student_id', '=', $regNo)->first();
                    $id = $studentFromOurDB->id;

                    return redirect(route('enterPassword', $id))->with('danger', 'Please enter your password to secure your account');
                } else {
                    return back()->with('fail', 'Error it might be your internet connection');
                }
            } else {
                return back()->with('fail', 'Student has not been registered in SIMS');
            }
        }
    }

    public function enterPassword($id)
    {
        // return [$id];
        return view('auth.enter_password', ['studentID' => $id]);
    }

    public function storePassword(Request $request, User $user)
    {
        // return $request->input();
        $request->validate([
            'password' => 'required|confirmed|min:6',
        ]);

        $id = $request->user_id;
        $passwordToBeStored = Hash::make($request->password);

        $query = Student::where('id', '=', $id)->update([
            'password' => $passwordToBeStored,
        ]);


        if ($query) {
            $studentInfo = Student::find($id);
            $studentId = $studentInfo->student_id;

            $user->user_id = $studentId;
            $user->user_type = 'Student';
            $user->password = $passwordToBeStored;

            $query2 = $user->save();

            if ($query2) {
                return redirect(route('login'))->with('success', 'Use your reg no as username and the password you entered to login');
            } else {
                return back()->with('fail', 'Error it might be your internet connection');
            }
        } else {
            return back()->with('fail', 'Error it might be your internet connection');
        }
    }
}
