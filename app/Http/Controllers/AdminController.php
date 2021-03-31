<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //
    public function dashboard()
    {
        return view('pages.admin.index');
    }
    public function add_user()
    {
        return view('pages.admin.add_new_user');
    }
    public function view_user()
    {
        return view('pages.admin.view_user');
    }
    public function add_department()
    {
        return view('pages.admin.add_department');
    }
    public function view_department()
    {
        return view('pages.admin.view_department');
    }
    public function add_usertype()
    {
        return view('pages.admin.add_usertype');
    }
    public function view_usertype()
    {
        return view('pages.admin.view_usertype');
    }
    public function view_syslogs()
    {
        return view('pages.admin.view_syslogs');
    }


    function create(Request $request)
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
        $staff = new Staff; //model to be used to add new staff

        $staff->firstname = $request->firstname;
        $staff->secondname = $request->secondname;
        $staff->lastname = $request->lastname;
        $staff->username = $request->username;
        $staff->usertype = $request->usertype;
        $staff->department = $request->department;
        $staff->password = Hash::make($request->password);

        $query = $staff->save(); //save your data to the model

        if ($query) {
            return back()->with('success', 'New user added successfull');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
    }
}
