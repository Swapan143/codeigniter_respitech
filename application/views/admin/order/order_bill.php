<style type="text/css" media="print">
      @media print
      {
         @page {
           margin-top: 0;
           margin-bottom: 0;
           size: landscape;
         }
         body  {
           padding-top: 10px;
           padding-bottom: 72px ;
         }
         .print-button{ display: none; }
      } 

    .showTableImage
    {
    height: 101px;
    width: 101px;
    object-fit: contain;
    }
</style>
<?php 
$order_date=$order_details->order_date;
    $ex=explode("-", $order_date);
    $year=$ex[0];
    $month=$ex[1];
    $day=$ex[2];

    $monthNum  = $month;
    $dateObj   = DateTime::createFromFormat('!m', $monthNum);
    $monthName = $dateObj->format('M');
?>
<input type="button" class="btn print-button" onclick="myFunction()" value="Print Order Detail"  style="margin-top: 10px; background: darkgray; color: #FFF;" />
<div class="container-fluid" style="margin-top: 50px;">
  <div class="details" align="center">
    <h3><u>Book Shop</u></h3>
    <h4 style="color: black;"><u>Tax Invoice</u></h4>
    <p>Address : Rabindra Sarobar, Kolkata - 700033<br>
    Mobile No : +91 8000000007<br>
    GST No : 101010101010</p>
    <div class="row">
      <div class="col-sm-4">
        <p>Order Id : <?php echo $order_details->order_id;?></p>
      </div>
      <div class="col-sm-4">
        
      </div>
      <div class="col-sm-4">
        <p>Order Date : <?php echo $day.'-'.$monthName.'-'.$year?></p>
      </div>
      <!--<p class="d-print-none"><a href="" onclick="myFunction()">Print</a></p>-->
    </div>
    
  </div>
  <br><br><br>
	<div class="row">
		<div class="col-sm-6" align="left">
			<h5>Name : <?php echo $order_details->bill_name;?></h5>
			<h5>Address : <?php echo $order_details->deli_state;?>,<?php echo $order_details->deli_town;?>-<?php echo $order_details->deli_zip;?></h5>
            <h5>Email Id : <?php echo $order_details->bill_email;?></h5>
			<h5>Mobile : +91 <?php echo $order_details->deli_mobile;?></h5>
		</div>
		<div class="col-sm-6" align="right">
			<!--<h5>Date : <?php echo $day.'-'.$monthName.'-'.$year?></h5>
			<h5>Order Id : <?php echo $value->order_code;?></h5>-->
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<table class="table table-striped table-bordered table-hover" >
                <thead>
                    <tr>
                        <th>Sl No</th>
                        <th>Product</th>
                        <th>Image</th>
                        <th>Rate</th>
                        <th>Quentity</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                  <?php 
                    $sum=0;
                    $sum12=0;
                     $this->db->where('order_id', $order_details->order_id);
                     $product=$this->db->get('tbl_order')->result();
                    foreach ($product as $key => $value) 
                    {
                        
                        $this->db->where('product_id', $value->product_id);
                        $product_image=$this->db->get('tbl_productimage')->result();

                    //   $quantity=$value->quantity;
                    //   $price=$value->price;
                    //   $discount_prices=$value->discount_prices;
                    //   $total=$quantity*$price;
                    //   $sum+=$total;
                    //   $sum12+=intval($discount_prices);

                     
                  ?>
                    <tr class="gradeX">
                        <td><?=$key +1?></td>
                        <td><?=$value->product_name?></td>
                        <td><img class="banner showTableImage" src="<?=base_url('webroot/adminImages/product_image/'.$product_image[0]->product_image.'')?>" ></td>
                        <td>₹<?=$value->product_sale_price?></td>
                        <td><?=$value->product_qty?></td>
                        <td align="right">₹<?php echo $value->product_sale_price*$value->product_qty;?></td>
                    </tr>
                  <?php }?>
                    
                </tbody>
            </table>
		</div>
	</div>
  <?php 
    // $dis=9;
    // $gst=round(($sum-$sum12) * ($dis/100));
    // $gorss_amount=($sum-$sum12)+$gst+$gst;
  ?>
	<div class="row">
		<div class="col-sm-6">
			<h5><strong>Payment Method : Cod</strong></h5>
		</div>
		<div class="col-sm-6" align="right">
			<h5>Subtotal - ₹</h5>
            <h5>Discount Amount - ₹</h5>
			<h5>CGST(9%) - ₹</h5>
			<h5>SGST(9%) - ₹</h5>
			<h5>Gross Amount - ₹</h5>
		</div>
	</div>
</div>


<script>
    function myFunction() {
    window.print();
}
</script>

