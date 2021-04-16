@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <p class="login_title">nscs</p>

            <div class="card">
                <div class="card-header text-center">Please fill your information</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                                                
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="student_name">Studen name</label>
                                    <input type="text" name="student_name" id="student_name"
                                        class="form-control @error('student_name') is-invalid @enderror" placeholder="fullname"
                                        value="{{ old('student_name') }}"
                                        oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);">
        
                                    @error('student_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="student_id">Student ID</label>
                                    <input type="text" name="student_id" id="student_id"
                                        class="form-control @error('student_id') is-invalid @enderror" placeholder="registration id"
                                        value="{{ old('student_id') }}"
                                        oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);">
        
                                    @error('student_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label" for="usertype">Program</label>
                                    <select name="program" id="program" class="form-control">
                                        <option>--select program--</option>
            
                                        {{-- @foreach ($user_type as $item)
            
                                        <option value="{{ $item->usertype_code }}" @if (old('usertype')=="$item->usertype_code" )
                                            {{ 'selected' }} @endif>{{ $item->usertype_name }}</option>
            
                                        @endforeach --}}
                                    </select>
                                    <span class="text-danger">@error('usertype') {{ $message }} @enderror</span>
                                </div>
                            </div>
            
            
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label" for="department">Department</label>
                                    <select name="department" id="department" class="form-control">
            
                                        <option>--select department--</option>
                                        @foreach ($depts as $dept)
            
                                        <option value="{{ $dept->dept_name }}" @if (old('department')=="$dept->dept_name" )
                                            {{ 'selected' }} @endif>
                                            {{ $dept->dept_name }}</option>
            
                                        @endforeach
                                        
                                    </select>
                                    <span class="text-danger">@error('department') {{ $message }} @enderror</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
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
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success btn-block">Register</button>

                        <p class="pt-3 text-center">Click <a href="{{ route('home') }}">here</a> if you have account already</p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('formInput')
<script>
    function upperCaseF(a){
    setTimeout(function(){
        a.value = a.value.toUpperCase();
    }, 1);
}
</script>
@endsection