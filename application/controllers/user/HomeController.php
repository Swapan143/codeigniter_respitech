<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class HomeController extends CI_Controller {
	
	 
	function __construct()
	{
	  	parent::__construct(); 	
	  	error_reporting(0);
		$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");	
	  	date_default_timezone_set('Asia/Kolkata');
		$this->load->helper(array('common_helper', 'string', 'form', 'security','url'));
		$this->load->library(array('form_validation', 'email'));

		$this->load->model('user/Users_Model');	
		$this->load->model('user/Home_Model');
		$this->load->model('Others_model','om');
	}
	//*....... Users All........*//

	public function index()   
	{
		// $this->data['manu_label'] = $this->Home_Model->get_categories();
		// $this->data['banner']=$this->Users_Model->banner_getRows('tbl_banner');
		// $this->data['news']=$this->Users_Model->news_getRows('tbl_news');
		// $this->data['greeting']=$this->Users_Model->greeting_getRows('tbl_greeting');
        

        $this->db->where('is_delete', 'N');
        $this->db->order_by('id', 'DESC');
        $banner_data=$this->db->get('tbl_banner')->result();
        $this->data['banner_data']=$banner_data;
        
		 $this->data['page_title']='Respitech | Home';
		 $this->data['subview']='home/home';
		 // pr($this->data);die;
		 $this->load->view('user/layout/default', $this->data);
	}

    
    public function berlinQuestionnaire()
    {

        $berlinDetails = $this->session->userdata('berlinDetails');
        if (!empty($berlinDetails)) 
        {
          $this->data['flag']=1;
        } 
        else 
        {
          $this->data['flag']='';
            
        }
        //pr($berlinDetails);
        $city = $berlinDetails['city'];       // 'Berlin'
        $population = $berlinDetails['population']; // 3769000

        $states=$this->db->get('states')->result();
        $this->data['states']=$states;
        $this->data['berlinDetails']=$berlinDetails;
        //pr($this->data);
        $this->session->unset_userdata('berlinDetails');
        $this->load->view('user/question/berlin_question',$this->data);
    }

    public function berlinQuestionnaireSubmit()
    {
        //pr($this->input->post());
        // Retrieve form data
        $first_name = $this->input->post('first_name');
        $last_name = $this->input->post('last_name');
        $height = $this->input->post('height');
        $weight = $this->input->post('weight');
        $age = $this->input->post('age');
        $gender = $this->input->post('gender');
        $state = $this->input->post('state');
        $city = $this->input->post('city');
        $who_are_you = $this->input->post('who_are_you');
        $do_you_store = $this->input->post('do_you_store');
        $how_often_snore = $this->input->post('how_often_snore');
        $has_your_snoring_evar = $this->input->post('has_your_snoring_evar');
        $has_any_one_noticed = $this->input->post('has_any_one_noticed');
        $how_often_do_you_feel = $this->input->post('how_often_do_you_feel');
        $do_you_have_hign_blood_pressure = $this->input->post('do_you_have_hign_blood_pressure');
        $hao_you_evar_nodded_off = $this->input->post('hao_you_evar_nodded_off');
        $do_you_have_hign_blood_sugar = $this->input->post('do_you_have_hign_blood_sugar');
        $do_you_have_smoke = $this->input->post('do_you_have_smoke');
        $do_you_have_drink_alcohol = $this->input->post('do_you_have_drink_alcohol');

       
        // Calculate BMI
        $bmi = $this->calculateBMI($weight, $height);

        // Classify BMI
        $bmiCategory = $this->classifyBMI($bmi);

    
        // Prepare data for insertion, encoding arrays to JSON
        $data = [
            'first_name' => !empty($first_name) ? $first_name : null,
            'last_name' => !empty($last_name) ? $last_name : null,
            'height' => !empty($height) ? $height : null,
            'weight' => !empty($weight) ? $weight : null,
            'age' => !empty($age) ? $age : null,
            'gender' => $gender,
            'bmi' => round(@$bmi),
            'bmi_category' => @$bmiCategory,
            'who_are_you' => !empty($who_are_you) ? $who_are_you : null,
            'state' => !empty($state) ? $state : null,
            'city' => !empty($city) ? $city : null,
            'do_you_store' => !empty($do_you_store) ? json_encode($do_you_store) : null,
            'how_often_snore' => !empty($how_often_snore) ? json_encode($how_often_snore) : null,
            'has_your_snoring_evar' => !empty($has_your_snoring_evar) ? json_encode($has_your_snoring_evar) : null,
            'has_any_one_noticed' => !empty($has_any_one_noticed) ? json_encode($has_any_one_noticed) : null,
            'how_often_do_you_feel' => !empty($how_often_do_you_feel) ? json_encode($how_often_do_you_feel) : null,
            'during_your_waking_time' => !empty($during_your_waking_time) ? json_encode($during_your_waking_time) : null,
            'how_offen_does_this_occur' => !empty($how_offen_does_this_occur) ? json_encode($how_offen_does_this_occur) : null,
            'do_you_have_hign_blood_pressure' => !empty($do_you_have_hign_blood_pressure) ? json_encode($do_you_have_hign_blood_pressure) : null,
            'hao_you_evar_nodded_off' => !empty($hao_you_evar_nodded_off) ? json_encode($hao_you_evar_nodded_off) : null,
            'do_you_have_hign_blood_sugar' => !empty($do_you_have_hign_blood_sugar) ? json_encode($do_you_have_hign_blood_sugar) : null,
            'do_you_have_smoke' => !empty($do_you_have_smoke) ? json_encode($do_you_have_smoke) : null,
            'do_you_have_drink_alcohol' => !empty($do_you_have_drink_alcohol) ? json_encode($do_you_have_drink_alcohol) : null,
        ];

        // Insert data into the database
        $this->db->insert('tbl_berlin_question', $data);

        $risk='';
        $risk_type='';
        if($bmiCategory=="Underweight")
        {
            $risk="Low Risk";
            $risk_type='1';
        }
        if($bmiCategory=="Normal weight")
        {
            $risk="Low Risk";
            $risk_type='2';
        }
        if($bmiCategory=="Obesity")
        {
            $risk="High Risk";
            $risk_type='3';
        }
        if($bmiCategory=="Overweight")
        {
            $risk="High Risk";
            $risk_type='4';
        }

        // Check if insert was successful
        if ($this->db->affected_rows() > 0) 
        {
            $this->session->set_userdata('berlinDetails', array(
                'name' => $data['first_name'].' '.$data['last_name'],
                'height'  => $data['height'],
                'weight'  => $data['weight'],
                'bmi_category'  => $data['bmi_category'],
                'bmi'  => $data['bmi'],
                'risk'  =>  $risk,
                'risk_type'  =>  $risk_type,
            ));

            $this->session->set_flashdata('success', 'Question added successfully.');	
            redirect('/respitech-quiz');
        } 
        else 
        {
            $this->session->set_flashdata('error', 'Something went wrong.');	
            redirect('/respitech-quiz');
        }
    }
       
    public function getCity()
    {
        $state_id=$this->input->post('state_id');
        $this->db->where('state_id',$state_id);
        $citie_data =$this->db->get('cities')->result();
     
        $html='<option value="">Select City</option>';
        foreach($citie_data as $citie_row)
        {
            $html .='<option value="'.$citie_row->id.'">'.$citie_row->name.'</option>';
        
        }
        echo $html;              

    }

    // Function to calculate BMI
    public function calculateBMI($weight, $height) 
    {
        // Convert height from cm to meters
        $heightInMeters = $height / 100;

        // BMI formula: weight (kg) / (height (m)^2)
        $bmi = $weight / ($heightInMeters * $heightInMeters);
        
        return $bmi;
    }

    // Function to classify BMI result
    public function classifyBMI($bmi) 
    {
        if ($bmi < 18.5) {
            return "Underweight";
        } elseif ($bmi >= 18.5 && $bmi < 24.9) {
            return "Normal weight";
        } elseif ($bmi >= 25 && $bmi < 29.9) {
            return "Overweight";
        } else {
            return "Obesity";
        }
    }

    public function berlinStatus($flag)   
	{
        if($flag==1)
        {
            $b_status="High Risk";
        }
        else if($c1==2)
        {
            $b_status="High Risk";
        }
        else 
        {
            $b_status="High Risk";
        }
    
        $this->data['b_status']=$b_status;
        $this->data['page_title']='Respitech | Home';
        $this->data['subview']='home/berlin_status';
        // pr($this->data);die;
        $this->load->view('user/layout/default', $this->data);
	}

    


    public function all_collection()
    {
        
            $this->data['page_title']='Respitech | Home';
            $this->data['subview']='product/shop';
            $this->load->view('user/layout/default', $this->data);
    }

    public function product_category()
    {
        
            $category_id=$this->input->get('cid');
            
            $where=array('catgegory_id'=>$category_id);
            $this->data['result']=$this->om->select_all_where('tbl_product',$where);

            $this->db->where('id',$category_id);
            $categoryDetails =$this->db->get('tbl_category')->row();
            
            $this->data['category_details']=$categoryDetails;
            $this->data['category_id']=$category_id;
            $this->data['page_title']='Respitech | category Shop';
            $this->data['subview']='product/category-shop';
            $this->load->view('user/layout/default', $this->data);
    }

    public function book_product()
    {
    
    $proid=$this->input->get('proid');
    $category_id=$this->input->get('cid');
    
        $where=array('id'=>$proid);
        $this->data['result']=$this->om->select_all_where('tbl_product',$where);

        $this->data['page_title']='Respitech | Product Details';
        $this->data['subview']='product/product-details-2';
        $this->load->view('user/layout/default', $this->data);
    }


    public function user_register()
    {
        $this->db->order_by('id', 'desc');
        $doctor_data=$this->db->get('tbl_doctor')->result();
        $this->data['doctor_data']=$doctor_data;

        $this->data['page_title']='Respitech | User Register';
        $this->data['subview']='profile/register';
        $this->load->view('user/layout/default', $this->data);    
    }

    public function add_register()
    {

        if($_POST)
        {
            $email=trim($this->input->post('email'));

            $this->db->where('email', $email);
            $this->db->where('is_delete', 'N');
            $patient_row=$this->db->get('tbl_users')->row();
        
            if(empty($patient_row))
            {
                $name=trim($this->input->post('name'));
                $mobile=trim($this->input->post('mobile'));
                $addresh=trim($this->input->post('addresh'));
                $password=trim($this->input->post('password'));
                $patient_type=trim($this->input->post('patient_type'));
                $doctor_id=trim($this->input->post('doctor_name'));

                if($doctor_id == '0')
                {
                    $doctor_name='Other Doctor';

                    $d_name=trim($this->input->post('d_name'));
                    $d_email=trim($this->input->post('d_email'));
                    $d_mobile=trim($this->input->post('d_mobile'));
                    $hospital_name=trim($this->input->post('hospital_name'));
                    $specialist=trim($this->input->post('specialist'));

                    $data=array(
                        'name' => $d_name,
                        'email' => $d_email,
                        'mobile' => $d_mobile,
                        'hospital_name' => $hospital_name,
                        'specialist' => $specialist,
                    );			
                    $this->db->insert('tbl_doctor', $data);
                }
                else
                {
                    $this->db->where('id', $doctor_id);
                    $doctor_data=$this->db->get('tbl_doctor')->row();
                    $doctor_name=$doctor_data->name;
                }
                

                $data=array(
                    'name' => $name,
                    'email' => $email,
                    'mobile' => $mobile,
                    'addresh' => $addresh,
                    'password_text' => $password,
                    'password' => md5($password),
                    'patient_type' => $patient_type,
                    'doctor_name' => $doctor_name,
                    'doctor_id' => $doctor_id,
                );			
                $this->db->insert('tbl_users', $data);

                $where=array("email"=>$email);
                $data=$this->om->select_all_where('tbl_users',$where);

                $id=$data[0]->id;
                $email=$data[0]->email;
                $name=$data[0]->name;
                $mobile_no=$data[0]->mobile;
                $this->session->set_userdata(array(
                    'font_user_id'  => $id,
                    'user_email' => $email,
                    'user_name' => $name,
                    'user_mobile' => $mobile_no)
                );

                $this->session->set_flashdata('success', 'Patient added successfully.');	
                redirect('/');
            }
            else
            {
                $this->session->set_flashdata('error', 'Patient name already exists!');	
                redirect('user-register');
            }
            
        }
    }

    public function user_logout()
	{
        //$this->session->sess_destroy();
        /*$font_user_id=$this->session->userdata('font_user_id');
        $user_email=$this->session->userdata('user_email');*/
        $this->session->unset_userdata('font_user_id');
        $this->session->unset_userdata('user_email');
        $this->session->unset_userdata('user_name');
        $this->session->unset_userdata('user_mobile');
        redirect('home/');
	}



    public function user_login()
    {
            $this->data['page_title']='Respitech | User Login';
            $this->data['subview']='profile/login';
            $this->load->view('user/layout/default', $this->data);
    }

    public function login_user()
    {
        $user_name=$this->input->post('user_name');
        $user_password=$this->input->post('user_password');
        $password=md5($user_password);
        $status="Active";
        
        $where=array("email"=>$user_name);
        $where1=array("password"=>$password);
        $where2=array("is_active"=>$status);
        if($data=$this->om->login123('tbl_users',$where,$where1,$where2))
        {
            $id=$data[0]['id'];
            $email=$data[0]['email'];
            $name=$data[0]['name'];
            $mobile_no=$data[0]['mobile'];
            
            
            
            $this->session->set_userdata(array(
                                                'font_user_id'  => $id,
                                                'user_email' => $email,
                                                'user_name' => $name,
                                                'user_mobile' => $mobile_no));
            
            echo "1";
        } 
        else 
        {
            echo "2";
        }
    }


public function cart_checkout()
{
        $this->data['page_title']='Respitech | Cart Checkout'; 
		$this->data['subview']='profile/checkout';
		$this->load->view('user/layout/default', $this->data);
}


public function confirm_order()
{
    
    include('libs/phpqrcode/qrlib.php');
    $user_id=$this->input->post('user_id');
    $bill_name=$this->input->post('bill_name');
    $bill_mobile=$this->input->post('bill_mobile');
    $bill_company=$this->input->post('bill_company');
    $bill_country=$this->input->post('bill_country');
    $bill_street=$this->input->post('bill_street');
    $bill_state=$this->input->post('bill_state');
    $bill_zip=$this->input->post('bill_zip');
    $bill_email=$this->input->post('bill_email');
    $deli_name=$this->input->post('deli_name');
    $deli_mobile=$this->input->post('deli_mobile');
    $deli_company=$this->input->post('deli_company');
    $deli_street=$this->input->post('deli_street');
    $deli_town=$this->input->post('deli_town');
    $deli_state=$this->input->post('deli_state');
    $deli_zip=$this->input->post('deli_zip');
    $deli_email=$this->input->post('deli_email');
    
    //print_r($_SESSION['all_data123']);
    

    $date=date("Y-m-d");
    $status="Ordered";
    $txn_id=rand(2000,40000);
    // $pay_method="COD";
    // $payment_status="Unpaid";

    $data345=$this->om->row_count_no_where('tbl_order');
    if($data345>0)
    {
        $sql4567="select * from tbl_order order by id desc limit 1";
        $request12456 = $this->om->customQuery($sql4567);
        $ord3456=$request12456[0]->order_id;
        $val5432=$ord3456+1;
        $order_id=str_pad($val5432,2,"0",STR_PAD_LEFT);
    } 
    else 
    {
        $order_id="01";
    }
	$invoice_no="000".$order_id;

    $paymentType=$this->input->post('pay_met');
    $screen_short='';
    if($paymentType == "cash")
    {
        $pay_method="COD";
        $payment_status="Unpaid";
        $paymentdoc ='';
    }
    else
    {
        $pay_method="ONLINE";
        $payment_status="Paid";
        if(!empty($_FILES['payment_doc']['name']))
        {
            
            $uploads_dir = "webroot/UserImages/order";
            $tmp_name = $_FILES["payment_doc"]["tmp_name"];
            $pay_name =rand().$_FILES["payment_doc"]["name"];     
            move_uploaded_file($tmp_name, "$uploads_dir/$pay_name");
            $screen_short =$pay_name;
                            
        }
    }

    

    if(empty($user_id))
    {
        $user_id="Guest".$order_id;
    }
    $tempDir = 'webroot/adminImages/qrcode/'; 
	$email = $invoice_no;
	$subject =  "Invoice No -".$email;
	//$filename = getUsernameFromEmail($email);
	$filename=$email;
	$body =  "https://respitech.co.in/";
	$codeContents = 'mailto:'.$email.'?subject='.urlencode($subject).'&body='.urlencode($body);
	QRcode::png($codeContents, $tempDir.''.$filename.'.png', QR_ECLEVEL_L, 5);
    foreach($_SESSION['all_data123'] as $val)
    {
        $product_id=$val['item_id'];
        
        $product_code=$val['product_code'];
        $product_qty=$val['item_quantity'];
        $product_orginal_price=$val['orginal_price'];
        $product_stock=$val['product_stock'];
        
        $this->db->where('id', $item_id);
        $p_name=$this->db->get('tbl_product')->result();
        $product_name=$p_name[0]->product_name;
    
        $data_array=array("order_id"=>$order_id,
                        "user_id"=>$user_id,
                        "bill_name"=>$bill_name,
                        "bill_mobile"=>$bill_mobile,
                        "bill_company"=>$bill_company,
                        "bill_country"=>$bill_country,
                        "bill_street"=>$bill_street,
                        "bill_state"=>$bill_state,
                        "bill_zip"=>$bill_zip,
                        "bill_email"=>$bill_email,
                        "deli_name"=>$deli_name,
                        "deli_mobile"=>$deli_mobile,
                        "deli_company"=>$deli_company,
                        "deli_street"=>$deli_street,
                        "deli_town"=>$deli_town,
                        "deli_state"=>$deli_state,
                        "deli_zip"=>$deli_zip,
                        "deli_email"=>$deli_email,
                        "product_id"=>$product_id,
                        "product_name"=>$product_name,
                        "product_qty"=>$product_qty,
                        "product_sale_price"=>$product_orginal_price,
                        "payment_method"=>$pay_method,
                        "payment_status"=>$payment_status,
                        "delivery_status"=>$status,
                        "order_date"=>$date,
                        "tranction_id"=>$txn_id,
                        "invoice_no"=>$invoice_no,
                        "product_code"=>$product_code,
                        "qrcode"=>$filename.'.png',
                        "screen_short"=>$screen_short 
                    );

        // echo "<pre>";
        // print_r($data_array);
        // die;
        
        $this->om->insert('tbl_order',$data_array);
        $stock_decre123=$product_stock - $product_qty;
        $where3=array("product_id"=>$product_id);
        $data_array12=array("total_stock"=>$stock_decre123);
        $result=$this->om->update('tbl_total_stock',$data_array12,$where3);
        
    }
    $_SESSION['order_id']=$order_id;
    //print_r($data_array);
    // echo 1;
    
    return redirect('card_delete_all');
}

public function sucess_order()
{
    
    $this->data['page_title']='Respitech | Sucess Order';
	$this->data['subview']='profile/success';
    $this->load->view('user/layout/default', $this->data);
}


public function my_order()
{
    
    $this->data['page_title']='Respitech | My order';
	$this->data['subview']='profile/dashboard';
    $this->load->view('user/layout/default', $this->data);
}


public function orderDetails($order_code)
{
    
    $this->db->where('order_id', $order_code);
    $order_details=$this->db->get('tbl_order')->result();
    
    $this->data['product_resutl']=$order_details;
    
    $this->data['page_title']='Respitech | My order';
	$this->data['subview']='profile/order_detail';
    $this->load->view('user/layout/default', $this->data);
}


public function tracking($order_code)
{
   
    $this->db->where('order_id', $order_code);
    $order_details=$this->db->get('tbl_order')->result();
    $this->data['product_resutl']=$order_details;
    $this->data['page_title']='Respitech | My order tracking';
	$this->data['subview']='profile/tracking';
    $this->load->view('user/layout/default', $this->data);
}

public function wishlist()
    {

        $user_id=$this->input->post('user_id');
        $product_id=$this->input->post('product_id');
        $data_array=array("product_id"=>$product_id,"user_id"=>$user_id);
        $this->om->insert('tbl_wishlist',$data_array);
        
        echo 1;
        
    }
    
    
    
    public function removewishlist()
    {

        $user_id=$this->input->post('user_id');
        $product_id=$this->input->post('product_id');
        
        $where1=array(
            'product_id'=>$product_id,
            'user_id'=>$user_id
           
        );
        $this->db->where($where1);
        $this->db->delete('tbl_wishlist');

            echo 1;

        
    }
    
    
    public function wish_list_del()
    {
        $del_wish=$this->input->post('del_wish');
        
         $where1=array(
            'id'=>$del_wish
        );
        $this->db->where($where1);
        $this->db->delete('tbl_wishlist');

            echo 1;
        
        
    }
    


public function about_us()
{
   
    $this->data['page_title']='Respitech | About Us';
	$this->data['subview']='profile/about';
    $this->load->view('user/layout/default', $this->data);
}
public function delete_account()
{
    
   
    $this->data['page_title']='Respitech | Delete Account';
	$this->data['subview']='profile/deleteaccount';
    $this->load->view('user/layout/default', $this->data);
}

public function contact_us()
{
   
    $this->data['page_title']='Respitech | Contact Us';
	$this->data['subview']='profile/contact';
    $this->load->view('user/layout/default', $this->data);
}

public function privacy_policy()
{
    $privacy_policy=$this->db->get('tbl_privacy_policy')->result();
    $this->data['privacy_policy']=$privacy_policy;
    
    $this->data['page_title']='Respitech | Privacy Policy';
    $this->data['subview']='profile/privacy_policy';
    $this->load->view('user/layout/default', $this->data); 
}

public function show_wishlist()
{
   
    $this->data['page_title']='Respitech | show wishlist';
	$this->data['subview']='profile/wishlist';
    $this->load->view('user/layout/default', $this->data);
}

public function my_account()
{
   
    $this->data['page_title']='Respitech | My Account';
	$this->data['subview']='profile/my-account';
    $this->load->view('user/layout/default', $this->data);
}

public function header_search_product()
{
   $search_pro=$this->input->post('search_pro');


         $sql = "SELECT * FROM  tbl_allsearch WHERE name like '%$search_pro%' ORDER BY id LIMIT 0,10";
        $request = $this->om->customQuery($sql);
        if(!empty($request)){
        foreach($request as $val)
        {
            $all_name=$val->name;
            $all_part_name=$val->type;
            
            $abc=$all_name;
            
            ?>
         
         <li onClick="selectProduct('<?= $abc.'|'.$all_part_name?>');"><?= $abc; ?></li>
         <?php
        }
        } else {?>
            <li>Data Not Found</li>
          <?php   
        }
}


public function product_search()
{
        $pro_search=$this->input->get('pro_search');
        $name=$this->input->get('name'); 
        if($name=="category"){
            
            $sql = "SELECT * FROM  tbl_category WHERE category_name like '%$pro_search%'";
            $request = $this->om->customQuery($sql);
            $category_id=$request[0]->id;
            
            $this->db->where('catgegory_id', $category_id);
            $product_details=$this->db->get('tbl_product')->result();
            //print_r($product_details);
            
        }else if($name=="subcategory"){
            $sql = "SELECT * FROM  tbl_subcategory WHERE subcategory_name like '%$pro_search%'";
            $request = $this->om->customQuery($sql);
            $subcategory_id=$request[0]->id;
            
            $this->db->where('subcategory_id', $subcategory_id);
            $product_details=$this->db->get('tbl_product')->result();
            
            //print_r($product_details);
            
        }else if($name=="product"){
            $sql = "SELECT * FROM  tbl_byuerproduct WHERE product_name like '%$pro_search%'";
            $request = $this->om->customQuery($sql);
            $prodcuct_id=$request[0]->id;
            
            $this->db->where('product_name', $prodcuct_id);
            $product_details=$this->db->get('tbl_product')->result();
            //print_r($product_details);
            
        }else {
            $sql = "SELECT * FROM  tbl_byuerproduct WHERE product_name like '%$pro_search%'";
            $product_details = $this->om->customQuery($sql);
            
        }
        
        
         $this->data['result1']=$pro_search;
        
         $this->data['result']=$product_details;
        
         $this->data['page_title']='Respitech | Home';
		 $this->data['subview']='product/search_product';
		 $this->load->view('user/layout/default', $this->data);
        
        
}


public function cancelorder()
    {
        
        $cancel_order_id=$this->input->post('cancel_order_id');
        $date = date('Y-m-d H:i:s');
        $where=array("id"=>$cancel_order_id);
        $data_array=array("delivery_status"=>"Cancel",
                            "delivery_date"=>$date);
        $result=$this->om->update('tbl_order',$data_array,$where);

        /*$this->db->where('uniqcode', $cancel_order_id);
        $order_date123=$this->db->get('tbl_order')->result();
        foreach($order_date123 as $value_order_date123)
                { 
                    $product_features_id=$value_order_date123->product_features_id;
                    $quantity=$value_order_date123->quantity;

                }

        $this->db->where('product_features_id', $product_features_id);
        $total_stock=$this->db->get('tbl_total_stock')->result();
        foreach ($total_stock as $value_stock) {
            $stock_quantity=$value_stock->quantity;
            
        }

         $gross=$stock_quantity+$quantity;

         $where12=array("product_features_id"=>$product_features_id);
        $data_array123=array("quantity"=>$gross);
        $result=$this->om->update('tbl_total_stock',$data_array123,$where12);*/

        echo 1;

    }
    
    
    public function all_search_product()
    {
        $category=$this->input->post('cate');
        $min_price=$this->input->post('min_price');
        $max_price=$this->input->post('max_price');

          $min_priceint = (int) filter_var($min_price, FILTER_SANITIZE_NUMBER_INT);
          $max_priceint = (int) filter_var($max_price, FILTER_SANITIZE_NUMBER_INT);
      
      $query="select * from tbl_product WHERE product_discount_rate BETWEEN $min_priceint AND $max_priceint";
      
                            if(isset($category))
                            {
                            $category1=implode("','",$category);
                            $query.=" AND catgegory_id   IN ('".$category1."')";
                            }
      
                           $request = $this->om->customQuery($query);
      
                          
                            foreach($request as $valnew)
                            {
                             
                            $product_name=$valnew->product_name;
                            $this->db->where('id', $product_name);
                            $new_arival_product_name=$this->db->get('tbl_byuerproduct')->result();
                            
                        $productname=$new_arival_product_name[0]->product_name;
                        $product_name_re = str_replace(' ', '', $productname);
                        $product_string = preg_replace('/[^A-Za-z0-9\-]/', '-', $product_name_re);
                        ?>
                        
                                    <div class="col-xl-4 col-md-6 col-lg-6 col-sm-6">
                                    <div class="product-wrap mb-25 scroll-zoom">
                                        <div class="product-img">
                                            <a href="<?=base_url('book-product/details/'.$product_string.'?proid='.$product_name.'&cid='.$valnew->catgegory_id)?>">
                                    <?php
                                    
                                    //$this->db->limit(2);
                                    $this->db->where('product_id', $valnew->id);
                                    $product_image=$this->db->get('tbl_productimage')->result();
                                    $x=1;
                                    foreach($product_image as $valimage){
                                        $product_image=trim($valimage->product_image,",");
                                        if($x==1){
                                            $de="default";
                                        }else {
                                            $de="hover";
                                        }
                                    ?>
                                    <img class="<?php echo $de;?>-img" src="<?=base_url('webroot/adminImages/product_image/'.$product_image.'')?>" alt="">
                                    
                                    
                                    <?php 
                                    $x++;
                                     }?>
                                </a>
                                            <?php if(isset($_SESSION['seller_font_user_id'])){?>
                                            <span class="pink"><?php echo $valnew->seller_discount;?>%</span>
                                            <?php } else {?>
                                            <span class="pink"><?php echo $valnew->product_discount;?>%</span>
                                            <?php }?>
                                            
                                        </div>
                                        <div class="product-content text-center">
                                            <h3><a href="<?=base_url('book-product/details/'.$product_string.'?proid='.$product_name.'&cid='.$valnew->catgegory_id)?>"><?php echo $new_arival_product_name[0]->product_name;?></a></h3>
                                            <p><?php echo substr($valnew->product_description, 0, 30).' '.'...';?></p>
                                           
                                            <div class="product-price">
                                                <?php if(isset($_SESSION['seller_font_user_id'])){?>
                                                <span>$ <?php echo $valnew->seller_discount_rate;?></span>
                                                <span class="old">$ <?php echo $valnew->seller_product_rate;?></span>
                                                <?php } else {?>
                                                <span>$ <?php echo $valnew->product_discount_rate;?></span>
                                                <span class="old">$ <?php echo $valnew->sel_product_rate;?></span>
                                                <?php }?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        
                        <?php 
                            }
                            
      
      
      
      
    }
    
    
    
    public function search_product()
    {
        $product_price=$this->input->post('product_price');
        if($product_price=="pricee_asc")
        {
            $query="select * from tbl_product order by product_discount_rate asc";
            $request = $this->om->customQuery($query);
            
            
            foreach($request as $valnew)
                            {
                             
                            $product_name=$valnew->product_name;
                            $this->db->where('id', $product_name);
                            $new_arival_product_name=$this->db->get('tbl_byuerproduct')->result();
                            
                        $productname=$new_arival_product_name[0]->product_name;
                        $product_name_re = str_replace(' ', '', $productname);
                        $product_string = preg_replace('/[^A-Za-z0-9\-]/', '-', $product_name_re);
                        ?>
            
                        <div class="col-xl-4 col-md-6 col-lg-6 col-sm-6">
                                    <div class="product-wrap mb-25 scroll-zoom">
                                        <div class="product-img">
                                            <a href="<?=base_url('book-product/details/'.$product_string.'?proid='.$product_name.'&cid='.$valnew->catgegory_id)?>">
                                    <?php
                                    
                                    //$this->db->limit(2);
                                    $this->db->where('product_id', $valnew->id);
                                    $product_image=$this->db->get('tbl_productimage')->result();
                                    $x=1;
                                    foreach($product_image as $valimage){
                                        $product_image=trim($valimage->product_image,",");
                                        if($x==1){
                                            $de="default";
                                        }else {
                                            $de="hover";
                                        }
                                    ?>
                                    <img class="<?php echo $de;?>-img" src="<?=base_url('webroot/adminImages/product_image/'.$product_image.'')?>" alt="">
                                    
                                    
                                    <?php 
                                    $x++;
                                     }?>
                                </a>
                                            <?php if(isset($_SESSION['seller_font_user_id'])){?>
                                            <span class="pink"><?php echo $valnew->seller_discount;?>%</span>
                                            <?php } else {?>
                                            <span class="pink"><?php echo $valnew->product_discount;?>%</span>
                                            <?php }?>
                                            
                                        </div>
                                        <div class="product-content text-center">
                                            <h3><a href="<?=base_url('book-product/details/'.$product_string.'?proid='.$product_name.'&cid='.$valnew->catgegory_id)?>"><?php echo $new_arival_product_name[0]->product_name;?></a></h3>
                                            <p><?php echo substr($valnew->product_description, 0, 30).' '.'...';?></p>
                                           
                                            <div class="product-price">
                                                <?php if(isset($_SESSION['seller_font_user_id'])){?>
                                                <span>$ <?php echo $valnew->seller_discount_rate;?></span>
                                                <span class="old">$ <?php echo $valnew->seller_product_rate;?></span>
                                                <?php } else {?>
                                                <span>$ <?php echo $valnew->product_discount_rate;?></span>
                                                <span class="old">$ <?php echo $valnew->sel_product_rate;?></span>
                                                <?php }?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
            
            <?php 
            
       } }else {
            
            $query="select * from tbl_product order by product_discount_rate desc";
            $request = $this->om->customQuery($query);
            
            foreach($request as $valnew)
                            {
                             
                            $product_name=$valnew->product_name;
                            $this->db->where('id', $product_name);
                            $new_arival_product_name=$this->db->get('tbl_byuerproduct')->result();
                            
                        $productname=$new_arival_product_name[0]->product_name;
                        $product_name_re = str_replace(' ', '', $productname);
                        $product_string = preg_replace('/[^A-Za-z0-9\-]/', '-', $product_name_re);
                        ?>
                        
                       <div class="col-xl-4 col-md-6 col-lg-6 col-sm-6">
                                    <div class="product-wrap mb-25 scroll-zoom">
                                        <div class="product-img">
                                            <a href="<?=base_url('book-product/details/'.$product_string.'?proid='.$product_name.'&cid='.$valnew->catgegory_id)?>">
                                    <?php
                                    
                                    //$this->db->limit(2);
                                    $this->db->where('product_id', $valnew->id);
                                    $product_image=$this->db->get('tbl_productimage')->result();
                                    $x=1;
                                    foreach($product_image as $valimage){
                                        $product_image=trim($valimage->product_image,",");
                                        if($x==1){
                                            $de="default";
                                        }else {
                                            $de="hover";
                                        }
                                    ?>
                                    <img class="<?php echo $de;?>-img" src="<?=base_url('webroot/adminImages/product_image/'.$product_image.'')?>" alt="">
                                    
                                    
                                    <?php 
                                    $x++;
                                     }?>
                                </a>
                                            <span class="pink">-<?php echo $valnew->product_discount;?>%</span>
                                            
                                        </div>
                                        <div class="product-content text-center">
                                            <h3><a href="<?=base_url('book-product/details/'.$product_string.'?proid='.$product_name.'&cid='.$valnew->catgegory_id)?>"><?php echo $new_arival_product_name[0]->product_name;?></a></h3>
                                            <p><?php echo substr($valnew->product_description, 0, 30).' '.'...';?></p>
                                           
                                            <div class="product-price">
                                                <span>$ <?php echo $valnew->product_discount_rate;?></span>
                                                <span class="old">$ <?php echo $valnew->sel_product_rate;?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
            
            
       <?php      
        }
        }
        
    }


public function download_pdf()
{
    
    $this->db->where('order_id', "36");
    $order_details=$this->db->get('tbl_order')->result();
    $this->data['product_resutl']=$order_details;
    $this->data['page_title']='Respitech | pdf';
	$this->data['subview']='profile/pdf';
    $this->load->view('user/layout/default', $this->data);
}

public function download_invoice()
{
   
    $order_id=$this->input->post('order_id');
    $this->db->where('order_id', $order_id);
    $order_details=$this->db->get('tbl_order')->result();
    $this->data['product_resutl']=$order_details;
    $this->data['page_title']='Respitech | pdf';
	$this->data['subview']='profile/pdf';
    $this->load->view('user/layout/default', $this->data);
  
}


public function seller_login()
{
    
             $this->data['page_title']='Respitech | Seller Login';
    		 $this->data['subview']='profile/seller_login';
    		 $this->load->view('user/layout/default', $this->data);
}

public function seller_register()
{
             $this->data['page_title']='Respitech | Seller Register';
    		 $this->data['subview']='profile/seller_register';
    		 $this->load->view('user/layout/default', $this->data);
}



public function add_register_seller()
{
       $user_name=$this->input->post('user_name');
       $user_mobile=$this->input->post('user_mobile');
       $user_email=$this->input->post('user_email');
       $user_password=$this->input->post('user_password');
       
       $pass=md5($user_password);
            $where1=array("mobile_no"=>$user_mobile);
		    $data=$this->om->row_count('tbl_seller',$where1);
	    
	    if($data>0)
	    {
	        echo 1;
	        exit();
	        
	    } 
	    
	        $where=array("email"=>$user_email);
		    $data=$this->om->row_count('tbl_seller',$where);
	    
	    if($data>0)
	    {
	        echo 2;
	        exit();
	        
	    } 
       
       $status="Active";
       $data_array=array("name"=>$user_name,"mobile_no"=>$user_mobile,"email"=>$user_email,"password"=>$pass,"status"=>$status);
       $this->om->insert('tbl_seller',$data_array);
       
            $where=array("email"=>$user_email);
		    $data=$this->om->select_all_where('tbl_seller',$where);
	        $id=$data[0]->id;
            $email=$data[0]->email;
            $name=$data[0]->name;
            $mobile_no=$data[0]->mobile_no;
	        $this->session->set_userdata(array(
                                              'seller_font_user_id'  => $id,
                                              'seller_email' => $email,
                                              'seller_name' => $name,
                                              'seller_mobile' => $mobile_no));
       
       
       echo 3;
       
}



public function login_seller()
{
    
       $user_name=$this->input->post('user_name');
       $user_password=$this->input->post('user_password');
       $password=md5($user_password);
       $status="Active";
       
                        $where=array("email"=>$user_name);
                        $where1=array("password"=>$password);
                        $where2=array("status"=>$status);
						if($data=$this->om->login123('tbl_seller',$where,$where1,$where2))
                        {
                            $id=$data[0]['id'];
                            $email=$data[0]['email'];
                            $name=$data[0]['name'];
                            $mobile_no=$data[0]['mobile_no'];
                            
                            $this->session->set_userdata(array(
                                                                 'seller_font_user_id'  => $id,
                                                                 'seller_email' => $email,
                                                                 'seller_name' => $name,
                                                                 'seller_mobile' => $mobile_no));
                            
                            echo "1";
                        } else {
                           echo "2";
                        }
       
       
       
       
}



public function seller_logout()
	{
                        //$this->session->sess_destroy();
                        /*$font_user_id=$this->session->userdata('font_user_id');
                        $user_email=$this->session->userdata('user_email');*/
                        $this->session->unset_userdata('seller_font_user_id');
                        $this->session->unset_userdata('seller_email');
                        $this->session->unset_userdata('seller_name');
                        $this->session->unset_userdata('seller_mobile');
                        redirect('home/');
	}
	
	
	public function seller_addcart()
	{
	    $product_id=$this->input->post('product_id');
	    $quentity=$this->input->post('quentity');
	    $seller_id=$_SESSION['seller_font_user_id'];
	    
	    $this->db->where('product_id', $product_id);
	    $this->db->where('seller_id', $seller_id);
        $serller_cart_product_count=$this->db->get('tbl_cart')->num_rows();
        if($serller_cart_product_count>0)
        {
        $this->db->where('product_id', $product_id);
	    $this->db->where('seller_id', $seller_id);
        $serller_cart_product_count=$this->db->get('tbl_cart')->result();
        $quentity1=$serller_cart_product_count[0]->quentity;
        $card_id=$serller_cart_product_count[0]->id;
        
        
                $stock_quentity=$quentity1 + $quentity;
			    $where3=array("id"=>$card_id);
		        $data_array12=array("quentity"=>$stock_quentity);
                $result=$this->om->update('tbl_cart',$data_array12,$where3);
        
        echo 1;
        
        }else {
	    $data_array=array("product_id"=>$product_id,"quentity"=>$quentity,"seller_id"=>$seller_id);
        $this->om->insert('tbl_cart',$data_array);
        echo 1;
        }
	    
	}
	
	public function account_delete()
	{
	    $user_name=$_POST['user_name'];
	    $this->db->where('mobile_no', $user_name);
        $mobile_check=$this->db->get('tbl_users')->num_rows();
        
	    if($mobile_check>0)
	    {
	      
	         $where=array("mobile_no"=>$user_name);
			 $this->om->delete('tbl_users',$where);
			 echo "1";
	   }
	    else {
	        echo "2";
	    }
	    
	    
	}




public function check_email()
    {
        
        $this->load->library('email');

        // Email configuration
        $config['protocol']    = 'smtp';
        $config['smtp_host']   = 'smtp.gmail.com';
        $config['smtp_port']   = 465;
        $config['smtp_user']   = 'swapan.kanrar143@gmail.com';
        $config['smtp_pass']   = 'fgkajlclehkdmzhx';
        $config['mailtype']    = 'html';
        $config['charset']     = 'iso-8859-1';
        $config['wordwrap']    = TRUE;

        // Initialize the email configuration
        $this->email->initialize($config);

        // Compose email
        $this->email->from('yswapan.kanrar143@gmail.com', 'Your Name');
        $this->email->to('swapan.kanrar143@gmail.com');
        $this->email->subject('Email Test');
        $this->email->message('Testing the email class.');

        // Send email
        if ($this->email->send()) {
            echo 'Your email was sent successfully.';
        } else {
            show_error($this->email->print_debugger());
        }
        
        /*$msg = "First line of text\nSecond line of text";

        // use wordwrap() if lines are longer than 70 characters
        $msg = wordwrap($msg,70);
        
        // send email
        mail("swapan.kanrar143@gmail.com","My subject",$msg);*/

        /*$email="swapan.kanrar143@gmail.com";
        $config = Array(
            'protocol' => 'smtp',
            'mailtype' => 'html', 
            'charset' => 'utf-8',
            'wordwrap' => TRUE

        );
        $this->load->library('email', $config);
        //$from=$this->settings->from_email;
        $from='swapan.kanrar143@gmail.com';
        //$from_name=$this->settings->from_name;
        $from_name='Respitech';
        $to_email=$email;
        $subject='Respitech : Reset password';
        $message='<p>Dear Swapan Kanrar</p><p> You have successfully changed your password. <br> Your new password is: 12345 </p><p>Warm Regards <br>Respitech</p> <p><span style="color:red">This is an automated response. Please do not directly reply to this email.</span></p>';
        //echo $message;exit;
        email_send();
        $this->email->from($from, $from_name);
        $this->email->to($to_email);
        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->send();*/
    }

    public function cpap()   
	{
		
       
        
		 $this->data['page_title']='Respitech | OSA';
		 $this->data['subview']='home/cpap';
		
		 $this->load->view('user/layout/default',$this->data);
	}


    public function bi_pap()   
	{
		
        $category=$this->db->get('tbl_category')->result();
        $this->data['main_menu']=$category;

        
		 $this->data['page_title']='Respitech | COPD';
		 $this->data['subview']='home/bi_pap';
		
		 $this->load->view('user/layout/default', $this->data);
	}

    public function osaBookForSleepTest()
    {
    
        $states=$this->db->get('states')->result();
        $this->data['states']=$states;
        $this->data['page_title']='Respitech | Sleep Test';
        $this->data['subview']='home/osa_sleep_test';
        $this->load->view('user/layout/default', $this->data);
    }

    public function copdBookForSleepTest()
    {
    
        $this->data['page_title']='Respitech | Sleep Test';
        $this->data['subview']='home/copd_sleep_test';
        $this->load->view('user/layout/default', $this->data);
    }

    public function osaBookForSleepTestSubmit()
    {
        if($_POST)
		{
			$name=trim($this->input->post('name'));
			$patient_name=trim($this->input->post('patient_name'));
			$gender=trim($this->input->post('gender'));
			$dob=trim($this->input->post('dob'));
			$mobile=trim($this->input->post('mobile'));
			$email=trim($this->input->post('email'));
			$reffered_form=trim($this->input->post('reffered_form'));
			$land_mark=trim($this->input->post('land_mark'));
			$time_preference=trim($this->input->post('time_preference'));
			$state=trim($this->input->post('state'));
			$city=trim($this->input->post('city'));
			$address=trim($this->input->post('address'));
			$images_name="";
	       

            if(!empty($_FILES['item_image_banner']['name']))
            {
                
                $uploads_dir = "webroot/UserImages/osaSleepTest";
                $tmp_name = $_FILES["item_image_banner"]["tmp_name"];
                $pname =rand().$_FILES["item_image_banner"]["name"];     
                move_uploaded_file($tmp_name, "$uploads_dir/$pname");
                $images_name =$pname;
                                
            }
    
            $data=array(
                'name' => $name,
                'patient_name' => $patient_name,
                'gender' => $gender,
                'dob' => $dob,
                'mobile' => $mobile,
                'email' => $email,
                'reffered_form' => $reffered_form,
                'land_mark' => $land_mark,
                'time_preference' => $time_preference,
                'address' => $address,
                'state' => $state,
                'city' => $city,
                'images' => $images_name,
                'date' => Date('d-m-Y'),
            );			
            $this->db->insert('tbl_osa_sleep_test', $data);
            $this->session->set_flashdata('success', 'Sleep Test added successfully.');	
            redirect('/');
    		
			
		}
    }

    public function getCategory()
    {
		$this->db->order_by('id', 'asc');
		$category_data=$this->db->get('tbl_category')->result();		

		echo '<div class="form-group">
                    <label>Category<span class="desc_text" style="color: red;">*</span></label>
                    <select name="category" id="category" class="form-control validate[required]" data-errormessage-value-missing="Category is required" onchange="select_category()">
                    <option value="">Select Category Name</option>';		
                    foreach ($category_data as $key => $value) 
                    {
                        echo "<option value=".$value->id.">".$value->category_name."</option>";			
                    }
        echo '</select></div>';
    }

    public function getCategoryProduct()
    {
        $cat_uniqcode=$this->input->post('cat_uniqcode');
        $this->db->where('catgegory_id', $cat_uniqcode);
		$this->db->order_by('id', 'asc');
		$category_data=$this->db->get('tbl_product')->result();	
      

		echo '<div class="form-group">
                    <label>Product<span class="desc_text" style="color: red;">*</span></label>
                    <select name="product" id="product" class="form-control validate[required]" data-errormessage-value-missing="Product is required">
                    <option value="">Select Product Name</option>';		
                    foreach ($category_data as $key => $value) 
                    {
                        echo "<option value=".$value->id.">".$value->product_name."</option>";			
                    }
        echo '</select></div>';
    }

    public function copdBookForSleepTestSubmit()
    {
        if($_POST)
		{
			$name=trim($this->input->post('name'));
			$patient_name=trim($this->input->post('patient_name'));
			$gender=trim($this->input->post('gender'));
			$dob=trim($this->input->post('dob'));
			$mobile=trim($this->input->post('mobile'));
			$consultation=trim($this->input->post('consultation'));
			$category_id=trim($this->input->post('category'));
			$product_id=trim($this->input->post('product'));
			$address=trim($this->input->post('address'));
			$images_name="";
	       

            if(!empty($_FILES['item_image_banner']['name']))
            {
                
                $uploads_dir = "webroot/UserImages/Consultancy";
                $tmp_name = $_FILES["item_image_banner"]["tmp_name"];
                $pname =rand().$_FILES["item_image_banner"]["name"];     
                move_uploaded_file($tmp_name, "$uploads_dir/$pname");
                $images_name =$pname;
                                
            }

            $this->db->where('id', $category_id);
            $cat_data=$this->db->get('tbl_category')->row();
            $this->db->where('id', $product_id);
            $pro_data=$this->db->get('tbl_product')->row();
    
            $data=array(
                'name' => $name,
                'patient_name' => $patient_name,
                'gender' => $gender,
                'dob' => $dob,
                'mobile' => $mobile,
                'consultation' => $consultation,
                'category_id' => @$category_id,
                'category_name' => @$cat_data->category_name,
                'product_id' => $product_id,
                'product_name' => @$pro_data->product_name,
                'images' => $images_name,
                'date' => Date('d-m-Y'),
            );			
            $this->db->insert('tbl_copd_consultancy', $data);
            $this->session->set_flashdata('success', 'Consultancy Required Form added successfully.');	
            redirect('/');
    		
			
		}
    }


}
