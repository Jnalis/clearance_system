@extends('layouts.student')
@section('title', 'Clearance Form')

@section('smallNavigation')
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('student.home') }}">Home</a></li>
        <li class="breadcrumb-item active">Clearance form</li>
        </li>

    </ol>
</div><!-- /.col -->
@endsection

@section('content')

<div class="row">

    {{-- left column left --}}
    <div class="col-md-3"></div>



    {{-- center column --}}
    <div class="col-md-6">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title text-uppercase text-center">Please choose clearance type.</h3>
            </div>
            <!-- /.card-header -->

            <div class="card-body">

                <form role="form" method="POST" action="{{ route('student.storeClearance') }}">
                    @csrf


                    <div class="result">
                        @if (session('danger'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('danger') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true" style="color: white">&times;</span>
                            </button>
                        </div>
                        @endif

                        @if (session('info'))
                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                            {{ session('info') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true" style="color: white">&times;</span>
                            </button>
                        </div>
                        @endif
                    </div>

                    <div class="row">
                        <div class="col-sm-3"></div>

                        <div class="col-sm-6">
                            <!-- radio -->

                            <div class="form-group">
                                @foreach ($clearanceTypes as $clearanceType)
                                <div class="custom-control custom-radio">

                                    <input name="clearancetype" class="custom-control-input" type="radio"
                                        id="{{ $clearanceType->clearancetype }}"
                                        value="{{ $clearanceType->clearancetype }}" required>
                                    <label for="{{ $clearanceType->clearancetype }}"
                                        class="custom-control-label">{{ $clearanceType->clearancetype }}</label>

                                </div>
                                @endforeach
                            </div>

                        </div>

                        <div class="col-sm-3"></div>
                    </div>

                    <div class="card-footer">
                        <div class="row">
                            <div class="col-xs-3 col-md-3 p-3"></div>

                            <div class="col-xs-3 col-md-3 p-3">
                                <button type="submit" class="btn btn-primary">Select</button>
                            </div>

                            <div class="col-xs-3 col-md-3 p-3">
                                <button type="reset" class="btn btn-danger">Clear</button>
                            </div>

                            <div class="col-xs-3 col-md-3 p-3"></div>
                        </div>
                    </div>
                </form>

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->


        {{-- right column left --}}
        <div class="col-md-3"></div>


    </div>
    @endsection