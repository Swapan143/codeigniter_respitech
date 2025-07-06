<div class="wrapper wrapper-content animated fadeInRight">

<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-content">
                <div class="row">
                    <div id="edit_data">
                        <div class="col-sm-12 b-r">
                        <h2>Buyer Product</h2><br>
                        <div class="alert alert-success alert-dismissible fade in" id="emp_sucess" style="display: none;">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Success!</strong> Buyer Product Add.
                        </div>
                        <div class="alert alert-danger alert-dismissible" style="display:none" id="mobile_exists_msg">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Faild!</strong> Buyer Phone No Already Exists.
                        </div>
                        <form role="form" id="buyer_add_product" action="" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Buyer Name<span class="desc_text" style="color: red;">*</span></label>
                                        <select name="buyer_id" id="buyer_id" class="form-control">
                                            <option>Select Buyer Name</option>
                                            <?php
                                            foreach ($buyer_data as $value) {
                                              ?>
                                            <option value="<?php echo $value->id;?>"><?php echo $value->buyer_name;?></option>
                                            <?php }?>
                                        </select>
                                    <p id="msg_buyer_name" style="display: none;" class="text-danger">Select Buyer Name</p>
                                </div>
                            </div>
                            
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Product Name<span class="desc_text" style="color: red;">*</span></label>
                                    <input type="text" name="product_name" id="product_name" class="form-control" placeholder="Enter Product Name" aria-describedby="emailHelp" autocomplete="off">
                                    <p id="msg_product_name" style="display: none;" class="text-danger">Enter Product Name</p>
                                    
                                    <input type="hidden" class="form-control" id="pro_search_id" aria-describedby="emailHelp" name="pro_search_id">
                                    
                                    <ul id="drop_search" class="search-dropdown inp_dp" style="display: none;">
                                      <!--<li>Xxxxxxxxxxx</li>-->
                                      <!--<li>Xxxxxxxxxxx</li>-->
                                      <!--<li>Xxxxxxxxxxx</li>-->
                                    </ul>
                                </div>
                            </div>
                            
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Product Rate<span class="desc_text" style="color: red;">*</span></label>
                                    <input type="text" name="product_bye_rate" id="product_bye_rate" class="form-control" placeholder="Enter Product Rate" maxlength="10">
                                    <p id="msg_product_rate" style="display: none;" class="text-danger">Enter Product Rate</p>
                                </div>
                            </div>
                            
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Product Quantity<span class="desc_text" style="color: red;">*</span></label>
                                    <input type="text" name="bye_qty" id="bye_qty" class="form-control" placeholder="Enter Product Quantity" maxlength="10">
                                    <p id="msg_product_quantity" style="display: none;" class="text-danger">Enter Product Quantity</p>
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
                            <th>Buyer Name</th>
                            <th>Product Name</th>
                            <th>Buyer Rate</th>
                            <th>Total Qty</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($buyer_product_data as $key => $value) {
                        
                        $this->db->where('id', $value->buyer_id);
                        $buyer_name=$this->db->get('tbl_buyer')->row();
                        
                        $this->db->where('product_id', $value->id);
                        $stock_data=$this->db->get('tbl_total_stock')->row();
                                    
                    ?>
                        <tr class="gradeX">
                            <td><?=$key+1?></td>
                            <td><?=$buyer_name->buyer_name?></td>
                            <td><?=$value->product_name?></td>
                            <td><?=$value->product_bye_rate?></td>
                            <td><?=$stock_data->total_stock?></td>
                            <td>
                                <a href="javascript:void(0)" onclick="edit_action('<?=$value->id?>')" id="get_action_val_<?=$value->id?>"><i class="fa fa-pencil-square action"></i></a>
                                <a href="<?=base_url('admin/category/destroy/'.$value->id)?>" onclick="return confirm('Are you sure delete this category?')"><i class="fa fa-trash action"></i></a>
                            </td>
                            
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
    
     $("#product_name").keyup(function(e){
      
      var search_pro=$("#product_name").val();
      //var current_url=$('#current_url').val();
      var base_url=$('#base_url').val(); 
    
      //alert(current_url);
      $.ajax({
            url:base_url+'product_search',
            type: 'POST',
            data: {search_pro:search_pro},
            success:function(data) {
            //alert(data);
           var res = data.split("|");
            var name=res[0];
            
            var type=res[1];
                
          $(".inp_dp").html(name);
          $("#name").val(type);
           $(".inp_dp").css("display", "block").html(data);
            },
    
        });
    
    
        
        //$("#drop_search").show();
      });
    //});
    
    
    function selectProduct(x)
    {
        var abc=x;
        var res = abc.split("|");
        var unique_id=res[0];
        var name=res[1];

        $("#product_name").val(name);
        $("#pro_search_id").val(unique_id);
        
//         var base_url=$('#base_url').val(); 
  
//   $.ajax({
//         url:base_url+'search_shop_details',
//         type: 'POST',
//         data: {search_pro_id:unique_id},
//         success:function(data) {
//         //alert(data);
//         var res = data.split("|");
//         var address=res[0];
//         var mobile=res[1];
//         var gst=res[2];

//         $("#address").val(address);
//         $("#mobile_no").val(mobile);
//         $("#gst_no").val(gst);
      
//         },

//     });

        $(".inp_dp").hide();
        }
    
        $('#buyer_add_product').submit(function(e){
        e.preventDefault();
       var product_name=$('#product_name').val();
       var buyer_id=$('#buyer_id').val();
       var product_bye_rate=$('#product_bye_rate').val();
       var bye_qty=$('#bye_qty').val();
       
       if(buyer_id =='Select Buyer Name')
          {
            
            $("#msg_buyer_name").show();
        
            setTimeout(function() {
                   $("#msg_buyer_name").hide();
                }, 1000); 
        
            return true;
          }

          if(product_name =='')
          {
            
            $("#msg_product_name").show();
        
            setTimeout(function() {
                   $("#msg_product_name").hide();
                }, 1000); 
        
            return true;
          }
          
          if(product_bye_rate =='')
          {
            
            $("#msg_product_rate").show();
        
            setTimeout(function() {
                   $("#msg_product_rate").hide();
                }, 1000); 
        
            return true;
          }
          
          if(bye_qty =='')
          {
            
            $("#msg_product_quantity").show();
        
            setTimeout(function() {
                   $("#msg_product_quantity").hide();
                }, 1000); 
        
            return true;
          }
       
       var current_url=$('#current_url').val();
       var base_url=$('#base_url').val();
    //   alert(base_url);
       var formData = new FormData($(this)[0]);
        $.ajax({
            url:base_url+'buyer_product_data_add',
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