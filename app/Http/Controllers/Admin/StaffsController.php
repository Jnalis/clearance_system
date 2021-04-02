<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Staff;

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
        $arr['staffs'] = Staff::all();
        return view('pages.admin.view_user')->with($arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //function to dispaly the add form
    public function create()
    {
        return view('pages.admin.add_new_user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Staff $staff)
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
        $staff->username = $request->username;
        $staff->usertype = $request->usertype;
        $staff->department = $request->department;
        $staff->password = Hash::make($request->password);

        $query = $staff->save(); //save your data to the model

        if ($query) {
            return redirect(route('admin.staff.index'));
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
