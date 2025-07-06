<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RecommendedController extends CI_Controller {
	
	 function __construct(){

	  	parent::__construct(); 		
		$this->load->helper(array('common_helper', 'string', 'form', 'security', 'text'));	
		$this->load->library(array('form_validation', 'email'));	
		$this->load->model('Others_model','om');
		if(($this->session->userdata('adminDetails')==NULL)){
		   return redirect('admin');
		}
	} 

	public function index($id)
	{		
		$this->db->select('tbl_product.id,tbl_product.sel_product_rate,tbl_product.product_discount,tbl_product.product_discount_rate,tbl_product.product_name,tbl_category.category_name,
	   tbl_product.product_code,tbl_product.recommended_id');
        $this->db->from('tbl_product');
        $this->db->join('tbl_category', 'tbl_product.catgegory_id= tbl_category.id','inner');
		$this->db->where('tbl_product.recommended_id', $id);
	    $this->db->order_by('tbl_product.id', 'desc');
	    $get_product_data=$this->db->get()->result();
	
		//    pr($get_product_data);
	    $this->data['get_product_data']=$get_product_data;
	    $this->data['recommended_id']=$id;
	    
	    
        $this->data['page_title']='Respi Tech  | Product';
        $this->data['subview']='recommended_product/product';
        $this->load->view('admin/layout/default', $this->data);
	}

	public function add_recommended_product($id)
	{		

		$this->db->order_by('id', 'desc');
	    $category_data=$this->db->get('tbl_category')->result();
	    $this->data['category_data']=$category_data;
	    
        $this->db->order_by('id', 'desc');
	    $product_data=$this->db->get('tbl_byuerproduct')->result();
	    $this->data['product_data']=$product_data;
	    
	    $this->db->order_by('id', 'desc');
	    $buyer_data=$this->db->get('tbl_buyer')->result();
	    $this->data['buyer_data']=$buyer_data;
	    
	    $this->db->select('tbl_product.id,tbl_product.sel_product_rate,tbl_product.product_discount,tbl_product.product_discount_rate,tbl_product.product_name,tbl_category.category_name,
	    tbl_subcategory.subcategory_name,tbl_product.product_code');
        $this->db->from('tbl_product');
        $this->db->join('tbl_category', 'tbl_product.catgegory_id= tbl_category.id','inner');
        $this->db->join('tbl_subcategory', 'tbl_product.subcategory_id= tbl_subcategory.id','inner');
	    $this->db->order_by('tbl_product.id', 'desc');
	    $get_product_data=$this->db->get()->result();
	   // pr($get_product_data);
	    $this->data['get_product_data']=$get_product_data;
	    $this->data['recommended_id']=$id;
	    
        $this->data['page_title']='Respi Tech | Add Product';
        $this->data['subview']='recommended_product/product_add';
        $this->load->view('admin/layout/default', $this->data);

	}

	public function save_recommended_product()
	{
		$catgegory_id=$this->input->post('catgegory_id');
        $recommended_id=$this->input->post('recommended_id');
        $product_name=$this->input->post('product_name');
        
        $sel_product_rate=$this->input->post('sel_product_rate');
        $product_discount=$this->input->post('product_discount');
        $product_discount_rate=$this->input->post('product_discount_rate');
        
        $product_description=$this->input->post('product_description');
        $product_quentity=$this->input->post('product_quentity');
        
        $where1=array("catgegory_id"=>$catgegory_id,"product_name"=>$product_name);
		$data=$this->om->row_count('tbl_product',$where1);
		
            if($data == 0)
            {
                $last_code = $this->om->get_last_product_code();
                $product_code = $this->generate_product_code($last_code);
                $slug = create_slug($product_name);
                
                $data_array=array(
                                    "product_code"=>$product_code,
                                    "product_slug"=>$slug,
                                    "catgegory_id"=>$catgegory_id,
                                    "recommended_id"=>$recommended_id,
                                    "product_name"=>$product_name,
                                    "sel_product_rate"=>$sel_product_rate,
                                    "product_discount"=>$product_discount,
                                    "product_discount_rate"=>$product_discount_rate,
                                    "product_description"=>$product_description,
                                );
                $this->om->insert('tbl_product',$data_array);
                $insert_product_id =$this->db->insert_id();

                $data_array1=array(
                    "product_id"=> $insert_product_id,
                    "total_stock"=>(int)$product_quentity
                    );
                $this->om->insert('tbl_total_stock',$data_array1);

                echo 1;
                
            }
            else
            {
                echo 3;
                
            }
	}
	
	public function recommended_productt_edit($transid)
    {
        
		$this->db->order_by('id', 'desc');
	    $category_data=$this->db->get('tbl_category')->result();
	    $this->data['category_data']=$category_data;
        
        $this->db->where('id', $transid);
		$product_data=$this->db->get('tbl_product')->row();

        $this->db->where('product_id', $transid);
		$product_stock_data=$this->db->get('tbl_total_stock')->row();
	    
	
	    
	
	    $this->data['product_stock_data']=$product_stock_data;
        $this->data['product_data'] = $product_data;
	    
	    
        $this->data['page_title']='Respi Tech | Edit Product';
        $this->data['subview']='recommended_product/product_edit';
        $this->load->view('admin/layout/default', $this->data);
    }

    public function update_patient()
    {
		$product_id=$this->input->post('old_product_id');
        $catgegory_id=$this->input->post('catgegory_id');
    
        $product_name=$this->input->post('product_name');
        
        $sel_product_rate=$this->input->post('sel_product_rate');
        $product_discount=$this->input->post('product_discount');
        $product_discount_rate=$this->input->post('product_discount_rate');
        
        $product_description=$this->input->post('product_description');
        $product_quentity=$this->input->post('product_quentity');

        $slug = create_slug($product_name);
        
        $data_array=array(
            "product_slug"=>$slug,
            "catgegory_id"=>$catgegory_id,
            "product_name"=>$product_name,
            "sel_product_rate"=>$sel_product_rate,
            "product_discount"=>$product_discount,
            "product_discount_rate"=>$product_discount_rate,
            "product_description"=>$product_description,
        );

        $this->db->where('id', $product_id);
        $update=$this->db->update('tbl_product', $data_array);

        $data_array1=array(
            "total_stock"=>(int)$product_quentity
            );
    
        $this->db->where('product_id', $product_id);
        $update=$this->db->update('tbl_total_stock', $data_array1);
    
		echo 1;
        
    }

	public function status()
	{	

        $transid=$this->input->post('uniqcode');        
        $this->db->where('is_delete', 'N');
        $this->db->where('id', $transid);
        $get_data=$this->db->get('tbl_patient')->row();

        
        if($get_data->is_active=='Active'){
            $data=array(
                'is_active'=>'Inactive',
                
            );
        }elseif($get_data->is_active=='Inactive'){
            $data=array(
                'is_active'=>'Active',
            );
        }
		$this->db->where('id', $transid);        
        $this->db->update('tbl_patient', $data);      
	}

	public function destroy($uniqcode)
	{
      	$data=array(
        'is_delete'=>'Y',
    	);
	  $this->db->where('id', $uniqcode);
	  $this->db->update('tbl_patient', $data);
	  $this->session->set_flashdata('success', 'Patient deleted successfully');                     
	  redirect('admin/patient');
	}

	private function generate_product_code($last_code) 
    {
        if ($last_code) {
            $number = (int)substr($last_code, -4);
            $new_number = str_pad($number + 1, 4, '0', STR_PAD_LEFT);
        } else {
            $new_number = '0001';
        }

        return 'PROD-' . $new_number;
    }



}