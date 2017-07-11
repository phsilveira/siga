<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Cost_center extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Cost_center_model');
    } 

    /*
     * Listing of cost_centers
     */
    function index()
    {
        $data['cost_centers'] = $this->Cost_center_model->get_all_cost_centers();
        
        $data['_view'] = 'cost_center/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new cost_center
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'created_at' => $this->input->post('created_at'),
				'updated_at' => $this->input->post('updated_at'),
				'deleted_at' => $this->input->post('deleted_at'),
				'status' => $this->input->post('status'),
				'name' => $this->input->post('name'),
				'description' => $this->input->post('description'),
            );
            
            $cost_center_id = $this->Cost_center_model->add_cost_center($params);
            redirect('cost_center/index');
        }
        else
        {            
            $data['_view'] = 'cost_center/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a cost_center
     */
    function edit($id)
    {   
        // check if the cost_center exists before trying to edit it
        $data['cost_center'] = $this->Cost_center_model->get_cost_center($id);
        
        if(isset($data['cost_center']['id']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'created_at' => $this->input->post('created_at'),
					'updated_at' => $this->input->post('updated_at'),
					'deleted_at' => $this->input->post('deleted_at'),
					'status' => $this->input->post('status'),
					'name' => $this->input->post('name'),
					'description' => $this->input->post('description'),
                );

                $this->Cost_center_model->update_cost_center($id,$params);            
                redirect('cost_center/index');
            }
            else
            {
                $data['_view'] = 'cost_center/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The cost_center you are trying to edit does not exist.');
    } 

    /*
     * Deleting cost_center
     */
    function remove($id)
    {
        $cost_center = $this->Cost_center_model->get_cost_center($id);

        // check if the cost_center exists before trying to delete it
        if(isset($cost_center['id']))
        {
            $this->Cost_center_model->delete_cost_center($id);
            redirect('cost_center/index');
        }
        else
            show_error('The cost_center you are trying to delete does not exist.');
    }
    
}