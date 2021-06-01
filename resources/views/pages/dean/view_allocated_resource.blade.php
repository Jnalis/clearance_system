@extends('layouts.dean')
@section('title','Allocated Resource')

@section('smallNavigation')
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('dean.home') }}">Home</a></li>
        <li class="breadcrumb-item active">Resource List</li>
    </ol>
</div><!-- /.col -->

@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">List of Allocated Resource</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <p>
            <a href="{{ route('dean.resourceList.create') }}" class="btn btn-info">Issue Resource</a>
            <a href="{{ route('dean.resourceIssued.index') }}" class="btn btn-success">Issued Resource</a>
            <a href="{{ route('dean.resourceLost.index') }}" class="btn btn-danger">Lost Resource</a>
        </p>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Resource Type</th>
                    <th>Resource Amount</th>
                    <th>Issued</th>
                    <th>Available</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @if (count($resource))
                @foreach ($resource as $item)

                <tr>
                    <td>{{ $no }}</td>
                    <td>{{ $item->resource_type }}</td>
                    <td>{{ $item->resource_amount }}</td>
                    <td>{{ $item->issued }}</td>
                    <td>{{ $item->available }}</td>
                </tr>
                @php
                    $no++;
                @endphp
                @endforeach
                @else
                <tr>
                    <td colspan="5">No Allocated Resource for you</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
@endsection