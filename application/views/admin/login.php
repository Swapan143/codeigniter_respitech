<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <!-- Page Title -->
    <title>Login Page</title>
    <link rel="icon" href="<?=base_url()?>webroot/admin/images/fav.jpg" type="image/x-icon">
    <link rel='stylesheet' href='<?=base_url()?>webroot/admin/css/animate.min.css'>
    <link rel='stylesheet' href='<?=base_url()?>webroot/admin/css/bootstrap.min2.css'>
    <link rel='stylesheet' href='<?=base_url()?>webroot/admin/css/login.css'>
    <link rel='stylesheet' href='<?=base_url()?>webroot/admin/css/font-awesome.min.css'>
    <link href='<?=base_url()?>webroot/admin/css/validationEngine_login.jquery.css' rel="stylesheet">
    <link href="<?=base_url()?>webroot/admin/css/plugins/toastr/toastr.min.css" rel="stylesheet">
</head>

<body>
    <?php

         if($this->session->flashdata('success')){
                
                $this->load->view('admin/msg/success');


            }
            if($this->session->flashdata('error')){                
                $this->load->view('admin/msg/error');
                
            }
    ?>

    <div class="modal fade centered-modal in" id="sign_up">
        <div class="container">

                        <div class="model-half-section-second col-sm-3"></div>

                        <div class="model-half-section-second col-sm-6">
                            <div class="login-detail-sec">
                            <form class="m-t" role="form" action="<?=base_url('verify')?>" id="form" method="post">
                                <div class="login-header login-page-header"><span>Sign in as Admin</span></div>
                                <div class="sab-header">Sign In to continue to your account</div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-label">Admin Email</div>
                                    <input class="effect-1 validate[required,custom[email]]" type="text" placeholder="Admin Email" data-errormessage-value-missing="Admin Email is required" data-prompt-position="bottomLeft" id="email" name="email">
                                    <div class="error-message"></div>
                                    <span class="focus-border"></span>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-label">Password</div>
                                    <input class="effect-1 validate[required, minSize[8], maxSize[20]]" type="password" id="password" name="password" data-errormessage-value-missing="Password is required!" data-prompt-position="bottomLeft"  maxlength="20" placeholder="Password">                                    

                                    
                                    <i class="fa fa-eye-slash showicon" onclick="toggleShowPassword()" id="showicon"></i>
                                            <span id="show_pass" class="show_error arrow_error" style="display: none"></span>
                                            <span id="show_pass1" class="show_error arrow_error1" style="display: none"></span>

                                    <div class="error-message passwordpatter"></div>                                    
                                    <span class="focus-border"></span>
                                    
                                </div>
                                <div class="login-button">
                                    <button type="submit" class="btn-hover color-3">Sign In</button>
                                </div>
                            </form>
                                
                                    

                                

                            </div>
                        </div>
                        <div class="model-half-section-second col-sm-3"></div>

<!-- 
                    <footer>
                    <div class="footer-left-text" style="color: white;"> Copyright Imantrip (©) 2014-<?=date('Y')?></div>
                    <div class="footer-right-text" style="color: white;">Design & Developed by <a href="https://milligramit.com/" target="_blank" style="color: white;">MilligramlT<a/></div>
                </footer> -->
        </div>
    </div>
    <style type="text/css">
    .formErrorContent {
  position: absolute;
    top: 17px !important;
    width: auto !important;
    left: 0px !important;
    z-index: 11 !important;
    text-transform: none !important;
    background-color: #f2dede !important;
    color: #a94442!important;
    padding: 3px 10px !important;
    font-size: 13px !important;
    font-weight: 500 !important;
    border-radius: 3px !important;
    border-color: #ebccd1;
}
.error_cls {
    /* border: 1px solid red !important; */
    /* border: 1px solid #a94442 !important; */
    /*border: none !important;*/
}
.formErrorArrowBottom:after {
     content: '';
    position: absolute;
    bottom: 6px !important;
    left: -16px;
    width: 0;
    height: 0;
    border: 10px solid transparent;
    border-top-color: #f2dede!important;
    border-bottom: 0;
    margin-bottom: -11px;
    transform: rotate(180deg);
}

        /*img.showicon {
                height: 20px;
                position: absolute;
                top: 47px;
                right: 19px;
            }*/
       .show_error {
        position: absolute;
        top: 77px !important; 
        width: auto !important;
        left: 16px !important;
        z-index: 11 !important;
        text-transform: none !important;
        background-color: #f2dede !important;
        color: #a94442!important;
        padding: 3px 10px !important;
        font-size: 13px !important;
        font-weight: 500 !important;
        border-radius: 0px !important;        
    }
    .arrow_error:after {
        content: '';
        position: absolute !important;
        bottom: 50px !important;
        left: 28px !important;
        width: 0 !important;
        height: 0 !important;
        border: 8px solid transparent !important;
        border-top-color: #f2dede!important;
        border-bottom: 0 !important;
        margin-bottom: -9px !important;
        transform: rotate(180deg) !important;
    }
    .arrow_error1:after {
        content: '';
        position: absolute !important;
        bottom: 32px !important;
        left: 28px !important;
        width: 0 !important;
        height: 0 !important;
        border: 8px solid transparent !important;
        border-top-color: #f2dede!important;
        border-bottom: 0 !important;
        margin-bottom: -9px !important;
        transform: rotate(180deg) !important;
    }
    .showicon{
    height: 0;
    position: absolute;
    top: 47px;
    right: 19px;
    font-size: 20px;
    color: white;
    cursor: pointer;
}
    
    
    </style>
    <script type="text/javascript">
    function toggleShowPassword(){
        var x = document.getElementById("password");
        var imgsrc = document.getElementById("showicon");
        if (x.type === "password") {
            // imgsrc.src = 'https://www.freeiconspng.com/uploads/eyes-icon-0.png';
            $('#showicon').removeClass('fa fa-eye-slash');
            $('#showicon').addClass('fa fa-eye');
            x.type = "text";                    
        } else {
            // imgsrc.src = 'http://pluspng.com/img-png/hidden-png-eye-hidden-invisible-off-icon-512.png';
            
            $('#showicon').removeClass('fa fa-eye');
            $('#showicon').addClass('fa fa-eye-slash');
            x.type = "password";                    
        }
    }
    function char_check() {
        var pass_val=$('#password').val();
        
            var count=$("#password").val().length;
            if(count < 8){
                $("#password").removeClass('success_cls');
                $("#password").addClass('error_cls');
                $('#show_pass1').text('Minimum 8 chracters required');
                $('#show_pass1').show('');
            }else{
                $('#show_pass1').text('');
            }
            if(count >= 8){
                var pwd=pass_val.match(/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])([a-zA-Z0-9]{8,})$/)
                if(pwd==null){
                    $("#password").removeClass('success_cls');
                    $("#password").addClass('error_cls');
                    $('#show_pass').text('The password must be contain an uppercase a lowercase and a digit');
                    $('#show_pass').show('');
                    
                    /*$("#form").submit(function(e){
                        e.preventDefault();
                    });*/
                    
                }else{
                    $("#password").removeClass('error_cls');
                    $("#password").addClass('success_cls');
                    $('#show_pass').text('');
                    $('#show_pass').hide('');

                   // $("#form").submit();
                }
            }       
    }
      function blank_check() {
        var pass_val=$('#password').val();
        if(pass_val==''){
            $('#show_pass').text('Password is required');
            $("#password").removeClass('success_cls');
            $("#password").addClass('error_cls');
            $('#show_pass').show('');   
        }
    }
    
</script>
    <script src='<?=base_url()?>webroot/admin/js/jquery-3.2.1.min.js'></script>
    <script src='<?=base_url()?>webroot/admin/js/common.js'></script>
    <script src='<?=base_url()?>webroot/admin/js/jquery.validationEngine.js'></script>
    <script src='<?=base_url()?>webroot/admin/js/jquery.validationEngine-en.js'></script>
    <!-- <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script> -->
    <script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js'></script>
    <script src="<?=base_url()?>webroot/admin/js/plugins/toastr/toastr.min.js"></script>
</body>

</html>
