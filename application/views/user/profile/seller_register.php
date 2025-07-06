
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
    <p style="text-align: center;font-size:25px;font-weight:700">Seller Rregistration</p>
    
   
    
    <div class="row">
          <div class="col-lg-6 col-10 ml-auto mr-auto"  >
               <div class="row">
         <div class="col-lg-11 col-11 col-md-11 ml-auto mr-auto" >
             <div class="alert alert-success" style="text-align: center;display:none;width:100%" id="sucess_msg">
                 <strong>Success!</strong> Your Registration
                 
             </div>
         </div>
    </div>
   
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
   
           <div class="col1" style="width:270px;padding:1%;">
            <form method="post" id="form_submit" name="form_submit">
            <div class="row1" style="height:50px;width:100%;;border-radius:5px">
            <input type="text" placeholder="Name" name="user_name" id="user_name" required></input>
            </div>
            <br>
            <div class="row1" style="height:50px;width:100%;;border-radius:5px">
            <input type="text" placeholder="Mobile No" name="user_mobile" id="user_mobile" required></input>
            </div>
           <!-- <br>
            <div class="row1" style="height:50px;width:100%;;border-radius:5px">
            <input type="text"></input>
            </div>
            <br>
            <div class="row1" style="height:50px;width:100%;;border-radius:5px">
            <input type="text"></input>
            </div>-->
            <br>

        </div>
       
        <div class="col1" style="width:270px;padding:1%;">
        
        <div class="row1" style="height:50px;width:100%;;border-radius:5px">
               <input type="email" placeholder="Email" name="user_email" id="user_email" required></input>
            </div>
            <br>
            <div class="row1" style="height:50px;width:100%;;border-radius:5px">
            <input type="password" placeholder="Password" name="user_password" id="user_password" required></input>
            </div>
            <!--<br>
            <div class="row1" style="height:50px;width:100%;;border-radius:5px">
            <input type="text"></input>
            </div>
            <br>
            <div class="row1" style="height:50px;width:100%;;border-radius:5px">
            <input type="text"></input>
            </div>-->
            <br>

        </div>

    </div>
    <br>
    <div class="btn" style="display:flex;justify-content:center;margin-bottom:89px">
        <button class="btn2" type="submit" style="">
           <h4 >Submit</h4>
       </button>
    </div>
    </form>
</div>

         
         
         </div>
        
    </div>
    
   
    
    
   
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $('#form_submit').submit(function(e){
	e.preventDefault();
	
	
	var formData = new FormData($(this)[0]);
	var current_url=$('#current_url').val();
	
	$.ajax({
        url:current_url+'/register_seller',
        type: 'POST',
        data: formData,
		async: false,
        cache: false,
        contentType: false,
        processData: false,
        success:function(data) {
            //alert(data);

			if (data==1) {
				$("#mobile_alert").show();
				setTimeout(function(){ 
				$("#mobile_alert").hide();
				}, 3000);
			} 
			
			if (data==2) {
				$("#email_alert").show();
				setTimeout(function(){ 
				$("#email_alert").hide();
				}, 3000);
			} 
			
			if (data==3) {
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

