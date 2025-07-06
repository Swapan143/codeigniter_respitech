<?php 
unset($_SESSION["url"]);
$abc=current_url();
$ex=explode("/", $abc);
$url=$ex[3];
$_SESSION['url']=$url;
?>
        <!-- main-area -->

        <main>

            <!-- breadcrumb-area -->
            <div class="breadcrumb-area breadcrumb-bg-two">
                <div class="container custom-container">
                    <div class="row">
                        <div class="col-12">
                            <div class="breadcrumb-content">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?=base_url('home')?>">Home</a></li>
                                        <li class="breadcrumb-item"><a href="#">Special Product</a></li>
                                        
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- breadcrumb-area-end -->

            <!-- shop-area -->
            <section class="shop--area pt-90 pb-90">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-3 order-2 order-lg-0">
                            <aside class="shop-sidebar">
                                <div class="widget shop-widget">
                                    <div class="shop-widget-title">
                                        <h6 class="title">Product Categories</h6>
                                    </div>
                                    <div class="shop-cat-list">
                                        <ul>

                                            <?php foreach ($main_menu as $value) {
                                               
                                            ?>
                                            <li>
                                                <a><?php echo $value->category_name;?>
                                                    <span>
                                                        <input type="checkbox" class="che cate" value="<?php echo $value->uniqcode;?>">
                                                    </span>
                                                </a>
                                            </li>
                                        <?php }?>
                                            <!--<li><a href="shop.html">Accessories <span>+</span></a></li>
                                            <li><a href="shop.html">Vegetables <span>+</span></a></li>
                                            <li><a href="shop.html">Spices Food <span>+</span></a></li>
                                            <li><a href="shop.html">Dairy <span>+</span></a></li>
                                            <li><a href="shop.html">Baby Food <span>+</span></a></li>
                                            <li><a href="shop.html">Kitchen Accessories <span>+</span></a></li>-->
                                        </ul>
                                    </div>
                                </div>
                                <div class="widget shop-widget">
                                    <div class="shop-widget-title">
                                        <h6 class="title">Filter By Price</h6>
                                    </div>
                                    <div class="price_filter">
                                        <div id="slider-range"></div>
                                        <div class="price_slider_amount">
                                            <span>Price :</span>
                                            <input type="text" id="amount" name="price"/>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary che">Filter</button>
                                </div>
                                <!--<div class="widget shop-widget">
                                    <div class="shop-widget-title">
                                        <h6 class="title">NEW PRODUCT</h6>
                                    </div>
                                    <div class="sidebar-product-list">
                                        <ul>
                                            <li>
                                                <div class="sidebar-product-thumb">
                                                    <a href="shop-details.html"><img src="<?=base_url()?>webroot/user_panel/assets/img/product/sidebar_product01.jpg" alt=""></a>
                                                </div>
                                                <div class="sidebar-product-content">
                                                    <div class="rating">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                    </div>
                                                    <h5><a href="shop-details.html">Uncle Bens Vanla</a></h5>
                                                    <span>₹39.00</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="sidebar-product-thumb">
                                                    <a href="shop-details.html"><img src="<?=base_url()?>webroot/user_panel/assets/img/product/sidebar_product02.jpg" alt=""></a>
                                                </div>
                                                <div class="sidebar-product-content">
                                                    <div class="rating">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                    </div>
                                                    <h5><a href="shop-details.html">Dannon Max</a></h5>
                                                    <span>₹29.00</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="sidebar-product-thumb">
                                                    <a href="shop-details.html"><img src="<?=base_url()?>webroot/user_panel/assets/img/product/sidebar_product03.jpg" alt=""></a>
                                                </div>
                                                <div class="sidebar-product-content">
                                                    <div class="rating">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                    </div>
                                                    <h5><a href="shop-details.html">Vanla Greek Pice</a></h5>
                                                    <span>₹35.00</span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>-->
                                <div class="widget shop-widget">
                                    <div class="shop-widget-title">
                                        <h6 class="title">PRODUCT BRANDS</h6>
                                    </div>
                                    <div class="shop-cat-list">
                                        <ul>
                                            <?php foreach ($brand_menu as $brandvalue) 
                                            {
                                               ?>
                                            
                                            <li>
                                                <span>
                                                <a><?php echo $brandvalue->brand_name;?>
                        <input type="checkbox" class="che namebrand" value="<?php echo $brandvalue->brand_name;?>">
                    </span>
                                                </a>
                                            </li>
                                        <?php }?>
                                            <!--<li><a href="shop.html">Adara <span>+</span></a></li>
                                            <li><a href="shop.html">Carnation <span>+</span></a></li>
                                            <li><a href="shop.html">We Beyond <span>+</span></a></li>
                                            <li><a href="shop.html">Agrifram <span>+</span></a></li>-->
                                        </ul>
                                    </div>
                                </div>
                                <div class="widget">
                                    <div class="shop-widget-banner text-center">
                                        <a href="shop.html"><img src="<?=base_url()?>webroot/user_panel/assets/img/product/sidebar_shop_ad.jpg" alt=""></a>
                                    </div>
                                </div>
                            </aside>
                        </div>
                        <div class="col-9">
                            <div class="shop-discount-area">
                                <div class="discount-content shop-discount-content">
                                    <span>healthy food</span>
                                    <h4 class="title"><a href="shop.html">organic farm for ganic</a></h4>
                                    <p>Super Offer TO 50% OFF</p>
                                    <a href="shop.html" class="btn rounded-btn">shop now</a>
                                </div>
                            </div>
                            <div class="shop-top-meta mb-30">
                                <div class="row">
                                    <div class="col-md-6 col-sm-7">
                                        <div class="shop-top-left">
                                            <ul>
                                                <li><a href="#"><i class="fas fa-bars"></i> FILTER</a></li>
                                                <li>Showing 1–9 of 80 results</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-5">
                                        <div class="shop-top-right">
                                            <form action="#">
                                                <select name="select" onchange="low_high(this.value)">
                                                <option value="">Sort by</option>
                                                <option value="pricee_asc">Price: Low to High</option>
                                                <option value="pricee_desc">Price: High to Low</option>
                                                <option value="proname_asc">A - Z</option>
                                                <option value="proname_desc">Z - A</option>
                                                </select>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="shop-products-wrap">
                                <div class="row justify-content-center" id="show">
                                        <?php 
                                        foreach($result as $valproduct) {

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


                                        $discount=((($provalue->sell_price - $provalue->mrp_price)*100)/ $provalue->sell_price);
                                            
                                        }

                        $productname=$valproduct->product_name;
                        $product_name_re = str_replace(' ', '', $productname);
                        $product_string = preg_replace('/[^A-Za-z0-9\-]/', '-', $product_name_re);

                                         ?>

                                    <div class="col-xl-3 col-md-4 col-sm-6">
                                        <div class="sp-product-item">
                                            <div class="sp-product-thumb">
                                                <span class="batch"><?=intval($discount)?>%</span>
                                                <a href="<?=base_url('special-product/details/'.$product_string.'?proid='.$valproduct->uniqcode.'&slug='.$valproduct->slug.'&cid='.$valproduct->category_id)?>"><img src="<?=base_url('webroot/adminImages/product/web/'.$img.'')?>" alt=""></a>
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
                                                <h6 class="title"><a href="<?=base_url('special-product/details/'.$product_string.'?proid='.$valproduct->uniqcode.'&slug='.$valproduct->slug.'&cid='.$valproduct->category_id)?>"><?php echo substr($valproduct->product_name,0,15).' '.'.....';?></a></h6>
                                                <?php } else {?> 
                                                    <h6 class="title"><a href="<?=base_url('special-product/details/'.$product_string.'?proid='.$valproduct->uniqcode.'&slug='.$valproduct->slug.'&cid='.$valproduct->category_id)?>"><?php echo $valproduct->product_name;?></a></h6>
                                                <?php }?>
                                                <?php if($provalue->quantity=="0"){?>

                                        <span class="product-status" style="
    color: red;
">Out of  Stock</span>

                                                <?php } else {?>
                                                    <span class="product-status">IN Stock</span>
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
                                <?php }?>
                                    <!--<div class="col-xl-3 col-md-4 col-sm-6">
                                        <div class="sp-product-item">
                                            <div class="sp-product-thumb">
                                                <span class="batch discount">25%</span>
                                                <a href="shop-details.html"><img src="<?=base_url()?>webroot/user_panel/assets/img/product/sp_products02.png" alt=""></a>
                                            </div>
                                            <div class="sp-product-content">
                                                <div class="rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                </div>
                                                <h6 class="title"><a href="shop-details.html">Dannon Max Vanla Ice Cream</a></h6>
                                                <span class="product-status">IN Stock</span>
                                                <div class="sp-cart-wrap">
                                                    <form action="#">
                                                        <div class="cart-plus-minus">
                                                            <input type="text" value="1">
                                                        </div>
                                                    </form>
                                                </div>
                                                <p>₹1.50 - 1 lt</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-4 col-sm-6">
                                        <div class="sp-product-item">
                                            <div class="sp-product-thumb">
                                                <span class="batch discount">25%</span>
                                                <a href="shop-details.html"><img src="<?=base_url()?>webroot/user_panel/assets/img/product/sp_products10.png" alt=""></a>
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
                                                <p>₹1.50 - 1 kg</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-4 col-sm-6">
                                        <div class="sp-product-item">
                                            <div class="sp-product-thumb">
                                                <span class="batch">New</span>
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
                                                <h6 class="title"><a href="shop-details.html">Uncle Bens Vanla Ready Pice</a></h6>
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
                                    </div>
                                    <div class="col-xl-3 col-md-4 col-sm-6">
                                        <div class="sp-product-item">
                                            <div class="sp-product-thumb">
                                                <span class="batch discount">25%</span>
                                                <a href="shop-details.html"><img src="<?=base_url()?>webroot/user_panel/assets/img/product/sp_products11.png" alt=""></a>
                                            </div>
                                            <div class="sp-product-content">
                                                <div class="rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                </div>
                                                <h6 class="title"><a href="shop-details.html">Capsicum Vanla Ben Ready Pice</a></h6>
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
                                    </div>
                                    <div class="col-xl-3 col-md-4 col-sm-6">
                                        <div class="sp-product-item">
                                            <div class="sp-product-thumb">
                                                <span class="batch">New</span>
                                                <a href="shop-details.html"><img src="<?=base_url()?>webroot/user_panel/assets/img/product/sp_products06.png" alt=""></a>
                                            </div>
                                            <div class="sp-product-content">
                                                <div class="rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                </div>
                                                <h6 class="title"><a href="shop-details.html">Potato Max Vanla Greek Pice</a></h6>
                                                <span class="product-status">IN Stock</span>
                                                <div class="sp-cart-wrap">
                                                    <form action="#">
                                                        <div class="cart-plus-minus">
                                                            <input type="text" value="1">
                                                        </div>
                                                    </form>
                                                </div>
                                                <p>₹1.99 - 1 kg</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-4 col-sm-6">
                                        <div class="sp-product-item">
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
                                                <p>₹1.50 - 1 kg</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-4 col-sm-6">
                                        <div class="sp-product-item">
                                            <div class="sp-product-thumb">
                                                <span class="batch">New</span>
                                                <a href="shop-details.html"><img src="<?=base_url()?>webroot/user_panel/assets/img/product/sp_products12.png" alt=""></a>
                                            </div>
                                            <div class="sp-product-content">
                                                <div class="rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                </div>
                                                <h6 class="title"><a href="shop-details.html">Strawberry Vanla Ready Pice</a></h6>
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
                                    </div>
                                    <div class="col-xl-3 col-md-4 col-sm-6">
                                        <div class="sp-product-item">
                                            <div class="sp-product-thumb">
                                                <span class="batch discount">25%</span>
                                                <a href="shop-details.html"><img src="<?=base_url()?>webroot/user_panel/assets/img/product/sp_products01.png" alt=""></a>
                                            </div>
                                            <div class="sp-product-content">
                                                <div class="rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                </div>
                                                <h6 class="title"><a href="shop-details.html">Uncle Bens Vanla Ready Pice</a></h6>
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
                                    </div>
                                    <div class="col-xl-3 col-md-4 col-sm-6">
                                        <div class="sp-product-item">
                                            <div class="sp-product-thumb">
                                                <span class="batch discount">25%</span>
                                                <a href="shop-details.html"><img src="<?=base_url()?>webroot/user_panel/assets/img/product/sp_products15.png" alt=""></a>
                                            </div>
                                            <div class="sp-product-content">
                                                <div class="rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                </div>
                                                <h6 class="title"><a href="shop-details.html">Broccoli Bens Vanla Ready Pice</a></h6>
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
                                    </div>
                                    <div class="col-xl-3 col-md-4 col-sm-6">
                                        <div class="sp-product-item">
                                            <div class="sp-product-thumb">
                                                <span class="batch">New</span>
                                                <a href="shop-details.html"><img src="<?=base_url()?>webroot/user_panel/assets/img/product/sp_products13.png" alt=""></a>
                                            </div>
                                            <div class="sp-product-content">
                                                <div class="rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                </div>
                                                <h6 class="title"><a href="shop-details.html">Aubergine Bens Ready Pice</a></h6>
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
                                    </div>
                                    <div class="col-xl-3 col-md-4 col-sm-6">
                                        <div class="sp-product-item">
                                            <div class="sp-product-thumb">
                                                <span class="batch discount">25%</span>
                                                <a href="shop-details.html"><img src="<?=base_url()?>webroot/user_panel/assets/img/product/sp_products14.png" alt=""></a>
                                            </div>
                                            <div class="sp-product-content">
                                                <div class="rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                </div>
                                                <h6 class="title"><a href="shop-details.html">Onion Bens Vanla Ready Pice</a></h6>
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
                                </div>
                            </div>
                            <!--<div class="pagination-wrap">
                                <ul>
                                    <li class="prev"><a href="shop.html">Prev</a></li>
                                    <li><a href="shop.html">1</a></li>
                                    <li class="active"><a href="shop.html">2</a></li>
                                    <li><a href="shop.html">3</a></li>
                                    <li><a href="shop.html">4</a></li>
                                    <li><a href="shop.html">...</a></li>
                                    <li><a href="shop.html">10</a></li>
                                    <li class="next"><a href="shop.html">Next</a></li>
                                </ul>
                            </div>-->
                        </div>
                    </div>
                </div>
            </section>
            <!-- shop-area-end -->

        </main>
        <!-- main-area-end -->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    //alert('+++');

$(document).ready(function(){
    $("#slider-range").slider({
        range: true,
        min: 0,
        max: 1000,
        values: [0, 1000],
        slide: function (event, ui) {
            $("#amount").val("₹" + ui.values[0] + " - ₹" + ui.values[1]);
        }
    });
    $("#amount").val("₹" + $("#slider-range").slider("values", 0) + " - ₹" + $("#slider-range").slider("values", 1));

});
</script>