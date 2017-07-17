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
        $q      = urldecode($this->input->get('q', TRUE));
        // $user   = urldecode($this->input->get('user', TRUE));
        $start  = intval($this->input->get('start'));

        
        if ($q <> '') {
            $config['base_url']  = base_url() . 'assignments/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'assignments/index.html?q=' . urlencode($q);
        } else {
            $config['base_url']  = base_url() . 'assignments/index.html';
            $config['first_url'] = base_url() . 'assignments/index.html';
        }
        $this->load->model('Users_model');
        $user_name      = $this->session->userdata('user_name');
        $user           = $this->Users_model->get_user($user_name);

        $config['per_page']          = 10;
        $config['page_query_string'] = TRUE;

        if ($user[0]['group'] == 2){
            $assignments             = $this->Assignments_model->get_limit_data($config['per_page'], $start, $q, $user[0]['id']);
            $config['total_rows']        = $this->Assignments_model->total_rows($q, $assignmented_for_person_id = $user[0]['id']);
        } else {
            $assignments             = $this->Assignments_model->get_limit_data($config['per_page'], $start, $q);
            $config['total_rows']        = $this->Assignments_model->total_rows($q);
        }

        
        $this->load->model('Items_model');
        $items                       = $this->Items_model->get_all();

        $this->load->model('Membership_model');
        $users                       = $this->Membership_model->get_all();

        $this->load->model('Utils_model');
        $status                       = $this->Utils_model->get_all_assignment_status();
        $reasons                      = $this->Utils_model->get_all_reasons();

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'assignments_data'  => $assignments,
            'items'             => $items,
            'users'             => $users,
            'status'            => $status,
            'reasons'           => $reasons,
            'q'                 => $q,
            'pagination'        => $this->pagination->create_links(),
            'total_rows'        => $config['total_rows'],
            'start'             => $start,
        );

        if ($user[0]['group'] == 1){
            $data['main_content'] = 'admin/assignments/assignments_list';
            $this->load->view('admin/base/template', $data);    
        } else {
            $data['main_content'] = 'public/assignments/assignments_list';
            $this->load->view('public/base/template', $data);    
        }

        
    }

    public function open()
    {
        $q      = urldecode($this->input->get('q', TRUE));
        // $user   = urldecode($this->input->get('user', TRUE));
        $start  = intval($this->input->get('start'));

        
        if ($q <> '') {
            $config['base_url']  = base_url() . 'assignments/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'assignments/index.html?q=' . urlencode($q);
        } else {
            $config['base_url']  = base_url() . 'assignments/index.html';
            $config['first_url'] = base_url() . 'assignments/index.html';
        }

        $config['per_page']          = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows']        = $this->Assignments_model->total_rows($q);
        $assignments                 = $this->Assignments_model->get_limit_data($config['per_page'], $start, $q);
        
        $this->load->model('Items_model');
        $items                       = $this->Items_model->get_all();

        $this->load->model('Membership_model');
        $users                       = $this->Membership_model->get_all();

        $this->load->model('Utils_model');
        $status                       = $this->Utils_model->get_all_assignment_status();
        $reasons                      = $this->Utils_model->get_all_reasons();

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'assignments_data'  => $assignments,
            'items'             => $items,
            'users'             => $users,
            'status'            => $status,
            'reasons'           => $reasons,
            'q'                 => $q,
            'pagination'        => $this->pagination->create_links(),
            'total_rows'        => $config['total_rows'],
            'start'             => $start,
        );

        $this->load->model('Users_model');
        $user_name      = $this->session->userdata('user_name');
        $user     = $this->Users_model->get_user($user_name);

        if ($user[0]['group'] == 1){
            $data['main_content'] = 'admin/assignments/assignments_list';
            $this->load->view('admin/base/template', $data);    
        } else {
            $data['main_content'] = 'public/assignments/assignments_list';
            $this->load->view('public/base/template', $data);    
        }

        
    }

    public function read($id) 
    {
        $row = $this->Assignments_model->get_by_id($id);

        $this->load->model('Items_model');
        $item                         = $this->Items_model->get_by_id($row->item_id);

        $this->load->model('Membership_model');
        $created_by_person            = $this->Membership_model->get_by_id($row->created_by_person_id);
        $assignmented_for_person      = $this->Membership_model->get_by_id($row->assignmented_for_person_id);

        $this->load->model('Cost_centers_model');
        $cost_center                  = $this->Cost_centers_model->get_by_id($row->cost_center_id);

        $this->load->model('Utils_model');
        $status                        = $this->Utils_model->get_assignment_status_by_id($row->status_id);
        $reason                       = $this->Utils_model->get_reason_by_id($row->reason_id);

        
        if ($row) {
            $data = array(
				'id'                            => $row->id,
				'asset_id'                      => $row->asset_id,
				'created_by_person'             => $created_by_person->user_name,
				'assignmented_for_person'       => $row->assignmented_for_person_id,
				'cost_center'                   => $row->cost_center_id,
				'status'                        => $status->name,
				'created_at'                    => $row->created_at,
				'updated_at'                    => $row->updated_at,
                'accepted_at'                   => $row->accepted_at,
                'register_at'                   => $row->register_at,
                'completed_at'                  => $row->completed_at,
				'origin_location_id'            => $row->origin_location_id,
				'destiny_location_id'           => $row->destiny_location_id,
				'reason'                        => $reason->name,
				'item'                          => $item->name,
				'scheduled_at'                  => $row->scheduled_at,
				'comments'                      => $row->comments,
                'main_content'                  => 'admin/assignments/assignments_read',
			);

            $this->load->model('Users_model');
            $user_name      = $this->session->userdata('user_name');
            $user           = $this->Users_model->get_user($user_name);

            if ($user[0]['group'] == 1){
                $this->load->view('admin/base/template', $data);    
            } else {
                $this->load->view('public/base/template', $data);    
            }

        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('assignments'));
        }
    }

    public function create() 
    {
        $data = array(
            'button'                        => 'Create',
            'action'                        => site_url('assignments/create_action'),
		    'id'                            => set_value('id'),
		    'asset_id'                      => set_value('asset_id'),
		    'created_by_person_id'          => set_value('created_by_person_id'),
		    'assignmented_for_person_id'    => set_value('assignmented_for_person_id'),
		    'cost_center_id'                => set_value('cost_center_id'),
		    'status_id'                     => set_value('status_id'),
		    'created_at'                    => set_value('created_at'),
		    'updated_at'                    => set_value('updated_at'),
		    'deleted_at'                    => set_value('deleted_at'),
		    'origin_location_id'            => set_value('origin_location_id'),
		    'destiny_location_id'           => set_value('destiny_location_id'),
		    'reason_id'                     => set_value('reason_id'),
		    'item_id'                       => set_value('item_id'),
		    'scheduled_at'                  => set_value('scheduled_at'),
		    'comments'                      => set_value('comments'),
		);

        $this->load->model('Users_model');
        $user_name      = $this->session->userdata('user_name');
        $user     = $this->Users_model->get_user($user_name);

        if ($user[0]['group'] == 1){
            $data['main_content'] = 'admin/assignments/assignments_form';
            $this->load->view('admin/base/template', $data);  
        } else {
            $data['main_content'] = 'public/assignments/assignments_form';
            $this->load->view('public/base/template', $data);  
        }
        
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
				'status_id' => $this->input->post('status_id',TRUE),
				'created_at' => $this->input->post('created_at',TRUE),
				'updated_at' => $this->input->post('updated_at',TRUE),
				'deleted_at' => $this->input->post('deleted_at',TRUE),
				'origin_location_id' => $this->input->post('origin_location_id',TRUE),
				'destiny_location_id' => $this->input->post('destiny_location_id',TRUE),
				'reason_id' => $this->input->post('reason_id',TRUE),
				'item_id' => $this->input->post('item_id',TRUE),
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
				'status_id' => set_value('status_id', $row->status_id),
				'created_at' => set_value('created_at', $row->created_at),
				'updated_at' => set_value('updated_at', $row->updated_at),
				'deleted_at' => set_value('deleted_at', $row->deleted_at),
				'origin_location_id' => set_value('origin_location_id', $row->origin_location_id),
				'destiny_location_id' => set_value('destiny_location_id', $row->destiny_location_id),
				'reason_id' => set_value('reason_id', $row->reason_id),
				'item_id' => set_value('item_id', $row->item_id),
				'scheduled_at' => set_value('scheduled_at', $row->scheduled_at),
				'comments' => set_value('comments', $row->comments),
		    );

            $this->load->model('Users_model');
            $user_name      = $this->session->userdata('user_name');
            $user           = $this->Users_model->get_user($user_name);

            if ($user[0]['group'] == 1){
                $data['main_content'] = 'admin/assignments/assignments_form';
                $this->load->view('admin/base/template', $data);  
            } else {
                $data['main_content'] = 'public/assignments/assignments_form';
                $this->load->view('public/base/template', $data);  
            }

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
				'status_id' => $this->input->post('status_id',TRUE),
				'created_at' => $this->input->post('created_at',TRUE),
				'updated_at' => $this->input->post('updated_at',TRUE),
				'deleted_at' => $this->input->post('deleted_at',TRUE),
				'origin_location_id' => $this->input->post('origin_location_id',TRUE),
				'destiny_location_id' => $this->input->post('destiny_location_id',TRUE),
				'reason_id' => $this->input->post('reason_id',TRUE),
				'item_id' => $this->input->post('item_id',TRUE),
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
        $this->load->model('Utils_model');
        $status                       = $this->Utils_model->get_all_assignment_status();
        $reasons                      = $this->Utils_model->get_all_reasons();

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
            'status'                    => $status,
            'reasons'                   => $reasons,
		);

        $this->load->model('Users_model');
        $user_name      = $this->session->userdata('user_name');
        $user           = $this->Users_model->get_user($user_name);

        if ($user[0]['group'] == 1){
            $data['main_content'] = 'admin/assignments/assignments_add';
            $this->load->view('admin/base/template', $data);  
        } else {
            $data['main_content'] = 'public/assignments/assignments_add';
            $this->load->view('public/base/template', $data);  
        }
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
        $row                          = $this->Assignments_model->get_by_id($id);

        $this->load->model('Items_model');
        $item                         = $this->Items_model->get_by_id($row->item_id);

        $this->load->model('Membership_model');
        $created_by_person            = $this->Membership_model->get_by_id($row->created_by_person_id);

        $this->load->model('Cost_centers_model');
        $cost_center                  = $this->Cost_centers_model->get_by_id($row->cost_center_id);

        $this->load->model('Utils_model');
        $status                        = $this->Utils_model->get_assignment_status_by_id($row->status_id);
        $reason                       = $this->Utils_model->get_reason_by_id($row->reason_id);
        
        if ($row) {
            $data = array(
                'button'                        => 'Accept',
                'action'                        => site_url('assignments/accept_action'),
                'id'                            => $row->id,
                'asset_id'                      => $row->asset_id,
                'created_by_person'             => $created_by_person->user_name,
                'cost_center'                   => $cost_center,
                'status'                        => $status->name,
                'created_at'                    => $row->created_at,
                'origin_location_id'            => $row->origin_location_id,
                'destiny_location_id'           => $row->destiny_location_id,
                'reason'                        => $reason->name,
                'item'                          => $item->name,
                'scheduled_at'                  => $row->scheduled_at,
                'comments'                      => $row->comments,
                'main_content'                  => 'public/assignments/assignments_accept',
            );

            $this->load->model('Users_model');
            $user_name      = $this->session->userdata('user_name');
            $user           = $this->Users_model->get_user($user_name);

            if ($user[0]['group'] == 1){
                $this->load->view('admin/base/template', $data);    
            } else {
                $this->load->view('public/base/template', $data);    
            }

        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('assignments'));
        }

    //     if ($row) {
    //         $data = array(
    //             'button' 						=> 'Accept',
    //             'action' 						=> site_url('assignments/accept_action'),
				// 'id' 							=> set_value('id', $row->id),
				// 'asset_id' 						=> set_value('asset_id', $row->asset_id),
				// 'created_by_person_id' 			=> set_value('created_by_person_id', $row->created_by_person_id),
				// 'assignmented_for_person_id' 	=> set_value('assignmented_for_person_id', $row->assignmented_for_person_id),
				// 'cost_center_id' 				=> set_value('cost_center_id', $row->cost_center_id),
				// 'status_id' 					=> set_value('status_id', $row->status_id),
				// 'created_at' 					=> set_value('created_at', $row->created_at),
				// 'updated_at' 					=> set_value('updated_at', $row->updated_at),
				// 'origin_location_id' 			=> set_value('origin_location_id', $row->origin_location_id),
				// 'destiny_location_id' 			=> set_value('destiny_location_id', $row->destiny_location_id),
				// 'reason_id' 					=> set_value('reason_id', $row->reason_id),
				// 'item_id' 						=> set_value('item_id', $row->item_id),
				// 'comments' 						=> set_value('comments', $row->comments),
    //             'status'                        => $status,
    //             'reasons'                       => $reasons,
		  //   );

    //         $this->load->model('Users_model');
    //         $user_name      = $this->session->userdata('user_name');
    //         $user           = $this->Users_model->get_user($user_name);

    //         if ($user[0]['group'] == 1){
    //             $data['main_content'] = 'admin/assignments/assignments_accept';
    //             $this->load->view('admin/base/template', $data);  
    //         } else {
    //             $data['main_content'] = 'public/assignments/assignments_accept';
    //             $this->load->view('public/base/template', $data);  
    //         }

    //     } else {
    //         $this->session->set_flashdata('message', 'Record Not Found');
    //         redirect(site_url('assignments'));
    //     }
    }

    public function accept_action() 
    {

        $this->load->model('Users_model');
        $user_name      = $this->session->userdata('user_name');
        $user           = $this->Users_model->get_user($user_name);
	    $current_date 	= date("Y-m-d,H:i:s");
        $status_id 		= 3;
        $user_id 	= $user[0]['id'];

        $data = array(
			'assignmented_for_person_id' => $user_id,
			'status_id' 				 => $status_id,
			'updated_at' 				 => $current_date,
            'accepted_at'                => $current_date,
	    );

        $this->Assignments_model->update($this->input->post('id', TRUE), $data);
        $this->session->set_flashdata('message', 'Update Record Success');
        redirect(site_url('assignments'));
    
    }

    public function register($id) 
    {
        $row                          = $this->Assignments_model->get_by_id($id);

        $this->load->model('Items_model');
        $item                         = $this->Items_model->get_by_id($row->item_id);

        $this->load->model('Membership_model');
        $created_by_person            = $this->Membership_model->get_by_id($row->created_by_person_id);

        $this->load->model('Cost_centers_model');
        $cost_center                  = $this->Cost_centers_model->get_by_id($row->cost_center_id);

        $this->load->model('Utils_model');
        $status                        = $this->Utils_model->get_assignment_status_by_id($row->status_id);
        $reason                       = $this->Utils_model->get_reason_by_id($row->reason_id);
        
        if ($row) {
            $data = array(
                'button'                        => 'Accept',
                'action'                        => site_url('assignments/register_action'),
                'register_asset'                => site_url('assignments/register_asset/'.$row->id),
                'register_location'             => site_url('assignments/register_location/'.$row->id),
                'id'                            => $row->id,
                'asset_id'                      => $row->asset_id,
                'created_by_person'             => $created_by_person->user_name,
                'cost_center'                   => $cost_center,
                'status'                        => $status->name,
                'created_at'                    => $row->created_at,
                'origin_location_id'            => $row->origin_location_id,
                'destiny_location_id'           => $row->destiny_location_id,
                'reason'                        => $reason->name,
                'item'                          => $item->name,
                'scheduled_at'                  => $row->scheduled_at,
                'comments'                      => $row->comments,
                'main_content'                  => 'public/assignments/assignments_register',
            );

            $this->load->model('Users_model');
            $user_name      = $this->session->userdata('user_name');
            $user           = $this->Users_model->get_user($user_name);

            if ($user[0]['group'] == 1){
                $this->load->view('admin/base/template', $data);    
            } else {
                $this->load->view('public/base/template', $data);    
            }

        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('assignments'));
        }
    }

    public function register_action() 
    {
        // $this->_rules();
        // $this->form_validation->set_rules('asset_id', 'asset id', 'trim|required');
        // $this->form_validation->set_rules('origin_location_id', 'origin_location_id', 'trim|required');
        // $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

        $current_date   = date("Y-m-d,H:i:s");
        $status_id      = 4;

        // if ($this->form_validation->run() == FALSE) {
        //     $this->accept($this->input->post('id', TRUE));
        // } else {
        $data = array(
            // 'asset_id'                   => $this->input->post('asset_id'),
            // 'origin_location_id'         => $this->input->post('origin_location_id'),
            'status_id'                  => $status_id,
            'updated_at'                 => $current_date,
            'register_at'                => $current_date,
        );

        $this->Assignments_model->update($this->input->post('id', TRUE), $data);
        $this->session->set_flashdata('message', 'Update Record Success');
        redirect(site_url('assignments'));
        // }
    }

    public function register_asset($id) {
        $row                          = $this->Assignments_model->get_by_id($id);

        $this->load->model('Items_model');
        $item                         = $this->Items_model->get_by_id($row->item_id);

        if ($row) {
            $data = array(
                'button'                        => 'Cadastrar Ativo',
                'action'                        => site_url('assignments/register_asset_action'),
                'id'                            => $row->id,
                'asset_id'                      => $row->asset_id,
                'item'                          => $item->name,
                'main_content'                  => 'public/assignments/assignments_register_asset',
            );

            $this->load->model('Users_model');
            $user_name      = $this->session->userdata('user_name');
            $user           = $this->Users_model->get_user($user_name);

            if ($user[0]['group'] == 1){
                $this->load->view('admin/base/template', $data);    
            } else {
                $this->load->view('public/base/template', $data);    
            }

        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('assignments/register/'.$id));
        }


    }

    public function register_asset_action() 
    {
        // $this->_rules();
        $this->form_validation->set_rules('asset_id', 'asset id', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

        $current_date   = date("Y-m-d,H:i:s");

        $this->load->model('Assets_model');
        $asset            = $this->Assets_model->get_by_tag($this->input->post('asset_id'));

        // echo $asset->id;

        if ($this->form_validation->run() == FALSE || $asset->id == '') {
            $this->accept($this->input->post('id', TRUE));
        } else {
            $data = array(
                'asset_id'                   => $asset->id,
                'updated_at'                 => $current_date,
                'register_at'                => $current_date,
            );

            $this->Assignments_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('assignments/register/'.$this->input->post('id')));
        }
    }

    public function register_location($id) {
        $row                          = $this->Assignments_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button'                        => 'Cadastrar Local',
                'action'                        => site_url('assignments/register_location_action'),
                'id'                            => $row->id,
                'location_id'                   => $row->origin_location_id,
                'main_content'                  => 'public/assignments/assignments_register_location',
            );

            $this->load->model('Users_model');
            $user_name      = $this->session->userdata('user_name');
            $user           = $this->Users_model->get_user($user_name);

            if ($user[0]['group'] == 1){
                $this->load->view('admin/base/template', $data);    
            } else {
                $this->load->view('public/base/template', $data);    
            }

        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('assignments/register/'.$id));
        }
        
    }

    public function register_location_action() 
    {
        // $this->_rules();
        $this->form_validation->set_rules('origin_location_id', 'asset id', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

        $assignment     = $this->Assignments_model->get_by_id($this->input->post('id'));

        $current_date   = date("Y-m-d,H:i:s");

        $this->load->model('Locations_model');
        $location         = $this->Locations_model->get_by_tag($this->input->post('origin_location_id'));

        // if depends assignment status 

        if ($this->form_validation->run() == FALSE || $location == '') {
            $this->accept($this->input->post('id', TRUE));
        } else {
            if ($assignment->status_id == 4){
                $data = array(
                    'destiny_location_id'        => $location->id,
                    'updated_at'                 => $current_date,
                    'completed_at'               => $current_date,
                );
            } elseif ($assignment->status_id == 3){
                $data = array(
                    'origin_location_id'         => $location->id,
                    'updated_at'                 => $current_date,
                    'register_at'                => $current_date,
                );
            }
            

            $this->Assignments_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('assignments/register/'.$this->input->post('id')));
        }
    } 

    

    public function complete($id) 
    {
        $row                          = $this->Assignments_model->get_by_id($id);

        $this->load->model('Items_model');
        $item                         = $this->Items_model->get_by_id($row->item_id);

        $this->load->model('Membership_model');
        $created_by_person            = $this->Membership_model->get_by_id($row->created_by_person_id);

        $this->load->model('Cost_centers_model');
        $cost_center                  = $this->Cost_centers_model->get_by_id($row->cost_center_id);

        $this->load->model('Utils_model');
        $status                        = $this->Utils_model->get_assignment_status_by_id($row->status_id);
        $reason                       = $this->Utils_model->get_reason_by_id($row->reason_id);
        
        if ($row) {
            $data = array(
                'button'                        => 'Accept',
                'action'                        => site_url('assignments/complete_action'),
                'register_asset'                => site_url('assignments/register_asset/'.$row->id),
                'register_location'             => site_url('assignments/register_location/'.$row->id),
                'id'                            => $row->id,
                'asset_id'                      => $row->asset_id,
                'created_by_person'             => $created_by_person->user_name,
                'cost_center'                   => $cost_center,
                'status'                        => $status->name,
                'created_at'                    => $row->created_at,
                'origin_location_id'            => $row->origin_location_id,
                'destiny_location_id'           => $row->destiny_location_id,
                'reason'                        => $reason->name,
                'item'                          => $item->name,
                'scheduled_at'                  => $row->scheduled_at,
                'comments'                      => $row->comments,
                'main_content'                  => 'public/assignments/assignments_complete',
            );

            $this->load->model('Users_model');
            $user_name      = $this->session->userdata('user_name');
            $user           = $this->Users_model->get_user($user_name);

            if ($user[0]['group'] == 1){
                $this->load->view('admin/base/template', $data);    
            } else {
                $this->load->view('public/base/template', $data);    
            }

        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('assignments'));
        }
    }

    public function sendMail()
    {
        $config = Array(
          'protocol' => 'smtp',
          'smtp_host' => 'ssl://smtp.googlemail.com',
          'smtp_port' => 465,
          'smtp_user' => 'phsilveira.henrique@gmail.com', // change it to yours
          'smtp_pass' => '&*phS77142102', // change it to yours
          'mailtype' => 'html',
          'charset' => 'iso-8859-1',
          'wordwrap' => TRUE
        );

        $message = '';
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from('phsilveira.henrique@gmail.com'); // change it to yours
        $this->email->to('phsilveira.henrique@gmail.com');// change it to yours
        $this->email->subject('Resume from JobsBuddy for your Job posting');
        $this->email->message($message);
        if($this->email->send()){
            echo 'Email sent.';
        } else {
            show_error($this->email->print_debugger());
        }

    }

    public function complete_action() 
    {
        // $this->_rules();
        // $this->form_validation->set_rules('asset_id', 'asset id', 'trim|required');
        // $this->form_validation->set_rules('destiny_location_id', 'destiny_location_id', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

        $current_date   = date("Y-m-d,H:i:s");
        $status_id      = 5;

        
        $data = array(
            // 'asset_id'                   => $this->input->post('asset_id'),
            // 'destiny_location_id'        => $this->input->post('destiny_location_id'),
            'status_id'                  => $status_id,
            'updated_at'                 => $current_date,
            'completed_at'               => $current_date,
        );



        $this->Assignments_model->update($this->input->post('id', TRUE), $data);
        $this->session->set_flashdata('message', 'Update Record Success');

        $config = Array(
          'protocol' => 'smtp',
          'smtp_host' => 'ssl://smtp.googlemail.com',
          'smtp_port' => 465,
          'smtp_user' => 'phsilveira.henrique@gmail.com', // change it to yours
          'smtp_pass' => '&*phS77142102', // change it to yours
          'mailtype' => 'html',
          'charset' => 'iso-8859-1',
          'wordwrap' => TRUE
        );

        $message = '';
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from('phsilveira.henrique@gmail.com'); // change it to yours
        $this->email->to('phsilveira.henrique@gmail.com');// change it to yours
        $this->email->subject('Resume from JobsBuddy for your Job posting');
        $this->email->message($message);
        if($this->email->send()){
            echo 'Email sent.';
        } else {
            show_error($this->email->print_debugger());
        }

        redirect(site_url('assignments'));
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
		$this->form_validation->set_rules('status_id', 'status id', 'trim|required');
		$this->form_validation->set_rules('origin_location_id', 'origin location id', 'trim|required');
		$this->form_validation->set_rules('destiny_location_id', 'destiny location id', 'trim|required');
		$this->form_validation->set_rules('reason_id', 'reason id', 'trim|required');
		$this->form_validation->set_rules('item_id', 'item id', 'trim|required');
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
		    xlsWriteNumber($tablebody, $kolombody++, $data->status_id);
		    xlsWriteLabel($tablebody, $kolombody++, $data->created_at);
		    xlsWriteLabel($tablebody, $kolombody++, $data->updated_at);
		    xlsWriteLabel($tablebody, $kolombody++, $data->deleted_at);
		    xlsWriteNumber($tablebody, $kolombody++, $data->origin_location_id);
		    xlsWriteNumber($tablebody, $kolombody++, $data->destiny_location_id);
		    xlsWriteNumber($tablebody, $kolombody++, $data->reason_id);
		    xlsWriteNumber($tablebody, $kolombody++, $data->item_id);
		    xlsWriteLabel($tablebody, $kolombody++, $data->scheduled_at);
		    xlsWriteLabel($tablebody, $kolombody++, $data->comments);

		    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}