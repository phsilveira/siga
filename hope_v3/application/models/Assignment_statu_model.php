<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Assignment_statu_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get assignment_statu by id
     */
    function get_assignment_statu($id)
    {
        return $this->db->get_where('assignment_status',array('id'=>$id))->row_array();
    }
        
    /*
     * Get all assignment_status
     */
    function get_all_assignment_status()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('assignment_status')->result_array();
    }
        
    /*
     * function to add new assignment_statu
     */
    function add_assignment_statu($params)
    {
        $this->db->insert('assignment_status',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update assignment_statu
     */
    function update_assignment_statu($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('assignment_status',$params);
    }
    
    /*
     * function to delete assignment_statu
     */
    function delete_assignment_statu($id)
    {
        return $this->db->delete('assignment_status',array('id'=>$id));
    }
}
