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
                            <strong>Success!</strong> Producty Edit.
                        </div>
                        <div class="alert alert-danger alert-dismissible" style="display:none" id="mobile_exists_msg">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Faild!</strong> Sub Category Already Exists.
                        </div>
                        <form role="form" id="product_edit" action="" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <input type="hidden" id="product_old_id" name="product_old_id" value="<?=$get_product_data->id?>">
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label>Category Name<span class="desc_text" style="color: red;">*</span></label>
                                        <select name="catgegory_id" id="catgegory_id" class="form-control" onchange="select_category()">
                                            <option>Select Category Name</option>
                                            <?php
                                            foreach ($category_data as $value) {
                                                if($value->id == $get_product_data->c_id)
                                                {
                                            ?>
                                                    <option value="<?php echo $value->id;?>" selected><?php echo $value->category_name;?></option>
                                            <?php
                                                }
                                              ?>
                                                
                                            <?php }?>
                                        </select>
                                    <p id="msg_category_name" style="display: none;" class="text-danger">Select Category Name</p>
                                </div>
                            </div>
                            
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Sub Category Name<span class="desc_text" style="color: red;">*</span></label>
                                        <select name="subcategory_id" id="subcategory_id" class="form-control" >
                                            <option>Select SubCategory Name</option>
                                            <?php
                                            foreach ($subcategory_data as $value) {
                                                if($value->id == $get_product_data->s_id)
                                                {
                                            ?>
                                                    <option value="<?php echo $value->id;?>" selected><?php echo $value->subcategory_name;?></option>
                                            <?php
                                                }
                                              ?>
                                                
                                            <?php }?>
                                        </select>
                                    <p id="msg_sub_category_name" style="display: none;" class="text-danger">Select SubCategory Name</p>
                                </div>
                            </div>
                            
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label>Buyer Code<span class="desc_text" style="color: red;">*</span></label>
                                        <select name="buyer_id" id="buyer_id" class="form-control" onchange="select_buyer_product()">
                                            <option>Select Buyer Code</option>
                                            <?php
                                            foreach ($buyer_data as $value) {
                                                if($get_product_data->buyer_id == $value->id)
                                                {
                                                
                                              ?>
                                            <option value="<?php echo $value->id;?>" selected><?php echo $value->buyer_code;?></option>
                                            <?php } }?>
                                        </select>
                                    <p id="msg_buyer_name" style="display: none;" class="text-danger">Select Buyer Code</p>
                                </div>
                            </div>
                            
                            
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label>Product Name<span class="desc_text" style="color: red;">*</span></label>
                                        <select name="product_name" id="product_name" class="form-control">
                                            <option>Select Product Name</option>
                                            <?php
                                            foreach ($product_data as $v1) {
                                                if($v1->id == $get_product_data->product_id){
                                              ?>
                                                <option value="<?php echo $v1->id;?>" selected><?php echo $v1->product_name;?></option>
                                            <?php } }?>
                                        </select>
                                    <p id="msg_productname" style="display: none;" class="text-danger">Select Product Name</p>
                                </div>
                            </div>
                           
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>U .Mrp Price<span class="desc_text" style="color: red;">*</span></label>
                                    <input type="text" name="sel_product_rate" id="sel_product_rate" class="form-control" value="<?=$get_product_data->sel_product_rate?>" placeholder="Enter Mrp Price" maxlength="10" onkeyup="sell_price()">
                                    <p id="msg_mrp_price" style="display: none;" class="text-danger">Enter Mrp Price</p>
                                </div>
                            </div>
                            
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>U .Discount% Rate<span class="desc_text" style="color: red;"></span></label>
                                    <input type="text" name="product_discount" id="product_discount" class="form-control" value="<?=$get_product_data->product_discount?>" placeholder="Enter Discount" maxlength="10" onkeyup="discount_price()">
                                    <p id="msg_discount" style="display: none;" class="text-danger">Enter Discount</p>
                                </div>
                            </div>
                            
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>U .Sell Price<span class="desc_text" style="color: red;"></span></label>
                                    <input type="text" name="product_discount_rate" id="product_discount_rate" class="form-control" value="<?=$get_product_data->product_discount_rate?>" placeholder="Enter Sell Price" maxlength="10" readonly>
                                    <p id="msg_sell_price" style="display: none;" class="text-danger">Enter Sell Price</p>
                                </div>
                            </div>
                            
                            
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>S .Mrp Price<span class="desc_text" style="color: red;">*</span></label>
                                    <input type="text" name="seller_product_rate" id="seller_product_rate" class="form-control" value="<?=$get_product_data->seller_product_rate?>" placeholder="Enter Mrp Price" maxlength="10" onkeyup="sell_price_s()">
                                    <p id="s_msg_mrp_price" style="display: none;" class="text-danger">Enter S .Mrp Price</p>
                                </div>
                            </div>
                            
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>S .Discount% Rate<span class="desc_text" style="color: red;"></span></label>
                                    <input type="text" name="seller_discount" id="seller_discount" class="form-control" value="<?=$get_product_data->seller_discount?>" placeholder="Enter Discount" maxlength="10" onkeyup="discount_price_s()">
                                    <p id="s_msg_discount" style="display: none;" class="text-danger">Enter S .Discount</p>
                                </div>
                            </div>
                            
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>S .Sell Price<span class="desc_text" style="color: red;"></span></label>
                                    <input type="text" name="seller_discount_rate" id="seller_discount_rate" class="form-control" value="<?=$get_product_data->seller_discount_rate?>" placeholder="Enter Sell Price" maxlength="10" readonly>
                                    <p id="s_msg_sell_price" style="display: none;" class="text-danger">Enter S .Sell Price</p>
                                </div>
                            </div>
                            
                            
                            
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Product Details<span class="desc_text" style="color: red;">*</span></label>
                                    <textarea class="form-control" id="product_description" placeholder="Enter Product Details" name="product_description" rows="3"><?=$get_product_data->product_description?></textarea>
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
    
    function sell_price()
    {
        var sel_product_rate=$('#sel_product_rate').val();
        // var product_discount=$('#product_discount').val();
        if(sel_product_rate != '')
        {
            
            var base_url=$('#base_url').val();  
            // alert(sel_product_rate);
            $.ajax({
            type:'POST',
            url:base_url+'product_rate',
            data: {
                sel_product_rate: sel_product_rate
               
            },
            
            success:function(data){
                // alert(data);
               $("#product_discount_rate").val(data);
            }
            }); 
        }
        
    }
    
    function discount_price()
    {
        var sel_product_rate=$('#sel_product_rate').val();
        var product_discount=$('#product_discount').val();
        
            var base_url=$('#base_url').val(); 
            // alert(sel_product_rate);
            $.ajax({
            type:'POST',
            url:base_url+'discount_rate',
            data: {
                sel_product_rate: sel_product_rate,product_discount:product_discount,
            },
            
            success:function(data){
                // alert(data);
               $("#product_discount_rate").val(data);
            }
            }); 
        
    }
    
    function select_category()
    {
        var catgegory_id=$('#catgegory_id').val(); 
        var current_url=$('#current_url').val();    
        $.ajax({
        type:'POST',
        url:current_url+'/select_category',
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
    
    
    function discount_price_s()
    {
        
        var seller_product_rate=$('#seller_product_rate').val();
        
        var seller_discount=$('#seller_discount').val();
        // alert(seller_discount);
        var base_url=$('#base_url').val(); 
        // alert(sel_product_rate);
        $.ajax({
        type:'POST',
        url:base_url+'discount_rate_s',
        data: {
            seller_product_rate: seller_product_rate,seller_discount:seller_discount,
        },
        
        success:function(data){
            // alert(data);
          $("#seller_discount_rate").val(data);
        }
        });
    }
    
    function sell_price_s()
    {
        var seller_product_rate=$('#seller_product_rate').val();
        // var product_discount=$('#product_discount').val();
        if(seller_product_rate != '')
        {
            
            var base_url=$('#base_url').val();  
            // alert(sel_product_rate);
            $.ajax({
            type:'POST',
            url:base_url+'product_rate_s',
            data: {
                seller_product_rate: seller_product_rate
               
            },
            
            success:function(data){
                // alert(data);
               $("#seller_discount_rate").val(data);
            }
            }); 
        }
    }
    
    
        
    
    $('#product_edit').submit(function(e){
        e.preventDefault();
       var catgegory_id=$('#catgegory_id').val();
       var subcategory_id=$('#subcategory_id').val();
       var product_name=$('#product_name').val();
       var sel_product_rate=$('#sel_product_rate').val();
       var product_description=$('#product_description').val();
       var seller_product_rate=$('#seller_product_rate').val();
       var buyer_id=$('#buyer_id').val();
       
       if(catgegory_id =='Select Category Name')
          {
            
            $("#msg_category_name").show();
        
            setTimeout(function() {
                   $("#msg_category_name").hide();
                }, 1000); 
        
            return true;
          }
          
          if(buyer_id =='Select Buyer Code')
          {
            
            $("#msg_buyer_name").show();
        
            setTimeout(function() {
                   $("#msg_buyer_name").hide();
                }, 1000); 
        
            return true;
          }
          
          if(seller_product_rate =='')
          {
            
            $("#s_msg_mrp_price").show();
        
            setTimeout(function() {
                   $("#s_msg_mrp_price").hide();
                }, 1000); 
        
            return true;
          }

          if(subcategory_id =='Select SubCategory Name')
          {
            
            $("#msg_sub_category_name").show();
        
            setTimeout(function() {
                   $("#msg_sub_category_name").hide();
                }, 1000); 
        
            return true;
          }
          
          if(product_name =='Select Product Name')
          {
            
            $("#msg_productname").show();
        
            setTimeout(function() {
                   $("#msg_productname").hide();
                }, 1000); 
        
            return true;
          }
          
          if(sel_product_rate =='')
          {
            
            $("#msg_mrp_price").show();
        
            setTimeout(function() {
                   $("#msg_mrp_price").hide();
                }, 1000); 
        
            return true;
          }
          
          
          if(product_discount_rate =='')
          {
            
            $("#msg_sell_price").show();
        
            setTimeout(function() {
                   $("#msg_sell_price").hide();
                }, 1000); 
        
            return true;
          }
          
          if(product_description =='')
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
            url:base_url+'admin_product_edit',
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
                // location.reload();
                window.location.replace("https://bongtechsolutions.com/server/book-ecommerce/admin/product");
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