<div class="wrapper wrapper-content animated fadeInRight">
   <div class="row">
        <div class="col-lg-12">
      		<div class="ibox float-e-margins">    
    			<div class="ibox-content">
        			<div class="row">
            			<div id="edit_data">
                			<div class="col-sm-12 b-r"> 
                				<h2>Pending Order</h2><br>                   
               			 	</div>                            
        				</div>
    				</div>    
				</div>
				<div class="alert alert-success alert-dismissible fade in" id="emp_sucess" style="display: none;">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <!--<strong>Success!</strong> Buyer Add.-->
                    <p id="order_sucess"></p>
                </div>
 						<div class="ibox-content">
    						<div class="table-responsive">
        						<table class="table table-striped table-bordered table-hover dataTables-example" >
            					<thead>
                					<tr>
                    					<th>Sl</th>
                                        <th>Order Id</th>
                                        <th>Payment Screen Short</th>
                                        <th>User Details</th>
                                        <th>User Address</th>
                                        <th>Order Date</th>
                                        <th>Total Price</th>
                                        <th>Payment Method</th>
                                        <th>Transaction Id</th>
                                        <th>Payment Status</th>
                                        <th>Order Status</th>
                                        <th>Action</th>
                                        <th>View</th>
                    				</tr>
                    			</thead>
                    			<tbody id="show_data">
                                    <?php 
                                        if(!empty($pending_data))
                                        {
                                            foreach($pending_data as $key => $value)
                                            {
                                                // $ex=explode("#", $value->order_code);
                                                // $uni_id=$ex[1];
                                    ?>
                                    <tr class="gradeX">
                                        <td><?=$key+1?></td>
                                        <td><?=$value->order_id?></td>
                                        <td> 
                                        <?php 
                                        if(!empty($value->screen_short))
                                        {
                                            ?><a href="<?=base_url('webroot/UserImages/order/'.$value->screen_short.'')?>"><img src="<?=base_url('webroot/UserImages/order/'.$value->screen_short.'')?>" class="banner_imgs"></a>
                                            <?php
                                        }
                                        ?></td>
                                        <td>
                                            <div style="width: 185px;">
                                                <?php if(!empty($value->bill_name)){?>
                                                      <p><b>Name: </b><?=$value->bill_name?></p>
                                                <?php }?>
                
                                                 <?php if(!empty($value->bill_mobile)){?>
                                                      <p><b>Phone No: </b><?=$value->bill_mobile?></p>
                                                <?php }?>
                                                <?php if(!empty($value->bill_email)){?>
                                                      <p><b>Email Id: </b><?=$value->bill_email?></p>
                                                <?php }?>
                                                
                                              </div>
                                        </td>
                                        <td>
                                            <div style="width: 185px;">
                                                <?php if(!empty($value->bill_state)){?>
                                                      <p><b>State: </b><?=$value->bill_state?></p>
                                                <?php }?>
                                                
                                                <?php if(!empty($value->bill_zip)){?>
                                                      <p><b>Pin Code: </b><?=$value->bill_zip?></p>
                                                <?php }?>
                
                                                 
                                                <?php if(!empty($value->bill_street)){?>
                                                      <p><b>Town: </b><?=$value->bill_street?></p>
                                                <?php }?>
                                                
                                              </div>
                                        </td>
                                        <td><?=$value->order_date?></td>
                                        <td><?=$value->total?></td>
                                        <td><?=$value->payment_method?></td>
                                        <td><?=$value->tranction_id?></td>
                                        <td><?=$value->payment_status?></td>
                                        <td><?=$value->delivery_status?></td>
                                        <td><select id="status" name="status" class="form-control" onchange="order_status_change(this.value)">
                                    <?php
                                        if($value->delivery_status == 'Ordered'){ ?>
                                          <option value="<?=$value->order_id.'_Ordered'?>" selected>Pending</option>
                                          <option value="<?=$value->order_id.'_Packed'?>">Packed</option>
                                          <option value="<?=$value->order_id.'_Shipped'?>">Shipped</option>
                                          <option value="<?=$value->order_id.'_Delivered'?>">Delivered</option>
                                          <?php
                                        } else if($value->delivery_status == 'Packed'){ ?>
                                           
                                          <option value="<?=$value->order_id.'_Packed'?>" selected>Packed</option>
                                          <option value="<?=$value->order_id.'_Shipped'?>">Shipped</option>
                                          <option value="<?=$value->order_id.'_Delivered'?>">Delivered</option>
                                          <!--<option value="<?=$value->delivery_status.'_Ordered'?>">Pending</option>-->
                                        <?php } else if($value->delivery_status == 'Shipped') { ?>
                                           
                                           <option value="<?=$value->order_id.'_Shipped'?>" selected>Shipped</option>
                                           <option value="<?=$value->order_id.'_Delivered'?>">Delivered</option>
                                           <!--<option value="<?=$value->delivery_status.'_Packed'?>" >Packed</option>-->
                                           <!--<option value="<?=$value->delivery_status.'_Ordered'?>">Pending</option>-->
                                        <?php } else if($value->delivery_status == 'Delivered') { ?>
                                            <option value="<?=$value->order_id.'_Delivered'?>" selected>Delivered</option>
                                        <?php }?>
                                  </select></td>
                                  <td><a href="<?=base_url('admin/view-order/'.$value->order_id)?>">view</a></td>
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
     </style>


<script>
    function order_status_change(transid) 
    {  
        var uniqcode=transid;
        var uniqcode = uniqcode.replace(/ /g,'');
        var current_url=$('#current_url').val()
            $.ajax({                
                type:'post',                
                url:current_url+'/order_status',
                data: {                    
                    uniqcode: uniqcode,                    
                },                
                success:function(data){
                  if(data==2)
                    {
                        $('#emp_sucess').text('Order Packing Successfully').show();
                        // $("#order_sucess").show();
                        setTimeout(function(){ 
                        location.reload();
                        }, 2000);    
                    //   location.reload();
                    }
                if(data==3)
                {
                    $('#emp_sucess').text('Order Shipped Successfully').show();
                        setTimeout(function(){ 
                        location.reload();
                        }, 2000);    
                }
                if(data == 4)
                {
                   $('#emp_sucess').text('Order Delivery Successfully').show();
                        setTimeout(function(){ 
                        // location.reload('');
                        window.location.replace("https://bongtechsolutions.com/server/book-ecommerce/admin/delivery-order");
                        }, 2000); 
                }
                if(data == 1)
                {
                   $('#emp_sucess').text('Order Pending Successfully').show();
                        setTimeout(function(){ 
                        location.reload();
                        }, 2000); 
                }
                
                }
    
            });   
    }
</script>


    