@extends('layouts.ra')
@section('title','Lost Resource')

@section('smallNavigation')
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('ra.home') }}">Home</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('ra.resource.index') }}">Resource list</a></li>
        <li class="breadcrumb-item active">Lost resource list</li>

    </ol>
</div><!-- /.col -->
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">List of Lost Resource</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Resource Type</th>
                    <th>Refunded Status</th>
                    <th>Amount Refunded</th>
                </tr>
            </thead>
            <tbody>
                {{-- @php
                $no = 1;
                @endphp
                @if (count($data))
                @foreach ($data as $item)
                <tr>
                    <td>{{ $no }}</td>
                    <td>{{ $item->student_id }}</td>
                    <td>{{ $item ->resource_id}}</td>
                    <td>{{ $item ->refunded_status}}</td>
                </tr>
                @php
                $no++;
                @endphp
                @endforeach
                @else
                <tr>
                    <td colspan="4">No Lost Resource Found</td>
                </tr>
                @endif --}}
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
@endsection