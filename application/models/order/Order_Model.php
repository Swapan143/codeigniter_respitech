<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_Model extends CI_Model
{
    
    public function pending_order_data()
	{
		$this->db->select('Sum(tbl_order.product_sale_price * tbl_order.product_qty) as total,tbl_order.*');
        $this->db->from('tbl_order');
        // $this->db->join('tbl_users_delivery_address','tbl_users_delivery_address.uniqcode = tbl_order.address_id','inner');               
        // $this->db->join('tbl_warehouse','tbl_warehouse.uniqcode = tbl_order.warhouse_id','inner');
        // $this->db->join('tbl_product','tbl_product.uniqcode = tbl_order.product_id','inner');               
        // $this->db->join('tbl_product_features','tbl_product_features.uniqcode = tbl_order.product_features_id','inner');               
        // $this->db->join('tbl_size','tbl_size.uniqcode = tbl_product_features.size','inner');               
        // $this->db->where('tbl_order.warhouse_id',$warehose_id);            
        $this->db->where('tbl_order.delivery_status<>', 'Cancel');
        $this->db->where('tbl_order.delivery_status<>', 'Delivered');
        $this->db->group_by('tbl_order.order_id');                
        $this->db->order_by('tbl_order.id', 'DESC');
        $pending_order_data=$this->db->get()->result();
        // pr($pending_order_data);
        // die;
        if(!empty($pending_order_data))
        {
            return $pending_order_data;
        }
        else
        {
            return false;
        }
	}
	
	public function delivery_order_data()
	{
	    $this->db->select('Sum(tbl_order.product_sale_price * tbl_order.product_qty) as total,tbl_order.*');
        $this->db->from('tbl_order');
        $this->db->where('tbl_order.delivery_status', 'Delivered');
        $this->db->group_by('tbl_order.order_id');                
        $this->db->order_by('tbl_order.id', 'DESC');
        $delivery_order_data=$this->db->get()->result();
        // pr($pending_order_data);
        // die;
        if(!empty($delivery_order_data))
        {
            return $delivery_order_data;
        }
        else
        {
            return false;
        } 
	}
    
    
}