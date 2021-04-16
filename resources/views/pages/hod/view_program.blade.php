@extends('layouts.hod')
@section('title','Program')

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
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            @endif
        </div>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Program Name</th>
                    <th>Program code</th>
                    <th>Action</th>
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
                    <td>
                        <a href="{{ route('hod.program.edit',$prog->id) }}" class="btn btn-warning">Edit</a>
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
                    <td colspan="4">No Program Found</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
@endsection