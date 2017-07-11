<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Items extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Items_model');
        $this->load->library('form_validation');
        if(!$this->session->userdata('is_logged_in')){
            redirect('login');
        }
    }

    public function index()
    {
        $q      = urldecode($this->input->get('q', TRUE));
        $start  = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url']  = base_url() . 'items/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'items/index.html?q=' . urlencode($q);
        } else {
            $config['base_url']  = base_url() . 'items/index.html';
            $config['first_url'] = base_url() . 'items/index.html';
        }

        $config['per_page']             = 10;
        $config['page_query_string']    = TRUE;
        $config['total_rows']           = $this->Items_model->total_rows($q);
        $items                          = $this->Items_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'items_data'    => $items,
            'q'             => $q,
            'pagination'    => $this->pagination->create_links(),
            'total_rows'    => $config['total_rows'],
            'start'         => $start,
            'main_content'  => 'admin/items/items_list',
        );
        $this->load->view('admin/base/template', $data);
    }

    public function read($id) 
    {
        $row = $this->Items_model->get_by_id($id);
        if ($row) {
            $data = array(
              'id'            => $row->id,
              'name'          => $row->name,
              'description'   => $row->description,
              'created_at'    => $row->created_at,
              'updated_at'    => $row->updated_at,
              'deleted_at'    => $row->deleted_at,
              'main_content'  => 'admin/items/items_read',
            );
            $this->load->view('admin/base/template', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('items'));
        }
    }

    public function create() 
    {
        $data = array(
            'button'        => 'Create',
            'action'        => site_url('items/create_action'),
            'id'            => set_value('id'),
            'name'          => set_value('name'),
            'description'   => set_value('description'),
            'created_at'    => set_value('created_at'),
            'updated_at'    => set_value('updated_at'),
            'deleted_at'    => set_value('deleted_at'),
            'main_content'  => 'admin/items/items_form',
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
              'name'        => $this->input->post('name',TRUE),
              'description' => $this->input->post('description',TRUE),
              'created_at'  => $this->input->post('created_at',TRUE),
              'updated_at'  => $this->input->post('updated_at',TRUE),
              'deleted_at'  => $this->input->post('deleted_at',TRUE),
            );

            $this->Items_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('items'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Items_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button'        => 'Update',
                'action'        => site_url('items/update_action'),
                'id'            => set_value('id', $row->id),
                'name'          => set_value('name', $row->name),
                'description'   => set_value('description', $row->description),
                'created_at'    => set_value('created_at', $row->created_at),
                'updated_at'    => set_value('updated_at', $row->updated_at),
                'deleted_at'    => set_value('deleted_at', $row->deleted_at),
                'main_content'  => 'admin/items/items_form',
                );
            $this->load->view('admin/base/template', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('items'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
              'name'        => $this->input->post('name',TRUE),
              'description' => $this->input->post('description',TRUE),
              'created_at'  => $this->input->post('created_at',TRUE),
              'updated_at'  => $this->input->post('updated_at',TRUE),
              'deleted_at'  => $this->input->post('deleted_at',TRUE),
            );

            $this->Items_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('items'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Items_model->get_by_id($id);

        if ($row) {
            $this->Items_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('items'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('items'));
        }
    }

    public function _rules() 
    {
       $this->form_validation->set_rules('name', 'name', 'trim|required');
       $this->form_validation->set_rules('description', 'description', 'trim|required');
       $this->form_validation->set_rules('created_at', 'created at', 'trim|required');
       $this->form_validation->set_rules('updated_at', 'updated at', 'trim|required');
       $this->form_validation->set_rules('deleted_at', 'deleted at', 'trim|required');
       $this->form_validation->set_rules('id', 'id', 'trim');
       $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
   }

   public function excel()
   {
        $this->load->helper('exportexcel');
        $namaFile = "items.xls";
        $judul = "items";
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
        xlsWriteLabel($tablehead, $kolomhead++, "Name");
        xlsWriteLabel($tablehead, $kolomhead++, "Description");
        xlsWriteLabel($tablehead, $kolomhead++, "Created At");
        xlsWriteLabel($tablehead, $kolomhead++, "Updated At");
        xlsWriteLabel($tablehead, $kolomhead++, "Deleted At");

        foreach ($this->Items_model->get_all() as $data) {
            $kolombody = 0;

            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->name);
            xlsWriteLabel($tablebody, $kolombody++, $data->description);
            xlsWriteLabel($tablebody, $kolombody++, $data->created_at);
            xlsWriteLabel($tablebody, $kolombody++, $data->updated_at);
            xlsWriteLabel($tablebody, $kolombody++, $data->deleted_at);
            $tablebody++;
            $nourut++;
        }
        xlsEOF();
        exit();
    }
}

/* End of file Items.php */
/* Location: ./application/controllers/Items.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-06-25 22:27:05 */
/* http://harviacode.com */