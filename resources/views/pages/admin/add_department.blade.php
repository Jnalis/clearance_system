@extends('layouts.admin')
@section('title', 'Add department')
@section('content')
<div class="row">
    {{-- left column --}}
    <div class="col-md-2"></div>
    {{-- /.col (left) --}}


    {{-- center column --}}
    <div class="col-md-8">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Add new department</h3>
            </div>
            <!-- /.card-header -->


            <!-- form start -->
            <form role="form" id="quickForm">
                <div class="card-body">


                    <form role="form">
                        {{-- department name --}}
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="col-form-label" for="dept_name">Department name</label>
                                    <input type="text" name="dept_name" id="dept_name" class="form-control"
                                        placeholder="Enter Department name">
                                </div>
                            </div>
                        </div>
                        {{-- department code --}}
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="col-form-label" for="dept_code">Department code</label>
                                    <input type="text" name="dept_code" id="dept_code" class="form-control"
                                        placeholder="Enter Department code">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
    {{-- /.col (center) --}}

    {{-- right column --}}
    <div class="col-md-2"></div>
    {{-- /.col (right) --}}
</div>
@endsection