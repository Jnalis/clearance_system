@extends('layouts.student')
@section('title', 'Clearance Status')


@section('tableCss')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}" />
<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}" />
@endsection


@section('smallNavigation')
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ route('student.home') }}">Home</a></li>
    <li class="breadcrumb-item active">Clearance Status</li>
  </ol>
</div><!-- /.col -->

@endsection

@section('content')
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Your clearance status</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">

    <p>
      <a href="#" class="btn btn-info">
        Download clearance
      </a>
    </p>
    
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
          <th> #</th>
          <th>Student Name</th>
          <th>Student Reg No</th>
          <th>Clearance Type</th>
          <th>Resource Claim</th>
          <th>Library Claim</th>
          <th>Tuition Fees Status</th>
          <th>Clearance Status</th>
          <th>Date Initiated</th>
        </tr>
      </thead>
      <tbody>
        @php
        $no = 1;
        @endphp
        @if (count($clearances))
        @foreach ($clearances as $clearance)
        <tr>
          <td>{{ $no }}</td>
          <td>{{ $clearance->fullname }}</td>
          <td>{{ $clearance->student_id }}</td>
          <td>{{ $clearance->clearance_type }}</td>
          <td>{{ $clearance->resource_claim }}</td>
          <td>{{ $clearance->library_claim }}</td>
          <td>{{ $clearance->tuition_fee_status }}</td>
          <td>{{ $clearance->clearance_status }}</td>
          <td>{{ date('d/M/Y', strtotime($clearance->created_at)) }}</td>
        </tr>
        @php
        $no++;
        @endphp
        @endforeach
        @else
        <tr>
          <td colspan="9">No clearance found</td>
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