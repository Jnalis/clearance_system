@extends('layouts.dean')
@section('title','Issued Resource')


@section('tableCss')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}" />
<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}" />
@endsection


@section('smallNavigation')
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ route('dean.home') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('dean.resourceList.index') }}">Resource List</a></li>
    <li class="breadcrumb-item active">Issued resource</li>
  </ol>
</div><!-- /.col -->

@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">List of Issued Resource</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">

        <div class="result">
            @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            @endif
        </div>

        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th> #</th>
                    <th>Student Name</th>
                    <th>Student Reg No</th>
                    <th>Resource Type</th>
                    <th>Resource Amount</th>
                    <th>Date Issued</th>
                    <th>Date to Return</th>
                    <th>Return</th>
                    <th>Lost</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @if (count($issued_r))
                @foreach ($issued_r as $r)
                <tr>
                    <td>{{ $no }}</td>
                    <td>{{ $r->fullname }}</td>
                    <td>{{ $r->student_id }}</td>
                    <td>{{ $r->resource_type }}</td>
                    <td>{{ $r->resource_amount }}</td>
                    <td>{{ date('d/M/Y', strtotime($r->created_at)) }}</td>
                    <td>{{ $r->date_to_return }}</td>
                    <td>
                        <a href="{{ route('hod.returnResource',$r->id) }}" class="btn btn-success">Return</a>
                    </td>
                    <td>
                        <a href="#" class="btn btn-warning">Lost</a>
                    </td>
                </tr>
                @php
                    $no++;
                @endphp
                @endforeach
                @else
                <tr>
                    <td colspan="9">No Issued Resource</td>
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