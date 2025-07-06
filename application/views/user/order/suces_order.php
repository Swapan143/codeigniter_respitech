

        <!-- main-area -->
        <main>

            <!-- breadcrumb-area -->
            <!-- <div class="breadcrumb-area breadcrumb-bg-two">
                <div class="container custom-container">
                    <div class="row">
                        <div class="col-12">
                            <div class="breadcrumb-content">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                        <li class="breadcrumb-item"><a href="shop.html">Shop</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Spices Food</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- breadcrumb-area-end -->

            <?php 
            $total=0;
            foreach ($order_product as $value) {

               $sell_price=$value->sell_price;
               $quantity=$value->quantity;

               $amount=(int)$sell_price*$quantity;
                $total +=(int)$amount;
            }
            ?>

            <div class="container" align="center">
                <div class="card successfully-card" style="width: 30rem;">
                  <div class="card-body">
                    <h4 class="card-title">Your order has been palced sucessfully</h4><br>
                    <h6 class="card-title">Order Details</h6>
                    <p class="card-text"><strong>Order Id</strong> &ensp;:&ensp; <?php echo $value->order_code;?></p>
                    <p class="card-text"><strong>Order date</strong> &ensp;:&ensp; <?php echo $value->order_date;?></p>
                    <p class="card-text"><strong>Order Total</strong> &ensp;:&ensp; <?php echo $total;?></p>
                    <p class="card-text"><strong>Payment Method</strong> &ensp;:&ensp; <?php echo $value->payment_type;?></p>
                    <p class="card-text"><strong>Payment Status</strong> &ensp;:&ensp; Paid</p>
                    <p class="card-text"><strong>Txn Id</strong> &ensp;:&ensp; <?php echo $value->payment_id;?></p>
                    <a href="<?=base_url('order-details/'.$value->order_code)?>" class="btn btn-primary">View Order Details</a>
                  </div>
                </div>
            </div>

        </main>
        <!-- main-area-end -->






