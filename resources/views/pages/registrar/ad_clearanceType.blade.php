@extends('layouts.registrar')
@section('title', 'Registrar | Clearance')

@section('smallNavigation')
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="{{ route('registrar.home') }}">Home</a></li>
      <li class="breadcrumb-item active"><a href="{{ route('registrar.clearancetype.index') }}">Clearance Type List</a></li>
      <li class="breadcrumb-item active">Add Clearance Type</li>
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
                <h3 class="card-title">Add Clearance Type</h3>
            </div>
            <!-- /.card-header -->

            <div class="card-body">

                <form role="form" action="{{ route('registrar.clearancetype.store') }}" method="POST">
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
                                    placeholder="Clearance name" value="{{ old('clearance_name') }}">
                                <span class="text-danger">@error('clearance_name') {{ $message }} @enderror</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Add new Clearance</button>
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