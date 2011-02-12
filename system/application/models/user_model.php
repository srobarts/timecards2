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

}