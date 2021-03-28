@extends('layouts.masterAdmin')
@section('title', 'add dept')
@section('content')
<div class="row">
    {{-- left column --}}
    <div class="col-md-2"></div>
    {{-- /.col (left) --}}


    {{-- center column --}}
    <div class="col-md-8">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Add user type</h3>
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
                                    <label class="col-form-label" for="usertype">User Type Name</label>
                                    <input type="text" name="usertype" id="usertype" class="form-control"
                                        placeholder="Example Head of Department">
                                </div>
                            </div>
                        </div>
                        {{-- usertype code --}}
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="col-form-label" for="usertype_code">User Type code</label>
                                    <input type="text" name="usertype_code" id="usertype_code" class="form-control"
                                        placeholder="Example HOD">
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