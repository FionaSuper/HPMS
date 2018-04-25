<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_business_partner extends MY_Model {

	private $primary_key 	= 'PARTNER_CODE';
	private $table_name 	= 'business_partner';
	private $field_search 	= ['PARTNER_CODE', 'E_NAME', 'C_NAME', 'JOIN_DATE', 'STATUS', 'E_ADDR1', 'E_ADDR2', 'E_ADDR3', 'E_ADDR4', 'E_ADDR5', 'E_DISTRICT', 'C_ADDR1', 'C_ADDR2', 'C_ADDR3', 'C_ADDR4', 'C_ADDR5', 'C_DISTRICT', 'BILLING_DEPT_NAME', 'SURGICAL_RATING', 'DIAG_CODE_STANDARD'];

	public function __construct()
	{
		$config = array(
			'primary_key' 	=> $this->primary_key,
		 	'table_name' 	=> $this->table_name,
		 	'field_search' 	=> $this->field_search,
		 );

		parent::__construct($config);
	}

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

	public function get($q = null, $field = null, $limit = 0, $offset = 0, $select_field = [])
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

        if (is_array($select_field) AND count($select_field)) {
        	$this->db->select($select_field);
        }

        $this->db->where($where);
        $this->db->limit($limit, $offset);
        $this->db->order_by($this->primary_key);
		$query = $this->db->get($this->table_name);

		return $query->result();
	}

	public function get_Filter_Result($id, $array,$table_name){

	  	 array_filter($array, function($value) { return $value !== ''; });

			if (count($array)>0) {
			    $this->db->select('*');
				$this->db->like($array);
				$this->db->where('PARTNER_CODE',$id);				
			    $query = $this->db->get($table_name);
			}else{
				$this->db->select('*');
				$this->db->where('PARTNER_CODE',$id);				
			    $query = $this->db->get($table_name);
			}
		   
			return  $query->result_array();

 		
	}
}

/* End of file Model_business_partner.php */
/* Location: ./application/models/Model_business_partner.php */