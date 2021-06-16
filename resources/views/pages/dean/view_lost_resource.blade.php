@extends('layouts.dean')
@section('title','Lost Resource')


@section('tableCss')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}" />
<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}" />
@endsection


@section('smallNavigation')
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ route('dean.home') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('dean.resource.index') }}">Resource List</a></li>
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