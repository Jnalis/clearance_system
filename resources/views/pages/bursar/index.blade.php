@extends('layouts.bursar')
@section('title', 'Bursar Dashboard')

@section('smallNavigation')
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
    {{-- <li class="breadcrumb-item"><a href="{{ route('ra.home') }}">Home</a></li> --}}

  </ol>
</div><!-- /.col -->
@endsection

@section('content')
<!-- Small boxes (Stat box) -->
<div class="row">

  {{-- <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-info">
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
        <i class="fas fa-users"></i>
      </div>
      <a href="{{ route('ra.resource.index') }}" class="small-box-footer">More info <i
          class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div> --}}
  <!-- ./col -->


  {{-- <div class="col-lg-4 col-6">
    <!-- small box -->
    <div class="small-box bg-info">
      <div class="inner">
        @php
        $num = count($allocated_resource);

        if ($num > 0) {
        echo "<h3 class=\"text-center\">$num Allocated Resource</h3>";
        }
        else {
        echo "<h3 class=\"text-center\">$num Allocated Resource</h3>";
        }
        @endphp
      </div>
      <div class="icon">
        <i class="fas fa-users"></i>
      </div>
      <a href="{{ route('ra.allocatedResource.index') }}" class="small-box-footer">More info <i
          class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div> --}}


  {{-- <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-danger">
      <div class="inner">
        @php
        $num = count($data);

        if ($num > 0) {
        echo "<h3 class=\"text-center\">$num Lost Resource</h3>";
        }
        else {
        echo "<h3 class=\"text-center\">$num Lost Resource</h3>";
        }
        @endphp
      </div>
      <div class="icon">
        <i class="fas fa-users"></i>
      </div>
      <a href="{{ route('ra.lostResource.index') }}" class="small-box-footer">More info <i
          class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div> --}}
</div>
<!-- ./col -->




{{-- <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>53</h3>

              <p></p>
            </div>
            <div class="icon">
                <i class="fas fa-building"></i>
            </div>
            <a href="/hod/view_allocated_resource" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div> --}}
<!-- ./col -->




{{-- <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>44</h3>

              <p>Issued Resource</p>
            </div>
            <div class="icon">
                <i class="fas fa-layer-group"></i>
            </div>
            <a href="/hod/view_issued_resource" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div> --}}
<!-- ./col -->



{{-- <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>65</h3>

              <p>Returned Resource</p>
            </div>
            <div class="icon">
                <i class="nav-icon fas fa-info"></i>
            </div>
            <a href="/hod/view_returned_resource" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div> --}}
<!-- ./col -->


</div>
@endsection