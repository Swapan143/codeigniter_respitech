<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BannerController extends CI_Controller {
	
	 function __construct(){

	  	parent::__construct(); 		
		$this->load->helper(array('common_helper', 'string', 'form', 'security', 'text'));	
		$this->load->library(array('form_validation', 'email'));	
		if(($this->session->userdata('adminDetails')==NULL)){
		   return redirect('admin');
		}
	} 

	public function index()
		{		
			// $this->db->where('is_active', 'Active');
	        $this->db->where('is_delete', 'N');
	        $this->db->order_by('id', 'DESC');
	        $banner_data=$this->db->get('tbl_banner')->result();

			$this->data['page_title']='Book Store | Banner';
			$this->data['subview']='banner/index';
			$this->data['banner_data']=$banner_data;
			$this->load->view('admin/layout/default', $this->data);
		}

		public function add_banner(){
		if($_POST)
		{
			$banner_name=trim($this->input->post('banner_name'));

	        $this->db->where('banner_name', $banner_name);
	        $this->db->where('is_delete', 'N');
	        $banner_row=$this->db->get('tbl_banner')->row();
	        $item_upload_image='';
	        $image_data='';
			$images_name="";
	        if(empty($banner_row))
			{

				if(!empty($_FILES['item_image_banner']['name']))
				{
					
					$uploads_dir = "webroot/adminImages/banner_image";
					$tmp_name = $_FILES["item_image_banner"]["tmp_name"];
					$name =rand().$_FILES["item_image_banner"]["name"];     
					move_uploaded_file($tmp_name, "$uploads_dir/$name");
					$images_name =$name;
									
				}
				// pr($item_upload_image);exit;
				$data=array(
					'banner_name' => $banner_name,
					'images' => $images_name,
				);			
    			$this->db->insert('tbl_banner', $data);
				$this->session->set_flashdata('success', 'Banner added successfully.');	
				redirect('admin/banner');
    		}
			else
			{
    			$this->session->set_flashdata('error', 'Banner name already exists!');	
				redirect('admin/banner');
    		}
			
		}
	}
	
	public function edit_banner(){

		$transid=trim($this->input->post('transid'));


		$this->db->where('id', $transid);
		$this->db->where('is_delete', 'N');
        $banner_row=$this->db->get('tbl_banner')->row();

		 echo '<form id="form" action="'.base_url('admin/update-banner').'" method="post" enctype="multipart/form-data">
		 <input type="hidden" value="'.$banner_row->id.'" name="transid">
		 <input type="hidden" value="'.$banner_row->images.'" name="banner_img">
                          
                            <div class="row text-center">
                                <div class="col-sm-12 add-new-sevice-popup-img">                                                        
                                    <div class="form-group">
                                            <img src="'.base_url('webroot/adminImages/banner_image/'.$banner_row->images.'').'" id="upload_photo_banner1" onclick="get_banner()" style="cursor: pointer;" class="add_img_banner">
                                            <input type="file" name="item_image_banner" class="image-upload selected_img" id="input_upload_banner1" style="display: none" accept=".jpg,.jpeg,.png" onchange="show_photo_banner(this)">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                   
                                                                  
                                <div class="col-sm-6">                                       
                                    <div class="form-group">
                                       <label>Banner Name</label>                                            
                                        <input name="banner_name" id="banner_name" type="text" class="form-control only_character validate[required]" data-errormessage-value-missing="Banner name is required" data-prompt-position="bottomLeft" minlength="" maxlength="100" placeholder="Type banner name" value="'.$banner_row->banner_name.'">
                                    </div>
                                </div>
                              
                                <div class="col-sm-12">                                       
                                    <div style="text-align: center; margin-top: 2em;">
                                        <button class="btn btn-primary pull-right" name="add_class" type="submit"><i class="fa fa-paper-plane-o" aria-hidden="true"></i>&nbsp;Save</button>
                                    </div>
                                </div>
                            </div>                                                                               
                        </form>                        
                        <script>
                function get_banner() {
			    $("#input_upload_banner1").trigger("click"); 
			    }

			    function show_photo_banner(input) {
			    if (input.files && input.files[0]) {
			    var reader = new FileReader();
			     var FileSize = input.files[0].size / 1024 / 1024;
			        var FileType = input.files[0].type;
			        var ext = $("#input_upload_banner1").val().split(".").pop().toLowerCase();
			        if($.inArray(ext, ["JPEG","PNG","JPG","png","jpg","jpeg"]) == -1) {
			            alert("invalid extension!");
			            $("#input_upload_banner1").val("");
			        }else{
			        
			    if(FileSize < 1){
			    reader.onload = function (e) {
			    $("#upload_photo_banner1")
			    .attr("src", e.target.result)
			    .width(100)
			    .height(100);
			    };
			    reader.readAsDataURL(input.files[0]);
			    }else{
			        alert("Maximum file size 1MB can be upload");
			        $(input).val("");
			    }
			    }
			    }
			    }
			    </script> ';            
				}
	public function update_banner()
	{
		if($_POST)
		{

			$transid=trim($this->input->post('transid'));
			$banner_name=trim($this->input->post('banner_name'));

	        $this->db->where('banner_name', $banner_name);
	        $this->db->where('id <>', $transid);
	        $this->db->where('is_delete', 'N');
	        $banner_row=$this->db->get('tbl_banner')->row();

	        if(empty($banner_row))
			{
				$images_name='';
				if(!empty($_FILES['item_image_banner']['name']))
				{
					$uploads_dir = "webroot/adminImages/banner_image";
					$tmp_name = $_FILES["item_image_banner"]["tmp_name"];
					$name =rand().$_FILES["item_image_banner"]["name"];     
					move_uploaded_file($tmp_name, "$uploads_dir/$name");
					$images_name =$name;

					$file = FCPATH.'/webroot/adminImages/banner_image/'.$category_img;
					if (file_exists($file)) 
					{
						unlink($file);
					}   	                     
				}
				else
				{
					
					$images_name=trim($this->input->post('banner_img'));
				}
				$data=array(
					'banner_name' => $banner_name,
					'images' => $images_name,
				);			
	        	$this->db->where('id', $transid);
    			$this->db->update('tbl_banner', $data);
				$this->session->set_flashdata('success', 'Banner updated successfully.');	
				redirect('admin/banner');
    		}
			else
			{
    			$this->session->set_flashdata('error', 'Banner name already exists!');	
				redirect('admin/banner');
    		}
			
		}          
	}

		public function status(){	

        $transid=$this->input->post('uniqcode');        
        $this->db->where('is_delete', 'N');
        $this->db->where('id', $transid);
        $get_data=$this->db->get('tbl_banner')->row();

        
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
        $this->db->update('tbl_banner', $data);      
	}

	public function destroy($uniqcode){
      	$data=array(
        'is_delete'=>'Y',
    	);
	  $this->db->where('id', $uniqcode);
	  $this->db->update('tbl_banner', $data);
	  $this->session->set_flashdata('success', 'Banner deleted successfully');                     
	  redirect('admin/banner');
	}


}