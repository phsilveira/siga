<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Assets extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Assets_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'assets/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'assets/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'assets/index.html';
            $config['first_url'] = base_url() . 'assets/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Assets_model->total_rows($q);
        $assets = $this->Assets_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'assets_data' => $assets,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('assets/assets_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Assets_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'item_id' => $row->item_id,
		'cost_center_id' => $row->cost_center_id,
		'asset_tag' => $row->asset_tag,
		'created_at' => $row->created_at,
		'updated_at' => $row->updated_at,
		'deleted_at' => $row->deleted_at,
		'acquired_at' => $row->acquired_at,
		'status' => $row->status,
		'status_id' => $row->status_id,
		'current_location_id' => $row->current_location_id,
		'description' => $row->description,
		'user_id' => $row->user_id,
	    );
            $this->load->view('assets/assets_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('assets'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('assets/create_action'),
	    'id' => set_value('id'),
	    'item_id' => set_value('item_id'),
	    'cost_center_id' => set_value('cost_center_id'),
	    'asset_tag' => set_value('asset_tag'),
	    'created_at' => set_value('created_at'),
	    'updated_at' => set_value('updated_at'),
	    'deleted_at' => set_value('deleted_at'),
	    'acquired_at' => set_value('acquired_at'),
	    'status' => set_value('status'),
	    'status_id' => set_value('status_id'),
	    'current_location_id' => set_value('current_location_id'),
	    'description' => set_value('description'),
	    'user_id' => set_value('user_id'),
	);
        $this->load->view('assets/assets_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'item_id' => $this->input->post('item_id',TRUE),
		'cost_center_id' => $this->input->post('cost_center_id',TRUE),
		'asset_tag' => $this->input->post('asset_tag',TRUE),
		'created_at' => $this->input->post('created_at',TRUE),
		'updated_at' => $this->input->post('updated_at',TRUE),
		'deleted_at' => $this->input->post('deleted_at',TRUE),
		'acquired_at' => $this->input->post('acquired_at',TRUE),
		'status' => $this->input->post('status',TRUE),
		'status_id' => $this->input->post('status_id',TRUE),
		'current_location_id' => $this->input->post('current_location_id',TRUE),
		'description' => $this->input->post('description',TRUE),
		'user_id' => $this->input->post('user_id',TRUE),
	    );

            $this->Assets_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('assets'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Assets_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('assets/update_action'),
		'id' => set_value('id', $row->id),
		'item_id' => set_value('item_id', $row->item_id),
		'cost_center_id' => set_value('cost_center_id', $row->cost_center_id),
		'asset_tag' => set_value('asset_tag', $row->asset_tag),
		'created_at' => set_value('created_at', $row->created_at),
		'updated_at' => set_value('updated_at', $row->updated_at),
		'deleted_at' => set_value('deleted_at', $row->deleted_at),
		'acquired_at' => set_value('acquired_at', $row->acquired_at),
		'status' => set_value('status', $row->status),
		'status_id' => set_value('status_id', $row->status_id),
		'current_location_id' => set_value('current_location_id', $row->current_location_id),
		'description' => set_value('description', $row->description),
		'user_id' => set_value('user_id', $row->user_id),
	    );
            $this->load->view('assets/assets_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('assets'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'item_id' => $this->input->post('item_id',TRUE),
		'cost_center_id' => $this->input->post('cost_center_id',TRUE),
		'asset_tag' => $this->input->post('asset_tag',TRUE),
		'created_at' => $this->input->post('created_at',TRUE),
		'updated_at' => $this->input->post('updated_at',TRUE),
		'deleted_at' => $this->input->post('deleted_at',TRUE),
		'acquired_at' => $this->input->post('acquired_at',TRUE),
		'status' => $this->input->post('status',TRUE),
		'status_id' => $this->input->post('status_id',TRUE),
		'current_location_id' => $this->input->post('current_location_id',TRUE),
		'description' => $this->input->post('description',TRUE),
		'user_id' => $this->input->post('user_id',TRUE),
	    );

            $this->Assets_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('assets'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Assets_model->get_by_id($id);

        if ($row) {
            $this->Assets_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('assets'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('assets'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('item_id', 'item id', 'trim|required');
	$this->form_validation->set_rules('cost_center_id', 'cost center id', 'trim|required');
	$this->form_validation->set_rules('asset_tag', 'asset tag', 'trim|required');
	$this->form_validation->set_rules('created_at', 'created at', 'trim|required');
	$this->form_validation->set_rules('updated_at', 'updated at', 'trim|required');
	$this->form_validation->set_rules('deleted_at', 'deleted at', 'trim|required');
	$this->form_validation->set_rules('acquired_at', 'acquired at', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');
	$this->form_validation->set_rules('status_id', 'status id', 'trim|required');
	$this->form_validation->set_rules('current_location_id', 'current location id', 'trim|required');
	$this->form_validation->set_rules('description', 'description', 'trim|required');
	$this->form_validation->set_rules('user_id', 'user id', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "assets.xls";
        $judul = "assets";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Item Id");
	xlsWriteLabel($tablehead, $kolomhead++, "Cost Center Id");
	xlsWriteLabel($tablehead, $kolomhead++, "Asset Tag");
	xlsWriteLabel($tablehead, $kolomhead++, "Created At");
	xlsWriteLabel($tablehead, $kolomhead++, "Updated At");
	xlsWriteLabel($tablehead, $kolomhead++, "Deleted At");
	xlsWriteLabel($tablehead, $kolomhead++, "Acquired At");
	xlsWriteLabel($tablehead, $kolomhead++, "Status");
	xlsWriteLabel($tablehead, $kolomhead++, "Status Id");
	xlsWriteLabel($tablehead, $kolomhead++, "Current Location Id");
	xlsWriteLabel($tablehead, $kolomhead++, "Description");
	xlsWriteLabel($tablehead, $kolomhead++, "User Id");

	foreach ($this->Assets_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->item_id);
	    xlsWriteNumber($tablebody, $kolombody++, $data->cost_center_id);
	    xlsWriteLabel($tablebody, $kolombody++, $data->asset_tag);
	    xlsWriteLabel($tablebody, $kolombody++, $data->created_at);
	    xlsWriteLabel($tablebody, $kolombody++, $data->updated_at);
	    xlsWriteLabel($tablebody, $kolombody++, $data->deleted_at);
	    xlsWriteLabel($tablebody, $kolombody++, $data->acquired_at);
	    xlsWriteLabel($tablebody, $kolombody++, $data->status);
	    xlsWriteNumber($tablebody, $kolombody++, $data->status_id);
	    xlsWriteNumber($tablebody, $kolombody++, $data->current_location_id);
	    xlsWriteLabel($tablebody, $kolombody++, $data->description);
	    xlsWriteNumber($tablebody, $kolombody++, $data->user_id);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Assets.php */
/* Location: ./application/controllers/Assets.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-06-25 13:24:29 */
/* http://harviacode.com */