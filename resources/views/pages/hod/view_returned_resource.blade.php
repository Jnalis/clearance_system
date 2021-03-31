@extends('layouts.hod')
@section('title','Returned Resource')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">List of Returned Resource</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Resource ID</th>
                    <th>Resource Type</th>
                    <th>Returned Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Trident</td>
                    <td>Internet Explorer 4.0</td>
                    <td>Win 95+</td>
                    <td>Returned</td>
                </tr>
                <tr>
                    <td>Trident</td>
                    <td>Internet Explorer 5.0</td>
                    <td>Win 95+</td>
                    <td>Returned</td>
                </tr>
                <tr>
                    <td>Other browsers</td>
                    <td>All others</td>
                    <td>-</td>
                    <td>Returned</td>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
@endsection
