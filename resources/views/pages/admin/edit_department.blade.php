@extends('layouts.admin')
@section('title', 'Edit department')

@section('smallNavigation')
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
      <li class="breadcrumb-item active"><a href="{{ route('admin.department.index') }}">Department List</a></li>
      <li class="breadcrumb-item active">Edit Department</li>
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
                <h3 class="card-title">Edit Department</h3>
            </div>
            <!-- /.card-header -->

            <div class="card-body">

                <form role="form" action="{{ route('admin.department.update',$department->id) }}" method="post">
                    @method('put')
                    @csrf
                    <div class="result">
                        {{-- @if (Session::get('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                        @endif --}}
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
                                <label class="col-form-label" for="dept_name">Department name</label>
                                <input type="text" name="dept_name" id="dept_name" class="form-control"
                                    placeholder="Department name" 
                                    value="{{ old('dept_name', $department->dept_name) }}">
                                <span class="text-danger">@error('dept_name') {{ $message }} @enderror</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="col-form-label" for="dept_code">Department code</label>
                                <input type="text" name="dept_code" id="dept_code" class="form-control"
                                    placeholder="Department code" 
                                    value="{{ old('dept_code', $department->dept_code) }}">
                                <span class="text-danger">@error('dept_code') {{ $message }} @enderror</span>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Edit Department</button>
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