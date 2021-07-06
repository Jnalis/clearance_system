<?php

namespace App\Http\Controllers\Registrar;

use App\Http\Controllers\Controller;
use App\Models\Clearancetype;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClearancetypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $arr['clearance'] = Clearancetype::all();
        return view('pages.registrar.view_clearance_type')->with($arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         return view('pages.registrar.ad_clearanceType');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Clearancetype $clearancetype)
    {
        // return $request->input();

        $request->validate([
            'clearance_name' => 'required',
        ]);

        $clearancetype->clearancetype = $request->clearance_name;
        $clearancetype->added_by = Auth::user()->user_id;

        $query = $clearancetype->save();

        if ($query) {
            return redirect(route('registrar.clearancetype.index'))->with('success', 'Clearance type added successfully');
        } else {
            return back()->with('fail', 'Something is wrong');
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
    public function edit(Clearancetype $clearancetype)
    {
        $arr['clearance'] = $clearancetype;
        return view('pages.registrar.edit_clearancetype')->with($arr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clearancetype $clearancetype)
    {
        // return $request->input();

        $request->validate([
            'clearance_name' => 'required',
        ]);

        $clearancetype->clearancetype = $request->clearance_name;
        $clearancetype->added_by = Auth::user()->user_id;

        $query = $clearancetype->save();

        if ($query) {
            return redirect(route('registrar.clearancetype.index'))->with('success', 'Clearance type updated successfully');
        } else {
            return back()->with('fail', 'Something is wrong');
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
        Clearancetype::destroy($id);
        return redirect(route('registrar.clearancetype.index'))->with('danger', 'Clearance type deleted successfully');
    }
}
