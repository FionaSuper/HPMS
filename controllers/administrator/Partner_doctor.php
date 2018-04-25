<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Partner Doctor Controller
*| --------------------------------------------------------------------------
*| Partner Doctor site
*|
*/
class Partner_doctor extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_partner_doctor');
	}

	/**
	* show all Partner Doctors
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('partner_doctor_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['partner_doctors'] = $this->model_partner_doctor->get($filter, $field, $this->limit_page, $offset);
		$this->data['partner_doctor_counts'] = $this->model_partner_doctor->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/partner_doctor/index/',
			'total_rows'   => $this->model_partner_doctor->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Partner Doctor List');
		$this->render('backend/standart/administrator/partner_doctor/partner_doctor_list', $this->data);
	}
	
	/**
	* Add new partner_doctors
	*
	*/
	public function add()
	{
		$this->is_allowed('partner_doctor_add');

		$this->data['partner_codes'] = $this->db->get('business_partner')->result();
	    $this->data['partner_codes_total'] = $this->db->count_all_results('business_partner');

	    $this->data['doctor_codes'] = $this->db->get('doctor')->result();
		$this->data['doctor_code_total'] = $this->db->count_all_results('doctor');

		$this->template->title('Partner Doctor New');
		$this->render('backend/standart/administrator/partner_doctor/partner_doctor_add', $this->data);
	}

	public function add_doctor_No(){
		$partner_code = $this->input->get('partner_code');
		$doctor_code= $this->input->get('doctor_code');
			
		$this->db->where("PARTNER_CODE", $partner_code);
		$this->db->order_by("PARTNER_CONTRACT_NO", "DESC");
		$this->db->order_by("STATUS", "ASC");
		$query2 = $this->db->get("partner_contract");
		
		if ($query2->num_rows() > 0){
			$this->data['has_contract'] = true;
			$this->data['partner_contract'] = $query2->result();
		}else{
			$this->data['has_contract'] = false;
		}

		echo json_encode($this->data);		
	}
	
	public function check_contract(){
		$partner_code = $this->input->get('partner_code');
		$dr_code = $this->input->get('dr_code');
		$partner_dr_code = $this->input->get('PARTNER_DR_CODE');
		$loc_code = $this->input->get('LOC_CODE');
		
		$this->db->where("DR_CODE", $dr_code);
		$this->db->where("PARTNER_CODE", $partner_code);
		$this->db->where("TERM_DATE", "");
		$this->db->or_where("TERM_DATE", NULL);
		$this->db->or_where("TERM_DATE", "0000-00-00");
		$query = $this->db->get("partner_doctor");
		
		if ($query->num_rows() > 0){
			return true;
		}else{
			$this->set_message('check_contract', 'This Partner Doctor already exists');
			return false;
		}
		
	}

	/**
	* Add New Partner Doctors
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('partner_doctor_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Sorry you do not have permission to access'
				]);
			exit;
		}

		 $this->form_validation->set_rules('PARTNER_CODE', 'Partner Code', 'trim|required');
		 $this->form_validation->set_rules('DR_CODE','Doctor code','trim|required');
		 $this->form_validation->set_rules('PARTNER_DR_CODE','Partner Dr Code','trim|required|alpha_dash|max_length[80]');
		 $this->form_validation->set_rules('LOC_CODE','Loc Code','trim|alpha_dash|max_length[80]');

		 $user = _ent(ucwords(clean_snake_case(get_user_data('full_name'))));
		 $today = date('Y-m-d H:i:s');

		if ($this->form_validation->run()) {
			
			$dr_code = $this->input->post('DR_CODE');
			$partner_code = $this->input->post('PARTNER_CODE');
			$partner_dr_code = $this->input->post('PARTNER_DR_CODE');
			$loc_code = $this->input->post('LOC_CODE');
			
			$this->db->where("DR_CODE", $dr_code);
			$this->db->where("PARTNER_CODE", $partner_code);
			$this->db->where("PARTNER_DR_CODE", $partner_dr_code);
			$this->db->where("LOC_CODE", $loc_code);
			$query = $this->db->get("partner_doctor");
			$exists_partner_doctor = false;
			
			if ($query->num_rows() > 0){
				$exists_partner_doctor = true;
				$save_partner_doctor = 0;
			}else{
				$save_data = [
					'PARTNER_CODE' => $partner_code,
					'DR_CODE' => $dr_code,
					'PARTNER_DR_CODE' => $this->input->post('PARTNER_DR_CODE'),
					'LOC_CODE' => $this->input->post('LOC_CODE'),
					'CREATOR'=> $user,
					'CREATE_DATE'=>$today,
					'LAST_MODIFIER'=>$user,
					'LAST_UPDATE'=>$today
				];
				
				$this->db->insert("partner_doctor", $save_data);
				
				$save_partner_doctor = $this->db->affected_rows();
			}


			if ($save_partner_doctor) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_partner_doctor;
					$this->data['message'] = 'Your data has been successfully stored into the database. '.anchor('administrator/partner_doctor/edit/' . $save_partner_doctor, 'Edit Partner Doctor').' or  '.anchor('administrator/partner_doctor', ' Go back to list');
				} else {
					set_message('Your data has been successfully stored into the database. '.anchor('administrator/partner_doctor/edit/' . $save_partner_doctor, 'Edit Partner Doctor'), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/partner_doctor');
				}
			} else {
				if ($exists_partner_doctor){
					$this->data['success'] = false;
					$this->data['message'] = 'Partner Doctor already existed';
				}else{
					if ($this->input->post('save_type') == 'stay') {
						$this->data['success'] = false;
						$this->data['message'] = 'Data not change';
					} else {
						$this->data['success'] = false;
						$this->data['message'] = 'Data not change';
						$this->data['redirect'] = base_url('administrator/partner_doctor');
					}
				}
				
			}
		}else{
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
		/**
	* Update view Partner Doctors
	*
	* @var $id String
	*/
	public function edit($partner_code, $doctor_code, $partner_dr_code, $loc_code)
	{
		$this->is_allowed('partner_doctor_update');
		
		if ($loc_code == "empty_loc"){
			$loc_code = "";
		}
		
		$this->db->where('PARTNER_CODE',$partner_code);
		$this->db->where('DR_CODE',$doctor_code);
		$this->db->where('PARTNER_DR_CODE',$partner_dr_code);
		$this->db->where('LOC_CODE',$loc_code);

		$query = $this->db->get('partner_doctor');
		$this->data['partner_doctor'] = $query->row();  
		
		$partner_doctor = $query->row();


		$this->template->title('Partner Doctor Update');
		$this->render('backend/standart/administrator/partner_doctor/partner_doctor_update', $this->data);
	}

	/**
	* Update Partner Doctors
	*
	* @var $id String
	*/
	public function edit_save($partner_code, $doctor_code, $partner_dr_code, $loc_code){

		if (!$this->is_allowed('partner_doctor_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Sorry you do not have permission to access'
				]);
			exit;
		}
		
		$user = _ent(ucwords(clean_snake_case(get_user_data('full_name'))));
		$today = date('Y-m-d H:i:s');
		
		if ($loc_code = "empty_loc"){
			$loc_code = "";
		}
		
		$term_date = $this->input->post('TERM_DATE');
		
		if ($term_date == ""){
			$term_date = null;
		}

		if (true) {

			$save_data = [
				'TERM_DATE' => $term_date,
			];
       	    
			$this->db->where('PARTNER_CODE', $partner_code);
			$this->db->where('DR_CODE', $doctor_code);
			$this->db->where('PARTNER_DR_CODE', $partner_dr_code);
			$this->db->where('LOC_CODE', $loc_code);
			
		    $this->db->update('partner_doctor', $save_data);
        	$save_partner_doctor = $this->db->affected_rows();
			

			if ($save_partner_doctor) {
				
			    $save_data2 =[ 
				    'LAST_MODIFIER' => $user,
					'LAST_UPDATE' => $today,
				];
				
				$this->db->where('PARTNER_CODE', $partner_code);
				$this->db->where('DR_CODE', $doctor_code);
				$this->db->where('PARTNER_DR_CODE', $partner_dr_code);
				$this->db->where('LOC_CODE', $loc_code);
				
			    $this->db->update('partner_doctor', $save_data2);
			}
			
			if ($save_partner_doctor){

				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $doctor_code;
					$this->data['message'] = 'Your data has been successfully updated into the database. '.anchor('administrator/partner_doctor', ' Go back to list');
				} else {
					set_message('Your data has been successfully updated into the database. ', 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/partner_doctor');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = 'Your data not change';
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = 'Data not change';
					$this->data['redirect'] = base_url('administrator/partner_doctor');
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
	/**
	* delete Partner Doctors
	*
	* @var $id String
	*/
	public function delete($id,$doctor_code, $No)
	{
		$this->is_allowed('partner_doctor_delete');

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
            set_message('Partner Doctor has been deleted.', 'success');
		} else {
            set_message('Error delete partner_doctor.', 'error');
		}

		redirect('administrator/partner_doctor');
	}

		/**
	* View view Partner Doctors
	*
	* @var $id String
	*/
	public function view($partner_code, $dr_code, $partner_dr_code, $loc_code)
	{
		$this->is_allowed('partner_doctor_view');
		
		if ($loc_code == "empty_loc"){
			$loc_code = "";
		}

		$this->db->where('PARTNER_CODE', $partner_code);
		$this->db->where('DR_CODE', $dr_code);
		$this->db->where('PARTNER_DR_CODE', $partner_dr_code);
		$this->db->where('LOC_CODE', $loc_code);
		$this->data['partner_doctor'] = $this->db->get('partner_doctor')->row();
	
		$this->template->title('Partner Doctor Detail');
		$this->render('backend/standart/administrator/partner_doctor/partner_doctor_view', $this->data);
	}
	
	/**
	* delete Partner Doctors
	*
	* @var $id String
	*/
	private function _remove($id,$doctor_code, $No)
	{
	   $this->db->where('PARTNER_CODE',$id);
		$this->db->where('DR_CODE',$doctor_code);
		$this->db->where('PARTNER_DR_CONTRACT_NO',$No);
		$partner_doctor = $this->db->get('partner_doctor');
		
		
		return $this->model_partner_doctor->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('partner_doctor_export');

		$this->model_partner_doctor->export('partner_doctor', 'partner_doctor');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('partner_doctor_export');

		$this->model_partner_doctor->pdf('partner_doctor', 'partner_doctor');
	}
}


/* End of file partner_doctor.php */
/* Location: ./application/controllers/administrator/Partner Doctor.php */