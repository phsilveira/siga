<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Utils_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }


    function get_all_reasons()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('reasons')->result();
    }

    function get_all_assignment_status()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('assignment_status')->result();
    }




}

/* End of file Items_model.php */
/* Location: ./application/models/Items_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-06-25 22:27:05 */
/* http://harviacode.com */