<?php
include('vendor/autoload.php');

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
        <?php
        $html.='<style>
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
        
        .inv{
            text-align:end;
        }
       

</style>';

$html.='<div class="container">
    <div class="row">
        <div class="col-lg-12 mb-10 " style="text-align:center;display:flex;justify-content:center;height:30px">
           <div class="small_logo">
               <img style="width:80px;height:30px" src="https://bongtechsolutions.com/server/book-ecommerce/webroot/user_panel/assets/img/logo/bookshopsmall.png"></img><span>Bookshop</span>
           </div>
            
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-12 mb-30 " style="text-align:center">
            <h5>Mobile No:90872737</h5>
            <h5>Address:10/1 Hindustan Road 70029</h5>
            <h5>GST No:13v3445</h5>
            
        </div>
        
    </div>
    
    <div class="row" style="text-align:center;">
        <div class="col-lg-10  col-12  detail" style="display:flex;">
        <div class="print" style="font-size:100%;width:100%;display:flex;align-items:center;justify-content:center;font-weight:100px">
               <h4 style="text-align:center">Tax invoice</h4> 
           </div>
       
        </div>

    </div>';?>
    
   <?php  $html.='<div class="row" style="border-bottom:1px solid grey;height:70px;display:flex;justify-content:space-between">
        <div class="col-lg-8 col-6">
                <div class="col-lg-4  col-12" >
                  order id:'.$order_id.'
               </div>
                <div class="col-lg-4  col-12" >
                    order date:'.$day.'-'.$monthName.''.$year.'
                    
                </div>
                <div class="col-lg-4 col-12" >
                    
                        order total:₹'.$sum+$total_dis_amount+$total_dis_amount.'
                </div>
        </div>
        <div class="col-lg-4 col-6 inv">
            <img src="https://bongtechsolutions.com/server/book-ecommerce/webroot/adminImages/qrcode/'.$qrcode.'" style="height:112px;"><br>
            <h5 style="border:1px dashed black;display:inline-block">In Voice No &ensp;:&ensp;'.$invoice_no.'</h5>
        </div>
     </div>
    
    <div class="col-lg-12 col-12" class="qr">
       
            <div class="row" style="height:40px">
                <div class="col-12">
                    Name:'.$val->bill_name.'
                </div>
                <div class="col-12 ">
        
                   Address:'.$val->bill_street.', '.$val->bill_zip.' , '.$val->bill_state.'
                </div>
        </div>
       
    </div>
    
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
             </tr>';?>
              
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
					        <?php 
              $html.='<tr style="height:50px;text-align:center">
                <td style="border:1px solid grey">'.$i.'</td>
                <td style="border:1px solid grey">'.$val2->product_name.'</td>
                <td style="border:1px solid grey"><img style="height:100px ;width:100px;padding:5%" src="https://bongtechsolutions.com/server/book-ecommerce/webroot/adminImages/product_image/'.$product_image1.'"></img></td>
                <td style="border:1px solid grey">'.$product_details[0]->product_description.'</td>
                <td style="border:1px solid grey">₹'.$val2->product_sale_price.'</td>
                <td style="border:1px solid grey">'.$val2->product_qty.'</td>
                <td style="border:1px solid grey">0%</td>
                <td style="border:1px solid grey">₹'.$val2->product_sale_price*$val2->product_qty.'</td>
              </tr>';?>
              
              <?php $i++;
              }?>
              <?php 
              $html.='<tr style="height:50px;">
                  
                       <td style="border:1px solid grey;text-align:right;" colspan="7">Sub-Total&ensp;</td>
                       <td style="border:1px solid grey;text-align:center">₹'.$sum.'</td>
              </tr>
              <tr style="height:50px;">
                  
                       <td style="border:1px solid grey;text-align:right;" colspan="7">Discount&ensp;</td>
                       <td style="border:1px solid grey;text-align:center">₹00</td>
              </tr>
              
              <tr style="height:50px;">
                  
                       <td style="border:1px solid grey;text-align:right;" colspan="7">SGST(9%)</td>
                       <td style="border:1px solid grey;text-align:center">₹'.$total_dis_amount.'</td>
              </tr>
              
              <tr style="height:50px;">
                  
                       <td style="border:1px solid grey;text-align:right;" colspan="7">CGST(9%)</td>
                       <td style="border:1px solid grey;text-align:center">₹'.$total_dis_amount.'</td>
              </tr>

              <tr style="height:50px;">
                  
                  <td style="border:1px solid grey;text-align:right;" colspan="7">Shipping Charge&ensp;</td>
                  <td style="border:1px solid grey;text-align:center">₹0.0</td>
              </tr>
              <tr style="height:50px;">
                  
                  <td style="border:1px solid grey;text-align:right;" colspan="7">Grand Total&ensp;</td>
                  <td style="border:1px solid grey;text-align:center">₹'.$sum+$total_dis_amount+$total_dis_amount.'</td>
              </tr>

           </table>
           
        </div>';?>
        
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
        
          <?php $html.='<div class="col-lg-12" style="padding:2%;display:flex;justify-content:end">
            <h5>In Words : '.$result . "Rupees  " . $points. " Only".'</h5>
         </div>
       </div>
      </div>
        
       
    </div>'?>
      
    
<?php
    $html.='<div class="row">
        <div class="col-12">
            <h5 style="color:grey">your ordered goods will be billed and delivered to the following address</h5>

        </div>
    </div>'?>
    

    <?php $html.='<div class="row">
        <div class="col-12">
            <div class="row" >
                <div class="col-7" style="border:1px solid grey;height:40px">
                    <h5>Delivery Address</h5>
                </div>
                <div class="col-5" style="border:1px solid grey;height:40px">
                    <h5>Billing Address</h5>
                </div>
            </div>'?>
            <?php 
            $html.='<div class="row" >
                <div class="col-7" style="border:1px solid grey;">
                    <h6>Name : '.$val->deli_name.'</h6>
                    <h6>Mobile No:'.$val->deli_mobile.'</h6>
                    <h6>Alternative No:</h6>
                    <h6>Landmark:'.$val->deli_street.'</h6>
                    <h6>Locality: '.$val->deli_street.'</h6>
                    <h6>'.$val->deli_street.' - '.$val->deli_zip.'- '.$val->deli_state.'</h6>
                </div>'?>
                <?php $html.='<div class="col-5" style="border:1px solid grey;">
                    <h6>'.$val->bill_name.'</h6>
                    <h6>'.$val->bill_mobile.'</h6>
                    <h6>'.$val->bill_email.'</h6>
                </div>
            </div>
        </div>
    </div>
    <br>'?>

    <?php $html.='<div class="row">
        <div class="col-12">
            <h6> Payment Details</h6>
            <h6> Paid Method-'.$val->payment_method.'</h6>
            <h6>Transaction ID-#'.$val->tranction_id.'</h6>
            <h6>Paid Amount-'.$sum+$total_dis_amount+$total_dis_amount.'></h6>
        <div>
    </div>
</div>';?>

<?php

$mpdf=new \Mpdf\Mpdf(['format' => 'A4-L']);
$mpdf->WriteHTML($html);
$file='media/'.time().'.pdf';
$mpdf->output($file,'D');
//D
//I
//F
//S
?>