<div class="wrapper wrapper-content animated fadeInRight">

<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-content">
                <div class="row">
                    <div id="edit_data">
                        <div class="col-sm-12 b-r">
                        <h2>Product Edit</h2><br>
                        <div class="alert alert-success alert-dismissible fade in" id="emp_sucess" style="display: none;">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Success!</strong> Product Edit.
                        </div>
                        
                        <form role="form" id="buyer_product_edit" action="" method="post" enctype="multipart/form-data">
                      
                         <input type="hidden" id="old_product_id" name="old_product_id" value="<?=$product_data->id?>">
                
                        
                         <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Category Name<span class="desc_text" style="color: red;">*</span></label>
                                        <select name="catgegory_id" id="catgegory_id" class="form-control" >
                                            <option>Select Category Name</option>
                                            <?php
                                            foreach ($category_data as $value) {
                                                if($value->id == $product_data->catgegory_id){
                                              ?>
                                            <option value="<?php echo $value->id;?>" selected><?php echo $value->category_name;?></option>
                                            <?php } else{
                                                ?>
                                               <option value="<?php echo $value->id;?>"><?php echo $value->category_name;?></option>  
                                          <?php  }}?>
                                        </select>
                                    <p id="msg_category_name" style="display: none;" class="text-danger">Select Category Name</p>
                                </div>
                            </div>
                            
                            
                          
                            
                            
                            
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Product Name<span class="desc_text" style="color: red;">*</span></label>

                                    <input type="text" name="product_name" id="product_name" class="form-control" placeholder="Enter Product Name" maxlength="50" value="<?=$product_data->product_name?>">
                                    <p id="msg_productname" style="display: none;" class="text-danger">Enter Product Name</p>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Product Quentity<span class="desc_text" style="color: red;">*</span></label>

                                    <input type="text" name="product_quentity" id="product_quentity" class="form-control" placeholder="Enter Product Quentity"  value="<?=$product_stock_data->total_stock?>" maxlength="10">
                                    <p id="msg_productqty" style="display: none;" class="text-danger">Enter Product Quentity</p>
                                </div>
                            </div>
                           
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Mrp Price<span class="desc_text" style="color: red;">*</span></label>
                                    <input type="text" name="sel_product_rate" id="sel_product_rate" class="form-control"  value="<?=$product_data->sel_product_rate?>" placeholder="Enter Mrp Price" maxlength="10" onkeyup="sell_price()">
                                    <p id="msg_mrp_price" style="display: none;" class="text-danger">Enter Mrp Price</p>
                                </div>
                            </div>
                            
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Discount % Rate<span class="desc_text" style="color: red;"></span></label>
                                    <input type="text" name="product_discount" id="product_discount" class="form-control"  value="<?=$product_data->product_discount?>"  placeholder="Enter Discount" maxlength="10" onkeyup="discount_price()">
                                    <p id="msg_discount" style="display: none;" class="text-danger">Enter  Discount</p>
                                </div>
                            </div>
                            
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Sell Price<span class="desc_text" style="color: red;"></span></label>
                                    <input type="text" name="product_discount_rate" id="product_discount_rate" class="form-control"  value="<?=$product_data->product_discount_rate?>" placeholder="Enter Sell Price" maxlength="10" readonly>
                                    <p id="msg_sell_price" style="display: none;" class="text-danger">Enter Sell Price</p>
                                </div>
                            </div>
                            
                          
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Product Details<span class="desc_text" style="color: red;">*</span></label>
                                    <textarea class="form-control" id="product_description" placeholder="Enter Product Details" name="product_description" rows="3"> <?=$product_data->product_description?></textarea>
                                    <p id="msg_address" style="display: none;" class="text-danger">Enter Product Details</p>
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

        function select_category()
        {
            var catgegory_id=$('#catgegory_id').val(); 
            var base_url=$('#base_url').val();
            // alert(current_url);    
            $.ajax({
            type:'POST',
            url:base_url+'/admin/product_add/select_category',
            data: {
                cat_uniqcode: catgegory_id
            },
            
            success:function(data){
                data=data.trim();
                if(data != ''){
                // $('#sub_category_id').empty();
                // $('#sub_category_id').find('option:empty').remove();
        
                $('#subcategory_id').html(data);
                }
            }
            });
        }
    
        $('#buyer_product_edit').submit(function(e){
        e.preventDefault();
       var buyer_name=$('#buyer_name').val();
       var buyer_phoneno=$('#buyer_phoneno').val();
       var buyer_address=$('#buyer_address').val();
       var product_bye_rate=$('#product_bye_rate').val();
       var bye_qty=$('#bye_qty').val();
       
       if(product_bye_rate == '')
       {
           $("#msg_rate").show();
        
            setTimeout(function() {
                   $("#msg_rate").hide();
                }, 1000); 
        
            return true;
       }
       if(bye_qty == '')
       {
          $("#msg_quantity").show();
        
            setTimeout(function() {
                   $("#msg_quantity").hide();
                }, 1000); 
        
            return true; 
       }
       if(buyer_name =='')
          {
            
            $("#msg_buyer_name").show();
        
            setTimeout(function() {
                   $("#msg_buyer_name").hide();
                }, 1000); 
        
            return true;
          }

          if(buyer_phoneno =='')
          {
            
            $("#msg_mobile_no").show();
        
            setTimeout(function() {
                   $("#msg_mobile_no").hide();
                }, 1000); 
        
            return true;
          }
          
          if(buyer_address =='')
          {
            
            $("#msg_address").show();
        
            setTimeout(function() {
                   $("#msg_address").hide();
                }, 1000); 
        
            return true;
          }
       
       var current_url=$('#current_url').val();
       var base_url=$('#base_url').val();
    //   alert(base_url);
       var formData = new FormData($(this)[0]);
        $.ajax({
            url:base_url+'admin/update-recommended-product',
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
    
    
    </script>