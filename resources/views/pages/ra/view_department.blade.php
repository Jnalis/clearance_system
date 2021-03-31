@extends('layouts.ra')
@section('title', 'View Department')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Department List</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Department name</th>
                            <th>Department code</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Computing and Communication Technology</td>
                            <td>CCT</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>
@endsection