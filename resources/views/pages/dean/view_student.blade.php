@extends('layouts.dean')
@section('title','Student List')
@section('smallNavigation')
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('dean.home') }}">Home</a></li>
        <li class="breadcrumb-item active">Student list</li>
    </ol>
</div><!-- /.col -->

@endsection
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">List of student</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Registration No</th>
                    <th>Program</th>
                    <th>Department</th>
                    <th>Entry year</th>
                    <th>Registered</th>
                </tr>
            </thead>
            <tbody>
                @php
                $no = 1;
                @endphp
                @if (count($student))
                @foreach ($student as $stud)

                <tr>
                    <td>{{ $no }}</td>
                    <td>{{ $stud->fullname }}</td>
                    <td>{{ $stud->student_id }}</td>
                    <td>{{ $stud->program }}</td>
                    <td>{{ $stud->department }}</td>
                    <td>{{ $stud->entry_year }}</td>
                    <td>{{ $stud->registered }}</td>
                </tr>
                @php
                $no++;
                @endphp
                @endforeach
                @else
                <tr>
                    <td colspan="7">No Student Found</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
@endsection