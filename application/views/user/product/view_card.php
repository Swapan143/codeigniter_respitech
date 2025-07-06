<?php
$currentURL = current_url();
$_SESSION['pro_url']=$currentURL;
              if (!isset($_COOKIE['shopping_cart']) || empty($_COOKIE['shopping_cart'])) {
    echo "world";
} else {
    echo "hello";


              
             $cookie_data = stripslashes($_COOKIE['shopping_cart']);
			 $cart_data = json_decode($cookie_data, true);
				
				//print_r($cart_data);
} 

?>

<style>
    .mndok{
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 999999;
}
.crtpoo{
    width: 300px;
    margin: 0 auto;
    background: #fff;
    padding: 25px 15px;
    margin-top: 15px;
    border-radius: 5px;
    text-align: center;
    box-shadow: 0 0 18px 0 rgb(0 0 0 / 6%);
}
.crtpoo h3{
    font-size: 18px;
    color: #333;
}
.crtpoo button{
    border: none;
    outline: none;
    background: #fa6bff;
    color: #fff;
    font-size: 14px;
    margin-top: 30px;
    padding: 10px 25px;
    border-radius: 5px;
    cursor: pointer;
}


/*-------------------empty cart-----------------*/
</style>


            <div class="mndok" id="sucess_msg" style="display:none;">
            <div class="crtpoo">
            <h3 style="color:green;">Cart Update Sucessfully</h3>
            <button>OK</button>
            </div>
            </div>
            
            
            <div class="mndok" id="del_msg" style="display:none;">
            <div class="crtpoo">
            <h3 style="color:red;">Item is removed from your Cart.</h3>
            <button>OK</button>
            </div>
            </div>




<body>

<div class="breadcrumb-area pt-35 pb-35 bg-gray-3">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <ul>
                <li>
                    <a href="<?=base_url('home')?>">Home</a>
                </li>
                <li class="active">Cart Page </li>
            </ul>
        </div>
    </div>
</div>

<?php 
              if (!isset($_COOKIE['shopping_cart']) || empty($_COOKIE['shopping_cart'])) {
   
} else {
   
             $cookie_data = stripslashes($_COOKIE['shopping_cart']);
				$cart_data = json_decode($cookie_data, true);
				
				
} 

		  ?>
              


<div class="cart-main-area pt-90 pb-100">
    <div class="container">
        <?php
        if(!empty($cart_data))
		  {
		  ?>
		  <h3 class="cart-page-title" style="text-align: center;">Your cart items</h3>
		  
		   <?php
		  }
		   ?>
        
        
        <div class="row">
            
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <form action="#">
                    
                    <?php 
              if (!isset($_COOKIE['shopping_cart']) || empty($_COOKIE['shopping_cart'])) {
    //echo "world";
} else {
   // echo "hello";


              
             $cookie_data = stripslashes($_COOKIE['shopping_cart']);
				$cart_data = json_decode($cookie_data, true);
				
				//print_r($cart_data);
} 

            if(!empty($cart_data))
		  {
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  ?>
                    
                    <div class="table-content table-responsive cart-table-content">
                        <table>
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Qty</th>
                                    <th>Subtotal</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php
        	                $cookie_data = stripslashes($_COOKIE['shopping_cart']);
            				$cart_data = json_decode($cookie_data, true);
            				$_SESSION['all_data']=$cart_data;
                            $product_ids = array();

        				        $sum=0;
                                foreach($cart_data as $val)
                               {
					            $qty=$val['item_quantity'];
					            
					            $price=$val['orginal_price'];
					            
					            $sum+=$price*$qty;
					            $product_stock=$val['product_stock'];
					            $item_id=$val['item_id'];
                                $product_ids[] = $item_id;
                                
        				
        				
        				    $this->db->where('id', $item_id);
                            $product_name=$this->db->get('tbl_product')->result();
                            
                            
                            $this->db->limit(1);
                            $this->db->where('product_id', $item_id);
                            $product_image=$this->db->get('tbl_productimage')->result();
					            
					        $product_image1=trim($product_image[0]->product_image,",");
        				
        				
							    ?>
							    
							    
							
                           <input type="hidden" name="product_stock" id="product_stock<?php echo $item_id;?>" value="<?php echo $product_stock;?>">
                           <input type="hidden" name="product_saleprice" id="product_saleprice<?php echo $item_id;?>" value="<?php echo $price;?>">
                            
                            
							    
							    
                                
                                <tr>
                                    <td class="product-thumbnail">
                                        <a href="#"><img style="height:70px" src="<?=base_url('webroot/adminImages/product_image/'.$product_image1.'')?>" alt=""></a>
                                    </td>
                                    <td class="product-name"><a href="#"><?php echo $product_name[0]->product_name;?></a></td>
                                    <td class="product-price-cart"><span class="amount">₹<?php echo $price;?></span></td>
                                    
                                    
                                    
                                    
                                    <td class="product-quantity">
                                        <div class="cart-plus-minus">
                                            <div class="dec qtybutton" onclick="decrement(<?php echo $item_id;?>);">-</div>
                                            <input class="cart-plus-minus-box" type="text" name="qtybutton" id="qtybutton<?php echo $item_id;?>" value="<?php echo $qty;?>">
                                        <div class="inc qtybutton" onclick="increment(<?php echo $item_id;?>);">+</div>
                                        
                                        </div>
                                    </td>
                                    
                                    
                                    
                                    
                                    
                                    
                                    <td class="product-subtotal">₹<?php echo $price*$qty;?></td>
                                    <td class="product-remove">
                                        <!--<a href="#"><i class="fa fa-pencil"></i></a>-->
                                        
                                        <a href="javascript:void(0)"><i class="fa fa-times" aria-hidden="true" onClick="remove_confirm12('<?php echo $item_id;?>');"></i></a>
                                        
                                        <!--<a href="#"><i class="fa fa-times"></i></a>-->
                                   </td>
                                </tr>
                                <?php }?>
                                
                                
                                
                                
                            </tbody>
                        </table>
                    </div>
                   
                    <div class="cart-main-area pt-30 pb-10">
                        <div class="container">
                        <h3 class="cart-page-title" style="text-align: center;">Recommended Product</h3>
                       
                        </div>
                    </div>
                    <div class="row flex-row-reverse">
                    
                        <div class="col-lg-12">
                            
                            <div class="shop-bottom-area mt-35">
                                <div class="tab-content jump">
                                    <div id="shop-1" class="tab-pane active">
                                        <div class="row" id="show_msgdjfjd">
                                            
                                            
                                                    <?php
                                        //$this->db->where('status', "Active");
                                        $this->db->where_in('recommended_id', $product_ids);
                                        $new_arival=$this->db->get('tbl_product')->result();
                                        foreach($new_arival as $valnew)
                                        {
                                        
                                            $product_name=$valnew->product_name;
                                            $product_id=$valnew->id;
                                        
                                        
                                            $product_name_re = str_replace(' ', '', $product_name);
                                            $product_string = preg_replace('/[^A-Za-z0-9\-]/', '-', $product_name_re);
                                        
                                        ?>
                                            
                                            
                                            <div class="col-xl-4 col-md-6 col-lg-6 col-sm-6">
                                                <div class="product-wrap mb-25 scroll-zoom">
                                                    <div class="product-img">
                                                        <a href="<?=base_url('book-product/details/1'.$product_name.'?proid='.$product_id.'&cid='.$valnew->catgegory_id)?>">
                                                <?php
                                                
                                                //$this->db->limit(2);
                                                $this->db->where('product_id', $valnew->id);
                                                $product_image=$this->db->get('tbl_productimage')->result();
                                                $x=1;
                                                foreach($product_image as $valimage){
                                                    $product_image=trim($valimage->product_image,",");
                                                    if($x==1){
                                                        $de="default";
                                                    }else {
                                                        $de="hover";
                                                    }
                                                ?>
                                                <img class="<?php echo $de;?>-img" src="<?=base_url('webroot/adminImages/product_image/'.$product_image.'')?>" alt="">
                                                
                                                
                                                <?php 
                                                $x++;
                                                }?>
                                            </a>
                                                        <?php if(isset($_SESSION['seller_font_user_id'])){?>
                                                        <span class="pink"><?php echo $valnew->seller_discount;?>%</span>
                                                        <?php } else {?>
                                                        <span class="pink"><?php echo $valnew->product_discount;?>%</span>
                                                        <?php }?>
                                                    </div>
                                                    <div class="product-content text-center">
                                                        <h3><a href="<?=base_url('book-product/details/1'.$product_string.'?proid='.$product_name.'&cid='.$valnew->catgegory_id)?>"><?php echo $new_arival_product_name[0]->product_name;?></a></h3>
                                                        <p><?php echo substr($valnew->product_description, 0, 30).' '.'...';?></p>
                                                    
                                                        <div class="product-price">
                                                            <?php if(isset($_SESSION['seller_font_user_id'])){?>
                                                            <span>₹ <?php echo $valnew->seller_discount_rate;?></span>
                                                            <span class="old">₹ <?php echo $valnew->seller_product_rate;?></span>
                                                            <?php } else {?>
                                                            <span>₹ <?php echo $valnew->product_discount_rate;?></span>
                                                            <span class="old">₹ <?php echo $valnew->sel_product_rate;?></span>
                                                            <?php }?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php }?>
                                        
                                        </div>
                                    </div>
                                    
                                </div>
                            
                            </div>
                        </div>
                        
                    </div>
                    
                    
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="cart-shiping-update-wrapper" style="display:flex;justify-content:center">
                                <div class="cart-shiping-update">
                                    <a href="<?=base_url('home')?>">Continue Shopping</a>
                                </div>
                                <!--<div class="cart-clear">
                                    <button>Update Shopping Cart</button>
                                    <a href="#">Clear Shopping Cart</a>
                                </div>-->
                            </div>
                        </div>
                    </div>
                </form>
                <div class="row ml-auto mr-auto"  >
                   
                    <div class="col-lg-8 ml-auto mr-auto" >
                         <div class="col-lg-6 col-md-6">
                        <div class="discount-code-wrapper">
                            <div class="title-wrap">
                               <h4 class="cart-bottom-title section-bg-gray">Use Coupon Code</h4> 
                            </div>
                            <div class="discount-code">
                                <p>Enter your coupon code if you have one.</p>
                                <form>
                                    <input type="text" required="" name="name">
                                    <button class="cart-btn-2" type="submit">Apply Coupon</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="grand-totall">
                            <div class="title-wrap">
                                <h4 class="cart-bottom-title section-bg-gary-cart">Cart Total</h4>
                            </div>
                            <h5>Total products <span>₹<?php echo $sum;?></span></h5>
                            <div class="total-shipping">
                                <h5>Total shipping</h5>
                                <ul>
                                    <li><input type="checkbox"> Standard <span>₹00.00</span></li>
                                    <li><input type="checkbox"> Express <span>₹00.00</span></li>
                                </ul>
                            </div>
                            <h4 class="grand-totall-title">Grand Total  <span>₹<?php echo $sum;?></span></h4>
                            <?php 
                            if(isset($_SESSION['font_user_id'])){?>
                            <a href="<?=base_url('cart-checkout')?>">Proceed to Checkout</a>
                            <?php } else {?>
                                <a href="<?=base_url('cart-checkout')?>">Proceed to Checkout</a>
                                <!--<a href="<?=base_url('user-login')?>">Proceed to Checkout</a>-->
                            <?php }?>
                        
                        </div>
                    </div>
                    </div>
                   
                     <?php } else {
                     
                     ?>
                    
                     <div class="container">
                         <div class="row" >
                             <div class="col-lg-5 ml-auto mr-auto" >
                                 <div class="empty_img" style="display:flex;justify-content:center">
                                     <img src="<?=base_url()?>webroot/user_panel/assets/img/logo/empty-cart.png" style="height:300px;width:350px">
                                     
                                 </div>
                                 <div class="empty_writing mt-10" style="display:flex;justify-content:center">
                                     <h4 style="color:grey">Oops!Your Cart Is Empty</h4>
                                     
                                 </div>
                                 
                                 <div class="cart-shiping-update-wrapper " style="display:flex;justify-content:center;padding-top:10px">
                                <div class="cart-shiping-update">
                                    <a href="<?=base_url('home')?>">Continue Shopping</a>
                                </div>
                                <!--<div class="cart-clear">
                                    <button>Update Shopping Cart</button>
                                    <a href="#">Clear Shopping Cart</a>
                                </div>-->
                    </div>
                                 
                                 
                             </div>
                         </div>
                     </div>
                   
				
                     
                     
                     <?php }
                     
                     ?>
                    
                    
                </div>
            </div>
            
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    /* var CartPlusMinus = $('.cart-plus-minus');
    CartPlusMinus.prepend('<div class="dec qtybutton">-</div>');
    CartPlusMinus.append('<div class="inc qtybutton">+</div>');*/
    /*$(".qtybutton").on("click", function() {
        
        
    
        var $button = $(this);
        
        var oldValue = $button.parent().find("input").val();
        if ($button.text() === "+") {
            var newVal = parseFloat(oldValue) + 1;
            alert(newVal);
        } else {
            // Don't allow decrementing below zero
            if (oldValue > 1) {
               
                var newVal = parseFloat(oldValue) - 1;
                 alert(newVal);
            } else {
                newVal = 1;
                
            }
        }
        $button.parent().find("input").val(newVal);
    });*/
    
    function decrement(x)
    {
        var current_url=$('#current_url').val();
        
        var product_stock=$("#product_stock"+x).val();
        var product_saleprice=$("#product_saleprice"+x).val();
        var pro_id=x;
        var card_value="update";
        var card_subtraction="subtraction";
        var drece=$("#qtybutton"+x).val();
        
        if (drece > 1) {
            
            
               
                var newVal = parseInt(drece) - 1;
            } else {
                newVal = 1;
                
            }
            
        $("#qtybutton"+x).val(newVal);
        var qty_new=$("#qtybutton"+x).val();
        $.ajax({
        url:current_url+'/add_tocard',
        type: 'POST',
        data: {product_id:pro_id,quentity:qty_new,product_saleprice:product_saleprice,product_stock:product_stock,card_value:card_value,card_subtraction:card_subtraction},
        success:function(data) {
			
           
           $("#sucess_msg").show();
                
                setTimeout(function() {
            location.reload();
        }, 1000);
            
        },

    });
        
        
        
        
        
    }
    
    
    function increment(x)
    {
        
        var current_url=$('#current_url').val();
        
        var product_stock=$("#product_stock"+x).val();
        var product_saleprice=$("#product_saleprice"+x).val();
        
         var card_value="update";
         var card_subtraction="addtion";
        
        var pro_id=x;
        
        var drece=$("#qtybutton"+x).val();
        var newVal = parseInt(drece) + 1;
        $("#qtybutton"+x).val(newVal);
        
        var qty_new=$("#qtybutton"+x).val();
        
        $.ajax({
        url:current_url+'/add_tocard',
        type: 'POST',
        data: {product_id:pro_id,quentity:qty_new,product_saleprice:product_saleprice,product_stock:product_stock,card_value:card_value,card_subtraction:card_subtraction},
        success:function(data) {
			
           
           if(data==1)
            {
                //alert("add to cart success");
                $("#sucess_msg").show();
                
                setTimeout(function() {
            location.reload();
        }, 1000);
            }
           
            
        },

    });
      
    }
</script>

<script>
    function remove_confirm12(x)
{
    //alert(x);
     var current_url=$('#current_url').val();
     //alert(current_url);
	var del_pro_id=x;
	$.ajax({
	    url:current_url+'/card_delete',
        type: 'POST',
        data: {del_pro_id:del_pro_id},
        success:function(data) {
            //alert(data);
			if(data=='1')
			{
				
				$("#del_msg").show();
				setTimeout(function() {
            location.reload();
        }, 1000);
			} 
            
        },

    });
}
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







