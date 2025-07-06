<?php 
$uer_id=$_SESSION['font_user_id'];
$this->db->group_by('order_id'); 
$this->db->where('user_id', $uer_id);
$order_details=$this->db->get('tbl_order')->result();
//print_r($order_details);




?>

<style>
    @media screen and (max-width: 600px) and (min-width: 200px) {
        
        .sidebar{
      
          
        }
        
        .table{
            width:100%;
            overflow-x: scroll;
            overflow-y: scroll;
            

        }
        .no{
            display:flex;
            align-items: center;
            padding-left:20px;
            padding-right:20px;
            width:250px;
              
        }
        .image{
            display:flex;
            align-items: center;
            padding-left: 40px;
            padding-right: 40px;
        }
        .product{
            display:flex;
            align-items: center;
            padding-left: 40px;
            padding-right: 40px;
        }
        .order_cancellatiion{
            display:flex;
            align-items: center;
            padding-left: 10px;
            padding-right: 10px;
        }
        .order_track{
            display:flex;
            align-items: center;
            padding-left: 10px;
            padding-right: 10px;
        }
        .cancellatiion{
            width:100px;
        }
       
       
      
       

    }
    .content{
       margin-bottom:2%;
    }
    .table{
        display:grid;
        grid-template-columns: 3fr 2fr 1fr 1fr 1fr 2fr;
        grid-template-rows: 50px 
    }
    .table{
        height:80%;width:100%; 
       
    }
   
</style>
<body>
  

  <div class="container" style=";padding:2%;border;2px solid black;">
    
      <div class="row mb-100">
        <!-- <div class="col-12"> -->
          <!-- <div class="row"> -->
            <div class="col-lg-3 col-12" style="cursor:pointer margin-bottom:40px ;position:sticky;z-index:999">
               
                  <div class="dashboard" style="border-bottom:1px solid grey;padding:5%;">
                  
                    Dashboard
                  </div>
                  <div class="Orders"  style="border-bottom:1px solid grey;padding:5%;">  
                  <a href="<?=base_url('my-order')?>"><i class="fa fa-cart-arrow-down"></i> Orders</a>
                  </div>
                  <div class="Wishlist"  style="border-bottom:1px solid grey;padding:5%;">
                      <a href="<?=base_url('show-wishlist')?>"> <i class="fa fa-heart"></i> Wishlist</a>
                   
                 
                  </div>
                  <div class="account"  style="border-bottom:1px solid grey;padding:5%;">
                 <a href="<?=base_url('my-account')?>"> <i class="fa fa-user"></i>
                    Account</a>
                 
                  
                  </div>
                  
                  <div class="log"  style="border-bottom:1px solid grey;padding:5%;">
                  <a href="<?=base_url('user-logout')?>"><i class="fa fa-sign-out"></i> 
                     Log Out</a>
                  </div> 

                

            </div>
            <div class="col-lg-9 col-12">
              <div class="main_content" style="">
                  
                  
                  
                  
                  
                  <?php foreach($order_details as $val)
                  {
                  
                  $order_id=$val->order_id;
                  $order_date=$val->order_date;
                  $ex=explode("-",$order_date);
                  $year=$ex[0];
                  $month=$ex[1];
                  $day=$ex[2];
              
                  $monthName = date('M', mktime(0, 0, 0, $month, 10));
                  
                  ?>
                  
                       <div class="content" style="border-bottom:1px solid #D3D3D3">
                              <div class="order_id" style="height:50px;width:100%; display:flex;justify-content:space-between;">
                                
                                <div class="id" style="line-height:2px;">
                                    <h4 style="font-size:100%;margin-bottom:none;font-weight:bold">Order id:<?php echo $val->order_id;?></h4>
                                    <h4 style="font-size:100%;font-weight:bold">Date:<?php echo $day;?>-<?php echo $monthName;?>-<?php echo $year;?></h4>

                                </div>

                                <div class="order_details" style="height:40px;width:150px;cursor:pointer">
                                        <!--<h4 > Order Details</h4>-->
                                        <a href="<?=base_url('order-details/'.$val->order_id)?>">Order Details</a>
                                </div>
                              </div>
                               
                             
                              <div class="table"  style="text-align:center">
                                    
                                    <div class="no" style="border:1px solid grey ">
                                            Product Name

                                    </div>
                                    <div class="image" style="border:1px solid grey">
                                           Product image

                                    </div>
                                   <div class="product" style="border:1px solid grey">
                                            Product Price

                                    </div>
                                   
                                   <div class="order_track" style="border:1px solid grey">
                                             Product qty

                                   </div>
                                   
                                   
                                   <div class="order_cancellatiion" style="border:1px solid grey">
                                            Order Tracking

                                   </div>
                                   
                                    <div class="cancellatiion" style="border:1px solid grey">
                                            Order Cancel

                                   </div>
                                   
                                   
                                   
                                  
                                    
                                   <?php 
                                    $this->db->where('order_id', $order_id);
                                    $order_details_two=$this->db->get('tbl_order')->result();
                                    
                                    
                                    
                                    foreach($order_details_two as $val2)
                                    {
                                    
                                    
                            $this->db->limit(1);
                            $this->db->where('product_id', $val2->product_id);
                            $product_image=$this->db->get('tbl_productimage')->result();
					            
					        $product_image1=trim($product_image[0]->product_image,",");
                                    
                                    
                                    
                                    ?>
                                  <div class="no" style="border:1px solid grey">
                                         <?php echo $val2->product_name;?>

                                  </div>
                                  <div class="image" style="border:1px solid grey;padding:5%">
                                            <img style="height:80px;width:120px" src="<?=base_url('webroot/adminImages/product_image/'.$product_image1.'')?>"></img>

                                  </div>
                                  <div class="product" style="border:1px solid grey">
                                          
                                        <?php echo $val2->product_sale_price;?>
                                  </div>
                                    <div class="order_cancellatiion" style="border:1px solid grey">
                                          <?php echo $val2->product_qty;?>

                                    </div>
                                   <div class="order_track" style="border:1px solid grey">
                                          <a href="<?=base_url('order-tracking/'.$order_id)?>">Tracking</a>

                                    </div>
                                    
                                    <div class="cancellatiion" style="border:1px solid grey">
                        <p style="color: red;display: none;" id="cancel_msg<?php echo $val2->id;?>"><b>Order Has Been Cancel</b></p><p style="color: red;"></p>  
                        <?php if($val2->delivery_status=="Cancel"){?>       
                        <p style="color: red;" id="cancel_msg<?php echo $val2->id;?>"><b>Order Has Been Cancel</b></p><p style="color: red;"><b>(<?php echo $val2->delivery_date;?>)</b></p>
                        <?php }else{?>
                        <button type="button" onclick="cancel_order('<?php echo $val2->id;?>');" style="border:none;color:red;"><b>Cancel</b></button>
                        <?php }?>
                                        
                                        <!--<button style="border:none">Cancel</button>-->
                                    </div>
                                    
                                    <?php }?>
                                    
                                    

                             </div>
  
                      </div>
                      <?php }?>
                      
              </div>
                  
                        
            </div>
            
            
    
    </div>
    

  </body>
  
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
  $("#pro_search").keyup(function(e){
  var search_pro=$("#pro_search").val();
  
  //var current_url=$('#current_url').val();
  var base_url=$('#base_url').val(); 

  //alert(current_url);
  $.ajax({
        url:base_url+'search',
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
  
  
  
  function selectProduct(x)
    {
        var abc=x;
        var res = abc.split("|");
        var name=res[0];
        var type=res[1];
        $("#pro_search").val(name);
        $("#name").val(type);
        $(".inp_dp").hide();
    }
  
</script>
<script>
    function cancel_order(x)
  {
      
    var cancel_order_id=x;
    var base_url=$('#base_url').val();

    $.ajax({
      url:base_url+'cancelorder',
      type: 'POST',
      data: {cancel_order_id:cancel_order_id},
      success:function(data) {
        //alert(data);
        if(data==1){
        $("#cancel_msg"+cancel_order_id).show();
        setTimeout(function() {
          location.reload();
          
        }, 1500);
      }
      },

  });

  }
</script>

   
