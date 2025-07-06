
<style>
    .save_btn:hover{
        background-color:#a749ff;
        color:white;
    }
     @media screen and (max-width: 600px) and (min-width: 200px){
        .mar{
          margin-top:20px
             }

        }
</style>

<body>

<div class="breadcrumb-area pt-35 pb-35 bg-gray-3">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <ul>
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li class="active">My Account </li>
            </ul>
        </div>
    </div>
</div>
<div class="container" style=";padding:2%;border;2px solid black;">
    
    <div class="row mb-100 " >
      <!-- <div class="col-12"> -->
        <!-- <div class="row"> -->
          <div class="col-lg-3 col-12" style="cursor:pointer margin-bottom:40px ;position:sticky;z-index:999">
               
                  <div class="dashboard" style="border-bottom:1px solid grey;padding:5%;">
                  
                    Dashboard
                  </div>
                  <div class="Orders"  style="border-bottom:1px solid grey;padding:5%;">  
                  <a href="<?=base_url('my-order')?>"><i class="fa fa-cart-arrow-down"></i> Orders</a>
                  </div>
                  <div class="Wishlist"  style="border-bottom:1px solid grey;padding:5%;">
                      <a href="<?=base_url('show-wishlist')?>"> <i class="fa fa-heart"></i> Wishlist</a>
                   
                 
                  </div>
                  <div class="account"  style="border-bottom:1px solid grey;padding:5%;">
                 <a href="<?=base_url('my-account')?>"> <i class="fa fa-user"></i>
                    Account</a>
                 
                  
                  </div>
                  
                  <div class="log"  style="border-bottom:1px solid grey;padding:5%;">
                  <a href="<?=base_url('user-logout')?>"><i class="fa fa-sign-out"></i> 
                     Log Out</a>
                  </div> 

                

            </div>
          <div class="col-lg-9 col-12">
            <div class="row d-flex justify-content-center mt-40">
                <h3 style="font-weight:bold">Account Details</h3>
            </div>
               <div class="row mt-20 ">
                     
                         <div class="col-lg-10 ml-auto mr-auto" >
                         <div class="row">
                            <div class="col-lg-5 col-11 col-md-5 ml-auto mr-auto mar" style="border:1px solid grey;height:45px;display:flex;align-items:center">
                                <div>Shampa Siddha</div>

                            </div>
                            <div class="col-lg-6  col-11  col-md-6 ml-auto mr-auto mar" style="border:1px solid grey;height:45px;display:flex;align-items:center">
                                <div>shampasiddha8582@gmail.com</div>

                            </div>
                         </div>
                         <div class="row mt-20">
                            <div class="col-lg-5  col-11  col-md-5 ml-auto mr-auto " style="border:1px solid grey;height:45px;display:flex;align-items:center;justify-content:space-between">
                            <form>
                          <input type="radio" id="html" name="fav_language" value="HTML" style="height:12px;width:12px">  Male</input>
                          <input type="radio" id="html" name="fav_language" value="HTML" style="height:12px;width:12px">  Female</input>
                          </form>
                            
                            </div>
                            <div class="col-lg-6  col-11  col-md-6 ml-auto mr-auto mar" style="border:1px solid grey;height:45px;display:flex;align-items:center">
                                <div>9734973477</div>

                            </div>
                           
                           
                          
                         </div>
                         </div>
       
                    
                </div>
                <div class="col-lg-12 d-flex justify-content-center mt-40">
                    <button class="save_btn" style="border:none;;height:40px;width:140px">Save Changes</button>
                </div>
            </div> 
    </div>
</div>
         



          
  



<!-- Modal -->
