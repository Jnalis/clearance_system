@extends('layouts.hod')
@section('title','Student List')

@section('tableCss')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}" />
<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}" />
@endsection

@section('smallNavigation')
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ route('hod.home') }}">Home</a></li>
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
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Registration No</th>
                    <th>Program</th>
                    <th>Department</th>
                    <th>Entry Year</th>
                    <th>Registered</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @if (count($student))
                @foreach ($student as $stud)

                <tr>
                    <td>{{ $no }}</td>
                    <td>{{ $stud->fullname }}</td>
                    <td>{{ $stud->student_id }}</td>
                    <td>{{ $stud->program }}</td>
                    <td>{{ $stud->department }}</td>
                    <td>{{ $stud->entry_year }}</td>
                    <td>{{ $stud->registered }}</td>
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