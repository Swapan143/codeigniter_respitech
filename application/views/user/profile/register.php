
<style>
     @media screen and (max-width: 600px) and (min-width: 200px){
        .main_wrapper{
            flex-direction:column;
        }
        #sucess_msg{
            padding-left:10%;
              padding-right:10%;
        }
       

    }
     
     .btn2{
         border:none;background-color:#f2f2f2;color:white;height:30px;width:150px;font-size: 14px;font-weight: 400; color: #000;font-family: "Poppins", sans-serif;
         
         
     }
     
     .btn2:hover{
         background-color: #a749ff;
        
     }
     .btn2 h4:hover{
          color: #fff;
     }
         
     
     
</style>
<div class="container" >
    <div class="breadcrumb-area pt-35 pb-35 bg-gray-3">
      <div class="container">
          <div class="breadcrumb-content text-center">
            <ul>
                <li>
                    <a href="<?=base_url('home')?>">Home</a>
                </li>
                <li class="active">login </li>
            </ul>
          </div>
      </div>
   </div>
    
    
    <br><br>
    <p style="text-align: center;font-size:25px;font-weight:700">Patient Rregistration</p>
    
   
    
   
   
    <div class="row">
         <div class="col-lg-11 col-11 col-md-11 ml-auto mr-auto" >
            <div class="alert alert-danger" style="text-align: center;display:none;width:100%" id="mobile_alert" >
                 <strong>Warning!</strong>  Mobile Number Already Exit.
            </div>
         </div>
        
    </div>
    
      <div class="row">
         <div class="col-lg-11 col-11 col-md-11 ml-auto mr-auto" >
             <div class="alert alert-danger" style="text-align: center;display:none;width:100%" id="email_alert">
                 <strong>Warning!</strong>  Email id Already Exit.
            </div>

         </div>
        
    </div>
                    
    <div class="main_wrapper" style=" display:flex;align-items:center;justify-content:center;padding:20px;">
        <form id="form" id="product_add" action="<?=base_url('user-register/register_user')?>" method="post" enctype="multipart/form-data">
            <div class="row">
            
                <div class="col-lg-4">
                    <div class="form-group">
                        <label>Name<span class="desc_text" style="color: red;">*</span></label>

                        <input name="name" id="name" type="text" class="form-control only_character validate[required]" data-errormessage-value-missing="Name is required" data-prompt-position="bottomLeft" minlength="" maxlength="100" placeholder="Type name">
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
                        <label>Mobile<span class="desc_text" style="color: red;">*</span></label>

                        <input name="mobile" id="mobile" type="text" class="form-control  validate[required]" data-errormessage-value-missing="Mobile is required" data-prompt-position="bottomLeft" minlength="" maxlength="100" placeholder="Type mobile">
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="form-group">
                        <label>Password<span class="desc_text" style="color: red;">*</span></label>

                        <input name="password" id="password" type="text" class="form-control  validate[required]" data-errormessage-value-missing="Password  is required" data-prompt-position="bottomLeft" minlength="" maxlength="100" placeholder="Type password ">
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="form-group">
                        <label>Doctor Name<span class="desc_text" style="color: red;">*</span></label>
                            <select name="doctor_name" id="doctor_name" class="form-control validate[required]" data-errormessage-value-missing="Doctor  is required">
                                <option>Select Doctor Name</option>
                                <?php
                                foreach ($doctor_data as $value) {
                                    ?>
                                <option value="<?php echo $value->id;?>"><?php echo $value->name;?></option>
                                <?php }?>
                                <option value="0">Other Doctor</option>
                            </select>
                        
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="form-group">
                        <label>Patient Type<span class="desc_text" style="color: red;">*</span></label>
                            <select name="patient_type" id="patient_type" class="form-control validate[required]" data-errormessage-value-missing="Patent  is required">
                                <option>Select Doctor Name</option>
                                
                                <option value="Type one">Type one</option>
                                <option value="Type two">Type two</option>
                                <option value="Type there">Type there</option>
                                
                            </select>
                        
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="form-group">
                        <label>Addresh<span class="desc_text" style="color: red;">*</span></label>
                        <textarea class="form-control validate[required]" data-errormessage-value-missing="Doctor  is required" id="addresh" placeholder="Enter addresh" name="addresh" rows="3"></textarea>
                        
                    </div>
                </div> 
            </div>

            <div class="row" id="doctor_main">
                
            </div>
            
            <div class="col-sm-12">
                <button class="btn btn-warning btn-primary pull-right m-t-n-xs grediant-btn" type="reset" onclick="tcCancel()"><strong>Cancel</strong></button>
                <button class="btn btn-primary pull-right m-t-n-xs grediant-btn save_submit" type="submit" style="margin-right: 6px;" id="change_password"><strong>Save</strong></button>
            </div>
        </form>
    </div>
    <br>
</div>   
</div>
</div>
    
   
    
    
   
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<script>
    $(function ()
    {                
        $("#form").validationEngine();
    });
    $('#doctor_name').on('change', function() {
        var doctor_name= $(this).val();
        if(doctor_name == '0')
        {
            var html =`<div class="col-lg-4">
                    <div class="form-group">
                        <label>Doctor Name<span class="desc_text" style="color: red;">*</span></label>

                        <input name="d_name" id="d_name" type="text" class="form-control only_character validate[required]" data-errormessage-value-missing="Doctor name is required" data-prompt-position="bottomLeft" minlength="" maxlength="100" placeholder="Type name">
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="form-group">
                        <label>Doctor Email<span class="desc_text" style="color: red;">*</span></label>

                        <input name="d_email" id="d_email" type="text" class="form-control  validate[required]" data-errormessage-value-missing="Doctor email is required" data-prompt-position="bottomLeft" minlength="" maxlength="100" placeholder="Type email">
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="form-group">
                        <label>Doctor Mobile<span class="desc_text" style="color: red;">*</span></label>

                        <input name="d_mobile" id="d_mobile" type="text" class="form-control  validate[required]" data-errormessage-value-missing="Doctor mobile is required" data-prompt-position="bottomLeft" minlength="" maxlength="100" placeholder="Type mobile">
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="form-group">
                        <label>Hospital Name<span class="desc_text" style="color: red;">*</span></label>

                        <input name="hospital_name" id="hospital_name" type="text" class="form-control  validate[required]" data-errormessage-value-missing="Hospital name is required" data-prompt-position="bottomLeft" minlength="" maxlength="100" placeholder="Type hospital name">
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="form-group">
                        <label>Specialist<span class="desc_text" style="color: red;">*</span></label>

                        <input name="specialist" id="specialist" type="text" class="form-control only_character validate[required]" data-errormessage-value-missing="Specialist is required" data-prompt-position="bottomLeft" minlength="" maxlength="100" placeholder="Type specialist">
                    </div>
                </div>`;
                
                $("#doctor_main").html(html);
        }
        else
        {
            var html ='';
            $("#doctor_main").html(html);
        }
    });
  $("#pro_search").keyup(function(e){
  var search_pro=$("#pro_search").val();
  
  //var current_url=$('#current_url').val();
  var base_url=$('#base_url').val(); 

  //alert(current_url);
  $.ajax({
        url:base_url+'search',
        type: 'POST',
        data: {search_pro:search_pro},
        success:function(data) {
        //alert(data);
       var res = data.split("|");
        var name=res[0];
        
        var type=res[1];
            
      $(".inp_dp").html(name);
      $("#name").val(type);
       $(".inp_dp").css("display", "block").html(data);
        },

    });

    //$("#drop_search").show();
  });
  
  
  
  function selectProduct(x)
    {
        var abc=x;
        var res = abc.split("|");
        var name=res[0];
        var type=res[1];
        $("#pro_search").val(name);
        $("#name").val(type);
        $(".inp_dp").hide();
    }
  
</script>

