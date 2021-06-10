@extends('layouts.registrar')
@section('title', 'Registrar | Clearance')

@section('smallNavigation')
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="{{ route('registrar.home') }}">Home</a></li>
      <li class="breadcrumb-item active"><a href="{{ route('registrar.clearancetype.index') }}">Clearance Type List</a></li>
      <li class="breadcrumb-item active">Edit Clearance Type</li>
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
                <h3 class="card-title">Edit Clearance Type</h3>
            </div>
            <!-- /.card-header -->

            <div class="card-body">

                <form role="form" action="{{ route('registrar.clearancetype.update', $clearance->id) }}" method="POST">
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
                                <label class="col-form-label" for="clearance_name">Clearance name</label>
                                <input type="text" name="clearance_name" id="clearance_name" class="form-control @error('clearance_name') is-invalid @enderror"
                                    placeholder="Clearance name" value="{{ old('clearance_name', $clearance->clearancetype) }}">
                                <span class="text-danger">@error('clearance_name') {{ $message }} @enderror</span>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="col-form-label" for="clearance_code">Clearance code</label>
                                <input type="text" name="clearance_code" id="clearance_code" class="form-control"
                                    placeholder="Clearance code" value="{{ old('clearance_code') }}">
                                <span class="text-danger">@error('clearance_code') {{ $message }} @enderror</span>
                            </div>
                        </div>
                    </div> --}}
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Edit new Clearance</button>
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