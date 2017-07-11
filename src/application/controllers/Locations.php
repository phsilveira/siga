<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Locations extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Locations_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q      = urldecode($this->input->get('q', TRUE));
        $start  = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url']  = base_url() . 'locations/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'locations/index.html?q=' . urlencode($q);
        } else {
            $config['base_url']  = base_url() . 'locations/index.html';
            $config['first_url'] = base_url() . 'locations/index.html';
        }

        $config['per_page']             = 10;
        $config['page_query_string']    = TRUE;
        $config['total_rows']           = $this->Locations_model->total_rows($q);
        $locations                      = $this->Locations_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'locations_data' => $locations,
            'q'              => $q,
            'pagination'     => $this->pagination->create_links(),
            'total_rows'     => $config['total_rows'],
            'start'          => $start,
            'main_content'   => 'admin/locations/locations_list',
        );
        $this->load->view('admin/base/template', $data);
    }

    public function read($id) 
    {
        $row = $this->Locations_model->get_by_id($id);
        if ($row) {
            $data = array(
              'id'              => $row->id,
              'cost_center_id'  => $row->cost_center_id,
              'floor'           => $row->floor,
              'block'           => $row->block,
              'sector'          => $row->sector,
              'room'            => $row->room,
              'created_at'      => $row->created_at,
              'updated_at'      => $row->updated_at,
              'deleted_at'      => $row->deleted_at,
              'status'          => $row->status,
              'fone'            => $row->fone,
              'location_type'   => $row->location_type,
              'main_content'    => 'admin/locations/locations_read',
              );
            $this->load->view('admin/base/template', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('locations'));
        }
    }

    public function create() 
    {
        $data = array(
            'button'         => 'Create',
            'action'         => site_url('locations/create_action'),
            'id'             => set_value('id'),
            'cost_center_id' => set_value('cost_center_id'),
            'floor'          => set_value('floor'),
            'block'          => set_value('block'),
            'sector'         => set_value('sector'),
            'room'           => set_value('room'),
            'created_at'     => set_value('created_at'),
            'updated_at'     => set_value('updated_at'),
            'deleted_at'     => set_value('deleted_at'),
            'status'         => set_value('status'),
            'fone'           => set_value('fone'),
            'location_type'  => set_value('location_type'),
            'main_content'   => 'admin/locations/locations_form',
            );
        $this->load->view('admin/base/template', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
              'cost_center_id'  => $this->input->post('cost_center_id',TRUE),
              'floor'           => $this->input->post('floor',TRUE),
              'block'           => $this->input->post('block',TRUE),
              'sector'          => $this->input->post('sector',TRUE),
              'room'            => $this->input->post('room',TRUE),
              'created_at'      => $this->input->post('created_at',TRUE),
              'updated_at'      => $this->input->post('updated_at',TRUE),
              'deleted_at'      => $this->input->post('deleted_at',TRUE),
              'status'          => $this->input->post('status',TRUE),
              'fone'            => $this->input->post('fone',TRUE),
              'location_type'   => $this->input->post('location_type',TRUE),
            );

            $this->Locations_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('locations'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Locations_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button'         => 'Update',
                'action'         => site_url('locations/update_action'),
                'id'             => set_value('id', $row->id),
                'cost_center_id' => set_value('cost_center_id', $row->cost_center_id),
                'floor'          => set_value('floor', $row->floor),
                'block'          => set_value('block', $row->block),
                'sector'         => set_value('sector', $row->sector),
                'room'           => set_value('room', $row->room),
                'created_at'     => set_value('created_at', $row->created_at),
                'updated_at'     => set_value('updated_at', $row->updated_at),
                'deleted_at'     => set_value('deleted_at', $row->deleted_at),
                'status'         => set_value('status', $row->status),
                'fone'           => set_value('fone', $row->fone),
                'location_type'  => set_value('location_type', $row->location_type),
                'main_content'   => 'locations/locations_form',
            );
            $this->load->view('admin/base/template', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/locations'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
              'cost_center_id'  => $this->input->post('cost_center_id',TRUE),
              'floor'           => $this->input->post('floor',TRUE),
              'block'           => $this->input->post('block',TRUE),
              'sector'          => $this->input->post('sector',TRUE),
              'room'            => $this->input->post('room',TRUE),
              'created_at'      => $this->input->post('created_at',TRUE),
              'updated_at'      => $this->input->post('updated_at',TRUE),
              'deleted_at'      => $this->input->post('deleted_at',TRUE),
              'status'          => $this->input->post('status',TRUE),
              'fone'            => $this->input->post('fone',TRUE),
              'location_type'   => $this->input->post('location_type',TRUE),
              );

            $this->Locations_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('locations'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Locations_model->get_by_id($id);

        if ($row) {
            $this->Locations_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('locations'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('locations'));
        }
    }

    public function _rules() 
    {
       $this->form_validation->set_rules('cost_center_id', 'cost center id', 'trim|required');
       $this->form_validation->set_rules('floor', 'floor', 'trim|required');
       $this->form_validation->set_rules('block', 'block', 'trim|required');
       $this->form_validation->set_rules('sector', 'sector', 'trim|required');
       $this->form_validation->set_rules('room', 'room', 'trim|required');
       $this->form_validation->set_rules('created_at', 'created at', 'trim|required');
       $this->form_validation->set_rules('updated_at', 'updated at', 'trim|required');
       $this->form_validation->set_rules('deleted_at', 'deleted at', 'trim|required');
       $this->form_validation->set_rules('status', 'status', 'trim|required');
       $this->form_validation->set_rules('fone', 'fone', 'trim|required');
       $this->form_validation->set_rules('location_type', 'location type', 'trim|required');
       $this->form_validation->set_rules('id', 'id', 'trim');
       $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
   }

   public function excel()
   {
        $this->load->helper('exportexcel');
        $namaFile = "locations.xls";
        $judul = "locations";
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
        xlsWriteLabel($tablehead, $kolomhead++, "Cost Center Id");
        xlsWriteLabel($tablehead, $kolomhead++, "Floor");
        xlsWriteLabel($tablehead, $kolomhead++, "Block");
        xlsWriteLabel($tablehead, $kolomhead++, "Sector");
        xlsWriteLabel($tablehead, $kolomhead++, "Room");
        xlsWriteLabel($tablehead, $kolomhead++, "Created At");
        xlsWriteLabel($tablehead, $kolomhead++, "Updated At");
        xlsWriteLabel($tablehead, $kolomhead++, "Deleted At");
        xlsWriteLabel($tablehead, $kolomhead++, "Status");
        xlsWriteLabel($tablehead, $kolomhead++, "Fone");
        xlsWriteLabel($tablehead, $kolomhead++, "Location Type");

        foreach ($this->Locations_model->get_all() as $data) {
            $kolombody = 0;

                //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteNumber($tablebody, $kolombody++, $data->cost_center_id);
            xlsWriteLabel($tablebody, $kolombody++, $data->floor);
            xlsWriteLabel($tablebody, $kolombody++, $data->block);
            xlsWriteLabel($tablebody, $kolombody++, $data->sector);
            xlsWriteLabel($tablebody, $kolombody++, $data->room);
            xlsWriteLabel($tablebody, $kolombody++, $data->created_at);
            xlsWriteLabel($tablebody, $kolombody++, $data->updated_at);
            xlsWriteLabel($tablebody, $kolombody++, $data->deleted_at);
            xlsWriteLabel($tablebody, $kolombody++, $data->status);
            xlsWriteLabel($tablebody, $kolombody++, $data->fone);
            xlsWriteLabel($tablebody, $kolombody++, $data->location_type);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Locations.php */
/* Location: ./application/controllers/Locations.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-06-25 22:27:15 */
/* http://harviacode.com */