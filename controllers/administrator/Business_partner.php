<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Business Partner Controller
*| --------------------------------------------------------------------------
*| Business Partner site
*| 
*/
class Business_partner extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_business_partner');
	}
  
	/**
	* show all Business Partners
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('business_partner_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['business_partners'] = $this->model_business_partner->get($filter, $field, $this->limit_page, $offset);
		$this->data['business_partner_counts'] = $this->model_business_partner->count_all($filter, $field);
		$config = [
			'base_url'     => 'administrator/business_partner/index/',
			'total_rows'   => $this->model_business_partner->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);
		$this->template->title('Business Partner List');
		$this->render('backend/standart/administrator/business_partner/business_partner_list', $this->data);
		log_message('error', 'Some variable did not contain a value.');
	}
	
	/**
	* Add new business_partners
	*
	*/

	public function add()
	{

		$this->is_allowed('business_partner_add');

		$this->db->select('DR_CODE');
		$this->data['doctor_codes'] = $this->db->get('doctor')->result();
		$this->data['doctor_code_total'] = $this->db->count_all_results('doctor');


		$this->db->select('DIAG_CODE_STANDARD');
		$this->db->group_by('DIAG_CODE_STANDARD');
		$this->data['diagnosis_codes'] = $this->db->get('diagnosis_code')->result();

		$this->template->title('Business Partner New');
		$this->render('backend/standart/administrator/business_partner/business_partner_add', $this->data);
	}

	/**
	* Add New Business Partners
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('business_partner_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Sorry you do not have permission to access'
				]);
			exit;
		}
 
		$this->form_validation->set_rules('PARTNER_CODE', 'Partner Code', 'trim|required');
		$this->form_validation->set_rules('BP_E_NAME', 'English Name', 'trim|required');
		$this->form_validation->set_rules('BP_C_NAME', 'Chinese Name', 'trim|max_length[80]');

	    $this->form_validation->set_rules('SURGICAL_RATING', 'Surgical Rate', 'trim|numeric');

	    $this->form_validation->set_rules('E_ADDR1', 'E ADDR1', 'trim|max_length[80]');
	    $this->form_validation->set_rules('E_ADDR2', 'E ADDR2', 'trim|max_length[80]');
	    $this->form_validation->set_rules('E_ADDR3', 'E ADDR3', 'trim|max_length[80]');
	    $this->form_validation->set_rules('E_ADDR4', 'E ADDR4', 'trim|max_length[80]');
	    $this->form_validation->set_rules('E_ADDR5', 'E ADDR5', 'trim|max_length[80]');
	    $this->form_validation->set_rules('E_DISTRICT', 'E DISTRICT', 'trim|max_length[80]');
	    $this->form_validation->set_rules('C_ADDR1', 'C ADDR1', 'trim|max_length[80]');
	    $this->form_validation->set_rules('C_ADDR2', 'C ADDR2', 'trim|max_length[80]');
	    $this->form_validation->set_rules('C_ADDR2', 'C ADDR3', 'trim|max_length[80]');
	    $this->form_validation->set_rules('C_ADDR2', 'C ADDR4', 'trim|max_length[80]');
	    $this->form_validation->set_rules('C_ADDR5', 'C ADDR5', 'trim|max_length[80]');
	    $this->form_validation->set_rules('C_DISTRICT', 'C DISTRICT', 'trim|max_length[80]');
	    $this->form_validation->set_rules('BILLING_DEPT_NAME', 'BILLING DEPT NAME', 'trim|max_length[80]');
	    $this->form_validation->set_rules('DIAG_CODE_STANDARD', 'DIAG CODE STANDARD', 'trim|max_length[80]');

 	
		if ($this->form_validation->run()) {
		    
		    $user = _ent(ucwords(clean_snake_case(get_user_data('full_name'))));

	           // $BP_START_DATE = $this->input->post('BP_START_DATE');
	           // $BP_TERM_DATE = $this->input->post('BP_TERM_DATE');
	           // 	$currentDate = date('Y-m-d');

	           // if ($currentDate < $BP_START_DATE) {
	           // 		 $BP_STATUS = 'Not Start';
	           // 	} 
	           // 	elseif ($currentDate > $BP_TERM_DATE) {
	           // 		 $BP_STATUS = 'Terminate';
	           // 	} 
	           // 	else{
	           // 		$BP_STATUS = 'Active';
	           // 	}   
	        $partner_code = $this->input->post('PARTNER_CODE');
	        $partner_name = $this->input->post('BP_E_NAME');
			$save_data = [
				'PARTNER_CODE' => $partner_code,
				'E_NAME' => $partner_name,
				'C_NAME' => $this->input->post('BP_C_NAME'),
				'JOIN_DATE' => $this->input->post('JOIN_DATE'),
				'E_ADDR1' => $this->input->post('E_ADDR1'),
				'E_ADDR2' => $this->input->post('E_ADDR2'),
				'E_ADDR3' => $this->input->post('E_ADDR3'),
				'E_ADDR4' => $this->input->post('E_ADDR4'),
				'E_ADDR5' => $this->input->post('E_ADDR5'),
				'E_DISTRICT' => $this->input->post('E_DISTRICT'),
				'C_ADDR1' => $this->input->post('C_ADDR1'),
				'C_ADDR2' => $this->input->post('C_ADDR2'),
				'C_ADDR3' => $this->input->post('C_ADDR3'),
				'C_ADDR4' => $this->input->post('C_ADDR4'),
				'C_ADDR5' => $this->input->post('C_ADDR5'),
				'C_DISTRICT' => $this->input->post('C_DISTRICT'),
				'BILLING_DEPT_NAME' => $this->input->post('BILLING_DEPT_NAME'),
				'SURGICAL_RATING' => $this->input->post('SURGICAL_RATING'),
				'DIAG_CODE_STANDARD' => $this->input->post('DIAG_CODE_STANDARD'),
				'CREATOR' =>$user,
				'CREATE_DATE' =>  date('Y-m-d H:i:s'),
				'LAST_MODIFIER' => $user,
				'LAST_UPDATE'	=>date('Y-m-d H:i:s')

			];
	
			//insert business partner contacts
			$Contact_E_NAME = $this->input->post('Contact_E_NAME');
			$Contact_C_NAME = $this->input->post('Contact_C_NAME');
		   // if(!empty(array_filter($Contact_E_NAME))){
					for ($i=0; $i <3 ; $i++) { 
						$save_contacts = [
						'CONTACT_NO' =>$i+1,
						'PARTNER_CODE' =>  $partner_code,
						'E_NAME' => $this->input->post('Contact_E_NAME['.$i.']'),
						'C_NAME' => $this->input->post('Contact_C_NAME['.$i.']'),
						'TITLE' =>$this->input->post('TITLE['.$i.']'),
						'DEPARTMENT' =>$this->input->post('DEPARTMENT['.$i.']'),
						'TEL' =>$this->input->post('TEL['.$i.']'),
						'FAX' =>$this->input->post('FAX['.$i.']'),
						'EMAIL' =>$this->input->post('EMAIL['.$i.']'),
						'CREATOR' =>$user,
						'CREATE_DATE' =>  date('Y-m-d H:i:s'),
						'LAST_MODIFIER' => $user,
						'LAST_UPDATE'	=>date('Y-m-d H:i:s')
						];
						$this->db->insert('partner_contact',$save_contacts);
					}
			// }
           
	           $doctor_code = $this->input->post('DR_CODE');
	           if (strlen(implode($doctor_code))!=0){
	           		foreach ($doctor_code as $key => $value) {
					// inset business partner Doctors
					$save_doctors =[
				 	'PARTNER_CODE' => $partner_code,
				 	'DR_CODE' => $this->input->post('DR_CODE['.$key.']'),
				 	'PARTNER_DR_CODE' => $this->input->post('PARTNER_DR_CODE['.$key.']'),
				 	'TERM_DATE' =>$this->input->post('D_TERM_DATE['.$key.']'),
				 	'LOC_CODE' =>$this->input->post('LOC_CODE['.$key.']'),
				    'CREATOR' =>$user,
					'CREATE_DATE' =>  date('Y-m-d H:i:s'),
					'LAST_MODIFIER' => $user,
					'LAST_UPDATE'	=>date('Y-m-d H:i:s')
					];
					$this->db->insert('partner_doctor', $save_doctors);
				}
	           }
 
			$save_business_partner = $this->model_business_partner->storeSpecial($save_data);

			if ($save_business_partner) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_business_partner;
					$this->data['message'] = 'Your data has been successfully stored into the database. '.anchor('administrator/business_partner/edit/' . $partner_code, 'Edit Business Partner').' or  '.anchor('administrator/business_partner', ' Go back to list').' or '.anchor('administrator/partner_contract/add_1/'.$partner_code ,'add card');
				} else {
					set_message('Your data has been successfully stored into the database. '.anchor('administrator/business_partner/edit/' . $$partner_code, 'Edit Business Partner'), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/business_partner');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = 'Data not change';
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = 'Data not change';
					$this->data['redirect'] = base_url('administrator/business_partner');
				}
			}

		} else { 
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
		/**
	* Update view Business Partners
	*
	* @var $id String
	*/
	public function edit($id)
	{
		date_default_timezone_set('Asia/Hong_Kong');
		
		$this->is_allowed('business_partner_update');

		$this->db->select('DIAG_CODE_STANDARD');
		$this->db->group_by('DIAG_CODE_STANDARD');
		$this->data['diagnosis_codes'] = $this->db->get('diagnosis_code')->result();

		$this->data['doctor_codes'] = $this->db->get('doctor')->result();
		$this->data['doctor_code_total'] = $this->db->count_all_results('doctor');
		$this->data['business_partner'] = $this->model_business_partner->find($id);
		$this->data['partner_contracts'] = $this->model_business_partner->find_all_partnerContracts($id)['results'];
		$this->data['partner_contract_counts'] = $this->model_business_partner->find_all_partnerContracts($id)['totals'];

		$this->data['partner_contacts'] = $this->model_business_partner->find_all_PartnerContacts($id)['results'];

	   	$this->data['partner_doctor_contracts'] = $this->model_business_partner->find_all_partnerDoctors($id)['results'];
		$this->data['partner_doctor_contract_counts'] = $this->model_business_partner->find_all_partnerDoctors($id)['totals'];
	   
	   	$this->data['BP_STATUS'] = $this->model_business_partner->find_status($id);

		$this->template->title('Business Partner Update');
		$this->render('backend/standart/administrator/business_partner/business_partner_update', $this->data);
	}

	/**
	* Update Business Partners
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('business_partner_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Sorry you do not have permission to access'
				]);
			exit;
		}
		
		
		$this->form_validation->set_rules('BP_E_NAME', 'English Name', 'trim|required|max_length[80]');
		$this->form_validation->set_rules('BP_C_NAME', 'Chinese Name', 'trim|max_length[80]');
	    $this->form_validation->set_rules('SURGICAL_RATING', 'Surgical Rate', 'trim|numeric');

	    $this->form_validation->set_rules('E_ADDR1', 'E ADDR1', 'trim|max_length[80]');
	    $this->form_validation->set_rules('E_ADDR2', 'E ADDR2', 'trim|max_length[80]');
	    $this->form_validation->set_rules('E_ADDR3', 'E ADDR3', 'trim|max_length[80]');
	    $this->form_validation->set_rules('E_ADDR4', 'E ADDR4', 'trim|max_length[80]');
	    $this->form_validation->set_rules('E_ADDR5', 'E ADDR5', 'trim|max_length[80]');
	    $this->form_validation->set_rules('E_DISTRICT', 'E DISTRICT', 'trim|max_length[80]');
	    $this->form_validation->set_rules('C_ADDR1', 'C ADDR1', 'trim|max_length[80]');
	    $this->form_validation->set_rules('C_ADDR2', 'C ADDR2', 'trim|max_length[80]');
	    $this->form_validation->set_rules('C_ADDR2', 'C ADDR3', 'trim|max_length[80]');
	    $this->form_validation->set_rules('C_ADDR2', 'C ADDR4', 'trim|max_length[80]');
	    $this->form_validation->set_rules('C_ADDR5', 'C ADDR5', 'trim|max_length[80]');
	    $this->form_validation->set_rules('C_DISTRICT', 'C DISTRICT', 'trim|max_length[80]');
	    $this->form_validation->set_rules('BILLING_DEPT_NAME', 'BILLING DEPT NAME', 'trim|max_length[80]');
	    $this->form_validation->set_rules('DIAG_CODE_STANDARD', 'DIAG CODE STANDARD', 'trim|max_length[80]');


   if ($this->form_validation->run()) {

		$JOIN_DATE =  $this->input->post('JOIN_DATE');
		if($JOIN_DATE == ''||$JOIN_DATE == NULL){
			$JOIN_DATE = null;
		}

		$user = _ent(ucwords(clean_snake_case(get_user_data('full_name'))));


			$save_data = [
				'E_NAME' => $this->input->post('BP_E_NAME'),
				'C_NAME' => $this->input->post('BP_C_NAME'),
				'JOIN_DATE' => $JOIN_DATE,
				'E_ADDR1' => $this->input->post('E_ADDR1'),
				'E_ADDR2' => $this->input->post('E_ADDR2'),
				'E_ADDR3' => $this->input->post('E_ADDR3'),
				'E_ADDR4' => $this->input->post('E_ADDR4'),
				'E_ADDR5' => $this->input->post('E_ADDR5'),
				'E_DISTRICT' => $this->input->post('E_DISTRICT'),
				'C_ADDR1' => $this->input->post('C_ADDR1'),
				'C_ADDR2' => $this->input->post('C_ADDR2'),
				'C_ADDR3' => $this->input->post('C_ADDR3'),
				'C_ADDR4' => $this->input->post('C_ADDR4'),
				'C_ADDR5' => $this->input->post('C_ADDR5'),
				'C_DISTRICT' => $this->input->post('C_DISTRICT'),
				'BILLING_DEPT_NAME' => $this->input->post('BILLING_DEPT_NAME'),
				'SURGICAL_RATING' => $this->input->post('SURGICAL_RATING'),
				'DIAG_CODE_STANDARD' => $this->input->post('DIAG_CODE_STANDARD'),
			];

			//insert business partner contacts
			// if(!empty(array_filter($Contact_E_NAME))&&!empty(array_filter($Contact_C_NAME))){

		    $CONTACT_NO = $this->input->post('CONTACT_NO');
		    $save_contacts_sum = 0;
			for ($i=0; $i <count( $CONTACT_NO) ; $i++) { 
						$save_contacts = [
							'E_NAME' =>$this->input->post('Contact_E_NAME['.$i.']'),
							'C_NAME' => $this->input->post('Contact_C_NAME['.$i.']'),
							'TITLE' => $this->input->post('TITLE['.$i.']'),
							'DEPARTMENT' =>$this->input->post('DEPARTMENT['.$i.']'),
							'TEL' =>$this->input->post('TEL['.$i.']'),
							'FAX' =>$this->input->post('FAX['.$i.']'),
							'EMAIL' =>$this->input->post('EMAIL['.$i.']')
						];
						$this->db->where('PARTNER_CODE',$id);
						$this->db->where('CONTACT_NO',$i+1);
						$this->db->update('partner_contact',$save_contacts);
						$res = $this->db->affected_rows();
						$save_contacts_sum =  $save_contacts_sum + $res;
					}

		    $new_contact = $this->input->post('CONTACT_NO_new');
		if ($new_contact>0) {
	 		for ($i=0; $i < count($new_contact); $i++) { 
						$save_contacts2 = [
								'PARTNER_CODE' =>$id,
								'CONTACT_NO' => $this->input->post('CONTACT_NO_new['.$i.']'),
								'E_NAME' => $this->input->post('Contact_E_NAME_new['.$i.']'),
								'C_NAME' => $this->input->post('Contact_C_NAME_new['.$i.']'),
								'TITLE' => $this->input->post('TITLE_new['.$i.']'),
								'DEPARTMENT' =>$this->input->post('DEPARTMENT_new['.$i.']'),
								'TEL' =>$this->input->post('TEL_new['.$i.']'),
								'FAX' =>$this->input->post('FAX_new['.$i.']'),
								'EMAIL' =>$this->input->post('EMAIL_new['.$i.']')
					];
							$this->db->insert('partner_contact',$save_contacts2);
							$res = $this->db->affected_rows();
							$save_contacts_sum =  $save_contacts_sum + $res;
			}
		}
    
			$save_business_partner = $this->model_business_partner->change($id, $save_data);
            

			if ($save_business_partner||$save_contacts_sum) {

				$currentTime = date('Y-m-d H:i:s');

				$save_data =[ 
				    'LAST_MODIFIER' => $user,
					'LAST_UPDATE' => $currentTime
					];
				$this->db->where('PARTNER_CODE', $id);
        		$this->db->update('business_partner', $save_data);
                
                for($i=0; $i<3 ; $i++){
                	$save_data1 =[ 
				    'LAST_MODIFIER' => $user, 
					'LAST_UPDATE' => $currentTime
					];
                	$this->db->where('PARTNER_CODE',$id);
					$this->db->where('CONTACT_NO',$i+1);
					$this->db->update('partner_contact',$save_data1);
                }
             
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = 'Your data has been successfully updated into the database. '.anchor('administrator/business_partner', ' Go back to list');
				} else {
					set_message('Your data has been successfully updated into the database. ', 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/business_partner');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = 'Your data not change';
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = 'Data not change';
					$this->data['redirect'] = base_url('administrator/business_partner');
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
	/**
	* delete Business Partners
	*
	* @var $id String
	*/
	public function delete($id)
	{
		$this->is_allowed('business_partner_delete');

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
            set_message('Business Partner has been deleted.', 'success');
		} else {
            set_message('Error delete business_partner.', 'error');
		}

		redirect('administrator/business_partner');
	}
 
		/**
	* View view Business Partners
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('business_partner_view');
		$this->data['business_partner'] = $this->model_business_partner->find($id);
		$this->data['partner_doctor_contracts'] = $this->model_business_partner->find_all_partnerDoctors($id)['results'];
		$this->data['partner_doctor_contract_counts'] = $this->model_business_partner->find_all_partnerDoctors($id)['totals'];

		$this->data['partner_contracts'] = $this->model_business_partner->find_all_partnerContracts($id)['results'];
		$this->data['partner_contract_counts'] = $this->model_business_partner->find_all_partnerContracts($id)['totals'];
        
	    $this->data['Active_BP_contract'] = $this->model_business_partner->getActiveBPContractNo($id);
	    
	   	$this->data['agreed_fees'] = $this->model_business_partner->find_Active_AgreedFee($id)['results'];
	   	$this->data['agreed_fee_counts'] = $this->model_business_partner->find_Active_AgreedFee($id)['totals'];

	   	$this->data['BP_STATUS'] = $this->model_business_partner->find_status($id);
		
		$this->data['partner_contacts'] = $this->model_business_partner->find_all_PartnerContacts($id)['results'];
	   	$this->data['partner_contact_counts'] = $this->model_business_partner->find_all_PartnerContacts($id)['totals'];
		$this->template->title('Business Partner Detail');
		$this->render('backend/standart/administrator/business_partner/business_partner_view', $this->data);
	}


    public function getCard(){
    	$partner_code = $this->input->get('partner_code');
    	$card_type = $this->input->get('card_type');
    	$status = $this->input->get('status');
        
        // array_push($selected_field,$card_type,$status);
    	$array = array('CARD_TYPE' => $card_type ,'STATUS' => $status);
        $table_name='partner_contract';
    	$result =$this->model_business_partner->get_Filter_Result($partner_code, $array, $table_name);

    	if (count($result)>0) {
         
    			$this->data['size'] = count($result);
        //get according agreed fee
        if (count($result)==1) {
     //    	  	$array = array('PARTNER_CODE'=>$partner_code,'CARD_TYPE'=>$CARD_TYPE);
 				$this->db->select('*');
 				$this->db->from('agreed_fee');
		        $this->db->where('PARTNER_CODE',$partner_code);
		        $this->db->where('CARD_TYPE',$card_type);
		        $query = $this->db->get();
				// $query="SELECT * FROM agreed_fee WHERE (PARTNER_CODE=? AND CARD_TYPE=?)";
		  		//$array = array();       
		 	    //$array = ['PARTNER_CODE' => $partner_code,'CARD_TYPE' =>$CARD_TYPE];
		  		//$result2 = $this->db->query($query,$array);
		        $this->data['result_fee'] = $query->result_array();
        }
        else{
        		$CARD_TYPE = array();
		        foreach ($result as $card) {
		        	array_push($CARD_TYPE, $card['CARD_TYPE']);
		        }
		        $CARD_TYPE= array_unique( $CARD_TYPE);
         		// $this->data['CARD_TYPE'] = 'A';

		        $this->db->select('*');
		        $this->db->where_in('CARD_TYPE', $CARD_TYPE);
		        $this->db->where('PARTNER_CODE',$partner_code);
		        $query = $this->db->get('agreed_fee');
		        $this->data['result_fee'] = $query->result_array();
 
        }

            $this->data['message']='success';
        	$this->data['filtered_cards'] = $result;


    	}


    	else{
    	 $this->data['message']='fail';
    	}

        // $this->data['filtered_cards'] = 'card1';
    	echo json_encode($this->data);
    }
    public function getCard_reset(){
    	$partner_code = $this->input->get('partner_code');

    	$this->db->select('*');
    	$this->db->FROM('partner_contract');
    	$this->db->where('PARTNER_CODE',$partner_code);
    	$query = $this->db->get();
    	$this->data['cards']=$query->result_array();


    	$this->db->select('*');
    	$this->db->from('agreed_fee');
    	$this->db->where('partner_code',$partner_code);
    	$query = $this->db->get();
    	$this->data['fees'] = $query->result_array();

    	echo json_encode($this->data);

  
    }

	public function getAgreedfee(){

		$partner_code = $this->input->get('partner_code');
		$card_type = $this->input->get('card_type_2');
		$m_type = $this->input->get('m_type');
		$array = array('CARD_TYPE' => $card_type ,'TYPE' =>$m_type);
		$table_name='agreed_fee';
		$this->data['selectedFees'] = $this->model_business_partner->get_Filter_Result($partner_code,$array,$table_name);
		echo json_encode($this->data);
	}
	
    // find filter2 result
	public function getAgreedfee2(){
		$partner_code = $this->input->get('partner_code');
		$selectedNo = $this->input->get('selectNo');
		$SelectedCARD_TYPE = $this->input->get('contract_name');

        if ($SelectedCARD_TYPE !='') {
        	$this->db->where('PARTNER_CODE',$partner_code);
	    	$this->db->where('PARTNER_CONTRACT_NO',$selectedNo);
	    	$this->db->where('CARD_TYPE',$SelectedCARD_TYPE);
	    	$query = $this->db->get('agreed_fee');
	    	if($query->num_rows()>0){
	    		$this->data['contract_filter_results'] = $query->result_array();
	        	$this->data['message'] = 'success';

	    	} else{
	    		$this->data['contract_filter_results'] =false;
	    	}

        } else{
        	$this->db->where('PARTNER_CODE',$partner_code);
	    	$this->db->where('PARTNER_CONTRACT_NO',$selectedNo);
	    	$query = $this->db->get('agreed_fee');
	    	 if($query->num_rows()>0){
	    		$this->data['contract_filter_results'] = $query->result_array();
	        	$this->data['message'] = 'success';

	    	} else{
	    		$this->data['contract_filter_results'] =false;
	    	}

        }

		echo json_encode($this->data);

	}
	/**
	* delete Business Partners
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$business_partner = $this->model_business_partner->find($id);

		
		
		return $this->model_business_partner->remove($id);
	}
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('business_partner_export');

		$this->model_business_partner->export('business_partner', 'business_partner');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('business_partner_export');

		$this->model_business_partner->pdf('business_partner', 'business_partner');
	}
}


/* End of file business_partner.php */
/* Location: ./application/controllers/administrator/Business Partner.php */