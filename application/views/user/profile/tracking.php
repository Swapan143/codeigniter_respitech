<?php
//print_r($product_resutl);
$tracking_status=$product_resutl[0]->delivery_status;



                  $order_date=$product_resutl[0]->order_date;
                  $ex=explode("-",$order_date);
                  $year=$ex[0];
                  $month=$ex[1];
                  $day=$ex[2];
                  
                  $monthName = date('M', mktime(0, 0, 0, $month, 10));
                  
                  $delivery_date=$product_resutl[0]->delivery_date;
                  $ex1=explode("-",$delivery_date);
                  $year1=$ex1[0];
                  $month1=$ex1[1];
                  $day1=$ex1[2];
                    $monthName1 = date('M', mktime(0, 0, 0, $month1, 10));
                    
                    
                    
                    
                    
              foreach($product_resutl as $val)
            {
                
                $order_id=$val->order_id;
                $order_date=$val->order_date;
                $product_sale_price=$val->product_sale_price;
                $product_qty=$val->product_qty;
                $total=$product_sale_price*$product_qty;
                $sum+=$total;
                
            }
      
                    
                    
                    
                    
                    
?>
<style>
.stepper-wrapper {
  margin-top: auto;
  display: flex;
  justify-content: space-between;
  margin-bottom: 20px;
}
.stepper-item {
  position: relative;
  display: flex;
  flex-direction: column;
  align-items: center;
  flex: 1;

  @media (max-width: 768px) {
    font-size: 12px;
  }
}

.stepper-item::before {
  position: absolute;
  content: "";
  border-bottom: 2px solid #ccc;
  width: 100%;
  top: 20px;
  left: -50%;
  z-index: 2;
}

.stepper-item::after {
  position: absolute;
  content: "";
  border-bottom: 2px solid #ccc;
  width: 100%;
  top: 20px;
  left: 50%;
  z-index: 2;
}

.stepper-item .step-counter {
  position: relative;
  z-index: 5;
  display: flex;
  justify-content: center;
  align-items: center;
  width: 40px;
  height: 40px;
  border-radius: 50%;
  background: #ccc;
  margin-bottom: 6px;
}

.stepper-item.active {
  font-weight: bold;
}

.stepper-item.completed .step-counter {
  background-color: #4bb543;
}

.stepper-item.completed::after {
  position: absolute;
  content: "";
  border-bottom: 2px solid #4bb543;
  width: 100%;
  top: 20px;
  left: 50%;
  z-index: 3;
}
.stepper-item.half::after {
  position: absolute;
  content: "";
  border-bottom: 2px solid #4bb543;
  width: 50%;
  top: 20px;
  left: 50%;
  z-index: 3;
}

.stepper-item:first-child::before {
  content: none;
}
.stepper-item:last-child::after {
  content: none;
}
</style>
<body>
<!-- completed/half -->
<div class="stepper-wrapper " style="margin-top:100px">
  <?php if($tracking_status=="Ordered"){?>
  <div class="stepper-item  completed half">
    <div class="step-counter"><i class="fa fa-user" aria-hidden="true"></i></div>
    <div class="step-name">Order Placed</div>
  </div>
  
  
  <div class="stepper-item">
    <div class="step-counter"><i class="fa fa-gift" aria-hidden="true"></i></div>
    <div class="step-name">Order Packed</div>
  </div>
  
  
  <div class="stepper-item ">
    <div class="step-counter"><i class="fa fa-truck" aria-hidden="true"></i></div>
    <div class="step-name">Shipped</div>
  </div>
  
  
  <div class="stepper-item ">
    <div class="step-counter"><i class="fa fa-check-circle" aria-hidden="true"></i></div>
    <div class="step-name">Delivered</div>
  </div>
  <?php }?>
  
  
  <?php if($tracking_status=="Packed"){?>
  <div class="stepper-item  completed ">
    <div class="step-counter"><i class="fa fa-user" aria-hidden="true"></i></div>
    <div class="step-name">Order Placed</div>
  </div>
  
  
  <div class="stepper-item completed half">
    <div class="step-counter"><i class="fa fa-gift" aria-hidden="true"></i></div>
    <div class="step-name">Order Packed</div>
  </div>
  
  
  <div class="stepper-item ">
    <div class="step-counter"><i class="fa fa-truck" aria-hidden="true"></i></div>
    <div class="step-name">Shipped</div>
  </div>
  
  
  <div class="stepper-item ">
    <div class="step-counter"><i class="fa fa-check-circle" aria-hidden="true"></i></div>
    <div class="step-name">Delivered</div>
  </div>
  <?php }?>
  
  <?php if($tracking_status=="Shipped"){?>
  <div class="stepper-item  completed">
    <div class="step-counter"><i class="fa fa-user" aria-hidden="true"></i></div>
    <div class="step-name">Order Placed</div>
  </div>
  
  
  <div class="stepper-item completed">
    <div class="step-counter"><i class="fa fa-gift" aria-hidden="true"></i></div>
    <div class="step-name">Order Packed</div>
  </div>
  
  
  <div class="stepper-item completed half">
    <div class="step-counter"><i class="fa fa-truck" aria-hidden="true"></i></div>
    <div class="step-name">Shipped</div>
  </div>
  
  
  <div class="stepper-item ">
    <div class="step-counter"><i class="fa fa-check-circle" aria-hidden="true"></i></div>
    <div class="step-name">Delivered</div>
  </div>
  <?php }?>
  
  
  <?php if($tracking_status=="Delivered"){?>
  <div class="stepper-item  completed">
    <div class="step-counter"><i class="fa fa-user" aria-hidden="true"></i></div>
    <div class="step-name">Order Placed</div>
  </div>
  
  
  <div class="stepper-item completed">
    <div class="step-counter"><i class="fa fa-gift" aria-hidden="true"></i></div>
    <div class="step-name">Order Packed</div>
  </div>
  
  
  <div class="stepper-item completed">
    <div class="step-counter"><i class="fa fa-truck" aria-hidden="true"></i></div>
    <div class="step-name">Shipped</div>
  </div>
  
  
  <div class="stepper-item completed">
    <div class="step-counter"><i class="fa fa-check-circle" aria-hidden="true"></i></div>
    <div class="step-name">Delivered</div>
  </div>
  <?php }?>
  
  
</div>

<div class="container">
  <div class="row mt-70 mb-50" >
   <div class="col-lg-9 col-12 d-flex">
      <!--<div class="col-lg-3 col-6">
        <div class="img" style="height:200px;width:100%;border:1px solid grey display:flex;justify-content:center">
        <img src="https://images.pexels.com/photos/326055/pexels-photo-326055.jpeg?auto=compress&cs=tinysrgb&w=600" style="height:150px ;width:80%"></img>

        </div>

      </div>-->
      <div class="col-lg-8 col-6" style="padding:3%">
            <div class="row">
              <h5 style="color:grey">Order Id:<?php echo $order_id;?></h5>
            </div>

            <!--<div class="row">
            <h5 style="color:grey">Order Date:</h5>
            </div>-->
            
            <div class="row">
            <h5 style="color:grey">Total:₹<?php echo $sum;?></h5>
            </div>

      </div>

    </div>
    
    <div class="col-lg-3" style="">
       <div class="row">
          <div class="col-lg-12" style="padding:10%">
            
            <?php if($tracking_status=="Ordered"){?>
            
            <row>
              <h5 style="font-weight:bold"><?php echo $tracking_status;?> on <?php echo $day;?>-<?php echo $monthName;?>-<?php echo $year;?></h5>
            </row>
            <?php } else {?>
            
            <row>
              <h5 style="font-weight:bold"><?php echo $tracking_status;?> on <?php echo $day1;?>-<?php echo $monthName1;?>-<?php echo $year1;?></h5>
            </row>
            <?php }?>
            <row>
              <h5 style="color:grey">Courier Name:ABC</h5>
            </row>
            <row>
              <h5 style="color:grey">Docket No:5478954</h5>
            </row>
            <row>
              <h5 style="color:grey">Website:WWW.ABC.COM</h5>
            </row>
            <row>
              <h5 style="color:grey">your order has been <?php echo $tracking_status;?></h5>
            </row>
          </div>
       </div>
       

   
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
