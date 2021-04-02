@extends('layouts.ra')
@section('title','Resource')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">List of Allocated</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Resource ID</th>
                    <th>Resource Type</th>
                    <th>Resource Amount</th>
                    <th>Registered at</th>
                </tr>
            </thead>
            <tbody>
                @if (count($allocResources))
                @foreach ($allocResources as $r)
                <tr>
                    <td>{{ $r->id }}</td>
                    <td>{{ $r->resource_type }}</td>
                    <td>{{ $r->resource_amount }}</td>
                    <td>{{ $r->created_at }}</td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="4">No Resource Found</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
@endsection
