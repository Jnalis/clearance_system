@extends('layouts.registrar')
@section('title', 'Issue certificate')


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
        <li class="breadcrumb-item"><a href="{{ route('registrar.home') }}">Home</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('registrar.certificate.index') }}">Certificate List</a>
        </li>
        <li class="breadcrumb-item active">Issue Certificate</li>
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
                <h3 class="card-title">Issue Certificate</h3>
            </div>
            <!-- /.card-header -->

            <div class="card-body">


                <form role="form" action="{{ route('registrar.clearance.update', $clearanceID) }}" method="POST">
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
                                    placeholder="Enter fullname"
                                    value="{{ old('fullname',$studentName.', '.$clearanceStudentId) }}" disabled>
                                <span class="text-danger">@error('fullname') {{ $message }} @enderror</span>
                            </div>
                        </div>
                    </div>
                    {{-- username --}}

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="col-form-label" for="certificateStatus">Issue certificate</label>

                                <select name="certificateStatus" id="certificateStatus" class="form-control select2bs4"
                                    data-placeholder="Select Status" style="width: 100%;">

                                    <option></option>
                                    <option value="ISSUED">Issued</option>

                                </select>
                                
                                <span class="text-danger">@error('certificateStatus') {{ $message }} @enderror</span>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Issue certificate</button>
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