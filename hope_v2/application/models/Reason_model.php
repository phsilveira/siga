<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Reason_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get reason by id
     */
    function get_reason($id)
    {
        return $this->db->get_where('reasons',array('id'=>$id))->row_array();
    }
        
    /*
     * Get all reasons
     */
    function get_all_reasons()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('reasons')->result_array();
    }
        
    /*
     * function to add new reason
     */
    function add_reason($params)
    {
        $this->db->insert('reasons',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update reason
     */
    function update_reason($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('reasons',$params);
    }
    
    /*
     * function to delete reason
     */
    function delete_reason($id)
    {
        return $this->db->delete('reasons',array('id'=>$id));
    }
}