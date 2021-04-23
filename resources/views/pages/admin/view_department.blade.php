@extends('layouts.admin')

@section('title', 'View Department')

@section('tableCss')

<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}" />
<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}" />
@endsection

@section('smallNavigation')
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
    <li class="breadcrumb-item active">Department List</li>
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
        <p>
          <a href="{{ route('admin.department.create') }}" class="btn btn-info">Add Department</a>
        </p>
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th>Department name</th>
              <th>Department code</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @php
            $no = 1;
            @endphp
            @if (count($depts))
            @foreach ($depts as $dept)
            <tr>
              <td>{{ $no }}</td>
              <td>{{ $dept->dept_name }}</td>
              <td>{{ $dept->dept_code }}</td>
              <td>
                <a href="{{ route('admin.department.edit',$dept->id) }}" class="btn btn-warning">Edit</a>
                <a href="javascript:void(0)" onclick="$(this).parent().find('form').submit()"
                  class="btn btn-danger">Delete</a>
                <form action="{{ route('admin.department.destroy', $dept->id) }}" method="post">
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
              <td colspan="4">No Department Found</td>
            </tr>
            @endif
          </tbody>
        </table>
        {{-- <div class="mt-3">
          {{ $depts->links() }}
      </div> --}}
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