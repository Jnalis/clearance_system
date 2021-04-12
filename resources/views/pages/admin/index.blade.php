@extends('layouts.admin')
@section('title', 'Admin')

@section('smallNavigation')
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
  </ol>
</div><!-- /.col -->
@endsection

@section('content')
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              @php
                  $num = count($staff);
                  
                  if ($num > 0) {
                    echo "<h3 class=\"text-center\">$num Staff</h3>";
                  }
                  else {
                    echo "<h3 class=\"text-center\">$num Staff</h3>";
                  }
              @endphp
            </div>
            <div class="icon">
              <i class="fas fa-users"></i>
            </div>
            <a href="{{ route('admin.staff.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-3 col-6">
          <div class="small-box bg-success">
            <div class="inner">
              @php
                  $num = count($dept);
                  
                  if ($num > 0) {
                    echo "<h3 class=\"text-center\">$num Departments</h3>";
                  }
                  else {
                    echo "<h3 class=\"text-center\">$num Departments</h3>";
                  }
              @endphp
            </div>
            <div class="icon">
                <i class="fas fa-building"></i>
            </div>
            <a href="{{ route('admin.department.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-3 col-6">
          <div class="small-box bg-warning">
            <div class="inner">
              @php
                  $num = count($user_type);
                  
                  if ($num > 0) {
                    echo "<h3 class=\"text-center\">$num Usertype</h3>";
                  }
                  else {
                    echo "<h3 class=\"text-center\">$num Usertype</h3>";
                  }
              @endphp
            </div>
            <div class="icon">
                <i class="fas fa-layer-group"></i>
            </div>
            <a href="{{ route('admin.usertype.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-3 col-6">
          <div class="small-box bg-danger">
            <div class="inner">
              @php
                  $num = 0;
                  
                  if ($num > 0) {
                    echo "<h3 class=\"text-center\">$num System Logs</h3>";
                  }
                  else {
                    echo "<h3 class=\"text-center\">$num System Logs</h3>";
                  }
              @endphp
            </div>
            <div class="icon">
                <i class="nav-icon fas fa-info"></i>
            </div>
            <a href="{{ route('admin.systemlog.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
@endsection