<?php
/**
 * Created By: srobarts
 * Date: 11-08-16
 * Time: 9:16 PM
 * BlinkLab Web Development, all rights reserved
 */

class paytypes_model extends CI_Model {

    function paytypes_model()
    {
        // Call the Model constructor
        parent::Model();
        $this->load->database();
    }

    function getAll()
    {
        $query = $this->db->get('userpaytype');
        return $query->result();
    }

}

?>
