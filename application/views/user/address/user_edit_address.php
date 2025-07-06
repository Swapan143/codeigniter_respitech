
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
                                        <li class="breadcrumb-item active" aria-current="page">Edit Address</li>
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
                                        <h5 class="title">Edit New Address</h5>                          
                                        <?php 
                                        foreach ($delivery_address as $value_edit) {
                                            
                                        }?>

                                         <form id="address-add" action="<?=base_url('user-update-address')?>" class="form-class" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <input type="hidden" name="uniqcode" value="<?php echo $value_edit->uniqcode;?>">
                                            <div class="col-md-6">
                                                <input type="text" name="name" id="name" class="form-control only_character validate[required,custom[fullname]]" data-errormessage-value-missing="Name is required" data-prompt-position="bottomLeft" placeholder="Type name *" maxlength="45" value="<?php echo $value_edit->name;?>">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" name="mobile_no" id="mobile_no" class="form-control only_integer validate[required,custom[phone]]minSize[10],maxSize[10]" data-errormessage-value-missing="Phone number is required" data-prompt-position="bottomLeft" placeholder="Enter phone number *" maxlength="10" value="<?php echo $value_edit->mobile_no;?>">
                                            </div>
                                        </div>
                                        <!--<input type="text" placeholder="Company Name ( optional )">
                                        <input type="text" placeholder="Country / Region *">
                                        <input type="text" placeholder="Street Address *">-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="text" placeholder="Enter The pincode" id="pincode" name="pin_code" class="form-control only_integer validate[required] " maxlength="6" data-errormessage-value-missing="pincode is required" data-prompt-position="bottomLeft" value="<?php echo $value_edit->pin_code;?>">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" name="locality" id="locality" class="form-control form-control" data-prompt-position="bottomLeft" placeholder="Enter Locality " maxlength="100" value="<?php echo $value_edit->locality;?>">
                                            </div>
                                            
                                            <textarea class="form-control validate[required,minSize[4]]" rows="3" id="address_details" name="address_details" data-errormessage-value-missing="Address is required" data-prompt-position="bottomLeft" placeholder="Enter Address *"><?php echo $value_edit->address_details ;?></textarea>

                                            <div class="col-md-6">
                                                <input type="text" name="city_dist_town" id="city" class="form-control validate[required]" data-errormessage-value-missing="District is required" data-prompt-position="bottomLeft" placeholder="Enter district" maxlength="200" value="<?php echo $value_edit->city_dist_town;?>">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" name="state" id="district" class="form-control validate[required]" data-errormessage-value-missing="State is required" data-prompt-position="bottomLeft" placeholder="Enter state" maxlength="200" value="<?php echo $value_edit->state;?>">
                                            </div>

                                            <div class="col-md-6">
                                                <input type="text" name="landmark" id="landmark" class="form-control" data-prompt-position="bottomLeft" placeholder="Enter Landmark " maxlength="100" value="<?php echo $value_edit->landmark;?>">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" name="alternative_mob_no" id="alternative_mob_no" class="form-control only_integer minSize[10],maxSize[10]" maxlength="10" value="<?php echo $value_edit->alternative_mob_no;?>">
                                            </div>
                                        </div>

                                        <input type="email" name="email" id="email" class="form-control validate[required,custom[email]]" data-errormessage-value-missing="Email is required" data-prompt-position="bottomLeft" placeholder="Enter Email *" maxlength="45" value="<?php echo $value_edit->email;?>">

                                       
                                        <!--<div class="different-address-wrap">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="sda">
                                                <label class="custom-control-label" for="sda">Ship to a Different Address?</label>
                                            </div>
                                            <div class="account-create-info">
                                                <a href="contact.html">Create an Account <i class="fas fa-user"></i></a>
                                            </div>
                                        </div>-->
                                        

                                        <button type="submit" id="add_sub" class="btn">Update</button>
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

