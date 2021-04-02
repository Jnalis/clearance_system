@extends('layouts.hod')
@section('title','Issued Resource')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">List of Issued Resource</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th> ID</th>
                    <th>Student Name</th>
                    <th>Student Reg No</th>
                    {{-- <th>Issued Resource ID</th> --}}
                    <th>Resource Type</th>
                    {{-- <th>Amount</th> --}}
                    <th>Date Issued</th>
                    <th>Date to Return</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if (count($issued_r))
                @foreach ($issued_r as $r)
                <tr>
                    <td>{{ $r->id }}</td>
                    <td>{{ $r->student_name }}</td>
                    <td>{{ $r->student_reg_no }}</td>
                    {{-- <td>{{ $r->resource_id }}</td> --}}
                    <td>{{ $r->resource_type }}</td>
                    {{-- <td>{{ $r->amount }}</td> --}}
                    <td>{{ $r->created_at }}</td>
                    <td>{{ $r->date_to_return }}</td>
                    <td>
                        <a href="#{{-- route('admin.edit_department',$dept->id) --}}" class="btn btn-success">Return</a>
                        <a href="#" class="btn btn-warning">Lost</a>
                      </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="6">No Issued Resource</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
@endsection