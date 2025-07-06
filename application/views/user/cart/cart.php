<style type="text/css">
    
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
    background: #da4176;
    color: #fff;
    font-size: 14px;
    margin-top: 30px;
    padding: 10px 25px;
    border-radius: 5px;
    cursor: pointer;
}





</style>
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
                                        <!--<li class="breadcrumb-item"><a href="index.html">Pages</a></li>-->
                                        <li class="breadcrumb-item active" aria-current="page">Our Cart</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- breadcrumb-area-end -->

            <!-- cart-area -->

            <?php 
            if(empty($card_value)){?>

                <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="dvbxc text-center">
                    <br><br>
                    <h5>Your Cart Is Empty</h5>
                    <a href="<?=base_url('home')?>" class="plcod" style="background: green;"> Continue Shopping</a>
                    <br>
                    <br><br>
                </div>
            </div>
        </div>
            <?php } else {?>


            <div class="cart-area pt-90 pb-90">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-7">
                            <div class="cart-wrapper">
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead>
                                            <tr>
                                                <th class="product-thumbnail"></th>
                                                <th class="product-name">Product</th>
                                                <th class="product-price">Price</th>
                                                <th class="product-quantity">QUANTITY</th>
                                                <th class="product-subtotal">SUBTOTAL</th>
                                                <th class="product-delete"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
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

                                            <tr>
                                                <td class="product-thumbnail">
                                                    <a href="#"><img src="<?=base_url('webroot/adminImages/product/web/'.$img.'')?>" alt=""></a>

                                                </td>


                                                <td class="product-name">
                                                    <h4><a href="#"><?php echo $value_pro->product_name;?></a></h4>
                                                </td>
                                                <td class="product-price">₹ <?php echo $value_pro_rate->sell_price;?> (<?php echo $value_pro_size->size;?>)</td>
                                                <td class="product-quantity">
                                                    <div class="cart--plus--minus">


                                                <input type="button" value="-" class="minus" id="addrm" x="<?php echo $value->uniqcode;?>">
                                                <input class="quantity-number qty" type="text" value="<?php echo $value->quantity;?>" min="1" max="10" id="qty4<?php echo $value->uniqcode;?>" name="qty4" readonly>
                                                <input type="button" value="+" class="plus" id="remrm" x="<?php echo $value->uniqcode;?>">


                                                    <input type="hidden" id="addition<?php echo $value->uniqcode;?>" class="plus " x="<?php echo $value->uniqcode;?>" value="<?php echo $value_pro_rate->quantity;?>">

                                                    <input type="hidden" name="qty_new" id="qty_new<?php echo $value->uniqcode;?>" value="1">

                                                    </div>

                                                </td>
                                                <td class="product-subtotal"><span>₹ <?php $amount=(int)$value_pro_rate->sell_price*$value->quantity; echo number_format($amount, 2, '.', ',');?></span></td>
                                                <td class="product-delete">
                                                <button type="button" style="border: none;"><i class="far fa-trash-alt" onclick="card_delete('<?php echo $value->uniqcode;?>');"></i></button>

                                               </td>

                                            </tr>
                                        <?php }?>
                                        
                                            <!--<tr>
                                                <td class="product-thumbnail"><a href="shop-details.html"><img src="<?=base_url()?>webroot/user_panel/assets/img/product/cart_img02.jpg" alt=""></a></td>
                                                <td class="product-name">
                                                    <h4><a href="shop-details.html">Dannon Capcicam</a></h4>
                                                </td>
                                                <td class="product-price">$ 40.00</td>
                                                <td class="product-quantity">
                                                    <div class="cart--plus--minus">
                                                        <form action="#" class="num-block">
                                                            <input type="text" class="in-num" value="1" readonly="">
                                                            <div class="qtybutton-box">
                                                                <span class="plus"><i class="fas fa-angle-up"></i></span>
                                                                <span class="minus dis"><i class="fas fa-angle-down"></i></span>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </td>
                                                <td class="product-subtotal"><span>$ 40.99</span></td>
                                                <td class="product-delete"><a href="#"><i class="far fa-trash-alt"></i></a></td>
                                            </tr>-->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- <div class="shop-cart-bottom">
                                <div class="cart-coupon">
                                    <form action="#">
                                        <input type="text" placeholder="Enter Coupon Code...">
                                        <button class="btn">Apply Coupon</button>
                                    </form>
                                </div>
                                <div class="continue-shopping">
                                    <a href="shop.html" class="btn">update Cart</a>
                                </div>
                            </div> -->
                        </div>
                        <div class="col-xl-5 col-lg-12">
                            <div class="shop-cart-total">
                                <h3 class="title">Cart Totals</h3>
                                <div class="shop-cart-widget">
                                    <form action="#">
                                        <ul>
                                            <li class="sub-total"><span>Subtotal</span> ₹<?php echo number_format($total_amount, 2, '.', ',');?></li>
                                            <li>
                                                <span>Shipping</span>
                                                <div class="shop-check-wrap">
                                                    <div class="custom-control">
                                                        <!--<input type="checkbox" class="custom-control-input" id="customCheck1">
                                                        <label class="custom-control-label" for="customCheck1">Free Shipping</label>-->
                                                        <p>₹ 00.00</p>
                                                    </div>
                                                    <!--<div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck2">
                                                        <label class="custom-control-label" for="customCheck2">LOCAL PICKUP: $5.00</label>
                                                    </div>-->
                                                </div>
                                            </li>
                                            <li class="cart-total-amount"><span>Total Price hello</span> <span class="amount">₹ <?php echo number_format($total_amount, 2, '.', ',');?></span></li>
                                        </ul>
                                        <a href="<?=base_url('address')?>" class="btn">PROCEED TO CHECKOUT</a>
                                    </form>


<div class="mndok" style="display:none;">
    <div class="crtpoo">
        <h3 id="all_msg"></h3>
        <button onclick="popup_hide();" style="
    background: green;
">OK</button>
    </div>
</div>




                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php }?>
            <!-- cart-area-end -->


        </main>



        
        <!-- main-area-end -->

<script type="text/javascript">
    
    function popup_hide()
    {
        $(".mndok").hide();
    }
</script>