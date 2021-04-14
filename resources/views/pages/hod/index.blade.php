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

  <div class="col-lg-3 col-6">
    <div class="small-box bg-info">
      <div class="inner">
        @php
        $num = count($student);

        if ($num > 0) {
        echo "<h3 class=\"text-center\">$num Student</h3>";
        }
        else {
        echo "<h3 class=\"text-center\">$num Student</h3>";
        }
        @endphp
      </div>
      <div class="icon">
        <i class="fas fa-users"></i>
      </div>
      <a href="{{ route('hod.student.index')}} " class="small-box-footer">More info <i
          class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->

  <div class="col-lg-3 col-6">
    <div class="small-box bg-success">
      <div class="inner">
        @php
        $num = count($resource);

        if ($num > 0) {
        echo "<h3 class=\"text-center\">$num Resource</h3>";
        }
        else {
        echo "<h3 class=\"text-center\">$num Resource</h3>";
        }
        @endphp
      </div>
      <div class="icon">
        <i class="fas fa-building"></i>
      </div>
      <a href="{{ route('hod.allocatedResource.index') }}" class="small-box-footer">More info <i
          class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->


  <div class="col-lg-3 col-6">
    <div class="small-box bg-warning">
      <div class="inner">

        @php
        $num = count($issue);

        if ($num > 0) {
        echo "<h3 class=\"text-center\">$num Issued Res</h3>";
        }
        else {
        echo "<h3 class=\"text-center\">$num Issued Res</h3>";
        }
        @endphp

      </div>
      <div class="icon">
        <i class="fas fa-layer-group"></i>
      </div>
      <a href="{{ route('hod.issuedResource.index') }}" class="small-box-footer">More info <i
          class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-danger">
      <div class="inner">
        @php
        $num = count($lost);

        if ($num > 0) {
        echo "<h3 class=\"text-center\">$num Lost Res</h3>";
        }
        else {
        echo "<h3 class=\"text-center\">$num Lost Res</h3>";
        }
        @endphp
      </div>
      <div class="icon">
        <i class="nav-icon fas fa-info"></i>
      </div>
      <a href="{{ route('hod.lostResource.index') }}" class="small-box-footer">More info <i
          class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
</div>
@endsection