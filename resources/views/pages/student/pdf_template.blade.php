@extends('layouts.student')
@section('title', 'PDF File')


@section('tableCss')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}" />
<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}" />
@endsection


@section('smallNavigation')
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('student.home') }}">Home</a></li>
        <li class="breadcrumb-item active">Your Clearance File</li>
    </ol>
</div><!-- /.col -->

@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Your clearance file</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">

        {{-- <table id="example1" class="table table-bordered table-striped"> --}}

        <p>Name of Student: <span style="text-decoration:underline; font-weight:bold">{{ $student_name }}</span></p>
        <p>
            Student Program: <span style="text-decoration:underline; font-weight:bold">{{ $student_program }}</span>
            Student Department: <span style="text-decoration:underline; font-weight:bold">{{ $student_department }}</span>
        </p>
        <p>Identity Card No: <span style="text-decoration:underline; font-weight:bold">{{ $student_identity }}</span></p>

        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th> #</th>
                    <th>Department / Section</th>
                    <th>Property Not Returned</th>
                    <th>Value(Tshs)</th>
                    <th>Property Lost</th>
                    <th>Value(Tshs)</th>
                    <th>DEPT Status</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @php
                $no = 1;
                @endphp
                @if (count($departments))
                @foreach ($departments as $department)
                <tr>
                    <td>{{ $no }}</td>


                    <td>{{ $department->dept_name }}</td>


                    <td>
                        @if ($lostStatus == 0)
                            @if ($department->dept_code == $student_Dept)
                                {{ $resource_name }}
                            @else
                                {{ 'NO' }}
                            @endif
                        @else
                            @if ($department->dept_code == $student_Dept)
                                {{ $resource_name }}
                            @else
                                {{ 'NO' }}
                            @endif
                        @endif
                    </td>


                    <td>
                        @if ($lostStatus == 0)
                            @if ($department->dept_code == $student_Dept)
                                {{ $resource_value }}
                            @else
                                {{ 'NO' }}
                            @endif
                        @else
                            @if ($department->dept_code == $student_Dept)
                                {{ $resource_value }}
                            @else
                                {{ 'NO' }}
                            @endif
                        @endif
                    </td>

                    <td>
                        @if ($lostResourceStatus)
                        @if ($department->dept_code == $student_Dept && $lostResourceStatus == 'NOT REFUNDED')
                        {{ $lostResourceName }}
                        @else
                        {{ 'NO' }}
                        @endif
                        @else
                        @if ($department->dept_code == $student_Dept)
                        @if ($lostStatus == 1)
                        {{ $resource_name }}
                        @else
                        {{ 'NO' }}
                        @endif
                        @else
                        {{ 'NO' }}
                        @endif
                        @endif
                    </td>

                    <td>
                        @if ($lostResourceStatus)
                        @if ($department->dept_code == $student_Dept && $lostResourceStatus == 'NOT REFUNDED')
                        {{ $lostResourceValue }}
                        @else
                        {{ 'NO' }}
                        @endif
                        @else
                        @if ($department->dept_code == $student_Dept)
                        @if ($lostStatus == 1)
                        {{ $resource_value }}
                        @else
                        {{ 'NO' }}
                        @endif
                        @else
                        {{ 'NO' }}
                        @endif
                        @endif
                    </td>


                    <td>
                        @if ($department->dept_code == $student_Dept)
                        {{ 'NOT CLEARED' }}
                        @else
                        {{ 'CLEARED' }}
                        @endif
                    </td>


                    <td>
                        {{date('d-M-Y')}}

                    </td>
                </tr>
                @php
                $no++;
                @endphp
                @endforeach
                @else
                <tr>
                    <td colspan="8">No clearance to view</td>
                </tr>
                @endif
            </tbody>
        </table>
        <p style="padding: 20px">
            <a href="" class="btn btn-primary">Download</a>
        </p>
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