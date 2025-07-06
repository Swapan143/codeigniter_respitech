<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title><?=$page_title?></title>
    <link rel="icon" href="" type="image/x-icon">    
    <link href="<?=base_url()?>webroot/admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url()?>webroot/admin/font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Toastr style -->
    <link href="<?=base_url()?>webroot/admin/css/plugins/toastr/toastr.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="<?=base_url()?>webroot/admin/js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

    <link href="<?=base_url()?>webroot/admin/css/animate.css" rel="stylesheet">

    <link href="<?=base_url()?>webroot/admin/css/style.css" rel="stylesheet">
    <link href="<?=base_url()?>webroot/admin/css/wickedpicker.min.css" rel="stylesheet">
    <link href="<?=base_url()?>webroot/admin/css/plugins/dataTables/datatables.min.css" rel="stylesheet">
    <link href='<?=base_url()?>webroot/admin/css/validationEngine.jquery.css' rel="stylesheet">
    <link href="<?=base_url()?>webroot/admin/css/plugins/switchery/switchery.css" rel="stylesheet">
    <link href="<?=base_url()?>webroot/admin/css/jquery.timepicker.css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href="<?=base_url()?>webroot/admin/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="<?=base_url()?>webroot/admin/css/plugins/steps/jquery.steps.css" rel="stylesheet">
    <link rel="stylesheet" href="<?=base_url()?>webroot/admin/css/bootstrap-multiselect.css"/>
    <link rel="stylesheet" href="<?=base_url()?>webroot/admin/css/summernote.min.css"/>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.debug.js"></script>
    <script src="<?=base_url()?>webroot/admin/js/jquery-3.1.1.min.js"></script>


</head>

<body>

    <input type="hidden" name="base_url" id="base_url" value="<?=base_url()?>">
    <input type="hidden" name="current_url" id="current_url" value="<?=current_url();?>">
     <?php
        if($this->session->flashdata('success')){
        $this->load->view('admin/msg/success');
        }
        if($this->session->flashdata('error')){
        $this->load->view('admin/msg/error');
        }
    ?>
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                    <div class="logo"><img alt="image" class="img-responsive" src="<?=base_url()?>webroot/admin/images/logo.png" /></div>
                    <div class="logo-element">
                        Logo
                    </div>
                </li>


