@extends('layouts.ra')
@section('title', 'Allocate Resource')
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


                <form role="form" action="{{ route('ra.viewDeptRA.store') }}" method="POST">
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
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="col-form-label" for="resource_type">Select Resource</label>
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
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="col-form-label" for="select_custodian">Select Custodian</label>
                                <select name="select_custodian" id="select_custodian" class="form-control">
                                    <option></option>
                                    <option value="Flash1" @if (old('select_custodian')=="Flash1" ) {{ 'selected' }}
                                        @endif>
                                        Hayuma
                                    </option>
                                    <option value="Flash2" @if (old('select_custodian')=="Flash2" ) {{ 'selected' }}
                                        @endif>
                                        Chris
                                    </option>
                                    <option value="Flash3" @if (old('select_custodian')=="Flash3" ) {{ 'selected' }}
                                        @endif>
                                        Runyoro
                                    </option>
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