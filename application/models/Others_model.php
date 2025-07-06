<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Others_model extends CI_Model {


public function select_num_row ($db) {
    $query = $this->db->get($db);	
	if ($query->num_rows()>0) {
		return $query->num_rows();	
	} else {
		return false;	
	}
}


/********Row count *********/
public function row_count_no_where($db) {
	$this->db->select('*');
	$query = $this->db->get($db);	
	if ($query->num_rows()>0) {
		return $query->num_rows;
		//print_r($query->result());	
	} else {
		return false;	
	}
}


public function select_num_rows_where($db,$where) {
	$this->db->select('*');
	$this->db->where($where);
	$query = $this->db->get($db);	
	if ($query->num_rows()>0) {
		return $query->num_rows();
	} else {
		return false;	
	}
}

/************* member data all ************/
public function select_all1($db) {
	$query = $this->db->query('SELECT * FROM '.$db.'');
    
	//return $query->num_rows();
	return $query->result();
}

/************* member data all ************/
public function select_all($db) {
	$query = $this->db->get($db);	
	if ($num = $query->num_rows()>0) {
		return $query->result();
		//print_r($query->result());	
	} else {
		return false;	
	}
}


public function select_all_lim($db,$start,$end) {
    $this->db->limit($end,$start);
	$query = $this->db->get($db);
	
	//$this->db->order_by('id', 'ASC');
	if ($num = $query->num_rows()>0) {
		return $query->result();
		//print_r($query->result());	
	} else {
		return false;	
	}
}

/******** Select All Where *********/
public function select_all_where($db,$where) {
	$this->db->select('*');
	$this->db->where($where);
	$query = $this->db->get($db);	
	if ($query->num_rows()>0) {
		return $query->result();
		//print_r($query->result());	
	} else {
		return false;	
	}
}



/********Row count *********/
public function row_count($db,$where) {
	$this->db->select('*');
	$this->db->where($where);
	$query = $this->db->get($db);	
	if ($query->num_rows()>0) {
		return $query->num_rows;
		//print_r($query->result());	
	} else {
		return false;	
	}
}

/******** And  *********/
public function login($db,$where,$where1) {
	$this->db->select('*');
	$this->db->where($where);
	$this->db->where($where1);
	$query = $this->db->get($db);	
	if ($query->num_rows()>0) {
		return $query->result_array();
		//print_r($query->result_array());	
		
	} else {
		return false;	
	}
}


public function select_all_array($db) {
	$query = $this->db->get($db);	
	if ($query->num_rows()>0) {
		return $query->result_array();
		//print_r($query->row_array());	
	} else {
		return false;	
	}
}
/******** Select All Where *********/
public function select_all_where_array($db,$where) {
	$this->db->select('*');
	$this->db->where($where);
	$query = $this->db->get($db);	
	if ($query->num_rows()>0) {
		return $query->result_array();
		//print_r($query->result_array());
	} else {
		return false;	
	}
}

/*********** Insert ************/
public function insert($db,$add_array) {
	/*$data = array(
			'loan_type'      => $loan_type
	);*/
	$this->db->insert($db, $add_array);
	if($this->db->affected_rows() > 0){return true;} else {return false;}
}

/*********** Update ***********/
public function update($db,$field,$where) {
	$data = $field;
	/*array(
			'username'  => $member_name_edit,
			'phn'       => $member_phn_edit,
			'address'   => $member_address_edit,
			'status'    => $activation_status
	);*/
	$this->db->where($where);
	$this->db->update($db, $field);
	
	if($this->db->affected_rows() > 0){return true;} else {return false;}
}


/*********** Delete **********/
public function delete($db,$where) {
	$this->db->where($where);
	$this->db->delete($db);
	
	if($this->db->affected_rows() > 0){return true;} else {return false;}	
}

/*********** Delete **********/
public function delete_mul($db,$where,$where2) {
	$this->db->where($where);
	$this->db->where($where2);
	$this->db->where($where2);
	$this->db->delete($db);
	
	if($this->db->affected_rows() > 0){return true;} else {return false;}	
}


/*********** other_table_data_field_view_db *************/
public function other_table_data_field_view_db ($db,$where) {
	$this->db->select('*');
	$this->db->where($where);
	$query = $this->db->get($db);	
	if ($query->num_rows()>0) {
		return $query->result();
		//print_r($query->result());	
	} else {
		return false;	
	}	
	}
	
	
		//***********************Jason data use data fetch*******************//
	public function show_roll() {
        $query = $this->db->get('sm_personal_details');
        if ($query->num_rows() >0) {
            $row = $query->result();
            foreach ($row as $val) {
                $id         = $val->id;
                $username   = $val->username;
                $FirstName  = $val->FirstName;
                $MiddleName = $val->MiddleName;
                $LastName   = $val->LastName;
                $Age        = $val->Age;
                $EmailId    = $val->EmailId;
                $name_concat=$FirstName.' '.$MiddleName.' '.$LastName;
                
                    $query1 = $this->db->get_where('sm_role',array('username'=>$username));
                    if ($query1->num_rows() >0) {
                        $row1 = $query1->result();
                        foreach ($row1 as $val1) {
                            $role = $val1->role;
                            $active = $val1->active;
                        }
                    }
                
                $new[] = array('id'=>$id,'username'=>$username,'name'=>$name_concat,'age'=>$Age,'email'=>$EmailId,'role'=>$role,'active'=>$active);
                
            }
            return json_encode(array('data'=>$new));
            
        }
    }
    
    
    //********************ORDER BY DESC QUERY******************************//
      public function desc($db,$where,$where12){
          $this->db->select('*');
          $this->db->where($where);
		  $this->db->where($where12);
          $this->db->order_by('id', 'DESC');
          $this->db->limit('8');
          $query = $this->db->get($db);
          return $result = $query->result();
          
      }
      
      
      //********************ORDER BY DESC QUERY******************************//
      public function select_desc($db){
          $this->db->select('*');
          $this->db->order_by('id', 'DESC');
          $query = $this->db->get($db);
          return $result = $query->result();
          
      }
      
      
       //********************ORDER BY DESC QUERY******************************//
      public function desc123($db,$where){
          $this->db->select('*');
          $this->db->where($where);
          $this->db->order_by('id', 'DESC');
          $query = $this->db->get($db);
          return $result = $query->result();
          
      }
      
      
      //********************ORDER BY DESC QUERY******************************//
      public function desc123456789($db,$where){
          $this->db->select('*');
          $this->db->where($where);
          $this->db->order_by('id', 'DESC');
          //$this->db->limit('8');
          $query = $this->db->get($db);
          return $result = $query->result();
          
      }
      
      
      //********************ORDER BY DESC QUERY******************************//
      public function asc($db,$where){
          $this->db->select('*');
          $this->db->where($where);
          $this->db->order_by('id', 'ASC');
          $this->db->limit('1');
          $query = $this->db->get($db);
          return $result = $query->result();
          
      }
	  
	  //*********************custom query***********************//
	  public function customQuery($query = '') {
        //die($query);
        if (!empty($query)) {
            $result = $this->db->query($query)
                    ->result();
            return $result;
        }
        return false;
    }
	
	
	 //*********************custom query***********************//
	  public function customrowcount($query = '') {
        //die($query);
        if (!empty($query)) {
            $result = $this->db->query($query)
                    ->num_rows();
            return $result;
        }
        return false;
    }
	
	
	/******** And  order by*********/
public function and_desc($db,$where1,$where2) {
	$this->db->select('*');
	$this->db->where($where1);
	$this->db->where($where2);
	$this->db->order_by('id', 'DESC');
	$query = $this->db->get($db);	
	if ($query->num_rows()>0) {
		return $query->result();
		//print_r($query->result_array());	
		
	} else {
		return false;	
	}
}



/******** And  *********/
public function login123($db,$where,$where1,$where2) {
	$this->db->select('*');
	$this->db->where($where);
	$this->db->where($where1);
	$this->db->where($where2);
	$query = $this->db->get($db);	
	if ($query->num_rows()>0) {
		return $query->result_array();
		//print_r($query->result_array());	
		
	} else {
		return false;	
	}
}
public function get_last_product_code() 
{
	$this->db->select('product_code');
	$this->db->order_by('id', 'DESC');
	$this->db->limit(1);
	$query = $this->db->get('tbl_product');

	if ($query->num_rows() > 0) {
		return $query->row()->product_code;
	} else {
		return null;
	}
}


}

