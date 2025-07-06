<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_Model extends CI_Model
{
   
    
    public function get_categories()
    {
        $this->db->select('*');
        $this->db->where('status','Active');
       
        //$this->db->group_by('category_name');
       // $this->db->distinct('');
        $parent = $this->db->get('tbl_category')->result();
        return $parent;
    }
    public function get_sub_categories($uniqcode)
    {
        $this->db->select('*');
        $this->db->where('status','Active');
        $this->db->where('category_id',$uniqcode);
        $parent = $this->db->get('tbl_sub_category')->result();
        return $parent;
    }
    public function get_child_categories($uniqcode)
    {
        $this->db->select('*');
        $this->db->where('status','Active');
        $this->db->where('sub_category_id',$uniqcode);
        $parent = $this->db->get('tbl_child_category')->result();
        return $parent;
    }

    public function product_data($uniqcode)  
    {
        $this->db->select('view_products.*,tbl_category.category_name');
        $this->db->from('view_products');
         $this->db->join('tbl_category', 'tbl_category.uniqcode = view_products.category_id', 'inner');
        $this->db->where('view_products.status','Active');
        $this->db->where('tbl_category.status','Active');
        $this->db->where('view_products.category_id',$uniqcode);
         $this->db->group_by('product_uniqcode'); 
        $query = $this->db->get();
       //echo $this->db->last_query($query); die();
        $sub=$query->result();
        return $sub;

    }

    


   

   

   
	

}
