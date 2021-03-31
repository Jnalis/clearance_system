@extends('layouts.admin')
@section('title', 'View Department')
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Department List</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Department name</th>
              <th>Department code</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Trident</td>
              <td>Internet Explorer 4.0</td>
              <td>Action</td>
            </tr>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
</div>
@endsection