<?php

namespace App\Http\Controllers\HOD;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HodCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $staffID = Auth::user()->user_id;

        $arr['comment'] = Student::join('comments', 'comments.comment_to', '=', 'students.student_id')->where('comments.added_by', '=', $staffID)->get();

        return view('pages.hod.view_comment')->with($arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $arrS['student'] = Student::all();
        return view('pages.hod.add_comment')->with($arrS);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Comment $comment)
    {
        //
        //  return $request->input();

        $request->validate([
            'student_id' => 'required',
            'comment_text' => 'required',
        ]);

        $staffID = Auth::user()->user_id;

        $comment->comment_text = $request->comment_text;
        $comment->comment_to = $request->student_id;
        $comment->added_by = $staffID;

        $query = $comment->save();

        if ($query) {
            return redirect(route('hod.hodComment.index'))->with('success', 'Comment added successfully');
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
    public function edit($comment)
    {

        $students = Student::all();

        $comment = Comment::find($comment);

        return view('pages.hod.edit_comment', [
            'comment' => $comment,
            'students' => $students
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
        //return $request->input();

        $request->validate([
            'student_id' => 'required',
            'comment_text' => 'required',
        ]);


        $commentID = $request->segment(3);

        $query = Comment::where('id', $commentID)
            ->update([
                'comment_text' => $request->comment_text,
                'comment_to' => $request->student_id,
                'added_by' => Auth::user()->user_id,

            ]);

        if ($query) {
            return redirect(route('hod.hodComment.index'))->with('success', 'Comment edited successfully');
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


        Comment::destroy($id);
        return redirect(route('hod.hodComment.index'))->with('success', 'Comment deleted successfully');
    }
}
