@extends('layouts.hod')
@section('title', 'Issue Resource')
@section('content')
<div class="row">
    {{-- left column --}}
    <div class="col-md-1"></div>
    {{-- /.col (left) --}}


    {{-- center column --}}
    <div class="col-md-10">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Issue a Resource</h3>
            </div>
            <!-- /.card-header -->

            <div class="card-body">


                <form role="form" action="{{ route('hod.allocatedResource.store') }}" method="POST">
                    @csrf
                    <div class="result">
                        @if (Session::get('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                        @endif
                        @if (Session::get('fail'))
                        <div class="alert alert-danger">
                            {{ Session::get('fail') }}
                        </div>
                        @endif
                    </div>
                    {{-- names --}}
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label" for="student_name">Student Full Name</label>
                                <input type="text" name="student_name" id="student_name" class="form-control"
                                    placeholder="Student full name" value="{{ old('student_name') }}">
                                <span class="text-danger">@error('student_name') {{ $message }} @enderror</span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label" for="student_reg_no">Student Reg No</label>
                                <input type="text" name="student_reg_no" id="student_reg_no" class="form-control"
                                    placeholder="Student Reg No" value="{{ old('student_reg_no') }}">
                                <span class="text-danger">@error('student_reg_no') {{ $message }} @enderror</span>
                            </div>
                        </div>
                    </div>
                    {{-- resource --}}
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="col-form-label" for="resource_type">Resource Type</label>
                                <select name="resource_type" id="resource_type" class="form-control">
                                    <option></option>
                                    <option value="Flash1" @if (old('resource_type')=="Flash1" ) {{ 'selected' }}
                                        @endif>
                                        Flash1
                                    </option>
                                    <option value="Flash2" @if (old('resource_type')=="Flash2" ) {{ 'selected' }}
                                        @endif>
                                        Flash2
                                    </option>
                                    <option value="Flash3" @if (old('resource_type')=="Flash3" ) {{ 'selected' }}
                                        @endif>
                                        Flash3
                                    </option>
                                </select>
                                <span class="text-danger">@error('resource_type') {{ $message }} @enderror</span>
                            </div>
                        </div>
                    </div>
                    {{-- usertype and depertment --}}
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="col-form-label" for="date_to_return">Returned Date</label>
                                <input type="date" name="date_to_return" id="date_to_return" class="form-control"
                                    value="{{ old('date_to_return') }}">
                                <span class="text-danger">@error('date_to_return') {{ $message }} @enderror</span>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-info btn-lg btn-block">Issue Resource</button>
                    </div>


                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    {{-- /.col (center) --}}

    {{-- right column --}}
    <div class="col-md-1"></div>
    {{-- /.col (right) --}}
</div>
@endsection