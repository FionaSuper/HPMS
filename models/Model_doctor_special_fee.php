<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_doctor_special_fee extends MY_Model {

	private $primary_key 	= 'AUTO_NO';
	private $table_name 	= 'doctor_special_fee';
	private $field_search 	= ['AUTO_NO', 'DR_CODE', 'PARTNER_CODE', 'TYPE', 'MED_DAYS', 'SPECIAL_FEE', 'REMARK'];

	public function __construct()
	{
		$config = array(
			'primary_key' 	=> $this->primary_key,
		 	'table_name' 	=> $this->table_name,
		 	'field_search' 	=> $this->field_search,
		 );

		parent::__construct($config);
	}
	
	public function cust_count_all(){
		return $this->cust_count;
	}

/*

	public function count_all($q = null, $field = null)
	{
		$iterasi = 1;
        $num = count($this->field_search);
        $where = NULL;
        $q = $this->scurity($q);
		$field = $this->scurity($field);

        if (empty($field)) {
	        foreach ($this->field_search as $field) {
	            if ($iterasi == 1) {
	                $where .= $field . " LIKE '%" . $q . "%' ";
	            } else {
	                $where .= "OR " . $field . " LIKE '%" . $q . "%' ";
	            }
	            $iterasi++;
	        }

	        $where = '('.$where.')';
        } else {
        	$where .= "(" . $field . " LIKE '%" . $q . "%' )";
        }

        $this->db->where($where);
		$query = $this->db->get($this->table_name);

		return $query->num_rows();
	}
	
*/

	public function get($filters = null, $field = null, $limit = 0, $offset = 0, $select_field = [])
	{
		$where = NULL;
		
		$contract_filter = ["CONTRACT_NAME", "STATUS"];

        foreach($filters as $key=>$filter){
			
			//where = null , meaning the condition may be the first filter
			if ($where == NULL){
				
				//Check if the user inputed condition
				if ($filter != NULL){
					
					$filter = mysqli_real_escape_string($this->db->conn_id, $filter);
					
					//Check whether the first condition belongs to 'partner contract' table
					if (in_array($key, $contract_filter)){

						$where .= " (partner_contract." . $key . " LIKE '%" . $filter . "%')";
						
					}else{
						
						$where .= " (doctor_special_fee." . $key . " LIKE '%" . $filter . "%')";

					}
				}
				
			}else{
				if ($filter != NULL){
					
					$filter = mysqli_real_escape_string($this->db->conn_id, $filter);
					
					//Check whether the condition belongs to 'partner contract' table
					if (in_array($key, $contract_filter)){
						
						$where .= " AND (partner_contract." . $key . " LIKE '%" . $filter . "%')";
						
					}else{
						
						//if the condition is NOT belongs to 'partner contract' table
						$where .= " AND (doctor_special_fee." . $key . " LIKE '%" . $filter . "%')";
						
					}
					
				}
				//End filter is NOT null quote
				
			}
			//End where is NOT null quote
			
		}
		//End foreach to write the where statement

		

		$this->db->select('doctor_special_fee.*, partner_contract.CONTRACT_NAME as CONTRACT_NAME, partner_contract.STATUS as STATUS');
		$this->db->from('doctor_special_fee');
		$this->db->join('partner_contract', 'partner_contract.PARTNER_CODE = doctor_special_fee.PARTNER_CODE', 'left');
		if ($where != NULL){
			$this->db->where($where);
		}
		$this->db->limit($limit, $offset);
		$this->db->order_by("partner_contract.STATUS", "ASC");
		$this->db->order_by("doctor_special_fee.DR_CODE", "ASC");
		$this->db->order_by("doctor_special_fee.PARTNER_CODE", "ASC");
		$this->db->order_by("doctor_special_fee.CARD_TYPE", "ASC");
		$query = $this->db->get();
		
		
		//Count the total result 
		$this->db->from('doctor_special_fee');
		$this->db->join('partner_contract', 'partner_contract.PARTNER_CODE = doctor_special_fee.PARTNER_CODE', 'left');
		if ($where != NULL){
			$this->db->where($where);
		}
		$count_query = $this->db->get();
		$this->cust_count = $count_query->num_rows();

		return $query->result();
	}

}

/* End of file Model_doctor_special_fee.php */
/* Location: ./application/models/Model_doctor_special_fee.php */