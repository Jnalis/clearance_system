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
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title text-uppercase">Please choose the type of clearance you want carefully</h3>
            </div>
            <!-- /.card-header -->

            <div class="card-body">

                <form role="form" method="POST" action="{{ route('student.storeClearance') }}">
                    @csrf

                    {{-- <div class="result">
                        @if (Session::get('danger'))
                        <div class="alert alert-danger">
                            {{ Session::get('danger') }}
                        </div>
                        @endif
                    </div> --}}
                    <div class="result">
                        @if (session('danger'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                          {{ session('danger') }}
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        @endif
                      </div>

                    <div class="row">
                        <div class="col-sm-3"></div>

                        <div class="col-sm-6">
                            <!-- radio -->

                            @foreach ($clearanceTypes as $clearanceType)
                            <div class="form-group">
                                <div class="custom-control custom-radio">

                                    <input name="clearancetype" class="custom-control-input" type="radio"
                                        id="{{ $clearanceType->clearancetype }}"
                                        value="{{ $clearanceType->clearancetype }}">
                                    <label for="{{ $clearanceType->clearancetype }}"
                                        class="custom-control-label">{{ $clearanceType->clearancetype }}</label>

                                </div>
                            </div>
                            @endforeach

                        </div>

                        <div class="col-sm-3"></div>
                    </div>

                    <div class="card-footer">
                        <div class="row">
                            <div class="col-sm-3"></div>

                            <div class="col-sm-3">
                                <button type="submit" class="btn btn-primary">Select</button>
                            </div>

                            <div class="col-sm-3">
                                <button type="reset" class="btn btn-danger">Clear</button>
                            </div>

                            <div class="col-sm-3"></div>
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