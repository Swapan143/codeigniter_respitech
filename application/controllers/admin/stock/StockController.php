<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StockController extends CI_Controller {
    
     
    public function __construct()
    {
        parent::__construct();
        error_reporting(0);
        $this->load->helper(array('common_helper', 'string', 'form', 'security'));
        $this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
        $this->load->library(array('form_validation', 'email'));
        //$this->load->model('Category/Category_Model');
        $this->load->model('Others_model','om');
        if(($this->session->userdata('adminDetails')==NULL)){
           return redirect('/');
        }
        
    }
    
    
    public function total_stock()
    {
        $this->db->select('tbl_total_stock.id as stock_id,tbl_total_stock.product_id,tbl_product.product_code,tbl_total_stock.total_stock,tbl_product.product_slug,
        tbl_product.product_name');
        $this->db->from('tbl_total_stock');
        $this->db->join('tbl_product', 'tbl_total_stock.product_id= tbl_product.id','inner');
	    $this->db->order_by('tbl_total_stock.total_stock');
	   // $this->db->group_by('tbl_byuerproduct.buyer_id');
	    $stock_data=$this->db->get()->result();
	    //    pr($stock_data);
	    $this->data['stock_data']=$stock_data;
	   
        $this->data['page_title']='Book Shop | Total Stock';
        $this->data['subview']='stock/total_stock';
        $this->load->view('admin/layout/default', $this->data);
    }
    
    public function code_buyer_serch_data()
    {
        $search_code=$this->input->post('search_code');
        $sql = "SELECT * FROM  tbl_buyer WHERE buyer_code	 like '%$search_code%' ORDER BY id LIMIT 0,10";
        $request = $this->om->customQuery($sql);
        // pr($request);
        
        
        if(!empty($request)){
        foreach($request as $val)
        {
            $buyer_id=$val->id;
            $name=$val->buyer_code;
            
            ?>
         
            <li onClick="selectproduct123('<?= $buyer_id.'|'.$name?>');"><?= $name; ?></li>
         <?php
        }
        } else {
            // echo 1;
          
        }
    }
    
    public function buyer_stock_data_serch()
    {
        $buyer_id123=$this->input->post('buyer_id123');
        $buyer_code=$this->input->post('buyer_code'); 
        
        $this->db->select('tbl_total_stock.id as stock_id,tbl_total_stock.product_id,tbl_total_stock.product_code,tbl_total_stock.total_stock,tbl_buyer.buyer_code,tbl_buyer.id as buyer_id,
        tbl_byuerproduct.product_name');
        $this->db->from('tbl_total_stock');
        $this->db->join('tbl_buyer', 'tbl_total_stock.buyer_id= tbl_buyer.id','inner');
        $this->db->join('tbl_byuerproduct', 'tbl_total_stock.product_id= tbl_byuerproduct.id','inner');
        $this->db->where('tbl_buyer.id',$buyer_id123);
        $this->db->where('tbl_buyer.buyer_code',$buyer_code);
	    $this->db->order_by('tbl_total_stock.total_stock');
	   // $this->db->group_by('tbl_byuerproduct.buyer_id');
	    $buyer_stock_data = $this->db->get()->result();
	    
	    if(empty($buyer_stock_data))
	    {
	        
	   ?>
	        <p style="text-align: center;color: red;">DATA NOT FOUND</p>
	  <?php      
	    }
	    else
	    {
	        
	   ?>
	        <table class="table table-striped table-bordered table-hover" >
				<thead>
					<tr>
    					<th>Sl</th>
                        <th>Buyer Code</th>
                        <th>Product Code</th>
                        <th>Product Name</th>
                        <th>Total Stock</th>
    				</tr>
    			</thead>
    			<tbody>
	   <?php
	        foreach($buyer_stock_data as $key => $value)
	        {
	   ?>
	            <tr class="gradeX">
                                        
                <?php 
                    if($value->total_stock < 10)
                    {
                ?>
                        <td style="color: red;"> <?=$key+1?> </td>
                        <td style="color: red;"> <?=$value->buyer_code?> </td>
                        <td style="color: red;"> <?=$value->product_code?> </td>
                        <td style="color: red;"> <?=$value->product_name?> </td>
                        <td style="color: red;"> <?=$value->total_stock?> </td>
                <?php
                    }
                    else
                    {
                        
                ?>
                        <td> <?=$key+1?> </td>
                        <td> <?=$value->buyer_code?> </td>
                        <td> <?=$value->product_code?> </td>
                        <td> <?=$value->product_name?> </td>
                        <td> <?=$value->total_stock?> </td>
                <?php
                    }
                ?>
            </tr>
	   <?php
	        }
	   ?>
	    </tbody>
                    			</table>
	   <?php
	        
	    }
	    
    }
    

 
}
