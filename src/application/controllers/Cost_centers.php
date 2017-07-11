<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cost_centers extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Cost_centers_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'cost_centers/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'cost_centers/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'cost_centers/index.html';
            $config['first_url'] = base_url() . 'cost_centers/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Cost_centers_model->total_rows($q);
        $cost_centers = $this->Cost_centers_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'cost_centers_data' => $cost_centers,
            'q'                 => $q,
            'pagination'        => $this->pagination->create_links(),
            'total_rows'        => $config['total_rows'],
            'start'             => $start,
            'main_content'      => 'admin/cost_centers/cost_centers_list',
        );
        $this->load->view('admin/base/template', $data);
    }

    public function read($id) 
    {
        $row = $this->Cost_centers_model->get_by_id($id);
        if ($row) {
            $data = array(
              'id'          => $row->id,
              'created_at'  => $row->created_at,
              'updated_at'  => $row->updated_at,
              'deleted_at'  => $row->deleted_at,
              'status'      => $row->status,
              'name'        => $row->name,
              'description' => $row->description,
              'main_content'=> 'admin/cost_centers/cost_centers_read',
            );
            $this->load->view('admin/base/template', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('cost_centers'));
        }
    }

    public function create() 
    {
        $data = array(
            'button'        => 'Create',
            'action'        => site_url('cost_centers/create_action'),
            'id'            => set_value('id'),
            'created_at'    => set_value('created_at'),
            'updated_at'    => set_value('updated_at'),
            'deleted_at'    => set_value('deleted_at'),
            'status'        => set_value('status'),
            'name'          => set_value('name'),
            'description'   => set_value('description'),
            'main_content'  => 'admin/cost_centers/cost_centers_form',
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
              'created_at'  => $this->input->post('created_at',TRUE),
              'updated_at'  => $this->input->post('updated_at',TRUE),
              'deleted_at'  => $this->input->post('deleted_at',TRUE),
              'status'      => $this->input->post('status',TRUE),
              'name'        => $this->input->post('name',TRUE),
              'description' => $this->input->post('description',TRUE),
            );
            $this->Cost_centers_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('cost_centers'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Cost_centers_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button'        => 'Update',
                'action'        => site_url('cost_centers/update_action'),
                'id'            => set_value('id', $row->id),
                'created_at'    => set_value('created_at', $row->created_at),
                'updated_at'    => set_value('updated_at', $row->updated_at),
                'deleted_at'    => set_value('deleted_at', $row->deleted_at),
                'status'        => set_value('status', $row->status),
                'name'          => set_value('name', $row->name),
                'description'   => set_value('description', $row->description),
                'main_content'  => 'admin/cost_centers/cost_centers_form',
            );
            $this->load->view('admin/base/template', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('cost_centers'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
              'created_at'  => $this->input->post('created_at',TRUE),
              'updated_at'  => $this->input->post('updated_at',TRUE),
              'deleted_at'  => $this->input->post('deleted_at',TRUE),
              'status'      => $this->input->post('status',TRUE),
              'name'        => $this->input->post('name',TRUE),
              'description' => $this->input->post('description',TRUE),
              );

            $this->Cost_centers_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('cost_centers'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Cost_centers_model->get_by_id($id);

        if ($row) {
            $this->Cost_centers_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('cost_centers'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('cost_centers'));
        }
    }

    public function _rules() 
    {
       $this->form_validation->set_rules('created_at', 'created at', 'trim|required');
       $this->form_validation->set_rules('updated_at', 'updated at', 'trim|required');
       $this->form_validation->set_rules('deleted_at', 'deleted at', 'trim|required');
       $this->form_validation->set_rules('status', 'status', 'trim|required');
       $this->form_validation->set_rules('name', 'name', 'trim|required');
       $this->form_validation->set_rules('description', 'description', 'trim|required');
       $this->form_validation->set_rules('id', 'id', 'trim');
       $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "cost_centers.xls";
        $judul = "cost_centers";
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
        xlsWriteLabel($tablehead, $kolomhead++, "Created At");
        xlsWriteLabel($tablehead, $kolomhead++, "Updated At");
        xlsWriteLabel($tablehead, $kolomhead++, "Deleted At");
        xlsWriteLabel($tablehead, $kolomhead++, "Status");
        xlsWriteLabel($tablehead, $kolomhead++, "Name");
        xlsWriteLabel($tablehead, $kolomhead++, "Description");

        foreach ($this->Cost_centers_model->get_all() as $data) {
            $kolombody = 0;

                //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->created_at);
            xlsWriteLabel($tablebody, $kolombody++, $data->updated_at);
            xlsWriteLabel($tablebody, $kolombody++, $data->deleted_at);
            xlsWriteLabel($tablebody, $kolombody++, $data->status);
            xlsWriteLabel($tablebody, $kolombody++, $data->name);
            xlsWriteLabel($tablebody, $kolombody++, $data->description);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Cost_centers.php */
/* Location: ./application/controllers/Cost_centers.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-06-25 22:26:56 */
/* http://harviacode.com */