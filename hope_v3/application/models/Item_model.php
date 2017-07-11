<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Item_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get item by id
     */
    function get_item($id)
    {
        return $this->db->get_where('items',array('id'=>$id))->row_array();
    }
        
    /*
     * Get all items
     */
    function get_all_items()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('items')->result_array();
    }
        
    /*
     * function to add new item
     */
    function add_item($params)
    {
        $this->db->insert('items',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update item
     */
    function update_item($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('items',$params);
    }
    
    /*
     * function to delete item
     */
    function delete_item($id)
    {
        return $this->db->delete('items',array('id'=>$id));
    }
}