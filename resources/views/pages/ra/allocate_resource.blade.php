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


                <form role="form" action="" method="POST">
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
                                <label class="col-form-label" for="select_resource">Select Resource</label>
                                <select name="select_resource" id="select_resource" class="form-control">
                                    <option></option>
                                    <option value="Flash1" @if (old('select_resource')=="Flash1" ) {{ 'selected' }}
                                        @endif>
                                        Flash1
                                    </option>
                                    <option value="Flash2" @if (old('select_resource')=="Flash2" ) {{ 'selected' }}
                                        @endif>
                                        Flash2
                                    </option>
                                    <option value="Flash3" @if (old('select_resource')=="Flash3" ) {{ 'selected' }}
                                        @endif>
                                        Flash3
                                    </option>
                                </select>
                                <span class="text-danger">@error('select_resource') {{ $message }} @enderror</span>
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
                                        Flash1
                                    </option>
                                    <option value="Flash2" @if (old('select_custodian')=="Flash2" ) {{ 'selected' }}
                                        @endif>
                                        Flash2
                                    </option>
                                    <option value="Flash3" @if (old('select_custodian')=="Flash3" ) {{ 'selected' }}
                                        @endif>
                                        Flash3
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