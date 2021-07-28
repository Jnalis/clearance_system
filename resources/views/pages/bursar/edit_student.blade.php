@extends('layouts.bursar')
@section('title', 'Edit Student Fee')


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
        <li class="breadcrumb-item"><a href="{{ route('bursar.home') }}">Home</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('bursar.student.index') }}">Student List</a></li>
        <li class="breadcrumb-item active">Edit Student Fee</li>
    </ol>
</div><!-- /.col -->
@endsection

@section('content')
<div class="row">
    {{-- left column --}}
    <div class="col-md-1"></div>
    {{-- /.col (left) --}}


    {{-- center column --}}
    <div class="col-md-10">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Student Fee</h3>
            </div>
            <!-- /.card-header -->

            <div class="card-body">


                <form role="form" action="{{ route('bursar.student.update', $students->id) }}" method="POST">
                    @method('put')
                    @csrf
                    <div class="result">
                        @if (Session::get('warning'))
                        <div class="alert alert-warning">
                            {{ Session::get('warning') }}
                        </div>
                        @endif
                    </div>
                    {{-- names --}}
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="col-form-label" for="fullname">Fullname</label>
                                <input type="text" name="fullname" id="fullname" class="form-control"
                                    placeholder="Enter fullname" value="{{ old('fullname',$students->fullname.', '.$students->student_id) }}" disabled>
                                <span class="text-danger">@error('fullname') {{ $message }} @enderror</span>
                            </div>
                        </div>
                    </div>
                    {{-- username --}}

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="col-form-label" for="fee_status">Fee Status</label>
                                <select name="fee_status" id="fee_status" class="form-control select2" style="width: 100%;"
                                    data-placeholder="Select fee status">
                                    <option></option>

                                    <option value="PAID" @if (old('fee_status',$students->fee_status)) {{ 'selected' }} @endif>PAID</option>
                                    <option value="UNPAID" @if (old('fee_status',$students->fee_status)) {{ 'selected' }} @endif>UNPAID</option>
                                </select>
                                {{-- <br>
                                <small>NB: Fee status is either PAID or  UNPAID</small>
                                <input type="text" name="fee_status" id="fee_status" class="form-control"
                                    placeholder="Enter fee status" value="{{ old('fee_status',$students->fee_status) }}" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);"> --}}
                                <span class="text-danger">@error('fee_status') {{ $message }} @enderror</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Change</button>
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