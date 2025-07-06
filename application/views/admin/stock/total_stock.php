 <style>

#ci{
	border: 1px solid #ddd;
	    margin-left: 137px;
}
#c-a{
   border-right:1px solid #ddd ;
   padding: 22px 103px 22px 15px;
}
#c-b{
   border-right:1px solid #ddd ;
   padding: 13px 11px 13px 0px;
}



#search_member_id{
    margin:5px 10px 0px 3px;
	box-shadow: rgb(0 0 0 / 35%) 0px 5px 15px;
    border-radius: 10px;
    padding: 43px 0px 43px 10px;
}
#member_id{
    padding: 7px 16px;
    margin-left: 20px;
}
#c-s{
    padding: 0px 105px 0px 22px;
}
.table-bordered {
    margin-left: -5px;
}

.cd {
    margin:5px 10px 0px 10px;
   box-shadow: rgb(0 0 0 / 35%) 0px 5px 15px;
    border-radius: 10px;
    padding: 27px 0px 20px 10px;
    
.cd h3{
    margin-bottom: 22px;
}

    }

#document_detailss{
   
    margin-top: 5px;
    box-shadow: rgb(0 0 0 / 35%) 0px 5px 15px;
    border-radius: 10px;
    padding: 27px 0px 20px 10px;
    margin-left: 10px;
    margin-right: 10px;
    margin-bottom: 20px;
}
#document_detailss h3{
    margin-bottom:25px;
}
.mit{
    margin: 0px 0px 0px 840px;
}
.da-in{
   margin:0px 28px 19px 777px;
}

.da-sn{
   margin:0px 28px 19px 777px;
}

   .pdr_ldr{
    position: fixed;
    width: 100%;
    height: 100vh;
    left: 0;
    top: 0;
    z-index: 99999999;
    text-align: center;
    background: #ffffffd6;
    padding-top: 45vh;
}
.pdr_ldr img{
    width: 50px;
}
</style>

<div class="wrapper wrapper-content animated fadeInRight">
   <div class="row">
        <div class="col-lg-12">
      		<div class="ibox float-e-margins">    
    			<div class="ibox-content">
        			    
				</div>
 						<div class="ibox-content">
    						<div class="table-responsive">
    						    <div class="cd" id="show_data">
        						<table class="table table-striped table-bordered table-hover dataTables-example" >
            					<thead>
                					<tr>
                    					<th>Sl</th>
                                        <th>Product Slug</th>
                                        <th>Product Code</th>
                                        <th>Product Name</th>
                                        <th>Total Stock</th>
                    				</tr>
                    			</thead>
                    			<tbody>
                                    <?php 
                                        if(!empty($stock_data))
                                        {
                                            foreach($stock_data as $key => $value)
                                            {
                                                
                                    ?>
                                    <tr class="gradeX">
                                        
                                        <?php 
                                            if($value->total_stock < 10)
                                            {
                                        ?>
                                                <td style="color: red;"> <?=$key+1?> </td>
                                                <td style="color: red;"> <?=$value->product_slug?> </td>
                                                <td style="color: red;"> <?=$value->product_code?> </td>
                                                <td style="color: red;"> <?=$value->product_name?> </td>
                                                <td style="color: red;"> <?=$value->total_stock?> </td>
                                        <?php
                                            }
                                            else
                                            {
                                                
                                        ?>
                                                <td> <?=$key+1?> </td>
                                                <td> <?=$value->product_slug?> </td>
                                                <td> <?=$value->product_code?> </td>
                                                <td> <?=$value->product_name?> </td>
                                                <td> <?=$value->total_stock?> </td>
                                        <?php
                                            }
                                        ?>
                                    </tr>
                                    <?php
                                        
                                            }
                                        }
                                    ?>
                				</tbody>
                    			</table>
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
            left: 484px  !important;
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
     
    <div class="pdr_ldr" style="display:none;">
        <img src="<?=base_url()?>webroot/user_panel/assets/img/product_loader.gif">
    </div>

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
    
    
        function buyer_stock_serch()
        {
            var base_url=$('#base_url').val();
            var buyer_id=$('#buyer_id').val();
            var d_search=$('#d_search').val();
            $.ajax({
              url:base_url+'buyer_stock_data_serch',
              type: 'POST',
              data: {buyer_code:buyer_id,buyer_id123:d_search},
              success:function(data) {
                  
                if(data=='')
                {
                    var abc="NO RECORD FOUND";
                    $(".pdr_ldr").show();  
                    setTimeout(function(){
                    $("#show_data").html(abc); 
                    $(".pdr_ldr").hide();
                }, 2000); 
                    
                }
                else
                {
                    $(".pdr_ldr").show();  
                        setTimeout(function(){
                        $("#show_data").html(data);
                        $(".pdr_ldr").hide();
                    }, 2000);
                }
                  
                    // $("#show_data").html(data);
                    
              },
        
          });
            
            
        }
        
        function buyer_code_serch(x)
        {
            var base_url=$('#base_url').val();
            $.ajax({
              url:base_url+'code_buyer_serch_data',
              type: 'POST',
              data: {search_code:x},
              success:function(data) {
                // alert(data);
                if(data==1)
                {
                    $(".inpu_dp").hide();
                    //$(".inp_dp").css("display", "block").html(data);
                }
                else 
                {
                    var res = data.split("|");
                    // alert(res);
                    var name=res[0];
                    var type=res[1];
                    $(".inpu_dp").html(name);
                    $("#name").val(type);
                    $(".inpu_dp").css("display", "block").html(data);
                }
                    
              },
        
          });
    
        }
        
        function selectproduct123(x)
        {
            // alert(x);
            var abc=x;
            var res = abc.split("|");
            var unique_id=res[0];
            var name=res[1];
    
            $("#buyer_id").val(name);
            $("#d_search").val(unique_id);
            // $("#pro_id").val(unique_id);
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
    
            $(".inpu_dp").hide();
        }
    
    </script>



    