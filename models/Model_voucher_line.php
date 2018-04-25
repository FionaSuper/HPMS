<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_voucher_line extends MY_Model {

	private $primary_key 	= 'VOUCHER_NO';
	private $table_name 	= 'voucher_line';
	private $field_search 	= ['BATCH_NO', 'BATCH_DATE', 'PARTNER_CODE', 'VOUCHER_NO', 'CLASS_CODE', 'TREATMENT_DATE', 'DR_CODE', 'COMPANY_DR_CODE', 'DR_E_NAME', 'DR_C_NAME', 'MEMBER_CODE', 'MEMBER_CLASS', 'MEMBER_HKID', 'MEMBER_E_NAME', 'MEMBER_C_NAME', 'MEMBER_STAFF_NO', 'DEPD_NAME', 'DEPD_CODE', 'SICK_LEAVE', 'SL_FROM', 'SL_TO', 'POLICY_NO', 'INSURED_NO', 'POLICY_YEAR', 'DP_TYPE', 'DIAG_CODE1', 'DIAG_CODE2', 'DIAG_CODE3', 'DIAG_CODE4', 'TYPE', 'REFERRAL_DR', 'REFERRAL_TYPE', 'CO_PAY', 'EXTRA_MED_BOL', 'EXTRA_MED', 'EXTRA_MED_REMARK', 'LAB_XRAY_BOL', 'LAB_XRAY', 'LAB_XRAY_CODE', 'SURGICAL_BOL', 'SURGICAL', 'SURGICAL_CODE', 'APPROVAL_CODE', 'FEE_AMT', 'OS_AMT', 'PAY_AMT', 'DR_CODE_DE', 'FEE_AMT_DE', 'PAY_AMT_DE', 'STATUS', 'ENTRY_TIME_DE', 'LAST_MODIFIER_VE', 'LAST_MODIFIER_DE'];

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
        $this->db->order_by($this->primary_key, "DESC");
		$query = $this->db->get($this->table_name);

		return $query->result();
	}

}

/* End of file Model_voucher_line.php */
/* Location: ./application/models/Model_voucher_line.php */