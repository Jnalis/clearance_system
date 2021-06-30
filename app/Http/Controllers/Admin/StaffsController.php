<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Departments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Staff;
use App\Models\User;
use App\Models\Usertypes;
use Illuminate\Support\Facades\Auth;

class StaffsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //getting all the staffs
        $staffs = Staff::all();
        return view('pages.admin.view_user', ['staffs' => $staffs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //function to display the add form
    public function create()
    {
        $arr['depts'] = Departments::all();
        $arrU['user_type'] = Usertypes::all();
        return view('pages.admin.add_new_user')->with($arr)->with($arrU);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Staff $staff, User $user)
    {
        // checking if you get all the data from the form
        // return Auth::user()->user_id;
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

        //if form validated successfully then add new user as staff
        $fullname = $request->firstname . ' ' . $request->secondname . ' ' . $request->lastname;
        $staff->fullname = $fullname;
        $staff->username = 'NIT/STAFF/' . $request->username;
        $staff->usertype = $request->usertype;
        $staff->dept_code = $request->department;
        $staff->added_by = Auth::user()->user_id;
        $staff->password = Hash::make($request->password);

        $query = $staff->save(); //save your data to the model

        //fill user table
        $user->user_id = 'NIT/STAFF/' . $request->username;
        $user->user_type = $request->usertype;
        $user->password = Hash::make($request->password);
        $user->save();

        //dd($data);

        if ($query) {
            return redirect(route('admin.staff.index'))->with('success', 'Staff Added Successfully');
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
    public function edit(Staff $staff)
    {
        $arr['staff'] = $staff;
        $arrD['depts'] = Departments::all();
        $arrU['user_type'] = Usertypes::all();
        return view('pages.admin.edit_user')->with($arr)->with($arrD)->with($arrU);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Staff $staff)
    {
        // checking if you get all the data from the form
        //return $request->input();

        //now validating a form
        $request->validate([
            'fullname' => 'required',
            'username' => 'required',
            'usertype' => 'required',
            'department' => 'required',
        ]);

        //if form validated successfully then add new user as staff
        $data2 = $staff->username;

        $staff->fullname = $request->fullname;
        $staff->username = $request->username;
        $staff->usertype = $request->usertype;
        $staff->dept_code = $request->department;


        $query = $staff->save(); //save your data to the model

        // return $data2;
        //edit user table
        $data = auth()->id();
        User::where('user_id', '=', $data2)
            ->update([
                'user_id' => $request->username,
                'user_type' =>  $request->usertype,
            ]);

        // dd($data);

        if ($query) {
            return redirect(route('admin.staff.index'))->with('success', 'Staff Updated Successfully');
        } else {
            return back()->with('fail', 'Something went wrong');
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
        // return $id;
        $staff = Staff::find($id);
        $username = $staff->username;

        $userID = User::select('id')->firstWhere('user_id', $username)->id;
        
        Staff::destroy($id);
        User::destroy($userID);
        return redirect(route('admin.staff.index'))->with('success', 'user deleted successfully');
    }
}
