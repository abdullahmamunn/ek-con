@extends('backend.layouts.app')
@section('content')
 <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">User Messages</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Post</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
        	<div class="col-lg-12">
	        	<div class="card"> 
	        		<div class="">
	        			{{-- <a href="{{ route('frontend-menu.post.add') }}" class="btn btn-sm btn-info"><i class="fas fa-plus"></i> Add Post For menu</a> --}}
	        			{{-- <a href="{{ route('frontend-menu.sub.post.add') }}" class="btn btn-sm btn-info"><i class="fas fa-plus"></i> Add Post For Sub menu</a> --}}
	        		</div>
		            <div class="card-body">
		              <table id="dataTable" class="table table-sm table-bordered table-striped">
		                <thead>
		                <tr>
		                  <th>#SL</th>
		                  <th>Name</th>
		                  <th>Email</th>
		                  <th>Subject</th>
		                  <th>Message</th>
		                  <th>Action</th>
		                </tr>
		                </thead>
		                <tbody>
		                  @foreach($user_msg as $key => $msg)	
  		                <tr>		                  	                 
  		                  <td> {{$key+1}}</td>
                          <td>{{$msg->name}}</td>
                          <td>{{$msg->email}}</td>
                          <td>{{$msg->subject}}</td>
                          <td>{{$msg->message}}</td>
                          <td>
                            {{-- <a href="" class="btn btn-primary">View</a> --}}
                            <a href="{{route('delete.contactus',$msg->id)}}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                          </td>
  		                </tr>
		                  @endforeach                
		                </tbody>                
		              </table>
		            </div>
	            <!-- /.card-body -->
          		</div>
          <!-- /.card -->
        	</div>
        </div>
      </div>
      <!--/. container-fluid -->
    </section>
@endsection

