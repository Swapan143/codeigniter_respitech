<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CardController extends CI_Controller 
{ 
	function __construct()
	{
	  	parent::__construct(); 
	  	error_reporting(0);
	  	$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");	
	  	date_default_timezone_set('Asia/Kolkata');
		$this->load->helper(array('common_helper', 'string', 'form', 'security','url'));
		$this->load->library(array('form_validation', 'email'));
      	//$this->load->model('user/Home_Model');
        //$this->load->model('user/Cart_Model');	   
        $this->load->model('Others_model','om');
        
	} 
	
	
	public function index()
	{
	
	    $this->data['page_title']="Respitech | Card details";
        $this->data['subview']='product/view_card';
        $this->load->view('user/layout/default', $this->data);
	}
	
	
	
	public function all_card()
	{
	    
	 $this->load->helper('cookie');
	 /*$this->input->set_cookie('shopping_cart', '', time() + (86400 * 30));
	 exit();*/
	 //setcookie('shopping_cart', '', time() + (86400 * 30));
	/*$name   = 'shopping_cart';
    $value  = '';
    $expire = time()+(86400 * 30);
    $path  = '/';
    $secure = TRUE;
    setcookie($name,$value,$expire,$path); 
    $_SESSION['cowe']=" ";
	exit();*/
	    
	    $pro_id=$this->input->post('product_id'); 
	    $product_price_id=$this->input->post('product_id');
		$quentity123=$this->input->post('quentity');
		//$weight=$this->input->post('weight');
		$orginal_price=$this->input->post('product_saleprice');
		$product_stock=$this->input->post('product_stock');
	    $card_value=$this->input->post('card_value'); 
		$card_subtraction=$this->input->post('card_subtraction');
		$product_code=$this->input->post('product_code');
		
		//$eggless="hi";
		//$message="hello";
		
		/*$where=array("product_id"=>$pro_id);
		$data12=$this->om->select_all_where('tbl_image',$where);
	    $product_image=$data12[0]->image;
	    
	    $where1=array("unicode"=>$pro_id);
		$data=$this->om->select_all_where('tbl_product',$where1);
		$product_name=$data[0]->product_name;
		$product_code=$data[0]->product_code;
		
		$where2=array("id"=>$product_price_id);
		$data=$this->om->select_all_where('tbl_product_feature',$where2);
		$product_size=$data[0]->size;
		$product_smell=$data[0]->smell;
		$product_gender=$data[0]->gender;*/
		
		if(empty($quentity123))
		{
		$quentity="1";
		} else {
		  $quentity=$quentity123;
		    
		}
		
		
	if(isset($_COOKIE["shopping_cart"]))
	{
		$cookie_data = stripslashes($_COOKIE['shopping_cart']);
		$cart_data = json_decode($cookie_data, true);
	}
	else
	{
        $cart_data = array();
	}

	$item_id_list = array_column($cart_data, 'item_price_id');
	


	if(in_array($product_price_id, $item_id_list))
	{
	    
	    
	    if(empty($card_value))
	    {
	    
    		foreach($cart_data as $keys => $values)
    		{
    			if($cart_data[$keys]["item_price_id"] == $product_price_id)
    			{
    			    $cart_data[$keys]["item_quantity"] = $cart_data[$keys]["item_quantity"] + $quentity;
    			    
    			    
    			    //$cart_data[$keys]["eggless"] = $eggless;
    			    //$cart_data[$keys]["message"] = $message;
    			    
    			    /*if(empty($quentity123))
    		{
    				$cart_data[$keys]["item_quantity"] = $cart_data[$keys]["item_quantity"] + $quentity;
    		}else{
    		    $cart_data[$keys]["item_quantity"] = $quentity;
    		}*/
    			}
    		}
	    } 
	    else if($card_subtraction=="addtion")
	    {
    	      foreach($cart_data as $keys => $values)
    		  {
    		    $quentity123=1;
    			if($cart_data[$keys]["item_price_id"] == $product_price_id)
    			{
    			    $cart_data[$keys]["item_quantity"] = $cart_data[$keys]["item_quantity"] + $quentity123;
    			    /*if(empty($quentity123))
    		{
    				$cart_data[$keys]["item_quantity"] = $cart_data[$keys]["item_quantity"] + $quentity;
    		}else{
    		    $cart_data[$keys]["item_quantity"] = $quentity;
    		}*/
    			}
    		}  
	    } 
	    else 
	    {
	        foreach($cart_data as $keys => $values)
    		{
    		    $quentity123=1;
    			if($cart_data[$keys]["item_price_id"] == $product_price_id)
    			{
    			    $cart_data[$keys]["item_quantity"] = $cart_data[$keys]["item_quantity"] - $quentity123;
    			    /*if(empty($quentity123))
    		{
    				$cart_data[$keys]["item_quantity"] = $cart_data[$keys]["item_quantity"] + $quentity;
    		}else{
    		    $cart_data[$keys]["item_quantity"] = $quentity;
    		}*/
    			}
    		} 
	        
	        
	    }
		
		
		
	}
	
	else
	{
	    
		$item_array = array(
			'item_id'			=>	$pro_id,
			'product_code'		=>	$product_code,
			'item_price_id'		=>	$product_price_id,
			'item_quantity'		=>	$quentity,
		    'orginal_price'		=>	$orginal_price,  
		    'product_stock' 	=>	$product_stock
		    
		);
		$cart_data[] = $item_array;
	}

	$_SESSION['cowe']=$cart_data;
                
	$item_data = json_encode($cart_data);

	//setcookie('shopping_cart', $item_data, time() + (86400 * 30));
	
	
	$name   = 'shopping_cart';
    $value  = $item_data;
    $expire = time()+(86400 * 30);
    $path  = '/';
    $secure = TRUE;

    setcookie($name,$value,$expire,$path); 
	
	
	//$this->input->set_cookie('shopping_cart', $item_data, time() + (86400 * 30));
	//setcookie("cart_shopping", $item_data, time() + (86400 * 30));
	if($quentity123=='')
		{
    //redirect('card');
	echo "1";
		} else {
		    //redirect('card');
		   echo "1";
		}
	    
	}
	
	
	
	public function card_delete()
	{
		$del_pro_id=$this->input->post('del_pro_id');
		$cookie_data = stripslashes($_COOKIE['shopping_cart']);
		$cart_data = json_decode($cookie_data, true);
		foreach($cart_data as $keys => $values)
		{
			if($cart_data[$keys]['item_price_id'] == $del_pro_id)
			{
				unset($cart_data[$keys]);
				$item_data = json_encode($cart_data);
				//setcookie("shopping_cart", $item_data, time() + (86400 * 30));
				$name   = 'shopping_cart';
                $value  = $item_data;
                $expire = time()+(86400 * 30);
                $path  = '/';
                $secure = TRUE;
                setcookie($name,$value,$expire,$path); 
				
				$_SESSION['cowe']=$cart_data;
				//setcookie("cart_shopping", $item_data, time() + (86400 * 30));
				echo "1";
			}
		}
	}
	
	public function card_delete_all()
	{
		//setcookie("shopping_cart", "", time() - 3600);
		
		$name   = 'shopping_cart';
    $value  = '';
    $expire = time()- 3600;
    $path  = '/';
    $secure = TRUE;
    setcookie($name,$value,$expire,$path); 
		
	$this->session->unset_userdata('cowe');
		
		
		/*$order_id=$_SESSION['order_id'];
		$where123=array("order_id"=>$order_id);
		
		        $data['result12']=$this->om->select_all_where('order_product',$where123);
			    
			    $data['reslut20']=$this->om->select_all1('category');
	            $this->load->view('sucess-order',$data);*/
		redirect('sucess-order');
	}
	
	
	public function add_tobye_card_data()
	{
	    $product_price_id=$this->input->post('product_price_id');
		$orginal_price=$this->input->post('orginal_price');
		$pro_id=$this->input->post('pro_id');
		$user_id=$this->input->post('user_id');
		$quentity=1;
		$data_array=array("pro_id"=>$pro_id,"pro_feture_id"=>$product_price_id,"pro_rate"=>$orginal_price,"quentity"=>$quentity,"user_id"=>$user_id);
		if ($this->om->insert('tbl_byecard',$data_array)===true) {
		    echo 1;
		}
	}
	

	
}
    