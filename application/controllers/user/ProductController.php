<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductController extends CI_Controller {
    
     
    public function __construct()
    {
        parent::__construct();      
        $this->load->helper(array('common_helper', 'string', 'form', 'security'));
        $this->load->library(array('form_validation', 'email'));
        $this->load->model('Others_model','om');
        //$this->load->model('Category/Category_Model');
        $this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
        if(($this->session->userdata('adminDetails')==NULL)){
           return redirect('/');
        }
        
    }


    public function add_product()
    {
        

        /*$where=array('status'=>"Active");
        $this->data['brand_name']=$this->om->select_all_where('tbl_brand',$where);*/
        
        $this->data['page_title']='Ustav | product';
        $this->data['subview']='crm/addproduct';
        $this->load->view('admin/layout/default', $this->data);
    }


public function purchase_product()
{
    echo "hello";
}

    public function product_add()
    {

        $prounique_id=$this->input->post('prounique_id');
        $product_brand=$this->input->post('product_brand');
        $product_name=$this->input->post('product_name');

        $product_discount=$this->input->post('product_discount');
        $product_sub_code=$this->input->post('product_sub_code');


        $product_type=$this->input->post('product_type');
        $product_colour=$this->input->post('product_colour');
        $product_hsn=$this->input->post('product_hsn');

        
        $date=date("Y-m-d");
        $unicode=random_string('alnum',30);
        $data_array=array("uniqcode"=>$unicode,"brand_id"=>$product_brand,"product_name"=>$product_name,"pro_code"=>$prounique_id,"status"=>"Active","date"=>$date);
        $this->om->insert('tbl_product',$data_array);

        
        $this->db->order_by('id', 'desc');
        $this->db->limit(1);
        $last_product_id=$this->db->get('tbl_product')->result();
        foreach ($last_product_id as $value) {
          $last_id=$value->uniqcode;
        }



        $product_size=$this->input->post('product_size');
        $product_rate=$this->input->post('product_rate');
        $product_retail_rate=$this->input->post('product_retail_rate');
        $product_distri_rate=$this->input->post('product_distri_rate');
        $product_stock_alert=$this->input->post('product_stock_alert');

        foreach ($product_size as $key => $value) {
$unicode1=random_string('alnum',31);
            $data_array1=array("uniqcode"=>$unicode1,"product_id"=>$last_id,"size_name"=>$product_size[$key],"rate"=>$product_rate[$key],"retalier_price"=>$product_retail_rate[$key],"distributor_price"=>$product_distri_rate[$key],"stock_alert"=>$product_stock_alert[$key],"prodcut_code"=>$product_sub_code[$key],"discount"=>$product_discount[$key]
        ,"product_type"=>$product_type[$key],"product_colour"=>$product_colour[$key]
    ,"product_hsn"=>$product_hsn[$key]);
        $this->om->insert('tbl_product_size',$data_array1);
           
        }

        echo 1;
        /*$where=array('status'=>"Active");
        $this->data['brand_name']=$this->om->select_all_where('tbl_brand',$where);*/
        
        
    }

    public function show_product()
    {

        $where=array('status'=>"Active");
        $this->data['product']=$this->om->select_all_where('tbl_product',$where);
        
        $this->data['page_title']='crm | show product';
        $this->data['subview']='crm/showproduct';
        $this->load->view('admin/layout/default', $this->data);

    }


    public function monthely_account()
    {

        $this->data['page_title']='crm | show account';
        $this->data['subview']='crm/monthely_account';
        $this->load->view('admin/layout/default', $this->data);

    }

    public function sell_perday()
    {

        $this->data['page_title']='crm | Every Day Sell Account';
        $this->data['subview']='crm/perday_sell_account';
        $this->load->view('admin/layout/default', $this->data);

    }


    public function monthly_report()
    {

        $this->data['page_title']='crm | Every Day Sell Account';
        $this->data['subview']='crm/monthely_report';
        $this->load->view('admin/layout/default', $this->data);

    }

    public function select_bran()
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



public function add_stock()
    {
     
        $this->db->where('status', 'Active');
        $stock_entry_data=$this->db->get('tbl_brand')->result();
        
        $this->db->order_by("id", "asce");
        $size_show=$this->db->get('tbl_size')->result();
        
        $this->db->order_by("id", "DESC");
        $stock_data=$this->db->get('tbl_productstock')->result();

        $this->data['stock_entry_data']=$stock_entry_data;  
        $this->data['show_size']=$size_show;
        $this->data['show_stock']=$stock_data;
        $this->data['page_title']='Utsav | Add Product Stock';
        $this->data['subview']='stock_entry/addstock';
        $this->load->view('admin/layout/default', $this->data);
    }
    
    public function stock_edit($id)
    {
        $this->db->select('tbl_productstock.quentity,tbl_productstock.product_code,tbl_size.size,tbl_productstock.id,tbl_productstock.product_id,tbl_productstock.brand_id');
        $this->db->from('tbl_productstock');
        $this->db->join('tbl_size','tbl_size.uniqcode = tbl_productstock.product_id','inner');
        $this->db->where('tbl_productstock.id',$id);
        $product_data=$this->db->get()->row();
        $brand_id=$product_data->brand_id;
        $this->data['product_data']=$product_data;
        
        $this->db->where('brand_id',$brand_id);
        $size_show=$this->db->get('tbl_size')->result();
        $this->data['show_size']=$size_show;

        $this->db->where('status','Active');
        $brand_data=$this->db->get('tbl_brand')->result();
        $this->data['brand_data']=$brand_data;


        
        $this->data['page_title']='Utsav | Product Stock Edit';
        $this->data['subview']='stock_entry/stock_edit';
        $this->load->view('admin/layout/default', $this->data);

    }
    
    public function stock_updated()
    {
        if($_POST)
		{
            $stock_id=$this->input->post('stock_id');
		    $brand_name=$this->input->post('brand_name');
		    $prodduct_size=$this->input->post('prodduct_size');
		    $product_code=$this->input->post('product_code');
		    $product_quty=$this->input->post('product_quty');
		    $old_qty=$this->input->post('old_qty');
		    
		    $data=array(
                'brand_id' => $brand_name,
				'product_id' => $prodduct_size,
				'product_code' => $product_code,
				'quentity' => $product_quty,   
				'date' => date('Y-m-d')	
			);
// 			pr($data); die;
			$this->db->where('id', $stock_id);
			$update=$this->db->update('tbl_productstock', $data);
// 			pr($update); die;
			if($update == 1)
			{
			    $count=$this->om->entty_check(['product_id'=>$prodduct_size],'tbl_total_stock');
			    if($count)
			    {
			        $total_stock = $this->om->toal_stock_data($prodduct_size);
			        $old_total_quantity=$total_stock->quentity;
					$total_qua=$old_total_quantity - ($old_qty - $product_quty);
					
					$total_stock_data=array(
								'quentity'=>$total_qua,
							);
							$this->db->where('product_id', $prodduct_size);
							$update1=$this->db->update('tbl_total_stock', $total_stock_data);
							
							$this->session->set_flashdata('success', 'Stock Entry update successfully.');
							redirect('admin/stock-add');
			    }
			}
			
		    
		    
		}
    }




    public function product_total_stock()
    {
     
        $this->db->order_by("id", "desc");
        $stock_total_show=$this->db->get('tbl_total_stock')->result();

   
        $this->data['show_total_stock']=$stock_total_show;
        $this->data['page_title']='crm | Add Product Stock';
        $this->data['subview']='stock_entry/totalstock';
        $this->load->view('admin/layout/default', $this->data);
    }


    public function product_return_stock()
    {
        

        //$this->db->group_by("size_id");
        $stock_total_show=$this->db->get('tbl_order_return')->result();
        
        $this->data['show_total_stock']=$stock_total_show;
        $this->data['page_title']='crm | Return Product Stock';
        $this->data['subview']='crm/return_product_stock';
        $this->load->view('admin/layout/default', $this->data);
    }


   








    public function selller_customer()
    {
      
        $this->db->order_by("id", "desc");
        $this->db->where('status', 'Active');
        $this->db->where('type', 'Seller');
        $show_seller_customer=$this->db->get('tbl_shop')->result();

        $this->data['show_customer']=$show_seller_customer;
        $this->data['page_title']='crm | Seller Customer';
        $this->data['subview']='crm/seller_customer';
        $this->load->view('admin/layout/default', $this->data);
    }


    /*public function distributor_customer()
    {
      
        $this->db->order_by("id", "desc");
        $this->db->where('status', 'Active');
        $this->db->where('type', 'distributor');
        $show_seller_customer=$this->db->get('tbl_shop')->result();

        $this->data['show_customer']=$show_seller_customer;
        $this->data['page_title']='crm | distributor Customer';
        $this->data['subview']='crm/distributor_customer';
        $this->load->view('admin/layout/default', $this->data);
    }*/
    
    public function distributor_customer()
    {
      
        $this->db->order_by("id", "desc");
        $this->db->where('status<>', 'Delete');
        $this->db->where('type', 'distributor');
        $show_seller_customer=$this->db->get('tbl_shop')->result();

        $this->data['show_customer']=$show_seller_customer;
        $this->data['page_title']='crm | distributor Customer';
        $this->data['subview']='crm/distributor_customer';
        $this->load->view('admin/layout/default', $this->data);
    }
    
    
    public function edit_data($uniqcode)
    {
        $this->db->where('uniqcode', $uniqcode);
        $this->db->where('status', 'Active');
        $distributor_data=$this->db->get('tbl_shop')->row();

        $this->data['distributor_data']=$distributor_data;
        $this->data['page_title']='CRM | Distributor Customer Edit ';
        $this->data['subview']='crm/distributor_customer_edit';
        $this->load->view('admin/layout/default', $this->data);
    }
    
    
    public function distributor_update()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('distributor_name', 'Distributor name', 'required');
        $this->form_validation->set_rules('mobile_no', 'mobile no', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        if ($this->form_validation->run())
        {
                $uniqcode=$this->input->post('uniqcode');
                $distributor_name=$this->input->post('distributor_name');
                $mobile_no=$this->input->post('mobile_no');
                $address=$this->input->post('address');
                $password=$this->input->post('password');

                $this->db->where('status <>', 'Delete');
                $this->db->where('mobile', $mobile_no);
                $this->db->where('uniqcode <>', $uniqcode);
                $category_row=$this->db->get('tbl_shop')->row();
               
                if(empty($category_row))
                {
                        $data=array(
                        'name'=> $distributor_name,
                        'mobile'=> $mobile_no,
                        'address'=> $address
                    );
                    if(!empty($password))
                    {
                       $data['password'] =md5($password);
                    }
                    $this->db->where('uniqcode', $uniqcode);
                    $update=$this->db->update('tbl_shop', $data);
                    $this->session->set_flashdata('success', 'Distributor customer update successfully.');
                    redirect('admin/distributor-customer');
                }
            else
            {
                $this->session->set_flashdata('error', 'Phone no already exists!.');
                redirect('admin/distributor-customer');
            }
        }
        else
        {
            $this->session->set_flashdata('error', 'Please fill in all the files!');
            redirect('admin/distributor-customer');
        }
    }
    
    
    public function status_distributor_customer()
    {       
        $uniqcode=$this->input->post('uniqcode');        
        $this->db->where('status <>', 'Delete');
        $this->db->where('uniqcode', $uniqcode);
        $get_data=$this->db->get('tbl_shop')->row();

        if($get_data->status=='Active'){
            $data=array(
                'status'=>'Inactive',
            );
        }elseif($get_data->status=='Inactive'){
            $data=array(
                'status'=>'Active',
            );
        }
        $this->db->where('uniqcode', $uniqcode);        
        $this->db->update('tbl_shop', $data);      
    }
    
    




    public function stock_add()
    {
        $brand_id=$this->input->post('brand_id');
        $this->db->where('brand_id', $brand_id);
        $this->db->where('status', 'Active');
        $stock_entry_data=$this->db->get('tbl_product')->result();
        ?>
        <option>Select Product</option>
        <?php 
        foreach ($stock_entry_data as $value) {?>
            
            <option value="<?php echo $value->uniqcode;?>"><?php echo $value->product_name;?></option>
           <?php  
        }

    }


public function distributor_add()
    {
      
        $distributor_name=$this->input->post('distributor_name');
        $mobile_no=$this->input->post('mobile_no');
        $address=$this->input->post('address');
        $password=$this->input->post('password');
        $pass=md5($password);

        $unicode=random_string('alnum',33);
        $date=date("Y-m-d");
        $data_array=array("uniqcode"=>$unicode,"name"=>$distributor_name,"address"=>$address,"mobile"=>$mobile_no,"date"=>$date,"status"=>'Active',"type"=>'Distributor',"password"=>$pass);
        $this->om->insert('tbl_shop',$data_array);
        echo 1;

    }


    public function product_size_show()
    {
        $product_id=$this->input->post('product_id');
        $this->db->where('product_id', $product_id);
        
        $stock_entry_data=$this->db->get('tbl_product_size')->result();
        ?>
        <option>Select Product Size</option>
        <?php 
        foreach ($stock_entry_data as $value) {?>
            
        <option value="<?php echo $value->uniqcode;?>"><?php echo $value->size_name;?></option>
           <?php  
        }
    }


    
    
    
    public function product_code_show()
    {
     $size_id=$this->input->post('size_id');
     
     $this->db->where('uniqcode', $size_id);
     $product_size_code=$this->db->get('tbl_size')->result();
     echo $product_size_code[0]->code;
    }


    public function retailer_order()
    {

        $this->db->group_by('order_code');

        $this->db->where('status', "Seller");
        //$this->db->order_by("id", "asc");
        $order=$this->db->get('tbl_order')->result();
        
        $this->data['order_data']=$order;

        $this->data['page_title']='Crm | Retailer Order';
        $this->data['subview']='crm/retailerorder';
        $this->load->view('admin/layout/default', $this->data);
    }


    public function everyday_retailer_order()
    {
        $date=date("Y-m-d");
        $this->db->group_by('order_code');
        $this->db->where('order_date', $date);
        $this->db->where('status', "Seller");
        //$this->db->order_by("id", "asc");
        $order=$this->db->get('tbl_order')->result();
        
        $this->data['order_data']=$order;

        $this->data['page_title']='Crm | Retailer Order';
        $this->data['subview']='crm/every_dayretailerorder';
        $this->load->view('admin/layout/default', $this->data);
    }



    public function retailerr_return()
    {

        $this->db->group_by('order_code');

        $this->db->where('type', "Seller");
        //$this->db->order_by("id", "asc");
        $order_return=$this->db->get('tbl_order_return')->result();
        


        $this->data['order_data']=$order_return;

        $this->data['page_title']='Crm | Retailer Product Return';
        $this->data['subview']='crm/retailerorderreturn';
        $this->load->view('admin/layout/default', $this->data);
    }

    public function bill_order($uniqcode)
    {
        $order_id="#".$uniqcode;
        
        $where=array('order_code'=>$order_id);
        $this->data['order_details']=$this->om->select_all_where('tbl_order',$where);

        $this->data['page_title']='Crm | Order Bill';
        $this->data['subview']='crm/order_bill';
        $this->load->view('admin/layout/default', $this->data);
    }


    public function return_bill_order($uniqcode)
    {
        $order_id="#".$uniqcode;
        $where=array('order_code'=>$order_id);
        $this->data['order_details']=$this->om->select_all_where('tbl_order_return',$where);
        $this->data['page_title']='Crm | Return Order Bill';
        $this->data['subview']='crm/return_order_bill';
        $this->load->view('admin/layout/default', $this->data);
    }


    public function product_stock_add()
    {
        include('libs/phpqrcode/qrlib.php');
        
        $brand_name=$this->input->post('brand_name');
        $prodduct_size=$this->input->post('prodduct_size');
        $product_code=$this->input->post('product_code');
        $product_quty=$this->input->post('product_quty');
        $date=date("Y-m-d");
        
        $this->db->where('uniqcode', $prodduct_size);
        $product_size=$this->db->get('tbl_size')->result();
        $size_name=$product_size[0]->size;

        $this->db->where('uniqcode', $brand_name);
        $brand=$this->db->get('tbl_brand')->result();
        $brand_name123=$brand[0]->brand_name;
        
        $this->db->where('product_id',$prodduct_size);
        $this->db->limit(1);
        $this->db->order_by('id','DESC');
        $query = $this->db->get('tbl_productstock');
        if(!empty($query))
			{
				$total_stock_update=array(
					'check_data' => 'No'
					);
				$this->db->where('product_id', $prodduct_size);
				$update=$this->db->update('tbl_productstock', $total_stock_update);
			}
        
        $data_array=array("brand_id"=>$brand_name,"product_id"=>$prodduct_size,"quentity"=>$product_quty,"product_code"=>$product_code,"date"=>$date,"check_data"=>'Yes');
        
        $this->om->insert('tbl_productstock',$data_array);

        $this->db->where('product_id', $prodduct_size);
        $stock_check=$this->db->get('tbl_total_stock')->num_rows();
       if($stock_check>0)
       {
        $this->db->where('product_id', $prodduct_size);
        
        $stock_check12=$this->db->get('tbl_total_stock')->result();
        foreach ($stock_check12 as $value) {
          $total_stock_id=$value->id;
          $stock=$value->quentity;
        }
        $gross_stock=$stock+$product_quty;
        $where=array("id"=>$total_stock_id);
                    $data_array12=array("quentity"=>$gross_stock);
                    $result=$this->om->update('tbl_total_stock',$data_array12,$where);
                    echo "1";
       }else {
           
    $tempDir = 'webroot/adminImages/qrcode/'; 
	$email = $product_code;
	$subject =  $brand_name123."Water -".$size_name;
	//$filename = getUsernameFromEmail($email);
	$filename=$email;
	$body =  "Kolkata";
	$codeContents = 'mailto:'.$email.'?subject='.urlencode($subject).'&body='.urlencode($body);
	QRcode::png($codeContents, $tempDir.''.$filename.'.png', QR_ECLEVEL_L, 5);
           

        $unicode=random_string('alnum',31);
        $data_array=array("brand_id"=>$brand_name,"product_id"=>$prodduct_size,"quentity"=>$product_quty,"product_code"=>$product_code,"qrcode"=>$filename.'.png');
        $this->om->insert('tbl_total_stock',$data_array);
        echo "1";
       
       }

    }



    public function add_brand()
    {

            $brand_name=$this->input->post('brand_name');

            //$unicode=random_string('alnum',30);
            
        $data_array=array("brand_name"=>$brand_name,"status"=>"Active");
       
        if ($this->om->insert('tbl_brand',$data_array)===true) {


                $this->session->set_flashdata('success', 'Brand created  successfully.');   
                redirect('admin/brand');
            }else{
                $this->session->set_flashdata('error', 'Package name already exists!.');    
                redirect('admin/brand');
            }

        }


        public function designation_edit($uniqcode)
    {
        
        $where=array('uniqcode'=>$uniqcode);
        $this->data['designation_name_one']=$this->om->select_all_where('tbl_designation',$where);
        
        $where1232=array('status'=>"Active");
        $this->data['designation_name']=$this->om->select_all_where('tbl_designation',$where1232);


        $this->data['page_title']='Houmen Resource | Designation Edit';
        $this->data['subview']='humen_resource/edit_designation';
        $this->load->view('admin/layout/default', $this->data);
    }


     public function update_designation()
    {
        
        
        $designation_name=$this->input->post('designation_name');
        $designation_id=$this->input->post('designation_id');

        $where=array('uniqcode'=>$designation_id);

        $data_array=array("designation_name"=>$designation_name);
        
        $result=$this->om->update('tbl_designation',$data_array,$where);


        /*$this->data['page_title']='Houmen Resource | Designation Edit';
        $this->data['subview']='humen_resource/edit_designation';
        $this->load->view('admin/layout/default', $this->data);*/

        $this->session->set_flashdata('success', 'Designation update successfully.');
        redirect('admin/designation');

    }

    public function designation_destroy($uniqcode)
    {
        $data=array(
        'status'=>'Delete',
        'datetime'=>date('Y-m-d H:i:s'),
        );
      $this->db->where('uniqcode', $uniqcode);
      $this->db->update('tbl_designation', $data);
      $this->session->set_flashdata('success', 'Designation deleted successfully');                     
      redirect('admin/designation');
    }



    



                            
                            

        /*$this->load->library('form_validation');
        $this->form_validation->set_rules('package_name', 'package name', 'required');
        $this->form_validation->set_rules('destination', 'destination', 'required');
        $this->form_validation->set_rules('rate', 'Rate', 'required');
        $this->form_validation->set_rules('day', 'Day', 'required');
        $this->form_validation->set_rules('from_date', 'From Date', 'required');
        $this->form_validation->set_rules('to_date', 'To date', 'required');
            if ($this->form_validation->run())
            {
                $package_name=$this->input->post('package_name');
                $destination=$this->input->post('destination');
                $rate=$this->input->post('rate');
                $day=$this->input->post('day');
                $from_date=$this->input->post('from_date');
                $to_date=$this->input->post('to_date');
                $time=$this->input->post('time');
                $detalish=$this->input->post('detalish');
                $data=array(
                'uniqcode' => random_string('alnum',30),
                'package_name'=> $package_name,
                'destination'=> $destination,
                'rate'=> $rate,
                'day'=> $day,
                'start_date'=> $from_date,
                'end_date'=> $to_date,
                'time'=> $time,
                'detalish'=> $detalish,
                'datetime' => date('Y-m-d h:i:s')
                );
            $this->db->where('package_name', $package_name);
            $query = $this->db->get('tbl_package_domestic');        
            $count_row = $query->num_rows();
            if($count_row == 0){
                $this->db->insert('tbl_package_domestic', $data);
                $this->session->set_flashdata('success', 'Package domestic added successfully.');   
                redirect('admin/domestic-package');
            }else{
                $this->session->set_flashdata('error', 'Package name already exists!.');    
                redirect('admin/domestic-package');
            }
            
        }
        else{
                $this->session->set_flashdata('error', 'Please fill in all the files!');    
                redirect('admin/domestic-package');
        } */    



   


    public function domestic_package()
    {
        $this->db->where('status <>', 'Delete');
        $this->db->order_by('id', 'desc');
        $package_domestic=$this->db->get('tbl_package_domestic')->result();
        $this->data['package_domestic']=$package_domestic;

        $this->data['page_title']='East West Tourist Hub | Domestic Package';
        $this->data['subview']='package/domestic_package';
        $this->load->view('admin/layout/default', $this->data);
    }


    public function add_domestic_package()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('package_name', 'package name', 'required');
        $this->form_validation->set_rules('destination', 'destination', 'required');
        $this->form_validation->set_rules('rate', 'Rate', 'required');
        $this->form_validation->set_rules('day', 'Day', 'required');
        $this->form_validation->set_rules('from_date', 'From Date', 'required');
        $this->form_validation->set_rules('to_date', 'To date', 'required');
            if ($this->form_validation->run())
            {
                $package_name=$this->input->post('package_name');
                $destination=$this->input->post('destination');
                $rate=$this->input->post('rate');
                $day=$this->input->post('day');
                $from_date=$this->input->post('from_date');
                $to_date=$this->input->post('to_date');
                $time=$this->input->post('time');
                $detalish=$this->input->post('detalish');
                $data=array(
                'uniqcode' => random_string('alnum',30),
                'package_name'=> $package_name,
                'destination'=> $destination,
                'rate'=> $rate,
                'day'=> $day,
                'start_date'=> $from_date,
                'end_date'=> $to_date,
                'time'=> $time,
                'detalish'=> $detalish,
                'datetime' => date('Y-m-d h:i:s')
                );
            $this->db->where('package_name', $package_name);
            $query = $this->db->get('tbl_package_domestic');        
            $count_row = $query->num_rows();
            if($count_row == 0){
                $this->db->insert('tbl_package_domestic', $data);
                $this->session->set_flashdata('success', 'Package domestic added successfully.');   
                redirect('admin/domestic-package');
            }else{
                $this->session->set_flashdata('error', 'Package name already exists!.');    
                redirect('admin/domestic-package');
            }
            
        }
        else{
                $this->session->set_flashdata('error', 'Please fill in all the files!');    
                redirect('admin/domestic-package');
        }       
    }
        
    public function status()
    {       
        $uniqcode=$this->input->post('uniqcode');        
        $this->db->where('status <>', 'Delete');
        $this->db->where('uniqcode', $uniqcode);
        $get_data=$this->db->get('tbl_designation')->row();

        if($get_data->status=='Active'){
            $data=array(
                'status'=>'Inactive',
                'datetime'=>date('Y-m-d H:i:s'),
            );
        }elseif($get_data->status=='Inactive'){
            $data=array(
                'status'=>'Active',
                'datetime'=>date('Y-m-d H:i:s'),
            );
        }
        $this->db->where('uniqcode', $uniqcode);        
        $this->db->update('tbl_designation', $data);      
    }
    public function destroy($uniqcode)
    {
        $data=array(
        'status'=>'Delete',
        'datetime'=>date('Y-m-d H:i:s'),
        );
      $this->db->where('uniqcode', $uniqcode);
      $this->db->update('tbl_package_domestic', $data);
      $this->session->set_flashdata('success', 'Domestic Package deleted successfully');                     
      redirect('admin/domestic-package');
    }

    public function package_details()
    {
        $uniqcode=$this->input->post('transid');
        $this->db->where('status <>', 'Delete');
        $this->db->where('uniqcode', $uniqcode);
        $this->db->order_by('id', 'desc');
        $about_data=$this->db->get('tbl_package_domestic')->result();

        foreach ($about_data as $key => $value) {
            echo '<table class="table table-striped table-bordered table-hover dataTables-example">
            <thead>
                <tr>
                    <th>Package Details</th>
                </tr>
              </thead>
              
              <tbody>
                <tr class="gradeX">
                  <td>
                    <div ">
                        '.$value->detalish.'
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>';
            }
    }

    public function package_edit($uniqcode)
    {
        $this->db->where('status <>', 'Delete');
        $this->db->order_by('id', 'desc');
        $package_domestic=$this->db->get('tbl_package_domestic')->result();
        $this->data['package_domestic']=$package_domestic;

        $this->db->where('status <>', 'Delete');
        $this->db->where('uniqcode', $uniqcode);
        $package_data_row=$this->db->get('tbl_package_domestic')->row();
        $this->data['package_data_row']=$package_data_row;

        $this->data['page_title']='East West Tourist Hub | Domestic Package Edit';
        $this->data['subview']='package/update_package';
        $this->load->view('admin/layout/default', $this->data);
    }

    public function update_package_update()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('package_name', 'package name', 'required');
        $this->form_validation->set_rules('destination', 'destination', 'required');
        $this->form_validation->set_rules('rate', 'Rate', 'required');
        $this->form_validation->set_rules('day', 'Day', 'required');
        $this->form_validation->set_rules('from_date', 'From Date', 'required');
        $this->form_validation->set_rules('to_date', 'To date', 'required');
        if ($this->form_validation->run())
        {
                $uniqcode=$this->input->post('uniqcode');
                $package_name=$this->input->post('package_name');
                $destination=$this->input->post('destination');
                $rate=$this->input->post('rate');
                $day=$this->input->post('day');
                $from_date=$this->input->post('from_date');
                $to_date=$this->input->post('to_date');
                $time=$this->input->post('time');
                $detalish=$this->input->post('detalish');

                $this->db->where('status <>', 'Delete');
                $this->db->where('package_name', $package_name);
                $this->db->where('uniqcode <>', $uniqcode);
                $category_row=$this->db->get('tbl_package_domestic')->row();
               
                if(empty($category_row))
                {
                        $data=array(
                        'package_name'=> $package_name,
                        'destination'=> $destination,
                        'rate'=> $rate,
                        'day'=> $day,
                        'start_date'=> $from_date,
                        'end_date'=> $to_date,
                        'time'=> $time,
                        'detalish'=> $detalish,
                        'datetime' => date('Y-m-d h:i:s')
                    );
                    $this->db->where('uniqcode', $uniqcode);
                    $update=$this->db->update('tbl_package_domestic', $data);
                    $this->session->set_flashdata('success', 'Package domestic update successfully.');
                    redirect('admin/domestic-package');
                }
            else
            {
                $this->session->set_flashdata('error', 'Package name already exists!.');
                redirect('admin/domestic-package');
            }
        }
        else
        {
            $this->session->set_flashdata('error', 'Please fill in all the files!');
            redirect('admin/domestic-package');
        }
    }


    public function order_search()
    {
        $start_date=$this->input->post('start_date');
        $end_date=$this->input->post('end_date');

        //$sql12="select * from tbl_order where user_id='$shipping_user_id'";
        //$request123 = $this->om->customQuery($sql12);

        

            $this->db->where('status', "Seller");
            $this->db->where('order_date BETWEEN "'. $start_date. '" AND "'. $end_date. '" ');
            $this->db->group_by('order_code');
            $category_row=$this->db->get('tbl_order')->result();
            

            foreach ($category_row as $key => $value) {

                                        $this->db->where('uniqcode', $value->shop_id);
                                        $shop_data=$this->db->get('tbl_shop')->result();


                                        $this->db->where('order_code', $value->order_code);
                                        $order_details_data=$this->db->get('tbl_order')->result();
                                        
                                        
                                        $ex=explode("#", $value->order_code);
                                        $uni_id=$ex[1];


                                        $order_date=$value->order_date;
                                        $ex=explode("-", $order_date);
                                        $year=$ex[0];
                                         $month=$ex[1];
                                          $day=$ex[2];


                                           $monthNum  = $month;
$dateObj   = DateTime::createFromFormat('!m', $monthNum);
$monthName = $dateObj->format('M');

                                        ?>
                                        <tr class="gradeX">
                                        <td><?=$key+1?></td>
                                        <td><?php echo $value->order_code;?></td>
                                        <td><?php echo $shop_data[0]->name;?></td>
                                        <td><?php echo $shop_data[0]->address;?></td>
                                        <td><?php echo $shop_data[0]->mobile;?></td>
                                       
                                        
                                        
                                    
                                        <td><?php
                                        $sum12=0;
                                        $sum=0; 
                                        foreach ($order_details_data as $key => $value12) {
                                           $quantity=$value12->quantity;
                                           $price=$value12->price;
                                           $total=$quantity*$price;
                                           $discount=$value12->discount;
                                           $total_discount=round($total * ($discount/100));
                                           $sum+=$total;
                                           $sum12+=$total_discount;
                                        } 

                                        $gst=round(($sum-$sum12) * (9/100));

                                        echo $sum-$sum12+$gst+$gst;?></td>

                                        <td><?php echo $day.'-'.$monthName.'-'.$year?></td>

                                        <td><?php echo $value->order_status;?></td>
                                        
                                   

                                       
                                        <td>
                                            <a href="<?=base_url('admin/view-order/'.$uni_id)?>">view</a>
                                            
                                            <!--<a href="<?=base_url('admin/designation/destroy/'.$value->id)?>" onclick="return confirm('Are you sure delete this Designation?')"><i class="fa fa-trash action"></i></a>-->
                                        </td>
                                    </tr>


                                    <?php 


                                    }


    }
    
public function return_order_search()
    {

        $start_date=$this->input->post('start_date');
        $end_date=$this->input->post('end_date');

            $this->db->where('type', "Seller");
            $this->db->where('return_date BETWEEN "'. $start_date. '" AND "'. $end_date. '" ');
            $this->db->group_by('order_code');
            $category_row=$this->db->get('tbl_order_return')->result();

            foreach ($category_row as $key => $value) {

                                        $this->db->where('uniqcode', $value->shop_id);
                                        $shop_data=$this->db->get('tbl_shop')->result();


                                    $this->db->where('order_code', $value->order_code);
                                    $order_details_data=$this->db->get('tbl_order_return')->result();


                                    $this->db->where('order_code', $value->order_code);
                                    $order_details_rerturn_data=$this->db->get('tbl_order_return')->result();
                                        
                                        
                                        $ex=explode("#", $value->order_code);
                                        $uni_id=$ex[1];


                                        $order_date=$value->order_date;
                                        $ex=explode("-", $order_date);
                                        $year=$ex[0];
                                        $month=$ex[1];
                                        $day=$ex[2];


                                    $monthNum  = $month;
                                    $dateObj   = DateTime::createFromFormat('!m', $monthNum);
                                    $monthName = $dateObj->format('M');


                                    $return_date=$value->return_date;
                                        $ex=explode("-", $return_date);
                                        $year1=$ex[0];
                                        $month12=$ex[1];
                                        $day1=$ex[2];


                                    $monthNum123  = $month12;
                                    $dateObj   = DateTime::createFromFormat('!m', $monthNum123);
                                    $monthName12 = $dateObj->format('M');


                 
                                       ?>
                                       <tr class="gradeX">
                                        <td><?=$key+1?></td>
                                        <td><?php echo $value->order_code;?></td>
                                        <td><?php echo $shop_data[0]->name;?></td>
                                        <td><?php echo $shop_data[0]->address;?></td>
                                        <td><?php echo $shop_data[0]->mobile;?></td>
                                       
                                        
                                        
                                    
                                        <td><?php
                                        $sum=0;
                                        $sum12=0; 
                                        foreach ($order_details_data as $key => $value12) {
                                           $quantity=$value12->quantity;
                                           $price=$value12->price;
                                           $total=$quantity*$price;

                                           $discount=$value12->product_discount;
                                           $total_discount=round($total * ($discount/100));
                                           $sum+=$total;
                                           $sum12+=$total_discount;

                                        } 

                                        $gst=round(($sum-$sum12) * (9/100));

                                        echo ($sum-$sum12)+$gst+$gst;?></td>

                                        <td><?php echo $day.'-'.$monthName.'-'.$year?></td>

                                        <td><?php
                                        $sum1=0;
                                        $sum4=0; 
                                    foreach ($order_details_rerturn_data as $key => $value123) {
                                           $quantity=$value123->return_quty;
                                           $price=$value123->return_subtotal;
                                           $total123=$quantity*$price;
                                           
                                           $discount=$value123->product_discount;
                                           $total_discount=round($total123 * ($discount/100));
                                           $sum1+=$total_discount;
                                           $sum4+=$total123;

                                           $gst=round(($sum4-$sum1) * (9/100));
                                           
                                        } echo $sum4-$sum1+$gst+$gst;?></td>
                                        <td><?php echo $day1.'-'.$monthName12.'-'.$year1?></td>
                                        
                                   

                                       
                                        <td>
                                            <a href="<?=base_url('admin/view-order-return/'.$uni_id)?>">view</a>
                                            
                                            <!--<a href="<?=base_url('admin/designation/destroy/'.$value->id)?>" onclick="return confirm('Are you sure delete this Designation?')"><i class="fa fa-trash action"></i></a>-->
                                        </td>
                                    </tr>

                                       <?php 
                                   }



    }



    public function report_generate()
    {

        $monthe_name=$this->input->post('monthe_name');
         //echo $this->getIndianCurrency(5000);

        


$date=date("Y-m-d");
$ex=explode("-", $date);
$year=$ex[0];
$month=$monthe_name;
$dateObj   = DateTime::createFromFormat('!m', $month);
$monthName = $dateObj->format('M');

?>

<div class="container-fluid">
    <h2 align="center"><u><b>Monthly Report (<?php echo $monthName.'-'.$year;?>)</b></u></h2>
    <div class="row for-col">
        <div class="col-sm-8" style="border-right: 1px solid; height: 250px;">
            <h2><b>Purchase</b></h2>
            <br>
            <div class="container-fluid">
                <div class="row under-content">
                    <div class="col-sm-3">
                        <h4>Vendor Name</h4>
                        <?php
                        $i=1;
                        $this->db->where('sort_date', $year.'-'.$month);
                        $monthely_sep=$this->db->get('tbl_purchase')->result();
                        foreach ($monthely_sep as $value) {
                            $check_return=$value->qty-$value->return_qty;
                            if($check_return==0)
                            {

                            }else {


                        ?>
                        <p><b>(<?php echo $i;?>).</b> <?php echo $value->shop_name;?></p>
                        <?php $i++;} }?>
                    </div>
                    <div class="col-sm-3">
                        <h4>Product Name</h4>
                        <?php
                        $i=1;
                        $this->db->where('sort_date', $year.'-'.$month);
                        $monthely_sep=$this->db->get('tbl_purchase')->result();
                        foreach ($monthely_sep as $value) {
                            $check_return=$value->qty-$value->return_qty;
                            if($check_return==0)
                            {

                            }else {
                            
                        ?>
                        <p><b>(<?php echo $i;?>).</b> <?php echo $value->product_name;?></p>
                        <?php $i++;} }?>
                        
                    </div>
                    <div class="col-sm-3">
                        <h4>Date</h4>
                        <?php
                        $i=1;
                        $this->db->where('sort_date', $year.'-'.$month);
                        $monthely_sep=$this->db->get('tbl_purchase')->result();
                        foreach ($monthely_sep as $value) {
                            $check_return=$value->qty-$value->return_qty;
                            if($check_return==0)
                            {

                            }else {

                            $ex=explode("-", $value->date);
                                $year1=$ex[0];
                                $month1=$ex[1];
                                $day1=$ex[2];

                                $monthNum  = $month1;
                                $dateObj   = DateTime::createFromFormat('!m', $monthNum);
                                $monthName = $dateObj->format('M');
                            
                        ?>
                    <p><b>(<?php echo $i;?>).</b> <?php echo $day1.'-'.$monthName.'-'.$year1?></p>
                        <?php $i++;} }?>
                        
                    </div>
                    <div class="col-sm-3">
                        <h4>Amount</h4>
                        <?php
                        $i=1;
                        $this->db->where('sort_date', $year.'-'.$month);
                        $monthely_sep=$this->db->get('tbl_purchase')->result();
                        foreach ($monthely_sep as $value) {
                            $check_return=$value->qty-$value->return_qty;
                            if($check_return==0)
                            {

                            }else {
                            $qty=$value->qty;
                            $price=$value->price;
                        ?>
                        <p><b>(<?php echo $i;?>).</b> ₹<?php echo number_format($qty*$price,2);?></p>
                        <?php $i++;} }?>
                    </div>

                </div>
            </div>
            <br>
            
        </div>
        <div class="col-sm-4">
            <h2><b>Sale</b></h2>
            <br>
            <div class="container-fluid">
                <div class="row under-content">
                    <div class="col-sm-4">
                        <h4>Order Code</h4>
                        <?php
                        $i=1;
                        $this->db->group_by('order_code');
                        $this->db->where('yer_mon', $year.'-'.$month);
                        $order_date=$this->db->get('tbl_order')->result();
                        foreach ($order_date as $value) {
                                
                                
                        ?>
                        <p><b>(<?php echo $i;?>).</b><?php echo $value->order_code;?></p>
                        <?php $i++;}?>
                    </div>

                    <div class="col-sm-4">
                        <h4>Date</h4>
                        
                        <?php
                        $i=1;
                        $this->db->group_by('order_code');
                        $this->db->where('yer_mon', $year.'-'.$month);
                        $order_date=$this->db->get('tbl_order')->result();
                        foreach ($order_date as $value) {
                                
                                $ex=explode("-", $value->order_date);
                                $year1=$ex[0];
                                $month1=$ex[1];
                                $day1=$ex[2];
                                $monthNum  = $month1;
                                $dateObj   = DateTime::createFromFormat('!m', $monthNum);
                                $monthName = $dateObj->format('M');
                            
                        ?>
                        <p><?php echo $day1.'-'.$monthName.'-'.$year1?></p>
                        <?php $i++;}?>

                    </div>
                    <div class="col-sm-4">
                        <h4>Amount</h4>
                        <?php
                        
                        $this->db->group_by('order_code');
                        $this->db->where('yer_mon', $year.'-'.$month);
                        $order_date=$this->db->get('tbl_order')->result();
                        $total_amount=0;
                        foreach ($order_date as $value) {
                                $order_code=$value->order_code;
                                
                                //$ex1=implode(",", $order_code);
                                $this->db->where('order_code', $order_code);
                                $order_date123=$this->db->get('tbl_order')->result();
                                $sub_total=0;
                                $discount_prices=0;
                                
                                foreach ($order_date123 as $value12) {
                                $quantity=$value12->quantity;
                                $price=$value12->price;
                                $discount_prices+=$value12->discount_prices;
                                $sub_total+=$price*$quantity;

                            }
                            $total_discount=round(($sub_total-$discount_prices) * (9/100));
                                ?>
                                
                            
                                <p>₹<?php echo number_format($sub_total-$discount_prices+$total_discount+$total_discount,2);?></p>
                       
                            
                    
                            <?php 
                            $total_amount+=$sub_total-$discount_prices+$total_discount+$total_discount;
                            unset($order_date123);
                        }
                        ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid" style="margin-top: 10px;">
    <div class="row" style="border: 1px solid;">
<?php 
  $this->db->where('sort_date', $year.'-'.$month);
  $monthely_sep=$this->db->get('tbl_purchase')->result();
  $total_purchase=0;
  foreach ($monthely_sep as  $value_sep) {
     $quantity=$value_sep->qty;
     $price=$value_sep->price;
     
     $return_qty=$value_sep->return_qty;
     $price=$value_sep->price;

     $sub_traction12=$price*$return_qty;
     $sub_traction=$price*$quantity;
     $total_purchase+=$sub_traction-$sub_traction12;
  }

  $this->db->where('sort_date', $year.'-'.$month);
  $monthely_oct12345=$this->db->get('tbl_extrap_cost')->result();
  $total321=0;
  foreach ($monthely_oct12345 as  $value_oct121334) {
     $extar_bill=$value_oct121334->amount;
     
     $total321+=$extar_bill;
     
  }
  ?>

        <div class="col-sm-8 purchase" style="border-right: 1px solid; padding-top: 10px;">
            <p style="margin-left: 455px; border-bottom: 1px solid;">Purchase Total Amount : ₹<?php echo number_format($total_purchase,2);?></p>
            <p style="margin-left: 482px; border-bottom: 1px solid;">Extra Cost Amount : ₹<?php echo number_format($total321,2);?></p>
            <p style="margin-left: 495px; border-bottom: 1px solid;">Employee Salary : ₹000</p>
            <p style="margin-left: 505px; border-bottom: 1px solid;">Gross Amount : ₹<?php echo number_format($total_purchase+$total321,2);?> <strong>(<?php echo $this->getIndianCurrency($total_purchase+$total321);?>)</strong></p>
        </div>

        <?php 
        $this->db->where('date_sort', $year.'-'.$month);
  $monthely_oct123=$this->db->get('tbl_order_return')->result();
  $total_oct12=0;
  foreach ($monthely_oct123 as  $value_oct1213) {
     $quantity=$value_oct1213->return_quty;
     $price=$value_oct1213->price;
     $sub_traction1223=($price*$quantity)-$value_oct1213->return_discount_amount;
     $total_oct12+=$sub_traction1223;
     
  }
  $total_discount123=round($total_oct12 * (9/100));
  $total_oct_gross123=$total_oct12+$total_discount123+$total_discount123;
  ?>

        <div class="col-sm-4" style="padding-top: 10px;">
            <p style="margin-left: 15px; border-bottom: 1px solid;">Sale Total Amount : ₹<?php echo number_format($total_amount,2);?></p>
            <p style="margin-left: 30px; border-bottom: 1px solid;">Refund Amount : ₹<?php echo number_format($total_oct_gross123,2);?></p>
            <p style="margin-left: 37px; border-bottom: 1px solid;;">Gross Amount : ₹<?php echo number_format($total_amount-$total_oct_gross123,2);?> <strong>(<?php echo $this-> getIndianCurrency($total_amount-$total_oct_gross123);?>)</strong></p>
        </div>
    </div>
</div>




<?php 

 

    }


    function getIndianCurrency(int $number)
{
    
    $decimal = round($number - ($no = floor($number)), 2) * 100;
    $hundred = null;
    $digits_length = strlen($no);
    $i = 0;
    $str = array();
    $words = array(0 => '', 1 => 'One', 2 => 'Two',
        3 => 'Three', 4 => 'Four', 5 => 'Five', 6 => 'Six',
        7 => 'Seven', 8 => 'Eight', 9 => 'Nine',
        10 => 'Ten', 11 => 'Eleven', 12 => 'Twelve',
        13 => 'Thirteen', 14 => 'Fourteen', 15 => 'Fifteen',
        16 => 'Sixteen', 17 => 'Seventeen', 18 => 'Eighteen',
        19 => 'Nineteen', 20 => 'Twenty', 30 => 'Thirty',
        40 => 'Forty', 50 => 'Fifty', 60 => 'Sixty',
        70 => 'Seventy', 80 => 'Eighty', 90 => 'Ninety');
    $digits = array('', 'Hundred','Thousand','Lakh', 'Crore');
    while( $i < $digits_length ) {
        $divider = ($i == 2) ? 10 : 100;
        $number = floor($no % $divider);
        $no = floor($no / $divider);
        $i += $divider == 10 ? 1 : 2;
        if ($number) {
            $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
            $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
            $str [] = ($number < 21) ? $words[$number].' '. $digits[$counter]. $plural.' '.$hundred:$words[floor($number / 10) * 10].' '.$words[$number % 10]. ' '.$digits[$counter].$plural.' '.$hundred;
        } else $str[] = null;
    }
    $Rupees = implode('', array_reverse($str));
    $paise = ($decimal > 0) ? "." . ($words[$decimal / 10] . " " . $words[$decimal % 10]) . ' Paise' : '';
    return ($Rupees ? $Rupees . 'Rupees Only' : '') . $paise;
}



public function order_status()
    {
        $str=$this->input->post('order_code'); 
        $data=explode("_",$str);  
        $order_code=$data[0];
        $status=$data[1];
        if($status=='Delevery'){
            $data=array(
                'order_status'=>'Delevery',
            );
        }

        $this->db->where('order_code', $order_code);        
        $this->db->update('tbl_order', $data);
    }



 public function distributor_order()
    {
        
       $this->db->select('tbl_order.order_code,tbl_order.order_date,tbl_order.order_status,tbl_serller_user.name as seller_name,tbl_serller_user.mobile,tbl_serller_user.address,tbl_serller_user.gst_no,tbl_serller_user.state_code');
        $this->db->from('tbl_order');
        $this->db->join('tbl_serller_user', 'tbl_serller_user.uniqcode = tbl_order.distributor_id', 'inner');
        // $this->db->where('tbl_order.order_status','Pending');
        $this->db->where('tbl_order.status','Distributor');
        $this->db->where('tbl_serller_user.type','Distributor');
        $this->db->group_by('tbl_order.order_code');
        $this->db->order_by('tbl_order.id','DESC');
        $query = $this->db->get()->result();
        // pr($query); die;
        $this->data['query']=$query;
        $this->data['page_title']='CRM | Distributor  Order';
        $this->data['subview']='crm/distributor_order';
        $this->load->view('admin/layout/default', $this->data); 
    }
    
    
    
    public function distributor_order_bill($code)
    {
        $order_code='#'.$code;

        $this->db->select('tbl_order.order_code,tbl_order.order_date,tbl_order.order_status,tbl_serller_user.name as seller_name,tbl_brand.brand_name,tbl_product.product_name,tbl_product_size.size_name,tbl_order.price,tbl_order.quantity,tbl_order.payment_type,tbl_product.pro_code,tbl_serller_user.mobile,tbl_serller_user.address,tbl_serller_user.gst_no,tbl_serller_user.state_code');
        $this->db->from('tbl_order');
        $this->db->join('tbl_serller_user', 'tbl_serller_user.uniqcode = tbl_order.distributor_id', 'inner');
        $this->db->join('tbl_brand', 'tbl_brand.uniqcode = tbl_order.brand_id', 'inner');
        $this->db->join('tbl_product', 'tbl_product.uniqcode = tbl_order.product_id', 'inner');
        $this->db->join('tbl_product_size', 'tbl_product_size.uniqcode = tbl_order.size_id', 'inner');
        $this->db->where('tbl_order.order_code',$order_code);
        $this->db->where('tbl_order.status','Distributor');
        $this->db->where('tbl_serller_user.type','Distributor');
        $this->db->order_by('tbl_order.id','DESC');
        $query = $this->db->get()->result();
        // pr($query); die;

        $this->data['query']=$query;
        $this->data['page_title']='CRM | Distributor Order Bill';
        $this->data['subview']='crm/distributor_bill';
        $this->load->view('admin/layout/default', $this->data);
    }
    
    
    
     public function get_distributor_order_search()
    {
        // echo "++++++++++"; die;
        $from_date = $this->input->post('fromdate');
        $to_date = $this->input->post('todate');

        $this->db->select('tbl_order.order_code,tbl_order.order_date,tbl_order.order_status,tbl_serller_user.name as seller_name,tbl_serller_user.mobile,tbl_serller_user.address,tbl_serller_user.gst_no,tbl_serller_user.state_code');
        $this->db->from('tbl_order');
        $this->db->join('tbl_serller_user', 'tbl_serller_user.uniqcode = tbl_order.distributor_id', 'inner');
        // $this->db->where('tbl_order.order_status','Pending');
        $this->db->where('tbl_order.status','Distributor');
        $this->db->group_by('tbl_order.order_code');
        $this->db->order_by('tbl_order.id','DESC');
        if(!empty($to_date) && !empty($from_date) )
            {
                $this->db->where('tbl_order.order_date  BETWEEN "'. date('Y-m-d', strtotime($from_date)). '" AND "'. date('Y-m-d', strtotime($to_date)).'"');
            }
        $query = $this->db->get()->result();

        echo '
            <table class="table table-striped table-bordered table-hover dataTables-example" id="printTable">
                <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Order Id</th>
                            <th>Distributor Name</th>
                            <th>Phone No</th>
                            <th>Address</th>
                            <th>GST NO</th>
                            <th>State Code</th>
                            <th>Order Date</th>
                            <th>Total Price</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                </thead>
                <tbody id="">';
                    if(!empty($query))
                    {
                        foreach($query as $key => $value)
                        {
                            $this->db->select('quantity,price');
                            $this->db->from('tbl_order');
                            $this->db->where('order_code',$value->order_code);
                            $data = $this->db->get()->result();
                            $sub_total=0;
                           foreach($data as $key1 => $v)
                           {
                                $p1=intval($v->price);
                                $q1=intval($v->quantity);
                                $total=($p1 * $q1);
                                $sub_total=round(($sub_total + $total));

                           }

                            $sgst = 9;
                            $cgst = 9;
                            $total_s = round(($sgst * $sub_total));
                            $total_sgst=round(($total_s/100));

                            $total_c = round(($cgst * $sub_total));
                            $total_cgst=round(($total_c/100));

                            $gross_amount = round($sub_total + $total_cgst + $total_sgst);
                            $id=$key+1;
                            echo '
                                <tr class="gradeX">
                                    <td>'.$id.'</td>
                                    <td><div style="min-width: max-content;">
                                      '.$value->order_code.' 
                                    </div></td>
                                    <td><div style="min-width: max-content;">
                                      '.$value->seller_name.' 
                                    </div></td>
                                    <td><div style="min-width: max-content;">
                                      '.$value->mobile.' 
                                    </div></td>
                                    <td><div style="min-width: max-content;">
                                      '.$value->address.' 
                                    </div></td>
                                    <td><div style="min-width: max-content;">
                                      '.$value->gst_no.' 
                                    </div></td>
                                    <td><div style="min-width: max-content;">
                                      '.$value->state_code.' 
                                    </div></td>
                                    <td><div style="min-width: max-content;">
                                      '.$value->order_date.' 
                                    </div></td>
                                    <td>'.number_format($gross_amount, 2).'</td>
                                    <td>';

                                        if($value->order_status == 'Pending')
                                        {  ?>
                                            <select id="status" name="status" class="form-control" onchange="order_status_chang(this.value)">
                                                <?php 
                                                    if($value->order_status == 'Pending')
                                                    {
                                                ?>
                                                    <option value="<?=$value->order_code.'_Pending'?>" selected>Pending</option>
                                                    <option value="<?=$value->order_code.'_Delevery'?>">Delevery</option>
                                                <?php       
                                                    }

                                                ?>
                                                </select>

                                               <?php } else { ?>
                                                    <?php echo 'Delevery'?>

                                            <?php 
                                               }?> 
                                    </td>
                                    <td>
                                        <?php 
                                            $code= $value->order_code;
                                            $str1 = substr($code, 1);

                                            if($value->order_status == 'Delevery')
                                            {
                                        ?>

                                        <a title="view" href="<?=base_url('admin/distributor-order-bill/'.$str1)?>" target="_blank">View</a></td>
                                        <?php }?>
                                </tr>
                            </tbody>
                            <?php 
                        }
                    } else{ 
                        echo '<p>Data Not Fount</p>';
                    } ?>
                     </table> <?php 
                echo '<script>
                  $(document).ready(function(){
                    
                        $(".dataTables-example").DataTable({
                            pageLength: 10,
                            responsive: true,
                            dom: \'<"html5buttons"B>lTfgitp\',
                            buttons: [                               
                                        {extend: "csv", 
                                        text:      \'<i class="fa fa-file-excel-o"></i> \',
                                        titleAttr : "CSV",
                                        title: function (){
                                        var d = new Date();
                                        var n = d.getTime();
                                        return "csv-"+n; },
                                        exportOptions: {
                                                        columns: "thead th:not(.noExport)"
                                                    } },

                                        {extend: "excel",
                                        text:      \'<i class="fa fa-file-excel-o"></i> \',
                                        titleAttr : "Excel",
                                        title: function (){
                                        var d = new Date();
                                        var n = d.getTime();
                                        return "excel-"+n; },
                                        exportOptions: {
                                                        columns: "thead th:not(.noExport)"
                                                    } },

                                        {extend: "print",
                                        text:      \'<i class="fa fa-print"></i> \',
                                        titleAttr : "Print",
                                        exportOptions: {
                                                                columns: "thead th:not(.noExport)"
                                                            },
                                         customize: function (win){
                                                $(win.document.body).addClass("white-bg");
                                                $(win.document.body).css("font-size", "10px");
                                                $(win.document.body).find("table")
                                                                    .addClass("compact")
                                                                    .css("font-size", "inherit");
                                        }
                                        }
                            ]
                        });
                    });



                </script>
                '; 
    }
    
    
    public function everyday_distributor_order()
    {
       $myDate = date("Y-m-d");
       $this->db->select('tbl_order.order_code,tbl_order.order_date,tbl_order.order_status,tbl_serller_user.name as seller_name,tbl_serller_user.mobile,tbl_serller_user.address,tbl_serller_user.gst_no,tbl_serller_user.state_code');
        $this->db->from('tbl_order');
        $this->db->join('tbl_serller_user', 'tbl_serller_user.uniqcode = tbl_order.distributor_id', 'inner');
        $this->db->where('tbl_order.order_date',$myDate);
        $this->db->where('tbl_order.status','Distributor');
        $this->db->where('tbl_serller_user.type','Distributor');
        $this->db->group_by('tbl_order.order_code');
        $this->db->order_by('tbl_order.id','DESC');
        $query = $this->db->get()->result();
        // pr($query); die;
        $this->data['query']=$query;
        $this->data['page_title']='CRM |Everyday Distributor Order';
        $this->data['subview']='crm/everyday_distributor_order';
        $this->load->view('admin/layout/default', $this->data);  
    }
    
    
     public function return_distributor_order()
    {
        $this->db->select('tbl_order_return.order_code,tbl_order_return.order_date,tbl_serller_user.name as seller_name,tbl_order_return.return_date,tbl_serller_user.mobile,tbl_serller_user.address,tbl_serller_user.gst_no,tbl_serller_user.state_code');
        $this->db->from('tbl_order_return');
        $this->db->join('tbl_serller_user', 'tbl_serller_user.uniqcode = tbl_order_return.distributor_id', 'inner');
        // $this->db->where('tbl_order_return.order_status','Pending');
        $this->db->where('tbl_order_return.type','Distributor');
        $this->db->where('tbl_serller_user.type','Distributor');
        $this->db->group_by('tbl_order_return.order_code');
        $this->db->order_by('tbl_order_return.id','DESC');
        $query = $this->db->get()->result();
        // pr($query); die;
        $this->data['query']=$query;
        $this->data['page_title']='CRM | Marketing Distributor Order';
        $this->data['subview']='crm/distributor_return_order';
        $this->load->view('admin/layout/default', $this->data);  
    }
    
    
    
     public function distributor_return_order_bill($code)
    {
        $order_code='#'.$code;

        $this->db->select('tbl_order_return.order_code,tbl_order_return.order_date,tbl_serller_user.name as seller_name,tbl_brand.brand_name,tbl_product.product_name,tbl_product_size.size_name,tbl_order_return.price,tbl_order_return.quantity,tbl_product.pro_code,tbl_order_return.purchase_subtotal,tbl_order_return.reason,tbl_order_return.return_quty,tbl_order_return.return_subtotal,tbl_order_return.return_date,tbl_serller_user.mobile,tbl_serller_user.address,tbl_serller_user.gst_no,tbl_serller_user.state_code');
        $this->db->from('tbl_order_return');
        $this->db->join('tbl_serller_user', 'tbl_serller_user.uniqcode = tbl_order_return.distributor_id', 'inner');
        $this->db->join('tbl_brand', 'tbl_brand.uniqcode = tbl_order_return.brand_id', 'inner');
        $this->db->join('tbl_product', 'tbl_product.uniqcode = tbl_order_return.product_id', 'inner');
        $this->db->join('tbl_product_size', 'tbl_product_size.uniqcode = tbl_order_return.size_id', 'inner');
        $this->db->where('tbl_order_return.order_code',$order_code);
        $this->db->where('tbl_order_return.type','Distributor');
        $this->db->where('tbl_serller_user.type','Distributor');
        $this->db->order_by('tbl_order_return.id','DESC');
        $query = $this->db->get()->result();
        // pr($query); die;

        $this->data['query']=$query;
        $this->data['page_title']='CRM | Distributor Return Order Bill';
        $this->data['subview']='crm/distributor_return_order_bill';
        $this->load->view('admin/layout/default', $this->data);
    }
    
    
    
    public function add_product_packed()
    {
       $this->db->where('status', 'Active');
        $stock_entry_data=$this->db->get('tbl_brand')->result();
        
        $this->db->order_by("id", "asce");
        $size_show=$this->db->get('tbl_size')->result();
        
        $stock_data=$this->db->get('tbl_product_packed')->result();

        $this->data['stock_entry_data']=$stock_entry_data;  
        $this->data['show_size']=$size_show;
        $this->data['show_stock']=$stock_data;
        $this->data['page_title']='crm | Add Product Packed';
        $this->data['subview']='stock_entry/addpacked';
        $this->load->view('admin/layout/default', $this->data);
        
    }
    
    
    public function product_packed_add()
    {
      
        include('libs/phpqrcode/qrlib.php');
        $brand_name=$this->input->post('brand_name');
        $prodduct_size=$this->input->post('prodduct_size');
        $product_code=$this->input->post('product_code');
        $product_quty=$this->input->post('product_quty');
        $date=date("Y-m-d");
        
        $this->db->where('uniqcode', $prodduct_size);
        $product_size=$this->db->get('tbl_size')->result();
        $size_name=$product_size[0]->size;
        
        
    $tempDir = 'webroot/adminImages/qrcode/packed/'; 
	$email = $product_code;
	$subject =  "Barsat Water -".$size_name. ($product_quty."Pcs * 1 Packed");
	//$filename = getUsernameFromEmail($email);
	$filename=$email;
	$body =  "https://www.utsavdrinkingwater.com";
	$codeContents = 'mailto:'.$email.'?subject='.urlencode($subject).'&body='.urlencode($body);
	QRcode::png($codeContents, $tempDir.''.$filename.'.png', QR_ECLEVEL_L, 5);
           

        //$unicode=random_string('alnum',31);
        $data_array=array("brand_id"=>$brand_name,"product_id"=>$prodduct_size,"quentity"=>$product_quty,"product_code"=>$product_code,"qrcode"=>$filename.'.png');
        $this->om->insert('tbl_product_packed',$data_array);
        echo "Insert";
        
        /*$this->db->where('uniqcode', $prodduct_size);
        $product_size=$this->db->get('tbl_size')->result();
        $size_name=$product_size[0]->size;
        
       
         $data_array=array("brand_id"=>$brand_name,"product_id"=>$prodduct_size,"quentity"=>$product_quty,"product_code"=>$product_code,"date"=>$date);
        
        $this->om->insert('tbl_productstock',$data_array);

       $this->db->where('product_id', $prodduct_size);
        $stock_check=$this->db->get('tbl_total_stock')->num_rows();
       if($stock_check>0)
       {
        $this->db->where('product_id', $prodduct_size);
        
        $stock_check12=$this->db->get('tbl_total_stock')->result();
        foreach ($stock_check12 as $value) {
          $total_stock_id=$value->id;
          $stock=$value->quentity;
        }
        $gross_stock=$stock+$product_quty;
        $where=array("id"=>$total_stock_id);
                    $data_array12=array("quentity"=>$gross_stock);
                    $result=$this->om->update('tbl_total_stock',$data_array12,$where);
                    echo "Update";
       }else {
           
    $tempDir = 'webroot/adminImages/qrcode/'; 
	$email = $product_code;
	$subject =  "Utsav Water -".$size_name;
	//$filename = getUsernameFromEmail($email);
	$filename=$email;
	$body =  "Kolkata";
	$codeContents = 'mailto:'.$email.'?subject='.urlencode($subject).'&body='.urlencode($body);
	QRcode::png($codeContents, $tempDir.''.$filename.'.png', QR_ECLEVEL_L, 5);
           

        $unicode=random_string('alnum',31);
        $data_array=array("brand_id"=>$brand_name,"product_id"=>$prodduct_size,"quentity"=>$product_quty,"product_code"=>$product_code,"qrcode"=>$filename.'.png');
        $this->om->insert('tbl_total_stock',$data_array);
        echo "Insert";
       
       }*/

    }
    
    


}
