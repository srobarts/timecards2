<?php
/**
 * Created by Scott Robarts
 * User: srobarts
 * Date: Feb 11, 2011
 * Time: 9:36:36 PM
 * To change this template use File | Settings | File Templates.
 */
 
class user_model extends Model {

    function user_model()
    {
        // Call the Model constructor
        parent::Model();
        $this->load->database();
    }

    function validate()
    {
        $this->db->where('username', $this->input->post('username'));
        $this->db->where('password', $this->input->post('password'));
        $query = $this->db->get('users');

        if($query->num_rows == 1)
        {
            return $query->result();
        }
    }

    function getAll($userID)
    {
        $this->db->where('userID', $userID);
        $query = $this->db->get('users');
        return $query;
    }

    function getUserPayTypeDesc($userPayTypeID)
    {
        $this->db->where('userPayTypeID', $userPayTypeID);
        $query = $this->db->get('userPayType');
        return $query;
    }

}