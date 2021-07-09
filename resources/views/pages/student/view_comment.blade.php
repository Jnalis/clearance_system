@extends('layouts.student')
@section('title', 'Comment')


@section('tableCss')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}" />
<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}" />
@endsection


@section('smallNavigation')
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ route('student.home') }}">Home</a></li>
    <li class="breadcrumb-item active">Comment</li>
  </ol>
</div><!-- /.col -->

@endsection

@section('content')
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Comments from staff</h3>
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

    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th> #</th>
          <th>Comment</th>
          <th>Comment from</th>
        </tr>
      </thead>
      <tbody>
        @php
        $no = 1;
        @endphp
        @if (count($comments))
        @foreach ($comments as $comment)
        <tr>
          <td>{{ $no }}</td>
          <td>{{ $comment->comment_text }}</td>
          <td>{{ $comment->fullname }}</td>
        </tr>
        @php
        $no++;
        @endphp
        @endforeach
        @else
        <tr>
          <td colspan="3">No comment found</td>
        </tr>
        @endif
      </tbody>
    </table>
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