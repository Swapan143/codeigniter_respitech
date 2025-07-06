
<style>
     @media screen and (max-width: 1024px) and (min-width: 200px){
        .scroll{
            overflow-x:scroll;

             }

        }
        .empty_wish{
           
            height:370px;
            display:flex;
            align-items:center;
            justify-content:center;
            overflow:hidden;
        }
        .cont_shop{
            background-color: #f2f2f2;
            color: #363f4d;
            font-size:14px;
        }
        .cont_shop:hover{
            background-color:#a749ff;
            
            
        }
        .cont_shop:hover .cont_btn{
            color:#fff;
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
                <li class="active">Wishlist </li>
            </ul>
        </div>
        <div class="container" style=";padding:2%;border;2px solid black;">
    
    <div class="row mb-100">
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
      <div class="row mt-50 ">
      <div class="col-12" >
          
          
         <?php
         
         $this->db->where('user_id', $_SESSION['font_user_id']);
         $wish_product_details=$this->db->get('tbl_wishlist')->result();
          if(!empty($wish_product_details))
          {?>
          
      <div class="table-content scroll cart-table-content">
          <p style="color:red;text-align:center;display:none;" id="dels_wish_msg"><b>Wish List Product Remove Sucess</b></p>
        <table style="width:900px">
            <thead>
            <tr>
               <th>Image</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Remove</th>
               
            </tr>
            </thead>
            <tbody>
            
            <?php
            $this->db->where('user_id', $_SESSION['font_user_id']);
            $wish_product_details=$this->db->get('tbl_wishlist')->result();
            foreach($wish_product_details as $val){
                
                
                $this->db->where('product_name', $val->product_id);
                $product_details=$this->db->get('tbl_product')->result();
                
                $this->db->where('id', $val->product_id);
                $product_name=$this->db->get('tbl_byuerproduct')->result();
                
                $this->db->limit(1);
                $this->db->where('product_id', $val->product_id);
                $product_image=$this->db->get('tbl_productimage')->result();
                
                
                $product_image1=trim($product_image[0]->product_image,",");
            ?>
            <tr>
                <td><img style="height:80px;width:120px" src="<?=base_url('webroot/adminImages/product_image/'.$product_image1.'')?>"></img></td>
                <td><?php echo $product_name[0]->product_name;?></td>
                <td><?php echo $product_details[0]->product_discount_rate;?></td>
                <td><button style="border:none" onclick="wish_list_del('<?php echo $val->id;?>');">x</button></td>
            </tr>
            <?php }?>
                
            </tbody>
        </table>
      </div>
      <?php } else {?>
      
      <div class="col-lg-12" >
          <div class="row">
               <div class="col-lg-6 ml-auto mr-auto empty_wish" >
                   <img src="<?=base_url()?>webroot/user_panel/assets/img/yourwishlist.png" style="height:370px;width:340px"></img>
              
              </div>
              
          </div>
         
      </div>
     
      <div class="col-lg-12 mt-20 d-flex justify-content-center" >
          <div class="cont_shop" style=";height:40px;display:flex;align-items:center;justify-content:center;border-radius:50px;width:240px">
               <a class="cont_btn" style="font-size:17px"href="<?=base_url('home')?>">Continue Shopping</a>
          </div>
          
      <?php }?>
      </div>
     
       
    </div>
                      
          </div>

  </div>
  

</body>

    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

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
  
  
  
  function wish_list_del(x)
  {
      
      var base_url=$('#base_url').val(); 

  //alert(current_url);
  $.ajax({
        url:base_url+'wish_list_del',
        type: 'POST',
        data: {del_wish:x},
        success:function(data) {
        //alert(data);
        
        $("#dels_wish_msg").show();
				setTimeout(function() {
            location.reload();
        }, 2000);
       
        },

    });
      
      
  }
  
</script>


