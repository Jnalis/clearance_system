<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ViewCommentController extends Controller
{
    //
    public function index(){
        $id = Student::select('id')->firstWhere('student_id', '=', Auth::user()->user_id)->id;

        $comments = Comment::where('comment_to', '=', $id)->get();
        return view('pages.student.view_comment', ['comments' => $comments]);
    }
}
