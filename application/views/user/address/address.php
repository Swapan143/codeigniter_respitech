
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
                                        <!--<li class="breadcrumb-item"><a href="index.html"></a></li>-->
                                        <li class="breadcrumb-item active" aria-current="page">New Address</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- breadcrumb-area-end -->

            <!-- checkout-area -->
            <div class="checkout-area pt-90 pb-90">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <!--<div class="checkout-progress-wrap">
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="checkout-progress-step">
                                    <ul>
                                        <li class="active">
                                            <div class="icon"><i class="fas fa-check"></i></div>
                                            <span>Shipping</span>
                                        </li>
                                        <li>
                                            <div class="icon">2</div>
                                            <span>Order Successful</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>-->
                            <div class="checkout-form-wrap">
                               
                                    <!--<div class="checkout-form-top">
                                        <h5 class="title">Contact information</h5>
                                        <p>Already have an account? <a href="contact.html">Log in</a></p>
                                    </div>
                                    <input type="text" placeholder="Email or Mobile Phone Number *">
                                    <div class="news-and-offers custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="nao">
                                        <label class="custom-control-label" for="nao">Keep me up to date on news and offers</label>
                                    </div>-->
                                    <div class="building-info-wrap">
                                        <!-- <h5 class="title" onclick="address_show();">Add New Address</h5> -->
                                        <button type="button" class="title" onclick="address_show();">Add New Address&ensp;<i class="fa-solid fa-plus"></i></button>
                                        <div id="address" style="display: none;">
                                         <form id="address-add" action="<?=base_url('address-add-order')?>" class="form-class" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="text" name="name" id="name" class="form-control only_character validate[required,custom[fullname]]" data-errormessage-value-missing="Name is required" data-prompt-position="bottomLeft" placeholder="Type name *" maxlength="45">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" name="mobile_no" id="mobile_no" class="form-control only_integer validate[required,custom[phone]]minSize[10],maxSize[10]" data-errormessage-value-missing="Phone number is required" data-prompt-position="bottomLeft" placeholder="Enter phone number *" maxlength="10">
                                            </div>
                                        </div>
                                        <!--<input type="text" placeholder="Company Name ( optional )">
                                        <input type="text" placeholder="Country / Region *">
                                        <input type="text" placeholder="Street Address *">-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="text" placeholder="Enter The pincode" id="pincode" name="pin_code" class="form-control only_integer validate[required] " maxlength="6" data-errormessage-value-missing="pincode is required" data-prompt-position="bottomLeft">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" name="locality" id="locality" class="form-control form-control" data-prompt-position="bottomLeft" placeholder="Enter Locality " maxlength="100">
                                            </div>
                                            
                                            <textarea class="form-control validate[required,minSize[4]]" rows="3" id="address_details" name="address_details" data-errormessage-value-missing="Address is required" data-prompt-position="bottomLeft" placeholder="Enter Address *"></textarea>

                                            <div class="col-md-6">
                                                <input type="text" name="city_dist_town" id="city" class="form-control validate[required]" data-errormessage-value-missing="District is required" data-prompt-position="bottomLeft" placeholder="Enter district" maxlength="200">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" name="state" id="district" class="form-control validate[required]" data-errormessage-value-missing="State is required" data-prompt-position="bottomLeft" placeholder="Enter state" maxlength="200">
                                            </div>

                                            <div class="col-md-6">
                                                <input type="text" name="landmark" id="landmark" class="form-control" data-prompt-position="bottomLeft" placeholder="Enter Landmark " maxlength="100">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" name="alternative_mob_no" id="alternative_mob_no" class="form-control only_integer minSize[10],maxSize[10]" maxlength="10">
                                            </div>
                                        </div>

                                        <input type="email" name="email" id="email" class="form-control validate[required,custom[email]]" data-errormessage-value-missing="Email is required" data-prompt-position="bottomLeft" placeholder="Enter Email *" maxlength="45">

                                       
                                        <!--<div class="different-address-wrap">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="sda">
                                                <label class="custom-control-label" for="sda">Ship to a Different Address?</label>
                                            </div>
                                            <div class="account-create-info">
                                                <a href="contact.html">Create an Account <i class="fas fa-user"></i></a>
                                            </div>
                                        </div>-->
                                        

                                        <button type="submit" id="add_sub" class="btn">Save</button>
                                       </form>

                                       </div>


                                    </div>

                                    <?php 
                                    if(empty($allAddress)){ 

                                    } else {
                                    foreach ($allAddress as $key => $value) {
                                        
                                        ?>
                                    
                                    <div class="card mb-4">
                                        <div class="card-body">
                                            <p class="text-uppercase fw-bold mb-3 text-font">Your Address &emsp;&emsp;<input id="radio<?=$key?>" class="form-check-input" type="radio" name="order_address" value="<?=$value->uniqcode?>"<?php if($value->select_address==1){echo 'checked';}?>></p>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <p><i class="fas fa-caret-right"></i> <?php echo $value->name;?></p>
                                                    <p><i class="fas fa-caret-right"></i> <?php echo $value->address_details;?></p>
                                                    <p><i class="fas fa-caret-right"></i> <?php echo $value->mobile_no;?></p>
                                           
                                                </div>
                                                <div class="col-md-7 edit-add">
                                                    <a type="button" class="btn btn-outline-danger float-end button-color" href="<?=base_url('address-destroy-order/'.$value->uniqcode)?>" onclick="return confirm('Are you sure delete this address?')" data-mdb-ripple-color="danger" style="margin-left: 5px; padding: 14px;">
                                                        Remove
                                                    </a>

                                                    <!--<button type="button" class="btn btn-outline-dark float-end button-color " data-mdb-ripple-color="dark" onclick="">
                                                        Edit Address
                                                    </button>-->

                                                    <a type="button" class="btn btn-outline-danger float-end button-color" href="<?=base_url('edit-order-address/'.$value->uniqcode)?>" data-mdb-ripple-color="danger" style="margin-left: 5px; padding: 14px;">
                                                        Edit Address
                                                    </a>


                                            
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                <?php } }?>

                            </div>
                        </div>


                                                



                        <div class="col-lg-5">
                            <div class="shop-cart-total order-summary-wrap">
                                <h3 class="title">Order Summary</h3>

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

                                                    $this->db->where('uniqcode', $size);
                                                    $product_size=$this->db->get('tbl_size')->result();

                                                    foreach ($product_size as  $value_pro_size) 
                                                    { 
                                                    }

                                                    $this->db->where('uniqcode', $product_features_id);
                                                    $this->db->order_by('id', 'DESC');
                                                    $this->db->limit(1);
                                                    $product_feture=$this->db->get('tbl_product_features')->result();
                                
                                                    foreach ($product_feture as $feturevalue) {
                                                        $item_img=unserialize($feturevalue->image);
                                                        $img=$item_img[0];
                                                    }

                                                    $amount=(int)$value_pro_rate->sell_price*$value->quantity;
                                                    $total_amount +=(int)$amount;
                                                
                                            ?>
                                <div class="os-products-item">
                                    <div class="thumb">
                                <a href="#"><img src="<?=base_url('webroot/adminImages/product/web/'.$img.'')?>" alt=""></a>
                                    </div>
                                    <div class="content">
                                        <h6 class="title"><a href="#"><?php echo $value_pro->product_name;?></a></h6>
                                        <span class="price">Price(₹<?php echo $value_pro_rate->sell_price;?>) - Qty(<?php echo $value->quantity;?>)<br> Size(<?php echo $value_pro_size->size;?>)</span>
                                    </div>
                                    <div class="remove">₹<?php $amount=(int)$value_pro_rate->sell_price*$value->quantity; echo number_format($amount, 2, '.', ',');?></div>
                                </div>
                            <?php }?>
                                <div class="shop-cart-widget">
                                    <form action="#">
                                        <ul>
                                            <li class="sub-total"><span>Subtotal</span> ₹<?php echo number_format($total_amount, 2, '.', ',');?></li>
                                            <li>
                                                <span>Shipping</span>
                                                <div class="shop-check-wrap">
                                                    <p>₹000.00</p>
                                                    <!--<div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                        <label class="custom-control-label" for="customCheck1">Free Shipping</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck2">
                                                        <label class="custom-control-label" for="customCheck2">LOCAL PICKUP: $5.00</label>
                                                    </div>-->
                                                </div>
                                            </li>
                                            <li class="cart-total-amount"><span>Total Price</span> <span class="amount">₹<?php echo number_format($total_amount, 2, '.', ',');?></span></li>
                                        </ul>
                                        <!--<div class="payment-method-info">
                                            <div class="paypal-method-flex">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck5">
                                                    <label class="custom-control-label" for="customCheck5">Cash on delivery</label>
                                                    <p>Pay with cash upon delivery.</p>
                                                </div>
                                            </div>
                                            <div class="paypal-method-flex">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck6">
                                                    <label class="custom-control-label" for="customCheck6">PayPal</label>
                                                </div>
                                                <div class="paypal-logo"><img src="<?=base_url()?>webroot/user_panel/assets/img/images/card.png" alt=""></div>
                                            </div>
                                        </div>
                                        <div class="payment-terms">
                                            <p>The purpose Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</p>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck7">
                                                <label class="custom-control-label" for="customCheck7">I agree to the website terms and conditions</label>
                                            </div>
                                        </div>-->
                                        <!--<a href="" class="btn">Place order</a>-->
                                        <button type="button" class="btn" onclick="placeOrder1();">Place order</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
            <!-- checkout-area-end -->

        </main>
        <!-- main-area-end -->

