
<style>
    .dlt_btn:hover{
        background-color:#a749ff;
        color:white;
    }
</style>
<body>
 <div class="container" style="height:50vh">
     <div class="row" style="padding-bottom:5%;padding-top:4%;margin-bottom:4%">
         <div class="col-lg-4 ml-auto mr-auto" >
             <br>
             <form method="post" id="delete_account" name="delete_account" enctype=multipart/form-data>
             <div class="row" style="display:flex;justify-content:center;align-items:center">
                 <u ><h3 style="text-align:center;font-weight:bold">Delete Your Account</h3></u>
             </div>
             <br>
             <div class="row" style="padding:1%">
                 <input type="text" class="form-control" placeholder="Enter Your Phone Number" name="user_name" id="user_name" style="height:40px;font-size:15px" required>
             </div>
             <br>
             <div class="row" style="display:flex;justify-content:center;align-items:center">
                
                  <input type="submit" value="Delete Account" style="border:none;width:200px;height:40px;border-radius:50px;font-size:15px">
                  
                 <!--<button class="dlt_btn" style="border:none;width:200px;height:40px;border-radius:50px;font-size:15px">
                     Delete Account
                 </button>-->
                 
                 
             </div>
             </form>
         </div>
     </div>
 </div>   
</body>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $('#delete_account').submit(function(e){
   e.preventDefault();
  var formData = new FormData($(this)[0]);
 
  var base_url=$('#base_url').val();
  //alert(base_url);
  
  $.ajax({
        url:base_url+'account-delete',
        type: 'POST',
        data: formData,
        async: false,
        cache: false,
        contentType: false,
        processData: false,
        success:function(data) {
                //alert(data);
                if(data==1){
                toastr.success('Your Account Delete Sucess');
                setTimeout(function(){ 
                location.reload();
                }, 2000);
                } else {
                    toastr.error('Wrong phone number');
                }
            },
        });
  }); 
</script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.2/js/toastr.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">