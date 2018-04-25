<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_doctor extends MY_Model {

	private $primary_key 	= 'DR_CODE';
	private $table_name 	= 'doctor';
	private $field_search 	= ['DR_CODE', 'E_TITLE', 'C_TITLE', 'E_NAME', 'C_NAME', 'GENDER', 'TYPE1', 'TYPE2', 'TYPE3', 'MOBILE', 'EMAIL', 'LANG', 'DOB', 'HKID', 'MPS_EXPIRY_DATE', 'APS_EXPIRY_DATE', 'BR_EXPIRY_DATE', 'GP_REG_NO', 'SP_REG_NO', 'SP_CODE1', 'SP_CODE2', 'SP_CODE3', 'SP_CODE4', 'JOIN_DATE', 'STATUS', 'REMARK'];
	private $cust_count = 0;
	
	public function __construct()
	{
		$config = array(
			'primary_key' 	=> $this->primary_key,
		 	'table_name' 	=> $this->table_name,
		 	'field_search' 	=> $this->field_search,
			'cust_count' => $this->cust_count,
		 );

		parent::__construct($config);
	}
	
	public function cust_count_all(){
		return $this->cust_count;
	}
	
	
/*
	public function count_all($filter = null, $field = null)
	{
		
		$where = NULL;
		$where2 = NULL;
		
		if ($field == "TEL" || $field == "FAX"){
			$where .= "(" . $field . " LIKE '%" . $filter . "%' )"; 
			
			$this->db->select("DR_CODE");
			$this->db->where($where);
			$query = $this->db->get("doctor_consult_hour")->result();
			
			foreach($query as $index=>$dr){
				
				if ($index == 0) {
	                $where2 .= "DR_CODE" . " LIKE '%" . $dr->DR_CODE . "%' ";
	            } else {
	                $where2 .= "OR " . "DR_CODE" . " LIKE '%" . $dr->DR_CODE . "%' ";
	            }
				
			}
			
			$this->db->where($where2);
			$query2 = $this->db->get("doctor");
			
			return $query2->num_rows();
		}
		
		$iterasi = 1;
        $num = count($this->field_search);
        $filter = $this->scurity($q);
		$field = $this->scurity($field);

        if (empty($field)) {
	        foreach ($this->field_search as $field) {
				
				if ($field != "TEL" && $field != "FAX"){
					if ($iterasi == 1) {
						$where .= $field . " LIKE '%" . $filter . "%' ";
					} else {
						$where .= "OR " . $field . " LIKE '%" . $filter . "%' ";
					}
					
					$iterasi++;
				}else{
					$iterasi++;
				}
	        }

	        $where = '('.$where.')';
        } else {
        	$where .= "(" . $field . " LIKE '%" . $filter . "%' )";
        }

		$this->db->where($where);
		$query = $this->db->get($this->table_name);

		return $query->num_rows();
	}
	
*/


	public function get($filters = null, $field = null, $limit = 0, $offset = 0, $select_field = [])
	{
		
        $where = NULL;
		
		$center_filter = ["CENTER_NAME", "TEL", "FAX"];
		
		foreach($filters as $key=>$filter){
			
			//where = null , meaning the condition may be the first filter
			if ($where == NULL){
				
				
				//Check if the user inputed condition
				if ($filter != NULL){
					
					$filter = mysqli_real_escape_string($this->db->conn_id, $filter);
					
					//Check whether the first condition belongs to 'center' table
					if (in_array($key, $center_filter)){
						
						//Check if user want to search center name
						if ($key == "CENTER_NAME"){
							$where .= " (center.E_NAME LIKE '%" . $filter . "%' OR center.C_NAME LIKE '%" . $filter . "%')";
						}else{
							$where .= " (center." . $key . " LIKE '%" . $filter . "%')";
						}
						
					}else{
						
						//if the first condition is NOT belongs to 'center' table
						
						//Check if user want to search doctor name
						if ($key == "DR_NAME"){
							$where .= " (doctor.E_NAME LIKE '%" . $filter . "%' OR doctor.C_NAME LIKE '%" . $filter . "%')";
						}else{
							$where .= " (doctor." . $key . " LIKE '%" . $filter . "%')";
						}
					}
				}
				
			}else{
				if ($filter != NULL){
					
					$filter = mysqli_real_escape_string($this->db->conn_id, $filter);
					
					//Check whether the condition belongs to 'center' table
					if (in_array($key, $center_filter)){
						
						if ($key == "CENTER_NAME"){
							$where .= " AND (center.E_NAME LIKE '%" . $filter . "%' OR center.C_NAME LIKE '%" . $filter . "%')";
						}else{
							$where .= " AND (center." . $key . " LIKE '%" . $filter . "%')";
						}
						
						
					}else{
						
						//if the condition is NOT belongs to 'center' table
						
						if ($key == "DR_NAME"){
							$where .= " AND (doctor.E_NAME LIKE '%" . $filter . "%' OR doctor.C_NAME LIKE '%" . $filter . "%')";
						}else{
							$where .= " AND (doctor." . $key . " LIKE '%" . $filter . "%')";
						}
						
					}
					
				}
				//End filter is NOT null quote
				
			}
			//End where is NOT null quote
			
		}
		//End foreach to write the where statement

		

		$selection = "doctor.DR_CODE as d_DR_CODE, doctor.E_TITLE as d_E_TITLE, doctor.C_TITLE, doctor.E_NAME, doctor.C_NAME, doctor.APS_EXPIRY_DATE, doctor.MPS_EXPIRY_DATE, doctor.BR_EXPIRY_DATE, 
		doctor.TERM_DATE, doctor.STATUS, center.CENTER_CODE, center.E_NAME as c_E_NAME, center.C_NAME as c_C_NAME, center.TEL as c_TEL, center.FAX as c_FAX";
		
		$this->db->select($selection);
		$this->db->from('doctor');
		$this->db->join('doctor_consult_hour', 'doctor_consult_hour.DR_CODE = doctor.DR_CODE', 'left');
		$this->db->join('center', 'center.CENTER_CODE = doctor_consult_hour.CENTER_CODE', 'left');
		if ($where != NULL){
			$this->db->where($where);
		}
		$this->db->limit($limit, $offset);
		$this->db->order_by("doctor.STATUS", "ASC");
        $this->db->order_by("doctor.DR_CODE", "ASC");
		$this->db->order_by("doctor_consult_hour.AUTO_NO", "ASC");
		$query = $this->db->get();
		
		
		//Count the total result 
		$selection = "doctor.DR_CODE as d_DR_CODE, doctor.E_TITLE as d_E_TITLE, doctor.C_TITLE, doctor.E_NAME, doctor.C_NAME, doctor.APS_EXPIRY_DATE, doctor.MPS_EXPIRY_DATE, doctor.BR_EXPIRY_DATE, 
		doctor.TERM_DATE, doctor.STATUS, center.CENTER_CODE, center.E_NAME as c_E_NAME, center.C_NAME as c_C_NAME, center.TEL as c_TEL, center.FAX as c_FAX";
		
		$this->db->select($selection);
		$this->db->from('doctor');
		$this->db->join('doctor_consult_hour', 'doctor_consult_hour.DR_CODE = doctor.DR_CODE', 'left');
		$this->db->join('center', 'center.CENTER_CODE = doctor_consult_hour.CENTER_CODE', 'left');
		if ($where != NULL){
			$this->db->where($where);
		}
		$count_query = $this->db->get();
		$this->cust_count = $count_query->num_rows();
		
		return $query->result();

	}

}

/* End of file Model_doctor.php */
/* Location: ./application/models/Model_doctor.php */