@extends('layouts.admin')
@section('title', 'view user')

@section('tableCss')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}" />
<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}" />
@endsection


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
          @if (session('fail'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('fail') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @endif
          @if (session('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @endif
        </div>

        <table id="example1" class="table table-bordered table-striped">
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
            @foreach ($staffs as $staff)
            <tr>
              <td>{{ $no }}</td>
              <td>{{ $staff->fullname }}</td>
              <td>{{ $staff->username }}</td>
              <td>{{ $staff->usertype }}</td>
              <td>{{ $staff->dept_code }}</td>

              <td>
                <a href="{{ route('admin.staff.edit', $staff->id) }}" class="btn btn-warning">Edit</a>
                <a href="javascript:void(0)" onclick="$(this).parent().find('form').submit()"
                class="btn btn-danger">Delete</a>
                <form action="{{ route('admin.staff.destroy', $staff->id) }}" method="post">
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


@section('tableScript')
<!-- DataTables -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>

<script>
  $(function () {
      $("#example1").DataTable({
        responsive: true,
        autoWidth: false,
      });
    });
</script>

@endsection