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
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label" for="firstname">Firstname</label>
                                <input type="text" name="firstname" id="firstname" class="form-control"
                                    placeholder="Enter firstname" value="{{ old('firstname',$staff->firstname) }}">
                                <span class="text-danger">@error('firstname') {{ $message }} @enderror</span>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label" for="secondname">Secondname</label>
                                <input type="text" name="secondname" id="secondname" class="form-control"
                                    placeholder="Enter secondname" value="{{ old('secondname',$staff->secondname) }}">
                                <span class="text-danger">@error('secondname') {{ $message }} @enderror</span>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label" for="lastname">Lastname</label>
                                <input type="text" name="lastname" id="lastname" class="form-control"
                                    placeholder="Enter lastname" value="{{ old('lastname',$staff->lastname) }}">
                                <span class="text-danger">@error('lastname') {{ $message }} @enderror</span>
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


                                    <option value="Admin" @if (old('usertype',$staff->usertype)=="Admin" ) {{ 'selected' }} @endif>Admin
                                    </option>


                                    <option value="Registrar" @if (old('usertype',$staff->usertype)=="Registrar" ) {{ 'selected' }}
                                        @endif>Registrar</option>



                                    <option value="Bursar" @if (old('usertype',$staff->usertype)=="Bursar" ) {{ 'selected' }} @endif>
                                        Bursar</option>



                                    <option value="HOD" @if (old('usertype',$staff->usertype)=="HOD" ) {{ 'selected' }} @endif>HOD
                                    </option>




                                    <option value="Dean" @if (old('usertype',$staff->usertype)=="Dean" ) {{ 'selected' }} @endif>Dean of
                                        Student</option>




                                    <option value="RA" @if (old('usertype',$staff->usertype)=="RA" ) {{ 'selected' }} @endif>Resource
                                        Allocator</option>




                                </select>
                                <span class="text-danger">@error('usertype') {{ $message }} @enderror</span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label" for="department">Department</label>
                                <select name="department" id="department" class="form-control">
                                    <option></option>



                                    <option value="CCT" @if (old('department',$staff->department)=="CCT" ) {{ 'selected' }} @endif>CCT
                                    </option>



                                    <option value="LTS" @if (old('department',$staff->department)=="LTS" ) {{ 'selected' }} @endif>LTS
                                    </option>



                                </select>
                                <span class="text-danger">@error('department') {{ $message }} @enderror</span>
                            </div>
                        </div>
                    </div>



                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
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