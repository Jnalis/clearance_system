@extends('layouts.dean')
@section('title','Comment')

@section('smallNavigation')
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ route('dean.home') }}">Home</a></li>
    <li class="breadcrumb-item active">Comment List</li>
  </ol>
</div><!-- /.col -->

@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">List of Allocated Resource</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <p>
            <a href="{{ route('dean.deanComment.create') }}" class="btn btn-info">Add comment</a>
        </p>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Student ID</th>
                    <th>Staff ID</th>
                    <th>Comment Text</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if (count($comments))
                    @foreach ($comments as $comment)
                        
                    <tr>
                        <td>{{ $comment->id }}</td>
                        <td>{{ $comment->student_id }}</td>
                        <td>{{ $comment->staff_id }}</td>
                        <td>{{ $comment->comment_text }}</td>
                        <td>
                            <a href="{{ route('dean.deanComment.edit', $comment->id) }}" class="btn btn-warning">Edit</a>
                            <a href="#" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                @else
                <tr>
                    <td colspan="5">No Comment Found</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
@endsection