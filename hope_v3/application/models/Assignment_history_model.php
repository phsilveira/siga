<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Assignment_history_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get assignment_history by id
     */
    function get_assignment_history($id)
    {
        return $this->db->get_where('assignment_history',array('id'=>$id))->row_array();
    }
        
    /*
     * Get all assignment_history
     */
    function get_all_assignment_history()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('assignment_history')->result_array();
    }
        
    /*
     * function to add new assignment_history
     */
    function add_assignment_history($params)
    {
        $this->db->insert('assignment_history',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update assignment_history
     */
    function update_assignment_history($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('assignment_history',$params);
    }
    
    /*
     * function to delete assignment_history
     */
    function delete_assignment_history($id)
    {
        return $this->db->delete('assignment_history',array('id'=>$id));
    }
}