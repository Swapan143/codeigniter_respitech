<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_Model extends CI_Model{
	
	public function banner_getRows($table)        
    {
        $current_date=date('Y-m-d');
        $this->db->select('uniqcode,image');
        $this->db->where('status','Active');
        $this->db->where('date(from_date)<=',$current_date);
        $this->db->where('date(to_date)>=',$current_date);
        $this->db->or_where('to_date','Lifetime');
        $this->db->order_by('serial_no');
        $query = $this->db->get($table);
        return $query->result();
    }

	public function news_getRows($table)
	{
		$this->db->select('uniqcode,title,date,content_writing,description,news_details');
        $this->db->where('status','Active');
        $this->db->limit(3);
        $this->db->order_by('date','DESC');
        $query = $this->db->get($table);
        return $query->result();
	}

    public function gallery_Row($table)
    {
        $this->db->select('uniqcode,image');
        $this->db->where('status','Active');
        $this->db->limit(1);
        $this->db->order_by("datetime", "DESC");
        $query = $this->db->get($table);
        return $query->row();
    }

	public function greeting_getRows($table)
	{
		$current_date=date('Y-m-d');
        $this->db->select('uniqcode,image');
        $this->db->where('status','Active');
        $this->db->where('date',$current_date);
        $query = $this->db->get($table);
        return $query->result();
	}

    public function about_getRow($table)
    {
        $this->db->select('uniqcode,image,name,email,description,contact_us,address');
        $this->db->where('status','Active');
        $query = $this->db->get($table);
        return $query->result();  
    }

    public function gallery_getRow($table)
    {
        $this->db->select('uniqcode,image,description');
        $this->db->where('status','Active');
        $query = $this->db->get($table);
        return $query->result();
    }
	
    public function news_getRow($table)
    {
        $this->db->select('uniqcode,title,date,content_writing,description');
        $this->db->where('status','Active');
        $this->db->limit(9);
        $this->db->order_by('date','DESC');
        $query = $this->db->get($table);
        return $query->result();
    }

    public function news_Row($newsid)
    {
        $this->db->select('date,content_writing,news_details');
        $this->db->where('uniqcode',$newsid);
        $this->db->where('status','Active');
        $query = $this->db->get('tbl_news');
        return $query->row();
    }

    public function servies_Row($uniqcode)
    {
        $this->db->select('subcategory_name,description');
        $this->db->where('uniqcode',$uniqcode);
        $this->db->where('status','Active');
        $query = $this->db->get('tbl_sub_category');   
        return $query->row();
    }
    public function all_product_data($id)
    {
        $this->db->select('uniqcode,product_title,description,image_icon');
        $this->db->where('status','Active');
        $this->db->where('child_category_id',$id);
        $query = $this->db->get('tbl_product');
        return $query->result();
    }
    public function product_data_row($uniqcode)
    {
        $this->db->select('uniqcode,product_title,description,image_icon,product_details,image_banner');
        $this->db->where('uniqcode',$uniqcode);
        $this->db->where('status','Active');
        $query = $this->db->get('tbl_product');
        return $query->row();
    }

    public function irdal_journal_data()
    {
        $this->db->select('uniqcode,resources_type,resources_title,resources_pdf');
        $this->db->where('resources_type','IRDAI_Journal');
        $this->db->where('status','Active');
        $query = $this->db->get('tbl_resources');
        return $query->result(); 
    }

    public function irdal_annual_data()
    {
        $this->db->select('uniqcode,resources_type,resources_title,resources_pdf');
        $this->db->where('resources_type','IRDAI_Annual_Report');
        $this->db->where('status','Active');
        $query = $this->db->get('tbl_resources');
        return $query->result();    
    }

    public function company_profile_data()
    {
        $this->db->select('uniqcode,resources_type,resources_title,resources_pdf');
        $this->db->where('resources_type','Company_Profile_LIC');
        $this->db->where('status','Active');
        $query = $this->db->get('tbl_resources');
        return $query->result();    
    }
}
