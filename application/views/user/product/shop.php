<?php
$currentURL = current_url();
$_SESSION['pro_url']=$currentURL;                          
?>

<style>
    .price-range-block {
    margin:60px;
}

.sliderText{
    width:40%;
    margin-bottom:30px;
    border-bottom: 2px solid red;
    padding: 10px 0 10px 0px;
    font-weight:bold;
}

.ui-slider-horizontal {
    height: .6em;
}
.ui-slider-horizontal {
    margin-bottom: 15px;
    width:40%;
}
.ui-widget-header {
    background: #3FE331;
}

.price-range-search {
    width:40.5%; 
    background-color: #f9f9f9; 
    border: 1px solid #6e6666;
    min-width: 40%;
    display: inline-block;
    height: 32px;
    border-radius: 5px;
    float: left;
    margin-bottom:20px;
    font-size:16px;
}
.price-range-field{
    width:30%; 
    min-width: 16%;
    background-color:#f9f9f9; 
    border: 1px solid #6e6666; 
    color: black; 
    font-family: myFont; 
    font: normal 14px Arial, Helvetica, sans-serif; 
    border-radius: 5px; 
    height:26px; 
    padding:5px;
}
.breadcrumb-area{
    
}

</style>


<style>
    .pdr_ldr{
    position: fixed;
    width: 100%;
    height: 100vh;
    left: 0;
    top: 0;
    z-index: 99999999;
    text-align: center;
    background: #ffffffd6;
    padding-top: 45vh;
}
.pdr_ldr img{
    width: 50px;
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
                <li class="active">Shop By All Collection </li>
            </ul>
        </div>
    </div>
</div>
<div class="shop-area pt-95 pb-100">
    <div class="container">
        <div class="row flex-row-reverse">
            <div class="col-lg-12">
                
                <div class="shop-bottom-area mt-35">
                    <div class="tab-content jump">
                        <div id="shop-1" class="tab-pane active">
                            <div class="row" id="show_msgdjfjd">
                                
                                
                                        <?php
                            //$this->db->where('status', "Active");
                            $new_arival=$this->db->get('tbl_product')->result();
                            foreach($new_arival as $valnew)
                            {
                             
                                $product_name=$valnew->product_name;
                                            $product_id=$valnew->id;
                                        
                                        
                                $product_name_re = str_replace(' ', '', $product_name);
                                $product_name_re = str_replace('(', '', $product_name_re);
                                $product_name_re = str_replace(')', '', $product_name_re);
                                $product_string = preg_replace('/[^A-Za-z0-9\-]/', '-', $product_name_re);
                            
                            ?>
                                
                                
                                <div class="col-xl-4 col-md-6 col-lg-6 col-sm-6">
                                    <div class="product-wrap mb-25 scroll-zoom">
                                        <div class="product-img">
                                            <a href="<?=base_url('book-product/details/1'.$product_string.'?proid='.$product_id.'&cid='.$valnew->catgegory_id)?>">
                                    <?php
                                    
                                    //$this->db->limit(2);
                                    $this->db->where('product_id', $valnew->id);
                                    $product_image=$this->db->get('tbl_productimage')->result();
                                    $x=1;
                                    foreach($product_image as $valimage){
                                        $product_image=trim($valimage->product_image,",");
                                        if($x==1){
                                            $de="default";
                                        }else {
                                            $de="hover";
                                        }
                                    ?>
                                    <img class="<?php echo $de;?>-img" src="<?=base_url('webroot/adminImages/product_image/'.$product_image.'')?>" alt="">
                                    
                                    
                                    <?php 
                                    $x++;
                                     }?>
                                </a>
                                            <?php if(isset($_SESSION['seller_font_user_id'])){?>
                                            <span class="pink"><?php echo $valnew->seller_discount;?>%</span>
                                            <?php } else {?>
                                            <span class="pink"><?php echo $valnew->product_discount;?>%</span>
                                            <?php }?>
                                        </div>
                                        <div class="product-content text-center">
                                            <h3><a href="<?=base_url('book-product/details/1'.$product_string.'?proid='.$product_name.'&cid='.$valnew->catgegory_id)?>"><?php echo $new_arival_product_name[0]->product_name;?></a></h3>
                                            <p><?php echo substr($valnew->product_description, 0, 30).' '.'...';?></p>
                                           
                                            <div class="product-price">
                                                <?php if(isset($_SESSION['seller_font_user_id'])){?>
                                                <span>₹ <?php echo $valnew->seller_discount_rate;?></span>
                                                <span class="old">₹ <?php echo $valnew->seller_product_rate;?></span>
                                                <?php } else {?>
                                                <span>₹ <?php echo $valnew->product_discount_rate;?></span>
                                                <span class="old">₹ <?php echo $valnew->sel_product_rate;?></span>
                                                <?php }?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php }?>
                               
                            </div>
                        </div>
                        
                    </div>
                    <!--<div class="pro-pagination-style text-center mt-30">
                        <ul>
                            <li><a class="prev" href="#"><i class="fa fa-angle-double-left"></i></a></li>
                            <li><a class="active" href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a class="next" href="#"><i class="fa fa-angle-double-right"></i></a></li>
                        </ul>
                    </div>-->
                </div>
            </div>
            <div class="col-lg-3">
                <div class="sidebar-style mr-30">
                    <!--<div class="sidebar-widget">
                        <h4 class="pro-sidebar-title">Search </h4>
                        <div class="pro-sidebar-search mb-50 mt-25">
                            <form class="pro-sidebar-search-form" action="#">
                                <input type="text" placeholder="Search here...">
                                <button>
                                    <i class="pe-7s-search"></i>
                                </button>
                            </form>
                        </div>
                    </div>-->
                    
                    <!-- <div class="sidebar-widget">
                        <h4 class="pro-sidebar-title">Category By </h4>
                        <div class="sidebar-widget-list mt-30">
                            <ul>
                               
                               <?php
                               $product_category=$this->db->get('tbl_category')->result();
                               foreach($product_category as $val){
                                   
                                   $this->db->where('catgegory_id', $val->id);
                                   $product_details_count=$this->db->get('tbl_product')->num_rows();
                                   
                                    ?>
                                <li>
                                    <div class="sidebar-widget-list-left">
                                        <input type="checkbox" class="che cate" value="<?php echo $val->id;?>"> <a href="#">  <?php echo $val->category_name;?> <span><?php echo $product_details_count;?></span> </a> 
                                        <span class="checkmark"></span>
                                    </div>
                                </li>
                                <?php }?>
                                
                            </ul>
                        </div>
                    </div> -->
                    <!-- <div class="sidebar-widget mt-45">
                        <h4 class="pro-sidebar-title">Price By</h4>
                        
                        <div class="price-filter mt-10">
                            <div id="slider-range" class="price-filter-range" name="rangeInput" style="width:100%"></div>
                        	<div style="margin:30px auto;display:flex;justify-content:space-between">
                        	  <input type="number" min=0 max="9900" oninput="validity.valid||(value='0');" id="min_price" class="price-range-field" />
                        	  <input type="number" min=0 max="10000" oninput="validity.valid||(value='10000');" id="max_price" class="price-range-field" />
                        	</div>
                        </div>
                        
                    </div> -->
                    
                    <!-- <div class="sidebar-widget ">
                        <div class="sidebar-widget-tag mt-25">
                            <ul>
                               
                                <li><a href="#" class="che">Search</a></li>
                            </ul>
                        </div>
                    </div> -->
                    
                    
                    <!--<div class="sidebar-widget mt-50">
                        <h4 class="pro-sidebar-title">Colour </h4>
                        <div class="sidebar-widget-list mt-20">
                            <ul>
                                <li>
                                    <div class="sidebar-widget-list-left">
                                        <input type="checkbox" value=""> <a href="#">Green <span>4</span> </a>
                                        <span class="checkmark"></span> 
                                    </div>
                                </li>
                                <li>
                                    <div class="sidebar-widget-list-left">
                                        <input type="checkbox" value=""> <a href="#">Cream <span>4</span> </a>
                                        <span class="checkmark"></span> 
                                    </div>
                                </li>
                                <li>
                                    <div class="sidebar-widget-list-left">
                                        <input type="checkbox" value=""> <a href="#">Blue <span>4</span> </a>
                                        <span class="checkmark"></span> 
                                    </div>
                                </li>
                                <li>
                                    <div class="sidebar-widget-list-left">
                                        <input type="checkbox" value=""> <a href="#">Black <span>4</span> </a>
                                        <span class="checkmark"></span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="sidebar-widget mt-40">
                        <h4 class="pro-sidebar-title">Size </h4>
                        <div class="sidebar-widget-list mt-20">
                            <ul>
                                <li>
                                    <div class="sidebar-widget-list-left">
                                        <input type="checkbox" value=""> <a href="#">XL</a>
                                        <span class="checkmark"></span> 
                                    </div>
                                </li>
                                <li>
                                    <div class="sidebar-widget-list-left">
                                        <input type="checkbox" value=""> <a href="#">L</a>
                                        <span class="checkmark"></span>
                                    </div>
                                </li>
                                <li>
                                    <div class="sidebar-widget-list-left">
                                        <input type="checkbox" value=""> <a href="#">SM</a>
                                        <span class="checkmark"></span> 
                                    </div>
                                </li>
                                <li>
                                    <div class="sidebar-widget-list-left">
                                        <input type="checkbox" value=""> <a href="#">XXL</a>
                                        <span class="checkmark"></span> 
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="sidebar-widget mt-50">
                        <h4 class="pro-sidebar-title">Tag </h4>
                        <div class="sidebar-widget-tag mt-25">
                            <ul>
                                <li><a href="#">Clothing</a></li>
                                <li><a href="#">Accessories</a></li>
                                <li><a href="#">For Men</a></li>
                                <li><a href="#">Women</a></li>
                                <li><a href="#">Fashion</a></li>
                            </ul>
                        </div>
                    </div>-->
                </div>
            </div>
        </div>
    </div>
</div>


        <div class="pdr_ldr" style="display:none;">
        <img src="<?=base_url()?>webroot/user_panel/assets/img/product_loader.gif">
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
  
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" type="text/javascript"></script>

<script>
  
    $(document).ready(function(){
	
	$('#price-range-submit').hide();

	$("#min_price,#max_price").on('change', function () {

	  $('#price-range-submit').show();

	  var min_price_range = parseInt($("#min_price").val());

	  var max_price_range = parseInt($("#max_price").val());

	  if (min_price_range > max_price_range) {
		$('#max_price').val(min_price_range);
	  }

	  $("#slider-range").slider({
		values: [min_price_range, max_price_range]
	  });
	  
	});

 
	$("#min_price,#max_price").on("paste keyup", function () {                                        

	  $('#price-range-submit').show();

	  var min_price_range = parseInt($("#min_price").val());

	  var max_price_range = parseInt($("#max_price").val());
	  
	  if(min_price_range == max_price_range){

			max_price_range = min_price_range + 100;
			
			$("#min_price").val(min_price_range);		
			$("#max_price").val(max_price_range);
	  }

	  $("#slider-range").slider({
		values: [min_price_range, max_price_range]
	  });

	});


	$(function () {
	  $("#slider-range").slider({
		range: true,
		orientation: "horizontal",
		min: 0,
		max: 10000,
		values: [0, 10000],
		step: 100,

		slide: function (event, ui) {
		  if (ui.values[0] == ui.values[1]) {
			  return false;
		  }
		  
		  $("#min_price").val(ui.values[0]);
		  $("#max_price").val(ui.values[1]);
		}
	  });

	  $("#min_price").val($("#slider-range").slider("values", 0));
	  $("#max_price").val($("#slider-range").slider("values", 1));

	});

	$("#slider-range,#price-range-submit").click(function () {

	  var min_price = $('#min_price').val();
	  var max_price = $('#max_price').val();

	  $("#searchResults").text("Here List of products will be shown which are cost between " + min_price  +" "+ "and" + " "+ max_price + ".");
	});

});
</script>


<script>
    $(".che").click(function(){
    filter_data();
    });
    </script>
    <script>
    function filter_data()
    {
        
      var current_url=$('#current_url').val(); 
        //alert(current_url);
      //var amount=$('#amount').val(); 

        var cate=get_filter('cate');
        var min_price=$("#min_price").val();
        var max_price=$("#max_price").val();
        
        
         $.ajax({
        url:current_url+'/all_searchabc',
        type: 'POST',
        data: {cate:cate,min_price:min_price,max_price:max_price},
        success:function(data) {
          //alert(data);
            if(data=='')
            {
                var abc="NO RECORD FOUND";
                $(".pdr_ldr").show();  
                setTimeout(function(){
                $("#show_msgdjfjd").html(abc); 
                $(".pdr_ldr").hide();
            }, 2000); 
                
            } else {
                
              $(".pdr_ldr").show();  
                setTimeout(function(){
                $("#show_msgdjfjd").html(data);
                $(".pdr_ldr").hide();
            }, 2000); 
                
            }
       
        },

    });

    }
    </script>
    <script>
   function get_filter(class_name)
    {
        
        var checked = [];
$('.'+class_name+':checked').each(function ()
{
   checked.push($(this).val());
   
});
     return checked;
    }


    $(document).ready(function(){
    $('input[type=checkbox]').attr('checked',false);
});
    
    
</script>

<script>

function low_high(x)
{
   var product_price=x;
   var current_url=$('#current_url').val();     
   //alert(current_url);
        $.ajax({
        url:current_url+'/search_price',
        type: 'POST',
        data: {product_price:product_price},
        success:function(data) {
           //alert(data);
            
                 if(data=='')
            {
                var abc="NO RECORD FOUND";
                $(".pdr_ldr").show();  
                setTimeout(function(){
                $("#show_msgdjfjd").html(abc); 
                $(".pdr_ldr").hide();
            }, 2000); 
                
            } else {
                
              $(".pdr_ldr").show();  
                setTimeout(function(){
                $("#show_msgdjfjd").html(data);
                $(".pdr_ldr").hide();
            }, 2000); 
                
            }    
        
        },

    });
    }
    
</script>



