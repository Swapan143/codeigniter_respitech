<div class="wrapper wrapper-content animated fadeInRight">

<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-content">
                <div class="row">
                    <div id="edit_data">
                        <div class="col-sm-12 b-r">
                        <h2>Product Add</h2><br>
                        <div class="alert alert-success alert-dismissible fade in" id="emp_sucess" style="display: none;">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Success!</strong> Producty Add.
                        </div>
                        <div class="alert alert-danger alert-dismissible" style="display:none" id="mobile_exists_msg">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Faild!</strong> Sub Category Already Exists.
                        </div>
                        <form role="form" id="product_add" action="" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Category Name<span class="desc_text" style="color: red;">*</span></label>
                                        <select name="catgegory_id" id="catgegory_id" class="form-control" onchange="select_category()">
                                            <option>Select Category Name</option>
                                            <?php
                                            foreach ($category_data as $value) {
                                              ?>
                                            <option value="<?php echo $value->id;?>"><?php echo $value->category_name;?></option>
                                            <?php }?>
                                        </select>
                                    <p id="msg_category_name" style="display: none;" class="text-danger">Select Category Name</p>
                                </div>
                            </div>
                            
                            
                            <!-- <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Sub Category Name<span class="desc_text" style="color: red;">*</span></label>
                                        <select name="subcategory_id" id="subcategory_id" class="form-control" >
                                            <option>Select SubCategory Name</option>
                                            
                                        </select>
                                    <p id="msg_sub_category_name" style="display: none;" class="text-danger">Select SubCategory Name</p>
                                </div>
                            </div> -->
                            
                            
                            
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Product Name<span class="desc_text" style="color: red;">*</span></label>

                                    <input type="text" name="product_name" id="product_name" class="form-control" placeholder="Enter Product Name" maxlength="10">
                                    <p id="msg_productname" style="display: none;" class="text-danger">Enter Product Name</p>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Product Quentity<span class="desc_text" style="color: red;">*</span></label>

                                    <input type="text" name="product_quentity" id="product_quentity" class="form-control" placeholder="Enter Product Quentity" maxlength="10">
                                    <p id="msg_productqty" style="display: none;" class="text-danger">Enter Product Quentity</p>
                                </div>
                            </div>
                           
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Mrp Price<span class="desc_text" style="color: red;">*</span></label>
                                    <input type="text" name="sel_product_rate" id="sel_product_rate" class="form-control" placeholder="Enter Mrp Price" maxlength="10" onkeyup="sell_price()">
                                    <p id="msg_mrp_price" style="display: none;" class="text-danger">Enter Mrp Price</p>
                                </div>
                            </div>
                            
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Discount % Rate<span class="desc_text" style="color: red;"></span></label>
                                    <input type="text" name="product_discount" id="product_discount" class="form-control" placeholder="Enter Discount" maxlength="10" onkeyup="discount_price()">
                                    <p id="msg_discount" style="display: none;" class="text-danger">Enter  Discount</p>
                                </div>
                            </div>
                            
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Sell Price<span class="desc_text" style="color: red;"></span></label>
                                    <input type="text" name="product_discount_rate" id="product_discount_rate" class="form-control" placeholder="Enter Sell Price" maxlength="10" readonly>
                                    <p id="msg_sell_price" style="display: none;" class="text-danger">Enter Sell Price</p>
                                </div>
                            </div>
                            
                          
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Product Details<span class="desc_text" style="color: red;">*</span></label>
                                    <textarea class="form-control" id="product_description" placeholder="Enter Product Details" name="product_description" rows="3"></textarea>
                                    <p id="msg_address" style="display: none;" class="text-danger">Enter Product Details</p>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Is Rent <span class="desc_text" style="color: red;"></span></label>
                                    <select name="is_rent" id="is_rent" class="form-control" onchange="select_category()">
                                        <option>Select Is Rent</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                    <p id="msg_is_rent" style="display: none;" class="text-danger">Select Is Rent</p>
                                </div>
                            </div>
                            <div class="col-lg-6" id="rent_type_div">
                                <div class="form-group">
                                    <label>Rent Type<span class="desc_text" style="color: red;"></span></label>
                                    <select name="rent_type" id="rent_type" class="form-control">
                                        <option>Select Rent Type</option>
                                        <option value="monthly">Monthly</option>
                                        <option value="yearly">Yearly</option>
                                    </select>
                                    <p id="msg_rent_type" style="display: none;" class="text-danger">Select rent type</p>
                                </div>
                            </div>

                            <div class="col-lg-6" id="rent_price_div">
                                <div class="form-group">
                                    <label>Rent Price<span class="desc_text" style="color: red;"></span></label>
                                    <input type="text" name="rent_price" id="rent_price" class="form-control" placeholder="Enter Rent Price" maxlength="10" onkeyup="sell_price()">
                                    <p id="msg_rent_price" style="display: none;" class="text-danger">Enter Rent Price</p>
                                </div>
                            </div>

                            <div class="col-lg-12" id="rent_details_div">
                                <div class="form-group">
                                    <label>Rent Details<span class="desc_text" style="color: red;">*</span></label>
                                    <textarea class="form-control" id="rent_description" placeholder="Enter Rent Details" name="rent_description" rows="3"></textarea>
                                    <p id="msg_address" style="display: none;" class="text-danger">Enter Rent Product Details</p>
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
        $(document).ready(function(){
            $("#rent_type_div").hide();
            $("#rent_price_div").hide();
            $("#rent_details_div").hide();
            $("#is_rent").change(function(){
                if($(this).val()=="Yes")
                {
                    $("#rent_type_div").show();
                    $("#rent_price_div").show();
                    $("#rent_details_div").show();
                }
                else
                {
                    $("#rent_type_div").hide();
                    $("#rent_price_div").hide();
                    $("#rent_details_div").hide();
                }
            });
        });

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
    
    
    
        $('#product_add').submit(function(e)
        {
            e.preventDefault();
            var catgegory_id=$('#catgegory_id').val();
            var subcategory_id=$('#subcategory_id').val();
            var product_name=$('#product_name').val();
            var product_quentity=$('#product_quentity').val();
            var sel_product_rate=$('#sel_product_rate').val();   
            var product_description=$('#product_description').val();  
            


            if(catgegory_id =='Select Category Name')
            {
                
                $("#msg_category_name").show();
            
                setTimeout(function() {
                        $("#msg_category_name").hide();
                    }, 1000); 
            
                return true;
            }

            // if(subcategory_id =='Select SubCategory Name')
            // {
            
            //     $("#msg_sub_category_name").show();
            
            //     setTimeout(function() {
            //             $("#msg_sub_category_name").hide();
            //         }, 1000); 
            
            //     return true;
            // }

            if(product_name =='')
            {
            
                $("#msg_productname").show();
            
                setTimeout(function() {
                        $("#msg_productname").hide();
                    }, 1000); 
            
                return true;
            }

            if(product_quentity =='')
            {
            
                $("#msg_productqty").show();
            
                setTimeout(function() {
                        $("#msg_productqty").hide();
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

        var formData = new FormData($(this)[0]);
            $.ajax({
                url:base_url+'product_submit',
                type: 'POST',
                data: formData,
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                success:function(data) 
                {
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