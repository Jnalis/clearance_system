@extends('layouts.ra')
@section('title','Lost Resource')


@section('tableCss')

<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}" />
<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}" />
@endsection


@section('smallNavigation')
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('ra.home') }}">Home</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('ra.resource.index') }}">Resource list</a></li>
        <li class="breadcrumb-item active">Lost resource list</li>

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
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Resource Type</th>
                    <th>Refunded Status</th>
                    <th>Amount Refunded</th>
                </tr>
            </thead>
            <tbody>
                {{-- @php
                $no = 1;
                @endphp
                @if (count($data))
                @foreach ($data as $item)
                <tr>
                    <td>{{ $no }}</td>
                    <td>{{ $item->student_id }}</td>
                    <td>{{ $item ->resource_id}}</td>
                    <td>{{ $item ->refunded_status}}</td>
                </tr>
                @php
                $no++;
                @endphp
                @endforeach
                @else
                <tr>
                    <td colspan="4">No Lost Resource Found</td>
                </tr>
                @endif --}}
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