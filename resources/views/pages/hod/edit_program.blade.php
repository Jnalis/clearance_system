@extends('layouts.hod')
@section('title', 'Program')

@section('smallNavigation')
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('hod.home') }}">Home</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('hod.program.index') }}">Program List</a></li>
        <li class="breadcrumb-item active">Edit Program</li>
    </ol>
</div><!-- /.col -->
@endsection

@section('content')
<div class="row">
    {{-- left column --}}
    <div class="col-md-3"></div>
    {{-- /.col (left) --}}


    {{-- center column --}}
    <div class="col-md-6">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Edit Program</h3>
            </div>
            <!-- /.card-header -->

            <div class="card-body">

                <form role="form" action="{{ route('hod.program.update',$program->id) }}" method="POST">
                    @method('put')
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
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="col-form-label" for="prog_name">Program name</label>
                                <input type="text" name="prog_name" id="prog_name" class="form-control"
                                    placeholder="Program name" value="{{ old('prog_name', $program->prog_name) }}"
                                    oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);">
                                <span class="text-danger">@error('prog_name') {{ $message }} @enderror</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="col-form-label" for="prog_code">Program code</label>
                                <input type="text" name="prog_code" id="prog_code" class="form-control"
                                    placeholder="Program code" value="{{ old('prog_code',$program->prog_code) }}"
                                    oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);">
                                <span class="text-danger">@error('prog_code') {{ $message }} @enderror</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="col-form-label" for="department">Department</label>
                                <select name="department" id="department" class="form-control">
                                    <option>--select department--</option>

                                    @foreach ($department as $item)

                                    <option value="{{ $item->dept_code }}" @if (old('department', $program->dept_code)
                                        == "$item->dept_code")
                                        {{ 'selected' }} @endif>{{ $item->dept_name }}</option>

                                    @endforeach
                                </select>
                                <span class="text-danger">@error('department') {{ $message }} @enderror</span>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success btn-lg btn-block">Edit Program</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.card -->
    </div>
    {{-- /.col (center) --}}

    {{-- right column --}}
    <div class="col-md-3"></div>
    {{-- /.col (right) --}}
</div>
@endsection