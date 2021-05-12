@extends('layouts.admin')
@section('title', 'Edit user')

@section('smallNavigation')
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('admin.staff.index') }}">User List</a></li>
        <li class="breadcrumb-item active">Edit User</li>
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
                <h3 class="card-title">Edit user</h3>
            </div>
            <!-- /.card-header -->

            <div class="card-body">


                <form role="form" action="{{ route('admin.staff.update', $staff->id) }}" method="POST">
                    @method('put')
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
                <div class="col-sm-12">
                    <div class="form-group">
                        <label class="col-form-label" for="fullname">Fullname</label>
                        <input type="text" name="fullname" id="fullname" class="form-control"
                            placeholder="Enter fullname" value="{{ old('fullname',$staff->fullname) }}">
                        <span class="text-danger">@error('fullname') {{ $message }} @enderror</span>
                    </div>
                </div>
            </div>
            {{-- username --}}
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label class="col-form-label" for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control"
                            placeholder="Enter username" value="{{ old('username',$staff->username) }}">
                        <span class="text-danger">@error('username') {{ $message }} @enderror</span>
                    </div>
                </div>
            </div>
            {{-- usertype and depertment --}}
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="col-form-label" for="usertype">User Type</label>
                        <select name="usertype" id="usertype" class="form-control">
                            <option></option>

                            @foreach ($user_type as $item)

                            <option value="{{ $item->usertype_code }}" @if (old('usertype',$staff->usertype) ==
                                "$item->usertype_code" )
                                {{ 'selected' }} @endif>{{ $item->usertype_name }}</option>

                            @endforeach

                        </select>
                        <span class="text-danger">@error('usertype') {{ $message }} @enderror</span>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="col-form-label" for="department">Department</label>
                        <select name="department" id="department" class="form-control">
                            <option></option>

                            @foreach ($depts as $dept)

                            <option value="{{ $dept->dept_code   }}" @if (old('department', $staff->dept_code) ==
                                "$dept->dept_code" )
                                {{ 'selected' }}
                                @endif>
                                {{ $dept->dept_name }}
                            </option>

                            @endforeach

                            
                        </select>
                        <span class="text-danger">@error('department') {{ $message }} @enderror</span>
                    </div>
                </div>
            </div>



            <div class="card-footer">
                <button type="submit" class="btn btn-warning btn-lg btn-block">Edit</button>
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