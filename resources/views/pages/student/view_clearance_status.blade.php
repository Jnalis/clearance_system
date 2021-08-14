@extends('layouts.student')
@section('title', 'Clearance Status')

@section('print')
<link rel="stylesheet" media="print" href="{{ asset('style/print.css') }}" />
@endsection

@section('tableCss')

<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
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


    <table class="table table-bordered table-striped" id="print">
      <p>
        Name of Student: <span class="student_name">{{ $student_name }}</span>
        Identity Card No: <span class="student_identity">{{ $student_identity }}</span>
      </p>
      <p>
        Student Program: <span class="student_program">{{ $student_program }}</span>
        Student Department: <span class="student_department">{{ $student_department }}</span>
      </p>
      <p>
        Purpose of clearing:
        <span class="clearance_type">
          @if ($clearanceTypeStatus == 1)
          {{ $clearanceType }}
          @else
          {{ $clearanceType }}
          @endif
        </span>
        Fee Status: <span class="fee_status">
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
    </table>
    {{-- <p>
      Please cashier make recoveries of total of Tshs __________ which is relating to cost of unreturned items as shown in table above and substantiate it with documentary evidence.
    </p> --}}
    <p class="clearance_status">Your clearance status is: <span class="status">{{ $clearanceStatus }}</span>
    </p>
    <p>
      @php
      $id = Auth::user()->user_id;
      $IssuedResourceInfo = DB::table('issued_resources')->where('resource_issued_to', $id)->get();
      $idadi = count($IssuedResourceInfo);

      $LostResourceInfo = DB::table('lost_resources')->where('lost_by', $id)->get();
      $idadiLost = count($LostResourceInfo);


      if ($idadi > 0) {
      $issuedStatus = 1;
      foreach ($IssuedResourceInfo as $info) {
      $resourceIssuedID = $info->resource_issued;

      $resourceInfo = DB::table('resources')->where('id', $resourceIssuedID)->first();
      $resourceName[] = $resourceInfo->resource_type;
      $resourceValue[] = $resourceInfo->resource_amount;
      }
      $name = implode(', ', $resourceName);
      $value = implode(', ', $resourceValue);
      } else {
      $issuedStatus = 0;
      $name = null;
      $value = null;
      }


      if ($idadiLost > 0) {
      $lostStatus = 1;
      foreach ($LostResourceInfo as $info) {
      $resourceLostID = $info->lost_resource;

      $resourceInfo = DB::table('resources')->where('id', $resourceLostID)->first();
      $resourceNameLost[] = $resourceInfo->resource_type;
      $resourceValueLost[] = $resourceInfo->resource_amount;
      }
      $nameLost = implode(', ', $resourceNameLost);
      $valueLost = implode(', ', $resourceValueLost);
      } else {
      $lostStatus = 0;
      $nameLost = null;
      $valueLost = null;
      }


      @endphp


      You have total of <span class="info">{{ $idadi }}</span> of unreturned resource.
      <br>
      Unreturned resource are <span class="info">
        @if ($issuedStatus == 1)
        {{ $name }}
        @else
        {{ 'NIL' }}
        @endif
      </span> which cost this amount Tshs <span class="info">
        @if ($issuedStatus == 1)
        {{ $value }}
        @else
        {{ 'NIL' }}
        @endif
      </span> respectively
      <br>
      You have total of <span class="info">{{ $idadiLost }}</span> lost resource.
      <br>
      Lost resource are <span class="info">
        @if ($lostStatus == 1)
        {{ $nameLost }}
        @else
        {{ 'NIL' }}
        @endif
      </span> which cost this amount Tshs <span class="info">
        @if ($lostStatus == 1)
        {{ $valueLost }}
        @else
        {{ 'NIL' }}
        @endif
      </span> respectively


    </p>


    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-3">
        <a href="" onclick="window.print()" class="btn btn-info linkToHide">Save as Pdf Document</a>
      </div>
      <div class="col-md-3">
        <a href="javascript:void(0)" onclick="$(this).parent().find('form').submit()"
          class="btn btn-danger linkToHide">Delete</a>
        <form action="{{ route('student.deleteClearance', $clearanceID) }}" method="POST">
          @method('delete')
          @csrf
        </form>
      </div>
      <div class="col-md-3"></div>
    </div>
  </div>
  <!-- /.card-body -->
</div>
@endsection


@section('tableScript')


<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      "buttons": ["pdf"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>
@endsection