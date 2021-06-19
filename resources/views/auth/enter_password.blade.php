@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <p class="login_title">nscs</p>

            <div class="card">
                <div class="card-header text-center">NIT Student Clearance System</div>


                <div class="card-body">
                    <div class="result">
                        @if (session('danger'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('danger') }}
                        </div>
                        @endif
                    </div>

                    <form method="POST" action="{{ route('passwordStore') }}" id="hideForm">
                        @csrf
                        <div class="result">
                            @if (Session::get('fail'))
                            <div class="alert alert-danger">
                                {{ Session::get('fail') }}
                            </div>
                            @endif
                        </div>

                        <input type="hidden" name="user_id" value="{{ $studentID }}">

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password"
                                class="form-control @error('password') is-invalid @enderror" placeholder="Password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">Confirm Password</label>
                            <input type="password" name="password_confirmation" id="confirm_password"
                                class="form-control @error('confirm_password') is-invalid @enderror" placeholder="Confirm Password">

                            @error('confirm_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg">Save</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


