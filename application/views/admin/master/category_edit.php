<div class="wrapper wrapper-content animated fadeInRight">

<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-content">
                <div class="row">
                    <div id="edit_data">
                        <div class="col-sm-12 b-r">
                        <h2>Category Edit</h2><br>
                        <div class="alert alert-success alert-dismissible fade in" id="emp_sucess" style="display: none;">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Success!</strong> Category Add.
                        </div>
                        <div class="alert alert-danger alert-dismissible" style="display:none" id="mobile_exists_msg">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Faild!</strong> Category Name Already Exists.
                        </div>
                        <form role="form" id="form" action="<?=base_url('admin/update_category')?>" method="post" enctype="multipart/form-data">
                        <div class="row">
                        <input type="hidden" value="<?=$category_data->id?>" name="transid">
		                <input type="hidden" value="<?=$category_data->category_image?>" name="category_img">  
                           <div class="col-lg-12 text-center">
                                <div class="form-group"> 
                                    <img src="<?=base_url('webroot/adminImages/category_image/'.$category_data->category_image)?>" id="upload_logo" onclick="get_upload_logo()" class="add_img_button">
                                    <input type="file" class="image-upload select_image" name="logo_input_upload" class="validate[required]" id="logo_input_upload" style="display: none" accept=".jpg,.jpeg,.png" onchange="logo_show_photo(this)">
                                    <p id="msg_image" style="display: none;" class="text-danger">Enter Category Image</p>    
                                </div> 
                            </div>
                            
                            
                            
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Category Name<span class="desc_text" style="color: red;">*</span></label>
                                    <input type="text" name="category_name" id="category_name" value="<?=$category_data->category_name?>" class="form-control validate[required]" data-errormessage-value-missing="Category Name is required" data-prompt-position="bottomLeft" maxlength="200">
                                    <p id="msg_category" style="display: none;" class="text-danger">Enter Category Name</p>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Category Details<span class="desc_text" style="color: red;">*</span></label>
                                    <textarea class="form-control" id="category_description" placeholder="Enter Category Details" name="category_description" rows="3"><?=$category_data->category_description?></textarea>
                                    <p id="msg_category_description" style="display: none;" class="text-danger">Enter Product Details</p>
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
    <script>
    
    //upload logo
    function get_upload_logo(x) 
    {
        $("#logo_input_upload").trigger("click"); 
    }
    function logo_show_photo(input, x) 
    {
        if (input.files && input.files[0]) {
        var reader = new FileReader();
        var FileSize = input.files[0].size / 1024 / 1024; // in MB
            var FileType = input.files[0].type;
            var ext = $('#logo_input_upload').val().split('.').pop().toLowerCase();
            if($.inArray(ext, ['JPEG','PNG','JPG','png','jpg','jpeg']) == -1) {
                alert('invalid extension!');
                $("#logo_input_upload").val('');
            }else{
            
        if(FileSize < 1){
        reader.onload = function (e) {
        $('#upload_logo')
        .attr('src', e.target.result)
        .width(100)
        .height(100);
        };
        reader.readAsDataURL(input.files[0]);
        }else{
            alert('Maximum file size 1MB can be upload');
            $(input).val('');
        }
        } 
        }
    }
     
    </script>