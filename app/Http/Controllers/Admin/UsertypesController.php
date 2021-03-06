<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usertypes;
use Illuminate\Support\Facades\Auth;

class UsertypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //getting all the departments
        $arr['usertype'] = Usertypes::all();
        return view('pages.admin.view_usertype')->with($arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.add_usertype');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Usertypes $usertype)
    {
        // checking if you get all the data from the form
        // return $request->input();


        //now validating a form
        $request->validate([
            'usertype_name' => 'required | unique:usertypes',
            'usertype_code' => 'required | unique:usertypes',
        ]);

        //if form validated successfully then add new usertype

        $usertype->usertype_name = $request->usertype_name;
        $usertype->usertype_code = $request->usertype_code;
        $usertype->added_by = Auth::user()->user_id;

        $query = $usertype->save(); //save your data to the model

        if ($query) {
            return redirect(route('admin.usertype.index'))->with('success', 'Usertype Added successfully');
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
    public function edit(Usertypes $usertype)
    {
        //
        $arr['user_type'] = $usertype;
        return view('pages.admin.edit_usertype')->with($arr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usertypes $usertype)
    {
        // return $request->input();


        //now validating a form
        $request->validate([
            'usertype_name' => 'required',
            'usertype_code' => 'required',
        ]);

        //if form validated successfully then add new usertype

        $usertype->usertype_name = $request->usertype_name;
        $usertype->usertype_code = $request->usertype_code;
        $usertype->added_by = Auth::user()->user_id;

        $query = $usertype->save(); //save your data to the model

        if ($query) {
            return redirect(route('admin.usertype.index'))->with('success', 'Usertype Edited');
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


        try {
            // return $id;
            Usertypes::destroy($id);
            return redirect(route('admin.usertype.index'))->with('success', 'Usertype Deleted');
        } catch (\Illuminate\Database\QueryException $ex) {
            if ($ex->getCode() === '23000') {
                return redirect(route('admin.usertype.index'))->with('fail', 'You can not delete this because it is in use.');
            }
        }
    }
}
