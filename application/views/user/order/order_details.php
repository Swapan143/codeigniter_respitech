
        <!-- main-area -->
        <main>

            <!-- breadcrumb-area -->
            <div class="breadcrumb-area breadcrumb-bg-two d-print-none">
                <div class="container custom-container">
                    <div class="row">
                        <div class="col-12">
                            <div class="breadcrumb-content">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?=base_url('home')?>">Home</a></li>
                                        
                                        <li class="breadcrumb-item active" aria-current="page">Order Details</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- breadcrumb-area-end -->
           
            <div class="container main-cont">
                <section class="container products-section shop--area pt-90 pb-90">
                    <div class="container">
                        <div class="row">
                             
                
                            <div class="col-xl-12 col-lg-12 col-md-12">
                                <div class="crtmnd">
                                    <div class="row d-print-none">
                                        <div class="col-md-6 col-sm-6">
                                            <div class="cbstl">
                                                <h4>Order Detail</h4>
                                            </div>
                                        </div>
                                        <div class="col-md-6  col-sm-6">
                                            <div class="order-button">
                                                <input type="button" class="btn" onclick="myFunction()" value="Print Order Detail"  />
                                            </div>
                                        </div>
                                    </div>
                        
                            <?php 
                            $total_amount=0;
                            foreach($order_product as $val_order){
                                

                                    if($val_order->status=="Cancel"){}else {

                                    $date=$val_order->order_date;
                                    $ex=explode("-",$date);
                                    $year=$ex[0];
                                    $month=$ex[1];
                                    $day=$ex[2];

                                    $address_id=$val_order->address_id;
                                    $quantity=$val_order->quantity;
                                    $sell_price=$val_order->sell_price;
                                    $amount=(int)$sell_price*$quantity;
                                    $total_amount +=(int)$amount;
                                }
                            }
                            
                                  $this->db->where('uniqcode', $address_id);
                                   $address_name=$this->db->get('tbl_users_delivery_address')->result();
                                    foreach ($address_name as  $value_address) 
                                    { 
                                             
                                    }
                                ?>

                                    <div class="sec-cont">
                                        <div class="row">     
                 
                                            <div class="col-md-12 p-0">
                                                <div class="odrtlp1">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <p><span style="font-weight:500;">Order ID : </span> #<?php echo $val_order->order_code;?> </p>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <p><span style="font-weight:500;">Order Date : </span> <?php echo $day;?>/<?php echo $month;?>/<?php echo $year;?></p>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <p><span style="font-weight:500;">Order Total : </span>   ₹<?php echo number_format($total_amount, 2, '.', ',');?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>  
            
                                            <div  class="table-responsive">
            
                                                <table class="table" style="border-top:1px solid #ddd;font-size:15px;">
                                                    <tr>
                                                        <td style="border:none;padding:3px 0;" ><span style="font-weight:500;">Name : </span><?php echo $value_address->name;?></td>
                                                    </tr>
                                                    <!--<tr>
                                                        <td style="border:none;padding:3px 0;" ><span style="font-weight:500;">Email : </span> Info@gmail.com</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="border:none;padding:3px 0;"><span style="font-weight:500;">Mobile No. : </span> 848151894</td>
                                                    </tr>-->
                                                    <tr>    
                                                        <td style="border:none;padding:3px 0;"><span style="font-weight:500;">Address : </span><?php echo $value_address->address_details;?></td>
                                                    </tr>
                                                    
                                                    
                                                     <tr>    
                                                        <td style="border:none;padding:3px 0;"><span style="font-weight:500;"></span><?php echo $value_address->city_dist_town;?> - <?php echo $value_address->pin_code;?> , <?php echo $value_address->state;?></td>
                                                    </tr>
                                                     
                                                </table>
                                            </div>
                                            <div  class="table-responsive">
                 
                                                <table class="table table-bordered" style="font-size:14px;border-top: 1px solid #ddd;margin-bottom:10px;">
                                                    <tbody>
                                                        <tr>
                                                            <th>
                                                                Product Details
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <table class="table table-bordered " style="margin: 2px 0;font-size:14px;">
                                                                    <tbody>

                                                                        <tr>
                                                                            <th>Product</th>
                                                                            <th>Product Id</th>
                                                                            <th>Product Name</th>
                                                                            <th>Product Size</th>
                                                                            <th>Rate (Rs.)</th>
                                                                            <th>Quantity</th>
                                                                            <th>Total (Rs.)</th>
                                                                        </tr> 
                                                                    <?php
                                                                    $total_amount12=0;
                                                            foreach($order_product as $val_order){
                                
                                                                    if($val_order->status=="Cancel"){}else{            
                                            
                                                            $address_id=$val_order->address_id;
                                                            $product_id=$val_order->product_id;
                                                    $product_features_id=$val_order->product_features_id;


                                                        $quantity=$val_order->quantity;
                                                        $sell_price=$val_order->sell_price;
                                                        $amount1=(int)$sell_price*$quantity;
                                                        $total_amount12 +=(int)$amount1;

                                                    $this->db->where('uniqcode', $product_id);
                                                    $product=$this->db->get('tbl_product')->result();
                                                    foreach ($product as  $value_pro) 
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


                                                    $this->db->where('product_id', $product_id);
                                                    $this->db->where('uniqcode', $product_features_id);
                                                    $product_feture_size=$this->db->get('tbl_product_features')->result();
                                
                                                    foreach ($product_feture_size as $feturesizevalue) {
                                                        
                                                    }

                                                    $this->db->where('uniqcode', $feturesizevalue->size);
                                                    
                                                    $product_size=$this->db->get('tbl_size')->result();
                                
                                                    foreach ($product_size as $sizevalue) {
                                                        
                                                    }
                                                                            
                                                                        ?>
                                                                        <tr>
                                                                            <td><img src="<?=base_url('webroot/adminImages/product/web/'.$img.'')?>" class="responsive-image" style="width: 50px;height: 50px"></td>
                                                                            <td><?php echo $value_pro->uniqcode;?></td>
                                                                            <td><?php echo $value_pro->product_name;?></td>
                                                                            <td><?php echo $sizevalue->size;?></td>
                                                                            <td>₹<?php echo $val_order->sell_price;?></td>
                                                                            <td><?php echo $val_order->quantity;?></td>
                                                                            <td>₹<?php $amount=(int)$val_order->sell_price*$val_order->quantity; echo number_format($amount, 2, '.', ',');?></td>
                                                                        </tr>
                                                                    <?php } }?>
                                                                        
                                                                        <tr>
                                                                            <td colspan="6" class="text-right">Sub-Total</td>
                                                                            <td>₹<?php echo number_format($total_amount12, 2, '.', ',');?></td>
                                                                        </tr>
                                                                    
                                                                        <tr>
                                                                            <td colspan="6" class="text-right" >Shipping Charge</td>
                                                                            <td>₹00.00</td>
                                                                        </tr>
                                                                             
                                                                        <tr>
                                                                            <td colspan="6" class="text-right" >Grand Total(Round Off)</td>
                                                                            <td >₹<?php echo number_format($total_amount12, 2, '.', ',');?></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <p>Your ordered goods will be billed and delivered to the following address</p>
                       
                                            <div  class="table-responsive">
                             
                                                <table class="table table-bordered " style="font-size:14px;">
                                                    <tbody>
                                                        <tr>
                                                            <th >Delivery Address</th>
                                                            <th>Billing Address</th>
                                                        </tr>
                                                        <tr>

                                                        <?php 
                            $total_amount=0;
                            foreach($order_product as $val_order){
                                
                                    if($val_order->status=="Cancel"){}else{
                                    $address_id=$val_order->address_id;
                                    $user_id=$val_order->user_id;
                                    $quantity=$val_order->quantity;
                                    $sell_price=$val_order->sell_price;
                                    $amount=(int)$sell_price*$quantity;
                                    $total_amount +=(int)$amount;
                                }
                            }
                            
                                  $this->db->where('uniqcode', $address_id);
                                   $address_name=$this->db->get('tbl_users_delivery_address')->result();
                                    foreach ($address_name as  $value_address) 
                                    { 
                                             
                                    }


                                    $this->db->where('uniqcode', $user_id);
                                   $user_data=$this->db->get('tbl_users')->result();
                                    foreach ($user_data as  $value_user) 
                                    { 
                                             
                                    }
                                ?>


                                                            <td>
                                                                <!--s-->
                                                                <?php echo $value_address->name;?><br>
                                                           
                                                                Mobile No : <?php echo $value_address->mobile_no;?><br>
                                                                Alternate Mobile No : <?php echo $value_address->alternative_mob_no;?><br>
                                                                Landmark : <?php echo $value_address->landmark;?><br>
                                                                Locality : <?php echo $value_address->locality;?><br>
                                                                <?php echo $value_address->city_dist_town;?> - <?php echo $value_address->pin_code;?> , <?php echo $value_address->state;?><br>
                                                               
                                                                
                                                            </td>
                                                            <td>
                                                               <!--B>-->
                                                               <?php echo $value_user->name;?><br>
                                                               <?php echo $value_user->mobile_no ;?><br>
                                                               <?php echo $value_user->email ;?><br>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div  class="table-responsive">
                            
                                                <table class="table" style="font-size:14px;">
                                                    <tr>
                                                       <th style="border-top: none; letter-spacing:1px; padding:3px 0px;">Payment Details - </th>
                                                    </tr>
                                                    <tr>
                                                       <td style="border-top: none; letter-spacing:1px; padding:3px 0px;"><span style="font-weight:500;">Paid - </span> #<?php echo $val_order->payment_type;?></td>
                                                    </tr>
                                                    <tr>
                                                       <td style="border-top: none; letter-spacing:1px; padding:3px 0px;"><span style="font-weight:500;">Transaction ID - </span>#<?php echo $val_order->payment_id;?></td>
                                                    </tr>
                                                    <tr>
                                                       <td style="border-top: none; letter-spacing:1px; padding:3px 0px;"><span style="font-weight:500;">Paid Amount – </span>₹<?php echo number_format($total_amount, 2, '.', ',');?></td>
                                                    </tr>
                                               </table>  
                                            </div>
              
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </main>
        <!-- main-area-end -->





<script>
    function myFunction() {
    window.print();
}
</script>