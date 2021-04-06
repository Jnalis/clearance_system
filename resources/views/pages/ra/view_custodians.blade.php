@extends('layouts.ra')
@section('title', 'View Custodian')

@section('smallNavigation')
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ route('ra.home') }}">Home</a></li>
    <li class="breadcrumb-item active">Custodian list</li>
    
  </ol>
</div><!-- /.col -->
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Custodian List</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Custodian name</th>
                            <th>From (Department name)</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Christopher Ntyangiri</td>
                            <td>Computing and Communication Technology</td>
                            <td><a href="#" class="btn btn-warning">Edit</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>
@endsection