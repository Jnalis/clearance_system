@extends('layouts.hod')
@section('title','Program')

@section('tableCss')

<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}" />
<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}" />
@endsection

@section('smallNavigation')
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('hod.home') }}">Home</a></li>
        <li class="breadcrumb-item active">Program List</li>
    </ol>
</div><!-- /.col -->

@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">List of Program</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <p>
            <a href="{{ route('hod.program.create') }}" class="btn btn-info">Add Program</a>
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
                    <th>Program Name</th>
                    <th>Program code</th>
                    <th>Department code</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @php
                $no = 1;
                @endphp
                @if (count($program))
                @foreach ($program as $prog)

                <tr>
                    <td>{{ $no }}</td>
                    <td>{{ $prog->prog_name }}</td>
                    <td>{{ $prog->prog_code }}</td>
                    <td>{{ $prog->dept_code }}</td>
                    <td>
                        <a href="{{ route('hod.program.edit',$prog->id) }}" class="btn btn-warning">Edit</a>
                    </td>
                    <td>
                        <a href="javascript:void(0)" onclick="$(this).parent().find('form').submit()"
                            class="btn btn-danger">Delete</a>
                        <form action="{{ route('hod.program.destroy', $prog->id) }}" method="post">
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
                    <td colspan="5">No Program Found</td>
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