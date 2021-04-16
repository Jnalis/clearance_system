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
        <div class="result">
          @if (session('success'))
          <div class="alert alert-success" role="alert">
            {{ session('success') }}
          </div>
          @endif
        </div>
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Username</th>
              <th>User Type</th>
              <th>Department</th>
              <th>Action</th>

            </tr>
          </thead>
          <tbody>
            @php
            $no = 1;
            @endphp
            @if (count($staffs))
            @foreach ($staffs as $s)
            <tr>
              <td>{{ $no }}</td>
              <td>{{ $s->firstname.' '.$s->secondname.' '.$s->lastname }}</td>
              <td>{{ $s->username }}</td>
              <td>{{ $s->usertype }}</td>
              <td>{{ $s->department }}</td>

              <td>
                <a href="{{ route('admin.staff.edit', $s->id) }}" class="btn btn-warning">Edit</a>
                <a href="javascript:void(0)" onclick="$(this).parent().find('form').submit()"
                  class="btn btn-danger">Delete</a>
                <form action="{{ route('admin.staff.destroy', $s->id) }}" method="post">
                  @method('delete')
                  @csrf
                </form>
              </td>
            </tr>
            @php
            $no++;
            @endphp

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