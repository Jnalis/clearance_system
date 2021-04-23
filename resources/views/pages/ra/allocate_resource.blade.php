@extends('layouts.ra')
@section('title', 'Allocate Resource')

@section('smallNavigation')
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('ra.home') }}">Home</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('ra.resource.index') }}">Reseource list</a></li>
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
                        <select name="resource_type" id="resource_type" class="form-control">
                            <option>--select resource--</option>

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
                        <select name="select_custodian" id="select_custodian" class="form-control">
                            <option>--select custodian--</option>

                            @foreach ($custodian as $item)

                            <option value="{{ $item->firstname.' '.$item->secondname.' '.$item->lastname }}" @if (old('select_custodian')=="$item->username"
                                ) {{ 'selected' }} @endif>
                                {{ $item->firstname.' '.$item->secondname.' '.$item->lastname  }}</option>

                            @endforeach

                            {{-- <option value="Flash1" @if (old('select_custodian')=="Flash1" ) {{ 'selected' }} @endif>
                                Hayuma
                            </option>
                            <option value="Flash2" @if (old('select_custodian')=="Flash2" ) {{ 'selected' }} @endif>
                                Chris
                            </option>
                            <option value="Flash3" @if (old('select_custodian')=="Flash3" ) {{ 'selected' }} @endif>
                                Runyoro
                            </option> --}}
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