<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Departments;

class DepartmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //this function include the logic of fetching all the available departments from the db
    public function index()
    {
        //getting all the departments
        $arr['depts'] = Departments::all();
        return view('pages.admin.view_department')->with($arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //function which return a view
    public function create()
    {
        return view('pages.admin.add_department');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //the function to storre department data to db
    public function store(Request $request, Departments $department)
    {
        // checking if you gett all the data from the form
        //return $request->input();

        //now validating a form
        $request->validate([
            'dept_name' => 'required | unique:departments',
            'dept_code' => 'required | unique:departments',
        ]);

        //if form validated successfuly then add new user as staff
        
        $department->dept_name = $request->dept_name;
        $department->dept_code = $request->dept_code;
        $query = $department->save(); //save your data to the model

        if ($query) {
            return redirect(route('admin.department.index'));
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
    public function edit(Departments $department)

    {
        $arr['department'] = $department;
        return view('pages.admin.edit_department')->with($arr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Departments $department)
    {
        // checking if you gett all the data from the form
        //return $request->input();

        // now validating a form
        $request->validate([
            'dept_name' => 'required | unique:departments',
            'dept_code' => 'required | unique:departments',
        ]);

        // if form validated successfuly then add new user as staff
        
        $department->dept_name = $request->dept_name;
        $department->dept_code = $request->dept_code;
        $query = $department->save(); //save your data to the model

        if ($query) {
            return redirect(route('admin.department.index'));
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
