@extends('layouts.hod')
@section('title', 'Issue Resource')


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
        <li class="breadcrumb-item"><a href="{{ route('hod.home') }}">Home</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('hod.allocatedResource.index') }}">Resource List</a></li>
        <li class="breadcrumb-item active">Issue resource</li>
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
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Issue a Resource</h3>
            </div>
            <!-- /.card-header -->

            <div class="card-body">


                <form role="form" action="{{ route('hod.allocatedResource.store') }}" method="POST">
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
                                <label class="col-form-label" for="student_reg_no">Student Reg No</label>

                                <select name="student_reg_no" id="student_reg_no" class="select2" multiple="multiple"
                                data-placeholder="Select a student registration no" style="width: 100%;">
                                <option></option>

                                @foreach ($student as $item)
                                <option value="{{ $item->student_id }}" @if (old('student_reg_no')=="$item->student_id"
                                    ) {{ 'selected' }} @endif>
                                    {{ $item->student_id }}
                                </option>
                                @endforeach

                                </select>
                                <span class="text-danger">@error('student_reg_no') {{ $message }} @enderror</span>
                                
                            </div>
                        </div>
                    </div>
                    {{-- resource --}}
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="col-form-label" for="resource_type">Resource Type</label>
                                <select name="resource_type" id="resource_type" class="select2" multiple="multiple"
                                data-placeholder="Select Resource" style="width: 100%;">

                                    <option></option>

                                    @foreach ($data as $item)
                                    <option value="{{ $item->resource_type }}" 
                                        @if (old('resource_type')=="$item->resource_type" ) {{ 'selected' }} @endif>
                                        {{ $item->resource_type }}
                                    </option>
                                    @endforeach

                                </select>
                                <span class="text-danger">@error('resource_type') {{ $message }} @enderror</span>
                            </div>
                        </div>
                    </div>
                    {{-- usertype and department --}}
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