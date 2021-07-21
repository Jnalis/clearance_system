@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <p class="login_title">NIT Student Clearance System</p>

            <div class="card">

                <div class="card-body">
                    <div class="row no-gutters">
                        <div class="col-md-5 text-center">
                            <img src="{{ asset('dist/img/nit.png') }}" alt="">

                            <p class="underLogo">
                                National Institute of Transport
                            </p>
                        </div>


                        <div class="col-md-1">
                            <div class="verticalLine"></div>
                        </div>


                        <div class="col-md-6">
                            <p class="login text-center">Welcome Back!</p>

                            <div class="result">
                                @if (session('fail'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ session('fail') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @endif
                            </div>

                            <div class="result">
                                @if (session('info'))
                                <div class="alert alert-info" role="alert">
                                    {{ session('info') }}
                                </div>
                                @endif
                            </div>

                            <div class="result">
                                @if (session('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                                </div>
                                @endif
                            </div>


                            <form method="POST" action="{{ route('login') }}" id="hideForm">
                                @csrf


                                <div class="form-group">
                                    <label for="user_id">Username</label>
                                    <input type="text" name="user_id" id="user_id"
                                        class="form-control @error('user_id') is-invalid @enderror"
                                        placeholder="Username" value="{{ old('user_id') }}"
                                        oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);">

                                    @error('user_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        placeholder="Password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-success btn-block">Login</button>

                            </form>
                            <p class="pt-3 text-center">Student! click
                                <a href="javascript:void(0)" id="showdiv">here</a>
                                if it's the first time
                            </p>

                            <form action="{{ route('newStudent') }}" method="post" id="divToShow" style="display:none;">
                                @csrf
                                <div class="form-group">
                                    <label for="reg_no">Registration Number</label>
                                    <input type="text" name="reg_no" id="reg_no"
                                        class="form-control @error('reg_no') is-invalid @enderror"
                                        placeholder="Username" value="{{ old('reg_no') }}"
                                        oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);">

                                    @error('reg_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('showHiddenDiv')
<script src="{{ asset('jquery-1.7.min.js') }}"></script>
<script>
    $(document).ready(function () {
    $("#showdiv").click(function () {
       $("#hideForm").toggle(1000);             
       $("#divToShow").toggle(1000);             
    });
  });
</script>
@endsection

