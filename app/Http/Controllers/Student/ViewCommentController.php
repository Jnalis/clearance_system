<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Staff;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ViewCommentController extends Controller
{
    //
    public function index(){

        
        $currentStudent = Auth::user()->user_id;

        $comments = Staff::select([
            'staff.username',
            'staff.fullname',
            'comments.comment_text',
        ])
            ->join('comments', 'comments.added_by', '=', 'staff.username')
            ->where('comments.comment_to', '=', $currentStudent)->get();

        return view('pages.student.view_comment', ['comments' => $comments]);
    }
}
