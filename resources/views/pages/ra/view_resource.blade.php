@extends('layouts.ra')
@section('title','Resource')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">List of Resource</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Resource ID</th>
                    <th>Resource Type</th>
                    <th>Resource Amount</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>111</td>
                    <td>CD</td>
                    <td>2000</td>
                    <td>Issued / Lost</td>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
@endsection
