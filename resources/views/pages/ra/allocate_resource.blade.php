@extends('layouts.ra')
@section('title', 'Allocate Resource')


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
        <li class="breadcrumb-item"><a href="{{ route('ra.home') }}">Home</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('ra.resource.index') }}">Resource list</a></li>
        <li class="breadcrumb-item active">Allocate resource</li>

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
                <h3 class="card-title">Allocate resource</h3>
            </div>
            <!-- /.card-header -->

            <div class="card-body">


                <form role="form" action="{{ route('ra.allocatedResource.store') }}" method="POST">
                    @csrf
                    
            {{-- names --}}
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label class="col-form-label" for="resource_type">Select Resource</label>
                        <select name="resource_type" id="resource_type" class="select2" multiple="multiple"
                        data-placeholder="Select Resource" style="width: 100%;">
                            <option></option>

                            @foreach ($resource as $item)

                            <option value="{{ $item->resource_type }}" @if (old('resource_type')=="$item->resource_type"
                                ) {{ 'selected' }} @endif>
                                {{ $item->resource_type }}</option>

                            @endforeach
                            
                        </select>
                        <span class="text-danger">@error('resource_type') {{ $message }} @enderror</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label class="col-form-label" for="select_custodian">Select Custodian</label>
                        <select name="select_custodian" id="select_custodian" class="select2" multiple="multiple"
                        data-placeholder="Select custodian of resource" style="width: 100%;">
                            <option></option>

                            @foreach ($custodian as $item)

                            <option value="{{ $item->fullname }}" @if (old('select_custodian')=="$item->username"
                                ) {{ 'selected' }} @endif>
                                {{ $item->fullname  }}</option>

                            @endforeach

                        </select>
                        <span class="text-danger">@error('select_custodian') {{ $message }} @enderror</span>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-info btn-lg btn-block">Allocate Resource</button>
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