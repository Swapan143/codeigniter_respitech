<?php
//print_r($product_resutl);
foreach($product_resutl as $val)
{
    
    $order_id=$val->order_id;
    $order_date=$val->order_date;
    $invoice_no=$val->invoice_no;
    
    $qrcode=$val->qrcode;
    
    $product_sale_price=$val->product_sale_price;
    $product_qty=$val->product_qty;
    $total=$product_sale_price*$product_qty;
    
    $sum+=$total;

              $ex=explode("-",$order_date);
              $year=$ex[0];
              $month=$ex[1];
              $day=$ex[2];
              $monthName = date('M', mktime(0, 0, 0, $month, 10));
         $discount_amount=9;     
              
         
              
    
}
$total_dis_amount = round($sum * ($discount_amount/100));     
?>

        <style>
        @media screen and (max-width: 600px) and (min-width: 200px){
            .detail{
                justify-content:flex-start;

            }
            .print_main{
                justify-content:flex-start;

            }
            .main_product_details{
                overflow-x:scroll;
            }

        }
        .row.col-lg-3{
            display:flex;
            align-items:center;
            justify-content:center;
        }
        .qr{
            display:flex;
        }
       

</style>

<div class="container">
    <div class="row">
        <div class="col-lg-12 mb-10 " style="text-align:center;display:flex;justify-content:center;height:30px">
           <div class="small_logo">
               <img style="width:80px;height:30px" src="<?=base_url()?>webroot/user_panel/assets/img/logo/bookshopsmall.png"></img><span>Bookshop</span>
           </div>
            
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-12 mb-30 " style="text-align:center">
            <h5>Mobile No:90872737</h5>
            <h5>Address:10/1 Hindustan Road 70029</h5>
            <h5>GST No:13v3445</h5>
            
        </div>
        
    </div>
    <div class="row" style="text-align:center;height:70%;">
        <div class="col-lg-10  col-12  detail" style="display:flex;">
        <div class="print" style="font-size:100%;width:100%;height:100%;display:flex;align-items:center;justify-content:center;font-weight:100px">
               <h4 style="text-align:center">Tax invoice</h4> 
           </div>
       
        </div>

        <div class="col-lg-2  col-12  print_main d-print-none"  style="display:flex;">
           <div class="print" onclick="window.print()" style="width:100%;height:100%;border:1px solid pink;display:flex;align-items:center;justify-content:center;background-color: #fa6bff;cursor:pointer;color:white;">
                Print Detail 
           </div>
        </div>
    </div>
    <br>
    <div class="row" style="border-bottom:1px solid grey;height:70px;display:flex;justify-content:space-between">
        <div class="col-lg-8 col-6">
                <div class="col-lg-4  col-12" >
                  order id:<?php echo $order_id;?>
               </div>
                <div class="col-lg-4  col-12" >
                    order date:<?php echo $day;?>-<?php echo $monthName;?>-<?php echo $year;?>
                    
                </div>
                <div class="col-lg-4 col-12 " >
                    
                        order total:₹<?php echo $sum+$total_dis_amount+$total_dis_amount;?>
                </div>
        </div>
        <div class="col-lg-4 col-6" style="text-align:end">
            <img src="<?=base_url('webroot/adminImages/qrcode/'.$qrcode.'')?>" style="height:112px;"><br>
            <h5 style="border:1px dashed black;display:inline-block">In Voice No &ensp;:&ensp;<?php echo $invoice_no;?></h5>
        </div>
     </div>
    <br>
    <div class="col-lg-12 col-12" class="qr">
       
            <div class="row" style="height:40px">
                <div class="col-12">
                    Name:<?php echo $val->bill_name;?>
                </div>
                <div class="col-12 ">
        
                   Address:<?php echo $val->bill_street;?>, <?php echo $val->bill_zip;?> , <?php echo $val->bill_state;?>
                </div>
        </div>
       
    </div>
    <br>
    <br>
    <br>

    <div class="row  ">
      <div class="col-12">
        <div class="row"style="border:1px solid grey;height:40px;padding-left:15px;padding-top:5px">
           Product Details
       </div>
       <div class="row "style="border:1px solid grey;padding-top:1%;padding-bottom:1%;padding-left:1%;padding-right:10px">
        <div class="col-12 col-lg-12 main_product_details ">
          
           
           <table style=";border:1px solid black">
              <tr style="height:50px;text-align:center">
                <th style="border:1px solid grey;">Sl No</th>
                <th style="border:1px solid grey;">Product Name</th>
                <th style="border:1px solid grey;">Product Image</th>
                <th style="border:1px solid grey;">Description</th>
                <th style="border:1px solid grey;padding-left:10px;padding-right:10px">Price-Rate</th>
                <th style="border:1px solid grey;padding-left:10px;padding-right:10px">Quantity</th>
                <th style="border:1px solid grey;;padding-left:10px;padding-right:10px">Discount</th>
                <th style="border:1px solid grey;">Total Amount</th>
             </tr>
              
              <?php
                                    $this->db->where('order_id', $order_id);
                                    $order_details_two=$this->db->get('tbl_order')->result();
                                    $sum=0;
                                    $i=1;
                                    foreach($order_details_two as $val2)
                                    {
                            $this->db->limit(1);
                            $this->db->where('product_id', $val2->product_id);
                            $product_image=$this->db->get('tbl_productimage')->result();
					            
					        $product_image1=trim($product_image[0]->product_image,",");
					            
					        $sum+=$val2->product_sale_price*$val2->product_qty;
					        
					        $this->db->where('product_name', $val2->product_id);
                            $product_details=$this->db->get('tbl_product')->result();
					        
					        ?>
              <tr style="height:50px;text-align:center">
                <td style="border:1px solid grey"><?php echo $i;?></td>
                <td style="border:1px solid grey"><?php echo $val2->product_name;?></td>
                <td style="border:1px solid grey"><img style="height:100px ;width:100px;padding:5%" src="<?=base_url('webroot/adminImages/product_image/'.$product_image1.'')?>"></img></td>
                <td style="border:1px solid grey"><?php echo $product_details[0]->product_description;?> </td>
                <td style="border:1px solid grey">₹<?php echo $val2->product_sale_price;?></td>
                <td style="border:1px solid grey"><?php echo $val2->product_qty;?></td>
                <td style="border:1px solid grey">0%</td>
                <td style="border:1px solid grey">₹<?php echo $val2->product_sale_price*$val2->product_qty;?></td>
              </tr>
              
              <?php $i++;
              }?>
              <tr style="height:50px;">
                  
                       <td style="border:1px solid grey;text-align:right;" colspan="7">Sub-Total&ensp;</td>
                       <td style="border:1px solid grey;text-align:center">₹<?php echo $sum;?></td>
              </tr>
              <tr style="height:50px;">
                  
                       <td style="border:1px solid grey;text-align:right;" colspan="7">Discount&ensp;</td>
                       <td style="border:1px solid grey;text-align:center">₹00</td>
              </tr>
              
              <tr style="height:50px;">
                  
                       <td style="border:1px solid grey;text-align:right;" colspan="7">SGST(9%)</td>
                       <td style="border:1px solid grey;text-align:center">₹<?php echo $total_dis_amount;?></td>
              </tr>
              
              <tr style="height:50px;">
                  
                       <td style="border:1px solid grey;text-align:right;" colspan="7">CGST(9%)</td>
                       <td style="border:1px solid grey;text-align:center">₹<?php echo $total_dis_amount;?></td>
              </tr>

              <tr style="height:50px;">
                  
                  <td style="border:1px solid grey;text-align:right;" colspan="7">Shipping Charge&ensp;</td>
                  <td style="border:1px solid grey;text-align:center">₹0.0</td>
              </tr>
              <tr style="height:50px;">
                  
                  <td style="border:1px solid grey;text-align:right;" colspan="7">Grand Total&ensp;</td>
                  <td style="border:1px solid grey;text-align:center">₹<?php echo $sum+$total_dis_amount+$total_dis_amount;?></td>
              </tr>

           </table>
           
        </div>
        
        
        <?php 
        
        $number = $sum+$total_dis_amount+$total_dis_amount;
   $no = floor($number);
   $point = round($number - $no, 2) * 100;
   $hundred = null;
   $digits_1 = strlen($no);
   $i = 0;
   $str = array();
   $words = array('0' => '', '1' => 'one', '2' => 'two',
    '3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
    '7' => 'seven', '8' => 'eight', '9' => 'nine',
    '10' => 'ten', '11' => 'eleven', '12' => 'twelve',
    '13' => 'thirteen', '14' => 'fourteen',
    '15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
    '18' => 'eighteen', '19' =>'nineteen', '20' => 'twenty',
    '30' => 'thirty', '40' => 'forty', '50' => 'fifty',
    '60' => 'sixty', '70' => 'seventy',
    '80' => 'eighty', '90' => 'ninety');
   $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
   while ($i < $digits_1) {
     $divider = ($i == 2) ? 10 : 100;
     $number = floor($no % $divider);
     $no = floor($no / $divider);
     $i += ($divider == 10) ? 1 : 2;
     if ($number) {
        $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
        $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
        $str [] = ($number < 21) ? $words[$number] .
            " " . $digits[$counter] . $plural . " " . $hundred
            :
            $words[floor($number / 10) * 10]
            . " " . $words[$number % 10] . " "
            . $digits[$counter] . $plural . " " . $hundred;
     } else $str[] = null;
  }
  $str = array_reverse($str);
  $result = implode('', $str);
  $points = ($point) ?
    "." . $words[$point / 10] . " " . 
          $words[$point = $point % 10] : '';
  //echo $result . "Rupees  " . $points;
        
      ?>  
        
          <div class="col-lg-12" style="padding:2%;display:flex;justify-content:end">
            <h5>In Words : <?php echo $result . "Rupees  " . $points. " Only";?></h5>
         </div>
       </div>
      </div>
        
       
    </div>
      
    <br>

    <div class="row">
        <div class="col-12">
            <h5 style="color:grey">your ordered goods will be billed and delivered to the following address</h5>

        </div>
    </div>
    <br>

    <div class="row">
        <div class="col-12">
            <div class="row" >
                <div class="col-7" style="border:1px solid grey;height:40px">
                    <h5>Delivery Address</h5>
                </div>
                <div class="col-5" style="border:1px solid grey;height:40px">
                    <h5>Billing Address</h5>
                </div>
            </div>
            <div class="row" >
                <div class="col-7" style="border:1px solid grey;">
                    <h6>Name : <?php echo $val->deli_name;?></h6>
                    <h6>Mobile No:<?php echo $val->deli_mobile;?></h6>
                    <h6>Alternative No:</h6>
                    <h6>Landmark:<?php echo $val->deli_street;?></h6>
                    <h6>Locality: <?php echo $val->deli_street;?></h6>
                    <h6><?php echo $val->deli_street;?> - <?php echo $val->deli_zip;?> - <?php echo $val->deli_state;?></h6>
                </div>
                <div class="col-5" style="border:1px solid grey;">
                    <h6><?php echo $val->bill_name;?></h6>
                    <h6><?php echo $val->bill_mobile;?></h6>
                    <h6><?php echo $val->bill_email;?></h6>
                </div>
            </div>
        </div>
    </div>
    <br>

    <div class="row">
        <div class="col-12">
            <h6> Payment Details</h6>
            <h6> Paid Method-<?php echo $val->payment_method;?></h6>
            <h6>Transaction ID-#<?php echo $val->tranction_id;?></h6>
            <h6>Paid Amount-<?php echo $sum+$total_dis_amount+$total_dis_amount;?></h6>
        <div>
    </div>
</div>
<form action="<?=base_url('download_invoice')?>" method="post">
<input type="hidden" name="order_id" value="<?php echo $order_id;?>">
<input type="submit" name="submit" value="Download Invoice">
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
    function xyzoij9uij(){
    window.print();
    }
    </script>
    <script>
        function download_invoice(x)
        {
  var base_url=$('#base_url').val(); 
  
  $.ajax({
        url:base_url+'download_invoice',
        type: 'POST',
        data: {order_id:x},
        success:function(data) {
        alert(data);
       
        },

    });
           
        }
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
    
    