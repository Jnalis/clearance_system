@extends('layouts.registrar')
@section('title', 'Registrar Dashboard')

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

  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-info">
      <div class="inner">
        @php
        $num = count($clearance);

        if ($num > 0) {
        echo "<h3 class=\"text-center\">$num Clearance</h3>";
        }
        else {
        echo "<h3 class=\"text-center\">$num Clearance</h3>";
        }
        @endphp
      </div>
      <div class="icon">
        <i class="fas fa-users"></i>
      </div>
      <a href="{{ route('registrar.clearancetype.index') }}" class="small-box-footer">More info <i
          class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
</div>

</div>
@endsection