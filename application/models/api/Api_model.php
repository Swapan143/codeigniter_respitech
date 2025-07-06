<?php
/**
 * 
 */
 if (!defined('BASEPATH')) exit('No direct script access allowed');
class Api_model extends CI_model
{
    public function banner_getRows($table)  
    {
        //$current_date=date('Y-m-d');
        $this->db->select('uniqcode,image');
        $this->db->where('status','Active');
        //$this->db->or_where('to_date','Lifetime');
        $query = $this->db->get($table);
        return $query->result();

    }
    public function category($table)
    {
        $this->db->select('uniqcode,category_name');
        $this->db->where('status','Active');
        $query = $this->db->get($table);
        return $query->result();
    }
    public function about_us($table)
    {
        $this->db->select('uniqcode,company_name,email,contact_us,description');
        $this->db->where('status','Active');
      
        $query = $this->db->get($table);
        return $query->row();
    }
    public function terms_condtion($table)
    {
        $this->db->select('uniqcode,description');
        $this->db->where('status','Active');
        $query = $this->db->get($table);
        return $query->row();
    }
    public function privacy_policy($table)
    {
        $this->db->select('uniqcode,description');
        $this->db->where('status','Active');
        $query = $this->db->get($table);
        return $query->row();
    }
    public function return_policy($table)
    {
        $this->db->select('uniqcode,description');
        $this->db->where('status','Active');
        $query = $this->db->get($table);
        return $query->row();
    }
    public function payment_policy($table)
    {
        $this->db->select('uniqcode,description');
        $this->db->where('status','Active');
        $query = $this->db->get($table);
        return $query->row();
    }
    public function entty_check($data,$table)
    {
        $this->db->where($data);
        $query = $this->db->get($table);
        $count_row = $query->num_rows();
        return $count_row;
    }
    public function user_data($user_id,$password)
    {
        $this->db->where('password',$password);
        $this->db->where('phone_no',$user_id);
        return $this->db->get('tbl_users')->row();
    }
    public function user_data1($user_id,$password)
    {
        $this->db->where('password',$password);
        $this->db->where('email',$user_id);
        return $this->db->get('tbl_users')->row();
    }
    public function update($table,$where,$data)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
        if($this->db->affected_rows())
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    public function select_all_rows($data,$table)
    {
        $this->db->select('*');
        $this->db->where($data);
        $query = $this->db->get($table);
        $data=$query->result_array();

        if(!empty($data))
        {
            return $data;
        }
        else
        {
            return false;
        }
    }
    public function select_all_rows1($data,$table)
    {
        $this->db->select('*');
        $this->db->where($data);
        $this->db->order_by('id','desc');
        $query = $this->db->get($table);
        $data=$query->result_array();

        if(!empty($data))
        {
            return $data;
        }
        else
        {
            return false;
        }
    }
    public function selectrow($data,$table)
    {
        $data=$this->db->where($data)
        ->from($table)
        ->get()->row();
        if(!empty($data))
        {
            return $data;
        }
        else
        {
            return false;
        }
    }

    public function insert($data,$table)
    {
        $this->db->insert($table,$data);
        if($this->db->affected_rows())
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    public function insert123($db,$add_array) {
	/*$data = array(
			'loan_type'      => $loan_type
	);*/
	$this->db->insert($db, $add_array);
	if($this->db->affected_rows() > 0){return true;} else {return false;}
}
    public function delete($data,$table)
    {
        $this->db->where($data);
        $this->db->delete($table);
        if($this->db->affected_rows())
        {
            return true;
        }
        else
        {
            return false;
        }
    }


    public function userDetails($uniqcode){
        $this->db->select('*');
        $this->db->from('tbl_users');
        $this->db->where('tbl_users.id',$uniqcode);
        $data=$this->db->get()->row();
        if(!empty($data))
        {
            return $data;
        }
        else
        {
            return false;
        }
    }

    public function changuserDetails($data)
    {
        $this->db->select('name,email,mobile_no,image,password,id');
        $this->db->from('tbl_users');
        $this->db->where($data);
        $data=$this->db->get()->row();
        if(!empty($data))
        {
            return $data;
        }
        else
        {
            return false;
        }  
    }
    
    public function changvendorDetails($data)
    {
        $this->db->select('buyer_code,buyer_name,buyer_phoneno,email_id,password,id');
        $this->db->from('tbl_buyer');
        $this->db->where($data);
        $data=$this->db->get()->row();
        if(!empty($data))
        {
            return $data;
        }
        else
        {
            return false;
        }
    }
    public function userDetailsUniqcode($id)
    {
        $this->db->select('id,name,image,email,mobile_no');
        $this->db->from('tbl_users');
        $this->db->where('tbl_users.id',$id);
        $data = $this->db->get()->row();
        if(!empty($data))
        {
            return $data;
        }
        else
        {
            return false;
        }
    }

    public function userDetails_mobile($id,$password)
    {

        $this->db->select('id,name,email,mobile_no');
        $this->db->from('tbl_users');
        $this->db->where('id',$id);
        $this->db->where('password',$password);
         $data = $this->db->get()->row();
        if(!empty($data))
        {
            return $data;
        }
        else
        {
            return false;
        }
    }

    public function categoryProduct_getRows($where_clause)
    {
        $this->db->select('view_products.product_uniqcode,view_products.product_f_uniqcode,view_products.category_id,view_products.product_name,view_products.image');
        $this->db->from('view_products');
        $this->db->where('category_id',$where_clause);
        $this->db->group_by('view_products.product_uniqcode');
        $query = $this->db->get();
        return $query->result();
        
    }

    public function product_view($product_id)
    {
        $this->db->select('tbl_product.catgegory_id,tbl_product.subcategory_id,tbl_product.product_name as product_id,tbl_product.product_description,tbl_product.sel_product_rate as mrp_price,
        tbl_product.product_discount,tbl_product.product_discount_rate as sell_price,tbl_byuerproduct.product_name,tbl_total_stock.total_stock,tbl_productimage.product_image');
        $this->db->from('tbl_product');
        $this->db->join('tbl_byuerproduct','tbl_byuerproduct.id = tbl_product.product_name', 'inner');
        $this->db->join('tbl_total_stock','tbl_total_stock.product_id = tbl_product.product_name', 'inner');
        $this->db->join('tbl_productimage','tbl_productimage.product_id = tbl_product.product_name', 'inner');
        $this->db->where('tbl_product.product_name',$product_id);
        $query = $this->db->get();
       //echo $this->db->last_query($query); die();
        $sub=$query->row();
        return $sub;

    }
    
    public function product_view_image($product_id)
    {
        $this->db->select('tbl_productimage.product_id,tbl_productimage.product_image');
        $this->db->from('tbl_productimage');
        $this->db->where('tbl_productimage.product_id',$product_id);
        $query = $this->db->get();
       //echo $this->db->last_query($query); die();
        $sub=$query->result();
        return $sub;
    }

    public function size_data($product_uniqcode,$pf_uniqcode)
    {
        $this->db->select('view_products.product_uniqcode,view_products.pf_uniqcode,view_products.product_name,view_products.mrp_price,view_products.sell_price,view_products.quantity,view_products.size_name,tbl_size.uniqcode as size_id,view_products.category_id');
        $this->db->from('view_products');
        $this->db->join('tbl_size','tbl_size.uniqcode = view_products.size', 'inner');
        $this->db->where('tbl_size.status','Active');
        $this->db->where('view_products.product_uniqcode',$product_uniqcode);
        $this->db->where('view_products.pf_uniqcode',$pf_uniqcode);
        $query = $this->db->get();
        $sub=$query->result();
        return $sub;
    }
    
    public function get_subcategory_product_data($subcategory_id)
    {
        $this->db->select('tbl_product.product_description,tbl_product.product_discount_rate as sell_price,tbl_product.sel_product_rate as mrp_price,tbl_product.product_discount as 
        product_discount,tbl_byuerproduct.product_name,tbl_product.id,tbl_product.product_code,tbl_productimage.product_image,tbl_product.product_name as product_id');
        $this->db->from('tbl_product');
        $this->db->join('tbl_byuerproduct','tbl_byuerproduct.id = tbl_product.product_name', 'inner');
        $this->db->join('tbl_productimage','tbl_productimage.product_id = tbl_product.id', 'inner');
        // $this->db->where('tbl_size.status','Active');
        $this->db->where('tbl_product.subcategory_id',$subcategory_id);
        // $this->db->where('view_products.pf_uniqcode',$pf_uniqcode);
        $query = $this->db->get();
        $sub=$query->result();
        return $sub;
    }
    
    public function get_category_product_data($category_id)
    {
        $this->db->select('tbl_product.product_description,tbl_product.product_discount_rate as sell_price,tbl_product.sel_product_rate as mrp_price,tbl_product.product_discount as 
        product_discount,tbl_byuerproduct.product_name,tbl_product.id,tbl_product.product_code,tbl_product.catgegory_id as category_id,tbl_product.product_name as product_id,tbl_product.subcategory_id as subcategory_id');
        $this->db->from('tbl_product');
        $this->db->join('tbl_byuerproduct','tbl_byuerproduct.id = tbl_product.product_name', 'inner');
        // $this->db->join('tbl_productimage','tbl_productimage.product_id = tbl_product.product_name', 'inner');
        // $this->db->where('tbl_size.status','Active');
        $this->db->where('tbl_product.catgegory_id',$category_id);
        // $this->db->where('view_products.pf_uniqcode',$pf_uniqcode);
        $query = $this->db->get();
        $sub=$query->result();
        return $sub; 
    }
    
    public function get_new_arrivals_product_data()
    {
        $this->db->select('tbl_product.product_description,tbl_product.product_discount_rate as sell_price,tbl_product.sel_product_rate as mrp_price,tbl_product.product_discount as 
        product_discount,tbl_byuerproduct.product_name,tbl_product.id,tbl_product.product_code,tbl_product.catgegory_id as category_id,tbl_product.subcategory_id as subcategory_id,tbl_product.product_name as product_id');
        $this->db->from('tbl_product');
        $this->db->join('tbl_byuerproduct','tbl_byuerproduct.id = tbl_product.product_name', 'inner');
        // $this->db->join('tbl_productimage','tbl_productimage.product_id = tbl_product.product_name', 'inner');
        // $this->db->where('tbl_size.status','Active');
        // $this->db->where('tbl_product.catgegory_id',$category_id);
        $this->db->order_by('tbl_product.id','DESC');
        // $this->db->where('view_products.pf_uniqcode',$pf_uniqcode);
        $query = $this->db->get();
        $sub=$query->result();
        return $sub;
    }
    
    public function get_best_sellers_product_data()
    {
        $this->db->select('tbl_product.product_description,tbl_product.product_discount_rate as sell_price,tbl_product.sel_product_rate as mrp_price,tbl_product.product_discount as 
        product_discount,tbl_byuerproduct.product_name,tbl_product.id,tbl_product.product_code,tbl_product.catgegory_id as category_id,tbl_product.subcategory_id as subcategory_id,tbl_product.product_name as product_id');
        $this->db->from('tbl_product');
        $this->db->join('tbl_byuerproduct','tbl_byuerproduct.id = tbl_product.product_name', 'inner');
        // $this->db->join('tbl_productimage','tbl_productimage.product_id = tbl_product.product_name', 'inner');
        // $this->db->where('tbl_size.status','Active');
        $this->db->where('tbl_product.best_sale','Yes');
        // $this->db->order_by('tbl_product.id','DESC');
        // $this->db->where('view_products.pf_uniqcode',$pf_uniqcode);
        $query = $this->db->get();
        $sub=$query->result();
        return $sub;
    }
    
    public function get_sale_items_product_data()
    {
        // $where = "field is  NOT NULL";
        $this->db->select('tbl_product.product_description,tbl_product.product_discount_rate as sell_price,tbl_product.sel_product_rate as mrp_price,tbl_product.product_discount as 
        product_discount,tbl_byuerproduct.product_name,tbl_product.id,tbl_product.product_code,tbl_product.catgegory_id as category_id,tbl_product.subcategory_id as subcategory_id,tbl_product.product_name as product_id');
        $this->db->from('tbl_product');
        $this->db->join('tbl_byuerproduct','tbl_byuerproduct.id = tbl_product.product_name', 'inner');
        // $this->db->join('tbl_productimage','tbl_productimage.product_id = tbl_product.product_name', 'inner');
        // $this->db->where('tbl_size.status','Active');
        // $this->db->where('tbl_product.product_discount_rate',$where);
        $this->db->order_by('tbl_product.id','DESC');
        // $this->db->where('view_products.pf_uniqcode',$pf_uniqcode);
        $query = $this->db->get();
        $sub=$query->result();
        return $sub;
    }
    public function allCart_getRows($user_id)
    {
        $this->db->select('tbl_cart.uniqcode as cart_id,tbl_cart.product_id,tbl_cart.product_features_id,
            tbl_product.product_name,tbl_product_features.image,tbl_total_stock.mrp_price,
            tbl_total_stock.sell_price,tbl_product_features.product_id,tbl_product_features.size as size_id,tbl_product_features.uniqcode as pf_id,tbl_product_features.product_id as p_id,tbl_product.slug,tbl_total_stock.quantity as stock_quantity,tbl_product_features.alert_quantity,tbl_cart.quantity');
        $this->db->from('tbl_cart');
        $this->db->join('tbl_product', 'tbl_cart.product_id= tbl_product.uniqcode','left');
        $this->db->join('tbl_product_features', 'tbl_cart.product_features_id= tbl_product_features.uniqcode','left');
        $this->db->join('tbl_total_stock', 'tbl_cart.product_features_id= tbl_total_stock.product_features_id','inner');
        // $this->db->join('tbl_size', 'tbl_cart.size= tbl_size.uniqcode','inner');
        // $this->db->where('tbl_cart.status','Active');
        $this->db->where('tbl_cart.status','Cart');
        $this->db->where('tbl_cart.user_id',$user_id);
        $this->db->where('tbl_product_features.admin_product_status','Active');
        $query = $this->db->get();
        $wishlist_product=$query->result_array();
        if($wishlist_product){
            return $wishlist_product;
        }
        else{
            return null;
        }
    }

    public function get_special_product()
    {
       $this->db->select('tbl_product_features.product_id,tbl_product_features.uniqcode as product_features_id, tbl_product.product_name,tbl_product_features.image,
            tbl_total_stock.mrp_price,tbl_total_stock.sell_price,tbl_product.category_id,tbl_product.slug,tbl_product_features.size');
        $this->db->from('tbl_product');
        $this->db->join('tbl_product_features', 'tbl_product.uniqcode= tbl_product_features.product_id','left');
        $this->db->join('tbl_total_stock', 'tbl_product_features.uniqcode= tbl_total_stock.product_features_id','inner');
        $this->db->where('tbl_product.status','Active');
        $this->db->where('tbl_product_features.admin_product_status','Active');
        $this->db->where('tbl_product.special_products','Yes');
        $this->db->group_by('tbl_product_features.product_id');
        $query = $this->db->get();
        $special_product=$query->result();
        if($special_product){
            return $special_product;
        }
        else{
            return null;
        } 
    }

    public function shuffle_assoc($list) 
    {
        if (!is_array($list)) return $list;
        $keys = array_keys($list);
        shuffle($keys);
          $random = array();
          foreach ($keys as $key)
            $random[] = $list[$key];
          return $random;
    }

    public function get_weekly_product()
    {
       $this->db->select('tbl_product_features.product_id,tbl_product_features.uniqcode as product_features_id, tbl_product.product_name,tbl_product_features.image,
            tbl_total_stock.mrp_price,tbl_total_stock.sell_price,tbl_product.category_id,tbl_product.slug,tbl_product_features.size');
        $this->db->from('tbl_product');
        $this->db->join('tbl_product_features', 'tbl_product.uniqcode= tbl_product_features.product_id','left');
        $this->db->join('tbl_total_stock', 'tbl_product_features.uniqcode= tbl_total_stock.product_features_id','inner');
        $this->db->where('tbl_product.status','Active');
        $this->db->where('tbl_product_features.admin_product_status','Active');
        $this->db->where('tbl_product.best_sale','1');
        $this->db->group_by('tbl_product_features.product_id');
        $query = $this->db->get();
        $weekly_product=$query->result();
        if($weekly_product){
            return $weekly_product;
        }
        else{
            return null;
        } 
    }

    public function get_offer_product()
    {
        $this->db->select('tbl_product_features.product_id,tbl_product_features.uniqcode as product_features_id, tbl_product.product_name,tbl_product_features.image,
            tbl_total_stock.mrp_price,tbl_total_stock.sell_price,tbl_product.category_id,tbl_product.slug,tbl_product_features.size');
        $this->db->from('tbl_product');
        $this->db->join('tbl_product_features', 'tbl_product.uniqcode= tbl_product_features.product_id','left');
        $this->db->join('tbl_total_stock', 'tbl_product_features.uniqcode= tbl_total_stock.product_features_id','inner');
        $this->db->where('tbl_product.status','Active');
        $this->db->where('tbl_product_features.admin_product_status','Active');
        $this->db->group_by('tbl_product_features.product_id');
        $query = $this->db->get();
        $offer_product=$query->result();
        if($offer_product){
            return $offer_product;
        }
        else{
            return null;
        }
    }

     public function CountWhere($table_name,$where_clause) {
        $this->db->select('count(*) as count');
        $this->db->where($where_clause);
        $this->db->from($table_name);
        $query = $this->db->get()->row();  
        $tot_rec = $query->count;
        return $tot_rec;
    }

    public function allAddress_getRows($user_id)
    {
         
        $this->db->select('tbl_users_delivery_address.uniqcode,tbl_users_delivery_address.name,tbl_users_delivery_address.mobile_no,tbl_users_delivery_address.address_details,tbl_users_delivery_address.city_dist_town,tbl_users_delivery_address.state,tbl_users_delivery_address.pin_code,tbl_users_delivery_address.locality,tbl_users_delivery_address.landmark,tbl_users_delivery_address.alternative_mob_no,tbl_users_delivery_address.email');
        $this->db->from('tbl_users_delivery_address');
        $this->db->where('tbl_users_delivery_address.status','Active');
        $this->db->where('tbl_users_delivery_address.user_id',$user_id);
        $query = $this->db->get();
        $data=$query->result();
        return $data;
    }

    public function delete_row($tbl_name, $where){
        
        $this->db->where($where);
        $this->db->delete($tbl_name);
        if($this->db->affected_rows())
        {
            return true;
        }
        else
        {
            return false;
        }
    }


    public function allBuyNow_getRows($product_id,$product_features_id)
    {
        $this->db->select('tbl_product_features.product_id,
            tbl_product_features.uniqcode as product_features_id,tbl_product.product_name, 
            tbl_product_features.image,tbl_size.size,tbl_total_stock.mrp_price,
            tbl_total_stock.sell_price,tbl_total_stock.quantity as stock_quantity');
        $this->db->from('tbl_product_features');
        $this->db->join('tbl_product','tbl_product_features.product_id= tbl_product.uniqcode','inner');
        $this->db->join('tbl_size', 'tbl_product_features.size= tbl_size.uniqcode','left');
        $this->db->join('tbl_total_stock', 'tbl_product_features.uniqcode= tbl_total_stock.product_features_id','inner');
        $this->db->where('tbl_product_features.product_id',$product_id);
        $this->db->where('tbl_product_features.uniqcode',$product_features_id);
        $this->db->where('tbl_product.status','Active');
        $this->db->where('tbl_product_features.admin_product_status','Active');
        $query = $this->db->get();
        $product=$query->result_array();

        if($product){
            return $product;
        }
        else{
            return null;
        }
    }

    public function cartProduct($user_id)
    {
        $this->db->select('tbl_product_features.product_id,
            tbl_product_features.uniqcode as product_features_id, tbl_product_features.size, 
            tbl_cart.quantity, tbl_total_stock.mrp_price, tbl_total_stock.sell_price, 
            tbl_total_stock.quantity as stock_quantity,tbl_cart.uniqcode');
        $this->db->from('tbl_cart');
        $this->db->join('tbl_product', 'tbl_cart.product_id= tbl_product.uniqcode','inner');
        $this->db->join('tbl_product_features','tbl_cart.product_features_id= tbl_product_features.uniqcode','inner');
        // $this->db->join('tbl_size', 'tbl_product_features.size= tbl_size.uniqcode','left');
        $this->db->join('tbl_total_stock', 'tbl_product_features.uniqcode= tbl_total_stock.product_features_id','inner');
        $this->db->where('tbl_cart.user_id',$user_id);
        $this->db->where('tbl_product.status','Active');
        $this->db->where('tbl_product_features.admin_product_status','Active');
        $query = $this->db->get();
        $product=$query->result();

        if($product){
            return $product;
        }
        else{
            return null;
        }
    }

    public function allBuyNow($product_id,$product_features_id)
    {
        $this->db->select('tbl_product_features.product_id,
            tbl_product_features.uniqcode as product_features_id,tbl_product.product_name, 
            tbl_product_features.image,tbl_size.size,tbl_total_stock.mrp_price,
            tbl_total_stock.sell_price,tbl_total_stock.quantity as stock_quantity');
        $this->db->from('tbl_product_features');
        $this->db->join('tbl_product','tbl_product_features.product_id= tbl_product.uniqcode','inner');
        $this->db->join('tbl_size', 'tbl_product_features.size= tbl_size.uniqcode','left');
        $this->db->join('tbl_total_stock', 'tbl_product_features.uniqcode= tbl_total_stock.product_features_id','inner');
        // $this->db->join('tbl_color', 'tbl_product_features.color_id= tbl_color.uniqcode','left');
        $this->db->where('tbl_product_features.product_id',$product_id);
        $this->db->where('tbl_product_features.uniqcode',$product_features_id);
        $this->db->where('tbl_product.status','Active');
        $this->db->where('tbl_product_features.admin_product_status','Active');
        $query = $this->db->get();
        $product=$query->result();

        if($product){
            return $product;
        }
        else{
            return null;
        }
    }

    public function allOrder_getRows($user_id)
    {
         
        $this->db->select('tbl_order.order_code,cast(tbl_order.order_date as Date) as order_date,
        sum(tbl_order.sell_price*tbl_order.quantity) as sell_price,tbl_order.status,
        sum(tbl_order.mrp_price*tbl_order.quantity) as mrp_price,
        count(tbl_order.order_code) as count,tbl_product_features.image');
        $this->db->from('tbl_order');
        $this->db->join('tbl_product', 'tbl_order.product_id= tbl_product.uniqcode','inner');
        $this->db->join('tbl_product_features','tbl_order.product_features_id= tbl_product_features.uniqcode','inner');
        $this->db->where('tbl_order.user_id',$user_id);
        $this->db->group_by('tbl_order.order_code');
        $this->db->order_by('tbl_order.datetime','DESC');
        $query = $this->db->get();
        $data= $query->result_array();
        return $data;
    }

    public function allOrderDetails_getRows($order_code)
    {
        $this->db->select('tbl_users_delivery_address.name, tbl_users_delivery_address.mobile_no,
        tbl_users_delivery_address.address_details,tbl_users_delivery_address.city_dist_town,
        tbl_users_delivery_address.state,tbl_users_delivery_address.pin_code,
        tbl_product.product_name,tbl_order.uniqcode as order_id,tbl_order.sell_price,tbl_order.mrp_price,
        tbl_order.quantity,tbl_product_features.image,tbl_order.status,tbl_product_features.product_id,tbl_product_features.uniqcode as product_features_id,
        tbl_size.size,tbl_order.order_code');
        $this->db->from('tbl_order');
        $this->db->join('tbl_product', 'tbl_order.product_id= tbl_product.uniqcode','inner');
        $this->db->join('tbl_product_features','tbl_order.product_features_id= tbl_product_features.uniqcode','inner');
        $this->db->join('tbl_users_delivery_address', 'tbl_order.address_id= tbl_users_delivery_address.uniqcode','inner');
        $this->db->join('tbl_size', 'tbl_product_features.size= tbl_size.uniqcode','left');
        $this->db->join('tbl_total_stock', 'tbl_product_features.uniqcode= tbl_total_stock.product_features_id','inner');
        $this->db->where('tbl_order.order_code',$order_code);
        $this->db->where('tbl_product.status','Active');
        $this->db->where('tbl_product_features.admin_product_status','Active');
        $data = $this->db->get()->result_array();                 
        return $data;
    }

     public function serach($query)
     {
        $this->db->select('tbl_product.catgegory_id,tbl_product.subcategory_id,tbl_product.product_name as product_id,tbl_product.product_description,tbl_product.sel_product_rate as mrp_price,
        tbl_product.product_discount,tbl_product.product_discount_rate as sell_price,tbl_category.category_name,tbl_byuerproduct.product_name,tbl_subcategory.subcategory_name,tbl_total_stock.total_stock');
        $this->db->from('tbl_product');
        $this->db->join('tbl_category', 'tbl_product.catgegory_id= tbl_category.id','inner');
        $this->db->join('tbl_byuerproduct', 'tbl_product.product_name= tbl_byuerproduct.id','inner');
        $this->db->join('tbl_subcategory', 'tbl_product.subcategory_id= tbl_subcategory.id','inner');
        // $this->db->join('tbl_productimage', 'tbl_product.product_name= tbl_productimage.product_id','inner');
        $this->db->join('tbl_total_stock', 'tbl_product.product_name= tbl_total_stock.product_id','inner');
        $this->db->group_start();
        $this->db->like('tbl_category.category_name',$query,'both');
        $this->db->or_like('tbl_subcategory.subcategory_name',$query,'both');
        $this->db->or_like('tbl_byuerproduct.product_name',$query,'both');
        $this->db->group_end();
        // $this->db->group_by('tbl_product_features.product_id');
        $query = $this->db->get();
        $product=$query->result();
        if($product){
            return $product;
        }
        else{
            return null;
        }
    }

    public function check_wishlist($product_id,$user_id)
    {
        $this->db->where('product_id',$product_id);
        $this->db->where('user_id',$user_id);
        // $this->db->where('product_features_id',$product_features_id);
        $this->db->from('tbl_wishlist');
        $count_row = $this->db->get()->num_rows();
        return $count_row;
    }

    public function wishlist_product_data($user_id)
    {
        $this->db->select('tbl_wishlist.product_id,tbl_product.catgegory_id,tbl_product.subcategory_id,tbl_product.product_description,tbl_product.sel_product_rate as mrp_price,
        tbl_product.product_discount as discount_rate,tbl_product.product_discount_rate as sell_price,tbl_byuerproduct.product_name,tbl_total_stock.total_stock,tbl_product.product_name as product_id');
        $this->db->from('tbl_wishlist');
        $this->db->join('tbl_product', 'tbl_wishlist.product_id= tbl_product.product_name','inner');
        $this->db->join('tbl_byuerproduct', 'tbl_wishlist.product_id= tbl_byuerproduct.id','inner');
        $this->db->join('tbl_total_stock', 'tbl_wishlist.product_id= tbl_total_stock.product_id','inner');
        // $this->db->join('tbl_productimage', 'tbl_wishlist.product_id= tbl_productimage.product_id','inner');
        // $this->db->where('tbl_wishlist.status','Active');
        // $this->db->where('tbl_product.status','Active');
        $this->db->where('tbl_wishlist.user_id',$user_id);
        // $this->db->where('tbl_product_features.admin_product_status','Active');
        $query = $this->db->get();
        $wishlist_product=$query->result();

        if($wishlist_product){
            return $wishlist_product;
        }
        else{
            return null;
        }

    }
    
    public function get_category_product()
    {
        $this->db->select('view_products.product_uniqcode as product_id,view_products.product_name,view_products.image,view_products.mrp_price,view_products.sell_price,view_products.pf_uniqcode,view_products.category_id');
        $this->db->from('view_products');
        $this->db->where('view_products.product_status','Active');
        $this->db->where('view_products.pf_status','Active');
        $this->db->where('view_products.category_id',$category_id);
        $query = $this->db->get();
        $wishlist_product=$query->result_array();
        if($wishlist_product){
            return $wishlist_product;
        }
        else{
            return null;
        }  
    }
    
    public function get_brand()
    {
        $this->db->select('uniqcode as brand_id,brand_name,category_id');
        $this->db->from('tbl_product');
        $this->db->where('status','Active');
        $this->db->group_by('brand_name');
        $query = $this->db->get();
        $wishlist_product=$query->result_array();
        if($wishlist_product){
            return $wishlist_product;
        }
        else{
            return null;
        }
    }
    
    public function get_product_size()
    {
        $this->db->select('tbl_size.size,tbl_size.uniqcode');
        $this->db->from('tbl_product_features');
        $this->db->join('tbl_size', 'tbl_size.uniqcode = tbl_product_features.size','inner');
        $this->db->where('tbl_size.status','Active');
        $this->db->group_by('tbl_product_features.size');
        $query = $this->db->get();
        $wishlist_product=$query->result_array();
        if($wishlist_product){
            return $wishlist_product;
        }
        else{
            return null;
        }
        
    }
    
    // public function get_similiar_product($category_id)
    // {
    //     $this->db->select('view_products.product_uniqcode as product_id,view_products.product_name,view_products.image,view_products.mrp_price,view_products.sell_price,view_products.pf_uniqcode,view_products.category_id,view_products.pf_uniqcode');
    //     $this->db->from('view_products');
    //     $this->db->where('view_products.product_status','Active');
    //     $this->db->where('view_products.pf_status','Active');
    //     $this->db->where('view_products.category_id',$category_id);
    //     $query = $this->db->get();
    //     $wishlist_product=$query->result_array();
    //     if($wishlist_product){
    //         return $wishlist_product;
    //     }
    //     else{
    //         return null;
    //     }
    // }
    
    
     public function get_similiar_product($category_id)
    {
        $this->db->select('tbl_product.uniqcode as product_id,tbl_product.product_name,tbl_product.others_featurs,tbl_product.description,tbl_product_features.image,tbl_product.category_id,tbl_total_stock.mrp_price,tbl_total_stock.sell_price,tbl_product_features.uniqcode as pf_uniqcode');
        $this->db->from('tbl_product');
        $this->db->join('tbl_product_features', 'tbl_product.uniqcode= tbl_product_features.product_id','inner');
        $this->db->join('tbl_total_stock', 'tbl_product_features.uniqcode= tbl_total_stock.product_features_id','inner');
        
        // $this->db->where('view_products.product_status','Active');
        // $this->db->where('view_products.pf_status','Active');
        $this->db->where('tbl_product.category_id',$category_id);
        $query = $this->db->get();
        $wishlist_product=$query->result_array();
        if($wishlist_product){
            return $wishlist_product;
        }
        else{
            return null;
        }
    }
    
    
    
    public function get_brand_product_search($query)
    {
        $this->db->select('brand_name');
        $this->db->from('view_products');
        $this->db->where('product_status', 'Active');
        $this->db->where('pf_status', 'Active');
        $this->db->group_start();
        $this->db->like('view_products.brand_name',$query,'both');
        $this->db->group_end();
        $this->db->group_by('brand_name');
        $query = $this->db->get();
        $brand_search=$query->result_array();
        if($brand_search){
            return $brand_search;
        }
        else{
            return null;
        }
    }
    
    public function get_category_brand($category_id)
    {
        $this->db->select('view_products.product_uniqcode as product_id,view_products.brand_name,view_products.category_id');
        $this->db->from('view_products');
        $this->db->where('view_products.product_status','Active');
        $this->db->where('view_products.pf_status','Active');
        $this->db->where('view_products.category_id',$category_id);
        $query = $this->db->get();
        $wishlist_product=$query->result_array();
        if($wishlist_product){
            return $wishlist_product;
        }
        else{
            return null;
        } 
    }
    
    public function get_category()
    {
        $this->db->select('category_name,category_image,id');
        $this->db->from('tbl_category');
        // $this->db->where('status','Active');
        $query = $this->db->get();
        $wishlist_product=$query->result_array();
        if($wishlist_product){
            return $wishlist_product;
        }
        else{
            return null;
        }
    }

        public function sizeColor($product_features_id){

        $this->db->select('size');
        $this->db->from('tbl_product_features');
        $this->db->where('tbl_product_features.uniqcode',$product_features_id);
        $query = $this->db->get();
        $product=$query->row();
        return $product;

    }

    public function special_product($limit)
    {
       $this->db->select('tbl_product_features.product_id,tbl_product_features.uniqcode as product_features_id, tbl_product.product_name,tbl_product_features.image,
            tbl_total_stock.mrp_price,tbl_total_stock.sell_price,tbl_product.category_id,tbl_product.slug,tbl_product_features.size');
        $this->db->from('tbl_product');
        $this->db->join('tbl_product_features', 'tbl_product.uniqcode= tbl_product_features.product_id','left');
        $this->db->join('tbl_total_stock', 'tbl_product_features.uniqcode= tbl_total_stock.product_features_id','inner');
        $this->db->where('tbl_product.status','Active');
        $this->db->where('tbl_product_features.admin_product_status','Active');
        $this->db->where('tbl_product.special_products','Yes');
        $this->db->group_by('tbl_product_features.product_id');
        if($limit!=0){
            $this->db->limit($limit);
        }
        $query = $this->db->get();
        $special_product=$query->result_array();

        if($special_product){
            return $special_product;
        }
        else{
            return null;
        } 
    }

    public function weekly_product($limit)
    {
       $this->db->select('tbl_product_features.product_id,tbl_product_features.uniqcode as product_features_id, tbl_product.product_name,tbl_product_features.image,
            tbl_total_stock.mrp_price,tbl_total_stock.sell_price,tbl_product.category_id,tbl_product.slug,tbl_product_features.size');
        $this->db->from('tbl_product');
        $this->db->join('tbl_product_features', 'tbl_product.uniqcode= tbl_product_features.product_id','left');
        $this->db->join('tbl_total_stock', 'tbl_product_features.uniqcode= tbl_total_stock.product_features_id','inner');
        $this->db->where('tbl_product.status','Active');
        $this->db->where('tbl_product_features.admin_product_status','Active');
        $this->db->where('tbl_product.best_sale','1');
        $this->db->group_by('tbl_product_features.product_id');
        if($limit!=0){
            $this->db->limit($limit);
        }
        $query = $this->db->get();
        $weekly_product=$query->result_array();

        if($weekly_product){
            return $weekly_product;
        }
        else{
            return null;
        } 
    }

    public function offer_product($limit)
    {
        $this->db->select('tbl_product_features.product_id,tbl_product_features.uniqcode as product_features_id, tbl_product.product_name,tbl_product_features.image,
            tbl_total_stock.mrp_price,tbl_total_stock.sell_price,tbl_product.category_id,tbl_product.slug,tbl_product_features.size');
        $this->db->from('tbl_product');
        $this->db->join('tbl_product_features', 'tbl_product.uniqcode= tbl_product_features.product_id','left');
        $this->db->join('tbl_total_stock', 'tbl_product_features.uniqcode= tbl_total_stock.product_features_id','inner');
        $this->db->where('tbl_product.status','Active');
        $this->db->where('tbl_product_features.admin_product_status','Active');
        $this->db->group_by('tbl_product_features.product_id');
        if($limit!=0){
            $this->db->limit($limit);
        }
        $query = $this->db->get();
        $offer_product=$query->result_array();

        if($offer_product){
            return $offer_product;
        }
        else{
            return null;
        } 
    }

    public function allSelectAddress_getRows($user_id)
    {
        
        $this->db->select('tbl_users_delivery_address.uniqcode,tbl_users_delivery_address.user_id,tbl_users_delivery_address.name,tbl_users_delivery_address.mobile_no,tbl_users_delivery_address.address_details,tbl_users_delivery_address.city_dist_town,tbl_users_delivery_address.state,tbl_users_delivery_address.pin_code,tbl_users_delivery_address.locality,tbl_users_delivery_address.landmark,tbl_users_delivery_address.alternative_mob_no');
        $this->db->from('tbl_users_delivery_address');
        $this->db->join('tbl_users', 'tbl_users.uniqcode = tbl_users_delivery_address.user_id', 'inner');

        $this->db->where('tbl_users_delivery_address.status','Active');
        $this->db->where('tbl_users.status','Active');
        $this->db->where('tbl_users_delivery_address.select_address','1');
        $this->db->where('tbl_users_delivery_address.user_id',$user_id);
        $query = $this->db->get();
        return $query->result();
    }

        public function rateReview($order_id)
        {
            $this->db->select('uniqcode,order_id,image,rating,review');
            $this->db->from('tbl_review');
            $this->db->where('tbl_review.status','Active');
            $query = $this->db->get();
            $rateReview=$query->result_array();
            return $rateReview;
        }

        public function rating_view($user_id,$product_id)
        {
            $this->db->select('*');
            $this->db->from('post_rating');
            $this->db->where('userid',$user_id);
            $this->db->where('postid',$product_id);
            $query = $this->db->get();
            $rateReview=$query->row();
            return $rateReview;
        }

        public function login_data_user($userId,$data){
            
        $this->db->select('tbl_users.id,tbl_users.name,tbl_users.email,tbl_users.mobile_no,
            tbl_users.image');
        $this->db->from('tbl_users');
        // $this->db->join('tbl_cart', 'tbl_cart.user_id= tbl_users.id','left');
        $this->db->where('tbl_users.status','Active');
        if($data=='Mobile'){

            $this->db->where('tbl_users.mobile_no',$userId);
        }
        else if($data=='Email'){
            $this->db->where('tbl_users.email ',$userId);
        }
        $query = $this->db->get();
        $data=$query->result_array();

        return $data;
    }
    
       public function login_data_vendor($userId,$data)
       {
            $this->db->select('tbl_buyer.id,tbl_buyer.buyer_code,tbl_buyer.buyer_phoneno,tbl_buyer.email_id,
                tbl_buyer.password,tbl_buyer.buyer_name');
            $this->db->from('tbl_buyer');
            // $this->db->join('tbl_cart', 'tbl_cart.user_id= tbl_users.id','left');
            $this->db->where('tbl_buyer.status','Vendor');
            if($data=='Mobile'){
    
                $this->db->where('tbl_buyer.buyer_phoneno',$userId);
            }
            else if($data=='Email'){
                $this->db->where('tbl_buyer.email_id ',$userId);
            }
            $query = $this->db->get();
            
            $data=$query->result_array();
            return $data;
    }

    public function rateReviewCount($product_id)
    {
        $fdata=array();
        $this->db->select('count(post_rating.id) as total_count');
        $this->db->from('post_rating');
        $this->db->join('tbl_product', 'tbl_product.uniqcode = post_rating.postid');
        $this->db->where('post_rating.rating','1');
        $this->db->where('tbl_product.uniqcode',$product_id);
        $fdata['one']=$this->db->get()->row()->total_count;
    

        $this->db->select('count(post_rating.id) as total_count');
        $this->db->from('post_rating');
        $this->db->join('tbl_product', 'tbl_product.uniqcode = post_rating.postid');
        $this->db->where('post_rating.rating','2');
        $this->db->where('tbl_product.uniqcode',$product_id);
        $fdata['two']=$this->db->get()->row()->total_count;

        $this->db->select('count(post_rating.id) as total_count');
        $this->db->from('post_rating');
        $this->db->join('tbl_product', 'tbl_product.uniqcode = post_rating.postid');
        $this->db->where('post_rating.rating','3');
        $this->db->where('tbl_product.uniqcode',$product_id);
        $fdata['three']=$this->db->get()->row()->total_count;

        $this->db->select('count(post_rating.id) as total_count');
        $this->db->from('post_rating');
        $this->db->join('tbl_product', 'tbl_product.uniqcode = post_rating.postid');
        $this->db->where('post_rating.rating','4');
        $this->db->where('tbl_product.uniqcode',$product_id);
        $fdata['four']=$this->db->get()->row()->total_count;

        $this->db->select('count(post_rating.id) as total_count');
        $this->db->from('post_rating');
        $this->db->join('tbl_product', 'tbl_product.uniqcode = post_rating.postid');
        $this->db->where('post_rating.rating','5');
        $this->db->where('tbl_product.uniqcode',$product_id);
        $fdata['five']=$this->db->get()->row()->total_count;

        $this->db->select('avg(post_rating.rating) as total_avg');
        $this->db->from('post_rating');
        $this->db->join('tbl_product', 'tbl_product.uniqcode = post_rating.postid');
        $this->db->where('tbl_product.uniqcode',$product_id);
        $fdata['avg']=$this->db->get()->row()->total_avg;
        
        return $fdata;
    }

    public function bill_product_details($order_uniqcode)
    {
        $this->db->select('tbl_order.*,view_products.product_name,view_products.gst_id,tbl_users.name as uname,tbl_users.email as uemail,tbl_users.mobile_no as umobile_no,tbl_users_delivery_address.*');
        $this->db->from('tbl_order');
        $this->db->join('view_products', 'view_products.pf_uniqcode=tbl_order.product_features_id', 'inner');
        $this->db->join('tbl_users', 'tbl_users.uniqcode=tbl_order.user_id', 'inner');
        $this->db->join('tbl_users_delivery_address', 'tbl_users_delivery_address.uniqcode=tbl_order.address_id', 'inner');
        $this->db->where('view_products.product_status','Active');
        $this->db->where('tbl_users.status','Active');
        $this->db->where('tbl_users_delivery_address.status','Active');
        $this->db->where('tbl_order.status','Delivered');
        $this->db->where('tbl_order.order_code',$order_uniqcode);
        $query = $this->db->get()->result();
        //echo $this->db->last_query();die();
        return $query;
    }
    
    public function userDetails_register($check1,$table)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($check1);
        $data=$this->db->get()->row();
        if(!empty($data))
        {
            return $data;
        }
        else
        {
            return false;
        }
    }
    
    public function get_price_filter()
    {
        $this->db->select('max(sell_price) as max_price,min(sell_price) as min_price');
        $this->db->from('view_products');
        $this->db->where('product_status', 'Active');
        $this->db->where('pf_status', 'Active');
        // $this->db->group_by('brand_name');
        $query = $this->db->get();
        return $query->result();
    }
    
    
    
    
    public function get_subcategory_data($category_id)
    {
        $this->db->select('subcategory_name,id');
        $this->db->from('tbl_subcategory');
        $this->db->where('category_id',$category_id);
        $query = $this->db->get();
        return $query->result();
        
    }
    
    public function order_show($user_id)
    {
        $limit = 1; $offset = 0;
        $this->db->select('tbl_order.id as code_id,tbl_order.order_id,tbl_order.user_id,tbl_order.order_date,tbl_order.delivery_status,tbl_order.product_id,tbl_order.product_name,tbl_order.product_qty,tbl_order.product_sale_price,tbl_order.product_id');
        $this->db->from('tbl_order');
        
       
        // $this->db->where('tbl_order.order_id',$order_id);
        $this->db->where('tbl_order.user_id',$user_id);
        // $this->db->group_by('tbl_order.order_id');
        // $this->db->group_by('tbl_productimage.product_id');
        $this->db->limit($limit, $offset);
        $this->db->order_by('tbl_order.id','desc');
        $query = $this->db->get();
        return $query->result();
    }
    
    public function product_search($buyer_id,$search_pro)
    {
        $this->db->select('tbl_byuerproduct.product_name,tbl_total_stock.product_id,tbl_byuerproduct.product_code,tbl_byuerproduct.buyer_id');
        $this->db->from('tbl_total_stock');
        $this->db->join('tbl_byuerproduct', 'tbl_total_stock.product_id= tbl_byuerproduct.id','inner');
        $this->db->where('tbl_byuerproduct.buyer_id',$buyer_id);
        $this->db->group_start();
        $this->db->like('tbl_byuerproduct.product_name',$search_pro,'both');
        $this->db->group_end();
        $query = $this->db->get();
        $product_search=$query->result();
        return $product_search;
    }
    
    public function product_show_vendor($buyer_id)
    {
        $this->db->select('tbl_byuerproduct.product_name,tbl_byuerproduct.product_code,tbl_byuerproduct.buyer_id,tbl_byuerproduct.id as product_id,tbl_byuerproduct.product_bye_rate,
        tbl_byuerproduct.bye_qty,tbl_byuerproduct.date');
        $this->db->from('tbl_byuerproduct');
        // $this->db->join('tbl_byuerproduct', 'tbl_total_stock.product_id= tbl_byuerproduct.id','inner');
        $this->db->where('tbl_byuerproduct.buyer_id',$buyer_id);
        $this->db->order_by('tbl_byuerproduct.id','desc');
        $query = $this->db->get();
        $product_search=$query->result();
        return $product_search; 
    }
    
    public function product_stock_vendor($buyer_id)
    {
        $this->db->select('tbl_byuerproduct.product_name,tbl_total_stock.product_code,tbl_total_stock.buyer_id,tbl_total_stock.product_id,tbl_total_stock.total_stock');
        $this->db->from('tbl_total_stock');
        $this->db->join('tbl_byuerproduct', 'tbl_total_stock.product_id= tbl_byuerproduct.id','inner');
        $this->db->where('tbl_total_stock.buyer_id',$buyer_id);
        $this->db->order_by('tbl_total_stock.total_stock');
        $query = $this->db->get();
        $product_search=$query->result();
        return $product_search;
    }

       

    
}
?>






