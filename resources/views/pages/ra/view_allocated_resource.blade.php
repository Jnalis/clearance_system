@extends('layouts.ra')
@section('title','Resource')

@section('smallNavigation')
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('ra.home') }}">Home</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('ra.resource.index') }}">Resource list</a></li>
        <li class="breadcrumb-item active">Allocated resource list</li>

    </ol>
</div><!-- /.col -->
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">List of Allocated</h3>
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

          
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Resource Name</th>
                    <th>Resource Value(Tshs)</th>
                    <th>Custodian</th>
                    <th>Remove from Custodian</th>
                </tr>
            </thead>
            <tbody>
                @php
                $no = 1;
                @endphp
                @if (count($resources))
                @foreach ($resources as $resource)
                <tr>
                    <td>{{ $no }}</td>
                    <td>{{ $resource->resource_type }}</td>
                    <td>{{ $resource->resource_amount }}</td>
                    <td>{{ $resource->fullname }}</td>
                    <td>
                        <a href="javascript:void(0)" onclick="$(this).parent().find('form').submit()"
                            class="btn btn-danger">Remove</a>
                        <form action="{{ route('ra.allocatedResource.destroy', $resource->id) }}" method="post">
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
                    <td colspan="6">No Resource Found</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
@endsection