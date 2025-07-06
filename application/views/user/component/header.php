<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Respitech</title>
   
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="">
     <link rel="icon" type="image/x-icon" href="fav.png">
    
    <!-- CSS
	============================================ -->
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
   
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?=base_url()?>webroot/user_panel/assets/css/bootstrap.min.css">
    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="<?=base_url()?>webroot/user_panel/assets/css/icons.min.css">
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="<?=base_url()?>webroot/user_panel/assets/css/plugins.css">
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="<?=base_url()?>webroot/user_panel/assets/css/style.css">
    <!-- Modernizer JS -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link href='<?=base_url()?>webroot/admin/css/validationEngine.jquery.css' rel="stylesheet">

     <!-- Toastr style -->
     <link href="<?=base_url()?>webroot/admin/css/plugins/toastr/toastr.min.css" rel="stylesheet">
    
    <!------------------------------------------------------>
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/eschool.jpg">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    
   <style>
       .right_fixed {
  position: fixed;
  right: 0;
  top: 100px;
  background: #84007e;
 border-radius: 10px 0px 0px 10px;
  z-index: 2;
}
       .right_fixed_col {
   text-align: center;
    width: 100px;
    border-bottom: 1px solid #fff;
    padding: 8px 5px;
       }
       .right_fixed_col.brder_0{
           border:none;
       }
       .right_fixed_col p{
               line-height: 15px;
    color: #fff;
    font-size: 12px;
       }
       .right_fixed_col a{
           display:block;
       }
       
       .right_fixed_col_icon {
    background: #fff;
    display: inline-block;
    width: 40px;
    height: 40px;
    line-height: 40px;
    border-radius: 50px;
    margin-bottom: 5px;
}
.right_fixed_col:hover .right_fixed_col_icon {
    background: #0ab2bc;
}
.top_punchline{
       background: #01606e;
       text-align:center;
       padding:10px 0;
       
}
.top_punchline p{
    color:#fff;
    margin-bottom:0;
    font-size: 16px;
    font-family: "Poppins", sans-serif;
}
@media(max-width:992px){
    .right_fixed_col {
  width: 75px;
  padding: 8px 0px;
}
.right_fixed_col p {
  line-height: 12px;
  color: #fff;
  font-size: 10px;
}
}
   </style>

</head>
<body>
    <?php
        if($this->session->flashdata('success')){
        $this->load->view('admin/msg/success');
        }
        if($this->session->flashdata('error')){
        $this->load->view('admin/msg/error');
        }
    ?>
    <div class="top_punchline">
        <p><strong>"Dream Deep, Breathe Better –</strong>
Your Gateway to Restful Nights and Refreshed Mornings."</p>
    </div>
    <header class="header-area header-in-container clearfix d-print-none">
        
    <div class="header-top-area">
        <div class="container">
            <div class="header-top-wap">
                <div class="language-currency-wrap">
                    <div class="same-language-currency language-style">
                        <a href="#"><strong>Email:contact@respitech.co.in </strong></a>
                        
                    </div>
                   
                    <div class="same-language-currency">
                        <p><strong>Call Us +91 9709159756 | 7004745326</strong></p>
                    </div>
                </div>
                <div class="header-offer">
                    <a href="<?=base_url('osa-book-for-sleep-test')?>" class="cmn_btn2 color_btn">Book for Sleep Test</a> <a href="<?=base_url('copd-book-for-sleep-test')?>" class="cmn_btn2 color_btn">Take a Free Consultation
</a>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom sticky-bar header-res-padding">
        <div class="container">
            <div class="row">
                <div class="col-xl-2 col-lg-2 col-md-6 col-4">
                    <div class="logo">
                        <a href="<?=base_url('home')?>">
                            <img style="width:200px" alt="" src="<?=base_url()?>webroot/admin/images/logo.png">
                        </a>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-8 d-none d-lg-block">
                    <div class="main-menu">
                        <nav>
                            <ul>
                                <li><a href="<?=base_url('home')?>">Home </a></li>
                                <li><a href="#"> Our Treatments <i class="fa fa-angle-down"></i> </a>
                                    <ul class="mega-menu">
                                           
                                        <li>
                                            <ul>
                                                <li class="mega-menu-title"><a href="<?=base_url('osa')?>">OSA (Obstructive sleep apnea)</a></li>
                                                <li class="mega-menu-title"><a href="<?=base_url('copd')?>">COPD(Chronic Obstructive pulmonary disease )</a></li>
                                
                                            </ul>
                                        </li>
                                        
                                        
                                  </ul>
                                </li>
                                <li><a href="<?=base_url('all-collection')?>">Our Devices <i class="fa fa-angle-down"></i></a>
                                <ul class="mega-menu">
                                    <?php
                                    $header_category=$this->db->get('tbl_category')->result();
                                    ?>
                
                                        <li>
                                            <ul>
                                                <?php
                                                foreach($header_category as $val)
                                                {
                                                    $category_name=$val->category_name;
                                                    $category_name_re = str_replace(' ', '', $category_name);
                                                    $cate_string = preg_replace('/[^A-Za-z0-9\-]/', '-', $category_name_re);
                                                ?>
                                                <li class="mega-menu-title"><a href="<?=base_url('category/'.$cate_string.'?cid='.$val->id)?>"><?php echo $val->category_name;?></a></li>
                                                <?php
                                                }
                                                ?>
                                                
                                
                                            </ul>
                                        </li>
                                        
                                        
                                  </ul>
                                </li>
                                
                                <li><a href="<?=base_url('about-us')?>"> About </a></li>
                                <li><a href="<?=base_url('contact-us')?>"> Contact</a></li>

                            </ul>
                        </nav>
                    </div>
                </div>
                
                <?php 
                if(isset($_SESSION['seller_font_user_id']))
                {
                    ?>
                    <div class="col-xl-2 col-lg-2 col-md-6 col-8">
                        <div class="header-right-wrap">
                            <div class="same-style header-search">
                                <a class="search-active" href="#"><i class="pe-7s-search"></i></a>
                                <div class="search-content">
                                    <form action="<?=base_url('search-product')?>" method="GET">
                                        <input type="text" placeholder="Search Product......." id="pro_search"name="pro_search" autocomplete="off">
                                        <input type="hidden" name="name" id="name">
                                        <button class="button-search" type="submit"><i class="pe-7s-search"></i></button>
                                        
                                        
                                    </form>
                                    
                                    <ul id="drop_search" class="search-dropdown inp_dp">
                                                
                                    </ul>
                                    
                                </div> 
                            </div>
                            
                            <?php 
                            if(isset($_SESSION['seller_font_user_id'])){?>
                            
                            <div class="same-style header-wishlist">
                                <a  href="<?=base_url('seller-logout')?>"><i class="fa fa-power-off" aria-hidden="true"></i></a>
                            </div>
                            
                            <div class="same-style account-satting">
                                <a class="account-satting-active" href="#"><i class="pe-7s-user-female"></i></a>
                                <div class="account-dropdown" style="left:-45px;top:3rem;width:155px">
                                    <ul>
                                        <li><a href="#"><?php echo $_SESSION['seller_name'];?></a></li>
                                        <li><a href="#">my Order</a></li>
                                    </ul>
                                </div>
                            </div>
                            
                            
                            
                            
                            <!--<div class="same-style header-wishlist" id="wish_msddddd_show">
                                
                                <?php 
                                $this->db->where('user_id', $_SESSION['font_user_id']);
                                $wish_list_count=$this->db->get('tbl_wishlist')->num_rows();
                                ?>
                                
                            
                            <?php } ?>
                            
                            
                            <?php
                            if(isset($_SESSION['seller_font_user_id'])){ 
                                
                                        $this->db->where('seller_id', $_SESSION['seller_font_user_id']);
                                        $query = $this->db->get('tbl_cart');
                                        $cart_count = $query->num_rows();
                                
                            ?>
                            
                                        
                                        
                                        <?php 
                                        $this->db->where('seller_id', $_SESSION['seller_font_user_id']);
                                        $query = $this->db->get('tbl_cart');
                                        $cart_data = $query->result();
                                        $sum1=0;
                                        foreach($cart_data as $valsel){
                                            $product_id=$valsel->product_id;
                                            $this->db->limit(1); 
                                            $this->db->where('product_id', $product_id);
                                            $query = $this->db->get('tbl_productimage');
                                            $cart_data_image = $query->result();
                                            $product_image1=$cart_data_image[0]->product_image;
                                            
                                            $this->db->where('product_name', $product_id);
                                            $query = $this->db->get('tbl_product');
                                            $cart_data_rate = $query->result();
                                            
                                            $seller_price=$cart_data_rate[0]->seller_discount_rate;
                                            $sum1+=$seller_price*$valsel->quentity;
                                        ?>
                                        <li class="single-shopping-cart">
                                            <div class="shopping-cart-img">
                                                <a href="#"><img alt="" src="<?=base_url('webroot/adminImages/product_image/'.$product_image1.'')?>" style="height: 80px;width: 50px;"></a>
                                            </div>
                                            <div class="shopping-cart-title">
                                                <h4><a href="#"><?php echo $product_name[0]->product_name;?> </a></h4>
                                                <h6>Qty: <?php echo $valsel->quentity;?></h6>
                                                <span>₹<?php echo $seller_price;?></span>
                                            </div>
                                        </li>
                                        <?php }?>
                                    </ul>
                                    <div class="shopping-cart-total">
                                        <!--<h4>Shipping : <span>$20.00</span></h4>-->
                                        <h4>Total : <span class="shop-total">₹<?php echo $sum1;?></span></h4>
                                    </div>
                                    <div class="shopping-cart-btn btn-hover text-center">
                                        <a class="default-btn" href="<?=base_url('view-card')?>">view cart</a>
                                        <!--<a class="default-btn" href="#">checkout</a>-->
                                    </div>
                                </div>
                            </div>
                            
                        <?php  }else {?>
                            
                                    <?php
                                    if(isset($_SESSION['cowe'])){
                                    $co=count($_SESSION['cowe']);
                                    } else {
                                    
                                    $co="0";
                                }
                                    ?>
                            
                            
                            <div class="same-style cart-wrap">
                                <div id="mydiv">
                                <button class="icon-cart">
                                    <i class="pe-7s-shopbag"></i>
                                    <span class="count-style" style="background-color:red;"><b><?php echo $co;?></b></span>
                                </button>
                                </div>
                                <div class="shopping-cart-content">
                                    <ul style="overflow-y:scroll;height:200px">
                                        
                                        <?php 
                                $sum=0;
                                foreach($_SESSION['cowe'] as $val)
                            {
                                
                                
                                $item_id=$val['item_id'];
                                
                                    $qty=$val['item_quantity'];
                                    $price=$val['orginal_price'];
                                    $sum+=$price*$qty;
                                    
                                    
                                $this->db->where('id', $item_id);
                                $product_name=$this->db->get('tbl_byuerproduct')->result();
                                
                                
                                $this->db->limit(1);
                                $this->db->where('product_id', $item_id);
                                $product_image=$this->db->get('tbl_productimage')->result();
                                    
                                    $product_image1=trim($product_image[0]->product_image,",");
                                    
                                    ?>
                                    
                                        <li class="single-shopping-cart">
                                            <div class="shopping-cart-img">
                                                <a href="#"><img alt="" src="<?=base_url('webroot/adminImages/product_image/'.$product_image1.'')?>" style="height: 80px;width: 50px;"></a>
                                            </div>
                                            <div class="shopping-cart-title">
                                                <h4><a href="#"><?php echo $product_name[0]->product_name;?> </a></h4>
                                                <h6>Qty: <?php echo $qty;?></h6>
                                                <span>₹<?php echo $price;?></span>
                                            </div>
                                            
                                        </li>
                                        
                                        <?php }?>
                                        
                                        
                                    </ul>
                                    <div class="shopping-cart-total">
                                        <!--<h4>Shipping : <span>$20.00</span></h4>-->
                                        <h4>Total : <span class="shop-total">₹<?php echo $sum;?></span></h4>
                                    </div>
                                    <div class="shopping-cart-btn btn-hover text-center">
                                        <a class="default-btn" href="<?=base_url('view-card')?>">view cart</a>
                                        <!--<a class="default-btn" href="#">checkout</a>-->
                                    </div>
                                </div>
                            </div>
                            <?php }?>
                            
                            
                        
                        </div>
                    </div>
                    <?php 
                }
                else 
                {
                    ?>
                    <div class="col-xl-2 col-lg-2 col-md-6 col-8">
                        <div class="header-right-wrap">
                            <div class="same-style header-search">
                                <a class="search-active" href="#"><i class="pe-7s-search"></i></a>
                                <div class="search-content">
                                    <form action="<?=base_url('search-product')?>" method="GET">
                                        <input type="text" placeholder="Search Product......." id="pro_search"name="pro_search" autocomplete="off">
                                        <input type="hidden" name="name" id="name">
                                        <button class="button-search" type="submit"><i class="pe-7s-search"></i></button>
                                        
                                        
                                    </form>
                                    
                                    <ul id="drop_search" class="search-dropdown inp_dp">
                                                
                                    </ul>
                                    
                                </div> 
                            </div>
                            <?php 
                            if(isset($_SESSION['font_user_id'])){ }else {?>
                            <div class="same-style header-wishlist">
                                <a href="<?=base_url('user-register')?>"><i class="fa fa-registered" aria-hidden="true"></i></a>
                            </div>
                            
                            <div class="same-style header-wishlist">
                                <a href="<?=base_url('user-login')?>"><i class="fa fa-sign-in" aria-hidden="true"></i></a>
                            </div>
                            <?php }?>
                            <?php 
                            if(isset($_SESSION['font_user_id'])){?>
                            
                            <div class="same-style header-wishlist">
                                <a  href="<?=base_url('user-logout')?>"><i class="fa fa-power-off" aria-hidden="true"></i></a>
                            </div>
                            
                            <div class="same-style account-satting">
                                <a class="account-satting-active" href="#"><i class="pe-7s-user-female"></i></a>
                                <div class="account-dropdown" style="left:-45px;top:3rem;width:155px">
                                    <ul>
                                        <li><a href="#"><?php echo $_SESSION['user_name'];?></a></li>
                                        <li><a href="<?=base_url('my-order')?>">my Order</a></li>
                                    </ul>
                                </div>
                            </div>
                            
                            
                            
                            
                            <div class="same-style header-wishlist" id="wish_msddddd_show">
                                
                                <?php 
                                $this->db->where('user_id', $_SESSION['font_user_id']);
                                $wish_list_count=$this->db->get('tbl_wishlist')->num_rows();
                                ?>
                                
                                <a style="position:relative" href="<?=base_url('show-wishlist')?>"><i class="pe-7s-like"></i>
                                <span class="count-style" style="position: absolute;
                                                                    top: -9px;
                                                                    right: -14px;
                                                                    background-color: #000;
                                                                    color: #fff;
                                                                    display: inline-block;
                                                                    width: 21px;
                                                                    height: 21px;
                                                                    border-radius: 100%;
                                                                    line-height: 21px;
                                                                    font-size: 12px;
                                                                    text-align:center;
                                                                    }"><?php echo $wish_list_count;?></span>
                                </a>
                            </div>
                            <?php } ?>
                            
                            <?php
                                    
                                    if(isset($_SESSION['cowe'])){
                                    $co=count($_SESSION['cowe']);
                                    } else {
                                    
                                    $co="0";
                                }
                                    
                                    ?>
                            
                            
                            <div class="same-style cart-wrap">
                                <div id="mydiv">
                                <button class="icon-cart">
                                    <i class="pe-7s-shopbag"></i>
                                    <span class="count-style" style="background-color:red;"><b><?php echo $co;?></b></span>
                                </button>
                                </div>
                                <div class="shopping-cart-content">
                                    <ul style="overflow-y:scroll;height:200px">
                                        
                                        <?php 
                                $sum=0;
                                foreach($_SESSION['cowe'] as $val)
                            {
                                
                                
                                $item_id=$val['item_id'];
                                
                                    $qty=$val['item_quantity'];
                                    $price=$val['orginal_price'];
                                    $sum+=$price*$qty;
                                    
                                    
                                $this->db->where('id', $item_id);
                                $product_name=$this->db->get('tbl_byuerproduct')->result();
                                
                                
                                $this->db->limit(1);
                                $this->db->where('product_id', $item_id);
                                $product_image=$this->db->get('tbl_productimage')->result();
                                    
                                    $product_image1=trim($product_image[0]->product_image,",");
                                    
                                    ?>
                                    
                                        <li class="single-shopping-cart">
                                            <div class="shopping-cart-img">
                                                <a href="#"><img alt="" src="<?=base_url('webroot/adminImages/product_image/'.$product_image1.'')?>" style="height: 80px;width: 50px;"></a>
                                            </div>
                                            <div class="shopping-cart-title">
                                                <h4><a href="#"><?php echo $product_name[0]->product_name;?> </a></h4>
                                                <h6>Qty: <?php echo $qty;?></h6>
                                                <span>₹<?php echo $price;?></span>
                                            </div>
                                            
                                        </li>
                                        
                                        <?php }?>
                                        
                                        
                                    </ul>
                                    <div class="shopping-cart-total">
                                        <h4>Total : <span class="shop-total">₹<?php echo $sum;?></span></h4>
                                    </div>
                                    <div class="shopping-cart-btn btn-hover text-center">
                                        <a class="default-btn" href="<?=base_url('view-card')?>">view cart</a>
                                    </div>
                                </div>
                            </div>
                        
                        </div>
                    </div>
                    <?php 
                }
                ?>
                
            </div>

            <div class="mobile-menu-area">
                <div class="mobile-menu">
                    <nav id="mobile-menu-active">
                        <ul class="menu-overflow">
                            <li><a href="<?=base_url('home')?>">HOME</a>
                               
                            </li>
                            <li><a href="#">Our Treatments </a>
                                <ul>
                                        
                                          <li><a href="<?=base_url('osa')?>">OSA (Obstructive sleep apnea)</a>
                                        <ul>
                                          
                                           
                                        </ul>
                                    </li>

                                    
                                    <li><a href="<?=base_url('copd')?>">COPD(Chronic Obstructive pulmonary disease )</a>
                                        <ul>
                                          
                                           
                                        </ul>
                                    </li>
                                    
                                </ul>
                            </li>
                            <li><a href="<?=base_url('all-collection')?>">Our Devices </a>
                                <ul>
                                    <?php
                                    foreach($header_category as $val)
                                    {
                                        $category_name=$val->category_name;
                                        $category_name_re = str_replace(' ', '', $category_name);
                                        $cate_string = preg_replace('/[^A-Za-z0-9\-]/', '-', $category_name_re);
                                    ?>
                                    <li class="mega-menu-title"><a href="<?=base_url('category/'.$cate_string.'?cid='.$val->id)?>"><?php echo $val->category_name;?></a></li>
                                    <?php
                                    }
                                    ?>
                                   
                                </ul>
                            </li>
                            
                        
                            <li><a href="<?=base_url('about-us')?>">About us</a></li>
                            <li><a href="<?=base_url('contact-us')?>">Contact</a></li>
                            
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
</body>

<input type="hidden" name="base_url" id="base_url" value="<?=base_url()?>">
<input type="hidden" name="current_url" id="current_url" value="<?=current_url();?>">

<style>
  
@media(max-width: 768px){
    .search-dropdown{
        width: 93%;
        border-radius: 5px;
    }
}
.search-dropdown li{
        list-style: none;
    padding: 7px 13px;
    border-bottom: 1px solid #f5f5f5;
    cursor: pointer;
    font-size: 15px;
    color: #333;

}
.search-dropdown li:hover{
    background-color: #efefef;
}
</style>




