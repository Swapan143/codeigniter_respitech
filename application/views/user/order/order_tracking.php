<!-- main-area -->
<?php unset($_SESSION['pro_id']);?>
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
                                        
                                        <li class="breadcrumb-item active" aria-current="page">Order Tracking</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- breadcrumb-area-end -->

            <!-- shop-area -->
    <?php foreach($tracking_product as $valtrack){
         $tracking=$valtrack->status;
         $datetime=$valtrack->datetime;
         $uniqcode=$valtrack->uniqcode;
         $user_id=$valtrack->user_id;

    } ?>

            <section class="shop--area pt-90 pb-90">
                <div class="container">
                    <div class="card card-timeline px-2 border-none">
                        <ul class="bs4-order-tracking">

                                <?php if($tracking=="Pending"){?>
                            <li class="step active">
                                <div><i class="fas fa-user"></i></div>
                                Order Placed
                            </li>

                            <li class="step">
                                <div><i class="fas fa-bread-slice"></i></div>
                                Order Packed
                            </li>

                            <li class="step">
                                <div><i class="fa-solid fa-folder"></i></div>
                                Order Shipped
                            </li>

                            <li class="step">
                                <div><i class="fas fa-birthday-cake"></i></div>
                                Order Delivered
                            </li>

                            <?php } else if($tracking=="Packed") {?>
                                <li class="step active">
                                <div><i class="fas fa-user"></i></div>
                                Order Placed
                            </li>

                            <li class="step active">
                                <div><i class="fas fa-bread-slice"></i></div>
                                Order Packed
                            </li>

                            <li class="step">
                                <div><i class="fa-solid fa-folder"></i></div>
                                Order Shipped
                            </li>

                            <li class="step">
                                <div><i class="fas fa-birthday-cake"></i></div>
                                Order Delivered
                            </li>
                            <?php } else if($tracking=="Shipped"){?>
                                <li class="step active">
                                <div><i class="fas fa-user"></i></div>
                                Order Placed
                            </li>

                            <li class="step active">
                                <div><i class="fas fa-bread-slice"></i></div>
                                Order Packed
                            </li>

                            <li class="step active">
                                <div><i class="fa-solid fa-folder"></i></div>
                                Order Shipped
                            </li>

                            <li class="step">
                                <div><i class="fas fa-birthday-cake"></i></div>
                                Order Delivered
                            </li>
                            <?php } else {?>
                                <li class="step active">
                                <div><i class="fas fa-user"></i></div>
                                Order Placed
                            </li>

                            <li class="step active">
                                <div><i class="fas fa-bread-slice"></i></div>
                                Order Packed
                            </li>

                            <li class="step active">
                                <div><i class="fa-solid fa-folder"></i></div>
                                Order Shipped
                            </li>

                            <li class="step active">
                                <div><i class="fas fa-birthday-cake"></i></div>
                                Order Delivered
                            </li>
                            <?php }?>



                        </ul>
                        <?php if($tracking=="Pending"){?>
                        <h5 class="text-center"><b>In Grocery</b>. The order has been Ordered</h5>
                        <?php } else if($tracking=="Packed"){ ?>
                            <h5 class="text-center"><b>In Grocery</b>. The order has been Packed</h5>
                            <?php } else if($tracking=="Shipped"){?>
                                <h5 class="text-center"><b>In Grocery</b>. The order has been Shipped</h5>
                                <?php } else {?>
                                    <h5 class="text-center"><b>In Grocery</b>. The order has been Delivered</h5>
                                    <?php } ?>


                                    <?php 
                                                $this->db->where('uniqcode', $valtrack->product_features_id);
                                                    $this->db->order_by('id', 'DESC');
                                                    $this->db->limit(1);
                                            $product_feture=$this->db->get('tbl_product_features')->result();
                                
                                                    foreach ($product_feture as $feturevalue) {
                                                        $item_img=unserialize($feturevalue->image);
                                                        $img=$item_img[0];

                                                    }


                                                    $this->db->where('uniqcode', $valtrack->product_id);
                                                    
                                                 $product_name=$this->db->get('tbl_product')->result();
                                
                                                    foreach ($product_name as $pro_name) {
                                                        
                                                        $_SESSION['pro_id']=$pro_name->uniqcode;

                                                    }


                                                    $this->db->where('product_id', $valtrack->product_id);
                                                    $this->db->where('uniqcode', $valtrack->product_features_id);
                                                    $product_feture_size=$this->db->get('tbl_product_features')->result();
                                
                                                    foreach ($product_feture_size as $feturesizevalue) {
                                                        
                                                    }

                                                    $this->db->where('uniqcode', $feturesizevalue->size);
                                                    
                                                    $product_size=$this->db->get('tbl_size')->result();
                                
                                                    foreach ($product_size as $sizevalue) {
                                                        
                                                    }

                                                    ?>

                        <div class="row">
                            <div class="col-sm-2 product-img" align="center">
                               <img src="<?=base_url('webroot/adminImages/product/web/'.$img.'')?>"> 
                            </div>
                            <div class="col-sm-7">
                                <h6><?php echo $pro_name->product_name;?></h6>
                                <p>
                                    Weight :&ensp; <?php echo $sizevalue->size;?><br>
                                    Brand :&ensp; <?php echo $pro_name->brand_name;?>
                                    
                                </p>
                            </div>
                            <div class="col-sm-3 product-delivered">
                                <?php if($tracking=="Pending"){

                                    //print_r($datetime);
                                    $ex=explode(" ", $datetime);
                                    $date=$ex[0];
                                    $ex1=explode("-", $date);
                                    $year=$ex1[0];
                                    $month=$ex1[1];
                                    $day=$ex1[2];

                                    $dateObj   = DateTime::createFromFormat('!m', $month);
                                    $monthName = $dateObj->format('F');

                                    ?>
                                <h6><i class="fa-solid fa-circle-dot"></i>&ensp;Ordered on <?php echo $day;?> <?php echo $monthName;?>, <?php echo $year;?></h6>
                                <?php } else if($tracking=="Packed"){

                                         //print_r($datetime);
                                    $ex=explode(" ", $datetime);
                                    $date=$ex[0];
                                    $ex1=explode("-", $date);
                                    $year=$ex1[0];
                                    $month=$ex1[1];
                                    $day=$ex1[2];

                                    $dateObj   = DateTime::createFromFormat('!m', $month);
                                    $monthName = $dateObj->format('F');

                                 ?>
                                    <h6><i class="fa-solid fa-circle-dot"></i>&ensp;Packed on <?php echo $day;?> <?php echo $monthName;?>, <?php echo $year;?></h6>
                                    <?php } else if($tracking=="Shipped"){


                                             //print_r($datetime);
                                    $ex=explode(" ", $datetime);
                                    $date=$ex[0];
                                    $ex1=explode("-", $date);
                                    $year=$ex1[0];
                                    $month=$ex1[1];
                                    $day=$ex1[2];

                                    $dateObj   = DateTime::createFromFormat('!m', $month);
                                    $monthName = $dateObj->format('F');


                                        ?>
                                        <h6><i class="fa-solid fa-circle-dot"></i>&ensp;Shipped on <?php echo $day;?> <?php echo $monthName;?>, <?php echo $year;?></h6>
                                        <?php } else {


                                             //print_r($datetime);
                                    $ex=explode(" ", $datetime);
                                    $date=$ex[0];
                                    $ex1=explode("-", $date);
                                    $year=$ex1[0];
                                    $month=$ex1[1];
                                    $day=$ex1[2];

                                    $dateObj   = DateTime::createFromFormat('!m', $month);
                                    $monthName = $dateObj->format('F');



                                            ?>
                                            <h6><i class="fa-solid fa-circle-dot"></i>&ensp;Delivered on <?php echo $day;?> <?php echo $monthName;?>, <?php echo $year;?></h6>
                                            <?php } ?>






                                <p>
                                    Courier Name :&ensp; 1.5 Kg<br>
                                    Docket No :&ensp; No<br>
                                    Website :&ensp; Organic<br>
                                    Your item has been delivered
                                </p>
                            </div>
                        </div>
                    </div>

                    <!--<div class="card card-timeline px-2 border-none">
                        <ul class="bs4-order-tracking">
                            <li class="step active">
                                <div><i class="fas fa-user"></i></div>
                                Order Placed
                            </li>
                            <li class="step">
                                <div><i class="fas fa-bread-slice"></i></div>
                                Order Packed
                            </li>
                            <li class="step">
                                <div><i class="fa-solid fa-folder"></i></div>
                                Order Shipped
                            </li>
                            <li class="step">
                                <div><i class="fas fa-birthday-cake"></i></div>
                                Order Delivered
                            </li>
                        </ul>
                        <h5 class="text-center"><b>In transit</b>. The order has been shipped!</h5>
                        <div class="row">
                            <div class="col-sm-2 product-img" align="center">
                               <img src="<?=base_url()?>webroot/user_panel/assets/img/images/about1.png"> 
                            </div>
                            <div class="col-sm-7">
                                <h6>Butterscotch Cake</h6>
                                <p>
                                    Weight :&ensp; 1.5 Kg<br>
                                    Eggless :&ensp; No<br>
                                    Type :&ensp; Organic
                                </p>
                            </div>
                            <div class="col-sm-3 product-delivered">
                                <h6><i class="fa-solid fa-circle-dot"></i>&ensp;Delivered on 31 January, 2022</h6>
                                <p>
                                    Courier Name :&ensp; 1.5 Kg<br>
                                    Docket No :&ensp; No<br>
                                    Website :&ensp; Organic<br>
                                    Your item has been delivered
                                </p>
                            </div>
                        </div>
                    </div>-->

<!---------------Rating system start-------------->

    

<!---------------Rating system End-------------->





                </div>
            </section>
            <!-- shop-area-end -->

        </main>
        <!-- main-area-end -->

        <?php 
          $porduct_id=$_SESSION['pro_id'];
          $userId=$this->session->userdata('loginDetail')->uniqcode;
          $this->db->where('userid', $userId);
         $this->db->where('postid', $porduct_id);
        $user_rating=$this->db->get('post_rating')->num_rows();
        if ($user_rating>0) {
            $this->db->where('userid', $userId);
            $this->db->where('postid', $porduct_id);
            $user_rating_data=$this->db->get('post_rating')->result();
            foreach ($user_rating_data as $value) {
               //$post_rating=$value->rating;
            }
            
        } else {
            $post_rating="No review rating yet";
         
        }
        
        ?>



        
                <input type="hidden" name="product_id" id="product_id" value="<?php echo $pro_name->uniqcode;?>">

                <?php if($tracking=="Delivered"){?>

            <div class="container">
                <div class="row">
                    <div class="col-sm-12" align="center">
                        <h3>Product Review & Rating</h3>
                        <select class='rating' onchange="nilu_rate(this.value);">
                            <option value="1" >1</option>
                            <option value="2" >2</option>
                            <option value="3" >3</option>
                            <option value="4" >4</option>
                            <option value="5" >5</option>
                        </select>
                        <div style='clear: both;'></div>
                        Average Rating : <span id='avgrating'><?php echo $post_rating;?></span>
                    </div>
                </div>
            </div>
                <?php }?>   

<?php if($tracking=="Delivered"){?>

                <div class="container replace-product">
 
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Replace This Product</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
             <h4 class="modal-title">Product Replace</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
         
          
        </div>
        <form class="form-class" method="post" enctype="multipart/form-data">
        <div class="modal-body">
<p style="color: green;display: none;" id="sucess_msg"><b>Your Request Has been Send Sucessfully</b></p>
  
            <?php 
            $this->db->where('uniqcode', $user_id);
                                                    
            $user_name=$this->db->get('tbl_users')->result();
                                
            foreach ($user_name as $name_user) {
                                                        
                            }?>

  <label>User name:</label>
  <input type="text" class="form-control" readonly=""  value="<?php echo $name_user->name;?>">
  <input type="hidden"  id="user_name" name="user_name"   value="<?php echo $user_id;?>">

  <br><br>
  <label>Product name:</label>
  <input type="text" class="form-control" readonly="" required value="<?php echo $pro_name->product_name;?>">
  <input type="hidden" class="form-control" id="pro_name" name="pro_name" readonly="" required value="<?php echo $pro_name->uniqcode;?>">

  <br><br>
  <label>Comment:</label>
  <textarea rows="" cols="" class="form-control validate[required,minSize[4]]" id="pro_comment" name="pro_comment" data-errormessage-value-missing="Comment is required" data-prompt-position="bottomLeft"placeholder="Enter Comment*"></textarea>
  </textarea>
  
  
  
        </div>
        </form>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" onclick="product_replace();">Submit</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
<?php }?>

                            




