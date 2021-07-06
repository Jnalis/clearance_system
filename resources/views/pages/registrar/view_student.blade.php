@extends('layouts.registrar')
@section('title','Student List')

@section('tableCss')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}" />
<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}" />
@endsection

@section('smallNavigation')
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('registrar.home') }}">Home</a></li>
        <li class="breadcrumb-item active">Student list</li>
    </ol>
</div><!-- /.col -->

@endsection
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">List of student</h3>
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
                    <th>#</th>
                    <th>Name</th>
                    <th>Registration No</th>
                    <th>Program</th>
                    <th>Department</th>
                    <th>Entry year</th>
                    <th>Registered</th>
                </tr>
            </thead>
            <tbody>
                @php
                $no = 1;
                @endphp
                @if (count($students))
                @foreach ($students as $student)

                <tr>
                    <td>{{ $no }}</td>
                    <td>{{ $student->fullname }}</td>
                    <td>{{ $student->student_id }}</td>
                    <td>{{ $student->program }}</td>
                    <td>{{ $student->department }}</td>
                    <td>{{ $student->entry_year }}</td>
                    <td>{{ $student->registered }}</td>
                </tr>
                @php
                $no++;
                @endphp
                @endforeach
                @else
                <tr>
                    <td colspan="7">No Student Found</td>
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