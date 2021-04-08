@extends('layouts.dean')
@section('title','Lost Resource')

@section('smallNavigation')
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ route('dean.home') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('dean.resourceList.index') }}">Resource List</a></li>
    <li class="breadcrumb-item active">Lost resource</li>
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
                    <th>ID</th>
                    <th>Student ID</th>
                    <th>Lost Resource ID</th>
                    <th>Refunded Status</th>
                </tr>
            </thead>
            <tbody>
                @if (count($lost_r))
                @foreach ($lost_r as $l)
                <tr>
                    <td>{{ $l->id }}</td>
                    <td>{{ $l->student_id }}</td>
                    <td>{{ $l->resource_id }}</td>
                    <td>{{ $l->refunded_status }}</td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="4">No Lost Resource Found</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
@endsection
