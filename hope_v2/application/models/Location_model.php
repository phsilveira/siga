<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Location_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get location by id
     */
    function get_location($id)
    {
        return $this->db->get_where('locations',array('id'=>$id))->row_array();
    }
        
    /*
     * Get all locations
     */
    function get_all_locations()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('locations')->result_array();
    }
        
    /*
     * function to add new location
     */
    function add_location($params)
    {
        $this->db->insert('locations',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update location
     */
    function update_location($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('locations',$params);
    }
    
    /*
     * function to delete location
     */
    function delete_location($id)
    {
        return $this->db->delete('locations',array('id'=>$id));
    }
}