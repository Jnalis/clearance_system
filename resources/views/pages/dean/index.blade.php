@extends('layouts.dean')
@section('title', 'Dean Dashboard')

@section('smallNavigation')
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ route('dean.home') }}">Home</a></li>
  </ol>
</div><!-- /.col -->

@endsection

@section('content')
<!-- Small boxes (Stat box) -->
<div class="row">
  <div class="col-md-4 col-6">
    <div class="small-box bg-info">
      <div class="inner">
        @php
        $num = count($student);

        if ($num > 0) {
        echo "<h3>$num</h3>";
        echo "<p>Student</p>";
        }
        else {
        echo "<h3>No</h3>";
        }
        @endphp
      </div>
      <div class="icon">
        <i class="fas fa-user-graduate"></i>
      </div>
      <a href="{{ route('dean.student.index') }} " class="small-box-footer">
        More info <i class="fas fa-arrow-circle-right"></i>
      </a>
    </div>
  </div>
  <!-- ./col -->

  <div class="col-md-4 col-6">
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
      <a href="{{ route('dean.resource.index')}} " class="small-box-footer">More info <i
          class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->

  <div class="col-md-4 col-6">
    <div class="small-box bg-warning">
      <div class="inner">
        @php
        $num = count($comment);

        if ($num > 0) {
        echo "<h3>$num</h3>";
        echo "<p>Comment</p>";
        }
        else {
        echo "<h3>No Comment</h3>";
        }
        @endphp
      </div>
      <div class="icon">
        <i class="fas fa-comments"></i>
      </div>
      <a href="{{ route('dean.deanComment.index')}} " class="small-box-footer">More info <i
          class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
</div>
@endsection