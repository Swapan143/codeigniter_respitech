
<body>

<div class="breadcrumb-area pt-35 pb-35 bg-gray-3">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <ul>
                <li>
                    <a href="">Home</a>
                </li>
                <li class="active">Checkout </li>
            </ul>
        </div>
    </div>
</div>
<div class="checkout-area pt-95 pb-100">
    <div class="container">
        <div class="row">
        <form method="post" enctype="multipart/form-data" action="<?=base_url('cart-checkout/confirm_order')?>">
            <div class="col-lg-7">
                <div class="billing-info-wrap">
                    <h3>Billing Details</h3>
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="billing-info mb-20">
                                <label>Name</label>
                                <input type="text" id="bill_name" name="bill_name"  value="<?php echo $_SESSION['user_name'];?>" required>
                                
                                <input type="hidden" id="user_id" name="user_id" value="<?php echo $_SESSION['font_user_id'];?>">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="billing-info mb-20">
                                <label>Mobile No</label>
                                <input type="text"  id="bill_mobile" name="bill_mobile"  value="<?php echo $_SESSION['user_mobile'];?>" required>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="billing-info mb-20">
                                <label>Company Name</label>
                                <input type="text" id="bill_company" name="bill_company">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="billing-select mb-20">
                                <label>Country</label>
                                <select id="bill_country" name="bill_country" required>
                                    <option value="India">India</option>
                                    
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="billing-info mb-20">
                                <label>Street Address</label><span style="color:red;">*</span>
                                <input class="billing-address" placeholder="House number and street name" type="text" id="bill_street" name="bill_street" required>
                                <p style="color:red; display:none;" id="street_address_msg">Your Street Address</p>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="billing-info mb-20">
                                <label>Town / City</label><span style="color:red;">*</span>
                                <input type="text" id="bill_town" name="bill_town" required>
                                <p style="color:red; display:none;" id="town_city_msg">Your Town / City Name</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="billing-info mb-20">
                                <label>State</label><span style="color:red;">*</span>
                                <input type="text" id="bill_state" name="bill_state" required>
                                <p style="color:red; display:none;" id="state_msg">Your State Name</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="billing-info mb-20">
                                <label>Postcode / ZIP</label><span style="color:red;">*</span>
                                <input type="text" id="bill_zip" name="bill_zip" required>
                                <p style="color:red; display:none;" id="zip_msg">Your Zip Code</p>
                            </div>
                        </div>
                        
                        <div class="col-lg-6 col-md-6">
                            <div class="billing-info mb-20">
                                <label>Email Address</label>
                                <input type="text" id="bill_email" name="bill_email"  value="<?php echo $_SESSION['user_email'];?>">
                                
                            </div>
                        </div>
                    </div>
                   
                   <!--<input type="checkbox" id="same_address" name="">
                                <label for="vehicle1">If Permanent Address Same as Present Address</label>-->
                                
                    <div class="checkout-account mt-25">
                        <input class="checkout-toggle" type="checkbox" id="same_address">
                        <span>Billing Address Same as Delivery address?</span>
                    </div>
                    <div class="different-address open-toggle mt-30">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="billing-info mb-20">
                                    <label>Name</label>
                                    <input type="text" id="deli_name" name="deli_name">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                            <div class="billing-info mb-20">
                                <label>Mobile No</label>
                                <input type="text" id="deli_mobile" name="deli_mobile">
                            </div>
                        </div>
                            <div class="col-lg-12">
                                <div class="billing-info mb-20">
                                    <label>Company Name</label>
                                    <input type="text" id="deli_company" name="deli_company">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="billing-select mb-20">
                                    <label>Country</label>
                                    <select  id="deli_country" name="deli_country">
                                        
                                        <option>India</option>
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="billing-info mb-20">
                                    <label>Street Address</label>
                                    <input class="billing-address" placeholder="House number and street name" type="text" id="deli_street" name="deli_street">
                                    
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="billing-info mb-20">
                                    <label>Town / City</label>
                                    <input type="text" id="deli_town" name="deli_town">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="billing-info mb-20">
                                    <label>State</label>
                                    <input type="text" id="deli_state" name="deli_state">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="billing-info mb-20">
                                    <label>Postcode / ZIP</label>
                                    <input type="text" id="deli_zip" name="deli_zip">
                                </div>
                            </div>
                            
                            <div class="col-lg-6 col-md-6">
                                <div class="billing-info mb-20">
                                    <label>Email Address</label>
                                    <input type="text" id="deli_email" name="deli_email">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="your-order-area">
                    <h3>Your order</h3>
                    <div class="your-order-wrap gray-bg-4">
                        <div class="your-order-product-info">
                            <div class="your-order-top">
                                <ul>
                                    
                                    <li>Image</li>
                                    <li>qty</li>
                                    <li>price</li>
                                    <li>Total</li>
                                </ul>
                            </div>
                            <div class="your-order-middle">
                                <ul>
                                    
                                    <?php 
                                   $cookie_data = stripslashes($_COOKIE['shopping_cart']);
            				      $cart_data = json_decode($cookie_data, true);
        				            $_SESSION['all_data123']=$cart_data;
        				        $sum=0;
                                foreach($cart_data as $val)
                               {
                                
					            $qty=$val['item_quantity'];
					            
					            $price=$val['orginal_price'];
					            
					            $sum+=$price*$qty;
					            $product_stock=$val['product_stock'];
					            $item_id=$val['item_id'];
        				
        				
        				
        				    $this->db->where('id', $item_id);
                            $product_name=$this->db->get('tbl_byuerproduct')->result();
                            
                            
                            $this->db->limit(1);
                            $this->db->where('product_id', $item_id);
                            $product_image=$this->db->get('tbl_productimage')->result();
					            
					        $product_image1=trim($product_image[0]->product_image,",");
        				
        				
							    ?>
                                    
                                    
                                    <li><img src="<?=base_url('webroot/adminImages/product_image/'.$product_image1.'')?>" style="width: 50px;"></img> <span class="order-middle-left"><?php echo $qty;?></span> <span class="order-middle-left"><?php echo $price;?></span> <span class="order-price">₹<?php echo $price*$qty;?> </span></li>
                                    <?php }?>
                                </ul>
                            </div>
                            <div class="your-order-bottom">
                                <ul>
                                    <li class="your-order-shipping">Shipping</li>
                                    <li>Free shipping</li>
                                </ul>
                            </div>
                            <div class="your-order-total">
                                <ul>
                                    <li class="order-total">Total</li>
                                    <li>₹<?php echo $sum;?></li>
                                </ul>
                            </div>
                        </div>
                        
                       
                    </div>
                    <div class="different-address open-toggle mt-30">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                            <input type="hidden" id="pay_met" name="pay_met" value="cash">

                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" onclick="paymentMethode('cash')" checked style="height:22px !important;">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Cash On Delivery
                            </label>
                            </div>
                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" onclick="paymentMethode('online')" style="height:22px !important;">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Online Payment
                            </label>
                            </div>
                        </div>
                            </div>
                    </div>
                    <div class="Place-order mt-25" id="qr_code_img" style="display:none">
                        <img src="<?=base_url('webroot/user_panel/assets/img/payment_qr.jpeg')?>" alt="" 
                        style="height: 375px;width: 100%;object-fit: cover;">
                    </div>
                    <div class="different-address open-toggle mt-30" id="payment_recp" style="display:none">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="billing-info mb-20">
                                    <label>Upload your payment Screen Shot</label>
                                    <input type="file" id="payment_doc" name="payment_doc">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="Place-order mt-25">
                        <!--a  href="#">Confirm Order</a-->
                        <button class="btn-hover" type="submit">Confirm Order</button>
                    </div>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>

<?php 
//print_r($_SESSION['all_data123']);
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
     $("#same_address").change(function() {
                    var ischecked= $(this).is(':checked');
                    if(!ischecked)
                    {
                        
                        $("#deli_name").val('');
                        $("#deli_mobile").val('');
                        $("#deli_company").val('');
                        
                        $('#deli_street').val('');
                        $('#deli_town').val('');
                        $('#deli_state').val('');
                        $('#deli_zip').val('');
                        $('#deli_email').val('');
                    }else {
                        
                        var bill_name=$("#bill_name").val();
                        var bill_mobile=$("#bill_mobile").val();
                        var bill_company=$("#bill_company").val();
                        
                        var bill_country=$("#bill_country").val();
                        var bill_street=$("#bill_street").val();
                        
                        var bill_town=$("#bill_town").val();
                        var bill_state=$("#bill_state").val();
                        var bill_zip=$("#bill_zip").val();
                        var bill_email=$("#bill_email").val();
                        
                        
                        
                        $("#deli_name").val(bill_name);
                        $("#deli_mobile").val(bill_mobile);
                        $("#deli_company").val(bill_company);
                        
                        
                        $('#deli_street').val(bill_street);
                        $('#deli_town').val(bill_town);
                        $('#deli_state').val(bill_state);
                        $('#deli_zip').val(bill_zip);
                        $('#deli_email').val(bill_email);
                        
                        
                        
                    }
                      
                }); 
 </script>

<script>
function paymentMethode(paymentType)
{
    if(paymentType == "cash")
    {
        $("#pay_met").val('cash');
        $("#qr_code_img").hide();
        $("#payment_recp").hide();
    }
    else
    {
        $("#pay_met").val('online');
        $("#qr_code_img").show();
        $("#payment_recp").show();
        
       
    }
}
/*function order_confirm()
{
    var current_url=$('#current_url').val();
    
    var user_id=$("#user_id").val();
    
    var bill_name=$("#bill_name").val();
    var bill_mobile=$("#bill_mobile").val();
    var bill_company=$("#bill_company").val();
    var bill_country=$("#bill_country").val();
    var bill_street=$("#bill_street").val();
    var bill_town=$("#bill_town").val();
    var bill_state=$("#bill_state").val();
    var bill_zip=$("#bill_zip").val();
    var bill_email=$("#bill_email").val();
    
    
    var deli_name=$("#deli_name").val();
    var deli_mobile=$("#deli_mobile").val();
    var deli_company=$("#deli_company").val();
    var deli_street=$('#deli_street').val();
    var deli_town=$('#deli_town').val();
    var deli_state=$('#deli_state').val();
    var deli_zip=$('#deli_zip').val();
    var deli_email=$('#deli_email').val();
    
    
    
    if(bill_street=="")
    {
        $("#street_address_msg").show();
        setTimeout(function(){ 
        $("#street_address_msg").hide();
        }, 3000);
        
        return true;
    }
    
    if(bill_town=="")
    {
        $("#town_city_msg").show();
        setTimeout(function(){ 
        $("#town_city_msg").hide();
        }, 3000);
        
        return true;
    }

    if(bill_state=="")
    {
        $("#state_msg").show();
        setTimeout(function(){ 
        $("#state_msg").hide();
        }, 3000);
        
        return true;
    }
    
    if(bill_zip=="")
    {
        $("#zip_msg").show();
        setTimeout(function(){ 
        $("#zip_msg").hide();
        }, 3000);
        
        return true;
    }

    var paymentType=$("#pay_met").val();
    if(paymentType == "cash")
    {
        var pay_method="COD";
        var payment_status="Unpaid";
        var paymentdoc ='';
    }
    else
    {
        var pay_method="ONLINE";
        var payment_status="Paid";
        var fileInput = document.getElementById('payment_doc');
        var paymentdoc = fileInput.files[0];
        if (paymentdoc) {
            var formData = new FormData();
            formData.append('payment_doc', paymentdoc);
        }
    }
    console.log("+++++",paymentdoc);
    
    
    $.ajax({
    url:current_url+'/confirm_order',
    type: 'POST',
    data: {user_id:user_id,bill_name:bill_name,bill_mobile:bill_mobile,bill_company:bill_company,bill_country:bill_country,bill_street:bill_street,bill_town:bill_town,
        bill_state:bill_state,bill_zip:bill_zip,bill_email:bill_email,deli_name:deli_name,deli_mobile:deli_mobile,deli_company:deli_company,
        deli_street:deli_street,deli_town:deli_town,deli_state:deli_state,deli_zip:deli_zip,deli_email:deli_email,pay_method:pay_method,payment_status:payment_status,paymentdoc:formData},
    success:function(data) {
        //alert(data);
        window.location.href = "https://respitech.co.in/card_delete_all";
    },
});
                    
}*/
</script>




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







