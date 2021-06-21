@extends('layouts.dean')
@section('title', 'Comment')


@section('selectCss')
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
@endsection

@section('smallNavigation')
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="{{ route('dean.home') }}">Home</a></li>
      <li class="breadcrumb-item active"><a href="{{ route('dean.deanComment.index') }}">Comment List</a></li>
      <li class="breadcrumb-item active">Add Comment</li>
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
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Add new comment</h3>
            </div>
            <!-- /.card-header -->

            <div class="card-body">

                <form role="form" action="{{ route('dean.deanComment.store') }}" method="POST">
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

                                    @foreach ($student as $item)
                                    <option value="{{ $item->student_id }}" @if (old('student_id')=="$item->student_id"
                                        ) {{ 'selected' }} @endif>
                                        {{ $item->student_id }}
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
                                <textarea class="form-control" name="comment_text" id="comment_text" cols="30" rows="5">{{ old('comment_text') }}</textarea>
                                <span class="text-danger">@error('comment_text') {{ $message }} @enderror</span>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info btn-lg btn-block">Add Comment</button>
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

@section('selectJs')

<!-- Select2 -->
<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>

<script>
    $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  })
</script>
@endsection