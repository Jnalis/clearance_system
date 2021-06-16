@extends('layouts.hod')
@section('title','Lost Resource')


@section('tableCss')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}" />
<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}" />
@endsection


@section('smallNavigation')
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ route('hod.home') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('hod.allocatedResource.index') }}">Resource List</a></li>
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

    <div class="result">
      @if (session('danger'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('danger') }}
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
          <th>Student Fullname</th>
          <th>Student Reg no</th>
          <th>Lost Resource</th>
          <th>Lost Resource Amount</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        @php
        $no = 1;
        @endphp
        @if (count($lost_r))
        @foreach ($lost_r as $item)
        <tr>
          <td>{{ $no }}</td>
          <td>{{ $item->fullname }}</td>
          <td>{{ $item->student_id }}</td>
          <td>{{ $item->resource_type }}</td>
          <td>{{ $item->resource_amount }}</td>
          <td>{{ $item->refunded_status }}</td>
        </tr>
        @php
        $no++;
        @endphp
        @endforeach
        @else
        <tr>
          <td colspan="6">No Lost Resource Found</td>
        </tr>
        @endif
      </tbody>
    </table>
  </div>
  <!-- /.card-body -->
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