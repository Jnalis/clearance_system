@extends('layouts.bursar')
@section('title', 'Issue Caution Money')


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
        <li class="breadcrumb-item active">Issue Caution Money</li>
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
                <h3 class="card-title">Issue Caution Money</h3>
            </div>
            <!-- /.card-header -->

            <div class="card-body">


                <form role="form" action="{{ route('bursar.issue', $students->id) }}" method="POST">
                    @csrf
                    <div class="result">
                        @if (Session::get('warning'))
                        <div class="alert alert-warning">
                            {{ Session::get('warning') }}
                        </div>
                        @endif
                    </div>
                    {{-- names --}}
                    {{-- {{  $students->id }} --}}
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
                                <label class="col-form-label" for="caution_money_status">Caution Money Status</label>
                                <select name="caution_money_status" id="caution_money_status" class="form-control select2" style="width: 100%;"
                                    data-placeholder="Select caution money status">
                                    <option></option>

                                    <option value="ISSUED" @if (old('caution_money_status',$students->caution_money_status)) {{ 'selected' }} @endif>ISSUE</option>
                                    {{-- <option value="NOT ISSUED" @if (old('caution_money_status',$students->caution_money_status)) {{ 'selected' }} @endif>NOT ISSUED</option> --}}
                                </select>
                              
                                <span class="text-danger">@error('caution_money_status') {{ $message }} @enderror</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Issue Caution Money</button>
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