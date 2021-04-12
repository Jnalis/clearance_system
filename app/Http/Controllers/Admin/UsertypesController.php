<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usertypes;

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
        // checking if you gett all the data from the form
        // return $request->input();


        //now validating a form
        $request->validate([
            'usertype_name' => 'required | unique:usertypes',
            'usertype_code' => 'required | unique:usertypes',
        ]);

        //if form validated successfuly then add new usertype
        
        $usertype->usertype_name = $request->usertype_name;
        $usertype->usertype_code = $request->usertype_code;

        $query = $usertype->save(); //save your data to the model

        if ($query) {
            return redirect(route('admin.usertype.index'));
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
            'usertype_name' => 'required | unique:usertypes',
            'usertype_code' => 'required | unique:usertypes',
        ]);

        //if form validated successfuly then add new usertype
        
        $usertype->usertype_name = $request->usertype_name;
        $usertype->usertype_code = $request->usertype_code;

        $query = $usertype->save(); //save your data to the model

        if ($query) {
            return redirect(route('admin.usertype.index'));
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
        Usertypes::destroy($id);
        return redirect(route('admin.usertype.index'));
    }
}
