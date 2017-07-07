<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Assignments extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Assignments_model');
        $this->load->library('form_validation');

        if(!$this->session->userdata('is_logged_in')){
            redirect('login');
        }
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'assignments/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'assignments/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'assignments/index.html';
            $config['first_url'] = base_url() . 'assignments/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Assignments_model->total_rows($q);
        $assignments = $this->Assignments_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'assignments_data' => $assignments,
            'q' => $q,
            'pagination' 	=> $this->pagination->create_links(),
            'total_rows' 	=> $config['total_rows'],
            'start' 		=> $start,
            'main_content'  => 'assignments/assignments_list',
        );

        $this->load->view('base/template', $data);  
    }

    public function read($id) 
    {
        $row = $this->Assignments_model->get_by_id($id);
        if ($row) {
            $data = array(
				'id' => $row->id,
				'asset_id' => $row->asset_id,
				'created_by_person_id' => $row->created_by_person_id,
				'assignmented_for_person_id' => $row->assignmented_for_person_id,
				'cost_center_id' => $row->cost_center_id,
				'status' => $row->status,
				'status_id' => $row->status_id,
				'created_at' => $row->created_at,
				'updated_at' => $row->updated_at,
				'deleted_at' => $row->deleted_at,
				'origin_location_id' => $row->origin_location_id,
				'destiny_location_id' => $row->destiny_location_id,
				'start_at' => $row->start_at,
				'end_at' => $row->end_at,
				'reason_id' => $row->reason_id,
				'item_id' => $row->item_id,
				'answer_at' => $row->answer_at,
				'scheduled_at' => $row->scheduled_at,
				'comments' => $row->comments,
			);
            $data['main_content'] = 'assignments/assignments_read';
        	$this->load->view('base/template', $data);  
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('assignments'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('assignments/create_action'),
		    'id' => set_value('id'),
		    'asset_id' => set_value('asset_id'),
		    'created_by_person_id' => set_value('created_by_person_id'),
		    'assignmented_for_person_id' => set_value('assignmented_for_person_id'),
		    'cost_center_id' => set_value('cost_center_id'),
		    'status' => set_value('status'),
		    'status_id' => set_value('status_id'),
		    'created_at' => set_value('created_at'),
		    'updated_at' => set_value('updated_at'),
		    'deleted_at' => set_value('deleted_at'),
		    'origin_location_id' => set_value('origin_location_id'),
		    'destiny_location_id' => set_value('destiny_location_id'),
		    'start_at' => set_value('start_at'),
		    'end_at' => set_value('end_at'),
		    'reason_id' => set_value('reason_id'),
		    'item_id' => set_value('item_id'),
		    'answer_at' => set_value('answer_at'),
		    'scheduled_at' => set_value('scheduled_at'),
		    'comments' => set_value('comments'),
		);
        $data['main_content'] = 'assignments/assignments_form';
    	$this->load->view('base/template', $data);  
    }

    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				'asset_id' => $this->input->post('asset_id',TRUE),
				'created_by_person_id' => $this->input->post('created_by_person_id',TRUE),
				'assignmented_for_person_id' => $this->input->post('assignmented_for_person_id',TRUE),
				'cost_center_id' => $this->input->post('cost_center_id',TRUE),
				'status' => $this->input->post('status',TRUE),
				'status_id' => $this->input->post('status_id',TRUE),
				'created_at' => $this->input->post('created_at',TRUE),
				'updated_at' => $this->input->post('updated_at',TRUE),
				'deleted_at' => $this->input->post('deleted_at',TRUE),
				'origin_location_id' => $this->input->post('origin_location_id',TRUE),
				'destiny_location_id' => $this->input->post('destiny_location_id',TRUE),
				'start_at' => $this->input->post('start_at',TRUE),
				'end_at' => $this->input->post('end_at',TRUE),
				'reason_id' => $this->input->post('reason_id',TRUE),
				'item_id' => $this->input->post('item_id',TRUE),
				'answer_at' => $this->input->post('answer_at',TRUE),
				'scheduled_at' => $this->input->post('scheduled_at',TRUE),
				'comments' => $this->input->post('comments',TRUE),
		    );

            $this->Assignments_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('assignments'));
        }
    }  
    
    public function update($id) 
    {
        $row = $this->Assignments_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('assignments/update_action'),
				'id' => set_value('id', $row->id),
				'asset_id' => set_value('asset_id', $row->asset_id),
				'created_by_person_id' => set_value('created_by_person_id', $row->created_by_person_id),
				'assignmented_for_person_id' => set_value('assignmented_for_person_id', $row->assignmented_for_person_id),
				'cost_center_id' => set_value('cost_center_id', $row->cost_center_id),
				'status' => set_value('status', $row->status),
				'status_id' => set_value('status_id', $row->status_id),
				'created_at' => set_value('created_at', $row->created_at),
				'updated_at' => set_value('updated_at', $row->updated_at),
				'deleted_at' => set_value('deleted_at', $row->deleted_at),
				'origin_location_id' => set_value('origin_location_id', $row->origin_location_id),
				'destiny_location_id' => set_value('destiny_location_id', $row->destiny_location_id),
				'start_at' => set_value('start_at', $row->start_at),
				'end_at' => set_value('end_at', $row->end_at),
				'reason_id' => set_value('reason_id', $row->reason_id),
				'item_id' => set_value('item_id', $row->item_id),
				'answer_at' => set_value('answer_at', $row->answer_at),
				'scheduled_at' => set_value('scheduled_at', $row->scheduled_at),
				'comments' => set_value('comments', $row->comments),
		    );
            // $this->load->view('assignments/assignments_form', $data);
            $data['main_content'] = 'assignments/assignments_form';
    		$this->load->view('base/template', $data);  
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('assignments'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
				'asset_id' => $this->input->post('asset_id',TRUE),
				'created_by_person_id' => $this->input->post('created_by_person_id',TRUE),
				'assignmented_for_person_id' => $this->input->post('assignmented_for_person_id',TRUE),
				'cost_center_id' => $this->input->post('cost_center_id',TRUE),
				'status' => $this->input->post('status',TRUE),
				'status_id' => $this->input->post('status_id',TRUE),
				'created_at' => $this->input->post('created_at',TRUE),
				'updated_at' => $this->input->post('updated_at',TRUE),
				'deleted_at' => $this->input->post('deleted_at',TRUE),
				'origin_location_id' => $this->input->post('origin_location_id',TRUE),
				'destiny_location_id' => $this->input->post('destiny_location_id',TRUE),
				'start_at' => $this->input->post('start_at',TRUE),
				'end_at' => $this->input->post('end_at',TRUE),
				'reason_id' => $this->input->post('reason_id',TRUE),
				'item_id' => $this->input->post('item_id',TRUE),
				'answer_at' => $this->input->post('answer_at',TRUE),
				'scheduled_at' => $this->input->post('scheduled_at',TRUE),
				'comments' => $this->input->post('comments',TRUE),
		    );

            $this->Assignments_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('assignments'));
        }
    }

    public function add() 
    {
        $data = array(
            'button' 					=> 'Add',
            'action' 					=> site_url('assignments/add_action'),
		    'id' 						=> set_value('id'),
		    'cost_center_id' 			=> set_value('cost_center_id'),
		    'origin_location_id' 		=> set_value('origin_location_id'),
		    'reason_id' 				=> set_value('reason_id'),
		    'item_id' 					=> set_value('item_id'),
		    'scheduled_at' 				=> set_value('scheduled_at'),
		    'comments' 					=> set_value('comments'),
		    'main_content' 				=> 'assignments/assignments_add',
		);

    	$this->load->view('base/template', $data);  
    }

    public function add_action() 
    {
        $this->load->model('Membership_model');
        $user_name 		= $this->session->userdata('user_name');
		$user 			= $this->Membership_model->get_user($user_name);
	    $current_date 	= date("Y-m-d,H:i:s");
        $status_id 		= 2;
        $user_id 		= $user[0]['id'];

		$this->form_validation->set_rules('cost_center_id', 'cost center id', 'trim|required');
		$this->form_validation->set_rules('origin_location_id', 'origin location id', 'trim|required');
		$this->form_validation->set_rules('reason_id', 'reason id', 'trim|required');
		$this->form_validation->set_rules('item_id', 'item id', 'trim|required');
		$this->form_validation->set_rules('scheduled_at', 'scheduled at', 'trim');
		$this->form_validation->set_rules('comments', 'comments', 'trim');
		$this->form_validation->set_rules('id', 'id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

        if ($this->form_validation->run() == FALSE) {
            $this->add();
        } else {
            $data = array(
				'created_by_person_id' 		=> $user_id,
				'cost_center_id' 			=> $this->input->post('cost_center_id',TRUE),
				'status_id' 				=> $status_id,
				'created_at' 				=> $current_date,
				'updated_at' 				=> $current_date,
				'origin_location_id' 		=> $this->input->post('origin_location_id',TRUE),
				'reason_id' 				=> $this->input->post('reason_id',TRUE),
				'item_id' 					=> $this->input->post('item_id',TRUE),
				'scheduled_at' 				=> $this->input->post('scheduled_at',TRUE),
				'comments' 					=> $this->input->post('comments',TRUE),
		    );

            $this->Assignments_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('assignments'));
        }
    }

    public function accept($id) 
    {
        $row = $this->Assignments_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' 						=> 'Accept',
                'action' 						=> site_url('assignments/accept_action'),
				'id' 							=> set_value('id', $row->id),
				'asset_id' 						=> set_value('asset_id', $row->asset_id),
				'created_by_person_id' 			=> set_value('created_by_person_id', $row->created_by_person_id),
				'assignmented_for_person_id' 	=> set_value('assignmented_for_person_id', $row->assignmented_for_person_id),
				'cost_center_id' 				=> set_value('cost_center_id', $row->cost_center_id),
				'status_id' 					=> set_value('status_id', $row->status_id),
				'created_at' 					=> set_value('created_at', $row->created_at),
				'updated_at' 					=> set_value('updated_at', $row->updated_at),
				'origin_location_id' 			=> set_value('origin_location_id', $row->origin_location_id),
				'destiny_location_id' 			=> set_value('destiny_location_id', $row->destiny_location_id),
				'reason_id' 					=> set_value('reason_id', $row->reason_id),
				'item_id' 						=> set_value('item_id', $row->item_id),
				'comments' 						=> set_value('comments', $row->comments),

				'main_content'					=> 'assignments/assignments_accept',
		    );

    		$this->load->view('base/template', $data);

        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('assignments'));
        }
    }

    public function accept_action() 
    {
        // $this->_rules();
        $this->form_validation->set_rules('assignmented_for_person_id', 'assignmented for person id', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

        $user_name 		= $this->session->userdata('user_name');
        // $user 		= $this->users_model->get_user($user_name);
	    $current_date 	= date("Y-m-d,H:i:s");
        $status_id 		= 3;
        // $user_id 	= $user[0]['id'];
        $user_id 		= $user_name;

        if ($this->form_validation->run() == FALSE) {
            $this->accept($this->input->post('id', TRUE));
        } else {
            $data = array(
				'assignmented_for_person_id' => $user_id,
				'status_id' 				 => $status_id,
				'updated_at' 				 => $current_date,
				'start_at'  				 => $current_date,
				'answer_at'	 				 => $current_date,
		    );

            $this->Assignments_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('assignments'));
        }
    }

    public function register($id) 
    {
        $row = $this->Assignments_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' 						=> 'Register',
                'action' 						=> site_url('assignments/register_action'),
				'id' 							=> set_value('id', $row->id),
				'asset_id' 						=> set_value('asset_id', $row->asset_id),
				'created_by_person_id' 			=> set_value('created_by_person_id', $row->created_by_person_id),
				'assignmented_for_person_id' 	=> set_value('assignmented_for_person_id', $row->assignmented_for_person_id),
				'cost_center_id' 				=> set_value('cost_center_id', $row->cost_center_id),
				'status_id' 					=> set_value('status_id', $row->status_id),
				'created_at' 					=> set_value('created_at', $row->created_at),
				'updated_at' 					=> set_value('updated_at', $row->updated_at),
				'origin_location_id' 			=> set_value('origin_location_id', $row->origin_location_id),
				'destiny_location_id' 			=> set_value('destiny_location_id', $row->destiny_location_id),
				'reason_id' 					=> set_value('reason_id', $row->reason_id),
				'item_id' 						=> set_value('item_id', $row->item_id),
				'comments' 						=> set_value('comments', $row->comments),

				'main_content'					=> 'assignments/assignments_register',
		    );

    		$this->load->view('base/template', $data);

        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('assignments'));
        }
    }

    public function register_action() 
    {
        // $this->_rules();
        $this->form_validation->set_rules('asset_id', 'asset id', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

        $user_name 		= $this->session->userdata('user_name');
        // $user 		= $this->users_model->get_user($user_name);
	    $current_date 	= date("Y-m-d,H:i:s");
        $status_id 		= 4;
        // $user_id 	= $user[0]['id'];
        $user_id 		= $user_name;

        if ($this->form_validation->run() == FALSE) {
            $this->accept($this->input->post('id', TRUE));
        } else {
            $data = array(
            	'asset_id' 					 => $this->input->post('asset_id'),
				'status_id' 				 => $status_id,
				'updated_at' 				 => $current_date,
		    );

            $this->Assignments_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('assignments'));
        }
    }

    public function complete($id) 
    {
        $row = $this->Assignments_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' 						=> 'Complete',
                'action' 						=> site_url('assignments/complete_action'),
				'id' 							=> set_value('id', $row->id),
				'asset_id' 						=> set_value('asset_id', $row->asset_id),
				'created_by_person_id' 			=> set_value('created_by_person_id', $row->created_by_person_id),
				'assignmented_for_person_id' 	=> set_value('assignmented_for_person_id', $row->assignmented_for_person_id),
				'cost_center_id' 				=> set_value('cost_center_id', $row->cost_center_id),
				'status_id' 					=> set_value('status_id', $row->status_id),
				'created_at' 					=> set_value('created_at', $row->created_at),
				'updated_at' 					=> set_value('updated_at', $row->updated_at),
				'origin_location_id' 			=> set_value('origin_location_id', $row->origin_location_id),
				'destiny_location_id' 			=> set_value('destiny_location_id', $row->destiny_location_id),
				'reason_id' 					=> set_value('reason_id', $row->reason_id),
				'item_id' 						=> set_value('item_id', $row->item_id),
				'comments' 						=> set_value('comments', $row->comments),

				'main_content'					=> 'assignments/assignments_complete',
		    );

    		$this->load->view('base/template', $data);

        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('assignments'));
        }
    }

    public function complete_action() 
    {
        // $this->_rules();
        $this->form_validation->set_rules('asset_id', 'asset id', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

        $user_name 		= $this->session->userdata('user_name');
        // $user 		= $this->users_model->get_user($user_name);
	    $current_date 	= date("Y-m-d,H:i:s");
        $status_id 		= 4;
        // $user_id 	= $user[0]['id'];
        $user_id 		= $user_name;

        if ($this->form_validation->run() == FALSE) {
            $this->accept($this->input->post('id', TRUE));
        } else {
            $data = array(
            	'asset_id' 					 => $this->input->post('asset_id'),
				'status_id' 				 => $status_id,
				'updated_at' 				 => $current_date,
		    );

            $this->Assignments_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('assignments'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Assignments_model->get_by_id($id);

        if ($row) {
            $this->Assignments_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('assignments'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('assignments'));
        }
    }

    public function _rules() 
    {
		$this->form_validation->set_rules('asset_id', 'asset id', 'trim|required');
		$this->form_validation->set_rules('created_by_person_id', 'created by person id', 'trim|required');
		$this->form_validation->set_rules('assignmented_for_person_id', 'assignmented for person id', 'trim|required');
		$this->form_validation->set_rules('cost_center_id', 'cost center id', 'trim|required');
		$this->form_validation->set_rules('status', 'status', 'trim|required');
		$this->form_validation->set_rules('status_id', 'status id', 'trim|required');
		$this->form_validation->set_rules('created_at', 'created at', 'trim|required');
		$this->form_validation->set_rules('updated_at', 'updated at', 'trim|required');
		$this->form_validation->set_rules('deleted_at', 'deleted at', 'trim|required');
		$this->form_validation->set_rules('origin_location_id', 'origin location id', 'trim|required');
		$this->form_validation->set_rules('destiny_location_id', 'destiny location id', 'trim|required');
		$this->form_validation->set_rules('start_at', 'start at', 'trim|required');
		$this->form_validation->set_rules('end_at', 'end at', 'trim|required');
		$this->form_validation->set_rules('reason_id', 'reason id', 'trim|required');
		$this->form_validation->set_rules('item_id', 'item id', 'trim|required');
		$this->form_validation->set_rules('answer_at', 'answer at', 'trim|required');
		$this->form_validation->set_rules('scheduled_at', 'scheduled at', 'trim|required');
		$this->form_validation->set_rules('comments', 'comments', 'trim|required');

		$this->form_validation->set_rules('id', 'id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function send_push()
	{
		$conn = mysqli_connect("mysql.hostinger.com.br","u240434229_test","123456","u240434229_test");

		$sql = " Select Token From users";

		$result = mysqli_query($conn,$sql);
		$tokens = array();

		if(mysqli_num_rows($result) > 0 ){
			while ($row = mysqli_fetch_assoc($result)) {
				$tokens[] = $row["Token"];
			}
		}

		mysqli_close($conn);

		$message = array("message" => "Chamado aguardando atendimento!");
		// $message_status = send_notification($tokens, $message);

		$url = 'https://fcm.googleapis.com/fcm/send';
		$fields = array(
			'registration_ids' => $tokens,
			'data' => $message
		);

		$headers = array(
			'Authorization:key = AAAA3T6kCEI:APA91bF-unVE7GQsbWsHoPQzVeuG-ZEQgJ6TShoJonDOBN_HRXVxY9R1Bwm2ACFuBSiTsITbooXlw8OPGIyGkzN9ph5eejNnxM1FI5c0NU6rwPnDjgNF0HGAXoVa9rqHfKsDhRYN41oA',
			'Content-Type: application/json'
		);

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);  
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

		$result = curl_exec($ch);           
		if ($result === FALSE) {
			die('Curl failed: ' . curl_error($ch));
		}
		curl_close($ch);

    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "assignments.xls";
        $judul = "assignments";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
		xlsWriteLabel($tablehead, $kolomhead++, "Asset Id");
		xlsWriteLabel($tablehead, $kolomhead++, "Created By Person Id");
		xlsWriteLabel($tablehead, $kolomhead++, "Assignmented For Person Id");
		xlsWriteLabel($tablehead, $kolomhead++, "Cost Center Id");
		xlsWriteLabel($tablehead, $kolomhead++, "Status");
		xlsWriteLabel($tablehead, $kolomhead++, "Status Id");
		xlsWriteLabel($tablehead, $kolomhead++, "Created At");
		xlsWriteLabel($tablehead, $kolomhead++, "Updated At");
		xlsWriteLabel($tablehead, $kolomhead++, "Deleted At");
		xlsWriteLabel($tablehead, $kolomhead++, "Origin Location Id");
		xlsWriteLabel($tablehead, $kolomhead++, "Destiny Location Id");
		xlsWriteLabel($tablehead, $kolomhead++, "Start At");
		xlsWriteLabel($tablehead, $kolomhead++, "End At");
		xlsWriteLabel($tablehead, $kolomhead++, "Reason Id");
		xlsWriteLabel($tablehead, $kolomhead++, "Item Id");
		xlsWriteLabel($tablehead, $kolomhead++, "Answer At");
		xlsWriteLabel($tablehead, $kolomhead++, "Scheduled At");
		xlsWriteLabel($tablehead, $kolomhead++, "Comments");

		foreach ($this->Assignments_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
		    xlsWriteNumber($tablebody, $kolombody++, $data->asset_id);
		    xlsWriteNumber($tablebody, $kolombody++, $data->created_by_person_id);
		    xlsWriteNumber($tablebody, $kolombody++, $data->assignmented_for_person_id);
		    xlsWriteNumber($tablebody, $kolombody++, $data->cost_center_id);
		    xlsWriteLabel($tablebody, $kolombody++, $data->status);
		    xlsWriteNumber($tablebody, $kolombody++, $data->status_id);
		    xlsWriteLabel($tablebody, $kolombody++, $data->created_at);
		    xlsWriteLabel($tablebody, $kolombody++, $data->updated_at);
		    xlsWriteLabel($tablebody, $kolombody++, $data->deleted_at);
		    xlsWriteNumber($tablebody, $kolombody++, $data->origin_location_id);
		    xlsWriteNumber($tablebody, $kolombody++, $data->destiny_location_id);
		    xlsWriteLabel($tablebody, $kolombody++, $data->start_at);
		    xlsWriteLabel($tablebody, $kolombody++, $data->end_at);
		    xlsWriteNumber($tablebody, $kolombody++, $data->reason_id);
		    xlsWriteNumber($tablebody, $kolombody++, $data->item_id);
		    xlsWriteLabel($tablebody, $kolombody++, $data->answer_at);
		    xlsWriteLabel($tablebody, $kolombody++, $data->scheduled_at);
		    xlsWriteLabel($tablebody, $kolombody++, $data->comments);

		    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}