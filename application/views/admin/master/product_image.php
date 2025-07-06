<div class="wrapper wrapper-content animated fadeInRight">

<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-content">
                <div class="row">
                    <div id="edit_data">
                        <div class="col-sm-12 b-r">
                        <h2>Product Image</h2><br>
                        <div class="alert alert-success alert-dismissible fade in" id="emp_sucess" style="display: none;">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Success!</strong> Product Image Add.
                        </div>
                        <div class="alert alert-danger alert-dismissible" style="display:none" id="mobile_exists_msg">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Faild!</strong> Product Image Already Exists.
                        </div>
                        <form role="form" id="product_image_add" action="" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Product Name<span class="desc_text" style="color: red;">*</span></label>
                                        <select name="product_id" id="product_id" class="form-control">
                                            <option>Select Product Name</option>
                                            <?php
                                            foreach ($product_data as $v1) {
                                              ?>
                                            <option value="<?php echo $v1->id;?>"><?php echo $v1->product_name;?></option>
                                            <?php }?>
                                        </select>
                                    <p id="msg_productname" style="display: none;" class="text-danger">Select Product Name</p>
                                </div>
                            </div>
                            
                             <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Product Image<span class="desc_text" style="color: red;">*</span></label>
                                        <!--<select name="sub_category_id" id="sub_category_id" class="form-control">
                                        <option>Select Color Name</option>
                                        </select>-->
                                        <input type="file" id="product_image" name="product_image[]" class="form-control" multiple>
                                        <p id="msg_product_image" style="display: none;" class="text-danger">Product Image Required</p>
                                    </div> 
                                </div>
                            
            
                        </div>
                        
                        <div class="col-sm-12">
                            <button class="btn btn-warning btn-primary pull-right m-t-n-xs grediant-btn" type="reset" onclick="tcCancel()"><strong>Cancel</strong></button>
                            <button class="btn btn-primary pull-right m-t-n-xs grediant-btn save_submit" type="submit" style="margin-right: 6px;" id="change_password" onclick="checkfile()"><strong>Save</strong></button>
                        </div>
                        </form>
                    </div>
                </div>   
            </div>
        </div>
        <div class="ibox-content">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                        <tr>
                            <th>Index</th>
                            <th>Product Name</th>
                            <th>Image View</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($product_image as $key => $value) {
                        // $image=$value->category_image;
                        // $images = trim($image, ",");
                    ?>
                        <tr class="gradeX">
                            <td><?=$key+1?></td>
                            <td><?=$value->product_name?></td>
                            <td><a href="javascript:void(0)" onclick="view_product('<?=$value->product_id?>')" id="get_action_val_<?=$value->product_id?>" data-toggle="modal" data-target=".bd-example-modal-xl"><i class="fa fa-eye action"></i></a></td>
                        </tr>
                    <?php }?>
                    </tbody>
                </table>
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
    
   
        $('#product_image_add').submit(function(e){
        e.preventDefault();
            var product_id=$('#product_id').val();
            var product_image=$('#product_image').val();
       
       if(product_id =='Select Product Name')
          {
            
            $("#msg_productname").show();
        
            setTimeout(function() {
                   $("#msg_productname").hide();
                }, 1000); 
        
            return true;
          }

          if(product_image =='')
          {
            
            $("#msg_product_image").show();
        
            setTimeout(function() {
                   $("#msg_product_image").hide();
                }, 1000); 
        
            return true;
          }
          
       var current_url=$('#current_url').val();
       var base_url=$('#base_url').val();
    //   alert(base_url);
       var formData = new FormData($(this)[0]);
        $.ajax({
            url:base_url+'product_image_add',
            type: 'POST',
            data: formData,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success:function(data) {
            // alert(data); 
            if(data==1)
            {
                $("#emp_sucess").show();
                setTimeout(function(){ 
                location.reload();
                }, 2000);
            }
            else if(data== 3)
            {
                $("#mobile_exists_msg").show();
                setTimeout(function(){ 
                location.reload();
                }, 2000); 
            }
    
        },
    });
    }); 
    
    
     function view_product(transid)
     {
        var transid=transid;
        var base_url=$('#base_url').val();
        var current_url=$('#current_url').val();
        $.ajax({
        type:'POST',
        url:base_url+'product_image_show',
        data: {
            transid : transid,
        },
        success:function(data)
        {
            $('#others_product').modal('show');   
            $('#product_features').html(data);
        }
    });
    }
    
    function imagechang()
    {
        // var profile_image=$('#profile_image'+id).val();
        // alert(profile_image);
        // var ima_up=$('#ima_up'+id).val();
        // const [file] = profile_image.files
        // if (file) 
        // {
        //     ima_up.src = URL.createObjectURL(file)
        // }
        
        const [file] = profile_image.files
          if (file) {
            ima_up.src = URL.createObjectURL(file)
          }
    }
   
    </script>
    
<div class="modal fade bd-example-modal-xl" id="others_product" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
      
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
        <h2 class="modal-title" id="exampleModalLongTitle"><b class="">Product Image</b></h2>
      </div>
        <div class="modal-body" id="product_features">
        </div>
    </div>
  </div>
</div>