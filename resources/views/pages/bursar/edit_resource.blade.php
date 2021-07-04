@extends('layouts.bursar')
@section('title', 'Edit Resource Status')


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
        <li class="breadcrumb-item active"><a href="{{ route('bursar.resource.index') }}">Resource List</a></li>
        <li class="breadcrumb-item active">Change Resource Status</li>
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
                <h3 class="card-title">Change Resource Status</h3>
            </div>
            <!-- /.card-header -->

            <div class="card-body">


                <form role="form" action="{{ route('bursar.resource.update', $resources->id) }}" method="POST">
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
                                    placeholder="Enter fullname" value="{{ old('fullname',$studentInfo->fullname.', '.$studentInfo->student_id) }}" disabled>
                                <span class="text-danger">@error('fullname') {{ $message }} @enderror</span>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="col-form-label" for="resource">Resource</label>
                                <input type="text" name="resource" id="resource" class="form-control"
                                    placeholder="Enter resource" value="{{ old('resource',$resourceInfo->resource_type.', '.$resourceInfo->resource_amount) }}" disabled>
                                <span class="text-danger">@error('resource') {{ $message }} @enderror</span>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="col-form-label" for="resource_status">Resource Status</label>
                                <br>
                                <small>NB: Resource status is either REFUNDED or  NOT REFUNDED</small>
                                <input type="text" name="resource_status" id="resource_status" class="form-control"
                                    placeholder="Enter Resource Status" value="{{ old('resource_status',$resources->refunded_status) }}" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);">
                                <span class="text-danger">@error('resource_status') {{ $message }} @enderror</span>
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