@extends('layouts.ra')
@section('title', 'View Department')

@section('smallNavigation')
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ route('ra.home') }}">Home</a></li>
    <li class="breadcrumb-item active">Department list</li>
    
  </ol>
</div><!-- /.col -->
@endsection

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
                            <th>ID</th>
                            <th>Department name</th>
                            <th>Department code</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($department))
                        @foreach ($department as $dept)
                        <tr>
                          <td>{{ $dept->id }}</td>
                          <td>{{ $dept->dept_name }}</td>
                          <td>{{ $dept->dept_code }}</td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                          <td colspan="3">No Department Found</td>
                        </tr>
                        @endif
                      </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>
@endsection