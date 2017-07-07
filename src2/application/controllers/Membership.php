<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Membership extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Membership_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'membership/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'membership/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'membership/index.html';
            $config['first_url'] = base_url() . 'membership/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Membership_model->total_rows($q);
        $membership = $this->Membership_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'membership_data' => $membership,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('membership/membership_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Membership_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'first_name' => $row->first_name,
		'last_name' => $row->last_name,
		'email_addres' => $row->email_addres,
		'user_name' => $row->user_name,
		'pass_word' => $row->pass_word,
		'group' => $row->group,
	    );
            $this->load->view('membership/membership_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('membership'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('membership/create_action'),
	    'id' => set_value('id'),
	    'first_name' => set_value('first_name'),
	    'last_name' => set_value('last_name'),
	    'email_addres' => set_value('email_addres'),
	    'user_name' => set_value('user_name'),
	    'pass_word' => set_value('pass_word'),
	    'group' => set_value('group'),
	);
        $this->load->view('membership/membership_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'first_name' => $this->input->post('first_name',TRUE),
		'last_name' => $this->input->post('last_name',TRUE),
		'email_addres' => $this->input->post('email_addres',TRUE),
		'user_name' => $this->input->post('user_name',TRUE),
		'pass_word' => $this->input->post('pass_word',TRUE),
		'group' => $this->input->post('group',TRUE),
	    );

            $this->Membership_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('membership'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Membership_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('membership/update_action'),
		'id' => set_value('id', $row->id),
		'first_name' => set_value('first_name', $row->first_name),
		'last_name' => set_value('last_name', $row->last_name),
		'email_addres' => set_value('email_addres', $row->email_addres),
		'user_name' => set_value('user_name', $row->user_name),
		'pass_word' => set_value('pass_word', $row->pass_word),
		'group' => set_value('group', $row->group),
	    );
            $this->load->view('membership/membership_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('membership'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'first_name' => $this->input->post('first_name',TRUE),
		'last_name' => $this->input->post('last_name',TRUE),
		'email_addres' => $this->input->post('email_addres',TRUE),
		'user_name' => $this->input->post('user_name',TRUE),
		'pass_word' => $this->input->post('pass_word',TRUE),
		'group' => $this->input->post('group',TRUE),
	    );

            $this->Membership_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('membership'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Membership_model->get_by_id($id);

        if ($row) {
            $this->Membership_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('membership'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('membership'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('first_name', 'first name', 'trim|required');
	$this->form_validation->set_rules('last_name', 'last name', 'trim|required');
	$this->form_validation->set_rules('email_addres', 'email addres', 'trim|required');
	$this->form_validation->set_rules('user_name', 'user name', 'trim|required');
	$this->form_validation->set_rules('pass_word', 'pass word', 'trim|required');
	$this->form_validation->set_rules('group', 'group', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Membership.php */
/* Location: ./application/controllers/Membership.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-07-02 19:30:27 */
/* http://harviacode.com */