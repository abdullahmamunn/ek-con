@extends('frontend.layouts.index')
@section('content')
<div id="wrapper">
    <div id="content">

                <div class="post" id="post-56">
        <!--	<h2 class="posttitle">Upload CV</h2>  -->
            <div class="postentry">
                <p>If you are interested for a career in mid and senior level management through <strong><em>EKConsulting</em></strong>, please upload your CV here.</p>
                <h3>Before you upload, please carefully check that the file is in <strong>.doc/.docx/.pdf format</strong> and the size of the file is <strong>less than 300KB</strong>.</h3>
                <p><img loading="lazy" class="alignright" title="Upload CV" src="http://www.ekconsultingbd.com/wp-content/uploads/2010/06/uploadcv.jpg" alt="Upload CV" width="475" height="315" /><br />
                    @if ($errors->any())
                    <div class="alert alert-danger" style="color: red;">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

                    <form action="{{route('upload.cv')}}" method="post" enctype="multipart/form-data" id="qual">
                    @csrf
                    <p>Your Name (required)<br />
                        <span>
                            <input type="text" id="" name="name" value="" size="40" class="" aria-required="true" aria-invalid="false" />
                        </span> 
                        <span style="color: red" id="nameErr"></span>
                        <span style="color: rgb(5, 192, 120)" id="nameOk"></span>
                    </p>
                    <p>Your Email (required)<br />
                        <span>
                            <input type="email" name="email" value="" size="40" class="" aria-required="true" aria-invalid="false" />
                        </span>
                     </p>
                    <p>Your Phone<br />
                        <span>
                            <input type="text" id="" name="phone_number" value="+880 " size="40" class="" aria-invalid="false" />
                        </span> 
                    </p>
                    <p>Your CV In .doc/.docx/.pdf/(Max size: 300KB)<br />
                        <span>
                            <input type="file" id="cv" name="file" value="" size="40" class="" aria-invalid="false" />
                            
                        </span> 
                        <span style="color: red" id="size"></span><br>
                        <span style="color: red" id="format"></span>
                    </p>


                    {{-- <p>Enter Text from Image <input type="hidden" name="_wpcf7_captcha_challenge_captcha-162" value="3313264183" /><img class="wpcf7-form-control wpcf7-captchac wpcf7-captcha-captcha-162" width="84" height="28" alt="captcha" src="http://www.ekconsultingbd.com/wp-content/uploads/wpcf7_captcha/3313264183.png" /> <br />
                        <span><input type="text" name="captcha-162" value="" size="40" class="wpcf7-form-control wpcf7-captchar" autocomplete="off" aria-invalid="false" /></span> </p> --}}
                    
                        <p>
                            <input type="submit" value="Upload CV" class="wpcf7-form-control wpcf7-submit" />
                        </p>

                    <div class="wpcf7-response-output" aria-hidden="true"></div>

                    <script type="text/javascript">
                    function checkName(){
                        var name = $("#name").val();
                        if(name.length>=5 && name.length<=15){
                            $("#nameErr").text(" ");
                            $("#nameOk").text("Okay, Name perfect!");
                            $("#nameErr").text(" ");
                        }else{
                            $("nameOk").text(" ");
                            $("#nameErr").text("Name should be between 5 to 15 characters");
                            $("nameOk").text(" ");
                        }
                       
                    }
                    $("#name").click(function(){
                        checkName();
                    })
                    $("#name").blur(function(){
                        checkName();
                    })
                    $("#name").keyup(function(){
                        checkName();
                    })

                        $("#qual").submit( function(submitEvent) {
                            
                            var fileSize = document.getElementById("cv").files[0];
                            var sizeInKb = (fileSize.size/1024);
                            var sizeLimit= 300;
                            if (Math.ceil(sizeInKb) >= sizeLimit) {
                                $("#size").text("File size must be 300 kb or less");
                                $("#format").text("");
                                // alert('File size must be less than 300');
                                // no need for the else part. You want to prevent the submission in this part
                                submitEvent.preventDefault();
                            }
                            
                            var filename = $("#cv").val();
                            var extension = filename.replace(/^.*\./, '');
                            if (extension == filename) {
                                extension = '';
                            } else {
                                extension = extension.toLowerCase();
                            }
                            switch (extension) {
                                case 'pdf':
                                case 'doc':
                                case 'docx':
                                // case 'ppt':
                                // case 'pptx':
                                // case 'rtf':
                                // case 'txt':
                                    // As the code was changed to the obsubmit, I think you don't need this part
                                    break;
                                    
                                default:
                                    $("#format").text("file format must be .doc/.docx/.pdf");
                                    $("#size").text("");
                                    submitEvent.preventDefault();
                                   
                            }
                        });
                    </script>

                </form>
                @if(Session::has('message'))
                <h2>{{Session::get('message')}}</h2>
                @endif
                @if(Session::has('error'))
                <h2 style="color: red">{{Session::get('error')}}</h2>
                @endif


        
        
    </div>


</div>
{{-- <script type="text/javascript">

    const oFile = document.getElementById("fileUpload").files[0]; // <input type="file" id="fileUpload" accept=".jpg,.png,.gif,.jpeg"/>

    if (oFile.size > 2097152) // 2 MiB for bytes.
    {
    alert("File size must under 2MiB!");
    return;
    }
</script> --}}
@endsection

