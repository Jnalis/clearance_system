@extends('layouts.admin')
@section('title', 'Usertype')

@section('smallNavigation')
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
      <li class="breadcrumb-item active">Usertype List</li>
  </ol>
</div><!-- /.col -->
@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">User Type List</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <p>
            <a href="{{ route('admin.usertype.create') }}" class="btn btn-info">Add Usertype</a>
          </p>
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>Usertype name</th>
                <th>Usertype code</th> 
                <th>Action</th> 
              </tr>
            </thead>
            <tbody>
              @if (count($usertype))
              @foreach ($usertype as $ut)
              <tr>
                <td>{{ $ut->id }}</td>
                <td>{{ $ut->usertype_name }}</td>
                <td>{{ $ut->usertype_code }}</td>
                <td>
                  <a href="{{ route('admin.usertype.edit', $ut->id) }}" class="btn btn-warning">Edit</a>
                  <a href="#" class="btn btn-danger">Delete</a>
                </td>
              </tr>
              @endforeach
              @else
              <tr>
                <td colspan="3">No Usertype Found</td>
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