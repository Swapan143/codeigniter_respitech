

<?php 
$order_id=$_SESSION['order_id'];
$this->db->where('order_id', $order_id);
$order_details=$this->db->get('tbl_order')->result();
//print_r($order_details);
$sum=0;
foreach($order_details as $val)
{
    $order_id=$val->order_id;
    $order_date=$val->order_date;
    
    $product_sale_price=$val->product_sale_price;
    $product_qty=$val->product_qty;
    $total=$product_sale_price*$product_qty;
    
    
    $sum+=$total;
    
    
            $ex=explode("-",$order_date);
              $year=$ex[0];
              $month=$ex[1];
              $day=$ex[2];
              
              $monthName = date('M', mktime(0, 0, 0, $month, 10));
              
    
    
    
}

?>

       <div class="main_wrapper" style="display:flex;align-items:center;justify-content:center;width:100%">
            <div class="main_success" style="height:40%;;padding:1%">
                <div class="row1" style="display:flex;justify-content:center;align-items:center;font-weight:bold">
                    Your order has been placed
                </div>
                <div class="row2" style="display:flex;justify-content:center;align-items:center;font-weight:bold">
                    Order Details
                </div>
                <div class="content" >
                    <h6 style="line-height:4rem"><span style="font-weight:bold">order id</span> &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;:&ensp;&ensp;&ensp;&ensp; <?php echo $order_id;?></h6>
                    <h6 style="line-height:4rem"><span style="font-weight:bold">order date</span> &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;:&ensp;&ensp;&ensp;&ensp;<?php echo $day;?>-<?php echo $monthName;?>-<?php echo $year;?></h6>
                    <h6 style="line-height:4rem"><span style="font-weight:bold">order total</span> &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;:&ensp;&ensp;&ensp;&ensp;₹<?php echo $sum;?></h6>
                    <h6 style="line-height:4rem"><span style="font-weight:bold">payment method</span> &ensp;:&ensp;&ensp;&ensp;&ensp;Cash On Delivery</h6>
                    <h6 style="line-height:4rem"><span style="font-weight:bold">payment status</span>&ensp;&ensp;&ensp;:&ensp;&ensp;&ensp;&ensp;Unpaid</h6>
                    <h6 style="line-height:4rem"><span style="font-weight:bold">txn id</span>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp; &ensp;&ensp;&ensp;:&ensp;&ensp;&ensp;&ensp;<?php echo $val->tranction_id;?> </h6>
                    
                    
                </div>
                <div class="button" style="display:flex;justify-content:center;align-items:center; ">
                    <a href="<?=base_url('order-details/'.$val->order_id)?>" style="border:none;border-radius:50px;background-color: #a749ff;margin-top:50px;color:white;padding:3%;margin-bottom:50px">View Order Details</a>
                    
                    <!--<button style="border:none;background-color: #fa6bff;color:white"> View Order Details</button>-->
                </div>
            </div>
        </div>
        
        
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
    
    

