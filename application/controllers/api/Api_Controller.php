<?php   
    class Api_Controller extends CI_Controller    
    {
        public function __construct()
        {
            parent::__construct();
            error_reporting(0);
            $this->load->helper(array('common_helper', 'string', 'form', 'security','url'));
            //load user model
            $this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
            date_default_timezone_set('Asia/Kolkata');
            Header('Access-Control-Allow-Origin: *'); //for allow any domain, insecure
            Header('Access-Control-Allow-Headers: *'); //for allow any headers, insecure
            Header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
            header('Content-Type: application/json'); //method allowed
            $this->load->model('api/Api_model');  

        }
        
        
        public function category()
        {
            $category_name = $this->Api_model->get_category();
            if(!empty($category_name))
                {
                    $response_data['category_name']=$category_name;
                    $response_data['return_status']=1;
                    echo json_encode($response_data);
                }
                else
                {
                    $data1['return_status']='0';
                    $data1['return_message']='Data  not empty.';
                    echo json_encode($data1);
                }
        }
        
        public function subcategory()
        {
            $category_id=$this->input->post('category_id');
            if(!empty($category_id))
            {
                $data=$this->Api_model->get_subcategory_data($category_id);
                if(!empty($data))
                {
                    $response_data['return_message']="Succesfully";
                    $response_data['return_status']=1;
                    $response_data['subcategory']=$data;
                    echo json_encode($response_data);
                }
                else
                {
                    $response_data['return_message']="data not found.";
                    $response_data['return_status']=2;
                    echo json_encode($response_data);
                }
            }
            else
            {
                $response_data['return_message']="No data were found.";
                $response_data['return_status']=0;
                echo json_encode($response_data);
            }
        }
        
        public function subcategory_products()
        {
            $subcategory_id=$this->input->post('subcategory_id');
            if(!empty($subcategory_id))
            {
                $data=$this->Api_model->get_subcategory_product_data($subcategory_id);
                if(!empty($data))
                {
                    $response_data['return_message']="Succesfully";
                    $response_data['return_status']=1;
                    $response_data['subcategory_product']=$data;
                    echo json_encode($response_data);
                }
                else
                {
                    $response_data['return_message']="data not found.";
                    $response_data['return_status']=2;
                    echo json_encode($response_data);
                }
            }
            else
            {
                $response_data['return_message']="No data were found.";
                $response_data['return_status']=0;
                echo json_encode($response_data);
            }
        }
        
        public function category_product()
        {
            $category_id=$this->input->post('category_id');
            if(!empty($category_id))
            {
                $data=$this->Api_model->get_category_product_data($category_id);
                foreach($data as $valcas)
                {
                    $this->db->where('product_id', $valcas->product_id);
                    $this->db->limit(1);  
                    $data12=$this->db->get('tbl_productimage')->result();
                    foreach($data12 as $valim)
                    {
                        $image=$valim->product_image;
                    }
                    
                    $category_product[]=array("product_description"=>$valcas->product_description,"sell_price"=>$valcas->sell_price,"mrp_price"=>$valcas->mrp_price,"product_discount"=>$valcas->product_discount,"product_name"=>$valcas->product_name,"product_code"=>$valcas->product_code,"category_id"=>$valcas->category_id,"subcategory_id"=>$valcas->subcategory_id,"product_id"=>$valcas->product_id,"product_image"=>$image);
                        
                }
                
                if(!empty($category_product))
                {
                    $response_data['return_message']="Succesfully";
                    $response_data['return_status']=1;
                    $response_data['category_product']=$category_product;
                    echo json_encode($response_data);
                }
                else
                {
                    $response_data['return_message']="data not found.";
                    $response_data['return_status']=2;
                    echo json_encode($response_data);
                }
            }
            else
            {
                $response_data['return_message']="No data were found.";
                $response_data['return_status']=0;
                echo json_encode($response_data);
            }
        }
        
        public function new_arrivals_product()
        {
            $new_arrivals_product_data = $this->Api_model->get_new_arrivals_product_data();
            foreach($new_arrivals_product_data as $valcas)
            {
                $this->db->where('product_id', $valcas->product_id);
                $this->db->limit(1);  
                $data12=$this->db->get('tbl_productimage')->result();
                foreach($data12 as $valim)
                {
                    $image=$valim->product_image;
                }
                
                $new_product[]=array("product_description"=>$valcas->product_description,"sell_price"=>$valcas->sell_price,"mrp_price"=>$valcas->mrp_price,"product_discount"=>$valcas->product_discount,"product_name"=>$valcas->product_name,"product_code"=>$valcas->product_code,"category_id"=>$valcas->category_id,"subcategory_id"=>$valcas->subcategory_id,"product_id"=>$valcas->product_id,"product_image"=>$image);
                    
            }
            
            if(!empty($new_product))
                {
                    $response_data['new_arrivals_product_data']=$new_product;
                    $response_data['return_status']=1;
                    echo json_encode($response_data);
                }
                else
                {
                    $data1['return_status']='0';
                    $data1['return_message']='Data  not empty.';
                    echo json_encode($data1);
                }
        }
        
        public function best_sellers()
        {
            $best_sellers_product_data = $this->Api_model->get_best_sellers_product_data();
            foreach($best_sellers_product_data as $valcas)
            {
                $this->db->where('product_id', $valcas->product_id);
                $this->db->limit(1);  
                $data12=$this->db->get('tbl_productimage')->result();
                foreach($data12 as $valim)
                {
                    $image=$valim->product_image;
                }
                
                $best_sells_product[]=array("product_description"=>$valcas->product_description,"sell_price"=>$valcas->sell_price,"mrp_price"=>$valcas->mrp_price,"product_discount"=>$valcas->product_discount,"product_name"=>$valcas->product_name,"product_code"=>$valcas->product_code,"category_id"=>$valcas->category_id,"subcategory_id"=>$valcas->subcategory_id,"product_id"=>$valcas->product_id,"product_image"=>$image);
                    
            }
            
            if(!empty($best_sells_product))
                {
                    $response_data['best_sellers_product_data']=$best_sells_product;
                    $response_data['return_status']=1;
                    echo json_encode($response_data);
                }
                else
                {
                    $data1['return_status']='0';
                    $data1['return_message']='Data  not empty.';
                    echo json_encode($data1);
                }
        }
        
        public function sale_items()
        {
            $sale_items_product_data = $this->Api_model->get_sale_items_product_data();
            foreach($sale_items_product_data as $valcas)
            {
                $this->db->where('product_id', $valcas->product_id);
                $this->db->limit(1);  
                $data12=$this->db->get('tbl_productimage')->result();
                foreach($data12 as $valim)
                {
                    $image=$valim->product_image;
                }
                
                $sell_product[]=array("product_description"=>$valcas->product_description,"sell_price"=>$valcas->sell_price,"mrp_price"=>$valcas->mrp_price,"product_discount"=>$valcas->product_discount,"product_name"=>$valcas->product_name,"product_code"=>$valcas->product_code,"category_id"=>$valcas->category_id,"subcategory_id"=>$valcas->subcategory_id,"product_id"=>$valcas->product_id,"product_image"=>$image);
                    
            }
            
            if(!empty($sell_product))
                {
                    $response_data['sale_items_product_data']=$sell_product;
                    $response_data['return_status']=1;
                    echo json_encode($response_data);
                }
                else
                {
                    $data1['return_status']='0';
                    $data1['return_message']='Data not empty.';
                    echo json_encode($data1);
                }  
        }
        
        
        public function register()
        {
            $phone_no=$this->input->post('mobile');
            $email=$this->input->post('email');
            $password=$this->input->post('password');
            
            if(!empty($phone_no) && !empty($email) && !empty($password))
            {
                $where=array(
                    'status <>'=>"Delete",
                    'mobile_no'=>$phone_no,
                );
                $check_data=$this->Api_model->entty_check($where,'tbl_users');
                if(empty($check_data))
                {
                    $where=array(
                    'status <>'=>"Delete",
                    'email'=>$email
                    );
                    $check_data=$this->Api_model->entty_check($where,'tbl_users');
                    if(empty($check_data))
                    {
                        $data=array(
                            'mobile_no'=>$phone_no,
                            'email'=>$email,
                            'password'=>md5($password),
                            'status'=>'Active'
                        );
                        $insert=$this->db->insert('tbl_users',$data);
                        if($insert)
                        {
                            $check1=array(
                            'password'=>md5($password),
                            'email'=>$email,
                            'status'=>'Active'
                            );
                            
                            $login_row = $this->Api_model->userDetails_register($check1,'tbl_users');
                            
                            // $data1['user_details']=$login_row;
                            $data1['return_status']='1';
                            $data1['return_message']='Register Successfully';
                                
                            echo json_encode($data1);
                        
                        }
                        else
                        {
                            echo json_encode(['return_message'=>'Some problems occurred, please try again.']);
                        }
                    }
                    else
                    {
                        
                        $userDetails=array(
                            'phone_no'=>'',
                            'email'=>'',
                            'password'=>'',
                        );
                        $data1['user_details']=$userDetails;
                        $data1['return_status']='2';
                        $data1['return_message']='email id already exists';
                            
                        echo json_encode($data1);
                    }
                }
                else
                {
                    $userDetails=array(
                        'path'=>'',
                        'phone_no'=>'',
                        'email'=>'',
                        'password'=>'',
                        
                    );
                    
                    
                    $data1['user_details']=$userDetails;
                    $data1['return_status']='3';
                    $data1['return_message']='mobile number already exists';
                        
                    echo json_encode($data1);
                }
            }
            else
            {
               
                $data1['return_status']='0';
                $data1['return_message']='Provide all fields';   
                echo json_encode($data1);
            }
           
        }
        
        public function login()
        {
            $userid=$this->input->post('userid');
            $password=$this->input->post('password');
            if(!empty($userid) && !empty($password))
            {
                $check=array(
                'password'=>md5($password),
                'mobile_no'=>$userid,
                'status <>'=>'Delete'
                );
                $count=$this->Api_model->entty_check($check,'tbl_users');
                
                if(!empty($count))
                {
                    $check1=array(
                    'password'=>md5($password),
                    'mobile_no'=>$userid,
                    'status'=>'Active'
                    );
                    $userData = $this->Api_model->changuserDetails($check1);
                    //check if the user data inserted
                    if(!empty($userData))
                    {
                        
                        $userData = $this->Api_model->login_data_user($userid,'Mobile');
                        $data1['user_details']=$userData;
                        $data1['return_status']='1';
                        $data1['return_message']='Successfully Retrived';
                        
                        echo json_encode($data1);
                    }
                   
                }
                else
                {
                    $check=array(
                    'password'=>md5($password),
                    'email'=>$userid,
                    'status <>'=>'Delete'
                    );
                    $count=$this->Api_model->entty_check($check,'tbl_users');

                    if(!empty($count))
                    {
                        $check1=array(
                        'password'=>md5($password),
                        'email'=>$userid,
                        'status'=>'Active'
                        );
                        $login_row = $this->Api_model->changuserDetails($check1);
                        //check if the user data inserted
                        if(!empty($login_row))
                        {
                            
                            $login_row = $this->Api_model->login_data_user($userid,'Email');
                        
                            $data1['user_details']=$login_row;
                            $data1['return_status']='1';
                            $data1['return_message']='Successfully Retrived';
                            echo json_encode($data1);
                        }
                    }
                    else
                    {
                        
                        $response_data['return_message']="User id or password doesn't match, please try again.";
                        $response_data['return_status']='0';
                        echo json_encode($response_data);
                
                    }
                }
            }
            else
            {
                echo json_encode(['return_message'=>'Provide complete user information to create.']);
            }
        }
        
        public function Wishlist()
        {
            $product_id=$this->input->post('product_id');
            $user_id=$this->input->post('user_id');

            if( !empty($product_id) && !empty($user_id))
            {
              
                $where=array(
                'status<>'=>'Delete',
                'product_id'=>$product_id,
                'user_id'=>$user_id,
                );

                $count=$this->Api_model->entty_check($where,'tbl_wishlist');
               
                if($count==0)
                {
                 
                    $post=array(
                        'product_id'=>$product_id,
                        'user_id'=>$user_id,
                        'datetime'=>date('Y-m-d H:i:s')
                        );
                        $insert = $this->Api_model->insert($post,'tbl_wishlist');

                        //check if the user data inserted
                        if($insert)
                        {
                            //set the response and exit
                            $data1['return_status']='1';
                            $data1['return_message']='wishlist added successfuly.';
                            echo json_encode($data1);
                        }
                        else
                        {
                            //set the response and exit
                            $data1['return_status']='0';
                            $data1['return_message']='Some problems occurred, please try again.';
                            echo json_encode($data1);
                        }
                }
                else
                {
                    $where1=array(

                    'product_id'=>$product_id,
                    'user_id'=>$user_id,
                    );
                    $this->db->where($where1);
                    $this->db->delete('tbl_wishlist');
                    $data1['return_status']='3';
                    $data1['return_message']='wishlist removed successfuly.';
                    echo json_encode($data1);
                }
            }
            else
            {
                $data1['return_status']='4';
                $data1['return_message']='Provide complete user information to create.';
                echo json_encode($data1);
            }
        }
        
        public function CheckWishlist()
        {
            $product_id=$this->input->post('product_id');
            $user_id=$this->input->post('user_id');


            if( !empty($product_id) && !empty($user_id))
            {
                $data = $this->Api_model->check_wishlist($product_id,$user_id);
                if(!empty($data))
                {
                    $data1['return_status']='1';
                    $data1['return_message']='wishlisted';
                    echo json_encode($data1);
                }
                else
                {
                    $data1['return_status']='2';
                    $data1['return_message']='No data were found.';
                    echo json_encode($data1);
                }
            }
            else
            {
                $data1['return_status']='0';
                $data1['return_message']='Provide complete user information to create.';
                echo json_encode($data1);
            }
        }
        
        public function WishlistProduct()
        {
            $user_id = $this->input->post('user_id');
            if(!empty($user_id))
            {
               $products = $this->Api_model->wishlist_product_data($user_id);
               foreach($products as $valcas)
                {
                    $this->db->where('product_id', $valcas->product_id);
                    $this->db->limit(1);  
                    $data12=$this->db->get('tbl_productimage')->result();
                    foreach($data12 as $valim)
                    {
                        $image=$valim->product_image;
                    }
                    
                    $wishlis_product[]=array("product_id"=>$valcas->product_id,"catgegory_id"=>$valcas->catgegory_id,"subcategory_id"=>$valcas->subcategory_id,"product_description"=>$valcas->product_description,"mrp_price"=>$valcas->mrp_price,"discount_rate"=>$valcas->discount_rate,"sell_price"=>$valcas->sell_price,"product_name"=>$valcas->product_name,"total_stock"=>$valcas->total_stock,"product_image"=>$image);
                        
                }
                if(!empty($wishlis_product))
                    {
                        $response_data['Wishlis_data']=$wishlis_product;
                        $response_data['return_status']=1;
                        echo json_encode($response_data);
                    }
                    else
                    {
                        $data1['return_status']='2';
                        $data1['return_message']='No data were found.';
                        echo json_encode($data1);
                    }
            }
            else
            {
                $data1['return_status']='0';
                $data1['return_message']='Provide complete user information to create.';
                echo json_encode($data1);
            }
            

        }
        
        public function changeProfile_user()
        {
            $name=$this->input->post('name');
            $id=$this->input->post('id');
            $image = $this->input->post('image');
            $mobile_no = $this->input->post('mobile_no');
            $email = $this->input->post('email');

           // $old_image=$this->input->post('old_image');
           // echo $uniqcode;die();
            if(!empty($id)){

                $brahman = $this->Api_model->userDetailsUniqcode($id);


                if($brahman){

                    if(!empty($brahman->image)){

                        if(file_exists('webroot/UserImages/'.$brahman->image)){
                            $count=unlink('webroot/UserImages/'.$brahman->image);
                        }
                    }
                    $imageUrl11='us'.randomPassword(28).time().'.jpg';

                    $upload_path='webroot/UserImages/'.$imageUrl11;
                    file_put_contents($upload_path,base64_decode($image));

                   
                    
                    if(!empty($image))
                    {
                             $change=array(
    
                            'name'=>$name,
                            'mobile_no'=>$mobile_no,
                            'email'=>$email,
                            'image'=>$imageUrl11,
                            'status'=>'Active'
                        );
                    }
                    else
                    {
                             $change=array(
    
                            'name'=>$name,
                            'mobile_no'=>$mobile_no,
                            'email'=>$email,
                            'status'=>'Active'
                        );
                    }

                    $where=array(
                        'id'=>$id
                    );

                    $update=$this->Api_model->update('tbl_users',$where,$change);

                    if($update){


                        $userData = $this->Api_model->userDetails($id);
                        
                        $data1['user_details']=$userData;
                        $data1['return_status']='1';
                        $data1['return_message']='Update Successfully';
                            
                        echo json_encode($data1);

                    }
                    else{

                            $data1['return_status']='0';
                            $data1['return_message']='Provide complete user information to create.';
                                
                            echo json_encode($data1);
                       
                    }
                }

            }
            else{
  
                    $data1['return_status']='2';
                    $data1['return_message']='Provide complete user information to create.';
                        
                    echo json_encode($data1);
            }

        }
        
        public function changePasswordUser()
        {
            $id = $this->input->post('id');
            $change = md5($this->input->post('change'));
            $password = md5($this->input->post('password'));

            if(!empty($id) && !empty($change) && !empty($password)){
                
                $where=array(
                    'id'=>$id,
                    'password'=>$password,
                    'status'=>'Active'
                );
                if($change!=$password)
                {
                    $data = $this->Api_model->changuserDetails($where);
                    
                    if($data){

                        $change1=array(

                            'password'=>$change
                        );
                        $where=array(
                            'id'=>$id,
                            'status'=>'Active'
                        );

                        $update=$this->Api_model->update('tbl_users',$where,$change1);
                        
                        if($update){

                            $userData = $this->Api_model->changuserDetails($where);
                            $data1['user_details']=$userData;
                            $data1['return_status']='1';
                            $data1['return_message']='Update Successfully';
                            
                            echo json_encode($data1);

                        }
                        else{
                            $userDetails=array(
                            'uniqcode'=>'',
                            'first_name'=>'',
                            'last_name'=>'',
                            'path'=>'',
                            'images'=>'',
                            'phone_no'=>'',
                            'email'=>'',
                            'password'=>'',
                            'gender'=>'',
                            'dob'=>'',
                            
                        );
                        
                        $data1['user_details']=$userDetails;
                        $data1['return_status']='2';
                        $data1['return_message']='error.';

                        echo json_encode($data1);
                        }
                        
                    }
                    else{

                        $userDetails=array(
                            'uniqcode'=>'',
                            'first_name'=>'',
                            'last_name'=>'',
                            'path'=>'',
                            'image'=>'',
                            'email'=>'',
                            'password'=>'',
                            'gender'=>'',
                            'dob'=>'',
                            
                        );
                        
                        $data1['user_details']=$userDetails;
                        $data1['return_status']='3';
                        $data1['return_message']='Old password is wrong.';

                        echo json_encode($data1);
                    }
                }
                else
                {
                    $data1['return_status']='5';
                    $data1['return_message']='password already exists';  
                    echo json_encode($data1);
                }

            }
            else{

                    $data1['return_status']='4';
                    $data1['return_message']='Provide complete user information to create.';
                        
                    echo json_encode($data1);
            }
        }
        
        
        public function get_product_view()
        {
            $product_id=$this->input->post('product_id');
            $data=$this->Api_model->product_view($product_id);
            if(!empty($data))
            {
                $response_data['return_message']="Succesfully";
                $response_data['return_status']=1;
                $response_data['return_data']=$data;
                echo json_encode($response_data);
            }
            else
            {
                
                $response_data['return_message']="No data were found.";
                $response_data['return_status']=0;
                echo json_encode($response_data);
            }
        }
        
        public function get_product_view_image()
        {
            $product_id=$this->input->post('product_id');
            $data=$this->Api_model->product_view_image($product_id);
            if(!empty($data))
            {
                $response_data['return_message']="Succesfully";
                $response_data['return_status']=1;
                $response_data['return_data']=$data;
                echo json_encode($response_data);
            }
            else
            {
                
                $response_data['return_message']="No data were found.";
                $response_data['return_status']=0;
                echo json_encode($response_data);
            }
        }
        
        public function search()
        {
            $query=$this->input->post('query');
            if(!empty($query))
            {
                $data24345 = $this->Api_model->serach($query); 
                // pr($data); 
                foreach($data24345 as $valcas)
                {
                    $this->db->where('product_id', $valcas->product_id);
                    $this->db->limit(1);  
                    $data12=$this->db->get('tbl_productimage')->result();
                    // pr($data12);
                    foreach($data12 as $valim)
                    {
                        $image=$valim->product_image;
                    }
                    
                    $search_product[]=array("catgegory_id"=>$valcas->catgegory_id,"subcategory_id"=>$valcas->subcategory_id,"product_id"=>$valcas->product_id,"product_description"=>$valcas->product_description,"mrp_price"=>$valcas->mrp_price,"product_discount"=>$valcas->product_discount,"sell_price"=>$valcas->sell_price,"category_name"=>$valcas->category_name,"product_name"=>$valcas->product_name,"subcategory_name"=>$valcas->subcategory_name,"total_stock"=>$valcas->total_stock,"product_image"=>$image);
                        
                }
                // pr($search_product);
                if(!empty($search_product))
                {
                    $response_data['serch_data']=$search_product;
                    $response_data['return_status']=1;
                    echo json_encode($response_data);
                }
                else
                {
                    $data1['return_status']=0;
                    $data1['return_message']="no data order.";  
                    echo json_encode($data1);
                }
            }
            else
            {
                $data1['return_status']=2;
                $data1['return_message']='Provide complete user information to create.';
                echo json_encode($data1);
            }
        }
        
        public function order_insert()
        {
            $user_id=$this->input->post('user_id');
            $bill_name=$this->input->post('bill_name');
            $bill_mobile=$this->input->post('bill_mobile');
            $bill_company=$this->input->post('bill_company');
            $bill_street=$this->input->post('town');
            $bill_state=$this->input->post('bill_state');
            $bill_zip=$this->input->post('bill_zip');
            $bill_email=$this->input->post('bill_email');
            
            $deli_name=$this->input->post('deli_name');
            $deli_mobile=$this->input->post('deli_mobile');
            $deli_company=$this->input->post('deli_company');
            $deli_street=$this->input->post('lanmark');
            $deli_town=$this->input->post('deli_town');
            $deli_state=$this->input->post('deli_state');
            $deli_zip=$this->input->post('deli_zip');
            $deli_email=$this->input->post('deli_email');
            $product_id=$this->input->post('product_id');
            $product_name=$this->input->post('product_name');
            $product_qty=$this->input->post('product_qty');
            $product_sale_price=$this->input->post('product_sale_price');
            
            $payment_method=$this->input->post('payment_method');
            $payment_status=$this->input->post('payment_status');
            $delivery_status=$this->input->post('delivery_status');
            $order_date=$this->input->post('order_date');
            $tranction_id=$this->input->post('tranction_id');
            
            if(!empty($user_id) && !empty($bill_name) && !empty($bill_mobile) && !empty($bill_street) && !empty($bill_state) && !empty($bill_zip) && !empty($bill_email) && !empty($deli_mobile)
            && !empty($deli_town) && !empty($deli_state) && !empty($deli_zip) && !empty($product_id) && !empty($product_name) && !empty($product_qty) && !empty($product_sale_price) &&
            !empty($payment_method) && !empty($payment_status) && !empty($delivery_status) && !empty($order_date))
            {
                    $employe_count=$this->db->get('tbl_order')->num_rows();
                    if($employe_count>0)
                    {
                        $this->db->order_by('id', 'DESC');
                        $this->db->limit(1);
                        $employe_details=$this->db->get('tbl_order')->result();
                        foreach ($employe_details as $value) 
                        {
                            $a= $value->order_id;
                            $employe_id=$a+1;
                        }
                        $number = str_pad($employe_id, 2, '0', STR_PAD_LEFT);
            
                    } 
                    else 
                    {
                        $employe_id=1;
                        $number = str_pad($employe_id, 2, '0', STR_PAD_LEFT);
                    }
                    
                    
                    $pr_id = explode(",",$product_id);
                    $pr_name = explode(",",$product_name);
                    $p_qty = explode(",",$product_qty);
                    $p_sell_price = explode(",",$product_sale_price);
                    
                    for($i=0; $i<count($pr_id); $i++)
                    {
                        $insertData=array(
                            'product_id'=>$pr_id[$i],
                            'product_name'=>$pr_name[$i],
                            'product_qty'=>$p_qty[$i],
                            'product_sale_price' => $p_sell_price[$i],
                            'order_id' => $number,
                            'user_id' => $user_id,
                            'bill_name' => $bill_name,
                            'bill_mobile' => $bill_mobile,
                            'bill_company' => $bill_company,
                            'bill_street' => $bill_street,
                            'bill_state' => $bill_state,
                            'bill_zip' => $bill_zip,
                            'bill_email' => $bill_email,
                            'deli_name' => $deli_name,
                            'deli_mobile' => $deli_mobile,
                            'deli_company' => $deli_company,
                            'deli_street' => $deli_street,
                            'deli_town' => $deli_town,
                            'deli_state' => $deli_state,
                            'deli_zip' => $deli_zip,
                            'deli_email' => $deli_email,
                            'payment_method' => $payment_method,
                            'delivery_status' => $delivery_status,
                            'order_date' => $order_date,
                            'tranction_id' => $tranction_id,
                            'payment_status' => $payment_status,
                            'bill_country' => 'India',
                            );
                        $insert_data = $this->db->insert('tbl_order',$insertData);
                        
                        $this->db->where('product_id', $pr_id[$i]);
                        $table_stock=$this->db->get('tbl_total_stock')->result();
                        // print_r($table_stock); 
                        foreach ($table_stock as $value_st) 
                        {
                            $stock=$value_st->total_stock;
                            $stock_uniqcode=$value_st->product_id;
                        }
                            $subtraction_sto=$stock-$p_qty[$i];
                        
                          $where=array('product_id'=>$stock_uniqcode);
                          $data_array31=array('total_stock'=>$subtraction_sto);
                        //   print_r($data_array31);
                          $result=$this->db->update('tbl_total_stock',$data_array31,$where);
                        
                    }
                    $check1=array(
                            'bill_name'=>$bill_name,
                            'order_id'=>$number,
                            'delivery_status'=>'Ordered'
                            );
                            
                    $order_row = $this->Api_model->userDetails_register($check1,'tbl_order');
                    $data1['return_status']='1';
                    $data1['order_row']=$order_row;
                    $data1['return_message']='Order Successfully';
                    echo json_encode($data1);
                    
                    
            }
            else
            {
                $data1['return_status']='0';
                $data1['return_message']='Provide all fields';   
                echo json_encode($data1);
            }
            
            
        }
        
        public function order_show()
        {
            // $order_id=$this->input->post('order_id');
            $user_id=$this->input->post('user_id');
            
            if(!empty($user_id))
            {
                $this->db->where('user_id',$user_id);
                $this->db->order_by('id','desc');
                $order_data=$this->db->get('tbl_order')->result();
                foreach($order_data as $valcas)
                {
                    $this->db->where('product_id', $valcas->product_id);
                    $this->db->limit(1);  
                    $data12=$this->db->get('tbl_productimage')->result();
                    foreach($data12 as $valim)
                    {
                        $image=$valim->product_image;
                    }
                    
                    $order[]=array("id"=>$valcas->id,"order_id"=>$valcas->order_id,"user_id"=>$valcas->user_id,"product_name"=>$valcas->product_name,"product_id"=>$valcas->product_id,"product_qty"=>$valcas->product_qty,"product_sale_price"=>$valcas->product_sale_price,"delivery_status"=>$valcas->delivery_status,"order_date"=>$valcas->order_date,"product_image"=>$image);
                }
                    $data1['order_data']=$order;
                    $data1['return_status']='1';
                    $data1['return_message']='Succesfully.';
                    echo json_encode($data1);
                
                // $order_data=$this->Api_model->order_show($user_id);
                // if($order_data)
                // {
                //     $data1['order_data']=$order_data;
                //     $data1['return_status']='1';
                //     $data1['return_message']='Succesfully.';
                //     echo json_encode($data1);
                // }
                // else
                // {
                //     $data1['return_message']="No data were found.";
                //     $data1['return_status']=0;
                //     echo json_encode($data1);
                // }
                
            }
            else
            {
                $data1['return_status']=2;
                $data1['return_message']='Provide complete user information to create.';
                echo json_encode($data1);
            }
        }
        
        public function order_cancel()
        {
            $code_id=$this->input->post('code_id');
            if(!empty($code_id))
            {
                $data=['delivery_status'=>'Cancel'];       
                $delete = $this->Api_model->update('tbl_order',['id'=>$code_id],$data);
                if($delete)
                {
                    //set the response and exit
                    $data1['return_status']='1';
                    $data1['return_message']='delevery address Item has been deleted.';
                    echo json_encode($data1);

                }
                else
                {
                    $data1['return_status']='0';
                    $data1['return_message']='delevery address Item has been not deleted.';
                    echo json_encode($data1);
                }
            }
            else
            {
               $data1['return_status']=2;
               $data1['return_message']='Provide complete user information to create.';
               echo json_encode($data1); 
            }
        }
        
        public function vendor_register()
        {
            $buyer_name=$this->input->post('buyer_name');
            $buyer_phoneno=$this->input->post('buyer_phoneno');
            $email_id=$this->input->post('email_id');
            $password=$this->input->post('password');
            
            if(!empty($buyer_name) && !empty($buyer_phoneno) && !empty($email_id) && !empty($password))
            {
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
            
                $where=array(
                    'buyer_phoneno'=>$buyer_phoneno,
                );
                $check_data=$this->Api_model->entty_check($where,'tbl_buyer');
                if(empty($check_data))
                {
                    $where=array(
                    'email_id'=>$email_id
                    );
                    $check_data=$this->Api_model->entty_check($where,'tbl_buyer');
                    if(empty($check_data))
                    {
                        $data=array(
                            'buyer_name'=>$buyer_name,
                            'buyer_code'=>$code_number,
                            'buyer_phoneno'=>$buyer_phoneno,
                            'email_id'=>$email_id,
                            'password'=>md5($password),
                            'status'=>'Vendor'
                        );
                        $insert=$this->db->insert('tbl_buyer',$data);
                        if($insert)
                        {
                            $check1=array(
                            'password'=>md5($password),
                            'email_id'=>$email_id,
                            'status'=>'Vendor'
                            );
                            
                            $login_row = $this->Api_model->userDetails_register($check1,'tbl_buyer');
                            
                            // $data1['user_details']=$login_row;
                            $data1['return_status']='1';
                            $data1['return_message']='Register Successfully';
                                
                            echo json_encode($data1);
                        
                        }
                        else
                        {
                            echo json_encode(['return_message'=>'Some problems occurred, please try again.']);
                        }
                    }
                    else
                    {
                        
                        $userDetails=array(
                            'phone_no'=>'',
                            'email'=>'',
                            'password'=>'',
                        );
                        $data1['user_details']=$userDetails;
                        $data1['return_status']='2';
                        $data1['return_message']='email id already exists';
                            
                        echo json_encode($data1);
                    }
                }
                else
                {
                    $userDetails=array(
                        'path'=>'',
                        'phone_no'=>'',
                        'email'=>'',
                        'password'=>'',
                        
                    );
                    
                    
                    $data1['user_details']=$userDetails;
                    $data1['return_status']='3';
                    $data1['return_message']='mobile number already exists';
                        
                    echo json_encode($data1);
                }
            }
            else
            {
               
                $data1['return_status']='0';
                $data1['return_message']='Provide all fields';   
                echo json_encode($data1);
            }
        }
        
        public function vendor_login()
        {
            $userid=$this->input->post('userid');
            $password=$this->input->post('password');
            if(!empty($userid) && !empty($password))
            {
                $check=array(
                'password'=>md5($password),
                'buyer_phoneno'=>$userid,
                'status'=>'Vendor'
                );
                $count=$this->Api_model->entty_check($check,'tbl_buyer');
                
                if(!empty($count))
                {
                    $check1=array(
                    'password'=>md5($password),
                    'buyer_phoneno'=>$userid,
                    'status'=>'Vendor'
                    );
                    $userData = $this->Api_model->changvendorDetails($check1);
                    //check if the user data inserted
                    if(!empty($userData))
                    {
                        
                        $userData = $this->Api_model->login_data_vendor($userid,'Mobile');
                        $data1['user_details']=$userData;
                        $data1['return_status']='1';
                        $data1['return_message']='Successfully Retrived';
                        
                        echo json_encode($data1);
                    }
                   
                }
                else
                {
                    $check=array(
                    'password'=>md5($password),
                    'email_id'=>$userid,
                    'status'=>'Vendor'
                    );
                    $count=$this->Api_model->entty_check($check,'tbl_buyer');

                    if(!empty($count))
                    {
                        $check1=array(
                        'password'=>md5($password),
                        'email_id'=>$userid,
                        'status'=>'Vendor'
                        );
                        $login_row = $this->Api_model->changvendorDetails($check1);
                        //check if the user data inserted
                        if(!empty($login_row))
                        {
                            
                            $login_row = $this->Api_model->login_data_vendor($userid,'Email');
                        
                            $data1['user_details']=$login_row;
                            $data1['return_status']='1';
                            $data1['return_message']='Successfully Retrived';
                            echo json_encode($data1);
                        }
                    }
                    else
                    {
                        
                        $response_data['return_message']="User id or password doesn't match, please try again.";
                        $response_data['return_status']='0';
                        echo json_encode($response_data);
                
                    }
                }
            }
            else
            {
                echo json_encode(['return_message'=>'Provide complete user information to create.']);
            }
        }
        
        public function vendor_product_serch()
        {
            $buyer_id=$this->input->post('buyer_id');
            $search_pro=$this->input->post('search_pro');
            
            if(!empty($buyer_id) && !empty($search_pro))
            {
                $product_serch = $this->Api_model->product_search($buyer_id,$search_pro);
                // pr($product_serch);
                if(!empty($product_serch))
                {
                    
                    $response_data['product_serch']=$product_serch;
                    $response_data['return_status']=1;
                    echo json_encode($response_data);
                }
                else
                {
                    $data1['return_status']=0;
                    $data1['return_message']="no data order.";  
                    echo json_encode($data1);
                }
                
            }
            else
            {
                $data1['return_status']='0';
                $data1['return_message']='Provide all fields';   
                echo json_encode($data1); 
            }
        }
        
        
        public function vendor_product_insert()
        {
            $buyer_id=$this->input->post('buyer_id');
    		$product_id1=$this->input->post('product_id');
    // 		$product_code=$this->input->post('product_code');
    		$bye_qty1=$this->input->post('bye_qty');
    		$product_name1=$this->input->post('product_name');
        	$product_bye_rate1=$this->input->post('product_bye_rate');
        	$buyer_name=$this->input->post('buyer_name');
    		
    // 		print_r($buyer_id.''.$product_id1.''.$bye_qty1.''.$product_name1.''.$product_bye_rate1.''.$buyer_name);
    		
    		if(!empty($buyer_id) && !empty($product_name1) && !empty($bye_qty1) && !empty($product_bye_rate1))
    		{
    		    
    		    $firstThree1 = substr($buyer_name, 0, 3);
    		    
    		    $product_id = explode(",",$product_id1);
                $product_name = explode(",",$product_name1);
                $bye_qty = explode(",",$bye_qty1);
                $product_bye_rate = explode(",",$product_bye_rate1);
    		    
    		    $date=date("Y-m-d");
                $month1=date("Y-m");
                $new_product_id=array();
    		    foreach ($product_name as $key => $v) 
                {
                    $this->db->where('product_name', $product_name[$key]);
                    $this->db->where('buyer_id', $buyer_id);
                    $product_count=$this->db->get('tbl_byuerproduct')->num_rows();
                    
                        if($product_count>0)
                        {
                            $this->db->where('product_name', $product_name[$key]);
                            $this->db->where('buyer_id', $buyer_id);
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
                            $this->db->where('buyer_id', $buyer_id);
                            $this->db->order_by('id', 'DESC');
                            $this->db->limit(1);
                            $product_stock_row=$this->db->get('tbl_total_stock')->row();
                            
                            $product_code567=$product_stock_row->product_code;
                            $code_remove145 = substr($product_code567, 3);
                            $product_code_id=(int)$code_remove145 + 1;
                            
                            $product_code12300 = str_pad($product_code_id, 4, '0', STR_PAD_LEFT);
                            $firstThree1 = substr($buyer_name, 0, 3);
                            $product_code123 =$firstThree1.$product_code12300;
                        }
                        
                        $code_number_product[]=$product_code123;
                    
                    
                    $data_array=array(
                        "product_code" =>$code_number_product[$key],
                    	"buyer_id"=> $buyer_id,
                    	"product_name"=>$product_name[$key],
                    	"product_bye_rate"=>(int)$product_bye_rate[$key],
                    	"bye_qty"=>(int)$bye_qty[$key],
                    	"date"=>$date,
                    	"month"=>$month1,
                   );
                
                // $this->Api_model->insert('tbl_byuerproduct',$data_array);
                $this->Api_model->insert123('tbl_byuerproduct',$data_array);
                
                $insert_product_id =$this->db->insert_id();
                //   //$new_product_id[$key][$insert_product_id];
                
                  if(empty($product_id[$key]))
                  {
                      array_push($new_product_id,$insert_product_id);
                       
                      foreach($new_product_id as $key1 =>$va)
                      {
                          $pr=$new_product_id[$key1];
                      }  
                        $data_array1=array(
                        "buyer_id"=> $buyer_id,    
                        "product_code" =>$code_number_product[$key],  
                    	"product_id"=> $pr,
                    	"total_stock"=>(int)$bye_qty[$key],
                        );
                        // $this->om->insert('tbl_total_stock',$data_array1);
                        // $this->db->insert('tbl_total_stock',$data_array1);
                        $this->Api_model->insert123('tbl_total_stock',$data_array1);
                       
                  }
                 else
                 {
                  $this->db->where('product_id', $product_id[$key]);
                  $this->db->where('buyer_id', $buyer_id);
                  $stock_check=$this->db->get('tbl_total_stock')->result();
                  
                  if($stock_check)
                  {
                      
                      foreach($stock_check as $value_st)
                      {
                          $old_stock_qty=$value_st->total_stock;
                          $product_id1=$value_st->product_id;
                           
                      }
                      $data_store=$old_stock_qty+$bye_qty[$key];
        
                      $where=array("product_id"=>$product_id1);
                      $data_array31=array("total_stock"=>$data_store);
                
                      $result=$this->Api_model->update('tbl_total_stock',$where,$data_array31); 
                    
                  }
                 }
        
                }
                
                // print_r($data_array);
                
                $response_data['return_message']="Succesfully";
                $response_data['return_status']=1;
                echo json_encode($response_data);
    		}
    		else
    		{
    		    $data1['return_status']='0';
                $data1['return_message']='Provide all fields';   
                echo json_encode($data1);
    		}
    		
    		
        }
        
        public function vendor_product_show()
        {
            $buyer_id=$this->input->post('buyer_id');
            if(!empty($buyer_id))
            {
                $buyer_product_show = $this->Api_model->product_show_vendor($buyer_id);
                if($buyer_product_show)
                {
                    $response_data['buyer_product_show']=$buyer_product_show;
                    $response_data['return_status']=1;
                    echo json_encode($response_data);
                }
                else
                {
                    $data1['return_status']=0;
                    $data1['return_message']="no data order.";  
                    echo json_encode($data1);
                }
                
            }
            else
            {
                $data1['return_status']='0';
                $data1['return_message']='Provide all fields';   
                echo json_encode($data1); 
            }
            
        }
        
        public function vendor_product_stock()
        {
            $buyer_id=$this->input->post('buyer_id');
            if(!empty($buyer_id))
            {
                $buyer_product_stock = $this->Api_model->product_stock_vendor($buyer_id);
                if($buyer_product_stock)
                {
                    $response_data['buyer_product_stock']=$buyer_product_stock;
                    $response_data['return_status']=1;
                    echo json_encode($response_data);
                }
                else
                {
                    $data1['return_status']=0;
                    $data1['return_message']="no data order.";  
                    echo json_encode($data1);
                }
                
            }
            else
            {
                $data1['return_status']='0';
                $data1['return_message']='Provide all fields';   
                echo json_encode($data1); 
            } 
        }
         
        public function contact_us()
        {
            $contact_us[]=array("phone_no"=>"7439524745","email_id"=>"bongtech.solution@gmail.com","address"=>"405, Russa Rd East 1st Ln, Saha Para, Tollygunge, Kolkata, West Bengal 700033"); 
            $data1='1';
            echo json_encode(array("contact_us"=>$contact_us,"status"=>$data1));
        }
        
        public function privacy_policy()
        {
            $privacy_policy=$this->db->get('tbl_privacy_policy')->row();
            $data1['privacy_policy']=$privacy_policy;
            $data1['return_status']='1';
            $data1['return_message']='Successfully';
            echo json_encode($data1);
        } 
        
    }
?>