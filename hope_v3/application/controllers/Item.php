<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Item extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Item_model');
    } 

    /*
     * Listing of items
     */
    function index()
    {
        $data['items'] = $this->Item_model->get_all_items();
        
        $data['_view'] = 'item/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new item
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'name' => $this->input->post('name'),
				'description' => $this->input->post('description'),
				'created_at' => $this->input->post('created_at'),
				'updated_at' => $this->input->post('updated_at'),
				'deleted_at' => $this->input->post('deleted_at'),
            );
            
            $item_id = $this->Item_model->add_item($params);
            redirect('item/index');
        }
        else
        {            
            $data['_view'] = 'item/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a item
     */
    function edit($id)
    {   
        // check if the item exists before trying to edit it
        $data['item'] = $this->Item_model->get_item($id);
        
        if(isset($data['item']['id']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'name' => $this->input->post('name'),
					'description' => $this->input->post('description'),
					'created_at' => $this->input->post('created_at'),
					'updated_at' => $this->input->post('updated_at'),
					'deleted_at' => $this->input->post('deleted_at'),
                );

                $this->Item_model->update_item($id,$params);            
                redirect('item/index');
            }
            else
            {
                $data['_view'] = 'item/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The item you are trying to edit does not exist.');
    } 

    /*
     * Deleting item
     */
    function remove($id)
    {
        $item = $this->Item_model->get_item($id);

        // check if the item exists before trying to delete it
        if(isset($item['id']))
        {
            $this->Item_model->delete_item($id);
            redirect('item/index');
        }
        else
            show_error('The item you are trying to delete does not exist.');
    }
    
}
