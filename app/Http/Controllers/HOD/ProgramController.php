<?php

namespace App\Http\Controllers\HOD;

use App\Http\Controllers\Controller;
use App\Models\Departments;
use App\Models\Program;
use App\Models\Staff;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       /** This return single dept depending on hod dept */
        $d = Staff::select(['dept_code'])->firstWhere('id', '=', auth()->user()->id)->dept_code;
        // //  echo $d;
        // //  die();
        //$arr['program'] = Program::all();
        $arr['program'] = Program::where('dept_code', '=', $d)->get();

        return view('pages.hod.view_program')->with($arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $arr['department'] = Departments::all();
        return view('pages.hod.add_program')->with($arr);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Program $program)
    {
        //return request()->input();

        $request->validate([
            'prog_name' => 'required | unique:programs',
            'prog_code' => 'required | unique:programs',
            'department' => 'required',
        ]);

        $program->prog_name = $request->prog_name;
        $program->prog_code = $request->prog_code;
        $program->added_by = auth()->id();
        $program->dept_code = $request->department;
        
        $query = $program->save();

        if ($query) {
            return redirect(route('hod.program.index'))->with('success','Program added successfull');
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
    public function edit(Program $program)
    {
        //
        $arr['program'] = $program;
        $arrD['department'] = Departments::all();
        return view('pages.hod.edit_program')->with($arr)->with($arrD);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Program $program)
    {
        //return request()->input();

        $request->validate([
            'prog_name' => 'required | unique:programs',
            'prog_code' => 'required | unique:programs',
            'department' => 'required',
        ]);

        $program->prog_name = $request->prog_name;
        $program->prog_code = $request->prog_code;
        $program->added_by = auth()->id();
        $program->dept_code = $request->department;
        
        $query = $program->save();

        if ($query) {
            return redirect(route('hod.program.index'))->with('success','Program added successfull');
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
        Program::destroy($id);
        return redirect(route('hod.program.index'))->with('success','Program deleted successfull');
    }
}
