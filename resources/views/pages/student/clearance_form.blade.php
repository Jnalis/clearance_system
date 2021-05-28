@extends('layouts.student')
@section('title', 'Clearance Form')

@section('smallNavigation')
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ route('student.home') }}">Home</a></li>
    <li class="breadcrumb-item active">Clearance form</li></li>

  </ol>
</div><!-- /.col -->
@endsection

@section('content')

<div class="row">

  {{-- left column left --}}
  <div class="col-md-1"></div>
 


  {{-- center column --}}
  <div class="col-md-10">
      <div class="card card-warning">
          <div class="card-header">
              <h3 class="card-title">Fill this form carefully!</h3>
          </div>
          <!-- /.card-header -->

          <div class="card-body">


              <form role="form" action="#" method="POST">
                  @csrf
                  <div class="result">
                  @if (Session::get('fail'))
                  <div class="alert alert-danger">
                      {{ Session::get('fail') }}
                  </div>
                  @endif
          </div>
          {{-- names --}}
          <div class="row">
              <div class="col-sm-6">
                  <div class="form-group">
                      <label class="col-form-label" for="fullname">Fullname</label>
                      <input type="text" name="fullname" id="fullname" class="form-control"
                          placeholder="Enter fullname" value="{{ old('fullname') }}">
                      <span class="text-danger">@error('fullname') {{ $message }} @enderror</span>
                  </div>
              </div>
              <div class="col-sm-6">
                  <div class="form-group">
                      <label class="col-form-label" for="student_reg_no">Reg NO</label>
                      <input type="text" name="student_reg_no" id="student_reg_no" class="form-control"
                          placeholder="Enter your Reg No" value="{{ old('student_reg_no') }}">
                      <span class="text-danger">@error('student_reg_no') {{ $message }} @enderror</span>
                  </div>
              </div>
          </div>

          {{-- program and department --}}
          <div class="row">
              <div class="col-sm-6">
                  <div class="form-group">
                      <label class="col-form-label" for="program">Programme</label>
                      <input type="text" name="program" id="program" class="form-control"
                          placeholder="Enter program" value="{{ old('program') }}">
                      <span class="text-danger">@error('program') {{ $message }} @enderror</span>
                  </div>
              </div>
              <div class="col-sm-6">
                  <div class="form-group">
                      <label class="col-form-label" for="department">Department</label>
                      <input type="text" name="department" id="department" class="form-control"
                          placeholder="Enter department" value="{{ old('department') }}">
                      <span class="text-danger">@error('department') {{ $message }} @enderror</span>
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

                          @php
                              for ($year=1700; $year < ; $i++) { 
                                # code...
                              }
                          @endphp

                          <select name="year">
                            <? for ($year=1900; $year <= 2015; $year++): ?>
                              <option value="<?=$year;?>"><?=$year;?></option>
                            <? endfor; ?>
                            </select>
                      </select>
                      <span class="text-danger">@error('usertype') {{ $message }} @enderror</span>
                  </div>
              </div>


              <div class="col-sm-6">
                  <div class="form-group">
                      <label class="col-form-label" for="department">Department</label>
                      <select name="department" id="department" class="form-control">

                          <option></option>
                          {{-- @foreach ($depts as $dept)

                          <option value="{{ $dept->dept_code }}" @if (old('department')=="$dept->dept_code" )
                              {{ 'selected' }} @endif>
                              {{ $dept->dept_name }}</option>

                          @endforeach --}}
                          
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
  

  {{-- right column left --}}
  <div class="col-md-1"></div>


</div>
  @endsection