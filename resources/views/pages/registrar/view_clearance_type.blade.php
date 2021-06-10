@extends('layouts.registrar')
@section('title', 'Clearance Type')


@section('tableCss')

<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}" />
<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}" />
@endsection


@section('smallNavigation')
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ route('registrar.home') }}">Home</a></li>
    <li class="breadcrumb-item active">Clearance Type List</li>
  </ol>
</div><!-- /.col -->
@endsection

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Clearance Type List</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <p>
          <a href="{{ route('registrar.clearancetype.create') }}" class="btn btn-info">Add Clearance type</a>
        </p>
        <div class="result">
          @if (session('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @endif
          @if (session('danger'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('danger') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @endif
        </div>
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th>Clearance Type</th>
              <th>Created at</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
            @php
            $no = 1;
            @endphp
            @if (count($clearance))
            @foreach ($clearance as $item)
            <tr>
              <td>{{ $no }}</td>
              <td>{{ $item->clearancetype }}</td>
              <td>{{ date('d/M/Y', strtotime($item->created_at)) }}</td>
              <td>
                <a href="{{ route('registrar.clearancetype.edit', $item->id) }}" class="btn btn-warning">Edit</a>
              </td>
              <td>
                <a href="javascript:void(0)" onclick="$(this).parent().find('form').submit()"
                  class="btn btn-danger">Delete</a>
                <form action="{{ route('registrar.clearancetype.destroy', $item->id) }}" method="POST">
                  @method('delete')
                  @csrf
                </form>
              </td>
            </tr>
            @php
            $no++;
            @endphp
            @endforeach
            @else
            <tr>
              <td colspan="5">No Usertype Found</td>
            </tr>
            @endif
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
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