<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function store(Request $request, Student $student)
    {
        // checking if you gett all the data from the form
        // return $request->input();

        //now validating a form
        $request->validate([
            'firstname' => 'required',
            'secondname' => 'required',
            'lastname' => 'required',
            'username' => 'required | unique:staff',
            'usertype' => 'required',
            'department' => 'required',
            'password' => 'required | min:4 | max:12',
            'password2' => 'required | min:4 | max:12',
        ]);

        //if form validated successfuly then add new user as staff

        $staff->firstname = $request->firstname;
        $staff->secondname = $request->secondname;
        $staff->lastname = $request->lastname;
        $staff->username = 'NIT/STAFF/' . $request->username;
        $staff->usertype = $request->usertype;
        $staff->department = $request->department;
        $staff->password = Hash::make($request->password);

        $query = $staff->save(); //save your data to the model

        //fill user table
        $data = new User();
        $data->user_id = 'NIT/STAFF/' . $request->username;
        $data->user_type = $request->usertype;
        $data->added_by = auth()->id();
        $data->password = Hash::make($request->password);
        $data->save();

        //dd($data);

        if ($query) {
            return redirect(route('admin.staff.index'))->with('success','Staff Added Succe');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
    }
}
