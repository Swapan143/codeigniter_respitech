<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_Controller extends CI_Controller {    
	

	function __construct()
	{
	  	parent::__construct(); 		
		$this->load->helper(array('common_helper', 'string', 'form', 'security', 'text','url'));
		$this->load->library(array('form_validation', 'email'));
		$this->load->model('Admin/Product_Model');
        $this->load->model('CommonModel');
        
		$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
		if(($this->session->userdata('adminDetails')==NULL)){
		return redirect('/');
	}
	} 	

	public function index()      
	{
	    $this->db->order_by('id', 'asc');
		$size_data=$this->db->get('tbl_size')->result();
		$this->data['size_data']=$size_data;

		$this->db->order_by('id', 'asc');
		$brand_data=$this->db->get('tbl_brand')->result();
		$this->data['brand_data']=$brand_data;
		
		$this->data['page_title']="Utsav | Product";    
		$this->data['subview']='product_master/product_add';
		$this->load->view('admin/layout/default', $this->data);
	}

	public function brand_cha()
	{
		$brand_id=$this->input->post('brand_id');
		// echo $brand_id; die;

        $this->db->where('brand_id', $brand_id);
        $product_name=$this->db->get('tbl_size')->result()
        ?>
        <option>Select Size</option>
        <?php 
        foreach ($product_name as $key => $value) {?>

          <option value="<?php echo $value->uniqcode;?>"><?php echo $value->size;?></option>

          <?php 
          
        }
	}
	
	public function add_product()   
	{		
		$brand_id=$this->input->post('brand_id');
		$size_id=$this->input->post('size_id');
		$sell_price=$this->input->post('sell_price');
		$alert_qty=$this->input->post('alert_qty');
		
		$code=$this->input->post('code');
		$gst_amount=$this->input->post('gst_amount');
		$gross_amount=$this->input->post('gross_amount');
		
		$date = date('Y-m-d');
		

		foreach ($size_id as $key => $value) 
		{
			$unicode1="pr".random_string('alnum',28);

			$row['uniqcode'] = $unicode1;
			$row['brand_id'] = $brand_id[$key];
			$row['size_id'] = $size_id[$key];
			$row['sell_price'] = $sell_price[$key];
			$row['date'] = $date;
			$row['alert_qty'] = $alert_qty[$key];
			
			$row['gst_amount'] = $gst_amount[$key];
			$row['gross_amount'] = $gross_amount[$key];
			$row['product_code'] = $code[$key];
			$data = $row;
			$res = $this->db->insert('tbl_product', $data);
		}
		$this->session->set_flashdata('success', 'Product add Successfully.');
		redirect('admin/product');
	}
	
	public function product_image()
	{
	
		$this->db->select('tbl_product.uniqcode,tbl_product.size_id,tbl_size.size');
		$this->db->from('tbl_product');
        $this->db->join('tbl_size','tbl_size.uniqcode = tbl_product.size_id','inner');
        $this->db->where('tbl_size.status', 'Active');
        $size_data=$this->db->get()->result();
        $this->data['size_data']=$size_data;
        
        $this->db->select('tbl_product.uniqcode,tbl_product.size_id,tbl_size.size,tbl_product.image,tbl_product.image1,tbl_product.image2,tbl_product.image3,tbl_product.image4,tbl_product.image5');
		$this->db->from('tbl_product');
        $this->db->join('tbl_size','tbl_size.uniqcode = tbl_product.size_id','inner');
        $this->db->where('tbl_size.status', 'Active');
        $this->db->where('tbl_product.image_status', 'Active');
        $image_data=$this->db->get()->result();
        $this->data['image_data']=$image_data;
        
	    $this->data['page_title']="Utsav | Product Image";    
		$this->data['subview']='product_master/product_image';
		$this->load->view('admin/layout/default', $this->data);
	}
	
	public function add_image()
	{
			$size_id=$this->input->post('size_id');
			$upload_image="";
		    $upload_image1="";
		    $upload_image2="";
		    $upload_image3="";
		    $upload_image4="";
		    $upload_image5="";
		    
		    if(!empty($_FILES['image']['name']) && !empty($_FILES['image1']['name']) && !empty($_FILES['image2']['name']) && !empty($_FILES['image3']['name']) && !empty($_FILES['image4']['name']) && !empty($_FILES['image5']['name']))
			{
				$config['upload_path']          = FCPATH.'/webroot/adminImages/product/web/';
	            $config['allowed_types']        = '*';
	            $config['encrypt_name'] 		= TRUE;
	            $config['max_size']             = 1024;
	            $config['file_name']          	= $_FILES['image']['name'];
	            $this->load->library('upload', $config);
	            $this->upload->initialize($config);
	            if ($this->upload->do_upload('image'))
            	{

            		$image_data = $this->upload->data();
					$upload_image=$image_data['raw_name'].$image_data['file_ext'];
             	}
             	
             	$config['upload_path']          = FCPATH.'/webroot/adminImages/product/web/';
	            $config['allowed_types']        = '*';
	            $config['encrypt_name'] 		= TRUE;
	            $config['max_size']             = 1024;
	            $config['file_name']          	= $_FILES['image1']['name'];
	            $this->load->library('upload', $config);
	            $this->upload->initialize($config);
	            if ($this->upload->do_upload('image1'))
            	{
            		$image_data = $this->upload->data();
					$upload_image1=$image_data['raw_name'].$image_data['file_ext'];
             	}
             	
             	$config['upload_path']          = FCPATH.'/webroot/adminImages/product/web/';
	            $config['allowed_types']        = '*';
	            $config['encrypt_name'] 		= TRUE;
	            $config['max_size']             = 1024;
	            $config['file_name']          	= $_FILES['image2']['name'];
	            $this->load->library('upload', $config);
	            $this->upload->initialize($config);
	            if ($this->upload->do_upload('image2'))
            	{
            		$image_data = $this->upload->data();
					$upload_image2=$image_data['raw_name'].$image_data['file_ext'];
             	}
             	
             	$config['upload_path']          = FCPATH.'/webroot/adminImages/product/web/';
	            $config['allowed_types']        = '*';
	            $config['encrypt_name'] 		= TRUE;
	            $config['max_size']             = 1024;
	            $config['file_name']          	= $_FILES['image3']['name'];
	            $this->load->library('upload', $config);
	            $this->upload->initialize($config);
	            if ($this->upload->do_upload('image3'))
            	{
            		$image_data = $this->upload->data();
					$upload_image3=$image_data['raw_name'].$image_data['file_ext'];
             	}
             	
             	$config['upload_path']          = FCPATH.'/webroot/adminImages/product/web/';
	            $config['allowed_types']        = '*';
	            $config['encrypt_name'] 		= TRUE;
	            $config['max_size']             = 1024;
	            $config['file_name']          	= $_FILES['image4']['name'];
	            $this->load->library('upload', $config);
	            $this->upload->initialize($config);
	            if ($this->upload->do_upload('image4'))
            	{
            		$image_data = $this->upload->data();
					$upload_image4=$image_data['raw_name'].$image_data['file_ext'];
             	}
             	
             	$config['upload_path']          = FCPATH.'/webroot/adminImages/product/web/';
	            $config['allowed_types']        = '*';
	            $config['encrypt_name'] 		= TRUE;
	            $config['max_size']             = 1024;
	            $config['file_name']          	= $_FILES['image5']['name'];
	            $this->load->library('upload', $config);
	            $this->upload->initialize($config);
	            if ($this->upload->do_upload('image5'))
            	{
            		$image_data = $this->upload->data();
					$upload_image5=$image_data['raw_name'].$image_data['file_ext'];
             	}
             	
			}
		    
			$data['image']=$upload_image;
			$data['image1']=$upload_image1;
			$data['image2']=$upload_image2;
			$data['image3']=$upload_image3;
			$data['image4']=$upload_image4;
			$data['image5']=$upload_image5;
			$data['image_status']='Active';
			$this->db->where('size_id', $size_id);
		    $update=$this->db->update('tbl_product', $data);
			$this->session->set_flashdata('success', 'Product Image successfully.');	
			redirect('admin/product-image');
    		
	}
	
	public function product_image_edit($id)
	{
	    $this->db->select('tbl_product.uniqcode as p_id,tbl_size.uniqcode as s_id,tbl_product.size_id,tbl_size.size,tbl_product.image,tbl_product.image1,tbl_product.image2,tbl_product.image3,tbl_product.image4,tbl_product.image5');
		$this->db->from('tbl_product');
        $this->db->join('tbl_size','tbl_size.uniqcode = tbl_product.size_id','inner');
        $this->db->where('tbl_size.status', 'Active');
        $this->db->where('tbl_product.image_status', 'Active');
        $this->db->where('tbl_product.uniqcode',$id);
        $image_data=$this->db->get()->row();
        $this->data['image_data']=$image_data;
        
        $this->db->select('tbl_product.uniqcode,tbl_product.size_id,tbl_size.size,tbl_size.uniqcode as s_id');
		$this->db->from('tbl_product');
        $this->db->join('tbl_size','tbl_size.uniqcode = tbl_product.size_id','inner');
        $this->db->where('tbl_size.status', 'Active');
        $size_data=$this->db->get()->result();
        $this->data['size_data']=$size_data;
		
	    $this->data['page_title']="Utsav | Product Image Edit";    
		$this->data['subview']='product_master/product_image_edit';
		$this->load->view('admin/layout/default', $this->data);
	}
	
	public function product_show()
	{
	    $this->db->select('tbl_product.uniqcode,tbl_product.size_id,tbl_size.size,tbl_product.image,tbl_product.sell_price,tbl_product.alert_qty,tbl_product.date,tbl_brand.brand_name,tbl_size.code,tbl_product.gst_amount,tbl_product.gross_amount,tbl_product.per_pic_rate,tbl_product.hsn_no');
		$this->db->from('tbl_product');
        $this->db->join('tbl_size','tbl_size.uniqcode = tbl_product.size_id','inner');
        $this->db->join('tbl_brand','tbl_brand.uniqcode = tbl_product.brand_id','inner');
        $this->db->where('tbl_size.status', 'Active');
        $product_data=$this->db->get()->result();
        $this->data['product_data']=$product_data;
	    
	    $this->data['page_title']="Utsav | Product Show";    
		$this->data['subview']='product_master/product_show';
		$this->load->view('admin/layout/default', $this->data);
	}
	
	public function grosse_amount()
	{
	    $sell_p=$this->input->post('sell_p');
	    $gst=18;
	   // $total_gst = round(($gst / 100) * $sell_p);
	   $sell_amount1 = floatval(($sell_p * 100) / 118);
	   $sell_amount = number_format($sell_amount1,2);
	    
    	$total_gst1 = floatval($sell_p - $sell_amount);  
    	$total_gst= number_format($total_gst1,2);
    	
    	$arr['gst_amount']=$total_gst;
    	$arr['sell_price']=$sell_amount;
    	echo json_encode($arr);
	}
	
	public function product_code()
	{
	    $siz_id=$this->input->post('siz_id');
	    $this->db->select('code');
        $this->db->from('tbl_size');
        $this->db->where('uniqcode',$siz_id);
        $size_code=$this->db->get()->row();
        $p_code=$size_code->code;
        
    	$arr['code']=$p_code;
    	echo json_encode($arr);
	}
	
	public function product_edit($id)
	{
	    $this->db->order_by('id', 'asc');
		$size_data=$this->db->get('tbl_size')->result();
		$this->data['size_data']=$size_data;

		$this->db->where('status','Active');
		$brand_data=$this->db->get('tbl_brand')->result();
		$this->data['brand_data']=$brand_data;
		
		$this->db->where('uniqcode',$id);
		$product_data=$this->db->get('tbl_product')->row();
		$this->data['product_data']=$product_data;
		
	    $this->data['page_title']="Utsav | Product Edit";    
		$this->data['subview']='product_master/product_edit';
		$this->load->view('admin/layout/default', $this->data);
	}
	
	public function image_update()
	{
	      $size_id=$this->input->post('size_id');
          $product_image_id=$this->input->post('product_image_id');
          $old_image=$this->input->post('old_image');
          $old_image1=$this->input->post('old_image1');
          $old_image2=$this->input->post('old_image2');
          $old_image3=$this->input->post('old_image3');
          $old_image4=$this->input->post('old_image4');
          $old_image5=$this->input->post('old_image5');
          
          $image = $old_image ;
          $image1 = $old_image1;
          $image2 = $old_image2;
          $image3 = $old_image3;
          $image4 = $old_image4;
          $image5 = $old_image5;
          
        if(!empty($_FILES['image']['name']))   
        {
            $config['upload_path']          = FCPATH.'/webroot/adminImages/product/web/';
            $config['allowed_types']        = '*';
            $config['encrypt_name']         = TRUE;
            $config['max_size']             = 1024;
            $config['file_name']            = $_FILES['image']['name'];
            
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if($this->upload->do_upload('image'))
            {
                $image_data = $this->upload->data();
                $image=$image_data['raw_name'].$image_data['file_ext'];
                
                $file = FCPATH.'/webroot/adminImages/product/web/'.$old_image;
                if(file_exists($file))
                {
                    unlink($file);
                }

            }    
        }
        
        if(!empty($_FILES['image1']['name']))   
        {
            $config['upload_path']          = FCPATH.'/webroot/adminImages/product/web/';
            $config['allowed_types']        = '*';
            $config['encrypt_name']         = TRUE;
            $config['max_size']             = 1024;
            $config['file_name']            = $_FILES['image1']['name'];
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if($this->upload->do_upload('image1'))
            {
                $image_data = $this->upload->data();
                $image1=$image_data['raw_name'].$image_data['file_ext'];
                
                $file = FCPATH.'/webroot/adminImages/product/web/'.$old_image1;
                if(file_exists($file))
                {
                    unlink($file);
                }

            }    
        }
        
        if(!empty($_FILES['image2']['name']))   
        {
            $config['upload_path']          = FCPATH.'/webroot/adminImages/product/web/';
            $config['allowed_types']        = '*';
            $config['encrypt_name']         = TRUE;
            $config['max_size']             = 1024;
            $config['file_name']            = $_FILES['image2']['name'];
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if($this->upload->do_upload('image2'))
            {
                $image_data = $this->upload->data();
                $image2=$image_data['raw_name'].$image_data['file_ext'];
                
                $file = FCPATH.'/webroot/adminImages/product/web/'.$old_image2;
                if(file_exists($file))
                {
                    unlink($file);
                }

            }    
        }
        
        if(!empty($_FILES['image3']['name']))   
        {
            $config['upload_path']          = FCPATH.'/webroot/adminImages/product/web/';
            $config['allowed_types']        = '*';
            $config['encrypt_name']         = TRUE;
            $config['max_size']             = 1024;
            $config['file_name']            = $_FILES['image3']['name'];
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if($this->upload->do_upload('image3'))
            {
                $image_data = $this->upload->data();
                $image3=$image_data['raw_name'].$image_data['file_ext'];
                
                $file = FCPATH.'/webroot/adminImages/product/web/'.$old_image3;
                if(file_exists($file))
                {
                    unlink($file);
                }

            }    
        }
        
        if(!empty($_FILES['image4']['name']))   
        {
            $config['upload_path']          = FCPATH.'/webroot/adminImages/product/web/';
            $config['allowed_types']        = '*';
            $config['encrypt_name']         = TRUE;
            $config['max_size']             = 1024;
            $config['file_name']            = $_FILES['image4']['name'];
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if($this->upload->do_upload('image4'))
            {
                $image_data = $this->upload->data();
                $image4=$image_data['raw_name'].$image_data['file_ext'];
                
                $file = FCPATH.'/webroot/adminImages/product/web/'.$old_image4;
                if(file_exists($file))
                {
                    unlink($file);
                }

            }     
        }
        
        if(!empty($_FILES['image5']['name']))   
        {
            $config['upload_path']          = FCPATH.'/webroot/adminImages/product/web/';
            $config['allowed_types']        = '*';
            $config['encrypt_name']         = TRUE;
            $config['max_size']             = 1024;
            $config['file_name']            = $_FILES['image5']['name'];
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if($this->upload->do_upload('image5'))
            {
                $image_data = $this->upload->data();
                $image5=$image_data['raw_name'].$image_data['file_ext'];
                
                $file = FCPATH.'/webroot/adminImages/product/web/'.$old_image5;
                if(file_exists($file))
                {
                    unlink($file);
                }

            }     
        }
        
       
            $data=array(
                'size_id'=> $size_id,
                'image'=> $image,
                'image1'=> $image1,
                'image2'=> $image2,
                'image3'=> $image3,
                'image4'=> $image4,
                'image5'=> $image5,
                'date' => date('Y-m-d')
            );
            
            $this->db->where('uniqcode', $product_image_id);
            $update=$this->db->update('tbl_product', $data);
            $this->session->set_flashdata('success', 'Product update successfully.');
            redirect('admin/product-image');
             
          
	}
	
	public function update_products()
	{
	    if($_POST)
        {
            $brand_id=$this->input->post('brand_id');
    		$size_id=$this->input->post('size_id');
    		$sell_price=$this->input->post('sell_price');
    		$alert_qty=$this->input->post('alert_qty');
    		$hsn_no=$this->input->post('hsn_no');
    		$per_pic_rate=$this->input->post('per_pic_rate');
    		
    // 		$code=$this->input->post('code');
    		$gst_amount=$this->input->post('gst_amount');
    		$gross_amount=$this->input->post('gross_amount');
    		$product_id=$this->input->post('product_id');
    		$pro_id=$this->input->post('pro_id');
		    $date = date('Y-m-d');
		  //  pr($product_id); 
		    
		
            foreach ($size_id as $key => $value)
            {
                if($product_id[$key])
                {
                    // echo "+++++++++"; 
                    $update_data=array(
                    	'brand_id' => $brand_id[$key],
                        'size_id' => $size_id[$key],
                        'sell_price' => $sell_price[$key],
                        'alert_qty' => $alert_qty[$key],
                        'hsn_no' => $hsn_no[$key],
                        'per_pic_rate' => $per_pic_rate[$key],
                        'gst_amount' => $gst_amount[$key],
                        'gross_amount' => $gross_amount[$key],
                        'date' => $date
                        );
                        // pr($update_data); die;
                        $product_update=$this->CommonModel->UpdateRecord($update_data,'tbl_product','uniqcode',$product_id[$key]);
                        // pr($product_update); die;
                }
                else
                {
                    // echo "333333333333333";
                    $unicode1="pr".random_string('alnum',28);
                    $insert_data=array(
                        'uniqcode' => $unicode1,
                        'brand_id' => $brand_id[$key],
                        'size_id' => $size_id[$key],
                        'sell_price' => $sell_price[$key],
                        'alert_qty' => $alert_qty[$key],
                        'product_code' => $code[$key],
                        'gst_amount' => $gst_amount[$key],
                        'gross_amount' => $gross_amount[$key],
                        'date' => $date,
                        );
                        // pr($insert_data); die;
                        $insert=$this->db->insert('tbl_product', $insert_data);
                    // $insert=$this->CommonModel->insert('tbl_product',$insert_data);
                }
            }
             $this->session->set_flashdata('success', 'Product update successfully.');
            redirect('admin/product-show');
        }
	}
		
}
