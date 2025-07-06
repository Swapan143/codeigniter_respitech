<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MasterController extends CI_Controller {
    
     
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
    
    
    public function buyer()
    {
        $this->db->select('tbl_buyer.id as buyer_id,tbl_buyer.buyer_name,tbl_buyer.buyer_phoneno,tbl_buyer.buyer_address,tbl_buyer.buyer_code');
        $this->db->from('tbl_buyer');
        // $this->db->join('tbl_buyer', 'tbl_byuerproduct.buyer_id= tbl_buyer.id','inner');
        $this->db->where('tbl_buyer.status','Admin');
	    $this->db->order_by('tbl_buyer.id', 'desc');
	   // $this->db->group_by('tbl_byuerproduct.buyer_id');
	    $buyer_data=$this->db->get()->result();
	   // pr($buyer_data);
	    $this->data['buyer_data']=$buyer_data;
	   
        $this->data['page_title']='Respi Tech | Buyer';
        $this->data['subview']='master/buyer';
        $this->load->view('admin/layout/default', $this->data);
    }
    
    public function view_product($id)
    {
        $this->db->select('tbl_byuerproduct.id,tbl_byuerproduct.date,tbl_byuerproduct.product_name,tbl_byuerproduct.product_bye_rate,tbl_byuerproduct.bye_qty,tbl_byuerproduct.date,tbl_byuerproduct.buyer_id,tbl_byuerproduct.product_code');
        $this->db->from('tbl_byuerproduct');
        $this->db->where('tbl_byuerproduct.buyer_id',$id);
	    $this->db->order_by('tbl_byuerproduct.id', 'desc');
	    $buyer_product_data=$this->db->get()->result();
	    $this->data['buyer_product_data']=$buyer_product_data;
        
        $this->data['page_title']='Respi Tech | View Product';
        $this->data['subview']='master/product_view';
        $this->load->view('admin/layout/default', $this->data);
    }
    
    public function product_edit($id)
    {
        $this->db->select('tbl_byuerproduct.buyer_id,tbl_byuerproduct.product_name,tbl_byuerproduct.product_bye_rate,tbl_byuerproduct.bye_qty,tbl_buyer.buyer_name,
        tbl_buyer.buyer_address,tbl_buyer.buyer_phoneno,tbl_byuerproduct.id,tbl_byuerproduct.product_code');
        $this->db->from('tbl_byuerproduct');
        $this->db->join('tbl_buyer', 'tbl_byuerproduct.buyer_id= tbl_buyer.id','inner');
	    $this->db->where('tbl_byuerproduct.id', $id);
	    $buyer_data=$this->db->get()->row();
	   // pr($buyer_data); die;
	    $this->data['buyer_data']=$buyer_data;
	    
        $this->data['page_title']='Respi Tech | Product Edit';
        $this->data['subview']='master/product_edit';
        $this->load->view('admin/layout/default', $this->data); 
    }
    
    public function product_edit_admin($id)
    {
        $this->db->select('tbl_product.id,tbl_product.sel_product_rate,tbl_product.product_discount,tbl_product.product_discount_rate,tbl_byuerproduct.product_name,tbl_category.category_name,
	    tbl_subcategory.subcategory_name,tbl_product.product_description,tbl_category.id as c_id,tbl_subcategory.id as s_id,tbl_byuerproduct.id as product_id,tbl_product.buyer_id,
	    tbl_product.seller_product_rate,tbl_product.seller_discount,tbl_product.seller_discount_rate');
        $this->db->from('tbl_product');
        $this->db->join('tbl_category', 'tbl_product.catgegory_id= tbl_category.id','inner');
        $this->db->join('tbl_subcategory', 'tbl_product.subcategory_id= tbl_subcategory.id','inner');
        $this->db->join('tbl_byuerproduct', 'tbl_product.product_name= tbl_byuerproduct.id','inner');
	    $this->db->where('tbl_product.id', $id);
	    $get_product_data=$this->db->get()->row();
	    $this->data['get_product_data']=$get_product_data;
	    
	    $this->db->order_by('id', 'desc');
	    $category_data=$this->db->get('tbl_category')->result();
	    $this->data['category_data']=$category_data;
	    
	    $this->db->order_by('id', 'desc');
	    $subcategory_data=$this->db->get('tbl_subcategory')->result();
	    $this->data['subcategory_data']=$subcategory_data;
	    
        $this->db->order_by('id', 'desc');
	    $product_data=$this->db->get('tbl_byuerproduct')->result();
	    $this->data['product_data']=$product_data;
	    
	    $this->db->order_by('id', 'desc');
	    $buyer_data=$this->db->get('tbl_buyer')->result();
	    $this->data['buyer_data']=$buyer_data;
	    
	    $this->data['page_title']='Respi Tech | Admin Product Edit';
        $this->data['subview']='master/admin_product_edit';
        $this->load->view('admin/layout/default', $this->data);
	    
    }
    
    public function buyer_product_edit()
    {
        $buyer_name=$this->input->post('buyer_name');
        $buyer_phoneno=$this->input->post('buyer_phoneno'); 
		$buyer_address=$this->input->post('buyer_address');
		$old_product_id=$this->input->post('old_product_id');
		$old_buyer_id=$this->input->post('old_buyer_id');
		$product_name=$this->input->post('product_name');
		$product_bye_rate=$this->input->post('product_bye_rate');
		$bye_qty=$this->input->post('bye_qty');
		$old_qty=$this->input->post('old_qty');
		
		
		$data_array=array("buyer_name"=>$buyer_name,"buyer_phoneno"=>$buyer_phoneno,"buyer_address"=>$buyer_address);
		$where=array("id"=>$old_buyer_id);
		$buyer_detalis=$this->om->update('tbl_buyer',$data_array,$where);
		
		$date=date("Y-m-d");
        $month1=date("Y-m");
		$data_array11=array("product_name"=>$product_name,"product_bye_rate"=>$product_bye_rate,"bye_qty"=>$bye_qty,"date"=>$date,"month"=>$month1);
		$where=array("id"=>$old_product_id);
		$buyer_product=$this->om->update('tbl_byuerproduct',$data_array11,$where);
		
		$this->db->where('product_id', $old_product_id);
        $total_stock_qty=$this->db->get('tbl_total_stock')->row();
        
        $old_quantity_stock_total=$total_stock_qty->total_stock;
        $total_stock_quan=$old_quantity_stock_total - ($old_qty - $bye_qty);
        $data_array1111=array("total_stock"=>$total_stock_quan);
        $where=array("product_id"=>$old_product_id);
        $buyer_product=$this->om->update('tbl_total_stock',$data_array1111,$where);
        
		echo 1;
		
		
    }
    
    public function admin_product_edit()
    {
        $product_old_id = $this->input->post('old_product_id');
        $catgegory_id = $this->input->post('catgegory_id');
        // $subcategory_id = $this->input->post('subcategory_id');
        $product_name = $this->input->post('product_name');
        $sel_product_rate = $this->input->post('sel_product_rate');
        $product_discount = $this->input->post('product_discount');
        $product_discount_rate = $this->input->post('product_discount_rate');
        $product_description = $this->input->post('product_description');
        
        // Add rent fields
        $is_rent = $this->input->post('is_rent');
        $rent_type = $this->input->post('rent_type');
        $rent_price = $this->input->post('rent_price');
        $rent_description = $this->input->post('rent_description');
        
        // $seller_product_rate = $this->input->post('seller_product_rate');
        // $seller_discount = $this->input->post('seller_discount');
        // $seller_discount_rate = $this->input->post('seller_discount_rate');
        
        // $buyer_id = $this->input->post('buyer_id');
        $product_description_info = $this->input->post('product_description_info');
        
        $data_array = array(
            "catgegory_id" => $catgegory_id,
            "product_name" => $product_name,
            "sel_product_rate" => $sel_product_rate,
            "product_discount" => $product_discount,
            "product_discount_rate" => $product_discount_rate,
            "product_description" => $product_description,
            "product_description_info" => $product_description_info,
            // Add rent fields to the array
            "is_rent" => $is_rent,
            "rent_type" => $rent_type,
            "rent_price" => $rent_price,
            "rent_dese" => $rent_description  // Note: using the correct field name as per your DB
        );
        
        $where = array("id" => $product_old_id);
        $buyer_detalis = $this->om->update('tbl_product', $data_array, $where);
        
        // more info
        if (isset($_FILES["product_info_image"]["tmp_name"]) && !empty($_FILES["product_info_image"]["tmp_name"])) {
            $product_info_image_type = explode("/", $_FILES["product_info_image"]["type"]);
            
            $uploads_dir = "webroot/adminImages/product_image";
            $tmp_name = $_FILES["product_info_image"]["tmp_name"];
            $name = time() . $_FILES["product_info_image"]["name"];
            
            move_uploaded_file($tmp_name, "$uploads_dir/$name");
            
            $data_array_info = array(
                "product_info_image" => $name,
                "product_info_image_type" => @$product_info_image_type[0]
            );
            
            $where = array("id" => $product_old_id);
            $this->om->update('tbl_product', $data_array_info, $where);
        }
        
        echo 1;
    }
    
    public function buyer_data_add()
    {
        $buyer_name=$this->input->post('buyer_name');
        $buyer_id=$this->input->post('pro_search_id'); 
		$buyer_phoneno=$this->input->post('buyer_phoneno');
		$buyer_address=$this->input->post('buyer_address');
		
		
		$product_name=$this->input->post('product_name');
		$product_bye_rate=$this->input->post('product_bye_rate');
		$bye_qty=$this->input->post('bye_qty');
		$pro_id=$this->input->post('pro_id');
		
		$this->db->where('id', $buyer_id);
        $buyer_count=$this->db->get('tbl_buyer')->num_rows();
        
        if($buyer_count > 0)
        {
            $buyer_id_old=$buyer_id;
        }
        else
        {
            $where=array("buyer_phoneno"=>$buyer_phoneno);
		    $data=$this->om->row_count('tbl_buyer',$where);
		    
		    if($data>0)
    	    {
    	        echo 3;
    	        exit();
    		}
    		
    		
    		    $firstThree = substr($buyer_name, 0, 3);
                $employe_count=$this->db->get('tbl_buyer')->num_rows();
                if($employe_count>0)
                {
                    $this->db->order_by('id', 'DESC');
                    $this->db->limit(1);
                    $employe_details=$this->db->get('tbl_buyer')->result();
                    foreach ($employe_details as $value) 
                    {
                        $buyer_code=$value->buyer_code;
                        $code_remove = substr($buyer_code, 3);
                        $employe_id=$code_remove+1;
                    }
                    $number = str_pad($employe_id, 3, '0', STR_PAD_LEFT);
        
                } 
                else 
                {
                    $employe_id=1;
                    $number = str_pad($employe_id, 3, '0', STR_PAD_LEFT);
                }
                
                $code_number=$firstThree.$number;
    		
    		
		    $data_array=array("buyer_code"=>$code_number,"buyer_name"=>$buyer_name,"buyer_phoneno"=>$buyer_phoneno,"buyer_address"=>$buyer_address,"status"=>'Admin');
            $this->om->insert('tbl_buyer',$data_array);
            
            $this->db->order_by("id", "desc");
            $this->db->limit(1);
            $last_buyer_id=$this->db->get('tbl_buyer')->result();
            foreach ($last_buyer_id as $value) 
            {
                $buyer_id_old=$value->id;
            }
            
        }
        
        $date=date("Y-m-d");
        $month1=date("Y-m");
        $new_product_id=array();
        
        foreach ($product_name as $key => $v) 
        {
            
            $this->db->where('product_name', $product_name[$key]);
            $this->db->where('buyer_id', $buyer_id_old);
            $product_count=$this->db->get('tbl_byuerproduct')->num_rows();
            
                if($product_count>0)
                {
                    $this->db->where('product_name', $product_name[$key]);
                    $this->db->where('buyer_id', $buyer_id_old);
                    $this->db->order_by('id', 'DESC');
                    $this->db->limit(1);
                    $product_detalis=$this->db->get('tbl_byuerproduct')->result();
                    foreach ($product_detalis as $value) 
                    {
                        $product_code_id=$value->product_code;
                        // $code_remove1 = substr($product_code, 3);
                        // $product_code_id=$code_remove1+1;
                    }
                    $product_code123 = str_pad($product_code_id, 4, '0', STR_PAD_LEFT);
        
                } 
                else 
                {
                    $this->db->where('buyer_id', $buyer_id_old);
                    $this->db->order_by('id', 'DESC');
                    $this->db->limit(1);
                    $product_stock_row=$this->db->get('tbl_total_stock')->row();
                    
                    $product_code567=$product_stock_row->product_code;
                    $code_remove145 = substr($product_code567, 3);
                    $product_code_id=(int)$code_remove145+1;
                    
                    $product_code12300 = str_pad($product_code_id, 4, '0', STR_PAD_LEFT);
                    $firstThree1 = substr($buyer_name, 0, 3);
                    $product_code123 =$firstThree1.$product_code12300;
                }
                
                $code_number_product[]=$product_code123;
            
            
            $data_array=array(
                "product_code" =>$code_number_product[$key],
            	"buyer_id"=> $buyer_id_old,
            	"product_name"=>$product_name[$key],
            	"product_bye_rate"=>(int)$product_bye_rate[$key],
            	"bye_qty"=>(int)$bye_qty[$key],
            	"date"=>$date,
            	"month"=>$month1
           );
           
        $this->om->insert('tbl_byuerproduct',$data_array);
        
        $insert_product_id =$this->db->insert_id();
        //   //$new_product_id[$key][$insert_product_id];
        
          if(empty($pro_id[$key]) && $code_number_product[$key])
          {
              array_push($new_product_id,$insert_product_id);
               
              foreach($new_product_id as $key1 =>$va)
              {
                  $pr=$new_product_id[$key1];
              }  
                $data_array1=array(
                "buyer_id"=> $buyer_id_old,    
                "product_code" =>$code_number_product[$key],  
            	"product_id"=> $pr,
            	"total_stock"=>(int)$bye_qty[$key]
                );
                $this->om->insert('tbl_total_stock',$data_array1);
               
          }
         else
         {
          $this->db->where('product_id', $pro_id[$key]);
          $stock_check=$this->db->get('tbl_total_stock')->result();
          if($stock_check)
          {
              foreach($stock_check as $value_st)
              {
                  $old_stock_qty=$value_st->total_stock;
                  $product_id=$value_st->product_id;
                   
              }
              $data_store=$old_stock_qty+$bye_qty[$key];
               
              $where=array("product_id"=>$product_id);
              $data_array31=array("total_stock"=>$data_store);
              $result=$this->om->update('tbl_total_stock',$data_array31,$where); 
          }
         }

        }
        
        echo 1;
        
        
    }
    
    public function buyer_product()
    {
        $this->db->order_by('id', 'desc');
	    $buyer_product_data=$this->db->get('tbl_byuerproduct')->result();
	    $this->data['buyer_product_data']=$buyer_product_data;
	    
	    $this->db->order_by('id', 'desc');
	    $buyer_data=$this->db->get('tbl_buyer')->result();
	    $this->data['buyer_data']=$buyer_data;
        
        $this->data['page_title']='Respi Tech | Buyer Product';
        $this->data['subview']='master/buyer_product';
        $this->load->view('admin/layout/default', $this->data);
    }
    
    
    public function buyer_search()
    {
       $search_pro=$this->input->post('search_pro');
       
       $this->db->select('*');
       $this->db->from('tbl_buyer');
       $this->db->where('status','Admin');
       $this->db->group_start();
       $this->db->like('buyer_name',$search_pro,'both');
       $this->db->group_end();
       $query = $this->db->get();
       $request=$query->result();
        //   $sql = "SELECT * FROM  tbl_buyer WHERE buyer_name like '%$search_pro%' ORDER BY id LIMIT 0,10";
        //     $request = $this->om->customQuery($sql);
        if(!empty($request)){
        foreach($request as $val)
        {
            $buyer_id=$val->id;
            $name=$val->buyer_name;
            
            ?>
         
         <li onClick="selectbuyer('<?= $buyer_id.'|'.$name?>');"><?= $name; ?></li>
         <?php
        }
        } else {
            // echo 1;
          
        }
       
    }
    
    public function product_serch_data()
    {
        $search_pro=$this->input->post('search_pro');
        $id = $this->input->post('id');
        
        $buyer_id=$this->input->post('buyer_id');
        
        $this->db->select('tbl_byuerproduct.product_name,tbl_total_stock.product_id');
        $this->db->from('tbl_total_stock');
        $this->db->join('tbl_byuerproduct', 'tbl_total_stock.product_id= tbl_byuerproduct.id','inner');
        $this->db->where('tbl_byuerproduct.buyer_id',$buyer_id);
        $this->db->group_start();
        $this->db->like('tbl_byuerproduct.product_name',$search_pro,'both');
        $this->db->group_end();
        $query = $this->db->get();
        $product_search=$query->result();
        
        // $sql = "SELECT * FROM  tbl_byuerproduct WHERE product_name	 like '%$search_pro%' ORDER BY id LIMIT 0,10";
        // $request = $this->om->customQuery($sql);
        
        if(!empty($product_search)){
        foreach($product_search as $val)
        {
            $buyer_id=$val->product_id;
            $name=$val->product_name;
            
            ?>
         
         <li onClick="selectproduct1('<?= $buyer_id.'|'.$name.'|'.$id?>');"><?= $name; ?></li>
         <?php
        }
        } else {
            // echo 1;
          
        }
    }
    
    public function search_buyer_details()
    {
        $search_pro_id=$this->input->post('search_pro_id');
        $this->db->where('id', $search_pro_id);
        $employe_attendance=$this->db->get('tbl_buyer')->result();
        foreach ($employe_attendance as $value)
        {
            $address=$value->buyer_address;
            $mobile=$value->buyer_phoneno;
        }
            echo $address.'|'.$mobile;
    }
    
    public function product_search()
    {
        $search_pro=$this->input->post('search_pro');

        $sql = "SELECT * FROM  tbl_byuerproduct WHERE product_name	 like '%$search_pro%' ORDER BY id LIMIT 0,10";
        $request = $this->om->customQuery($sql);
        if(!empty($request)){
        foreach($request as $val)
        {
            $product_id=$val->id;
            $name=$val->product_name;
            
            ?>
         
         <li onClick="selectProduct('<?= $product_id.'|'.$name?>');"><?= $name; ?></li>
         <?php
        }
        } else {
            echo 1;
          
        }
    }
    
    public function buyer_product_data_add()
    {
        $buyer_id=$this->input->post('buyer_id');
		$product_id=$this->input->post('pro_search_id');
		$product_bye_rate=$this->input->post('product_bye_rate');
		$bye_qty=$this->input->post('bye_qty');
		$product_name=$this->input->post('product_name');
		
		$this->db->where('id', $product_id);
        $this->db->where('product_name', $product_name);
        $stock_check=$this->db->get('tbl_byuerproduct')->num_rows();
        
        if($stock_check == 1)
        {
            $this->db->where('product_id', $product_id);
            $stock=$this->db->get('tbl_total_stock')->row();
            $total_stock= $stock->total_stock;
            $stock_sum=$total_stock + $bye_qty;
            
            $where=array("product_id"=>$product_id);
            
                $data_array12=array("total_stock"=>$stock_sum);
                $result=$this->om->update('tbl_total_stock',$data_array12,$where);
                echo 1;
        }
        else
        {
            $date=date("Y-m-d");
            $data_array=array("buyer_id"=>$buyer_id,"product_name"=>$product_name,"product_bye_rate"=>$product_bye_rate,"bye_qty"=>$bye_qty,"date"=>$date);
            $insert = $this->om->insert('tbl_byuerproduct',$data_array);
                
            if($insert)
            {
                $this->db->order_by('id', 'desc');
                $product_id=$this->db->get('tbl_byuerproduct')->row();
                $last_product_id= $product_id->id;
            
               $data_array1=array("product_id"=>$last_product_id,"total_stock"=>$bye_qty);
               $insert2 = $this->om->insert('tbl_total_stock',$data_array1); 
               echo 1;
            }
            
            
        }
		
		
    }
    
    public function category()
    {
	    $this->db->order_by('id', 'desc');
	    $category_data=$this->db->get('tbl_category')->result();
	    $this->data['category_data']=$category_data;
	    
	    
        $this->data['page_title']='Respi Tech | Category';
        $this->data['subview']='master/category';
        $this->load->view('admin/layout/default', $this->data);
    }
    
    public function category_add()
    {
        $category_name=$this->input->post('category_name');
        $category_description=$this->input->post('category_description');
        
		$where1=array("category_name"=>$category_name);
		$data=$this->om->row_count('tbl_category',$where1);
		
            if($data == 0)
            {
            	$images_name="";
                $uploads_dir = "webroot/adminImages/category_image";
                $tmp_name = $_FILES["logo_input_upload"]["tmp_name"];
                $name =rand().$_FILES["logo_input_upload"]["name"];     
                move_uploaded_file($tmp_name, "$uploads_dir/$name");
                $images_name =$name;
                $date=date("Y-m-d");
                $data_array=array(
                                    "category_name"=>$category_name,
                                    "category_image"=>$images_name,
                                    "category_description"=>$category_description,
                                    );
                $this->om->insert('tbl_category',$data_array);
                echo 1;
                
            }
            else
            {
                echo 3;
                
            }
            
        
    }

    public function category_edit_data($transid)
    {

		$this->db->where('id', $transid);
		$category_row=$this->db->get('tbl_category')->row();

        $this->data['category_data']=$category_row;
        $this->data['page_title']='Respi Tech | Category';
        $this->data['subview']='master/category_edit';
        $this->load->view('admin/layout/default', $this->data);

	}
	
	public function update_category()
	{
		$transid=$this->input->post('transid');
		$category_name=trim($this->input->post('category_name'));
		$category_img=trim($this->input->post('category_img'));
		$category_description=trim($this->input->post('category_description'));


            $images_name="";
            if(!empty($_FILES['logo_input_upload']['name']))
            {
                $uploads_dir = "webroot/adminImages/category_image";
                $tmp_name = $_FILES["logo_input_upload"]["tmp_name"];
                $name =rand().$_FILES["logo_input_upload"]["name"];     
                move_uploaded_file($tmp_name, "$uploads_dir/$name");
                $images_name =$name;

                $file = FCPATH.'/webroot/adminImages/category_image/'.$category_img;
                if (file_exists($file)) 
                {
                    unlink($file);
                } 
            }
            else
            {
                $images_name =$category_img;
            }
            $data=array(
                'category_image'=> $images_name,
                'category_name'=> $category_name,
                'category_description'=> $category_description,
            );
            // pr($data);
            $this->db->where('id', $transid);
            $update=$this->db->update('tbl_category', $data);
            
            $this->session->set_flashdata('success', 'Category update successfully.');	
            redirect('admin/category');
		
	}

    public function category_destroy($uniqcode)
    {
        $this->db->where('id', $uniqcode);
        $this->db->delete('tbl_category');
        $this->session->set_flashdata('success', 'Category deleted successfully');                     
        redirect('admin/category');
    }
    
    public function sub_category()
    {
        $this->db->order_by('id', 'desc');
	    $subcategory_data=$this->db->get('tbl_subcategory')->result();
	    $this->data['subcategory_data']=$subcategory_data;
	    
	    $this->db->order_by('id', 'desc');
	    $category_data=$this->db->get('tbl_category')->result();
	    $this->data['category_data']=$category_data;
	    
        $this->data['page_title']='Respi Tech | Sub Category';
        $this->data['subview']='master/sub_category';
        $this->load->view('admin/layout/default', $this->data);
    }
    
    public function subcategory_data_add()
    {
        $category_id=$this->input->post('category_id');
        $subcategory_name=$this->input->post('subcategory_name');
        
		$where1=array("category_id"=>$category_id,"subcategory_name"=>$subcategory_name);
		$data=$this->om->row_count('tbl_subcategory',$where1);
		
            if($data == 0)
            {
                $data_array=array(
                                    "category_id"=>$category_id,
                                    "subcategory_name"=>$subcategory_name,
                                    );
                $this->om->insert('tbl_subcategory',$data_array);
                echo 1;
                
            }
            else
            {
                echo 3;
                
            }
	    
    }
    public function sub_category_edit_data($transid)
    {

        $this->db->order_by('id', 'desc');
	    $category_data=$this->db->get('tbl_category')->result();
	    $this->data['category_data']=$category_data;

        $this->db->where('id', $transid);
		$sub_category_row=$this->db->get('tbl_subcategory')->row();

        $this->data['sub_category_data']=$sub_category_row;
        $this->data['category_data']=$category_data;

        $this->data['page_title']='Respi Tech | Sub Category';
        $this->data['subview']='master/sub_category_edit';
        $this->load->view('admin/layout/default', $this->data);
    }
    public function update_subcategory()
    {
        $transid=$this->input->post('transid');
		$category_id=trim($this->input->post('category_id'));
		$subcategory_name=trim($this->input->post('subcategory_name'));


          
            $data=array(
                'category_id'=> $category_id,
                'subcategory_name'=> $subcategory_name,
            );
            // pr($data);
            $this->db->where('id', $transid);
            $update=$this->db->update('tbl_subcategory', $data);
            
            $this->session->set_flashdata('success', 'Sub Category update successfully.');	
            redirect('admin/sub-category');
    }

    public function sub_category_destroy($uniqcode)
    {
        $this->db->where('id', $uniqcode);
        $this->db->delete('tbl_subcategory');
        $this->session->set_flashdata('success', 'Sub Category deleted successfully');                     
        redirect('admin/sub-category');
    }
    
    public function product()
    {
	    $this->db->select('tbl_product.id,tbl_product.sel_product_rate,tbl_product.product_discount,tbl_product.product_discount_rate,tbl_product.product_name,tbl_category.category_name,
	   tbl_product.product_code');
        $this->db->from('tbl_product');
        $this->db->join('tbl_category', 'tbl_product.catgegory_id= tbl_category.id','inner');
	    $this->db->order_by('tbl_product.id', 'desc');
	    $get_product_data=$this->db->get()->result();
	   // pr($get_product_data);
	    $this->data['get_product_data']=$get_product_data;
	    
	    
        $this->data['page_title']='Respi Tech | Product';
        $this->data['subview']='master/product';
        $this->load->view('admin/layout/default', $this->data);
    }
    
    public function select_category()
    {
        $cat_uniqcode=$this->input->post('cat_uniqcode');
        
		$this->db->where('category_id', $cat_uniqcode);
		$this->db->order_by('id', 'asc');
		$category_data=$this->db->get('tbl_subcategory')->result();		

		echo '<option value="">Select SubCategory Name</option>';		
		foreach ($category_data as $key => $value) {
			echo "<option value=".$value->id.">".$value->subcategory_name."</option>";			
		}
    }
    
    public function select_buyer_pro()
    {
        $buyer_id=$this->input->post('buyer_id');
        
        $this->db->select('tbl_byuerproduct.product_name,tbl_total_stock.product_code,tbl_total_stock.buyer_id,tbl_total_stock.product_id,tbl_total_stock.total_stock');
        $this->db->from('tbl_total_stock');
        $this->db->join('tbl_byuerproduct', 'tbl_total_stock.product_id= tbl_byuerproduct.id','inner');
        $this->db->where('tbl_total_stock.buyer_id',$buyer_id);
        $this->db->order_by('tbl_total_stock.id','desc');
        $query = $this->db->get();
        $product_search=$query->result();
    
		echo '<option value="">Select Product Name</option>';		
		foreach ($product_search as $key => $value) {
			echo "<option value=".$value->product_id.">".$value->product_name."</option>";			
		} 
    }
    
    public function product_rate_s()
    {
        $seller_product_rate=$this->input->post('seller_product_rate');
        
        if(!empty($seller_product_rate))
        {
            echo $seller_product_rate;
        }  
    }
    
    public function product_rate()
    {
        $sel_product_rate=$this->input->post('sel_product_rate');
        
        if(!empty($sel_product_rate))
        {
            echo $sel_product_rate;
        }
    }
    
    
    public function discount_rate()
    {
        $sel_product_rate=$this->input->post('sel_product_rate');
        $product_discount=$this->input->post('product_discount');  
        
        if(empty($product_discount))
        {
            echo $sel_product_rate;
        }
        else
        {
           $total= ($sel_product_rate * ($product_discount / 100));
           $a = ($sel_product_rate - $total);

           echo $a;
        }
    }
    
    public function discount_rate_s()
    {
        
        $seller_product_rate=$this->input->post('seller_product_rate');
        $seller_discount=$this->input->post('seller_discount');  
        
        if(empty($seller_discount))
        {
            echo $seller_product_rate;
        }
        else
        {
          $total= ($seller_product_rate * ($seller_discount / 100));
          $k = ($seller_product_rate - $total);

          echo $k;
        } 
    }

    public function product_add()
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
	    
	    
        $this->data['page_title']='Respi Tech | Add Product';
        $this->data['subview']='master/product_add';
        $this->load->view('admin/layout/default', $this->data);
        
    }
    
    
    public function product_submit()
    {
        $catgegory_id=$this->input->post('catgegory_id');
        //$subcategory_id=$this->input->post('subcategory_id');
        $product_name=$this->input->post('product_name');
        
        $sel_product_rate=$this->input->post('sel_product_rate');
        $product_discount=$this->input->post('product_discount');
        $product_discount_rate=$this->input->post('product_discount_rate');
        
        $product_description=$this->input->post('product_description');
        $product_quentity=$this->input->post('product_quentity');

        $is_rent=$this->input->post('is_rent');
        $rent_type=$this->input->post('rent_type');
        $rent_price=$this->input->post('rent_price');
        $rent_description=$this->input->post('rent_description');
        
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
                                    //"subcategory_id"=>$subcategory_id,
                                    "product_name"=>$product_name,
                                    "sel_product_rate"=>$sel_product_rate,
                                    "product_discount"=>$product_discount,
                                    "product_discount_rate"=>$product_discount_rate,
                                    "product_description"=>$product_description,
                                    "is_rent"=>$is_rent,
                                    "rent_type"=>$rent_type,
                                    "rent_price"=>$rent_price,
                                    "rent_dese"=>$rent_description,
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
    public function product_edit_data($transid)
    {
        $this->db->order_by('id', 'desc');
	    $category_data=$this->db->get('tbl_category')->result();
	    $this->data['category_data']=$category_data;

        $this->db->order_by('id', 'desc');
	    $sub_category_data=$this->db->get('tbl_subcategory')->result();
	    $this->data['sub_category_data']=$sub_category_data;
	    
        
        $this->db->where('id', $transid);
		$product_data=$this->db->get('tbl_product')->row();

        $this->db->where('product_id', $transid);
		$product_stock_data=$this->db->get('tbl_total_stock')->row();
	    
	
	    
	
	    $this->data['product_stock_data']=$product_stock_data;
        $this->data['product_data'] = $product_data;

   
	    
	    
        $this->data['page_title']='Respi Tech | Edit Product';
        $this->data['subview']='master/product_edit';
        $this->load->view('admin/layout/default', $this->data);
    }
    public function product_edit_submit()
    {
        $product_id=$this->input->post('old_product_id');
        $catgegory_id=$this->input->post('catgegory_id');
    
        $product_name=$this->input->post('product_name');
        
        $sel_product_rate=$this->input->post('sel_product_rate');
        $product_discount=$this->input->post('product_discount');
        $product_discount_rate=$this->input->post('product_discount_rate');
        
        $product_description=$this->input->post('product_description');
        $product_quentity=$this->input->post('product_quentity');

        $is_rent=$this->input->post('is_rent');
        $rent_type=$this->input->post('rent_type');
        $rent_price=$this->input->post('rent_price');
        $rent_description=$this->input->post('rent_description');

        $slug = create_slug($product_name);
        
        $data_array=array(
            "product_slug"=>$slug,
            "catgegory_id"=>$catgegory_id,
            "product_name"=>$product_name,
            "sel_product_rate"=>$sel_product_rate,
            "product_discount"=>$product_discount,
            "product_discount_rate"=>$product_discount_rate,
            "product_description"=>$product_description,
            "is_rent"=>$is_rent,
            "rent_type"=>$rent_type,
            "rent_price"=>$rent_price,
            "rent_dese"=>$rent_description,
        );

        $this->db->where('id', $product_id);
        $update=$this->db->update('tbl_product', $data_array);

        $data_array1=array(
            "total_stock"=>(int)$product_quentity
            );
    
        $this->db->where('product_id', $product_id);
        $update=$this->db->update('tbl_total_stock', $data_array1);
    
        $this->session->set_flashdata('success', 'Product update successfully.');	
        redirect('admin/product');
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
    
    public function product_image()
    {
        $this->db->order_by('id', 'desc');
	    $product_data=$this->db->get('tbl_product')->result();
	    $this->data['product_data']=$product_data;
	    
	    
	    $this->db->select('tbl_productimage.product_id,tbl_product.product_name');
        $this->db->from('tbl_productimage');
        $this->db->join('tbl_product', 'tbl_productimage.product_id= tbl_product.id','inner');
        $this->db->group_by('tbl_productimage.product_id');
	    $this->db->order_by('tbl_productimage.id', 'desc');
	    $product_image=$this->db->get()->result();
	    $this->data['product_image']=$product_image;
	    
	    
	    
        $this->data['page_title']='Respi Tech | Product Image';
        $this->data['subview']='master/product_image';
        $this->load->view('admin/layout/default', $this->data);
    }
    
    public function product_image_add()
    {
        $product_id=$this->input->post('product_id');
        
        
		$where1=array("product_id"=>$product_id);
		$data=$this->om->row_count('tbl_productimage',$where1);
		
            if($data == 0)
            {
               $image_post = $_FILES['product_image']['name']; 
               $final_image = implode("*",$image_post);
               $images_name ="";
               $uploads_dir = "webroot/adminImages/product_image";
                foreach ($_FILES["product_image"]["error"] as $key => $error) {
                    if ($error == UPLOAD_ERR_OK) {
                        $tmp_name = $_FILES["product_image"]["tmp_name"][$key];
                        $name = time().$_FILES["product_image"]["name"][$key];     
                        move_uploaded_file($tmp_name, "$uploads_dir/$name");
                        $images_name =$images_name.",".$name;
                        
                    }
                    
                }
                
                $images12 = trim($images_name, ",");
                $ex=explode(",",$images12);
    
                foreach($ex as $val){
                    
                    $insertData=array(
            			    'product_id' => $product_id,
            				'product_image' => $val
            		            	);
            		$res=$this->om->insert('tbl_productimage',$insertData);
                    
                }
                
                echo 1;
                
            }
            else
            {
                echo 3;
                
            }
    }
    
    
    public function product_image_show()
    {
       $transid=$this->input->post('transid');
       $this->db->where('product_id', $transid);
       $this->db->order_by('id', 'desc');
       $image_data=$this->db->get('tbl_productimage')->result();
       
        $output = "";
        if($image_data)
        {
            $output ='<table class="table table-striped table-bordered table-hover" >
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Image Upload</th>
                        <th>Image Show</th>
                    </tr>
                </thead>
                <tbody>';
                foreach ($image_data as $key => $value) 
                {
                   $id=$value->id;
                   $image=$value->product_image;
                   $images = trim($image, ",");
                   $v=$key+1;
                   $output.='<tr>
                                <td>'.$v.'</td>
                                <td><input  type="file" class="form-control" name="profile_image" id="profile_image"  onchange="imagechang()"></td>
                                <td><img class="banner showTableImage" id="ima_up"  src="'.base_url('webroot/adminImages/product_image/'.$images.'').'"></td>
                                
                   </tr>'; 
                }

                $output.='</tbody>
                </table>';  

                echo $output;
        }
        else
        {
            echo "NO DATA FOUNT";
        }
      
    }
 
}
