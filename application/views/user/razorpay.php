<?php 

                                                $total_amount=0;
                                                foreach ($card_value as  $value) 
                                                { 
                                                    $product_id=$value->product_id;
                                                    $product_features_id=$value->product_features_id;
                                                    $size=$value->size;
                                                    $this->db->where('uniqcode', $product_id);
                                                    $product=$this->db->get('tbl_product')->result();

                                                    foreach ($product as  $value_pro) 
                                                    { 
                                                    }
                                                    $this->db->where('product_features_id', $product_features_id);
                                                    $product_rate=$this->db->get('tbl_total_stock')->result();

                                                    foreach ($product_rate as  $value_pro_rate) 
                                                    { 
                                             
                                                    }

                                                    

                                                    $amount=(int)$value_pro_rate->sell_price*$value->quantity;
                                                    $total_amount +=(int)$amount;
                                                }
                                               // echo $total_amount;

                                                 //echo $paisa=$total_amount*100;


                               $user_id=$this->session->userdata('loginDetail')->uniqcode;

                            $this->db->where('uniqcode', $user_id);
                            $user_details=$this->db->get('tbl_users')->result();

                                   foreach ($user_details as  $value_user) 
                                                    { 
                                             
                                                    }

                                                
                                           
?>




<!DOCTYPE html>
<html>
<title>HTML Tutorial</title>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
</head>
<!--
<?php 
              
              $sum='0';
              foreach($result12 as $val)
              {
                  
                  $pro_discount_price=$val->pro_discount_price;
                  
                  $qty=$val->qty;
                  $total=$pro_discount_price*$qty;
                  
                  
                  $sum+=(int)$total;

                  
              }
              
              $paisa=$sum*100;
              
              
              
              ?>

-->

<body onLoad="doSubmit();">






<form method="GET" action="https://api.razorpay.com/v1/checkout/embedded" id="doPay">
  <input type="hidden" name="key_id" value="rzp_test_RF41zBkiJWVOA9">
  <!--<input type="hidden" name="order_id" value="razorpay_order_id">-->
  <input type="text" name="name" value="<?php echo $value_user->name;?>">
  <input type="hidden" name="amount" value="<?php echo $total_amount*100;?>">
  <input type="hidden" name="method" value="netbanking">
  <input type="hidden" name="currency" value="INR">
  <input type="hidden" name="description" value="Grosery">
  <input type="hidden" name="image" value="http://localhost/bong_grocery/webroot/user_panel/assets/img/logo/logo.png">
  <input type="hidden" name="prefill[name]" value="<?php echo $value_user->name;?>">
  <input type="text" name="prefill[contact]" value="<?php echo $value_user->mobile_no ;?>">
  <input type="text" name="prefill[email]" value="<?php echo $value_user->email ;?>">
  <!--<input type="hidden" name="notes[shipping address]" value="L-16, The Business Centre, 61 Wellfield Road, New Delhi - 110001">-->
  <input type="hidden" name="callback_url" value="http://localhost/bong_grocery/order-sucess/">
  <!--<input type="hidden" name="cancel_url" value="https://dreamplanetmedia.com/dreamplanet/razorpay/cancel">-->
  <input type="submit" value="Submit">
</form>



	<script type="text/javascript">
/*function doSubmit()
{
	$("#doPay").submit();
}*/
</script>

</body>
</html>