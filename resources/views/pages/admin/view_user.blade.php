@extends('layouts.admin')
@section('title', 'view user')

@section('smallNavigation')
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
      <li class="breadcrumb-item active">User List</li>
  </ol>
</div><!-- /.col -->
@endsection

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">List of Users</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <p>
          <a href="{{ route('admin.staff.create') }}" class="btn btn-info">Add Staff</a>
        </p>
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Username</th>
              <th>User Type</th>
              <th>Department</th>
              <th>Action</th>

            </tr>
          </thead>
          <tbody>
            @if (count($staffs))
            @foreach ($staffs as $s)
            <tr>
              <td>{{ $s->id }}</td>
              <td>{{ $s->firstname.' '.$s->secondname.' '.$s->lastname }}</td>
              <td>{{ $s->username }}</td>
              <td>{{ $s->usertype }}</td>
              <td>{{ $s->department }}</td>
              
              <td>
                <a href="#" class="btn btn-warning">Edit</a>
                <a href="#" class="btn btn-danger">Delete</a>
              </td>
            </tr>
            @endforeach
            @else
              <tr>
                <td colspan="6">No User Found</td>
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