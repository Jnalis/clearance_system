@extends('layouts.ra')
@section('title', 'Add Resource')

@section('smallNavigation')
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ route('ra.home') }}">Home</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('ra.resource.index') }}">Resource list</a></li>
    <li class="breadcrumb-item active">Add resource</li>
    
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
                <h3 class="card-title">Add a new resource</h3>
            </div>
            <!-- /.card-header -->

            <div class="card-body">


                <form role="form" action="{{ route('ra.resource.store') }}" method="POST">
                    @csrf
                    
                    {{-- names --}}
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="col-form-label" for="resource_name">Resource name</label>
                                <input type="text" name="resource_name" id="resource_name" class="form-control"
                                    placeholder="Resource name" value="{{ old('resource_name') }}">
                                <span class="text-danger">@error('resource_name') {{ $message }} @enderror</span>
                            </div>
                        </div>
                    </div>
                    {{-- resource --}}
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="col-form-label" for="resource_amount">Resource Value(Tshs)</label>
                                <input type="text" name="resource_amount" id="resource_amount" class="form-control"
                                    placeholder="Resource Amount" value="{{ old('resource_amount') }}">
                                <span class="text-danger">@error('resource_amount') {{ $message }} @enderror</span>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-info btn-lg btn-block">Add Resource</button>
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