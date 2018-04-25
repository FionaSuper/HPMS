<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Doctor Special Fee Controller
*| --------------------------------------------------------------------------
*| Doctor Special Fee site
*|
*/
class Doctor_special_fee extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_doctor_special_fee');
	}

	/**
	* show all Doctor Special Fees
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('doctor_special_fee_list');

		$field 	= "";
		
		$filters["DR_CODE"] = $this->input->get('DR_CODE');
		$filters["PARTNER_CODE"] = $this->input->get('PARTNER_CODE');
		$filters["CARD_TYPE"] = $this->input->get('CARD_TYPE');
		$filters["CONTRACT_NAME"] = $this->input->get('CONTRACT_NAME');
		$filters["TYPE"] = $this->input->get('TYPE');
		$filters["MED_DAYS"] = $this->input->get('MED_DAYS');
		$filters["SPECIAL_FEE"] = $this->input->get('SPECIAL_FEE');
		$filters["REMARK"] = $this->input->get('REMARK');
		$filters["STATUS"] = $this->input->get('STATUS');

		$this->data['doctor_special_fees'] = $this->model_doctor_special_fee->get($filters, $field, $this->limit_page, $offset);
		$this->data['doctor_special_fee_counts'] = $this->model_doctor_special_fee->cust_count_all();

		$config = [
			'base_url'     => 'administrator/doctor_special_fee/index/',
			'total_rows'   => $this->model_doctor_special_fee->cust_count_all(),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Doctor Special Fee List');
		$this->render('backend/standart/administrator/doctor_special_fee/doctor_special_fee_list', $this->data);
	}
	
	public function search_doctor_detail(){
		$dr_code = $this->input->get("dr_code");
		
		//Find the contract belongs to this doctor
		$this->db->where("DR_CODE", $dr_code);
		$this->db->group_by("PARTNER_CODE");
		$query = $this->db->get("partner_doctor");
		
		if ($query->num_rows() > 0){
			$this->data['has_doctor_partner'] = true;
			$this->data['doctor_partner'] = $query->result();
			$first_doctor_partner = $query->row();

			//Find the doctor type
			$this->db->select("TYPE1, TYPE2, TYPE3");
			$this->db->where("DR_CODE", $dr_code);
			
			$query2 = $this->db->get("doctor");
			$this->data['doctor_type'] = $query2->row();
			$doctor_type = $query2->row();
			
			//Find the partner contract
			$this->db->where("PARTNER_CODE", $first_doctor_partner->PARTNER_CODE);
			$this->db->where("STATUS", "Active");
			$query3 = $this->db->get("partner_contract");
			
			if ($query3->num_rows() > 0){
				$this->data['has_partner_contract'] = true;
				$this->data['partner_contract'] = $query3->result();
				$first_contract = $query3->row();
				
				//Find the med days selection
				$type1 = $doctor_type->TYPE1;

				$this->db->where("PARTNER_CODE", $first_contract->PARTNER_CODE);
				$this->db->where("CARD_TYPE", $first_contract->CARD_TYPE);
				$this->db->where("TYPE", $type1);
				$this->db->group_by("MED_DAYS");
				
				$query4 = $this->db->get("agreed_fee");
				
				if ($query4->num_rows() > 0){
					$this->data['has_med_days'] = true;
					$this->data['med_days'] = $query4->result();
				}else{
					$this->data['has_med_days'] = false;
				}
				
			}else{
				$this->data['has_partner_contract'] = false;
			}
			
			
		}else{
			$this->data['has_doctor_partner'] = false;
		}
		
		echo json_encode($this->data);
	}
	
	public function search_specific_meddays(){
		$partner_code = $this->input->get("partner_code");
		$card_type = $this->input->get("card_type");
		$type = $this->input->get("type");
		
		$this->db->where("PARTNER_CODE", $partner_code);
		$this->db->where("CARD_TYPE", $card_type);
		$this->db->where("TYPE", $type);
		$this->db->group_by("MED_DAYS");
		
		$query = $this->db->get('agreed_fee');
		
		if ($query->num_rows() > 0){
			$this->data['has_s_med_days'] = true;
			$this->data['s_med_days'] = $query->result();
		}else{
			$this->data['has_s_med_days'] = false;
		}
		
		echo json_encode($this->data);
	}

	
	public function search_partner_contract(){
		$partner_code = $this->input->get("partner_code");
		$type = $this->input->get("type");
		
		$this->db->where("PARTNER_CODE", $partner_code);
		$this->db->where("STATUS", "Active");
		$query = $this->db->get("partner_contract");
		
		if ($query->num_rows() > 0){
			$this->data['has_partner_contract'] = true;
			$this->data['partner_contract'] = $query->result();
			
			$partner_contract = $query->row();
			
			$this->db->where("PARTNER_CODE", $partner_code);
			$this->db->where("CARD_TYPE", $partner_contract->CARD_TYPE);
			$this->db->where("TYPE", $type);
			$this->db->group_by("MED_DAYS");
			
			$query = $this->db->get('agreed_fee');
			
			if ($query->num_rows() > 0){
				$this->data['has_s_med_days'] = true;
				$this->data['s_med_days'] = $query->result();
			}else{
				$this->data['has_s_med_days'] = false;
			}

		}else{
			$this->data['has_partner_contract'] = false;
		}
		
		echo json_encode($this->data);
	}
	
	/**
	* Add new doctor_special_fees
	*
	*/
	public function add()
	{
		$this->is_allowed('doctor_special_fee_add');

		$this->template->title('Doctor Special Fee New');
		$this->render('backend/standart/administrator/doctor_special_fee/doctor_special_fee_add', $this->data);
	}

	/**
	* Add New Doctor Special Fees
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('doctor_special_fee_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Sorry you do not have permission to access'
				]);
			exit;
		}

		$this->form_validation->set_rules('DR_CODE', 'Dr Code', 'trim|required');
		$this->form_validation->set_rules('PARTNER_CODE', 'Contract No', 'trim|required');
		$this->form_validation->set_rules('CARD_TYPE', 'Contract No', 'trim|required');
		$this->form_validation->set_rules('TYPE', 'Type', 'trim|required');
		$this->form_validation->set_rules('MED_DAYS', 'Med Days', 'trim|required|integer|max_length[3]');
		$this->form_validation->set_rules('SPECIAL_FEE', 'Special Fee', 'trim|required|integer|max_length[5]');
		$this->form_validation->set_rules('REMARK', 'Remark', 'trim|max_length[80]');
		
		$user = _ent(ucwords(clean_snake_case(get_user_data('full_name'))));
		
		$dr_code = $this->input->post('DR_CODE');
		$partner_code = $this->input->post('PARTNER_CODE');
		$card_type = $this->input->post('CARD_TYPE');
		$type = $this->input->post('TYPE');
		$med_days = $this->input->post('MED_DAYS');
		
		$this->db->where("DR_CODE", $dr_code);
		$this->db->where("PARTNER_CODE", $partner_code);
		$this->db->where("CARD_TYPE", $card_type);
		$this->db->where("TYPE", $type);
		$this->db->where("MED_DAYS", $med_days);
		
		$query = $this->db->get('doctor_special_fee');
		
		if ($query->num_rows() > 0){
			$exist_fee = true;
		}else{
			$exist_fee = false;
		}
		

		if ($this->form_validation->run() && !$exist_fee) {
		
			$save_data = [
				'DR_CODE' => $dr_code,
				'PARTNER_CODE' => $partner_code,
				'CARD_TYPE' => $card_type,
				'TYPE' => $type,
				'MED_DAYS' => $med_days,
				'SPECIAL_FEE' => $this->input->post('SPECIAL_FEE'),
				'REMARK' => $this->input->post('REMARK'),
				'CREATOR' => $user,
				'CREATE_DATE' => date('Y-m-d H:i:s'),
				'LAST_MODIFIER' => $user,
			];

			
			$save_doctor_special_fee = $this->model_doctor_special_fee->store($save_data);

			if ($save_doctor_special_fee) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_doctor_special_fee;
					$this->data['message'] = 'Your data has been successfully stored into the database. '.anchor('administrator/doctor_special_fee/edit/' . $save_doctor_special_fee, 'Edit Doctor Special Fee').' or  '.anchor('administrator/doctor_special_fee', ' Go back to list');
				} else {
					set_message('Your data has been successfully stored into the database. '.anchor('administrator/doctor_special_fee/edit/' . $save_doctor_special_fee, 'Edit Doctor Special Fee'), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/doctor_special_fee');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = 'Data not change';
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = 'Data not change';
					$this->data['redirect'] = base_url('administrator/doctor_special_fee');
				}
			}

		} else if ($exist_fee) {
			$this->data['success'] = false;
			$this->data['message'] = "Cannot insert an existing special fee";
		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
		/**
	* Update view Doctor Special Fees
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('doctor_special_fee_update');
		
		$this->db->where("AUTO_NO", $id);
		$special_fee = $this->db->get("doctor_special_fee")->row();
		
		$this->db->where("DR_CODE", $special_fee->DR_CODE);
		$this->db->where("PARTNER_CODE", $special_fee->PARTNER_CODE);
		$this->data['partner_doctor'] = $this->db->get("partner_doctor")->row();
		
		$this->db->where("PARTNER_CODE", $special_fee->PARTNER_CODE);
		$this->db->where("CARD_TYPE", $special_fee->CARD_TYPE);
		$this->data['partner_contract'] = $this->db->get("partner_contract")->row();
		

		$this->data['doctor_special_fee'] = $this->model_doctor_special_fee->find($id);

		$this->template->title('Doctor Special Fee Update');
		$this->render('backend/standart/administrator/doctor_special_fee/doctor_special_fee_update', $this->data);
	}

	/**
	* Update Doctor Special Fees
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('doctor_special_fee_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Sorry you do not have permission to access'
				]);
			exit;
		}

		$this->form_validation->set_rules('SPECIAL_FEE', 'Special Fee', 'trim|required|integer|max_length[5]');
		$this->form_validation->set_rules('REMARK', 'Remark', 'trim|max_length[80]');
		
		$user = _ent(ucwords(clean_snake_case(get_user_data('full_name'))));

		if ($this->form_validation->run()) {
		
			$save_data = [
				'SPECIAL_FEE' => $this->input->post('SPECIAL_FEE'),
				'REMARK' => $this->input->post('REMARK'),
			];
			
			$save_doctor_special_fee = $this->model_doctor_special_fee->change($id, $save_data);
			
			if ($save_doctor_special_fee){
				$save_data12 = [
					'LAST_MODIFIER' => $user,
					'LAST_UPDATE' => date('Y-m-d H:i:s'),
				];
				
				$this->db->where('AUTO_NO', $id);
				$this->db->update('doctor_special_fee', $save_data12);
			}
			

			if ($save_doctor_special_fee) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = 'Your data has been successfully updated into the database. '.anchor('administrator/doctor_special_fee', ' Go back to list');
				} else {
					set_message('Your data has been successfully updated into the database. ', 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/doctor_special_fee');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = 'Your data not change';
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = 'Data not change';
					$this->data['redirect'] = base_url('administrator/doctor_special_fee');
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
	/**
	* delete Doctor Special Fees
	*
	* @var $id String
	*/
	public function delete($id)
	{
		$this->is_allowed('doctor_special_fee_delete');

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
            set_message('Doctor Special Fee has been deleted.', 'success');
		} else {
            set_message('Error delete doctor_special_fee.', 'error');
		}

		redirect('administrator/doctor_special_fee');
	}

		/**
	* View view Doctor Special Fees
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('doctor_special_fee_view');

		$this->data['doctor_special_fee'] = $this->model_doctor_special_fee->find($id);

		$this->template->title('Doctor Special Fee Detail');
		$this->render('backend/standart/administrator/doctor_special_fee/doctor_special_fee_view', $this->data);
	}
	
	/**
	* delete Doctor Special Fees
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$doctor_special_fee = $this->model_doctor_special_fee->find($id);

		
		
		return $this->model_doctor_special_fee->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('doctor_special_fee_export');

		$this->model_doctor_special_fee->export('doctor_special_fee', 'doctor_special_fee');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('doctor_special_fee_export');

		$this->model_doctor_special_fee->pdf('doctor_special_fee', 'doctor_special_fee');
	}
}


/* End of file doctor_special_fee.php */
/* Location: ./application/controllers/administrator/Doctor Special Fee.php */