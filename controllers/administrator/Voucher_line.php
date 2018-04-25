<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Voucher Line Controller
*| --------------------------------------------------------------------------
*| Voucher Line site
*| 
*/ 
class Voucher_line extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_voucher_line');
	}

	/**
	* show all Voucher Lines
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('voucher_line_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['voucher_lines'] = $this->model_voucher_line->get($filter, $field, $this->limit_page, $offset);
		$this->data['voucher_line_counts'] = $this->model_voucher_line->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/voucher_line/index/',
			'total_rows'   => $this->model_voucher_line->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Voucher Line List');
		$this->render('backend/standart/administrator/voucher_line/voucher_line_list', $this->data);
	}
	
	/**
	* Add new voucher_lines
	*
	*/
	public function add()
	{
		$this->is_allowed('voucher_line_add');
		$this->template->title('Voucher Line New');

		$this->db->SELECT('PARTNER_CODE');
		$this->db->group_by('PARTNER_CODE');
		$query = $this->db->get('partner_contract');
		$this->data['PARTNER_CODE'] = $query->result();

		$this->render('backend/standart/administrator/voucher_line/voucher_line_add', $this->data);
	}
	public function getContractdata(){
		$PARTNER_CODE = $this->input->get('partner_code');

		$this->db->select('CARD_TYPE,CONTRACT_NAME');
		$this->db->where('PARTNER_CODE',$PARTNER_CODE);
		$this->data['CARD_TYPEs'] = $this->db->get('partner_contract')->result_array();

        $this->db->select('DR_CODE');
        $this->db->where('PARTNER_CODE',$PARTNER_CODE);
        $this->data['partner_doctors'] = $this->db->get('partner_doctor')->result_array();

        $this->db->select('PATIENT_NO');
        $this->db->where('PARTNER_CODE',$PARTNER_CODE);
      	$this->db->group_by('PATIENT_NO');
        $this->data['patients'] = $this->db->get('patient')->result_array();

        $this->db->select('DIAG_CODE_STANDARD');
        $this->db->where('PARTNER_CODE',$PARTNER_CODE);
        $diagnosis_code_standard = $this->db->get('business_partner')->row_array();
       	$diagnosis_code_standard = $diagnosis_code_standard['DIAG_CODE_STANDARD'];
   
        $this->db->select('DIAG_CODE,E_DESC');
        $this->db->where('DIAG_CODE_STANDARD',$diagnosis_code_standard);
        $this->data['diagnosis_code'] = $this->db->get('diagnosis_code')->result_array();

		echo json_encode($this->data);
	}

	public function getDoctorData(){
		$PARTNER_CODE = $this->input->get('partner_code');
		$doctor_code = $this->input->get('doctor_code');
		$card_type = $this->input->get('card_type');
		$this->db->select('PARTNER_DR_CODE,LOC_CODE');
		$this->db->where('PARTNER_CODE',$PARTNER_CODE);
		$this->db->where('DR_CODE',$doctor_code);
		$this->data['com_doctor'] = $this->db->get('partner_doctor')->result_array();

		$this->db->select('E_NAME,C_NAME');
		$this->db->where('DR_CODE',$doctor_code);
		$this->data['doctor_name'] = $this->db->get('doctor')->row_array();
        
        $this->db->select('doctor_special_fee.AUTO_NO, doctor_special_fee.CARD_TYPE, doctor_special_fee.DR_CODE, doctor_special_fee.TYPE,doctor_special_fee.MED_DAYS, doctor_special_fee.SPECIAL_FEE');
        $this->db->from('doctor_special_fee');
        $this->db->join('doctor','doctor.DR_CODE=doctor_special_fee.DR_CODE');
        $this->db->where('PARTNER_CODE',$PARTNER_CODE);
        $this->db->where('CARD_TYPE',$card_type);
        $this->db->where('doctor.DR_CODE',$doctor_code);
        $query =  $this->db->get();
        $this->data['special_fee'] = $query->result_array();

		echo json_encode($this->data);
	}

	public function getPatientdata(){
		$PARTNER_CODE = $this->input->get('partner_code');
		$PATIENT_NO  = $this->input->get('patient_code');
		$patient_id = $this->input->get('patient_id');

		$this->db->select('*');
		$this->db->where('PARTNER_CODE',$PARTNER_CODE);
		$this->db->where('PATIENT_NO',$PATIENT_NO);
		$this->data['patient'] =$this->db->get('patient')->row();

		$this->db->select('*');
		$this->db->where('PARTNER_CODE',$PARTNER_CODE);
		$this->db->where('HKID',$patient_id);
		$this->data['patient2'] =$this->db->get('patient')->row();

		echo json_encode($this->data);

	}

	public function getBenefitDate(){
	   $PARTNER_CODE = $this->input->get('partner_code');
	   $CARD_TYPE = $this->input->get('CARD_TYPE');

	   $this->db->select('TYPE');
	   $this->db->where('PARTNER_CODE',$PARTNER_CODE);
	   $this->db->where('CARD_TYPE', $CARD_TYPE);
	   $this->data['Benefit_TYPE'] = $this->db->get('agreed_fee')->result_array();

        $this->db->select('SURGICAL_RATING');
        $this->db->where('PARTNER_CODE',$PARTNER_CODE);
        $this->data['SURGICAL_RATE'] = $this->db->get('business_partner')->row_array();

		echo json_encode($this->data);
	}

	public function getCopay(){
	   $PARTNER_CODE = $this->input->get('partner_code');
	   $CARD_TYPE = $this->input->get('CARD_TYPE');
	   $TYPE = $this->input->get('type');
	   $this->db->select('*');
	   $this->db->where('PARTNER_CODE',$PARTNER_CODE);
	   $this->db->where('CARD_TYPE', $CARD_TYPE);
	   $this->db->where('TYPE',$TYPE);

	   $this->data['copay'] = $this->db->get('agreed_fee')->row_array();
	   echo json_encode($this->data);

	}

	public function getDiagnosisCode(){
		
	}
	/**
	* Add New Voucher Lines
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('voucher_line_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Sorry you do not have permission to access'
				]);
			exit;
		}

		$this->form_validation->set_rules('VOUCHER_NO', 'VOUCHER NO', 'trim|required');
		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'BATCH_NO' => $this->input->post('BATCH_NO'),
				'BATCH_DATE' => $this->input->post('BATCH_DATE'),
				'PARTNER_CODE' => $this->input->post('PARTNER_CODE'),
				'VOUCHER_NO' => $this->input->post('VOUCHER_NO'),
				'CLASS_CODE' => $this->input->post('CLASS_CODE'),
				'TREATMENT_DATE' => $this->input->post('TREATMENT_DATE'),
				'DR_CODE' => $this->input->post('DR_CODE'),
				'COMPANY_DR_CODE' => $this->input->post('COMPANY_DR_CODE'),
				'DR_E_NAME' => $this->input->post('DR_E_NAME'),
				'DR_C_NAME' => $this->input->post('DR_C_NAME'),
				'MEMBER_CODE' => $this->input->post('MEMBER_CODE'),
				'MEMBER_CLASS' => $this->input->post('MEMBER_CLASS'),
				'MEMBER_HKID' => $this->input->post('MEMBER_HKID'),
				'MEMBER_E_NAME' => $this->input->post('MEMBER_E_NAME'),
				'MEMBER_C_NAME' => $this->input->post('MEMBER_C_NAME'),
				'MEMBER_STAFF_NO' => $this->input->post('MEMBER_STAFF_NO'),
				'DEPD_NAME' => $this->input->post('DEPD_NAME'),
				'DEPD_CODE' => $this->input->post('DEPD_CODE'),
				'SICK_LEAVE' => $this->input->post('SICK_LEAVE'),
				'SL_FROM' => $this->input->post('SL_FROM'),
				'SL_TO' => $this->input->post('SL_TO'),
				'CARD_TYPE' => $this->input->post('CARD_TYPE'),
				'INSURED_NO' => $this->input->post('INSURED_NO'),
				'POLICY_YEAR' => $this->input->post('POLICY_YEAR'),
				'DP_TYPE' => $this->input->post('DP_TYPE'),
				'DIAG_CODE1' => $this->input->post('DIAG_CODE1'),
				'DIAG_CODE2' => $this->input->post('DIAG_CODE2'),
				'DIAG_CODE3' => $this->input->post('DIAG_CODE3'),
				'DIAG_CODE4' => $this->input->post('DIAG_CODE4'),
				'TYPE' => $this->input->post('TYPE'),
				'REFERRAL_DR' => $this->input->post('REFERRAL_DR'),
				'REFERRAL_TYPE' => $this->input->post('REFERRAL_TYPE'),
				'CO_PAY' => $this->input->post('CO_PAY'),
				'EXTRA_MED_BOL' => $this->input->post('EXTRA_MED_BOL'),
				'EXTRA_MED' => $this->input->post('EXTRA_MED'),
				'EXTRA_MED_REMARK' => $this->input->post('EXTRA_MED_REMARK'),
				'LAB_XRAY_BOL' => $this->input->post('LAB_XRAY_BOL'),
				'LAB_XRAY' => $this->input->post('LAB_XRAY'),
				'LAB_XRAY_CODE' => $this->input->post('LAB_XRAY_CODE'),
				'SURGICAL_BOL' => $this->input->post('SURGICAL_BOL'),
				'SURGICAL' => $this->input->post('SURGICAL'),
				'SURGICAL_CODE' => $this->input->post('SURGICAL_CODE'),
				'APPROVAL_CODE' => $this->input->post('APPROVAL_CODE'),
				'FEE_AMT' => $this->input->post('FEE_AMT'),
				'OS_AMT' => $this->input->post('OS_AMT'),
				'PAY_AMT' => $this->input->post('PAY_AMT'),
				'DR_CODE_DE' => $this->input->post('DR_CODE_DE'),
				'FEE_AMT_DE' => $this->input->post('FEE_AMT_DE'),
				'PAY_AMT_DE' => $this->input->post('PAY_AMT_DE'),
				'STATUS' => $this->input->post('STATUS'),
				'ENTRY_TIME_DE' => $this->input->post('ENTRY_TIME_DE'),
				'LAST_MODIFIER_VE' => $this->input->post('LAST_MODIFIER_VE'),
				'LAST_MODIFIER_DE' => $this->input->post('LAST_MODIFIER_DE'),
			];

			
			$save_voucher_line = $this->model_voucher_line->store($save_data);

			if ($save_voucher_line) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_voucher_line;
					$this->data['message'] = 'Your data has been successfully stored into the database. '.anchor('administrator/voucher_line/edit/' . $save_voucher_line, 'Edit Voucher Line').' or  '.anchor('administrator/voucher_line', ' Go back to list');
				} else {
					set_message('Your data has been successfully stored into the database. '.anchor('administrator/voucher_line/edit/' . $save_voucher_line, 'Edit Voucher Line'), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/voucher_line');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = 'Data not change';
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = 'Data not change';
					$this->data['redirect'] = base_url('administrator/voucher_line');
				}
			}

		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
		/**
	* Update view Voucher Lines
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('voucher_line_update');

		$this->data['voucher_line'] = $this->model_voucher_line->find($id);

		$this->template->title('Voucher Line Update');
		$this->render('backend/standart/administrator/voucher_line/voucher_line_update', $this->data);
	}

	/**
	* Update Voucher Lines
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('voucher_line_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Sorry you do not have permission to access'
				]);
			exit;
		}
		
		$this->form_validation->set_rules('VOUCHER_NO', 'VOUCHER NO', 'trim|required');
		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'BATCH_NO' => $this->input->post('BATCH_NO'),
				'BATCH_DATE' => $this->input->post('BATCH_DATE'),
				'PARTNER_CODE' => $this->input->post('PARTNER_CODE'),
				'VOUCHER_NO' => $this->input->post('VOUCHER_NO'),
				'CLASS_CODE' => $this->input->post('CLASS_CODE'),
				'TREATMENT_DATE' => $this->input->post('TREATMENT_DATE'),
				'DR_CODE' => $this->input->post('DR_CODE'),
				'COMPANY_DR_CODE' => $this->input->post('COMPANY_DR_CODE'),
				'DR_E_NAME' => $this->input->post('DR_E_NAME'),
				'DR_C_NAME' => $this->input->post('DR_C_NAME'),
				'MEMBER_CODE' => $this->input->post('MEMBER_CODE'),
				'MEMBER_CLASS' => $this->input->post('MEMBER_CLASS'),
				'MEMBER_HKID' => $this->input->post('MEMBER_HKID'),
				'MEMBER_E_NAME' => $this->input->post('MEMBER_E_NAME'),
				'MEMBER_C_NAME' => $this->input->post('MEMBER_C_NAME'),
				'MEMBER_STAFF_NO' => $this->input->post('MEMBER_STAFF_NO'),
				'DEPD_NAME' => $this->input->post('DEPD_NAME'),
				'DEPD_CODE' => $this->input->post('DEPD_CODE'),
				'SICK_LEAVE' => $this->input->post('SICK_LEAVE'),
				'SL_FROM' => $this->input->post('SL_FROM'),
				'SL_TO' => $this->input->post('SL_TO'),
				'CARD_TYPE' => $this->input->post('CARD_TYPE'),
				'INSURED_NO' => $this->input->post('INSURED_NO'),
				'POLICY_YEAR' => $this->input->post('POLICY_YEAR'),
				'DP_TYPE' => $this->input->post('DP_TYPE'),
				'DIAG_CODE1' => $this->input->post('DIAG_CODE1'),
				'DIAG_CODE2' => $this->input->post('DIAG_CODE2'),
				'DIAG_CODE3' => $this->input->post('DIAG_CODE3'),
				'DIAG_CODE4' => $this->input->post('DIAG_CODE4'),
				'TYPE' => $this->input->post('TYPE'),
				'REFERRAL_DR' => $this->input->post('REFERRAL_DR'),
				'REFERRAL_TYPE' => $this->input->post('REFERRAL_TYPE'),
				'CO_PAY' => $this->input->post('CO_PAY'),
				'EXTRA_MED_BOL' => $this->input->post('EXTRA_MED_BOL'),
				'EXTRA_MED' => $this->input->post('EXTRA_MED'),
				'EXTRA_MED_REMARK' => $this->input->post('EXTRA_MED_REMARK'),
				'LAB_XRAY_BOL' => $this->input->post('LAB_XRAY_BOL'),
				'LAB_XRAY' => $this->input->post('LAB_XRAY'),
				'LAB_XRAY_CODE' => $this->input->post('LAB_XRAY_CODE'),
				'SURGICAL_BOL' => $this->input->post('SURGICAL_BOL'),
				'SURGICAL' => $this->input->post('SURGICAL'),
				'SURGICAL_CODE' => $this->input->post('SURGICAL_CODE'),
				'APPROVAL_CODE' => $this->input->post('APPROVAL_CODE'),
				'FEE_AMT' => $this->input->post('FEE_AMT'),
				'OS_AMT' => $this->input->post('OS_AMT'),
				'PAY_AMT' => $this->input->post('PAY_AMT'),
				'DR_CODE_DE' => $this->input->post('DR_CODE_DE'),
				'FEE_AMT_DE' => $this->input->post('FEE_AMT_DE'),
				'PAY_AMT_DE' => $this->input->post('PAY_AMT_DE'),
				'STATUS' => $this->input->post('STATUS'),
				'ENTRY_TIME_DE' => $this->input->post('ENTRY_TIME_DE'),
				'LAST_MODIFIER_VE' => $this->input->post('LAST_MODIFIER_VE'),
				'LAST_MODIFIER_DE' => $this->input->post('LAST_MODIFIER_DE'),
			];

			
			$save_voucher_line = $this->model_voucher_line->change($id, $save_data);

			if ($save_voucher_line) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = 'Your data has been successfully updated into the database. '.anchor('administrator/voucher_line', ' Go back to list');
				} else {
					set_message('Your data has been successfully updated into the database. ', 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/voucher_line');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = 'Your data not change';
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = 'Data not change';
					$this->data['redirect'] = base_url('administrator/voucher_line');
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
	/**
	* delete Voucher Lines
	*
	* @var $id String
	*/
	public function delete($id)
	{
		$this->is_allowed('voucher_line_delete');

		$this->load->helper('file');

		$arr_id = $this->input->get('id');
		$remove = false;

		if (!empty($id)) {
			$remove = $this->_remove($id);
		} elseif (count($arr_id) >0) {
			foreach ($arr_id as $id) {
				$remove = $this->_remove($id);
			}
		}

		if ($remove) {
            set_message('Voucher Line has been deleted.', 'success');
		} else {
            set_message('Error delete voucher_line.', 'error');
		}

		redirect('administrator/voucher_line');
	}

		/**
	* View view Voucher Lines
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('voucher_line_view');

		$this->data['voucher_line'] = $this->model_voucher_line->find($id);

		$this->template->title('Voucher Line Detail');
		$this->render('backend/standart/administrator/voucher_line/voucher_line_view', $this->data);
	}
	
	/**
	* delete Voucher Lines
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$voucher_line = $this->model_voucher_line->find($id);

		
		
		return $this->model_voucher_line->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('voucher_line_export');

		$this->model_voucher_line->export('voucher_line', 'voucher_line');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('voucher_line_export');

		$this->model_voucher_line->pdf('voucher_line', 'voucher_line');
	}
}


/* End of file voucher_line.php */
/* Location: ./application/controllers/administrator/Voucher Line.php */