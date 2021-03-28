@extends('layouts.loginLayout')
@section('title','Login')
@section('content')
<div class="login-box">
  <div class="login-logo">
    <p class="">NIT Student Clearance System</p>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="{{ route('checkuser') }}" method="post">
        @csrf
        <div class="result">
          @if (Session::get('fail'))
          <div class="alert alert-danger">
            {{ Session::get('fail') }}
          </div>
          @endif
        </div>
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" name="username" class="form-control" placeholder="Enter username" id="username"
            value="{{ old('username') }}">
          <span class="text-danger">@error('username') {{ $message }} @enderror</span>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" name="password" class="form-control" placeholder="Enter password" id="password">
          <span class="text-danger">@error('password') {{ $message }} @enderror</span>
        </div>
        <div class="form-group form-check">
          <label class="form-check-label">
            <input class="form-check-input" type="checkbox"> Remember me
          </label>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>


      <p class="mb-2 mt-2 text-center">
        <a href="" class="text-danger">I forgot my password</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
@endsection