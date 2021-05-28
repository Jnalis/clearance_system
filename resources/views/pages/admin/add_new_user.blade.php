@extends('layouts.admin')
@section('title', 'Add user')

@section('selectCss')

<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
@endsection

@section('smallNavigation')
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('admin.staff.index') }}">User List</a></li>
        <li class="breadcrumb-item active">Add User</li>
    </ol>
</div><!-- /.col -->
@endsection

@section('content')
<div class="row">
    {{-- left column --}}
    <div class="col-md-1"></div>
    {{-- /.col (left) --}}


    {{-- center column --}}
    <div class="col-md-10">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Add new user</h3>
            </div>
            <!-- /.card-header -->

            <div class="card-body">


                <form role="form" action="{{ route('admin.staff.store') }}" method="POST">
                    @csrf
                    <div class="result">
                        {{-- @if (Session::get('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                    </div>
                    @endif --}}
                    @if (Session::get('fail'))
                    <div class="alert alert-danger">
                        {{ Session::get('fail') }}
                    </div>
                    @endif
            </div>
            {{-- names --}}
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label class="col-form-label" for="firstname">Firstname</label>
                        <input type="text" name="firstname" id="firstname" class="form-control"
                            placeholder="Enter firstname" value="{{ old('firstname') }}">
                        <span class="text-danger">@error('firstname') {{ $message }} @enderror</span>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label class="col-form-label" for="secondname">Secondname</label>
                        <input type="text" name="secondname" id="secondname" class="form-control"
                            placeholder="Enter secondname" value="{{ old('secondname') }}">
                        <span class="text-danger">@error('secondname') {{ $message }} @enderror</span>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label class="col-form-label" for="lastname">Lastname</label>
                        <input type="text" name="lastname" id="lastname" class="form-control"
                            placeholder="Enter lastname" value="{{ old('lastname') }}">
                        <span class="text-danger">@error('lastname') {{ $message }} @enderror</span>
                    </div>
                </div>
            </div>

            {{-- username --}}
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label class="col-form-label" for="username">Username (RegNo)</label>
                        <input type="text" name="username" id="username" class="form-control"
                            placeholder="Enter username" value="{{ old('username') }}">
                        <span class="text-danger">@error('username') {{ $message }} @enderror</span>
                    </div>
                </div>
            </div>



            {{-- usertype and department --}}
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="col-form-label" for="usertype">User Type</label>
                        <select name="usertype" id="usertype" class="select2" multiple="multiple"
                            data-placeholder="Select a Usertype" style="width: 100%;">
                            <option></option>

                            @foreach ($user_type as $item)

                            <option value="{{ $item->usertype_code }}" @if (old('usertype')=="$item->usertype_code" )
                                {{ 'selected' }} @endif>{{ $item->usertype_name }}</option>

                            @endforeach
                        </select>
                        <span class="text-danger">@error('usertype') {{ $message }} @enderror</span>
                    </div>
                </div>


                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="col-form-label" for="department">Department</label>
                        <select name="department" id="department" class="select2" multiple="multiple"
                            data-placeholder="Select a Department" style="width: 100%;">

                            <option></option>
                            @foreach ($depts as $dept)

                            <option value="{{ $dept->dept_code }}" @if (old('department')=="$dept->dept_code" )
                                {{ 'selected' }} @endif>
                                {{ $dept->dept_name }}</option>

                            @endforeach

                        </select>
                        <span class="text-danger">@error('department') {{ $message }} @enderror</span>
                    </div>
                </div>
            </div>


            {{-- password --}}
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="col-form-label" for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control"
                            placeholder="Enter password">
                        <span class="text-danger">@error('password') {{ $message }} @enderror</span>
                    </div>
                </div>


                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="col-form-label" for="password">Repeat Password</label>
                        <input type="password" name="password2" id="password" class="form-control"
                            placeholder="Repeat password">
                        <span class="text-danger">@error('password2') {{ $message }} @enderror</span>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-success btn-lg btn-block">Submit</button>
            </div>


            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
{{-- /.col (center) --}}

{{-- right column --}}
<div class="col-md-1"></div>
{{-- /.col (right) --}}
</div>
@endsection

@section('selectJs')

<!-- Select2 -->
<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>

<script>
    $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  })
</script>
@endsection