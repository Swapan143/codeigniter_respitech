<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OrderController extends CI_Controller {
	
	 
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

	public function pending_order()
	{
		$pending_data=$this->Order_Model->pending_order_data();
		$this->data['pending_data']=$pending_data;  
		$this->data['page_title']="Book Shop | Pending Order";
		$this->data['subview']='order/pending_order';
		$this->load->view('admin/layout/default', $this->data);
	}
	
	public function order_status()
	{
	    $str=$this->input->post('uniqcode'); 
        $data=explode("_",$str);  
        $uniqcode=$data[0];
        $status=$data[1];
        
        $order_code= $uniqcode; 
        // echo $order_code; die;
         if($status=='Ordered'){
            $data=array(
                'delivery_status'=>'Ordered',
                'delivery_date'=>date('Y-m-d'),
            );
            $this->db->where('order_id',$order_code);        
            $update1=$this->db->update('tbl_order', $data);
            echo 1;
        }elseif($status=='Packed'){
            $data=array(
                'delivery_status'=>'Packed',
                'delivery_date'=>date('Y-m-d'),
            );
            $this->db->where('order_id',$order_code);        
            $update1=$this->db->update('tbl_order', $data);
            echo 2;
        } elseif($status=='Shipped'){
            $data=array(
                'delivery_status'=>'Shipped',
                'delivery_date'=>date('Y-m-d'),
            );
            $this->db->where('order_id',$order_code);        
            $update1=$this->db->update('tbl_order', $data);
            echo 3;
        } elseif($status=='Delivered'){
            $data=array(
                'delivery_status'=>'Delivered',
                'delivery_date'=>date('Y-m-d'),
            );
            $this->db->where('order_id',$order_code);        
            $update1=$this->db->update('tbl_order', $data);
            echo 4;
        }
    }
    
    public function delivery_order()
    {
        $delivery_data=$this->Order_Model->delivery_order_data();
		$this->data['delivery_data']=$delivery_data;  
		$this->data['page_title']="Book Shop | Pending Order";
		$this->data['subview']='order/delivery_order';
		$this->load->view('admin/layout/default', $this->data);
    }
    
   public function view_order($order_id)
    {
      $order_code=$order_id;
	  $this->db->select('tbl_order.order_id,tbl_order.bill_name,tbl_order.deli_mobile,tbl_order.bill_mobile,tbl_order.deli_street,tbl_order.deli_town,tbl_order.deli_state,tbl_order.product_name,tbl_order.product_qty,
	                    tbl_order.product_sale_price,tbl_order.payment_method,tbl_order.payment_status,tbl_order.order_date,tbl_order.bill_email,tbl_order.deli_zip');
	  $this->db->from('tbl_order');
// 	  $this->db->join('tbl_shop','tbl_shop.uniqcode = tbl_order.shop_id', 'inner');
//       $this->db->join('tbl_size','tbl_size.uniqcode = tbl_order.product_id', 'inner');
//       $this->db->join('tbl_brand','tbl_brand.uniqcode = tbl_order.brand_id', 'inner');
//       $this->db->where('tbl_order.status','Distributor Sell');
    //   $this->db->where('tbl_order.seller_id','Distributor');
      $this->db->where('tbl_order.order_id',$order_code);
    //   $this->db->where('tbl_order.order_status','Pending');
    //   $this->db->where('tbl_shop.type','Distributor');
      $this->db->order_by('tbl_order.id', 'DESC');
      $order_details = $this->db->get()->row();
    //   pr($counter_sales); die;
      $this->data['order_details']=$order_details;
      $this->data['page_title']="Book Shop | View Order";
	  $this->data['subview']='order/order_bill';
	  $this->load->view('admin/layout/default', $this->data);
    } 
   
	public function change_status($uniqcode)  
	{
		$warehose_id=$this->session->userdata('adminDetails')->uniqcode;
		$product_data=$this->Order_Model->get_warhouse_product_data($uniqcode,$warehose_id);

		foreach ($product_data as $key => $value) {
			$warehouse_product_data=$this->Order_Model->product_data_warhouse_by($value->warhouse_id,$value->product_id,$value->product_features_id);
			$order_quantity=$value->quantity;
			$product_quantity=$warehouse_product_data->quantity;
			$total_quantity=($product_quantity - $order_quantity);

			$update_product_quantity=array(
			'quantity'=>$total_quantity,
			'update_date'=>date('Y-m-d h:i:s')
			);
			$this->db->where('product_id', $value->product_id);
			$this->db->where('product_features_id', $value->product_features_id);
			$this->db->where('warehouse_id', $value->warhouse_id);
			$update=$this->db->update('tbl_total_stock_warehouse', $update_product_quantity);
		}

		$data=array(
			'invoice_no'=>"In".random_string('numeric',10),
			'status'=>'Delivered',
			'delivery_date'=>date('Y-m-d h:i:s')
		);
			
		$where=array('uniqcode'=>$uniqcode);
		$count=$this->Order_Model->update_status($where,$data);
		if($count)
		{
			$this->session->set_flashdata('success', 'Order delivery successfully.');
			redirect('admin/pending-order');

		}
	}

	

	


	public function bill_genarate($uniqcode)  
	{
		$all_product=$this->Order_Model->bill_product_details($uniqcode);
		
		// $data=array('bill_status'=>'send');
		// $where=array('order_code'=>$order_code);
		// $this->Order_Model->update_status($where,$data);
		
		$data['all_product']=$all_product;
		//pr($data);die();
		$mpdf = new \Mpdf\Mpdf();
		$html = $this->load->view('admin/orderlist/bill_payment',$data,true);
		$mpdf->WriteHTML($html);
		$mpdf->Output(); 
	}
	
	
	public function counter_sales()
	{
	    $this->db->select('Sum(tbl_order.price * tbl_order.quantity) as total,tbl_order.order_code,tbl_order.invoice_no,tbl_order.order_date,tbl_order.payment_type,tbl_order.quantity,tbl_order.price,tbl_order.order_status,
	                        tbl_shop.name,tbl_shop.address,tbl_shop.mobile,tbl_size.size,tbl_brand.brand_name,tbl_shop.gst_no,tbl_size.hsn_no');
        $this->db->from('tbl_order');
        $this->db->join('tbl_shop','tbl_shop.uniqcode = tbl_order.shop_id', 'inner');
        $this->db->join('tbl_size','tbl_size.uniqcode = tbl_order.product_id', 'inner');
        $this->db->join('tbl_brand','tbl_brand.uniqcode = tbl_order.brand_id', 'inner');
        $this->db->where('tbl_shop.type','Retailler');
        $this->db->where('tbl_order.status','Counter Sell');
        $this->db->where('tbl_order.seller_id','Admin');
        $this->db->group_by('tbl_order.order_code');                
        $this->db->order_by('tbl_order.id', 'DESC');
        $counter_sales = $this->db->get()->result();
        // pr($counter_sales); die;
        $this->data['counter_sales']=$counter_sales;
	    
	    $this->data['page_title']="Utsav | Counter Sales";
		$this->data['subview']='orderlist/counter_sales';
		$this->load->view('admin/layout/default', $this->data);
	}
	
	public function counter_bill($order_id)
	{
        $order_code="#".$order_id;
	    $this->db->select('tbl_order.order_code,tbl_order.invoice_no,tbl_order.order_date,tbl_order.payment_type,tbl_order.quantity,tbl_order.price,tbl_order.order_status,
	                        tbl_shop.name,tbl_shop.address,tbl_shop.mobile,tbl_size.size,tbl_brand.brand_name,tbl_order.product_code,tbl_shop.gst_no');
	    $this->db->from('tbl_order');
        $this->db->join('tbl_shop','tbl_shop.uniqcode = tbl_order.shop_id', 'inner');
        $this->db->join('tbl_size','tbl_size.uniqcode = tbl_order.product_id', 'inner');
        $this->db->join('tbl_brand','tbl_brand.uniqcode = tbl_order.brand_id', 'inner');
        $this->db->where('tbl_order.status','Counter Sell');
        $this->db->where('tbl_order.seller_id','Admin');
        $this->db->where('tbl_order.order_code',$order_code);
        $this->db->order_by('tbl_order.id', 'DESC');
        $counter_sales = $this->db->get()->result();
        $this->data['counter_sales']=$counter_sales;
       
        $this->data['page_title']="Utsav | Counter Sales";
	    $this->data['subview']='orderlist/counter_bill';
	    $this->load->view('admin/layout/default', $this->data);
	}
	
	public function counter_order_search()
	{
	   $start_date = $this->input->post('start_date');
	   $end_date = $this->input->post('end_date');
	   $this->db->select('Sum(tbl_order.price * tbl_order.quantity) as total,tbl_order.order_code,tbl_order.invoice_no,tbl_order.order_date,tbl_order.payment_type,tbl_order.quantity,tbl_order.price,tbl_order.order_status,
	                        tbl_shop.name,tbl_shop.address,tbl_shop.mobile,tbl_size.size,tbl_brand.brand_name');
        $this->db->from('tbl_order');
        $this->db->join('tbl_shop','tbl_shop.uniqcode = tbl_order.shop_id', 'inner');
        $this->db->join('tbl_size','tbl_size.uniqcode = tbl_order.product_id', 'inner');
        $this->db->join('tbl_brand','tbl_brand.uniqcode = tbl_order.brand_id', 'inner');
        $this->db->where('tbl_order.status','Counter Sell');
        $this->db->where('tbl_order.seller_id','Admin');
         if(!empty($start_date) && !empty($end_date) )
            {
                $this->db->where('tbl_order.order_date BETWEEN "'. $start_date. '" AND "'. $end_date. '" ');
            }else if(!empty($end_date))
            {
                $this->db->where('tbl_order.order_date)',$end_date);
            }
        $this->db->group_by('tbl_order.order_code');                
        $this->db->order_by('tbl_order.id', 'DESC');
        $counter_sales = $this->db->get()->result();
        
        foreach($counter_sales as $key => $va)
        {
            $ex=explode("#", $va->order_code);
            $uni_id=$ex[1];
            $id=$key+1;
            echo '
                 <tr class="gradeX">
                    <td>'.$id.'</td>
                    <td>'.$va->order_code.'</td>
                    <td>'.$va->invoice_no.'</td>
                    <td>'.$va->name.'</td>
                    <td>'.$va->mobile.'</td>
                    <td>'.$va->address.'</td>
                    <td>'.$va->total.'</td>
                    <td>'.$va->payment_type.'</td>
                    <td>'.$va->order_date.'</td>
                    <td>'.$va->order_status.'</td>
                    <td><a href="'.base_url('admin/view-counter-order/'.$uni_id).'">view</a></td>
                 </tr>
            ';
        }
	   
	}
	
// 	public function distributor_pending_order()
// 	{
	    
// 	    $this->db->select('Sum(tbl_order.price * tbl_order.quantity) as total,tbl_order.order_code,tbl_order.invoice_no,tbl_order.order_date,tbl_order.payment_type,tbl_order.quantity,tbl_order.price,tbl_order.order_status,
// 	                        tbl_shop.name,tbl_shop.address,tbl_shop.mobile,tbl_size.size,tbl_brand.brand_name');
//         $this->db->from('tbl_order');
//         $this->db->join('tbl_shop','tbl_shop.uniqcode = tbl_order.shop_id', 'inner');
//         $this->db->join('tbl_size','tbl_size.uniqcode = tbl_order.product_id', 'inner');
//         $this->db->join('tbl_brand','tbl_brand.uniqcode = tbl_order.brand_id', 'inner');
//         $this->db->where('tbl_shop.type','Distributor');
//         $this->db->where('tbl_order.status','Distributor Sell');
//         $this->db->where('tbl_order.seller_id','Distributor');
//         $this->db->where('tbl_order.order_status','Pending');
//         $this->db->group_by('tbl_order.order_code');                
//         $this->db->order_by('tbl_order.id', 'DESC');
//         $distributor_order = $this->db->get()->result();
//         $this->data['distributor_order']=$distributor_order;
	    
// 	   $this->data['page_title']="Utsav | Pending Order";
// 	   $this->data['subview']='orderlist/pending_order';
// 	   $this->load->view('admin/layout/default', $this->data);
// 	}
	

    
    
    
  
    
    public function change_order_status($order_id)
    {
        $order_code="#".$order_id;
        $this->db->select('tbl_order.quantity,tbl_order.product_code,tbl_order.brand_id,tbl_order.product_id');
        $this->db->from('tbl_order');
        $this->db->where('tbl_order.status','Distributor Sell');
        $this->db->where('tbl_order.seller_id','Distributor');
        $this->db->where('tbl_order.order_code',$order_code);
        $distributor_order = $this->db->get()->result();
        
        foreach($distributor_order as $key => $value)
        {
            $this->db->select('quentity as p_qty,product_code as p_code');
            $this->db->from('tbl_total_stock');
            $this->db->where('brand_id',$value->brand_id);
            $this->db->where('product_id',$value->product_id);
            $product_data = $this->db->get()->row();
            
            $order_quantity=$value->quantity;
            $product_quantity=$product_data->p_qty;
            $total_quantity=($product_quantity - $order_quantity);
            
            $update_product_quantity=array(
			    'quentity'=>$total_quantity,
			    );
			$this->db->where('product_id', $value->product_id);
			$this->db->where('brand_id', $value->brand_id);
			$update=$this->db->update('tbl_total_stock', $update_product_quantity);
        }
        
        $data=array(
			'order_status'=>'Delevery',
			'delivery_date'=>date('Y-m-d')
		);
		$where=array('order_code'=>$order_code);
		$count=$this->Order_Model->update_status($where,$data);
		if($count)
		{
			$this->session->set_flashdata('success', 'Order delivery successfully.');
			redirect('admin/distributor-delivery-order');

		}
        
    }
    
    public function distributor_order_search()
	{
	   $start_date = $this->input->post('start_date');
	   $end_date = $this->input->post('end_date');
	   $this->db->select('Sum(tbl_order.price * tbl_order.quantity) as total,tbl_order.order_code,tbl_order.invoice_no,tbl_order.order_date,tbl_order.payment_type,tbl_order.quantity,tbl_order.price,tbl_order.order_status,
	                        tbl_shop.name,tbl_shop.address,tbl_shop.mobile,tbl_size.size,tbl_brand.brand_name,tbl_order.delivery_date');
        $this->db->from('tbl_order');
        $this->db->join('tbl_shop','tbl_shop.uniqcode = tbl_order.shop_id', 'inner');
        $this->db->join('tbl_size','tbl_size.uniqcode = tbl_order.product_id', 'inner');
        $this->db->join('tbl_brand','tbl_brand.uniqcode = tbl_order.brand_id', 'inner');
        $this->db->where('tbl_shop.type','Distributor');
        $this->db->where('tbl_order.status','Distributor Sell');
        $this->db->where('tbl_order.seller_id','Distributor');
        if(!empty($start_date) && !empty($end_date) )
            {
                $this->db->where('tbl_order.order_date BETWEEN "'. $start_date. '" AND "'. $end_date. '" ');
            }else if(!empty($end_date))
            {
                $this->db->where('tbl_order.order_date)',$end_date);
            }
        $this->db->group_by('tbl_order.order_code');                
        $this->db->order_by('tbl_order.id', 'DESC');
        $distributor_order = $this->db->get()->result();
        
        foreach($distributor_order as $key => $va)
        {
            $ex=explode("#", $va->order_code);
            $uni_id=$ex[1];
            $id=$key+1;
            echo '
                 <tr class="gradeX">
                    <td>'.$id.'</td>
                    <td>'.$va->order_code.'</td>
                    <td><div style="width: 80px;">'.$va->invoice_no.'</div></td>
                    <td>'.$va->name.'</td>
                    <td>'.$va->mobile.'</td>
                    <td>'.$va->address.'</td>
                    <td>'.$va->total.'</td>
                    <td>'.$va->payment_type.'</td>
                    <td>'.$va->order_date.'</td>
                    <td>';
                        if(!empty($va->delivery_date))
                        {
                            echo $va->delivery_date;
                        }
                        else
                        {
                            echo "";
                        } ?>
                    </td>
                    <td>
                        <?php 
                            if($va->order_status == 'Pending')
                            {
                        ?>
                            <b style="color: red;">Pending</b>
                        <?php
                            }
                            else if($va->order_status == 'Delevery')
                            {
                        ?>
                             <b style="color: green;">Delivery</b>
                        <?php
                            }
                        ?>
                    </td>
                    <td>
                        <?php 
                            if($va->order_status == 'Delevery')
                            {
                        ?>
                            <a href="<?=base_url('admin/view-distributor-order/'.$uni_id)?>">view</a>
                        <?php } else { ?>
                            <a href="<?=base_url('admin/change-order-status/'.$uni_id)?>" class="btn btn-primary">Delivered</a>
                        <?php }?>
                    </td>
                 </tr>
            <?php 
        }
	   
	}
	
	public function customer_order_show()
	{
	    $this->db->select('tbl_customer_order.name,tbl_customer_order.mobile,tbl_customer_order.quentity,tbl_customer_order.address,tbl_customer_order.date,tbl_size.size');
        $this->db->from('tbl_customer_order');
        $this->db->join('tbl_size','tbl_size.uniqcode = tbl_customer_order.size', 'inner');
        $this->db->order_by('tbl_customer_order.id', 'DESC');
        $customer_order = $this->db->get()->result();
        $this->data['customer_order']=$customer_order;
        
	   $this->data['page_title']="Utsav | Customer Order";
	   $this->data['subview']='orderlist/customer_order_show';
	   $this->load->view('admin/layout/default', $this->data); 
	}
        
        

}
