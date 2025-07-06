<style>
    p{
        margin-bottom:2px;
    }
</style>

<body>

<div class="breadcrumb-area pt-35 pb-35 bg-gray-3">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <ul>
                <li>
                    <a href="<?=base_url('home')?>">Home</a>
                </li>
                <li class="active">Book for Sleep Test</li>
            </ul>
        </div>
    </div>
</div>
<div class="contact-area pt-100 pb-100">
    <div class="container contact-main">
        <!--<div class="contact-map mb-10">-->
        <!--    <div id="map"></div>-->
        <!--</div>-->
        <div class="custom-row-2">
           
            
            
            <div class="col-lg-12 col-md-7">
                <div class="">
                    <div class="contact-title mt-30 mb-30">
                        <h4><strong>Please Fillup Sleep Test Booking Form :</strong> </h4>
                    </div>
                    <form id="form" action="<?=base_url('osa-book-for-sleep-test-submit')?>" method="post" enctype="multipart/form-data" class="contact-form-style">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Name<span class="desc_text" style="color: red;">*</span></label>
                                        <select name="name" id="name" class="form-control validate[required]" data-errormessage-value-missing="Name  is required">
                                            <option value="">Select Name</option>
                                            
                                            <option value="Mr.">Mr.</option>
                                            <option value="Mrs.">Mrs.</option>
                                            <option value="Miss.">Miss</option>
                                            <option value="Dr.">Dr.</option>
                                           
                                        </select>
                                    
                                </div>
                            </div>
                        
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Patient Name<span class="desc_text" style="color: red;">*</span></label>

                                    <input name="patient_name" id="patient_name" type="text" class="form-control only_character validate[required]" data-errormessage-value-missing="Patient Name is required" data-prompt-position="bottomLeft" minlength="" maxlength="100" placeholder="Type patient name">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Gender<span class="desc_text" style="color: red;">*</span></label>
                                        <select name="gender" id="gender" class="form-control validate[required]" data-errormessage-value-missing="Gender  is required">
                                            <option value="">Select Gender</option>
                                            
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Transgender">Transgender</option>
                                       
                                           
                                        </select>
                                    
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Date of Birth<span class="desc_text" style="color: red;">*</span></label>

                                    <input name="dob" id="dob" type="date" class="form-control  validate[required]" data-errormessage-value-missing="Date of Birth is required" data-prompt-position="bottomLeft" minlength="" maxlength="100" placeholder="Select date of birth">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Mobile<span class="desc_text" style="color: red;">*</span></label>

                                    <input name="mobile" id="mobile" type="text" class="form-control  validate[required]" data-errormessage-value-missing="Mobile is required" data-prompt-position="bottomLeft" minlength="" maxlength="100" placeholder="Type mobile">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Email<span class="desc_text" style="color: red;">*</span></label>

                                    <input name="email" id="email" type="text" class="form-control  validate[required]" data-errormessage-value-missing="Email is required" data-prompt-position="bottomLeft" minlength="" maxlength="100" placeholder="Type email">
                                </div>
                            </div>

                            

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Reffered From / By<span class="desc_text" style="color: red;">*</span></label>

                                    <input name="reffered_form" id="reffered_form" type="text" class="form-control  validate[required]" data-errormessage-value-missing="Reffered From is required" data-prompt-position="bottomLeft" minlength="" maxlength="100" placeholder="Type hospital name / doctor name">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Land Mark<span class="desc_text" style="color: red;">*</span></label>

                                    <input name="land_mark" id="land_mark" type="text" class="form-control only_character validate[required]" data-errormessage-value-missing="Land mark is required" data-prompt-position="bottomLeft" minlength="" maxlength="100" placeholder="Type land mark">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Time Preference<span class="desc_text" style="color: red;">*</span></label>
                                        <select name="time_preference" id="time_preference" class="form-control validate[required]" data-errormessage-value-missing="Time Preference  is required">
                                            <option value="">Select time</option>
                                            
                                            <option value="Male">Morning</option>
                                            <option value="Female">Afternoon</option>
                                            <option value="Transgender">Evening</option>
                                            <option value="Transgender">Night</option>
                                       
                                           
                                        </select>
                                    
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>State<span class="desc_text" style="color: red;">*</span></label>
                                        <select name="state" id="state" class="form-control validate[required]" data-errormessage-value-missing="State is required">
                                        <option value="">Select State</option>
                                        <?php
                                            foreach($states as $state_row)
                                            {
                                            ?>
                                            <option value="<?= $state_row->id?>"><?= $state_row->name?></option>
                                            <?php
                                            }
                                        ?>
                                       
                                           
                                        </select>
                                    
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>City<span class="desc_text" style="color: red;">*</span></label>
                                        <select name="city" id="city" class="form-control validate[required]" data-errormessage-value-missing="City  is required">
                                            

                                        </select>
                                    
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Address<span class="desc_text" style="color: red;">*</span></label>
                                    <textarea class="form-control validate[required]" data-errormessage-value-missing="Address  is required" id="address" placeholder="Enter Address" name="address" rows="3"></textarea>
                                    
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Upload Precription</label>

                                    <input name="item_image_banner" id="item_image_banner" type="file" class="form-control" data-errormessage-value-missing="Specialist is required" data-prompt-position="bottomLeft">
                                </div>
                            </div>


                            
                            
                        </div>
                        
                        <div class="col-sm-12">
                            <button class="btn btn-warning btn-primary pull-right m-t-n-xs grediant-btn" type="reset" onclick="tcCancel()"><strong>Cancel</strong></button>
                            <button class="btn btn-primary pull-right m-t-n-xs grediant-btn save_submit" type="submit" style="margin-right: 6px;" id="change_password"><strong>Save</strong></button>
                        </div>
                        </form>
                    <p class="form-messege"></p>
                </div>
            </div>
            
            
        </div>
        
           
            </div>
    </div>
</div>
<script src="<?=base_url()?>webroot/user_panel/assets/js/vendor/jquery-v3.4.1.min.js"></script>
<script>
    $(function ()
    {                
        $("#form").validationEngine();
        $('#state').on('change', function() 
        {
            var state_id = $(this).val();
            //var current_url=$('#current_url').val();
            var base_url="https://respitech.co.in/get-city"; 
            $("#city").html('');
            $.ajax({
                url:base_url,
                type: 'POST',
                data: {state_id:state_id},
                success:function(data) 
                {
                $("#city").append(data);
                }
            });
        });
    });
</script>
</body>

</html>