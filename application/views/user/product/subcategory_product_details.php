
<!-- main-area -->
    <main>

        <!-- breadcrumb-area -->


        <?php
        foreach ($result as $value) {


        }?>
<?php 
$this->db->where('uniqcode', $value->sub_category_id);
$category=$this->db->get('tbl_sub_category')->result();
                                            foreach($category as $valsub) {


                                                $category_name=$valsub->subcategory_name;
                                                $category_name_re = str_replace(' ', '', $category_name);
                                    $cate_string = preg_replace('/[^A-Za-z0-9\-]/', '-', $category_name_re);
}
                                                ?>
        <div class="breadcrumb-area breadcrumb-bg-two">
            <div class="container custom-container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-content">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?=base_url('home')?>">Home</a></li>
                                    <li class="breadcrumb-item"><a href="<?=base_url('subcategory/'.$cate_string.'?cid='.$valsub->uniqcode)?>">Subcategory Prodct</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><?php echo $value->product_name;?></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb-area-end -->

        <!-- shop-details-area -->


        <?php
        foreach ($result as $value) {

            $product_uniquecode=$value->uniqcode;
            $this->db->where('product_id', $value->uniqcode);
                                    $this->db->order_by('id', 'DESC');
                                    $this->db->limit(1);
                                    $product_feture=$this->db->get('tbl_product_features')->result();
                                        foreach ($product_feture as $feturevalue) {
                                         /*$size_id=$feturevalue->size;*/
                                         $uniqcode=$feturevalue->uniqcode; 

                                          

                                         $item_img=unserialize($feturevalue->image);
                                         $co=count($item_img);
                                         $img=$item_img[0];



                                            $this->db->where('uniqcode', $value->category_id);
                                            $category_name=$this->db->get('tbl_category')->result();
                                            foreach($category_name as $valcat) {
                                                }


                                                $this->db->where('product_features_id', $uniqcode);
                                            $product_price=$this->db->get('tbl_total_stock')->result();
                                            foreach($product_price as $valprice) {
                                                }

            
        }
        
        /*for ($i=0; $i <$co ; $i++) { 
          
        
            echo $item_img[$i];
            
        }*/
    }

        ?>


        <section class="shop-details-area pt-90 pb-90">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="shop-details-flex-wrap">
                            <div class="shop-details-nav-wrap">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <?php
                                    for ($i=0; $i <$co ; $i++) { 
          
        
        
                                $item_img[$i];

                                if($i==0)
                        {
                            $active='active';
                        }
                        else
                        {   
                            $active='';
                        }


            
       ?>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link <?php echo $active;?>" id="item-one-tab" data-toggle="tab" href="#item-<?php echo $i;?>" role="tab" aria-controls="item-one" aria-selected="true"><img src="<?=base_url('webroot/adminImages/product/web/'.$item_img[$i].'')?>" alt=""></a>
                                    </li>
                                <?php } ?>
                                    <!--<li class="nav-item" role="presentation">
                                        <a class="nav-link" id="item-two-tab" data-toggle="tab" href="#item-two" role="tab" aria-controls="item-two" aria-selected="false"><img src="<?=base_url()?>webroot/user_panel/assets/img/product/sd_nav_img02.jpg" alt=""></a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="item-three-tab" data-toggle="tab" href="#item-three" role="tab" aria-controls="item-three" aria-selected="false"><img src="<?=base_url()?>webroot/user_panel/assets/img/product/sd_nav_img03.jpg" alt=""></a>
                                    </li>-->
                                </ul>
                            </div>
                            <div class="shop-details-img-wrap">
                                <div class="tab-content" id="myTabContent">

                                    <?php
                                    for ($i=0; $i <$co ; $i++) { 
          
        
        
                                $item_img[$i];

                                if($i==0)
                        {
                            $active='active';
                        }
                        else
                        {   
                            $active='';
                        } ?>
                                    <div class="tab-pane fade show <?php echo $active;?>" id="item-<?php echo $i;?>" role="tabpanel" aria-labelledby="item-one-tab">
                                        <div class="shop-details-img">
                                            <img src="<?=base_url('webroot/adminImages/product/web/'.$item_img[$i].'')?>" alt="">
                                        </div>
                                    </div>
                                <?php }?>


                                    <!--<div class="tab-pane fade" id="item-two" role="tabpanel" aria-labelledby="item-two-tab">
                                        <div class="shop-details-img">
                                            <img src="<?=base_url()?>webroot/user_panel/assets/img/product/shop_details_img02.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="item-three" role="tabpanel" aria-labelledby="item-three-tab">
                                        <div class="shop-details-img">
                                            <img src="<?=base_url()?>webroot/user_panel/assets/img/product/shop_details_img03.jpg" alt="">
                                        </div>
                                    </div>-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="shop-details-content">
                            <h4 class="title"><?php echo $value->product_name;?></h4>
                            <div class="shop-details-meta">
                                <ul>
                                    <li>Baands : <a href="#"><?php echo $value->brand_name;?></a></li>
                                    <li class="shop-details-review">
                                        <div class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <span>Review</span>
                                    </li>
                                    <li>ID : <span><?php echo $value->uniqcode;?></span></li>
                                </ul>
                            </div>
                            <div class="shop-details-price">
                                <h2 class="price">₹<span id="orginal"><?php echo $valprice->sell_price;?></h2></span>
                                <h5 class="stock-status">- IN Stock</h5>
                            </div>
                            <p><?php echo $value->description;?></p>
                            <!--<div class="shop-details-list">
                                <ul>
                                    <li>Type : <span>Ice Cream</span></li>
                                    <li>XPD : <span>Aug 19.2021</span></li>
                                    <li>CO : <span>Ganic</span></li>
                                </ul>
                            </div>-->


                            <div class="pckbsz">
                                <?php 
                                    $this->db->where('product_id', $value->uniqcode);
                                    $this->db->order_by('id', 'DESC');
                                    $this->db->limit(1);
                            $product_feture_id=$this->db->get('tbl_product_features')->result();
                                        foreach ($product_feture_id as $sizefeturevalue) {

                                            $feture_unicode=$sizefeturevalue->uniqcode;
                                            $feture_size=$sizefeturevalue->size;

                                        }


                                        $this->db->where('product_features_id', $feture_unicode);
                                    //$this->db->order_by('id', 'DESC');
                                    //$this->db->limit(1);
                                $product_stock_id=$this->db->get('tbl_total_stock')->result();
                                        foreach ($product_stock_id as $total_stock) {

                                            $total_stock_sell=$total_stock->sell_price;
                                            $product_quantity=$total_stock->quantity;

                                        }


                                        $this->db->where('uniqcode', $feture_size);
                                    //$this->db->order_by('id', 'DESC');
                                    //$this->db->limit(1);
                                $product_size_id=$this->db->get('tbl_size')->result();
                                        foreach ($product_size_id as $size_name) {

                                            $name_size=$size_name->size;
                                            $name_size_uid=$size_name->uniqcode;

                                        }



                                        ?>

                                <div class="pckbszbx pckbszbxact" onclick="size_sele('<?php echo $feture_unicode;?>');">
                                    <div class="pckbszbx1"><?php echo $name_size;?></div>
                                    <div class="pckbszbx2">
                                        <!--<del>Rs 100</del>Rs 200--> Rs <?php echo $total_stock_sell;?>
                                    </div>
                                    <div class="pckbszbx3">
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                    </div>
                                </div>


                                <?php 
                                    $this->db->where('product_id', $value->uniqcode);
                                    $this->db->order_by('id', 'DESC');
                                    //$this->db->limit(1);
                            $product_feture_id=$this->db->get('tbl_product_features')->result();
                                        foreach ($product_feture_id as $sizefeturevalue) {

                                            $feture_unicode123=$sizefeturevalue->uniqcode;
                                            $feture_size=$sizefeturevalue->size;

                                        if($feture_unicode==$feture_unicode123)
                                        {

                                        } else {


                                        $this->db->where('product_features_id', $feture_unicode123);
                                    //$this->db->order_by('id', 'DESC');
                                    //$this->db->limit(1);
                                $product_stock_id=$this->db->get('tbl_total_stock')->result();
                                        foreach ($product_stock_id as $total_stock) {

                                            $total_stock_sell=$total_stock->sell_price;
                                            

                                       


                                        $this->db->where('uniqcode', $feture_size);
                                    //$this->db->order_by('id', 'DESC');
                                    //$this->db->limit(1);
                                $product_size_id=$this->db->get('tbl_size')->result();
                                        foreach ($product_size_id as $after_size_name) {

                                            $name_size=$after_size_name->size;
                                            

                                        } ?>

                                <div class="pckbszbx" onclick="size_sele('<?php echo $feture_unicode123;?>');">
                                    <div class="pckbszbx1"><?php echo $name_size;?></div>
                                    <div class="pckbszbx2">
                                        <!--<del>Rs 100</del>Rs 200-->
                                        Rs <?php echo $total_stock_sell;?>
                                    </div>
                                    <div class="pckbszbx3">
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                    </div>
                                </div>
                            <?php } } }?>



                            </div>





                            <div class="shop-perched-info">
                                <div class="sd-cart-wrap">
                                    <form action="#">
                                        <div class="cart-plus-minus">
                                            <input type="text" value="1" id="quantity_id">
                                        </div>

                                        <input type="hidden" id="addition" name="addition" value="<?php echo $product_quantity;?>">

                                        

                                    </form>
                                </div>

                                <input type="hidden" id="pro_id" name="pro_id" value="<?php echo $product_uniquecode;?>">

                                        <input type="hidden" id="pro_feture_id" name="pro_feture_id" value="<?php echo $feture_unicode;?>">

                                        <input type="hidden" id="pro_size_id" name="pro_feture_id" value="<?php echo $name_size_uid;?>">

                                <?php
                            if($this->session->userdata('loginDetail')!=NULL)
                            {  
                        ?>
                            <!--<a href="#" class="btn" onclick="addtocard();">add to cart</a>-->
                            <button class="btn" data-text="add to cart" type="button" onclick="addtocard();">add to cart</button>

                                <!--<a href="#" class="btn">add to cart</a>-->
                            <?php } else {?>
                                 <a href="" data-toggle="modal" data-target="#exampleModal12" data-bs-whatever="@mdo" class="btn">Add to cart</a>
                             <?php }?>

                            </div>


                            <p class="cart-small-text" id="stock_not" style="display:none;color:red;">Quantity cannot be increased.</p>
                            <div class="shop-details-bottom" id="refgh">
                                <!--<h5 class="title"><a href="#"><i class="far fa-heart"></i> Add To Wishlist</a></h5>-->
                                <p style="color: green;display:none" id="sucess_wish"><b>ADD TO WISHLIST SUCESS</b></p> 
                                <p style="color: red;display:none" id="remove_wish"><b>REMOVE WISHLIST SUCESS<b></p> 
                                
                                <?php 
                                
                                $userdata=$this->session->userdata('loginDetail');
                                if(isset($userdata)){  
                                $user_id=$userdata->uniqcode;
                                
                                    $this->db->where('user_id', $user_id);
                                    $this->db->where('product_id', $product_uniquecode);
                                    $this->db->where('product_features_id', $feture_unicode);
                                    $query = $this->db->get('tbl_wishlist');
                                    $cart_count = $query->num_rows();
                                if($cart_count>0){
                                
                                
                                ?>
 <button class="btn for-red" type="button" class="title" onclick=remove_wishlist('<?php echo $user_id;?>','<?php echo $product_uniquecode;?>','<?php echo $feture_unicode;?>');><i class="fa-solid fa-heart"></i> Remove To Wishlist</button>
 <?php } else {?>                                  
<button class="btn for-black" type="button" class="title" onclick=add_wishlist('<?php echo $user_id;?>','<?php echo $product_uniquecode;?>','<?php echo $feture_unicode;?>');><i class="fa-solid fa-heart"></i> Add To Wishlist</button>


                                
                                <?php } } else {?>
                                    <button class="btn for-black" type="button" class="title"   data-toggle="modal" data-target="#exampleModal12" data-bs-whatever="@mdo"><i class="fa-solid fa-heart"></i> Add To Wishlist</button>
                                <?php }?>
                                
                                <ul>
                                    <li>
                                        <span>Tag : </span>
                                        <a href="#">ICE Cream</a>
                                    </li>
                                    <li>
                                        <span>CATEGORIES :</span>
                                        <a href="#"><?php echo $valcat->category_name;?></a>
                                        <!--<a href="#">bikini,</a>
                                        <a href="#">tops for,</a>
                                        <a href="#">large bust</a>-->
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="product-desc-wrap">
                            <ul class="nav nav-tabs" id="myTabTwo" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="details-tab" data-toggle="tab" href="#details" role="tab"
                                        aria-controls="details" aria-selected="true">Product Details</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="val-tab" data-toggle="tab" href="#val" role="tab" aria-controls="val"
                                        aria-selected="false">Viewers Also Like</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab"
                                        aria-controls="review" aria-selected="false">Product Reviews</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContentTwo">
                                <div class="tab-pane fade show active" id="details" role="tabpanel" aria-labelledby="details-tab">
                                    <div class="product-desc-content">
                                        <h4 class="title">Product Details</h4>
                                        <div class="row">
                                            <div class="col-xl-3 col-md-5">
                                                <div class="product-desc-img">
                                                    <img src="<?=base_url('webroot/adminImages/product/web/'.$img.'')?>" alt="">
                                                </div>
                                            </div>
                                            <div class="col-xl-9 col-md-7">
                                                <h5 class="small-title">100% Natural Vitamin</h5>
                                                <p><?php echo $value->description;?></p>
                                                <!--<ul class="product-desc-list">
                                                    <li>65% poly, 35% rayon</li>
                                                    <li>Hand wash cold</li>
                                                    <li>Partially lined</li>
                                                    <li>Hidden front button closure with keyhole accents</li>
                                                    <li>Button cuff sleeves</li>
                                                    <li>Lightweight semi-sheer fabrication</li>
                                                    <li>Made in USA</li>
                                                </ul>-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="val" role="tabpanel" aria-labelledby="val-tab">
                                    <div class="product-desc-content">
                                        <h4 class="title">Product Details</h4>
                                        <div class="row">
                                            <div class="col-xl-3 col-md-5">
                                                <div class="product-desc-img">
                                                    <img src="<?=base_url()?>webroot/user_panel/assets/img/product/desc_img.jpg" alt="">
                                                </div>
                                            </div>
                                            <div class="col-xl-9 col-md-7">
                                                <h5 class="small-title">100% Natural Vitamin</h5>
                                                <p>Cramond Leopard & Pythong Print Anorak Jacket In Beige but also the leap into electronic typesetting, remaining Lorem
                                                Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy
                                                text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                                <ul class="product-desc-list">
                                                    <li>65% poly, 35% rayon</li>
                                                    <li>Hand wash cold</li>
                                                    <li>Partially lined</li>
                                                    <li>Hidden front button closure with keyhole accents</li>
                                                    <li>Button cuff sleeves</li>
                                                    <li>Lightweight semi-sheer fabrication</li>
                                                    <li>Made in USA</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                                    <div class="product-desc-content">
                                        <h4 class="title">Product Details</h4>
                                        <div class="row">
                                            <div class="col-xl-3 col-md-5">
                                                <div class="product-desc-img">
                                                    <img src="<?=base_url()?>webroot/user_panel/assets/img/product/desc_img.jpg" alt="">
                                                </div>
                                            </div>
                                            <div class="col-xl-9 col-md-7">
                                                <h5 class="small-title">100% Natural Vitamin</h5>
                                                <p>Cramond Leopard & Pythong Print Anorak Jacket In Beige but also the leap into electronic typesetting, remaining Lorem
                                                Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy
                                                text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                                <ul class="product-desc-list">
                                                    <li>65% poly, 35% rayon</li>
                                                    <li>Hand wash cold</li>
                                                    <li>Partially lined</li>
                                                    <li>Hidden front button closure with keyhole accents</li>
                                                    <li>Button cuff sleeves</li>
                                                    <li>Lightweight semi-sheer fabrication</li>
                                                    <li>Made in USA</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- shop-details-area-end -->

        <!-- coupon-area -->
        <div class="coupon-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="coupon-bg">
                            <div class="coupon-title">
                                <span>Use coupon Code</span>
                                <h3 class="title">Get ₹3 Discount Code</h3>
                            </div>
                            <div class="coupon-code-wrap">
                                <h5 class="code">ganic21abs</h5>
                                <img src="<?=base_url()?>webroot/user_panel/assets/img/images/coupon_code.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- coupon-area-end -->

        <!-- best-sellers-area -->
        <?php foreach($main_menu as $val) {
                                                $category_name=$val->category_name;
                                                $category_name_re = str_replace(' ', '', $category_name);
                                    $cate_string = preg_replace('/[^A-Za-z0-9\-]/', '-', $category_name_re);
                                        }
                                                ?>

        <section class="best-sellers-area pt-85 pb-70">
            <div class="container">
                <div class="row align-items-end mb-40">
                    <div class="col-md-8 col-sm-9">
                        <div class="section-title">
                            <span class="sub-title">Related Products</span>
                            <h2 class="title">From this Collection</h2>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-3">
                        <div class="section-btn text-left text-md-right">
                            <a href="#" class="btn">View All</a>
                        </div>
                    </div>
                </div>
                <div class="best-sellers-products">
                    <div class="row justify-content-center">
                        <!--<div class="col-3">
                            <div class="sp-product-item mb-20">
                                <div class="sp-product-thumb">
                                    <span class="batch">New</span>
                                    <a href="shop-details.html"><img src="<?=base_url()?>webroot/user_panel/assets/img/product/sp_products09.png" alt=""></a>
                                </div>
                                <div class="sp-product-content">
                                    <div class="rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <h6 class="title"><a href="shop-details.html">Uncle Orange Vanla Ready Pice</a></h6>
                                    <span class="product-status">IN Stock</span>
                                    <div class="sp-cart-wrap">
                                        <form action="#">
                                            <div class="cart-plus-minus">
                                                <input type="text" value="1">
                                            </div>
                                        </form>
                                    </div>
                                    <p>₹1.50 - 1 kg</p>
                                </div>
                            </div>
                        </div>-->

                                    <?php
                                    $this->db->where('sub_category_id', $value->sub_category_id);
                                    $this->db->order_by('id', 'DESC');
                                    //$this->db->limit(8);
                                    $product=$this->db->get('tbl_product')->result();
                                    foreach($product as $valproduct) {

                                        $pro_unicode=$valproduct->uniqcode;

                                        if($product_uniquecode==$pro_unicode)
                                            { }else {



                                                $this->db->where('product_id', $valproduct->uniqcode);
                                    $this->db->order_by('id', 'DESC');
                                    $this->db->limit(1);
                                    $product_feture=$this->db->get('tbl_product_features')->result();
                                        foreach ($product_feture as $feturevalue) {
                                         $size_id=$feturevalue->size;
                                         $uniqcode=$feturevalue->uniqcode; 

                                          

                                         $item_img=unserialize($feturevalue->image);
                                         $img=$item_img[0];
                                        }



                                    $this->db->where('uniqcode', $size_id);
                                    $product_size=$this->db->get('tbl_size')->result();
                                    foreach ($product_size as $sizevalue) {
                                            
                                        }

                                        $this->db->where('product_features_id', $uniqcode);
                                    $product_val=$this->db->get('tbl_total_stock')->result();
                                    foreach ($product_val as $provalue) {

                                        //$discount=((($provalue->sell_price - $provalue->mrp_price)*100)/ $provalue->sell_price);

                                        $discount=((($provalue->mrp_price - $provalue->sell_price)*100)/ $provalue->mrp_price);
                                            
                                        }


                        $productname=$valproduct->product_name;
                        $product_name_re = str_replace(' ', '', $productname);
                        $product_string = preg_replace('/[^A-Za-z0-9\-]/', '-', $product_name_re);







                                        ?>

                        <div class="col-3">
                            <div class="sp-product-item mb-20">
                                <div class="sp-product-thumb">
                                    <span class="batch discount"><?=intval($discount)?>%</span>
                                    <a href="<?=base_url('subcategory-product/details/'.$product_string.'?proid='.$valproduct->uniqcode.'&slug='.$valproduct->slug.'&sid='.$valproduct->sub_category_id)?>"><img src="<?=base_url('webroot/adminImages/product/web/'.$img.'')?>" alt=""></a>
                                </div>
                                <div class="sp-product-content">
                                    <div class="rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <?php $product_length=strlen($valproduct->product_name);
                                 if($product_length>15){?> 
                                    <h6 class="title"><a href="<?=base_url('subcategory-product/details/'.$product_string.'?proid='.$valproduct->uniqcode.'&slug='.$valproduct->slug.'&sid='.$valproduct->sub_category_id)?>"><?php echo substr($valproduct->product_name,0,15).' '.'.....';?></a></h6>
                                    <?php } else {?> 
                                        <h6 class="title"><a href="<?=base_url('subcategory-product/details/'.$product_string.'?proid='.$valproduct->uniqcode.'&slug='.$valproduct->slug.'&sid='.$valproduct->sub_category_id)?>"><?php echo $valproduct->product_name;?></a></h6>
                                    <?php }?>
                                    <?php if($provalue->quantity=="0"){?>
                                    <span class="product-status" style="
    color: red;
">Out of Stock</span>
<?php } else {?>
    <span class="product-status"
">Out of Stock</span>
<?php }?>
                                    <div class="sp-cart-wrap">
                                        <form action="#">
                                            <div class="cart-plus-minus">
                                                <input type="text" value="1">
                                            </div>
                                        </form>
                                    </div>
                                    <p>₹<?php echo $provalue->sell_price;?> - <?php echo $sizevalue->size;?></p>
                                </div>
                            </div>
                        </div>
                    <?php } }?>


                        <!--<div class="col-3">
                            <div class="sp-product-item mb-20">
                                <div class="sp-product-thumb">
                                    <span class="batch discount">25%</span>
                                    <a href="shop-details.html"><img src="<?=base_url()?>webroot/user_panel/assets/img/product/sp_products03.png" alt=""></a>
                                </div>
                                <div class="sp-product-content">
                                    <div class="rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <h6 class="title"><a href="shop-details.html">Walnuts Max Vanla Greek Pice</a></h6>
                                    <span class="product-status">IN Stock</span>
                                    <div class="sp-cart-wrap">
                                        <form action="#">
                                            <div class="cart-plus-minus">
                                                <input type="text" value="1">
                                            </div>
                                        </form>
                                    </div>
                                    <p>₹2.99 - 1 kg</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="sp-product-item mb-20">
                                <div class="sp-product-thumb">
                                    <span class="batch">new</span>
                                    <a href="shop-details.html"><img src="<?=base_url()?>webroot/user_panel/assets/img/product/sp_products04.png" alt=""></a>
                                </div>
                                <div class="sp-product-content">
                                    <div class="rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <h6 class="title"><a href="shop-details.html">Brachs Bens Vanla Ready Pice</a></h6>
                                    <span class="product-status">IN Stock</span>
                                    <div class="sp-cart-wrap">
                                        <form action="#">
                                            <div class="cart-plus-minus">
                                                <input type="text" value="1">
                                            </div>
                                        </form>
                                    </div>
                                    <p>₹2.99 - 1 kg</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="sp-product-item mb-20">
                                <div class="sp-product-thumb">
                                    <span class="batch discount">25%</span>
                                    <a href="shop-details.html"><img src="<?=base_url()?>webroot/user_panel/assets/img/product/sp_products05.png" alt=""></a>
                                </div>
                                <div class="sp-product-content">
                                    <div class="rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <h6 class="title"><a href="shop-details.html">Black Lady Vanla Greek Grapes</a></h6>
                                    <span class="product-status">IN Stock</span>
                                    <div class="sp-cart-wrap">
                                        <form action="#">
                                            <div class="cart-plus-minus">
                                                <input type="text" value="1">
                                            </div>
                                        </form>
                                    </div>
                                    <p>₹5.99 - 1 kg</p>
                                </div>
                            </div>
                        </div>-->
                    </div>
                </div>
            </div>
        </section>
        <!-- best-sellers-area-end -->

    </main>
    <!-- main-area-end -->


