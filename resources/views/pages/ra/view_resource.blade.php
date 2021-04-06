@extends('layouts.ra')
@section('title','Resource')

@section('smallNavigation')
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ route('ra.home') }}">Home</a></li>
    <li class="breadcrumb-item active">Resource list</li>
    
  </ol>
</div><!-- /.col -->
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">List of Resource</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <p>
            <a href="{{ route('ra.resource.create') }}" class="btn btn-info">Add Resource</a>
            <a href="{{ route('ra.viewDeptRA.create') }}" class="btn btn-warning">Allocate Resource</a>
            <a href="{{ route('ra.allocatedResource.index') }}" class="btn btn-success">Allocated Resource</a>
            <a href="{{ route('ra.lostResource.index') }}" class="btn btn-danger">Lost Resource</a>
        </p>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Resource ID</th>
                    <th>Resource Type</th>
                    <th>Resource Amount</th>
                    <th>Registered at</th>
                </tr>
            </thead>
            <tbody>
                @if (count($resource))
                @foreach ($resource as $r)
                <tr>
                    <td>{{ $r->id }}</td>
                    <td>{{ $r->resource_type }}</td>
                    <td>{{ $r->resource_amount }}</td>
                    <td>{{ $r->created_at }}</td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="4">No Resource Found</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
@endsection
