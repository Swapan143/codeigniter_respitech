<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AccountController extends CI_Controller {
	
	 
	function __construct()
	{
	  	parent::__construct();
	  	error_reporting(0);
		$this->load->helper(array('common_helper', 'string', 'form', 'security'));
		$this->load->library(array('form_validation', 'email'));
		$this->load->model('order/Order_Model');
		$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
		if(($this->session->userdata('adminDetails')==NULL)){
		   return redirect('/');
		}
		
	}

	public function monthly_account()
	{
	    $month=date("Y-m");
	    $this->db->select('tbl_byuerproduct.buyer_id,tbl_byuerproduct.product_name,tbl_byuerproduct.product_bye_rate,tbl_byuerproduct.bye_qty,tbl_byuerproduct.product_code,tbl_buyer.buyer_code,tbl_buyer.buyer_name,tbl_byuerproduct.date');
        $this->db->from('tbl_byuerproduct');
        $this->db->join('tbl_buyer', 'tbl_byuerproduct.buyer_id= tbl_buyer.id','inner');
	    $this->db->where('tbl_byuerproduct.month',$month);
	    $this->db->where('tbl_buyer.status','Admin');
	    $product_data=$this->db->get()->result();
	    $this->data['product_data']=$product_data;
	    
	    $this->db->select('tbl_order.order_id,tbl_order.product_code,tbl_order.delivery_date,tbl_order.product_qty,tbl_order.product_sale_price');
        $this->db->from('tbl_order');
	    $this->db->where("DATE_FORMAT(tbl_order.delivery_date,'%Y-%m')", $month);
        $this->db->where('delivery_status', 'Delivered');
	    $order_data=$this->db->get()->result();
	    $this->data['order_data']=$order_data;
	    
	    
		$this->data['page_title']="Book Shop | Monthly Account";
		$this->data['subview']='account/monthly_account';
		$this->load->view('admin/layout/default', $this->data);
	}
	
	public function report_generate()
	{
	    $monthe_name=$this->input->post('monthe_name');
	    
	    $date=date("Y-m-d");
        $ex=explode("-", $date);
        $year=$ex[0];
        $month=$monthe_name;
        $dateObj   = DateTime::createFromFormat('!m', $month);
        $monthName = $dateObj->format('M');
        
    ?>
    <div class="main_conatiner2" style="padding:2%;border-radius:10px" >
    <div class="print" onclick="window.print()" style=";border:1px solid grey;padding-left:3%;padding-right:3%;display:inline-block;cursor:pointer">
       <h4> Print</h4>
    </div>
    <div style="text-align:center">
        <h3>Monthly Account Update(<?php echo $monthName.'-'.$year;?>)</h3>
        
    </div>
    
   <div class="conatiner2" style="width:100%;border:1px solid grey;display:flex">
       <div class="purchase" style="width:60%;border:1px solid grey;padding:1%">
           <table style="width:100%;">
               <tr><td><h2 style="font-weight:bold">Purchase</h2></td></tr>
               <tr>
                   <th style="text-align:center"><u><h4>Vendor Code</h4></u></th>
                   <th style=""><u><h4>Product</h4></u></th> 
                    <th style="text-align:center"><u><h4>Qty</h4></u></th>
                    <th style="text-align:center"><u><h4>Amount</h4></u></th>
                    <th style="text-align:center"><u><h4>Date</h4></u></th>
               </tr>
               <tbody>
                   <?php 
                   
                        $this->db->select('tbl_byuerproduct.buyer_id,tbl_byuerproduct.product_name,tbl_byuerproduct.product_bye_rate,tbl_byuerproduct.bye_qty,tbl_byuerproduct.product_code,tbl_buyer.buyer_code,tbl_buyer.buyer_name,tbl_byuerproduct.date');
                        $this->db->from('tbl_byuerproduct');
                        $this->db->join('tbl_buyer', 'tbl_byuerproduct.buyer_id= tbl_buyer.id','inner');
	                    $this->db->where('tbl_byuerproduct.month',$year.'-'.$month);
	                    $this->db->where('tbl_buyer.status','Admin');
	                    $product_data=$this->db->get()->result();
                   
                        $i=1;
                        foreach($product_data as $key => $value)
                        {
                            
                            $ex=explode("-", $value->date);
                                $year1=$ex[0];
                                $month1=$ex[1];
                                $day1=$ex[2];

                                $monthNum  = $month1;
                                $dateObj   = DateTime::createFromFormat('!m', $monthNum);
                                $monthName = $dateObj->format('M');
                                
                                
                   ?>
                    <tr>
                       <td style="text-align:center">(<?php echo $i;?>)<?=$value->buyer_code?></td>
                       <td style="">(<?php echo $i;?>)<?=$value->product_name?></td>
                       <td style="text-align:center">(<?php echo $i;?>)<?=$value->bye_qty?></td>
                       <td style="text-align:center">(<?php echo $i;?>)<?=$value->product_bye_rate?></td>
                       <td style="text-align:center">(<?php echo $i;?>)<?php echo $day1.'-'.$monthName.'-'.$year1?></td>
                  </tr>
                  <?php $i++; } ?>
               </tbody>
           </table>
       </div>
       <div class="sale" style="width:40%;border:1px solid grey;padding:1%">
           <table style="width:100%;">
               <tr><td><h2 style="font-weight:bold">Sale</h2></td></tr>
               <tr>
                   <th><u><h4>Sl</h4></u></th>
                   <th><u><h4>O.Id</h4></u></th>
                   <th><u><h4>P.Code</h4></u></th>
                   <th><u><h4>Qty</h4></u></th>
                   <th><u><h4>Amount</h4></u></th>
                   <th><u><h4>Date</h4></u></th>
               </tr>
               <tbody>
                   <?php
                        $this->db->select('tbl_order.order_id,tbl_order.product_code,tbl_order.delivery_date,tbl_order.product_qty,tbl_order.product_sale_price');
                        $this->db->from('tbl_order');
	                    $this->db->where("DATE_FORMAT(tbl_order.delivery_date,'%Y-%m')", $year.'-'.$month);
                        $this->db->where('delivery_status', 'Delivered');
	                    $order_data=$this->db->get()->result();
                   
                        foreach($order_data as $key => $value)
                        {
                            
                            $ex=explode("-", $value->delivery_date);
                                $year1=$ex[0];
                                $month1=$ex[1];
                                $day1=$ex[2];

                                $monthNum  = $month1;
                                $dateObj   = DateTime::createFromFormat('!m', $monthNum);
                                $monthName = $dateObj->format('M');
                   ?>
                   
                    <tr>
                       <td><h4><?=$key+1?></h4></td>
                       <td><h4><?=$value->order_id?></h4></td>
                       <td><h4><?=$value->product_code?></h4></td>
                       <td><h4><?=$value->product_qty?></h4></td>
                       <td><h4><?=$value->product_sale_price?></h4></td>
                       <td><h4><?php echo $day1.'-'.$monthName.'-'.$year1?></h4></td>
                        
                  </tr>
                 <?php }  ?>
               </tbody>
           </table>
       </div>
   </div>
    <br>
    <br>
    <div class="conatiner2" style="width:100%;border:1px solid grey;display:flex">
       <div class="purchase" style="width:60%;border:1px solid grey;padding:1%">
           <table style="width:100%;">
               
               <?php 
                    // $month=date("Y-m");
            	    $this->db->select('Sum(tbl_byuerproduct.product_bye_rate * tbl_byuerproduct.bye_qty) as total');
                    $this->db->from('tbl_byuerproduct');
                    $this->db->join('tbl_buyer', 'tbl_byuerproduct.buyer_id= tbl_buyer.id','inner');
            	    $this->db->where('tbl_byuerproduct.month',$year.'-'.$month);
            	    $this->db->where('tbl_buyer.status','Admin');
            	    $product_sum=$this->db->get()->result();
                    foreach($product_sum as $key => $v)
                    {
               ?>
                  <tr style="text-align:right">
                      <td><u><h4>Purchase Total Amount:₹ <?php echo number_format($v->total,2);?></h4></u></td>
                  </tr>
              <?php 
                    }
              ?>
                  <tr style="text-align:right">
                       <td><u><h4>Extra Cost Amount:₹ 00.00</h4></u></td>
                       
                  </tr>
                  <tr style="text-align:right">
                       <td><u><h4>Employ Salar:₹ 00.00</h4></u></td>
                       
                  </tr>
                  <tr style="text-align:right">
                      <?php 
                            if(!empty($v->total))
                            {
                      ?>
                       <td><u><h4>In Word( <?php echo $this->getIndianCurrency($v->total);  ?>)</h4></u></td>
                       <?php } ?>
                       
                  </tr>
               
           </table>
       </div>
       <div class="sale" style="width:40%;border:1px solid grey;padding:1%">
           <table style="width:100%;">
               <?php 
                    $this->db->select('Sum(tbl_order.product_sale_price * tbl_order.product_qty) as total_order');
                    $this->db->from('tbl_order');
            	    $this->db->where("DATE_FORMAT(tbl_order.delivery_date,'%Y-%m')", $year.'-'.$month);
                    $this->db->where('delivery_status', 'Delivered');
            	    $sum_order=$this->db->get()->result();
            	    foreach($sum_order as $val)
            	    {
            	        
            	    }
               ?>
               
                <tr style="text-align:right">
                    <td><u><h4>Sale Total Amount:₹ <?php echo number_format($val->total_order,2);?></h4></u></td>
                </tr>
                
                  <tr style="text-align:right">
                       <td><u><h4>Refund Cost Amount:₹ 101010.00</h4></u></td>
                  </tr>
                  
                  <tr style="text-align:right">
                       <td><u><h4>Gross Amount:₹ 101010.00</h4></u></td>
                       
                  </tr>
               
           </table>
       </div>
   </div>
   <br>
   <br>
    
   
</div>
<?php
	    
	}
	
function getIndianCurrency(int $number)
{
    
    $decimal = round($number - ($no = floor($number)), 2) * 100;
    $hundred = null;
    $digits_length = strlen($no);
    $i = 0;
    $str = array();
    $words = array(0 => '', 1 => 'One', 2 => 'Two',
        3 => 'Three', 4 => 'Four', 5 => 'Five', 6 => 'Six',
        7 => 'Seven', 8 => 'Eight', 9 => 'Nine',
        10 => 'Ten', 11 => 'Eleven', 12 => 'Twelve',
        13 => 'Thirteen', 14 => 'Fourteen', 15 => 'Fifteen',
        16 => 'Sixteen', 17 => 'Seventeen', 18 => 'Eighteen',
        19 => 'Nineteen', 20 => 'Twenty', 30 => 'Thirty',
        40 => 'Forty', 50 => 'Fifty', 60 => 'Sixty',
        70 => 'Seventy', 80 => 'Eighty', 90 => 'Ninety');
    $digits = array('', 'Hundred','Thousand','Lakh', 'Crore');
    while( $i < $digits_length ) {
        $divider = ($i == 2) ? 10 : 100;
        $number = floor($no % $divider);
        $no = floor($no / $divider);
        $i += $divider == 10 ? 1 : 2;
        if ($number) {
            $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
            $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
            $str [] = ($number < 21) ? $words[$number].' '. $digits[$counter]. $plural.' '.$hundred:$words[floor($number / 10) * 10].' '.$words[$number % 10]. ' '.$digits[$counter].$plural.' '.$hundred;
        } else $str[] = null;
    }
    $Rupees = implode('', array_reverse($str));
    $paise = ($decimal > 0) ? "." . ($words[$decimal / 10] . " " . $words[$decimal % 10]) . ' Paise' : '';
    return ($Rupees ? $Rupees . 'Rupees Only' : '') . $paise;
}
	

}
