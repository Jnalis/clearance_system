@extends('layouts.ra')
@section('title','Lost Resource')

@section('smallNavigation')
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ route('ra.home') }}">Home</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('ra.resource.index') }}">Reseource list</a></li>
    <li class="breadcrumb-item active">Lost resource list</li>
    
  </ol>
</div><!-- /.col -->
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">List of Lost Resource</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Resource ID</th>
                    <th>Resource Type</th>
                    <th>Refunded Status</th>
                    <th>Amount Refunded</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>111</td>
                    <td>CD</td>
                    <td>YES</td>
                    <td>2000</td>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
@endsection
