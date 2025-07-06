<style>
    .pt-100 {
  padding-top: 20px; }
  
  .login-register-wrapper .login-register-tab-list{
          margin-bottom:5px
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
                <li class="active">login </li>
            </ul>
        </div>
    </div>
</div>
<div class="login-register-area pt-100 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                <div class="login-register-wrapper">
                    <div class="login-register-tab-list nav">
                        <a >
                            <h4> Seller login </h4>
                        </a>
                        
                        <!--<a data-toggle="tab" href="#lg2">
                            <h4> register </h4>
                        </a>-->
                    </div>
                    
                     <div class="row">
                          <div class="col-lg-9 col-md-9 col-11 ml-auto mr-auto">
                              <div class="alert alert-success" style="text-align: center;display:none;width:100%" id="sucess_msg">
                                   <strong>Success!</strong> Your Login........
                             </div>
                         </div>
                    </div>
                    
                    <div class="row">
                          <div class="col-lg-9 col-11 ml-auto mr-auto">
                               <div class="alert alert-danger" style="text-align: center;display:none;width:100%" id="mobile_alert">
                                    <strong>Failed!</strong> Wrong Your Name and Password.
                              </div>
           
                         </div>
                    </div>
                    
                    
            
                    <div class="tab-content">
                        <div id="lg1" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    
                                    <form  method="post" id="form_login" name="form_login">
                                        <input type="email" name="user_name" id="user_name" placeholder="User Email" required>
                                        <input type="password" name="user_password" id="user_password" placeholder="Password" required>
                                        <div class="button-box">
                                            <div class="login-toggle-btn">
                                                <input type="checkbox">
                                                <label>Remember me</label>
                                                <a href="#">Forgot Password?</a><br>
                                                <a href="<?=base_url('seller-register')?>">Create Account</a>
                                            </div>
                                            <button type="submit"><span>Login</span></button>
                                        </div>
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $('#form_login').submit(function(e){
	e.preventDefault();
	
	
	var formData = new FormData($(this)[0]);
	var current_url=$('#current_url').val();
	
	$.ajax({
        url:current_url+'/login_seller',
        type: 'POST',
        data: formData,
		async: false,
        cache: false,
        contentType: false,
        processData: false,
        success:function(data) {
            //alert(data);
			if (data==2) {
				$("#mobile_alert").show();
				setTimeout(function(){ 
				$("#mobile_alert").hide();
				}, 3000);
			} 
			
			if (data==1) {
				$("#sucess_msg").show();
				setTimeout(function(){ 
				window.location.href = "<?=$_SESSION['pro_url']?>";
				}, 3000);
			} 

        },

    
});
  }); 
</script>




<script>
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


