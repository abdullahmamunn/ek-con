@extends('backend.layouts.app') @section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Add Sub Menu</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Menu</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <a href="{{route('frontend-menu.menu.view')}}" class="btn btn-info btn-sm"><i class="fas fa-stream"></i> View Menu</a>
            </div>
            <div class="card-body">
                {{-- <form method="post" action="{{!empty($editData->id) ? route('frontend-menu.menu.update',$editData->id) : route('frontend-menu.menu.store')}}" id="myForm"> --}}
                
                <div class="row">
                    <div class="col-md-6">
                        <form method="post" action="{{route('frontend-menu.menu.store')}}" id="myForm">
                            {{csrf_field()}}
                         
                            <div class="row">
                                <div class="col">
                                    <label>Menu</label>
                                    
                                    <select name="menu_id" id="menu_id" class="form-control">
                                        <option value="">Select Menu</option>
                                            @foreach($menus as $menu)
                                            <option value="{{$menu->id}}">{{$menu->menu_name}}</option>
                                            @endforeach
                                        </option>
                                    </select>
                                </div>
                            </div><br/>
                            <div class="row">
                                <div class="col">
                                    <label>Sub menu</label>
                                    <input type="text" name="submenu_name" id="title_en" class="form-control" value="">
                                </div>
                            </div><br/>
                            <div class="row">
                                <div class="col">
                                    <label>Publish</label>
                                    <select name="status" class="form-control form-control-sm" id="status">
                                        <option value="1">Publish</option>
                                        <option value="0">Un-publish</option>
                                    </select>
                                </div>
                            </div><br/>
                            <div class="row linkpathDiv">
                                <div class="col">
                                    <label>Link Path</label><span style="color:red"> Don't use special charecters, link should be small latters like "testhome"</span>
                                    <input data-toggle="modal" data-target="#myModall" type="text" name="link" id="url_link" class="form-control url_link" value="">
                                    <input type="hidden" name="url_link_file" id="url_link_file" class="url_link_file" value="">
                                    <input type="hidden" name="url_link_type" id="url_link_type" class="url_link_type" value="">
                                </div>
                            </div><br/>
                            
                            <div class="row">
                                <div class="col">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="col-md-6">
                        @php
                         $submenus = \App\SubMenu::paginate(6);   
                        @endphp
                        <table class="table table-borderless text-center">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Sub menu</th>
                                <th scope="col">Handle</th>
                              </tr>
                            </thead>
                            <tbody>
                                @php
                                 $i=1;   
                                @endphp
                                @foreach($submenus as $menu)
                              <tr>
                                <th scope="row">{{$i++}}</th>
                                @if($menu->status ==1)
                                    <td class="dd-handle" style="color: green">{{$menu->submenu_name}}</td>
                                @else
                                    <td class="dd-handle" style="color:red">{{$menu->submenu_name}}</td>
                                @endif
                                {{-- <td>
                                    @foreach($menu->submenu as $submenu)
                                    <span class="dd-handle">
                                        {{$submenu->submenu_name}}
                                        @if(!$loop->last)
                                        
                                        @endif
                                    </span>
                                    @endforeach
                                </td> --}}
                                <td>
                                    <a href="{{route('frontend-menu.menu.destroy',$menu->id)}}" class="btn btn-danger">delete</a>
                                    <a href="{{route('frontend-menu.menu.edit',$menu->id)}}" class="btn btn-success">edit</a>
                                </td>
                              </tr>
                             @endforeach
                            </tbody>
                          </table>  
                          {{$submenus->links()}}   
                    </div>   
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function(){
        $('textarea').each(function(){
            $(this).val($(this).val().trim());
        });
        $('#myForm').validate({
            ignore : [],
            debug : false,
            errorClass:'text-danger',
            validClass:'text-success',
            rules : {
                description:{
                    required: function() 
                    {
                        CKEDITOR.instances.description.updateElement();
                    },
                    minlength:10
                },
                title : {
                    required : true
                }
            },
            messages : {
            }
        });
    });
</script>

<script type="text/javascript">

    <?php if(!@$editData){?>
    $(function(){
            $('.submenuDiv').hide();
        });
    <?php }?>

    $(function(){
        $(document).on('change','#menu_id',function(){
            var menu_id =$(this).val();
            if(menu_id =='' || menu_id =='0'){
                $('.submenuDiv').hide();
                $('#sub_menu_id').val('');
                $('#url_link').val('');
            }else{
                $('.submenuDiv').show();
            }
        });
        $(document).on('change','#sub_menu_id',function(){
            var menu_id =$(this).val();
            if(menu_id =='' || menu_id =='0'){
                $('#url_link').val('');
            }else{
                $('.linkpathDiv').show();
            }
        });
    });

    $(function(){
        $(document).on('change','#menu_id',function(){
            var menu_id =$(this).val();
            $.ajax({
                url:"{{route('table.data.submenu')}}",
                type:"GET",
                data:{menu_id:menu_id},
                success:function(data){
                    $('#sub_menu_id').html(data);
                }
            });
        });
    });
</script>

@endsection