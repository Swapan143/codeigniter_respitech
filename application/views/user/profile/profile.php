
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
                                    <!--<li class="breadcrumb-item"><a href="shop.html">Shop</a></li>-->
                                    <li class="breadcrumb-item active" aria-current="page">Profile</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb-area-end -->

        <!--My Account section start-->
        <div class="my-account-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50  pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
            <div class="container">
                <div class="row">
                    
                    <div class="col-12">
                        <div class="row">
                            <!-- My Account Tab Menu Start -->
                            <div class="col-lg-3 col-12">
                                <div class="myaccount-tab-menu nav" role="tablist">
    
                                    <a href="#orders" class="active" data-toggle="tab"><i class="fa fa-cart-arrow-down"></i> Orders</a>

                                    <a href="#wishlist" data-toggle="tab"><i class="fa fa-cart-arrow-down"></i> Wishlist</a>
    
                                    <a href="#payment-method" data-toggle="tab"><i class="fa fa-credit-card"></i>Address Details</a>
    
                                    <a href="#account-info" data-toggle="tab"><i class="fa fa-user"></i> Account Details</a>
    
                                    <a href="<?=base_url('logout')?>"><i class="fa fa-sign-out"></i> Logout</a>
                                    
                                </div>
                            </div>
                            <!-- My Account Tab Menu End -->
    
                            <!-- My Account Tab Content Start -->
                            <div class="col-lg-9 col-12">
                                <div class="tab-content" id="myaccountContent">

                                    <!-- Single Tab Content Start -->
                                    <div class="tab-pane fade" id="wishlist" role="tabpanel">
                                        <div class="myaccount-content">
                                            <h3>Wishlist</h3>
                                            <p><b style="color: red;display: none;" id="delete_wish"> WISHLIST REMOVE SUCESS</b></P>
                                            <?php

                                     $userId=$this->session->userdata('loginDetail')->uniqcode;
                                     $this->db->where('user_id', $userId);
                                    $wish_list=$this->db->get('tbl_wishlist')->result();
                                        //$this->data['wish_list']=$user_wishlist;
                                            //print_r($wish_list);
                                           
                                            if(empty($wish_list)){
                                                echo "Empty Wishlist";


                                              } else {
                                                
                                                ?>
                                            <div class="container">
                                                <div class="row"> 
                                                    <div class="col-12">            
                                                        <!-- Cart Table -->
                                                        <div class="cart-table table-responsive mb-30">
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="pro-thumbnail">Image</th>
                                                                        <th class="pro-title">Product</th>
                                                                        <th class="pro-price">Price</th>
                                                                        <th class="pro-remove">Remove</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                <?php 
                                                                foreach($wish_list as $val_wish){
                                                                    $wish_uniqcode=$val_wish->uniqcode;
                                                                    $product_id=$val_wish->product_id;
                                                                    $product_features_id=$val_wish->product_features_id;
                                                                    
                                                                    $this->db->where('product_id', $product_id);
                                                                    $this->db->where('uniqcode', $product_features_id);
                                                                    //$this->db->order_by('id', 'DESC');
                                                                    //$this->db->limit(1);
                                                                    $product_feture=$this->db->get('tbl_product_features')->result();
                                                                        foreach ($product_feture as $feturevalue) {
                                                                         
                                                                         $size_id=$feturevalue->size;
                                                                         $item_img=unserialize($feturevalue->image);
                                                                         $img=$item_img[0];
                                                                        }

                                    $this->db->where('uniqcode', $size_id);
                                    $product_size=$this->db->get('tbl_size')->result();
                                    foreach ($product_size as $sizevalue) {
                                            
                                        }




                                                                    $this->db->where('uniqcode', $product_id);
                                                                    $product=$this->db->get('tbl_product')->result();
                                                                        foreach ($product as $product_value) {
                                                                         
                                                                        }

                                    $this->db->where('product_features_id', $product_features_id);
                                    $product_val=$this->db->get('tbl_total_stock')->result();
                                    foreach ($product_val as $provalue) {

                                        }

                        $productname=$product_value->product_name;
                        $product_name_re = str_replace(' ', '', $productname);
                        $product_string = preg_replace('/[^A-Za-z0-9\-]/', '-', $product_name_re);




                                        
                                                                    
                                                                    ?>
                                                                    <tr>
                                                                        <td class="pro-thumbnail">
                                                <a href="<?=base_url('best-offer-product/details/'.$product_string.'?proid='.$product_value->uniqcode.'&slug='.$product_value->slug.'&cid='.$product_value->category_id)?>">
                                                                                <img src="<?=base_url('webroot/adminImages/product/web/'.$img.'')?>" alt="Product">
                                                                            </a>
                                                                        </td>
                                                                        <td class="pro-title">
                                                                            <a href="<?=base_url('best-offer-product/details/'.$product_string.'?proid='.$product_value->uniqcode.'&slug='.$product_value->slug.'&cid='.$product_value->category_id)?>"><?php echo $product_value->product_name;?>    (Size => <?php echo $sizevalue->size;?>)</a>
                                                                        </td>
                                                                        <td class="pro-price">
                                                                            <span>₹<?php echo $provalue->sell_price;?></span>
                                                                        </td>
                                                                        <td class="pro-remove">
                                                                            <!--<a href="#" onclick="wish_delete('<?php echo $wish_uniqcode;?>')">
                                                                                <i class="fa-solid fa-circle-minus"></i>
                                                                            </a>-->

                                                                            <button type="button" onclick="wish_delete('<?php echo $wish_uniqcode;?>')"><i class="fa-solid fa-circle-minus"></i></button>

                                                                        </td>
                                                                    </tr> 
                                                                    <?php }?>

                                                                    
                                                                     
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        
                                                    </div>
                                                </div>      
                                            </div>
                                            <?php }?>
                                        </div>
                                    </div>
                                    <!-- Single Tab Content End -->
    
                                    <!-- Single Tab Content Start -->

                                        


                                    <div class="tab-pane fade show active" id="orders" role="tabpanel">
                                        <?php foreach($result as $value)
                                        {
                                            $order_code=$value->order_code;
                                            
                                            $this->db->where('order_code', $order_code);
                                            $order_date=$this->db->get('tbl_order')->result();
                                            foreach($order_date as $value_order_date)
                                            {

                                            }
                                            $ex=explode("-",$value_order_date->order_date);
                                            $year=$ex[0];
                                            $month=$ex[1];
                                            $day=$ex[2];
                                            
                                            ?>
                                        <div class="myaccount-content">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <h6>Orders Id : <?php echo $value->order_code;?></h6>
                                                    <h6>Orders Date: <?php echo $day;?>/<?php echo $month;?>/<?php echo $year;?></h6>

                                                </div>

                                                <?php 
                                                $this->db->where('order_code', $order_code);
                                            $order_date123=$this->db->get('tbl_order')->result();
                                            foreach($order_date123 as $value_order_date123)
                                            { 
                                               if($value_order_date123->status=="Cancel")

                                               {
                                                continue;

                                               } else {


                                                ?>

                                                 <div class="col-sm-6 product-view">
                                                    <a href="<?=base_url('order-details/'.$value->order_code)?>" class="btn">Order Details</a>
                                                </div>
                                                <?php 
                                                break;


                                               }

                                                
                                            }
                                           
                                            
                                                ?>

                                            
                                               
                                            

                                            </div>
                                            
                                            
                                            <div class="myaccount-table table-responsive text-center">
                                                <table class="table table-bordered">
                                                    <thead class="thead-light">
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Image</th>
                                                        <th>Product</th>
                                                        <th>Price</th>

                                                        <th>Order Track</th>
                                                        <th>Order Cancel</th>
                                                    </tr>
                                                    </thead>
    
                                                    <tbody>

                                                    <?php
                                                    $i=1;
                                                    $this->db->where('order_code', $order_code);
                                                    $order_product=$this->db->get('tbl_order')->result();
                                                    foreach($order_product as $value_order)
                                                    {
                                                       
                                                $this->db->where('uniqcode', $value_order->product_features_id);
                                                $this->db->order_by('id', 'DESC');
                                                $this->db->limit(1);
                                                $product_feture=$this->db->get('tbl_product_features')->result();
                                
                                                    foreach ($product_feture as $feturevalue) {
                                                        $item_img=unserialize($feturevalue->image);
                                                        $img=$item_img[0];
                                                    }


                                    $this->db->where('product_features_id', $value_order->product_features_id);
                                                    $product_rate=$this->db->get('tbl_total_stock')->result();

                                                    foreach ($product_rate as  $value_pro_rate) 
                                                    { 
                                             
                                                    }
                                                        
                                                    
                                                    $this->db->where('uniqcode', $value_order->product_id);
                                                    $product=$this->db->get('tbl_product')->result();
                                                    foreach ($product as  $value_pro_name) 
                                                    { 
                                             
                                                    }
                                                        ?>
                                                    <tr>
                                                        <td><?php echo $i;?></td>
                                                        <td><img src="<?=base_url('webroot/adminImages/product/web/'.$img.'')?>" height="90px" width="100px"></td>
                                                        <td><?php echo $value_pro_name->product_name;?></td>
                                                        <td>₹<?php echo $value_pro_rate->sell_price;?></td>
                                                        <td class="order-tracking">
                                                                <?php if($value_order->status=="Cancel"){ } else {?>
                                                            <a href="<?=base_url('order-tracking/'.$value_order->uniqcode)?>">Tracking</a>
                                                                <?php }?>
                                                        </td>

                                                        <!--<td><b><a href="<?=base_url('order-tracking/'.$value_order->uniqcode)?>"style="color: red;">Cancel</a></b></td>-->
                                                        <td class="order-cancel">
                                                            <p style="color: red;display: none;" id="cancel_msg<?php echo $value_order->uniqcode;?>"><b>Order Has Been Cancel</b></p>
                                                            <?php if($value_order->status=="Cancel"){?>
                                                            <p style="color: red;" id="cancel_msg<?php echo $value_order->uniqcode;?>"><b>Order Has Been Cancel</b></p><p style="color: red;"><b>(<?php echo $value_order->datetime;?>)</b></p>
                                                        <?php } else {?>

                                                            <button type="button" onclick="cancel_order('<?php echo $value_order->uniqcode;?>');">Cancel</button>
                                                        <?php }?>
                                                        </td>
                                                    </tr>
                                                   <?php $i++;}?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <br>
                                        <?php }?>

                                        
                                        <!--<div class="myaccount-content">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <h6>Orders Id : xxxxxxxxxxxxxxx</h6>
                                                </div>
                                                <div class="col-sm-6 product-view">
                                                    <a href="#" class="btn">Order Details</a>
                                                </div>
                                            </div>
                                            
                                            
                                            <div class="myaccount-table table-responsive text-center">
                                                <table class="table table-bordered">
                                                    <thead class="thead-light">
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Image</th>
                                                        <th>Product</th>
                                                        <th>Price</th>
                                                    </tr>
                                                    </thead>
    
                                                    <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td><img src="<?=base_url()?>webroot/user_panel/assets/img/images/about1.png" height="90px" width="100px"></td>
                                                        <td>Organic Oil</td>
                                                        <td>₹45</td>
                                                    </tr>
                                                    <tr>
                                                        <td>1</td>
                                                        <td><img src="<?=base_url()?>webroot/user_panel/assets/img/images/about1.png" height="90px" width="100px"></td>
                                                        <td>Organic Oil</td>
                                                        <td>₹45</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>-->

                                    </div>
                                    <!-- Single Tab Content End -->
    
                                    <!-- Single Tab Content Start -->
                                    <div class="tab-pane fade" id="payment-method" role="tabpanel">
                                        <div class="myaccount-content">
                                            <h3>Payment Method</h3>
    
                                            <section>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="card mb-4">
                                                            <div class="card-body card-body-add">
                                                                <div class="col-sm-5">
                                                                    <p class="text-uppercase h4 text-font">Add New Address</p>   
                                                                </div>
                                                                <div class="col-sm-7 add-new">
                                                                    <button type="button" class="btn float-end button-color" data-toggle="modal" data-target=".bd-example-modal-lg" style="text-align: center">
                                                                        <i class="fa-solid fa-plus"></i>
                                                                    </button>
                                                                    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                                        <div class="modal-dialog modal-lg">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title" id="exampleModalLabel">Add New Address</h5>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
    <form class="form-class" id="address-add" action="<?=base_url('user-address-add-order')?>" method="post" enctype="multipart/form-data">
                                                                <div class="row py-2">
                                                                <div class="col">
                                                                <label for="Name">Name</label>
    <input type="text" name="name" id="name" class="form-control only_character validate[required,custom[fullname]]" data-errormessage-value-missing="Name is required" data-prompt-position="bottomLeft" placeholder="Type name *" maxlength="45">
                                                                                        </div>
                                                                                        <div class="col">
                                                                                            <label for="MobileNumber">Mobile Number</label>
                                                                                            <input type="text" name="mobile_no" id="mobile_no" class="form-control only_integer validate[required,custom[phone]]minSize[10],maxSize[10]" data-errormessage-value-missing="Phone number is required" data-prompt-position="bottomLeft" placeholder="Enter phone number *" maxlength="10">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row py-2">
                                                                                        <div class="col">
                                                                                            <label for="PinCode">Pin Code</label>
                                                                                            <input type="text" class="form-control" placeholder="Enter Pin Code" id="pincode" name="pin_code" class="form-control only_integer validate[required] " maxlength="6" data-errormessage-value-missing="pincode is required" data-prompt-position="bottomLeft">
                                                                                        </div>
                                                                                        <div class="col">
                                                                                            <label for="Locality">Locality</label>
                                                                                            <input type="text" name="locality" id="locality" class="form-control form-control" data-prompt-position="bottomLeft" placeholder="Enter Locality " maxlength="100">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row py-2">
                                                                                        <div class="col">
                                                                                            <label for="Address">Address</label>
    <textarea rows="" cols="" class="form-control validate[required,minSize[4]]" id="address_details" name="address_details" data-errormessage-value-missing="Address is required" data-prompt-position="bottomLeft" placeholder="Enter Address *"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row py-2">
                                                                                        <div class="col">
                                                                                            <label for="District">District</label>
                                                                                            <input type="text" name="city_dist_town" id="city" class="form-control validate[required]" data-errormessage-value-missing="District is required" data-prompt-position="bottomLeft" placeholder="Enter district" maxlength="200">
                                                                                        </div>
                                                                                        <div class="col">
                                                                                            <label for="State">State</label>
                                                                                            <input type="text" name="state" id="district" class="form-control validate[required]" data-errormessage-value-missing="State is required" data-prompt-position="bottomLeft" placeholder="Enter state" maxlength="200">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row py-2">
                                                                                        <div class="col">
                                                                                            <label for="Landmark">Landmark</label>
                                                                                            <input type="text" name="landmark" id="landmark" class="form-control" data-prompt-position="bottomLeft" placeholder="Enter Landmark " maxlength="100">
                                                                                        </div>
                                                                                        <div class="col">
                                                                                            <label for="AlternativeMobileNo">Alternative Mobile No</label>
                                                                                            <input type="text" name="alternative_mob_no" id="alternative_mob_no" class="form-control only_integer minSize[10],maxSize[10]" maxlength="10">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row py-2">
                                                                                        <div class="col">
                                                                                            <label for="Email">Email</label>
                                                                                            <input type="email" name="email" id="email" class="form-control validate[required,custom[email]]" data-errormessage-value-missing="Email is required" data-prompt-position="bottomLeft" placeholder="Enter Email *" maxlength="45">
                                                                                        </div>
                                                                                    </div>
                                                                                    <button type="submit" id="add_sub" class="btn btn-primary">Save</button> 
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <?php 
                                    if(empty($allAddress)){ 

                                    } else {
                                    foreach ($allAddress as $key => $value) {
                                        
                                        ?>

                                                        <div class="card mb-4">
                                                            <div class="card-body">
                                                                <p class="text-uppercase fw-bold mb-3 text-font">Your address&emsp;&emsp;<input id="radio<?=$key?>" class="form-check-input" type="radio" name="order_address" value="<?=$value->uniqcode?>"<?php if($value->select_address==1){echo 'checked';}?>></p>
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <p><i class="fas fa-caret-right"></i> <?php echo $value->name;?></p>
                                                                        <p><i class="fas fa-caret-right"></i> <?php echo $value->address_details;?></p>
                                                                        <p><i class="fas fa-caret-right"></i> <?php echo $value->mobile_no;?></p>
                                                                    </div>
                                                                    <div class="col-md-7 edit-add">
                                                                        <a type="button" class="btn btn-outline-danger float-end button-color" href="<?=base_url('user-address-destroy-order/'.$value->uniqcode)?>" onclick="return confirm('Are you sure delete this address?')" data-mdb-ripple-color="danger" style="margin-left: 5px; padding: 14px;">
                                                                        Remove
                                                                        </a>
                                                                        
                                                                        <a type="button" class="btn btn-outline-danger float-end button-color" href="<?=base_url('user-edit-order-address/'.$value->uniqcode)?>" data-mdb-ripple-color="danger" style="margin-left: 5px; padding: 14px;">
                                                        Edit Address
                                                    </a>
                                                                        
                                                                        <!--<button type="button" class="btn float-end button-color" style="text-align: center" href="<?=base_url('user-edit-order-address/'.$value->uniqcode)?>">
                                                                            Edit Address
                                                                        </button>-->
                                                                        
                                                                        <div class="modal fade ebd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                                            <div class="modal-dialog modal-lg">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Address</h5>
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <form class="form-class">
                                                                                        <div class="row py-2">
                                                                                            <div class="col">
                                                                                                <label for="Name">Name</label>
                                                                                                <input type="text" class="form-control" placeholder="Enter Name">
                                                                                            </div>
                                                                                            <div class="col">
                                                                                                <label for="MobileNumber">Mobile Number</label>
                                                                                                <input type="text" class="form-control" placeholder="Enter Mobile Number">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row py-2">
                                                                                            <div class="col">
                                                                                                <label for="PinCode">Pin Code</label>
                                                                                                <input type="text" class="form-control" placeholder="Enter Pin Code">
                                                                                            </div>
                                                                                            <div class="col">
                                                                                                <label for="Locality">Locality</label>
                                                                                                <input type="text" class="form-control" placeholder="Enter Locality">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row py-2">
                                                                                            <div class="col">
                                                                                                <label for="Address">Address</label>
                                                                                                <textarea rows="" cols="" class="form-control">Enter Address</textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                    <div class="row py-2">
                                                                                    <div class="col">
                                                                                    <label for="District">District</label>
                                                                                                <input type="text" class="form-control" placeholder="Enter District">
                                                                                            </div>
                                                                                            <div class="col">
                                                                                                <label for="State">State</label>
                                                                                                <input type="text" class="form-control" placeholder="Enter State">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row py-2">
                                                                                            <div class="col">
                                                                                                <label for="Landmark">Landmark</label>
                                                                                                <input type="text" class="form-control" placeholder="Enter Landmark">
                                                                                            </div>
                                                                                            <div class="col">
                                                                                                <label for="AlternativeMobileNo">Alternative Mobile No</label>
                                                                                                <input type="text" class="form-control" placeholder="Enter Alternative Mobile No">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row py-2">
                                                                                            <div class="col">
                                                                                                <label for="Email">Email</label>
                                                                                                <input type="email" class="form-control" placeholder="Enter Email">
                                                                                            </div>
                                                                                        </div>
                                                                                        <button class="btn btn-primary">Save</button> 
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>  
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <?php } }?>
                                                                              
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                    </div>
                                    <!-- Single Tab Content End -->
    
                                    <!-- Single Tab Content Start -->


                                        <?php 
                                        //print_r($main_user);
                                        foreach($main_user as $val_user){ }?>

                                    <div class="tab-pane fade" id="account-info" role="tabpanel">
                                        <div class="myaccount-content">
                                            <h3>Account Details</h3>
    
                                            <div class="account-details-form">
                                                <form action="<?=base_url('update-main-user')?>"  method="post" enctype="multipart/form-data">
                                                    <div class="row">
                                                        <div class="col-lg-6 col-12 mb-30">
                                                            <input id="user_name" name="user_name" placeholder="Enter Name" type="text" value="<?php echo $val_user->name;?>">
                                                        </div>
    
                                                        <div class="col-lg-6 col-12 mb-30">
                                                            <input id="user_email" name="user_email" placeholder="Enter Email" type="email" value="<?php echo $val_user->email;?>">
                                                        </div>
    
                                                        <div class="col-lg-6 col-12 mb-30">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="user_gender" id="inlineRadio1" value="Male" <?php if($val_user->gender=="Male"){echo 'checked';}?>>
                                                                <label class="form-check-label" for="inlineRadio1">Male</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="user_gender" id="inlineRadio2" value="Female" <?php if($val_user->gender=="Female"){echo 'checked';}?>>
                                                                <label class="form-check-label" for="inlineRadio2">Female</label>
                                                            </div> 
                                                        </div>
    
                                                        <div class="col-lg-6 col-12 mb-30">
                                                            <input id="user_phone" name="user_phone" placeholder="Enter Phone" type="text" value="<?php echo $val_user->mobile_no;?>">
                                                        </div>
    
                                                        <div class="col-12">
                                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                                        </div>
    
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Tab Content End -->
                                </div>
                            </div>
                            <!-- My Account Tab Content End -->
                        </div>
    
                    </div>
                    
                </div> 
            </div>           
        </div>
        <!--My Account section end-->
    </main>

