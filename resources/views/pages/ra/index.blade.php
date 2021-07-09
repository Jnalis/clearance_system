@extends('layouts.ra')
@section('title', 'RA Dashboard')

@section('smallNavigation')
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ route('ra.home') }}">Home</a></li>

  </ol>
</div><!-- /.col -->
@endsection

@section('content')
<!-- Small boxes (Stat box) -->
<div class="row">

  <div class="col-lg-4">
    <!-- small box -->
    <div class="small-box bg-info">
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
      <a href="{{ route('ra.resource.index') }}" class="small-box-footer">More info <i
          class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->


  <div class="col-lg-4">
    <!-- small box -->
    <div class="small-box bg-success">
      <div class="inner">
        @php
        $num = count($departments);
        
        if ($num > 0) {
        echo "<h3>$num</h3>";
        echo "<p>Department</p>";
        }
        else {
        echo "<h3>No department</h3>";
        }
        @endphp
      </div>
      <div class="icon">
        <i class="fas fa-building"></i>
      </div>
      <a href="{{ route('ra.viewDeptRA.index') }}" class="small-box-footer">More info <i
          class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->




</div>
@endsection