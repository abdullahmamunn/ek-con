@extends('backend.layouts.app')
@section('content')
<div class="col-xl-12">
  <div class="breadcrumb-holder">
    <h1 class="main-title float-left">User Information</h1>
    <ol class="breadcrumb float-right">
      <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><strong>Home</strong></a></li>
      <li class="breadcrumb-item active">User</li>
    </ol>
    <div class="clearfix"></div>
  </div>
</div>
@if ($errors->any())
  @foreach ($errors->all() as $error)
  <script type="text/javascript">
    $(function () {
      $.notify("{{$error}}", {globalPosition: 'top right', className: 'error'});
    });
  </script>
  @endforeach
  @endif
<div class="container fullbody">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h5>User List
          <a class="btn btn-sm btn-success float-right" href="{{route('user.add')}}"><i class="fa fa-plus-circle"></i> Add User</a>
        </h5>
      </div>
        <div class="card-body">
          <table id="dataTable" class="table table-sm table-bordered table-striped">
            <thead>
              <tr>
                <th>SN</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th style="width:10%">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($user as $u)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$u['name']}}</td>
                <td>{{$u['email']}}</td>
                <td>{{@$u['user_roles']['role_details']['name']}}</td>
                <td>
                  <a class="btn btn-sm btn-success" title="Edit" href="{{route('user.edit',$u->id)}}"><i class="fa fa-edit"></i></a>
                  <a class="btn btn-sm btn-danger" title="Delete" href="{{route('user.delete',$u->id)}}"><i class="fa fa-trash"></i></a>
                  <!-- <a class="delete btn btn-sm btn-danger" data-id="{{$u['id']}}" data-table="users"><i class="fa fa-trash"></i></a> -->
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
