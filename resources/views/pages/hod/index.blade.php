@extends('layouts.hod')
@section('title', 'HOD Dashboard')

@section('smallNavigation')
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ route('hod.home') }}">Home</a></li>
  </ol>
</div><!-- /.col -->

@endsection

@section('content')

<!-- Small boxes (Stat box) -->
<div class="row">
  <div class="col-md-4">
    <div class="small-box bg-info">
      <div class="inner">
        @php
        $num = count($student);

        if ($num > 0) {
        echo "<h3>$num</h3>";
        echo "<p>Student</p>";
        }
        else {
        echo "<h3>No Student</h3>";
        }
        @endphp
      </div>
      <div class="icon">
        <i class="fas fa-user-graduate"></i>
      </div>
      <a href="{{ route('hod.student.index')}} " class="small-box-footer">More info <i
          class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->


  <div class="col-md-4">
    <div class="small-box bg-primary">
      <div class="inner">
        @php
        $num = count($program);

        if ($num > 0) {
        echo "<h3>$num</h3>";
        echo "<p>Program</p>";
        }
        else {
        echo "<h3>No Program</h3>";
        }
        @endphp
      </div>
      <div class="icon">
        <i class="fas fa-plus"></i>
      </div>
      <a href="{{ route('hod.program.index')}} " class="small-box-footer">More info <i
          class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->

  <div class="col-md-4">
    <div class="small-box bg-success">
      <div class="inner">
        @php
        $num = count($resource);

        if ($num > 0) {
        echo "<h3>$num</h3>";
        echo "<p>Resource</p>";
        }
        else {
        echo "<h3>No Resource</h3>";
        }
        @endphp
      </div>
      <div class="icon">
        <i class="fa fa-rocket"></i>
      </div>
      <a href="{{ route('hod.allocatedResource.index') }}" class="small-box-footer">More info <i
          class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
</div>
@endsection