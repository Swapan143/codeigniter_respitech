<?php
	/**
	 * 
	 */
	class Category_Model extends CI_Model
	{
		
		
		public function get_sub_category($uniqcode,$table)
		{
			$this->db->select('*');
			$this->db->where('uniqcode',$uniqcode);
			$this->db->from($table);
			$query = $this->db->get()->row();  
	      
	        return $query;
		}
	}
