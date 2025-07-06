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
                <li class="active">Take a Free Consultation</li>
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
                        <h4><strong>Please Fillup The Consultancy Required Form :</strong> </h4>
                    </div>
                    <form id="form" action="<?=base_url('copd-book-for-sleep-test-submit')?>" method="post" enctype="multipart/form-data" class="contact-form-style">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Name<span class="desc_text" style="color: red;">*</span></label>
                                        <select name="name" id="name" class="form-control validate[required]" data-errormessage-value-missing="Name  is required">
                                            <option value="" selected disable>Select Name</option>
                                            
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
                                            <option selected disable>Select Gender</option>
                                            
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
                                    <label>What is you looking for consultation<span class="desc_text" style="color: red;">*</span></label>
                                        <select name="consultation" id="consultation" class="form-control validate[required]" data-errormessage-value-missing="Consultation  is required" onchange="select_consultation()">
                                            <option value="">Select consultation</option>
                                            <option value="OSA">OSA - Sleep Test</option>
                                            <option value="COPD">COPD - Devices & Accessories</option>
                                        </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Upload Precription</label>

                                    <input name="item_image_banner" id="item_image_banner" type="file" class="form-control" data-errormessage-value-missing="Specialist is required" data-prompt-position="bottomLeft">
                                </div>
                            </div>

                            <div class="col-lg-4" id="show_category">
                            </div>

                            <div class="col-lg-4" id="show_product">
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
    });
    

    function select_consultation()
    {
        var consultation=$('#consultation').val();

        if(consultation =='COPD')
        {
            get_category()
        }

    }

    function get_category()
    {
        var base_url=$('#base_url').val();    
        $.ajax({
        type:'POST',
        url:base_url+'get-category',
        success:function(data){
            data=data.trim();
            if(data != '')
            {
                $('#show_category').html(data);
            }
        }
        });
    }


    function select_category()
    {
        var catgegory_id=$('#category').val(); 
       
        var base_url=$('#base_url').val();    
        $.ajax({
        type:'POST',
        url:base_url+'get-category-product',
        data: {
            cat_uniqcode: catgegory_id
        },
        
        success:function(data){
            data=data.trim();
            if(data != '')
            {
                $('#show_product').html(data);
            }
        }
        });
    }
</script>
</body>

</html>