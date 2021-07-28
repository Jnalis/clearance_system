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

    <table  class="table table-bordered table-striped">
      <p>
        Name of Student: <span style="text-decoration:underline; font-weight:bold">{{ $student_name }}</span>
        Identity Card No: <span style="text-decoration:underline; font-weight:bold">{{ $student_identity }}</span>
      </p>
      <p>
        Student Program: <span style="text-decoration:underline; font-weight:bold">{{ $student_program }}</span>
        Student Department: <span style="text-decoration:underline; font-weight:bold">{{ $student_department }}</span>
      </p>
      <p>
        Purpose of clearing:
        <span style="text-decoration:underline; font-weight:bold">
          @if ($clearanceTypeStatus == 1)
          {{ $clearanceType }}
          @else
          {{ $clearanceType }}
          @endif
        </span>
        Fee Status: <span style="text-decoration:underline; font-weight:bold">
          @if ($clearanceTypeStatus == 1)
          {{ $feeStatus }}
          @else
          {{ $feeStatus }}
          @endif
        </span>
      </p>  


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
          {{-- dept name --}}
          <td>{{ $department->dept_name }}</td>

          {{-- property not returned --}}
          <td>
            @if ($clearAllStatus == 1)
            {{-- <p style="color: black; font-weight: bold; font-size: 3em;">{{ '-' }}</p> --}}
            <p class="text-center m-0">{{ '-' }}</p>
            @else
            @if ($department->dept_code == $resourceDept)
            @if ($issuedResourceName == null)
            <p class="text-center m-0">{{ '-' }}</p>
            @else
            {{ $issuedResourceName }}
            @endif
            @else
            <p class="text-center m-0">{{ '-' }}</p>
            @endif
            @endif
          </td>

          {{-- property not returned value(tshs) --}}
          <td>
            @if ($clearAllStatus == 1)
            <p class="text-center m-0">{{ '-' }}</p>
            @else
            @if ($department->dept_code == $resourceDept)
            @if ($issuedResourceValue == null)
            <p class="text-center m-0">{{ '-' }}</p>
            @else
            {{ $issuedResourceValue }}
            @endif
            @else
            <p class="text-center m-0">{{ '-' }}</p>
            @endif
            @endif
          </td>

          {{-- property lost --}}
          <td>
            @if ($clearAllStatus == 1)
            <p class="text-center m-0">{{ '-' }}</p>
            @else
            @if ($department->dept_code == $LostResourceDept)
            @if ($lostResourceName == null)
            <p class="text-center m-0">{{ '-' }}</p>
            @else
            {{ $lostResourceName }}
            @endif
            @else
            <p class="text-center m-0">{{ '-' }}</p>
            @endif
            @endif
          </td>

          {{-- property lost value(tshs) --}}
          <td>
            @if ($clearAllStatus == 1)
            <p class="text-center m-0">{{ '-' }}</p>
            @else
            @if ($department->dept_code == $LostResourceDept)
            @if ($lostResourceValue == null)
            <p class="text-center m-0">{{ '-' }}</p>
            @else
            {{ $lostResourceValue }}
            @endif
            @else
            <p class="text-center m-0">{{ '-' }}</p>
            @endif
            @endif
          </td>

          {{-- dept status cleared or not --}}
          <td>
            @if ($clearAllStatus == 1)
            {{ 'CLEARED' }}
            @else
            @if ($department->dept_code == $resourceDept || $department->dept_code == $LostResourceDept)
            {{ 'NOT CLEARED' }}
            @else
            {{ 'CLEARED' }}
            @endif
            @endif
          </td>

          {{-- date cleared --}}
          <td>
            {{ date('d/M/Y', strtotime($clearanceDate)) }}
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
      <tfoot style="text-align:center">
        <tr>
          <td colspan="8">
            <p>Your clearance status is: <span
                style="text-decoration:underline; font-weight:bold">{{ $clearanceStatus }}</span></p>
          </td>
        </tr>
        <tr>
          <td colspan="4">
            <a href="{{ route('student.download', $clearanceID) }}" onclick="" class="btn btn-primary">Download</a>
          </td>
          <td colspan="4">
            <a href="javascript:void(0)" onclick="$(this).parent().find('form').submit()"
              class="btn btn-danger">Delete</a>
            <form action="{{ route('student.deleteClearance', $clearanceID) }}" method="POST">
              @method('delete')
              @csrf
            </form>
          </td>
        </tr>
      </tfoot>
    </table>
    <p style="padding: 20px">

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