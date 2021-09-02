@extends('backend.layouts.app')
@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"> Manage Role</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Role</li>
        </ol>
      </div>
    </div>
  </div>
</div>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="card"> 
          <div class="card-header">
            <a id="demo-btn-addrow" class="btn btn-success btn-sm text-white" data-toggle="modal" data-target="#myModal"><i class="fas fa-plus"></i>Add Role</a>
          </div>
          <div class="card-body">
            <table id="dataTable" class="table table-sm table-bordered table-striped">
              <thead>
                  <tr>
                    <th class="min-width">SL</th>
                    <th>Role Name</th>
                    <th>Role Functionality</th>
                    <th class="text-center" style="width: 8%">Action</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($roles as $role)
                <tr>                                         
                  <td> {{$loop->iteration}}</td>
                    <td>{{ $role->name }}</td>                
                    <td>{{ $role->description }}</td>                
                    <td class="text-center">
                      <a class="editRole btn btn-primary btn-flat btn-sm edit" data-id="{{$role->id}}"  data-type="image" data-id="" data-table="Slider"><i class="fas fa-edit"></i></a>
                    </td>
                </tr>
                @endforeach                
              </tbody>                
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Create Role</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form id="menuForm" action="{{ route('user.role.store') }}" method="post" >
            {{ csrf_field()}}
            <div class="card-body">
              <div class="col-sm-12">
                <div class="form-group">
                  <label class="control-label">Role Name</label>
                  <input type="text" id="name" value="{{ old('name') }}" name="name" class="form-control {{$errors->has('name') ? 'is-invalid' : '' }}" placeholder="Role Name">
                  @if ($errors->has('name'))
                  <span class="invalid-feedback">
                    <strong>{{ $errors->first('name') }}</strong>
                  </span>
                  @endif
                </div>
                <div class="form-group">
                  <label class="control-label">Role Function</label>
                  <textarea id="description" value="{{ old('description') }}" name="description" class="form-control" placeholder="Role Functionality" rows="6"></textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer text-right">
            <button id="submitButton" class="btn btn-success" type="submit">Store Role</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $("#demo-btn-addrow").click(function(){
      $("input[type=text],select,input[type=number]").val("");
    });
    var err='{{count($errors->all())}}';
    if(err>0){
      $('#myModal').modal('show');
    }
  });

  $(".editRole").click(function(){
    var roleid = $(this).attr('data-id');       
    $.ajax({
      url: "{{ route('user.role.edit') }}",
      type: "GET",
      data: {'id' : roleid},
      success: function(data){
        var actionUrl = '{{route("user.role.update", "/")}}'+'/'+data.id;
        $('#id').val(data.id);
        $('#name').val(data.name);
        $('#description').val(data.description);
        $('#submitButton').text('Update Role');
        $('#menuForm').attr('action', actionUrl);
        $('#myModal').modal('show');
      }
    });
  });


</script>
@endsection