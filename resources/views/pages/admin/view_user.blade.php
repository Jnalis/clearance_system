@extends('layouts.masterAdmin')
@section('title', 'view user')
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">List of Users</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Firstname</th>
              <th>Secondname</th>
              <th>Lastname</th>
              <th>Username</th>
              <th>User Type</th>
              <th>Department</th>
              <th>Password</th>
              <th>Action</th>

            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Trident</td>
              <td>Internet
                Explorer 4.0
              </td>
              <td>Win 95+</td>
              <td> 4</td>
              <td>X</td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
</div>
@endsection