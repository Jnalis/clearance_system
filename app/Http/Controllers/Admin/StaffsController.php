<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Staff;
use App\Models\User;

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
        $staff->username = 'NIT/STAFF/'.$request->username;
        $user_number = 'NIT/STAFF/'.$request->username;
        Session::put('user_name', $user_number);//hii ni kwa ajili ya kuweka session ya username for editing purpose
        $staff->usertype = $request->usertype;
        $staff->department = $request->department;
        $staff->password = Hash::make($request->password);

        $query = $staff->save(); //save your data to the model
        
        //fill user table
        $data = new User();
        $data->user_id = 'NIT/STAFF/'.$request->username;
        $data->user_type = $request->usertype;
        $data->password = Hash::make($request->password);
        $data->save();

        //dd($data);

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
    public function edit(Staff $staff)
    {
        $arr['staff'] = $staff;
        return view('pages.admin.edit_user')->with($arr);
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
        // checking if you gett all the data from the form
        //return $request->input();

        //now validating a form
        $request->validate([
            'firstname' => 'required',
            'secondname' => 'required',
            'lastname' => 'required',
            'username' => 'required',
            'usertype' => 'required',
            'department' => 'required',
        ]);

        //if form validated successfuly then add new user as staff

        $staff->firstname = $request->firstname;
        $staff->secondname = $request->secondname;
        $staff->lastname = $request->lastname;
        $staff->username = $request->username;
        $staff->usertype = $request->usertype;
        $staff->department = $request->department;

        $query = $staff->save(); //save your data to the model
        
        //fill user table
        $data = Session::get('user_name');
         User::where('user_id', '=', $data)->update(['user_id' => $request->username, 'user_type' =>  $request->usertype]);
        
        // dd($data);

        if ($query) {
            return redirect(route('admin.staff.index'));
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
    }
}
