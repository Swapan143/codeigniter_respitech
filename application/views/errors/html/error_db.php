<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!Doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    
    <title>Bongtech | Error Page</title>
    
    <link rel="icon" href="<?=base_url()?>webroot/admin/images/fav.jpg" type="image/x-icon">
    <link rel='stylesheet' href='<?=base_url()?>webroot/admin/css/animate.min.css'>
    <link rel='stylesheet' href='<?=base_url()?>webroot/admin/css/bootstrap.min2.css'>
    <link rel='stylesheet' href='<?=base_url()?>webroot/admin/css/login.css'>
    <link rel='stylesheet' href='<?=base_url()?>webroot/admin/css/font-awesome.min.css'>
    <link href='<?=base_url()?>webroot/admin/css/validationEngine_login.jquery.css' rel="stylesheet">
    <link href="<?=base_url()?>webroot/admin/css/plugins/toastr/toastr.min.css" rel="stylesheet">
</head>

<body>
    <div class="modal fade centered-modal in" id="sign_up">
        <div class="container">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="header-section">
                            <img src="<?=base_url()?>webroot/admin/images/logo.png">
                        </div>
                        <div class="model " style="padding: 64px 50px 64px;">
                                
                        <?php 
                            if(strpos(current_url(),'agency') == false)
                            {
                        ?>       
                        <h3 style="text-align: center;">Sorry for inconvenience! please go to 
                        <a href="<?php echo base_url(); ?>"><i class="fa fa-home " style="font-size: larger;" aria-hidden="true"></i></a></h3>
                       <?php } 
                        else{
                       ?>
                       <h3 style="text-align: center;">Sorry for inconvenience! please go to 
                        <a href="<?php echo base_url(); ?>/agency"><i class="fa fa-home " style="font-size: larger;" aria-hidden="true"></i></a></h3>
                        <?php } ?>
                       
                       </div>
                    </div>
                    <footer>
                    <div class="footer-left-text" style="color: white;"> Copyright Bongtech (©) 2020-<?=date('Y')?></div>
                    <div class="footer-right-text" style="color: white;">Design &amp; Developed by <a href="https://www.bongtechsolutions.com/" target="_blank"><strong>Bongtech Solutions Private Limited</strong></a>
                    </div>
                </footer>
                </div>
            </div>
        </div>
    </div>

    <script src='<?=base_url()?>webroot/admin/js/jquery-3.2.1.min.js'></script>
    <script src='<?=base_url()?>webroot/admin/js/common.js'></script>
    <script src='<?=base_url()?>webroot/admin/js/jquery.validationEngine.js'></script>
    <script src='<?=base_url()?>webroot/admin/js/jquery.validationEngine-en.js'></script>
    <script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js'></script>
    <script src="<?=base_url()?>webroot/admin/js/plugins/toastr/toastr.min.js"></script>
</body>

</html>