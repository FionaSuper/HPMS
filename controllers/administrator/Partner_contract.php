<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Partner Contract Controller
*| --------------------------------------------------------------------------
*| Partner Contract site
*|
*/
class Partner_contract extends Admin	
{ 
	
	public function __construct() 
	{
		parent::__construct();

		$this->load->model('model_partner_contract');
	}

	public function index($offset = 0)
	{
		$this->is_allowed('partner_contract_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['partner_contracts'] = $this->model_partner_contract->get($filter, $field, $this->limit_page, $offset);
		$this->data['partner_contract_counts'] = $this->model_partner_contract->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/partner_contract/index/',
			'total_rows'   => $this->model_partner_contract->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Partner Contract List');
		$this->render('backend/standart/administrator/partner_contract/partner_contract_list', $this->data);
	}
	
	/**
	* Add new partner_contracts
	*
	*/

	public function add()
	{
		$this->is_allowed('partner_contract_add');

		
	    $this->data['partner_codes'] = $this->db->get('business_partner')->result();
	    $this->data['partner_codes_total'] = $this->db->count_all_results('business_partner');

	    $this->data['partner_code'] ='';
	    $this->data['partner_name'] = '';

		$this->template->title('Partner Contract New');
		$this->render('backend/standart/administrator/partner_contract/partner_contract_add', $this->data);
	}
	public function add_1($id){

		$this->is_allowed('partner_contract_add');

		if ($id!='') {
			$this->db->select('*');
			$this->db->where('PARTNER_CODE',$id);
			$query = $this->db->get('business_partner');
			$this->data['partner_name'] = $query->row();

		     $this->data['partner_code'] =$id;

		}else{
			$this->data['partner_code'] ='';
		   $this->data['partner_name'] = '';

		}
	    $this->data['partner_codes'] = $this->db->get('business_partner')->result();
	    $this->data['partner_codes_total'] = $this->db->count_all_results('business_partner');

		$this->template->title('Partner Contract New');
		$this->render('backend/standart/administrator/partner_contract/partner_contract_add', $this->data);

	}
	/**
	* Add New Partner Contracts
	*
	* @return JSON
	*/
	public function add_Contract(){
	  $partner_code = $this->input->get('partner_code');
	   $this->db->where('PARTNER_CODE',$partner_code);
	   $query = $this->db->get('business_partner');
	   $result = $query->row_array();
	   $this->data['Ename'] = $result['E_NAME'];
	  // get the partner name wtih partner code

	   echo json_encode($this->data);		
	}

	// public function term_contract(){ //two input parameters
	// 	$partner_code = $this->input->get('partner_code');
	// 	$save_status = ['STATUS' => 'Terminate'];
 //   		$this->db->where('PARTNER_CODE',$partner_code);
	// 	$query = $this->db->Update('partner_contract',$save_status);
 //        $result_num = $this->db->affected_rows();
 //        $this->data['affected_rows'] = $result_num;
	// 	$this->data['message'] = 'success';
	// 	echo json_encode($this->data);
	// }
	public function term_contract3(){ //three input parameters
		$partner_code = $this->input->get('partner_code');
		$CARD_TYPE = $this->input->get('CARD_TYPE');
		$save_status = ['STATUS' => 'Terminate'];
   		$this->db->where('PARTNER_CODE',$partner_code);
		$this->db->where('CARD_TYPE',$CARD_TYPE);
		$query = $this->db->Update('partner_contract',$save_status);
        $result_num = $this->db->affected_rows();
        $this->data['affected_rows'] = $result_num;
        $this->data['a'] = $partner_code;
        $this->data['c'] = $CARD_TYPE;
		$this->data['message'] = 'success';
		echo json_encode($this->data);
	}

  
  public function add_save()
	{
		if (!$this->is_allowed('partner_contract_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Sorry you do not have permission to access'
				]);
			exit;
		}


		 $this->form_validation->set_rules('PARTNER_CODE', 'Partner Code', 'trim|required');
		 
		 $user = _ent(ucwords(clean_snake_case(get_user_data('full_name'))));
	    
	    $today = date('Y-m-d H:i:s');

	if ($this->form_validation->run()) {
		$PARTNER_CODE = $this->input->post('PARTNER_CODE');
		$CARD_TYPEs = $this->input->post('CARD_TYPE');
		$START_DATE = $this->input->post('START_DATE');
		$TERM_DATE = $this->input->post('TERM_DATE');
	    $CONTRACT_NAME = $this->input->post('CONTRACT_NAME');
		$REMARK = $this->input->post('REMARK');


		$save_partner_contract = 0;  

		foreach ($CARD_TYPEs  as $key => $value) {
			if ($TERM_DATE[$key] =='') {
		 			$STATUS = 'Active';
		 	}
		 	else{ 
			 	if($TERM_DATE[$key] < $today){
			 	
			 		$STATUS = 'Terminate';
				 }
				 elseif ($START_DATE[$key] > $today ) {
			 		$STATUS = 'Not Start';
				 }
				 	else {
			 		$STATUS = 'Active';
			 	}
		 }
			if ($value) {
				 $save_data = [
				'PARTNER_CODE' => $PARTNER_CODE,
				'CARD_TYPE' => $CARD_TYPEs[$key],
				'CONTRACT_NAME' => $CONTRACT_NAME[$key],
				'START_DATE' => $START_DATE[$key],
				'TERM_DATE' =>$TERM_DATE[$key],
				'ORIGINAL_TERM_DATE' =>$TERM_DATE[$key],
				'REMARK' => $REMARK[$key],
				'STATUS' => $STATUS,
				'CREATOR'=> $user,
				'CREATE_DATE'=>$today,
				'LAST_MODIFIER' => $user,
				'LAST_UPDATE' => $today
			];

				$this->db->insert('partner_contract', $save_data);
				$save_partner_contract ++;
			}
			
		}
			if ($save_partner_contract) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['message'] = 'Your data has been successfully stored into the database. '.anchor('administrator/partner_contract', ' Go back to list  ') .'  or  '. anchor('administrator/Agreed_fee/add_2/'.$PARTNER_CODE.'/'.$CARD_TYPEs[0],'  ADD AGREED FEE TO '. $CONTRACT_NAME[0].'['.$CARD_TYPEs[0].']');
				} 
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = 'Data not change';
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = 'Data not change';
					$this->data['redirect'] = base_url('administrator/partner_contract');
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
		/**
	* Update view Partner Contracts
	*
	* @var $id String
	*/
	public function edit($id,$poli_no)
	{
		$this->is_allowed('partner_contract_update');
	    
	    //get the card 
	    $this->db->where('PARTNER_CODE',$id);
	    $this->db->where('CARD_TYPE',$poli_no);
		$query = $this->db->get('partner_contract');
		if($query->num_rows()>0){
		      $this->data['partner_contract'] = $query->row();
		  }else
		  {
		       return false;
     	  }
     	$this->data['status'] = $this->model_partner_contract->find_status($id);
		$this->template->title('Partner Contract Update');
		$this->render('backend/standart/administrator/partner_contract/partner_contract_update', $this->data);
	}

	/**
	* Update Partner Contracts
	*
	* @var $id String
	*/
	public function edit_save($id, $CARD_TYPE)
	{
		if (!$this->is_allowed('partner_contract_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Sorry you do not have permission to access'
				]);
			exit;
		}

		 $this->form_validation->set_rules('PARTNER_CODE', 'Partner Code', 'trim|required');

		$user = _ent(ucwords(clean_snake_case(get_user_data('full_name'))));

		$today = date('Y-m-d H:i:s');

				 $START_DATE = $this->input->post('START_DATE');
				 $TERM_DATE = $this->input->post('TERM_DATE');

				 if($TERM_DATE < $today){
				 	$STATUS = 'Terminate';
				 }
				 elseif ($START_DATE > $today ) {
				 	$STATUS = 'Not Start';
				 }
				 else {
				 	$STATUS = 'Active';
				 }
			    $this->db->where('PARTNER_CODE',$id);
			    $this->db->where('CARD_TYPE',$CARD_TYPE);
				$query = $this->db->get('partner_contract');
				$result = $query->row_array();
				$ORIGINAL_TERM_DATE = $result['ORIGINAL_TERM_DATE'];

				 if ($TERM_DATE>$ORIGINAL_TERM_DATE) {
				 	$extend = 1;
				 }else{
				 	$extend = 0;
				 }
		if ($this->form_validation->run()) {
		
			$save_data = [
				// 'START_DATE' => $this->input->post('START_DATE'),
				'CONTRACT_NAME' =>$this->input->post('CONTRACT_NAME'),
				'START_DATE'=>$this->input->post('START_DATE'),
				'TERM_DATE' => $this->input->post('TERM_DATE'),
				'STATUS' => $STATUS,
				'EXTEND_CONTRACT' =>$extend,
				'REMARK' => $this->input->post('REMARK')
			];

		        $this->db->where('PARTNER_CODE',$id);
		        $this->db->where('CARD_TYPE',$CARD_TYPE);
		        $query = $this->db->update('partner_contract',$save_data);
		        $save_partner_contract = $this->db->affected_rows();
		        

			if ($save_partner_contract) {
				 $today = date('Y-m-d H:i:s');

				$save_data2 =[ 
				    'LAST_MODIFIER' => $user,
					'LAST_UPDATE' => $today
					];
				$this->db->where('PARTNER_CODE', $id);
        		$this->db->update('partner_contract', $save_data2);

				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = 'Your data has been successfully updated into the database. '.anchor('administrator/business_partner/view/'.$id, ' Go back to Partner');
				} else {
					set_message('Your data has been successfully updated into the database. ', 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/partner_contract');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = 'Your data not change';
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = 'Data not change';
					$this->data['redirect'] = base_url('administrator/partner_contract');
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
	/**
	* delete Partner Contracts
	*
	* @var $id String
	*/
	public function delete($id)
	{
		$this->is_allowed('partner_contract_delete');

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
            set_message('Partner Contract has been deleted.', 'success');
		} else {
            set_message('Error delete partner_contract.', 'error');
		}

		redirect('administrator/partner_contract');
	}

		/**
	* View view Partner Contracts
	*
	* @var $id String
	*/
	public function view($id,$poli_no)
	{
		$this->is_allowed('partner_contract_view');
        
        $this->db->where('PARTNER_CODE',$id);
        $this->db->where('CARD_TYPE',$poli_no);
        $query = $this->db->get('partner_contract');
        if($query->num_rows()>0){
        	$this->data['partner_contract'] = $query->row();
        }else{
        	return false;
        }

		$this->template->title('Partner Contract Detail');
		$this->render('backend/standart/administrator/partner_contract/partner_contract_view', $this->data);
	}
	
	/**
	* delete Partner Contracts
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$partner_contract = $this->model_partner_contract->find($id);

		
		
		return $this->model_partner_contract->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('partner_contract_export');

		$this->model_partner_contract->export('partner_contract', 'partner_contract');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('partner_contract_export');

		$this->model_partner_contract->pdf('partner_contract', 'partner_contract');
	}
}


/* End of file partner_contract.php */
/* Location: ./application/controllers/administrator/Partner Contract.php */