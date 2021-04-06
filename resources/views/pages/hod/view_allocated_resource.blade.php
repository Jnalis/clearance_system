@extends('layouts.hod')
@section('title','Allocated Resource')

@section('smallNavigation')
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ route('hod.home') }}">Home</a></li>
    <li class="breadcrumb-item active">Resource List</li>
  </ol>
</div><!-- /.col -->

@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">List of Allocated Resource</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <p>
            <a href="{{ route('hod.allocatedResource.create') }}" class="btn btn-info">Issue Resource</a>
            <a href="{{ route('hod.issuedResource.index') }}" class="btn btn-success">Issued Resource</a>
            <a href="{{ route('hod.lostResource.index') }}" class="btn btn-danger">Lost Resource</a>
        </p>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Resource Allocator ID</th>
                    <th>Resource ID</th>
                    <th>Staff ID</th>
                </tr>
            </thead>
            <tbody>
                @if (count($allocated_r))
                    @foreach ($allocated_r as $a)
                        
                    <tr>
                        <td>{{ $a->id }}</td>
                        <td>{{ $a->resource_allocator_id }}</td>
                        <td>{{ $a->resource_id }}</td>
                        <td>{{ $a->staff_id }}</td>
                    </tr>
                    @endforeach
                @else
                <tr>
                    <td colspan="4">No Allocated Resource Found</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
@endsection