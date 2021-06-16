@extends('layouts.hod')
@section('title','Comment')

@section('smallNavigation')
<div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ route('hod.home') }}">Home</a></li>
    <li class="breadcrumb-item active">Comment List</li>
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
            <a href="{{ route('hod.hodComment.create') }}" class="btn btn-info">Add comment</a>
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
        
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Student Name</th>
                    <th>Comment Text</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @if (count($comment))

                @php
                    $no = 1;
                @endphp
                    @foreach ($comment as $item)
                    <tr>
                        <td>{{ $no }}</td>
                        <td>{{ $item->fullname }}</td>
                        <td>{{ $item->comment_text }}</td>
                        <td>
                            <a href="{{ route('hod.hodComment.edit',$item->id) }}" class="btn btn-warning">Edit</a>
                        </td>
                        <td>
                            <a href="javascript:void(0)" onclick="$(this).parent().find('form').submit()"
                                class="btn btn-danger">Delete</a>
                            <form action="{{ route('hod.hodComment.destroy', $item->id) }}" method="post">
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
                    <td colspan="5">No Comment Found</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
@endsection