<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Card Controller
*| --------------------------------------------------------------------------
*| Card site
*|
*/
class Card extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_card');
	}

	/**
	* show all Cards
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('card_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['cards'] = $this->model_card->get($filter, $field, $this->limit_page, $offset);
		$this->data['card_counts'] = $this->model_card->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/card/index/',
			'total_rows'   => $this->model_card->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Card List');
		$this->render('backend/standart/administrator/card/card_list', $this->data);
	}
	
	/**
	* Add new cards
	*
	*/
	public function add()
	{
		$this->is_allowed('card_add');

		$this->template->title('Card New');
		$this->render('backend/standart/administrator/card/card_add', $this->data);
	}

	/**
	* Add New Cards
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('card_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Sorry you do not have permission to access'
				]);
			exit;
		}

		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'AUTO_NO' => $this->input->post('AUTO_NO'),
				'PARTNER_CODE' => $this->input->post('PARTNER_CODE'),
				'PARTNER_CONTRACT_NO' => $this->input->post('PARTNER_CONTRACT_NO'),
				'CARD_TYPE_CODE' => $this->input->post('CARD_TYPE_CODE'),
				'CARD_TYPE' => $this->input->post('CARD_TYPE'),
			];

			
			$save_card = $this->model_card->store($save_data);

			if ($save_card) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_card;
					$this->data['message'] = 'Your data has been successfully stored into the database. '.anchor('administrator/card/edit/' . $save_card, 'Edit Card').' or  '.anchor('administrator/card', ' Go back to list');
				} else {
					set_message('Your data has been successfully stored into the database. '.anchor('administrator/card/edit/' . $save_card, 'Edit Card'), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/card');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = 'Data not change';
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = 'Data not change';
					$this->data['redirect'] = base_url('administrator/card');
				}
			}

		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
		/**
	* Update view Cards
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('card_update');

		$this->data['card'] = $this->model_card->find($id);

		$this->template->title('Card Update');
		$this->render('backend/standart/administrator/card/card_update', $this->data);
	}

	/**
	* Update Cards
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('card_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Sorry you do not have permission to access'
				]);
			exit;
		}
		
		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'AUTO_NO' => $this->input->post('AUTO_NO'),
				'PARTNER_CODE' => $this->input->post('PARTNER_CODE'),
				'PARTNER_CONTRACT_NO' => $this->input->post('PARTNER_CONTRACT_NO'),
				'CARD_TYPE_CODE' => $this->input->post('CARD_TYPE_CODE'),
				'CARD_TYPE' => $this->input->post('CARD_TYPE'),
			];

			
			$save_card = $this->model_card->change($id, $save_data);

			if ($save_card) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = 'Your data has been successfully updated into the database. '.anchor('administrator/card', ' Go back to list');
				} else {
					set_message('Your data has been successfully updated into the database. ', 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/card');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = 'Your data not change';
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = 'Data not change';
					$this->data['redirect'] = base_url('administrator/card');
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
	/**
	* delete Cards
	*
	* @var $id String
	*/
	public function delete($id)
	{
		$this->is_allowed('card_delete');

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
            set_message('Card has been deleted.', 'success');
		} else {
            set_message('Error delete card.', 'error');
		}

		redirect('administrator/card');
	}

		/**
	* View view Cards
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('card_view');

		$this->data['card'] = $this->model_card->find($id);

		$this->template->title('Card Detail');
		$this->render('backend/standart/administrator/card/card_view', $this->data);
	}
	
	/**
	* delete Cards
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$card = $this->model_card->find($id);

		
		
		return $this->model_card->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('card_export');

		$this->model_card->export('card', 'card');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('card_export');

		$this->model_card->pdf('card', 'card');
	}
}


/* End of file card.php */
/* Location: ./application/controllers/administrator/Card.php */