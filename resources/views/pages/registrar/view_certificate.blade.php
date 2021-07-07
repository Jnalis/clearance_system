@extends('layouts.registrar')
@section('title', 'Certificate')


@section('tableCss')

<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}" />
<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}" />
@endsection


@section('smallNavigation')
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ route('registrar.home') }}">Home</a></li>
    <li class="breadcrumb-item active">Certificate List</li>
  </ol>
</div><!-- /.col -->
@endsection

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Certificate List</h3>
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
              <th>#</th>
              <th>Certificate status</th>
              <th>Issued to</th>
              <th>Issued date</th>
              {{-- <th>Edit</th>
              <th>Delete</th> --}}
            </tr>
          </thead>
          <tbody>
            @php
            $no = 1;
            @endphp
            @if (count($certificate))
            @foreach ($certificate as $item)
            <tr>
              <td>{{ $no }}</td>
              <td>{{ $item->certificate_status }}</td>
              <td>{{ $item->student_id }}</td>
              <td>{{ date('d/M/Y', strtotime($item->created_at)) }}</td>
              {{-- <td>
                <a href="{{ route('admin.usertype.edit', $item->id) }}" class="btn btn-warning">Edit</a>
              </td>
              <td>
                <a href="javascript:void(0)" onclick="$(this).parent().find('form').submit()"
                  class="btn btn-danger">Delete</a>
                <form action="{{ route('admin.usertype.destroy', $item->id) }}" method="POST">
                  @method('delete')
                  @csrf
                </form>
              </td> --}}
            </tr>
            @php
            $no++;
            @endphp
            @endforeach
            @else
            <tr>
              <td colspan="4">No certificate issued</td>
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