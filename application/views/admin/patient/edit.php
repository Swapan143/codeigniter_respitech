<div class="wrapper wrapper-content animated fadeInRight">

<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-content">
                <div class="row">
                    <div id="edit_data">
                        <div class="col-sm-12 b-r">
                        <h2>Patient Edit</h2><br>
                        
                        <form id="form" id="product_add" action="<?=base_url('admin/update-patient')?>" method="post" enctype="multipart/form-data">
                        <div class="row">
                        <input type="hidden" id="edit_id" name="edit_id" value="<?=$patient_data->id?>">
                        
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Name<span class="desc_text" style="color: red;">*</span></label>

                                    <input name="name" id="name" type="text" class="form-control only_character validate[required]" data-errormessage-value-missing="Name is required" data-prompt-position="bottomLeft" minlength="" maxlength="100" placeholder="Type name" value="<?=$patient_data->name?>">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Email<span class="desc_text" style="color: red;">*</span></label>

                                    <input name="email" id="email" type="text" class="form-control  validate[required]" data-errormessage-value-missing="Email is required" data-prompt-position="bottomLeft" minlength="" maxlength="100" placeholder="Type email" value="<?=$patient_data->email?>">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Mobile<span class="desc_text" style="color: red;">*</span></label>

                                    <input name="mobile" id="mobile" type="text" class="form-control  validate[required]" data-errormessage-value-missing="Mobile is required" data-prompt-position="bottomLeft" minlength="" maxlength="100" placeholder="Type mobile" value="<?=$patient_data->mobile?>">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Password</label>

                                    <input name="password" id="password" type="text" class="form-control validate[required]" data-errormessage-value-missing="Password  is required" data-prompt-position="bottomLeft" minlength="" maxlength="100" placeholder="Type password " value="<?=$patient_data->password_text?>">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Doctor Name<span class="desc_text" style="color: red;">*</span></label>
                                        <select name="doctor_name" id="doctor_name" class="form-control validate[required]" data-errormessage-value-missing="Doctor  is required">
                                            <option>Select Doctor Name</option>
                                            <?php
                                            foreach ($doctor_data as $value) {    
                                              ?>
                                            <option value="<?php echo $value->id;?>" <?= ($patient_data->doctor_id == $value->id) ? 'selected' : '' ?>><?php echo $value->name;?></option>
                                            <?php }?>
                                        </select>
                                    
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Patient Type<span class="desc_text" style="color: red;">*</span></label>
                                        <select name="patient_type" id="patient_type" class="form-control validate[required]" data-errormessage-value-missing="Patent  is required">
                                            <option>Select Doctor Name</option>
                                            
                                            <option value="Type one" <?= ($patient_data->patient_type == 'Type one') ? 'selected' : '' ?>>Type one</option>
                                            <option value="Type two" <?= ($patient_data->patient_type == 'Type two') ? 'selected' : '' ?>>Type two</option>
                                            <option value="Type there" <?= ($patient_data->patient_type == 'Type there') ? 'selected' : '' ?>>Type there</option>
                                           
                                        </select>
                                    
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Addresh<span class="desc_text" style="color: red;">*</span></label>
                                    <textarea class="form-control validate[required]" data-errormessage-value-missing="Doctor  is required" id="addresh" placeholder="Enter addresh" name="addresh" rows="3"><?=$patient_data->addresh?></textarea>
                                    
                                </div>
                            </div>

                            
                            
                        </div>
                        
                        <div class="col-sm-12">
                            <button class="btn btn-warning btn-primary pull-right m-t-n-xs grediant-btn" type="reset" onclick="tcCancel()"><strong>Cancel</strong></button>
                            <button class="btn btn-primary pull-right m-t-n-xs grediant-btn save_submit" type="submit" style="margin-right: 6px;" id="change_password"><strong>Save</strong></button>
                        </div>
                        </form>
                    </div>
                </div>   
            </div>
        </div>
    </div>
</div>
</div>
</div>


<style type="text/css">        
        .show_error {
        position: absolute;
        top: 128px !important; 
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
    .arrow_error1:after {
        content: '';
        position: absolute !important;
        bottom: 33px !important;
        left: 28px !important;
        width: 0 !important;
        height: 0 !important;
        border: 8px solid transparent !important;
        border-top-color: #f2dede!important;
        border-bottom: 0 !important;
        margin-bottom: -9px !important;
        transform: rotate(180deg) !important;
    }
    .same_error_msg{
       position: absolute;
        top: 128px !important; 
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
    .same_error_msg:after {
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
        .formErrorContent1
        {
            position: absolute;
            top: 100px !important;
            width: auto !important;
            left: 421px  !important;
            z-index: 11 !important;
            text-transform: none !important;
            background-color: #f2dede !important;
            color: #a94442!important;
            padding: 3px 10px !important;
            font-size: 13px !important;
            font-weight: 500 !important;
            border-radius: 3px !important;
        }

    .formErrorArrowBottom1:after
        {
            content: '' !important;
            position: absolute !important;
            bottom: 0px !important;
            left: 9px !important;
            width: 0 !important;
            height: 0 !important;
            border: 10px solid transparent !important;
            border-top-color: #f2dede!important;
            border-bottom: 0 !important;
            margin-bottom: 24px !important;
            transform: rotate(180deg) !important;
        }
        
        
           .search-dropdown{
        font-size: 14px;
        /*padding: 10px;*/
        background-color: #f7f7f7;
        padding: 0;
        position: absolute;
        background: #fbfbfb;
        width: 355px;
        z-index: 999;
        border: 1px solid #ddd;
    }
    @media(max-width: 768px){
        .search-dropdown{
            width: 351px;
            border-radius: 5px;
        }
    }
    .search-dropdown li{
            list-style: none;
        padding: 7px 13px;
        border-bottom: 1px solid #ebebeb;
        cursor: pointer;
        font-size: 15px;
        color: #333;

    }
    .search-dropdown li:hover{
        background-color: #efefef;
    }
     </style>
     
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
   