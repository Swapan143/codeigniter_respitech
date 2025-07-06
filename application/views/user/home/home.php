<?php
$currentURL = current_url();
$_SESSION['pro_url']=$currentURL;
?>
<style>
.carousel-control     		 { width:  4%; }
.carousel-control.left,.carousel-control.right {margin-left:15px;background-image:none;}
a.home_product_text h4 {
    background-color: rgba(0, 0, 0, 0.2);
    padding: 10px 0px;
    font-size: 20px;
}
.save-money-content{
    margin:0!important;
}
@media (max-width: 767px) {
	.carousel-inner .active.left { left: -100%; }
	.carousel-inner .next        { left:  100%; }
	.carousel-inner .prev		 { left: -100%; }
	.active > div { display:none; }
	.active > div:first-child { display:block; }

}
@media (min-width: 767px) and (max-width: 992px ) {
	.carousel-inner .active.left { left: -50%; }
	.carousel-inner .next        { left:  50%; }
	.carousel-inner .prev		 { left: -50%; }
	.active > div { display:none; }
	.active > div:first-child { display:block; }
	.active > div:first-child + div { display:block; }
}
@media (min-width: 992px ) {
	.carousel-inner .active.left { left: -16.7%; }
	.carousel-inner .next        { left:  16.7%; }
	.carousel-inner .prev		 { left: -16.7%; }	
}

  
@media only screen and (max-width: 2000px) and (min-width: 1100px) {
   .cat_row{
       display:flex;
       justify-content:center;
   }
   

}

@media only screen and (max-width: 400px) and (min-width: 300px) {
   /*.col_xs{*/
   /*    margin-left:70px;*/
   /*}*/
   

}
@media only screen and (max-width: 500px) and (min-width: 400px) {
   .col_xs{
       /*margin-left:90px;*/
   }
   

}
@media only screen and (max-width: 600px) and (min-width: 500px) {
   .col_xs{
       /*margin-left:160px;*/
   }
   

}
@media only screen and (max-width: 1050px) and (min-width: 1000px) {
   .col-sm-4{
     margin-right:30px;
   }
   

}



  </style>

<body>

<div class="slider-banner-area">
    <div class="container">
        <div class="row flex-row-reverse">
            <div class="col-lg-8 col-md-12">
                <div class="slider-area res-mrg-md-mb">
                    <div class="slider-active-3 owl-carousel owl-dot-style">
                    <?php foreach ($banner_data as $key => $value) {?>
                        <a href="<?=base_url('respitech-quiz')?>">
                        <div class="single-slider-2 slider-height-18 d-flex align-items-center bg-img slider-overly-res" style="background-image:url('<?=base_url('webroot/adminImages/banner_image/'.$value->images.'')?>');">
                            <div class="slider-content-7 slider-animated-1 ml-70">
                                <h3 class="animated"><?=$value->banner_name?></h3>
                                <!--<h1 class="animated">Book Shop <br>Find Your Book</h1>-->
                                <!--<div class="slider-btn-9 btn-hover">-->
                                <!--    <a class="animated" href="shop.html">SHOP NOW</a>-->
                                <!--</div>-->
                            </div>
                        </div>
                        </a>
                    <?php }?>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="row">
                    <div class="col-lg-12 col-md-6 col-sm-6">
                        <div class="single-banner mb-30">
                            <a href="#"><img src="<?=base_url()?>webroot/user_panel/assets/img/screen/screen1.png" alt=""></a>
                            <div class="banner-content banner-pink">
                                <!--<h3>OSA (Obstructive sleep apnea)</h3>-->
                                <!--<h4>Starting at <span>₹99.00</span></h4>-->
                                <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-6 col-sm-6">
                        <div class="single-banner mb-30">
                            <a href="#"><img src="<?=base_url()?>webroot/user_panel/assets/img/screen/screen3.png" alt=""></a>
                            <div class="banner-content banner-pink">
                                <!--<h3>COPD(Chronic Obstructive pulmonary(disease)</h3>-->
                                <!--<h4>Starting at <span>₹79.00</span></h4>-->
                                <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="support-area res-mrg-md-mt pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="support-wrap-3 support-bg-color-1 text-center mb-10">
                    <div class="support-icon-2">
                        <img class="animated" src="<?=base_url()?>webroot/user_panel/assets/img/icon-img/support-5.png" alt="">
                    </div>
                    <div class="support-content-3">
                       <div style="height:38px;"> <img src="<?=base_url()?>webroot/user_panel/assets/img/icon-img/support-8.png" alt=""></div>
                        <p>Free shipping on all order</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="support-wrap-3 support-bg-color-2 text-center mb-30">
                    <div class="support-icon-2">
                        <img class="animated" src="<?=base_url()?>webroot/user_panel/assets/img/icon-img/support-6.png" alt="">
                    </div>
                    <div class="support-content-3">
                       <div style="height:38px;"> <img src="<?=base_url()?>webroot/user_panel/assets/img/icon-img/support-9.png" alt=""></div>
                        <!--<p>Back guarantee under 5 days</p>-->
                        <p>
                           Book For Free Consultation
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="support-wrap-3 support-bg-color-3 text-center mb-30">
                    <div class="support-icon-2">
                        <img class="animated" src="<?=base_url()?>webroot/user_panel/assets/img/icon-img/support-7.png" alt="">
                    </div>
                    <div class="support-content-3">
                       <div style="height:38px;"> <img src="<?=base_url()?>webroot/user_panel/assets/img/icon-img/support-10.png" alt=""></div>
                        <!--<p>Onevery order over ₹150</p>-->
                        <p>Upto 15% on Every Order</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="category1">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center mb-30">
                <h3>Highly Recommended Trusted Devices & <br/>Test for the Treatment of....COPD & OSA</h3>
            </div>
        </div>
         <div class="row ">
        <div class="col-lg-12">
            <div class="row cat_row">
                
                <?php 
                // foreach($main_menu as $val){
                //     $category_image=trim($val->category_image,",");
                    
                //     $category_name=$val->category_name;
                //     $category_name_re = str_replace(' ', '', $category_name);
                //     $cate_string = preg_replace('/[^A-Za-z0-9\-]/', '-', $category_name_re);
                
                ?>
                <!-- <div class="col-lg-4 col-md-4 col-sm-4 col_xs col_mar "> 
                     <a href="<?=base_url('category/'.$cate_string.'?cid='.$val->id)?>">
                         <img src="<?=base_url('webroot/adminImages/category_image/'.$category_image.'')?>" style="width:100%;"></img>
                     </a>
                   
                    <div class="row">
                        <div class="col-lg-12 col-md-12"  style="text-align:center">
                           <a class="home_product_text" href="<?=base_url('category/'.$cate_string.'?cid='.$val->id)?>"><h4 style="height: 65px;"><?php echo $val->category_name;?></h4> </a>
                        </div>
                    </div>
                    
                </div> -->

             <!-- for statick start -->
                <div class="col-lg-4 col-md-4 col-sm-4 col_xs col_mar "> 
                     <a href="<?=base_url('osa')?>">
                         <img src="<?=base_url('webroot/adminImages/category_image/2014286950service2_img.jpg')?>" style="width:100%;"></img>
                     </a>
                   
                    <div class="row">
                        <div class="col-lg-12 col-md-12"  style="text-align:center">
                           <a class="home_product_text" href="<?=base_url('osa')?>"><h4 style="height: 65px;">OSA (Obstructive Sleep Apnea)</h4> </a>
                        </div>
                    </div>
                    
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col_xs col_mar "> 
                     <a href="<?=base_url('copd')?>">
                         <img src="<?=base_url('webroot/adminImages/category_image/1509919191service1_img.jpg')?>" style="width:100%;"></img>
                     </a>
                   
                    <div class="row">
                        <div class="col-lg-12 col-md-12"  style="text-align:center">
                           <a class="home_product_text" href="<?=base_url('copd')?>"><h4 style="height: 65px;">COPD(Chronic Obstructive Pulmonary Disease )</h4> </a>
                        </div>
                    </div>
                    
                </div>
                 <!-- statik end        -->

        
                <?php 
    
                // }
                ?>
      
            </div>
        </div>
    </div>
        
    </div>
   
</div>





<div class="save-money-area pt-50 mt-5">
    <div class="container">
        <div class="bg-img">
            <img style="max-width:100%" src="<?=base_url()?>webroot/user_panel/assets/img/bg/mid_banner.jpg"
            <div class="save-money-content">
                <!--<h2>Shop and save money</h2>-->
                <!--<div class="save-money-btn">-->
                <!--    <a href="#">Buy ₹97.09</a>-->
                <!--</div>-->
            </div>
        </div>
    </div>
</div>

<div class="product-area pt-50 pb-40">
    <div class="container">
        <div class="section-title-5 text-center">
            <h3>Products & Accessories available 
            <br/>for Sale & on Rental Basis...</h3>
        </div>
        <div class="product-slider-active-2 owl-carousel">
            
            <?php
                    //$this->db->where('best_sale', "Yes");
                    $this->db->order_by("id", "desc");
                    $new_arival=$this->db->get('tbl_product')->result();
                    foreach($new_arival as $valnew)
                    {
                        $product_name=$valnew->product_name;
                        $product_id=$valnew->id;
                    
                    
                        $product_name_re = str_replace(' ', '', $product_name);
                        $product_name_re = str_replace('(', '', $product_name_re);
                        $product_name_re = str_replace(')', '', $product_name_re);
                           
                        $product_string = preg_replace('/[^A-Za-z0-9\-]/', '-', $product_name_re);
                    
                    ?>
            <div class="product-wrap-2">
                <div class="product-img">
                    <a href="<?=base_url('book-product/details/1'.$product_string.'?proid='.$product_id.'&cid='.$valnew->catgegory_id)?>">
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
                   <!-- <div class="product-action-2">
                        <a title="Add To Cart" href="#"><i class="fa fa-shopping-cart"></i></a>
                        <a title="Quick View" href="#" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-eye"></i></a>
                        <a title="Compare" href="#"><i class="fa fa-retweet"></i></a>
                    </div>-->
                </div>
                <div class="product-content-2">
                    <div class="title-price-wrap-2">
                        <h3><a href="<?=base_url('book-product/details/1'.$product_string.'?proid='.$product_name.'&cid='.$valnew->catgegory_id)?>"> <?php echo $new_arival_product_name[0]->product_name;?></a></h3>
                        <p><?php echo substr($valnew->product_description, 0, 30).' '.'...';?></p>
                        <div class="price-2">
                            <?php if(isset($_SESSION['seller_font_user_id'])){?>
                            <span>₹ <?php echo $valnew->seller_discount_rate;?></span>
                            <span class="old">₹ <?php echo $valnew->seller_product_rate;?></span>
                            <?php } else {?>
                            <span>₹ <?php echo $valnew->product_discount_rate;?></span>
                            <span class="old">₹ <?php echo $valnew->sel_product_rate;?></span>
                            <?php }?>
                        </div>
                    </div>
                    <div class="pro-wishlist-2">
                        
                    </div>
                </div>
            </div>
            <?php }?>
            
            
            <!--<div class="product-wrap-2">
                <div class="product-img">
                    <a href="product-details-2.html">
                        <img class="default-img" src="<?=base_url()?>webroot/user_panel/assets/img/product/hm18-pro-2.jpg" alt="">
                        <img class="hover-img" src="<?=base_url()?>webroot/user_panel/assets/img/product/hm18-pro-2.jpg" alt="">
                    </a>
                    <span class="purple">New</span>
                    <div class="product-action-2">
                        <a title="Add To Cart" href="#"><i class="fa fa-shopping-cart"></i></a>
                        <a title="Quick View" href="#" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-eye"></i></a>
                        <a title="Compare" href="#"><i class="fa fa-retweet"></i></a>
                    </div>
                </div>
                <div class="product-content-2">
                    <div class="title-price-wrap-2">
                        <h3><a href="product-details-2.html">Custard Apple</a></h3>
                        <div class="price-2">
                            <span>$ 40.00</span>
                        </div>
                    </div>
                    <div class="pro-wishlist-2">
                        <a title="Wishlist" href="wishlist.html"><i class="fa fa-heart-o"></i></a>
                    </div>
                </div>
            </div>
            <div class="product-wrap-2">
                <div class="product-img">
                    <a href="product-details-2.html">
                        <img class="default-img" src="<?=base_url()?>webroot/user_panel/assets/img/product/hm18-pro-3.jpg" alt="">
                        <img class="hover-img" src="<?=base_url()?>webroot/user_panel/assets/img/product/hm18-pro-3.jpg" alt="">
                    </a>
                    <span class="purple">New</span>
                    <div class="product-action-2">
                        <a title="Add To Cart" href="#"><i class="fa fa-shopping-cart"></i></a>
                        <a title="Quick View" href="#" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-eye"></i></a>
                        <a title="Compare" href="#"><i class="fa fa-retweet"></i></a>
                    </div>
                </div>
                <div class="product-content-2">
                    <div class="title-price-wrap-2">
                        <h3><a href="product-details-2.html">We Are Going Down</a></h3>
                        <div class="price-2">
                            <span>$ 70.00</span>
                        </div>
                    </div>
                    <div class="pro-wishlist-2">
                        <a title="Wishlist" href="wishlist.html"><i class="fa fa-heart-o"></i></a>
                    </div>
                </div>
            </div>
            <div class="product-wrap-2">
                <div class="product-img">
                    <a href="product-details-2.html">
                        <img class="default-img" src="<?=base_url()?>webroot/user_panel/assets/img/product/hm18-pro-4.jpg" alt="">
                        <img class="hover-img" src="<?=base_url()?>webroot/user_panel/assets/img/product/hm18-pro-4.jpg" alt="">
                    </a>
                    <span class="purple">New</span>
                    <div class="product-action-2">
                        <a title="Add To Cart" href="#"><i class="fa fa-shopping-cart"></i></a>
                        <a title="Quick View" href="#" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-eye"></i></a>
                        <a title="Compare" href="#"><i class="fa fa-retweet"></i></a>
                    </div>
                </div>
                <div class="product-content-2">
                    <div class="title-price-wrap-2">
                        <h3><a href="product-details-2.html">History of Moon</a></h3>
                        <div class="price-2">
                            <span>$ 30.00</span>
                        </div>
                    </div>
                    <div class="pro-wishlist-2">
                        <a title="Wishlist" href="wishlist.html"><i class="fa fa-heart-o"></i></a>
                    </div>
                </div>
            </div>
            <div class="product-wrap-2">
                <div class="product-img">
                    <a href="product-details-2.html">
                        <img class="default-img" src="<?=base_url()?>webroot/user_panel/assets/img/product/hm18-pro-2.jpg" alt="">
                        <img class="hover-img" src="<?=base_url()?>webroot/user_panel/assets/img/product/hm18-pro-2.jpg" alt="">
                    </a>
                    <span class="purple">New</span>
                    <div class="product-action-2">
                        <a title="Add To Cart" href="#"><i class="fa fa-shopping-cart"></i></a>
                        <a title="Quick View" href="#" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-eye"></i></a>
                        <a title="Compare" href="#"><i class="fa fa-retweet"></i></a>
                    </div>
                </div>
                <div class="product-content-2">
                    <div class="title-price-wrap-2">
                        <h3><a href="product-details-2.html">Tour Gide for Africa </a></h3>
                        <div class="price-2">
                            <span>$ 40.00</span>
                        </div>
                    </div>
                    <div class="pro-wishlist-2">
                        <a title="Wishlist" href="wishlist.html"><i class="fa fa-heart-o"></i></a>
                    </div>
                </div>
            </div>-->
        </div>
    </div>
</div>

<div class="brand-logo-area">
    <div class="container">
       <img style="max-width:100%" src="<?=base_url()?>webroot/user_panel/assets/img/bg/banner5.jpg">
    </div>
</div>



<!-- Modal -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="/path/to/cdn/bootstrap.bundle.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script>
    $(document).ready(function(){
$('.carousel[data-type="multi"] .item').each(function(){
  var next = $(this).next();
  if (!next.length) {
    next = $(this).siblings(':first');
  }
  next.children(':first-child').clone().appendTo($(this));
  
  for (var i=0;i<4;i++) {
    next=next.next();
    if (!next.length) {
        next = $(this).siblings(':first');
  	}
    
    next.children(':first-child').clone().appendTo($(this));
  }
});
});
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




</body>

</html>