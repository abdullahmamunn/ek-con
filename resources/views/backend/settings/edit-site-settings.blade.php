@extends('backend.layouts.app')
@section('content')
 <!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Site Settings</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Site Settings </li>
                </ol>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">

        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">
              <i class="fas fa-edit"></i>
             Edit Settings
            </h3>
            </div>
            <div class="card-body">
                <form action="{{route('site.setting.update')}}" method="post" enctype="multipart/form-data">
                  @csrf
                    <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="pill" href="#general" role="tab" aria-selected="true"><i class="fas fa-cog"></i> General</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" href="#social-link" role="tab" aria-selected="false"><i class="fas fa-share"></i> Social Url</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" href="#recaptcha" role="tab" aria-selected="false"><i class="fas fa-external-link-square-alt"></i> Google</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" href="#social-login" role="tab" aria-selected="false"><i class="fas fa-star"></i> Social Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" href="#email-setting" role="tab" aria-selected="false"><i class="fas fa-envelope"></i> Email Settings</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" href="#home-slider" role="tab" aria-selected="false"><i class="fas fa-desktop"></i> Home Slider</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" href="#other" role="tab" aria-selected="false"><i class="fas fa-wrench"></i> Other</a>
                        </li>


                    </ul>
                    <div class="tab-content" id="custom-content-below-tabContent">
                        <div class="tab-pane fade show active" id="general" role="tabpanel">
                          <br>
                          <div class="form-row">
                              <div class="form-group col-sm-12">
                                <label>Company Name</label>
                                <input type="text" class="form-control" name="company_name" autocomplete="off" value="{{$setting->company_name}}">
                              </div>
                              <div class="form-group col-sm-12">
                                <label>Site Title</label>
                                <input type="text" class="form-control" name="site_title" autocomplete="off" value="{{$setting->site_title}}">
                              </div>
                              <div class="form-group col-sm-12">
                                <label>Site Title (bn)</label>
                                <input type="text" class="form-control" name="site_title_bn" autocomplete="off" value="{{$setting->site_title_bn}}">
                              </div>
                              <div class="form-group col-sm-12">
                                <label>Site Short Description</label>
                                <textarea type="text" class="form-control textarea" name="site_short_description">{{$setting->site_short_description}}</textarea>
                              </div>
                              <div class="form-group col-sm-12">
                                <label>Site Short Description(bn)</label>
                                <textarea type="text" class="form-control textarea" name="site_short_description_bn">{{$setting->site_short_description_bn}}</textarea>
                              </div>
                              <div class="form-group col-sm-6">
                                <label>Header Logo Image</label><br>
                                <img src="{{asset('public/upload/logo/'.$setting->site_header_logo)}}" style="width: 200px;height: 100px">
                              </div>
                              <div class="form-group col-sm-6">
                                <label>Footer Logo Image</label><br>
                                <img src="{{asset('public/upload/logo/'.$setting->site_footer_logo)}}" style="width: 200px;height: 100px">
                              </div>
                              <div class="form-group col-sm-6">
                                <label>Header Logo</label>
                                <input type="file" class="form-control" name="site_header_logo" accept="image/*">
                                <span class="badge badge-info">File Type: jpg, jpeg, png</span>
                              </div>
                              <div class="form-group col-sm-6">
                                <label>Footer Logo</label>
                                <input type="file" class="form-control" name="site_footer_logo" accept="image/*">
                                <span class="badge badge-info">File Type: jpg, jpeg, png</span>
                              </div>
                              <div class="form-group col-sm-6">
                                <label>Favicon</label><br>
                                <img src="{{asset('public/upload/logo/'.$setting->site_favicon)}}" style="width: 100px;height: 100px">
                              </div>
                              <div class="form-group col-sm-6">
                                <label>Banner Image</label><br>
                                <img src="{{asset('public/upload/logo/'.$setting->site_banner_image)}}" style="width: 300px;height: 100px">
                              </div>
                              <div class="form-group col-sm-6">
                                <label>Favicon</label>
                                <input type="file" class="form-control" name="site_favicon" accept="image/*">
                                <span class="badge badge-info">File Type: png, ico</span>
                              </div>
                              <div class="form-group col-sm-6">
                                <label>Banner Image</label>
                                <input type="file" class="form-control" name="site_banner_image" accept="image/*">
                                <span class="badge badge-info">File Type: jpg, jpeg, png</span>
                              </div>
                              <div class="form-group col-sm-12">
                                <label>Site Email</label>
                                <input type="email" class="form-control" name="site_email"  autocomplete="off" value="{{$setting->site_email}}">
                              </div>
                              <div class="form-group col-sm-6">
                                <label>Phone(Primary)</label>
                                <input type="text" class="form-control" name="site_phone_primary"  autocomplete="off" value="{{$setting->site_phone_primary}}">
                              </div>
                              <div class="form-group col-sm-6">
                                <label>Phone(Secondary)</label>
                                <input type="text" class="form-control" name="site_phone_secondary"  autocomplete="off" value="{{$setting->site_phone_secondary}}">
                              </div>
                              <div class="form-group col-sm-12">
                                <label>Site Address</label>
                                <textarea type="text" class="form-control textarea" name="site_address">{{$setting->site_address}}</textarea>
                              </div>
                          </div>                          
                        </div>
                        <div class="tab-pane fade" id="social-link" role="tabpanel">
                            <br> 
                             <div class="form-row">
                              <div class="form-group col-sm-12">
                                <label>Facebook Url</label>
                                <input type="text" class="form-control" name="facebook_url"  autocomplete="off" value="{{$setting->facebook_url}}">
                              </div>
                              <div class="form-group col-sm-12">
                                <label>Twitter Url</label>
                                <input type="text" class="form-control" name="twitter_url" autocomplete="off" value="{{$setting->facebook_url}}">
                              </div>
                              <div class="form-group col-sm-12">
                                <label>Google Plus Url</label>
                                <input type="text" class="form-control" name="google_plus_url" autocomplete="off" value="{{$setting->facebook_url}}">
                              </div>
                              <div class="form-group col-sm-12">
                                <label>Linkedin Url</label>
                                <input type="text" class="form-control" name="linkedin_url" autocomplete="off" value="{{$setting->facebook_url}}">
                              </div>
                              <div class="form-group col-sm-12">
                                <label>Youtube Url</label>
                                <input type="text" class="form-control" name="youtube_url" autocomplete="off" value="{{$setting->facebook_url}}">
                              </div>
                              <div class="form-group col-sm-12">
                                <label>Instagram Url</label>
                                <input type="text" class="form-control" name="instagram_url" autocomplete="off" value="{{$setting->facebook_url}}">
                              </div>
                              <div class="form-group col-sm-12">
                                <label>Pinterest Url</label>
                                <input type="text" class="form-control" name="pinterest_url" autocomplete="off" value="{{$setting->facebook_url}}">
                              </div>
                              <div class="form-group col-sm-12">
                                <label>Tumblr Url</label>
                                <input type="text" class="form-control" name="tubmlr_url" autocomplete="off" value="{{$setting->facebook_url}}">
                              </div>
                              <div class="form-group col-sm-12">
                                <label>Flickr Url</label>
                                <input type="text" class="form-control" name="flickr_url" autocomplete="off" value="{{$setting->facebook_url}}">
                              </div>                              
                          </div>   
                        </div>
                        <div class="tab-pane fade" id="recaptcha" role="tabpanel">
                            <br>
                            <div class="form-group col-sm-12">
                              <label>reCaptacha Key</label>
                              <input type="text" class="form-control" name="recaptcha_key" autocomplete="off" value="{{$setting->recaptcha_key}}">
                            </div>
                            <div class="form-group col-sm-12">
                              <label>reCaptacha Secret</label>
                              <input type="text" class="form-control" name="recaptcha_secret" autocomplete="off" value="{{$setting->recaptcha_secret}}">
                            </div>
                            <div class="form-group col-sm-12">
                              <label>Google Map Api</label>
                              <input type="text" class="form-control" name="google_map_api" autocomplete="off" value="{{$setting->google_map_api}}">
                            </div>
                        </div>
                        <div class="tab-pane fade" id="social-login" role="tabpanel">
                            <br> 
                            <h5>Facbook Authentication</h5>
                            <div class="form-group col-sm-12">
                              <label>Facebook Key</label>
                              <input type="text" class="form-control" name="facebook_key" autocomplete="off" value="{{$setting->facebook_key}}">
                            </div>
                            <div class="form-group col-sm-12">
                              <label>Facebook Secret</label>
                              <input type="text" class="form-control" name="facebook_secret" autocomplete="off" value="{{$setting->facebook_secret}}">
                            </div>
                            <hr>
                            <h5>Twitter Authentication</h5>
                            <div class="form-group col-sm-12">
                              <label>Twitter Key</label>
                              <input type="text" class="form-control" name="twitter_key" autocomplete="off" value="{{$setting->twitter_key}}">
                            </div>
                            <div class="form-group col-sm-12">
                              <label>Twitter Secret</label>
                              <input type="text" class="form-control" name="twitter_secret" autocomplete="off" value="{{$setting->twitter_secret}}">
                            </div>
                            <hr>
                            <h5>Google Plus Authentication</h5>
                            <div class="form-group col-sm-12">
                              <label>Google Plus Key</label>
                              <input type="text" class="form-control" name="google_plus_key" autocomplete="off" value="{{$setting->google_plus_key}}">
                            </div>
                            <div class="form-group col-sm-12">
                              <label>Google Plus Secret</label>
                              <input type="text" class="form-control" name="google_plus_secret" autocomplete="off" value="{{$setting->google_plus_secret}}">
                            </div>
                        </div>
                        <div class="tab-pane fade" id="email-setting" role="tabpanel">
                            <br>                           
                            <div class="form-group col-sm-12">
                              <label>Mail Driver</label>
                              <input type="text" class="form-control" name="mail_driver" autocomplete="off" value="{{$setting->mail_driver}}">
                            </div>
                            <div class="form-group col-sm-12">
                              <label>Mail Host</label>
                              <input type="text" class="form-control" name="mail_host" autocomplete="off" value="{{$setting->mail_host}}">
                            </div>
                            <div class="form-group col-sm-12">
                              <label>Mail Port</label>
                              <input type="text" class="form-control" name="mail_port" autocomplete="off" value="{{$setting->mail_port}}">
                            </div>
                            <div class="form-group col-sm-12">
                              <label>Mail Username</label>
                              <input type="text" class="form-control" name="mail_username" autocomplete="off" value="{{$setting->mail_username}}">
                            </div>
                            <div class="form-group col-sm-12">
                              <label>Mail Password</label>
                              <input type="text" class="form-control" name="mail_password" autocomplete="off" value="{{$setting->mail_password}}">
                            </div>
                            <div class="form-group col-sm-12">
                              <label>Mail Encryption</label>
                              <input type="text" class="form-control" name="mail_encryption" autocomplete="off" value="{{$setting->mail_encryption}}">
                            </div>
                        </div>
                        <div class="tab-pane fade show" id="home-slider" role="tabpanel">
                          <br>
                          <div class="form-row">
                              <div class="form-group col-sm-12">
                                <label>Image Width(Pixel)</label>
                                <input type="number" class="form-control" name="image_width" autocomplete="off" value="{{$setting->image_width}}">
                              </div>

                              <div class="form-group col-sm-12">
                                <label>Image Height(Pixel)</label>
                                <input type="number" class="form-control" name="image_height" autocomplete="off" value="{{$setting->image_height}}">
                              </div>

                              <div class="form-group col-sm-12">
                                <label>Max Size(KB)</label>
                                <input type="number" class="form-control" name="image_size" autocomplete="off" value="{{$setting->image_size}}">
                              </div>
                              <div class="form-group col-sm-12">
                                <label>File Type Allowed</label>
                                <input type="text" class="form-control" name="file_type" readonly autocomplete="off" value="{{$setting->file_type}}">
                              </div>
                          </div>                          
                        </div>
                        <div class="tab-pane fade" id="other" role="tabpanel">
                            <br>
                            <h5>Active alert/notification</h5>
                            <hr> 
                            <div class="form-row">
                                <div class="form-group offset-sm-1 col-sm-3">
                                  <div class="form-check">
                                    <input class="form-check-input" type="radio" value="1" style="transform: scale(1.5);" name="notification_type" {{$setting->notification_type == 1? 'checked': ''}}>
                                    <label class="form-check-label">Toastr Alert/Notification(Default)</label>
                                  </div>                    
                                </div>
                                <div class="form-group col-sm-5">
                                    <a id="btn-toastr" href="javascript:void()" class="btn btn-success btn-flat btn-sm">Click for check toastr alert</a>
                                </div>                                
                            </div>
                            <div class="form-row">
                                <div class="form-group offset-sm-1 col-sm-3">
                                  <div class="form-check">
                                    <input class="form-check-input" type="radio" value="2" style="transform: scale(1.5);" name="notification_type" {{$setting->notification_type == 2? 'checked': ''}}>
                                    <label class="form-check-label">Sweet Alert/Notification</label>
                                  </div>                    
                                </div>
                                <div class="form-group col-sm-5">
                                    <a id="btn-swal" href="javascript:void()" class="btn btn-primary btn-flat btn-sm">Click for check sweet alert</a>
                                </div>                                
                            </div>
                            <div class="form-row">
                                <div class="form-group offset-sm-1 col-sm-3">
                                  <div class="form-check">
                                    <input class="form-check-input" type="radio" value="3" style="transform: scale(1.5);" name="notification_type" {{$setting->notification_type == 3? 'checked': ''}}>
                                    <label class="form-check-label">Notify Alert/Notification</label>
                                  </div>                    
                                </div>
                                <div class="form-group col-sm-5">
                                    <a id="btn-notify" href="javascript:void()" class="btn btn-info btn-flat btn-sm">Click for check notify Alert</a>
                                </div>                                
                            </div>  
                        </div>
                    </div>
                    <button class="btn bg-gradient-success btn-flat"><i class="fas fa-save"></i> 
                    Update Settings</button>
                </form>
            </div>
            <!-- /.card -->
        </div>

    </div>
    <!--/. container-fluid -->
</section>
@endsection

@section('script')
<script type="text/javascript">
  $(function(){
      $('#btn-toastr').on('click',function(){
        toastr.success("","Great job! You click a toastr success notification.");
      });

      //Sweet alert notification settings
      const swal = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
      });

      $('#btn-swal').on('click', function(){
          swal.fire({
              type  : 'info',
              title : 'Great job! You click a swal info notification.'
          });
      });

      $('#btn-notify').on('click',function(){
          $.notify('Great job! You click a notify js notification.','info');
      });


  });    
</script>
@endsection
