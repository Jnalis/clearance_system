@extends('layouts.hod')
@section('title', 'Comment')

@section('smallNavigation')
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('hod.home') }}">Home</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('hod.hodComment.index') }}">Comment List</a></li>
        <li class="breadcrumb-item active">Edit Comment</li>
    </ol>
</div><!-- /.col -->
@endsection

@section('content')
<div class="row">
    {{-- left column --}}
    <div class="col-md-3"></div>
    {{-- /.col (left) --}}


    {{-- center column --}}
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Comment</h3>
            </div>
            <!-- /.card-header -->

            <div class="card-body">

                <form role="form" action="{{ route('hod.hodComment.update', $comment->id) }}" method="POST">
                    @method('put')
                    @csrf
                    <div class="result">
                        @if (Session::get('fail'))
                        <div class="alert alert-danger">
                            {{ Session::get('fail') }}
                        </div>
                        @endif
                    </div>
                    {{-- names --}}
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="col-form-label" for="student_id">Student ID</label>

                                <select name="student_id" id="student_id" class="form-control select2bs4"
                                    data-placeholder="Select Student" style="width: 100%;">

                                    <option></option>

                                    @foreach ($students as $student)
                                    <option value="{{ $student->student_id }}" @if (old('student_id', $student->student_id)=="$student->student_id"
                                        ) {{ 'selected' }} @endif>
                                        {{ $student->student_id }}
                                    </option>
                                    @endforeach

                                </select>
                                <span class="text-danger">@error('student_id') {{ $message }} @enderror</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="col-form-label" for="comment_text">Comment Text</label>
                                <textarea class="form-control" name="comment_text" id="comment_text" cols="30"
                                    rows="5">{{ old('comment_text',$comment->comment_text) }}</textarea>
                                <span class="text-danger">@error('comment_text') {{ $message }} @enderror</span>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info btn-lg btn-block">Edit Comment</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.card -->
    </div>
    {{-- /.col (center) --}}

    {{-- right column --}}
    <div class="col-md-3"></div>
    {{-- /.col (right) --}}
</div>
@endsection