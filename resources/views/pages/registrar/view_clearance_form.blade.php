@extends('layouts.registrar')
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
    <li class="breadcrumb-item"><a href="{{ route('registrar.home') }}">Home</a></li>
    <li class="breadcrumb-item active">Student Clearance Form</li>
  </ol>
</div><!-- /.col -->

@endsection

@section('content')
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Student clearance form</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">

    <table class="table table-bordered table-striped" id="print">
      <p>
        Name of Student: <span class="student_name">{{ $studentStatus->fullname }}</span>
        Identity Card No: <span class="student_identity">{{ $studentStatus->student_id }}</span>
      </p>
      <p>
        Student Program: <span class="student_program">{{ $studentStatus->program }}</span>
        Student Department: <span class="student_department">{{ $studentStatus->department }}</span>
      </p>
      <p>
        Purpose of clearing: <span class="clearance_type">{{ $studentStatus->clearance_type }}</span>
        Fee Status: <span class="fee_status">{{ $studentStatus->tuition_fee_status }}</span>
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
            @if ($issuedStatus == 1)
            @if ($department->dept_code == $issuedResourceDept)
            <p class="text-center m-0">{{ $issuedResourceName }}</p>
            <a href="#go_to_bottom">More Info?</a>
            @else  
            <p class="text-center m-0">{{ '-' }}</p>
            @endif
            @else
            <p class="text-center m-0">{{ '-' }}</p>
            @endif
          </td>

          {{-- property not returned value(tshs) --}}
          
          <td>
            @if ($issuedStatus == 1)
            @if ($department->dept_code == $issuedResourceDept)
            <p class="text-center m-0">{{ $issuedResourceValue }}</p>
            <a href="#go_to_bottom">More Info?</a>
            @else
            <p class="text-center m-0">{{ '-' }}</p>  
            @endif
            @else
            <p class="text-center m-0">{{ '-' }}</p>
            @endif
          </td>

          {{-- property lost --}}
          
          <td>
            @if ($lostStatus == 0)
            @if ($department->dept_code == $lostResourceDept)
            <p class="text-center m-0">{{ $lostResourceName }}</p>
            <a href="#go_to_bottom">More Info?</a>
            @else
            <p class="text-center m-0">{{ '-' }}</p>
            @endif
            @else
            <p class="text-center m-0">{{ '-' }}</p>
            @endif
            
          </td>

          {{-- property lost value(tshs) --}}
         
          <td>
            @if ($lostStatus == 0)
            @if ($department->dept_code == $lostResourceDept)
            <p class="text-center m-0">{{ $lostResourceValue }}</p>
            <a href="#go_to_bottom">More Info?</a>
            @else
            <p class="text-center m-0">{{ '-' }}</p>
            @endif
            @else
            <p class="text-center m-0">{{ '-' }}</p>
            @endif
          </td>

          {{-- dept status cleared or not --}}
          <td>
            @if ($clearanceStatus == null)
            {{ 'CLEARED' }}
            @else
            @if ($department->dept_code == $issuedResourceDept || $department->dept_code == $lostResourceDept)
            {{ 'NOT CLEARED' }}
            @else
            {{ 'CLEARED' }}
            @endif
            @endif
          </td>

          {{-- date cleared --}}
          <td>
            {{ date('d/M/Y', strtotime($studentStatus->created_at)) }}
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
    
    <p class="clearance_status">Student clearance status is: <span class="status">{{ $studentStatus->clearance_status }}</span>
    </p>


    <p id="go_to_bottom">
      @php
      $id = $studentStatus->student_id;
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

      <h6 class="info" style="text-transform: uppercase">Unreturned Resource</h6>
      Student have total of <span class="info">{{ $idadi }}</span> of unreturned resource.
      <br>
      Unreturned resource are <span class="info">
        @if ($issuedStatus == 1)
        {{ $name }}
        @else
        {{ '0' }}
        @endif
      </span> which cost this amount Tshs <span class="info">
        @if ($issuedStatus == 1)
        {{ $value }}
        @else
        {{ '0' }}
        @endif
      </span> respectively
      <br>
      <h6 class="info pt-3" style="text-transform: uppercase">Lost Resource</h6>
      Student have total of <span class="info">{{ $idadiLost }}</span> lost resource.
      <br>
      Lost resource are <span class="info">
        @if ($lostStatus == 1)
        {{ $nameLost }}
        @else
        {{ '0' }}
        @endif
      </span> which cost this amount Tshs <span class="info">
        @if ($lostStatus == 1)
        {{ $valueLost }}
        @else
        {{ '0' }}
        @endif
      </span> respectively


    </p>


    {{-- <div class="row">
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
    </div> --}}
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