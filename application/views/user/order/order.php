
        <!-- main-area -->
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
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
                                        <!--<li class="breadcrumb-item"><a href="shop.html">Order</a></li>-->
                                        <li class="breadcrumb-item active" aria-current="page">Order</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- breadcrumb-area-end -->

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
                                                }
                                                $_SESSION['total_amount']=$total_amount;
                                            ?>

            <div class="container-fluid">
                <div class="card p-5 hole">
                    <div>
                        <h4 class="heading">Payment Method</h4>
                        <p class="text">Please make the payment to start enjoying all the features of our premium plan as soon as possible</p>
                    </div>
                    <div class="pricing p-3 rounded mt-4 d-flex justify-content-between">
                        <div class="images d-flex flex-row align-items-center"> <!-- <img src="./images/online.jpg" class="rounded" width="60"> -->
                            <i class="fas fa-coins" style="font-size: 40px;"></i>
                            <div class="d-flex flex-column ml-4"> <span class="business">Total Amount</span> <span class="plan"></span> </div>
                        </div>
                        <!--pricing table-->
                        <div class="d-flex flex-row align-items-center"> <sup class="dollar font-weight-bold"><i class="fas fa-rupee-sign"></i></sup> <span class="amount ml-1 mr-1"><?php echo number_format($total_amount, 2, '.', ',');?></span>   </div> <!-- /pricing table-->
                    </div> <span class="detail mt-5">Payment details</span>
                    <br>
                    <div class="row py-4 cod">
                        <div class="col-sm-6">
                            <h4><b>Cash On Delivery</b></h4>
                        </div>
                        <div class="col-sm-6">
                            <button type="button" class="btn form-control" data-toggle="modal" data-target="#editAddress"><span>Proceed to payment ►</span></button>
                        </div>
                    </div>
                    <div class="row cod">
                        <div class="col-sm-6">
                            <h4><b>Online Payment</b></h4>
                        </div>
                        <div class="col-sm-6">
                            <button type="button" class="btn form-control" onclick="online_pay();"><span>Proceed to payment ►</span></button>
                        </div>
                    </div>

                </div>
            </div>

        </main>
        <!-- main-area-end -->



<div class="modal" id="editAddress" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content captcha-modal">
            <div class="modal-header">
                <h5 class="modal-title">Captcha</h5>
                
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <h6 id="msg_captcha">Select Recaptcha</h6>
            <div class="modal-body">

                <form method="post" name="check_captcha" id="check_captcha">
                <div class="captcha-box">
                    <div class="g-recaptcha" data-sitekey="6LeHiV0hAAAAAN4wABZgz2EJWyKdvelalXSFYQ1k"></div>

                    <input type="hidden" name="address_id" id="address_id" value="<?php echo $address_id;?>">

                    <!--<input class="form-control" type="text" name="capcha" id="capcha">
                    <input type="hidden" name="hidencapcha" id="hidencapcha" value="100">
                    <div class="captcha-number">
                        <h1 id="showCapcha">55555</h1>
                        <button class="refresh"><i class="fas fa-sync-alt" style="color: #ffffff; font-size: 25px;"></i></button>
                    </div>-->
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Pay On Delivery</button>
                </div>
            </form>

            </div>
        </div>
    </div>
</div>


