<div class="wrapper wrapper-content animated fadeInRight">

<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-content">
                <div class="row">
                    <div id="edit_data">
                        <div class="col-sm-12 b-r">
                        <h2>Buyer Add</h2><br>
                        <div class="alert alert-success alert-dismissible fade in" id="emp_sucess" style="display: none;">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Success!</strong> Buyer Add.
                        </div>
                        <div class="alert alert-danger alert-dismissible" style="display:none" id="mobile_exists_msg">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Faild!</strong> Buyer Phone No Already Exists.
                        </div>
                        <form role="form" id="buyer_add" action="" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Buyer Name<span class="desc_text" style="color: red;">*</span></label>
                                    <input type="text" name="buyer_name" id="buyer_name" class="form-control" placeholder="Enter Buyer Name" aria-describedby="emailHelp" autocomplete="off" maxlength="200" >
                                    <p id="msg_buyer_name" style="display: none;" class="text-danger">Enter Buyer Name</p>
                                </div>
                                 <input type="hidden" class="form-control" id="pro_search_id" aria-describedby="emailHelp" name="pro_search_id">
                                 
                                 <ul id="drop_search" class="search-dropdown inp_dp" style="display: none;">
                                  <!--<li>Xxxxxxxxxxx</li>
                                  <li>Xxxxxxxxxxx</li>
                                  <li>Xxxxxxxxxxx</li>-->
                                </ul>
                            </div>
                            
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Phone No<span class="desc_text" style="color: red;">*</span></label>
                                    <input type="text" name="buyer_phoneno" id="buyer_phoneno" class="form-control" placeholder="Enter Phone No" maxlength="10">
                                    <p id="msg_mobile_no" style="display: none;" class="text-danger">Enter Mobile No</p>
                                </div>
                            </div>
                            
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Address<span class="desc_text" style="color: red;">*</span></label>
                                    <input type="text" name="buyer_address" id="buyer_address" class="form-control" placeholder="Enter Enter Address" maxlength="10">
                                    <!--<textarea class="form-control" id="buyer_address" placeholder="Enter Address" name="buyer_address" rows="3"></textarea>-->
                                    <p id="msg_address" style="display: none;" class="text-danger">Enter Address</p>
                                </div>
                            </div>
                        </div>
                        
                      
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="table-responsive">  
                                  <?php $i=1;?>
                                    <table class="table table-bordered" id="dynamic_field">  
                                        <tr>  
                                            <td><label for="exampleInputEmail1">Product Name</label>
                                            <input type="text" name="product_name[]" placeholder="Enter Product Name" class="form-control name_list abc" aria-describedby="emailHelp" autocomplete="off" z="<?php echo $i;?>" id="product_name<?php echo $i;?>"  onkeyup="product_serch(this.value,'<?php echo $i;?>');"/>
                                            
                                                <input type="hidden" class="form-control" id="pro_id<?php echo $i;?>" aria-describedby="emailHelp" name="pro_id[]">
                                                <!--<input type="hidden" class="form-control" id="pro_id<?php echo $i;?>" aria-describedby="emailHelp" name="pro_id[]">-->
                                 
                                                    <ul id="d_search<?php echo $i;?>" class="search-dropdown inpu_dp<?php echo $i;?>" style="display: none;">
                                                      <!--<li>Xxxxxxxxxxx</li>
                                                      <!--<li>Xxxxxxxxxxx</li>-->
                                                      <!--<li>Xxxxxxxxxxx</li>-->
                                                    </ul>
                                            </td>
                                            <td><label for="exampleInputEmail1">Rate</label><input type="text" name="product_bye_rate[]" id="product_bye_rate<?php echo $i;?>" placeholder="Product Rate" class="form-control name_list" /></td>
                                            <td><label for="exampleInputEmail1">Quantity</label><input type="text" name="bye_qty[]" id="bye_qty<?php echo $i;?>" placeholder="Product Quantity" class="form-control name_list" /></td>
                                            <td>
                                                <button type="button" name="add" id="add" class="btn btn-success" style="font-size: 35px;line-height: 25px;">+</button>
                                            </td>  
                                        </tr>  
                                    </table>              
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
                <table class="table table-striped table-bordered table-hover dataTables-example">
                    <thead>
                        <tr>
                            <th>Index</th>
                            <th>Buyer Code</th>
                            <th>Buyer Name</th>
                            <th>Phone No</th>
                            <th>Address</th>
                            <th>Product View</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($buyer_data as $key => $value) {
                                    
                    ?>
                        <tr class="gradeX">
                            <td><?=$key+1?></td>
                            <td><?=$value->buyer_code?></td>
                            <td><?=$value->buyer_name?></td>
                            <td><?=$value->buyer_phoneno?></td>
                            <td><?=$value->buyer_address?></td>
                            <td><a href="<?=base_url('admin/product-view/'.$value->buyer_id)?>" target="_blank">View List</a></td>
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
    
    
    
  $("#buyer_name").keyup(function(e){
  var search_pro=$("#buyer_name").val();
  //var current_url=$('#current_url').val();
  var base_url=$('#base_url').val(); 
      $.ajax({
            url:base_url+'buyer_search',
            type: 'POST',
            data: {search_pro:search_pro},
            success:function(data) {
            //alert(data);
            if(data==1)
            {
                $(".inp_dp").hide();
                //$(".inp_dp").css("display", "block").html(data);
            }else {
           var res = data.split("|");
            var name=res[0];
            var type=res[1];
          $(".inp_dp").html(name);
          $("#name").val(type);
           $(".inp_dp").css("display", "block").html(data);
           
            }
           
            },
    
        });
        //$("#drop_search").show();
      });
    //});
    
        
        
        
    function selectbuyer(x)
    {
        var abc=x;
        var res = abc.split("|");
        var unique_id=res[0];
        var name=res[1];

        $("#buyer_name").val(name);
        $("#pro_search_id").val(unique_id);
        
        var base_url=$('#base_url').val(); 
  
        $.ajax({
            url:base_url+'search_buyer_details',
            type: 'POST',
            data: {search_pro_id:unique_id},
            success:function(data) {
            // alert(data);
            var res = data.split("|");
            var address=res[0];
            var mobile=res[1];
            
            $("#buyer_address").val(address);
            $("#buyer_phoneno").val(mobile);
            },
        });

        $(".inp_dp").hide();
    }
    
    
        $('#buyer_add').submit(function(e){
        e.preventDefault();
       var buyer_name=$('#buyer_name').val();
       var buyer_phoneno=$('#buyer_phoneno').val();
       var buyer_address=$('#buyer_address').val();
       
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
            url:base_url+'buyer_data_add',
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
    
    
    
    
    $(document).ready(function(){  
      var i=1;  
      $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="product_name[]" placeholder="Enter Product Name" aria-describedby="emailHelp" autocomplete="off" class="form-control name_list tr" z="'+i+'" id="product_name'+i+'"/ onkeyup="product_serch(this.value,'+i+');"><input type="hidden" class="form-control" id="pro_id'+i+'" aria-describedby="emailHelp" name="pro_id[]"><ul id="d_search'+i+'" class="search-dropdown inpu_dp'+i+'" style="display: none;"></ul></td><td><input type="text" name="product_bye_rate[]" placeholder="Product Rate" class="form-control name_list" id="product_bye_rate'+i+'"/></td><td><input type="text" name="bye_qty[]" placeholder="Product Quantity" class="form-control name_list" id="bye_qty'+i+'"/></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove" style="font-size:20px;line-height:25px;">X</button></td></tr>');  
      });  
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  
      
 });
 
 
    function product_serch(x,y)
    {
        // alert(x);
        var base_url=$('#base_url').val();
        var buyer_id=$('#pro_search_id').val();
    
        $.ajax({
          url:base_url+'product_serch_data',
          type: 'POST',
          data: {search_pro:x,id:y,buyer_id:buyer_id},
          success:function(data) {
            // alert(data);
            if(data==1)
            {
                $(".inpu_dp"+y).hide();
                //$(".inp_dp").css("display", "block").html(data);
            }
            else 
            {
                var res = data.split("|");
                var name=res[0];
                var type=res[1];
                $(".inpu_dp"+y).html(name);
                $("#name").val(type);
                $(".inpu_dp"+y).css("display", "block").html(data);
            }
                
          },
    
      });
    
    }
    
    function selectproduct1(x)
    {
        var abc=x;
        var res = abc.split("|");
        var unique_id=res[0];
        var name=res[1];
        var id=res[2];

        $("#product_name"+id).val(name);
        $("#d_search"+id).val(unique_id);
        $("#pro_id"+id).val(unique_id);
        var base_url=$('#base_url').val(); 
  
        // $.ajax({
        //     url:base_url+'search_buyer_details',
        //     type: 'POST',
        //     data: {search_pro_id:unique_id},
        //     success:function(data) {
        //     // alert(data);
        //     var res = data.split("|");
        //     var address=res[0];
        //     var mobile=res[1];
            
        //     $("#buyer_address").val(address);
        //     $("#buyer_phoneno").val(mobile);
        //     },
        // });

        $(".inpu_dp"+id).hide();
    }
    
    </script>