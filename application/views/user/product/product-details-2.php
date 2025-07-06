<?php
 $currentURL = current_url();
 $proid_id=$this->input->get('proid');
 $cid_id=$this->input->get('cid');
 $cur=$currentURL.'?proid='.$proid_id.'&cid='.$cid_id;
 $_SESSION['pro_url']=$cur;
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
.mini_cart{
    color:black;
    border:none;
    width:150px;
    height:50px;
}
.mini_cart:hover{
    background-color:#a749ff;
    color:white;
}
</style>


            <div class="mndok" style="display:none">
            <div class="crtpoo">
            <h3>Item added to Cart</h3>
            <button>OK</button>
            </div>
            </div>

                        <?php
                            foreach($result as $valnew)
                            {
                                $product_name=$valnew->product_name;
                                $product_name123=$product_name;
                               
                            }
                            $this->db->where('id', $valnew->catgegory_id);
                            $category_name=$this->db->get('tbl_category')->result();
                            $this->db->limit(1);

                            $this->db->where('product_id', $valnew->id);
                            $product_image=$this->db->get('tbl_productimage')->result();

                            foreach($product_image as $valimage)
                            {
                                $product_image1=trim($valimage->product_image,",");
                            }
                            $this->db->where('product_id', $product_name);
                            $product_stock=$this->db->get('tbl_total_stock')->result();
                                
                            ?>





<body>

<div class="breadcrumb-area pt-35 pb-35 bg-gray-3">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <ul>
                <li>
                    <a href="<?=base_url('home')?>">Home</a>
                </li>
                <li class="active"> Product Details </li>
            </ul>
        </div>
    </div>
</div>
<div class="shop-area pt-100 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-xl-7 col-lg-7 col-md-12">
                <div class="product-details-img mr-20 product-details-tab">
                    <div id="gallery" class="product-dec-slider-2">
                        
                        <?php
                            $this->db->where('product_id', $valnew->id);
                            $product_image=$this->db->get('tbl_productimage')->result();
                            foreach($product_image as $valimage)
                            {
                                ?>
                                <a data-image="<?=base_url('webroot/adminImages/product_image/'.$valimage->product_image.'')?>" data-zoom-image="<?=base_url('webroot/adminImages/product_image/'.$valimage->product_image.'')?>">
                                    <img src="<?=base_url('webroot/adminImages/product_image/'.$valimage->product_image.'')?>" alt="">
                                </a> 
                                <?php 
                            }
                            ?>
                    </div>
                    <div class="zoompro-wrap zoompro-2 pl-20">
                        <div class="zoompro-border zoompro-span">
                            <img class="zoompro" src="<?=base_url('webroot/adminImages/product_image/'.$product_image1.'')?>" data-zoom-image="<?=base_url('webroot/adminImages/product_image/'.$product_image1.'')?>" alt=""/>          
                            <?php if(isset($_SESSION['seller_font_user_id'])){?>
                            <span><?php echo $valnew->seller_discount;?>%</span>
                            <?php } else {?>
                            <span><?php echo $valnew->product_discount;?>%</span>
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-5 col-lg-5 col-md-12">
                <div class="product-details-content">
                
                    <br>
                    
                    <h2><?php echo $new_arival_product_name[0]->product_name;?></h2>
                    <div class="product-details-price">
                        <?php if(isset($_SESSION['seller_font_user_id'])){?>
                        <span>₹<?php echo $valnew->seller_discount_rate;?> </span>
                        <span class="old">₹<?php echo $valnew->seller_product_rate;?> </span>
                        <?php } else {?>
                        <span>₹<?php echo $valnew->product_discount_rate;?> </span>
                        <span class="old">₹<?php echo $valnew->sel_product_rate;?> </span>
                        <?php }?>
                    </div>
                    <div>
                        Product Name : <?php echo $product_name;?>
                    </div>    

                    Product Code : <?php echo $valnew->product_code;?>
                   
                    <p><?php echo $valnew->product_description;?></p>
                    
                    <div class="pro-details-quality">
                        
                        
                        <?php if(isset($_SESSION['seller_font_user_id'])){?>
                        <form method="post" id="" name="" class="">
                        <input type="hidden" name="product_id" id="product_id" value="<?php echo $proid_id;?>">
                        
                        <div class="main_addtocart" style="display:flex;align-items:center">
                        <div class="cart-plus-minus" style=" height:50px;">
                        <input class="cart-plus-minus-box" type="text" name="quentity" id="quentity" value="1">
                        </div>
                        <div class="pro-details-cart btn-hover">
                        <?php if($valnew->is_rent=="Yes"){?>
                                <button class="mini_cart" type="submit">Add To Rent</button>
                                <?php }?>
                        <button class="mini_cart" type="button"  onclick="seller_cart();">Add To Cart</button>
                        </div>
                        </div>
                        </form>
                        <?php } else {?>
                        
                            <form method="post" id="add_card" name="add_card" class="add_card">
                            <input type="hidden" name="product_id" id="product_id" value="<?php echo $proid_id;?>">
                            <input type="hidden" name="product_stock" id="product_stock" value="<?php echo $product_stock[0]->total_stock;?>">
                            <input type="hidden" name="product_saleprice" id="product_saleprice" value="<?php echo $valnew->product_discount_rate;?>">
                            
                            <input type="hidden" name="product_code" id="product_code" value="<?php echo $valnew->product_code;?>">
                            
                            
                            
                            <input type="hidden" name="card_value" id="card_value">
                            <input type="hidden" name="card_subtraction" id="card_subtraction">
                            <div class="main_addtocart" style="display:flex;align-items:center">
                            <div class="cart-plus-minus" style=" height:50px;">
                            <input class="cart-plus-minus-box" type="text" name="quentity" id="quentity" value="1">
                            </div>
                            <div class="pro-details-cart btn-hover">
                            <?php if($valnew->is_rent=="Yes"){?>
                                <button class="mini_cart" type="submit">Add To Rent</button>
                                <?php }?>
                                    
                              
                                <button class="mini_cart" type="submit">Add To Cart</button>
                            </div>
                            </div>
                            </form>
                            
                        <?php }?>
                        
                        <?php if(isset($_SESSION['seller_font_user_id'])){ }else {?>
                            <div class="pro-details-wishlist">
                            <p style="color:green;display:none;" id="sucess_whis"> Wishlist Sucess</p>
                            <p style="color:red;display:none;" id="remove_wish">Wishlist Remvoe Sucess</p>
                            <?php 
                            if(isset($_SESSION['font_user_id'])){
                            $user_id=$_SESSION['font_user_id'];
                            
                                    $this->db->where('user_id', $user_id);
                                    $this->db->where('product_id', $proid_id);
                                    $query = $this->db->get('tbl_wishlist');
                                    $cart_count = $query->num_rows();
                                    if($cart_count>0){
                                    ?>
                             
                            <button style="border:none;background:transparent" onclick=remove_wishlist('<?php echo $user_id;?>','<?php echo $product_name;?>');><i class="fa fa-heart-o" style="color:red;font-size:20px"></i></button>
                            <?php }else{?>
                            <button style="border:none;background:transparent" onclick=add_wishlist('<?php echo $user_id;?>','<?php echo $product_name;?>');><i class="fa fa-heart-o" style="color:black;font-size:20px"></i></button>
                            
                            <?php }}else{?>
                            <a style="color:black" href="<?=base_url('user-login')?>"><i class="fa fa-heart-o "></i></a>
                            <?php }?>
                            </div>
                            <?php }?>
                    </div>
                    
                    <div class="pro-details-meta">
                        <span>Categories :</span>
                        <ul>
                            <li><a href="#"><?php echo $category_name[0]->category_name;?></a></li>
                            
                        </ul>
                    </div>
                    
                        <div class="row">
                        <a href="<?=base_url('osa-book-for-sleep-test')?>" class="cmn_btn2 color_btn">Book for Sleep Test</a>
                            </div>
                            <div class="row">
                            <a href="<?=base_url('copd-book-for-sleep-test')?>" class="cmn_btn2 color_btn">Take a Free Consultation
                            </a>
                            </div>
                     
               
                </div>
            </div>
        </div>
    </div>
</div>


<div class="description-review-area pb-90">
    <div class="container">
        <div class="description-review-wrapper">
            <div class="description-review-topbar nav">
                <a data-toggle="tab" href="#des-details1">Additional information</a>
                <a class="active" data-toggle="tab" href="#des-details2">Description</a>
                <!--<a data-toggle="tab" href="#des-details3">Reviews (2)</a>-->
            </div>
            <div class="tab-content description-review-bottom">
                <div id="des-details2" class="tab-pane active">
                    <div class="product-description-wrapper">
                    <?php if($valnew->is_rent=="Yes"){?>
                        <p><?php echo $valnew->rent_dese;?></p>
                                <?php }else{?>
                                    <p><?php echo $valnew->product_description;?></p>
                                <?php }?>
                       
                        
                    </div>
                </div>
                <div id="des-details1" class="tab-pane ">
                    <div class="product-anotherinfo-wrapper">
                       <!-- --- -->

                       <div class="col-xl-7 col-lg-7 col-md-12">
                <div class="product-details-img mr-20 product-details-tab">
                <?php   
                    if($valnew->product_info_image){
                ?>  

                                    <?php   
                                        if($valnew->product_info_image_type=='image'){
                                     ?> 
                    <div class="">
                        <div class="">
                            <img class="zoompro" src="<?=base_url('webroot/adminImages/product_image/'.$valnew->product_info_image)?>"  alt=""  style="width:100%; height:400px;"/>          
                           
                        </div>
                    </div>

                    <?php   
                        }else{
                    ?>  
                    
                                <video width="320" height="240" controls>
                                                <source src="<?=base_url('webroot/adminImages/product_image/'.$valnew->product_info_image)?>" >
                                             </video>  



                     <?php   
                            }
                     ?>       


                    <?php   
                        }
                    ?> 
                </div>
            </div>


            <div class="col-lg-5 col-lg-5 col-md-12">
                <div class="product-details-content">
                
                    <br>
                   
                    <p><?php echo $valnew->product_description_info;?></p>
  
                </div>
            </div>


                       <!-- --- -->
                    </div>
                </div>
            
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<script>
	$('.add_card').submit(function(e){
	e.preventDefault();
	
    var current_url=$('#current_url').val();
    //alert(current_url);
	var formData = new FormData($(this)[0]);
	
	$.ajax({
        url:current_url+'/add_to_cart',
        type: 'POST',
        data: formData,
		async: false,
        cache: false,
        contentType: false,
        processData: false,
        success:function(data) {
            //alert(data);
            
            
            if(data==1)
            {
                //alert("add to cart success");
                $(".mndok").show();
            }
            
            
$("#mydiv").load(location.href + " #mydiv");
            
            
           
        },
    });
  }); 
    
</script>

<script>
    $(".mndok button").click(function(){
        location.reload();
      //$(".mndok").hide();
    });
</script>


<script>
    var CartPlusMinus = $('.cart-plus-minus');
    CartPlusMinus.prepend('<div class="dec qtybutton">-</div>');
    CartPlusMinus.append('<div class="inc qtybutton">+</div>');
    $(".qtybutton").on("click", function() {
        var $button = $(this);
        var oldValue = $button.parent().find("input").val();
        if ($button.text() === "+") {
            var newVal = parseFloat(oldValue) + 1;
            alert(newVal);
        } else {
            // Don't allow decrementing below zero
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 1;
                alert(newVal);
            }
        }
        $button.parent().find("input").val(newVal);
    });
</script>


<script>

$(document).ready(function(){
  
var countDownDate = new Date("mar 10, 2024").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

    // Get todays date and time
    var now = new Date().getTime();
    
    // Find the distance between now an the count down date
    var distance = countDownDate - now;
    
    // Time calculations for days, hours, minutes and seconds
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
    // Output the result in an element with id="demo"
    document.getElementById("demo").innerHTML = hours + "h "
    + minutes + "m " + seconds + "s ";
    
    // If the count down is over, write some text 
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "EXPIRED";
    }
}, 1000);
});



/*var timer2 = "60:01";
var interval = setInterval(function() {

  var timer = timer2.split(':');
  //by parsing integer, I avoid all extra string processing
  var minutes = parseInt(timer[0], 10);
  var seconds = parseInt(timer[1], 10);
  --seconds;
  minutes = (seconds < 0) ? --minutes : minutes;
  if (minutes < 0) clearInterval(interval);
  seconds = (seconds < 0) ? 59 : seconds;
  seconds = (seconds < 10) ? '0' + seconds : seconds;
  //minutes = (minutes < 10) ?  minutes : minutes;
  $('.countdown').html(minutes + ':' + seconds);
  timer2 = minutes + ':' + seconds;
}, 1000);*/
</script>


<script>
    function add_wishlist(x,y)
  {
      
    var user_id=x;
    var product_id=y;
   

    var base_url=$('#base_url').val();
  
$.ajax({
        url:base_url+'wishlist',
        type: 'POST',
        data: {user_id:user_id,product_id:product_id},
        success:function(data) {
          alert(data);
          if(data==1){
         $("#sucess_whis").show();
         
         //$("#wish_msddddd_show").load(location.href + " #wish_msddddd_show");
         
         setTimeout(function() {
           location.reload();
        }, 1500); 
      } 
        },

    });

  }
  
  
  function remove_wishlist(x,y)
  {
    var user_id=x;
    var product_id=y;
    

    var base_url=$('#base_url').val();
  
$.ajax({
        url:base_url+'removewishlist',
        type: 'POST',
        data: {user_id:user_id,product_id:product_id},
        success:function(data) {
          alert(data);
          if(data==1){
        $("#remove_wish").show();
        
        //$("#wish_msddddd_show").load(location.href + " #wish_msddddd_show");
        
        
          setTimeout(function() {
         location.reload();
        }, 1500); 
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

<script>
    function seller_cart()
    {
        var product_id=$("#product_id").val();
        var quentity=$("#quentity").val();
        
        
        var base_url=$('#base_url').val();
        
        $.ajax({
        url:base_url+'seller_addcart',
        type: 'POST',
        data: {product_id:product_id,quentity:quentity},
        success:function(data) {
          //alert(data);
          
          if(data==1){
         $(".mndok").show();
         setTimeout(function() {
           location.reload();
        }, 1500); 
            } 
        },

        });
        
    }
</script>




