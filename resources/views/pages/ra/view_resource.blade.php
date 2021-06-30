@extends('layouts.ra')
@section('title','Resource')


@section('tableCss')

<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}" />
<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}" />
@endsection



@section('smallNavigation')

<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('ra.home') }}">Home</a></li>
        <li class="breadcrumb-item active">Resource list</li>

    </ol>
</div><!-- /.col -->
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">List of Resource</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <p>
            <a href="{{ route('ra.resource.create') }}" class="btn btn-info">Add Resource</a>
            <a href="{{ route('ra.allocatedResource.create') }}" class="btn btn-warning">Allocate Resource</a>
            <a href="{{ route('ra.allocatedResource.index') }}" class="btn btn-success">Allocated Resource</a>
            <a href="{{ route('ra.lostResource.index') }}" class="btn btn-danger">Lost Resource</a>
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
          </div>

        
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Resource Name</th>
                    <th>Resource Value(Tshs)</th>
                    <th>Registered at</th>
                    <th>Allocated</th>
                    <th>Available</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @php
                $no = 1;
                @endphp
                @if (count($resource))
                @foreach ($resource as $r)
                <tr>

                    <td>{{ $no }}</td>
                    <td>{{ $r->resource_type }}</td>
                    <td>{{ $r->resource_amount }}</td>
                    <td>{{ date('d/M/Y', strtotime($r->created_at)) }}</td>
                    <td>{{$r->allocated }}</td>
                    <td>{{$r->available }}</td>
                    <td>
                        <a href="{{ route('ra.resource.edit',$r->id) }}" class="btn btn-warning">Edit</a>
                    </td>
                    <td>
                        <a href="javascript:void(0)" onclick="$(this).parent().find('form').submit()"
                            class="btn btn-danger">Delete</a>
                        <form action="{{ route('ra.resource.destroy', $r->id) }}" method="post">
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
                    <td colspan="8">You didn't upload a resource yet</td>
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