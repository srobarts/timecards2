<?php
/**
 * Created by JetBrains PhpStorm.
 * User: srobarts
 * Date: 12/14/10
 * Time: 2:17 PM
 * To change this template use File | Settings | File Templates.
 */
 
class timecard_model extends Model {

    function timecard_model()
    {
        // Call the Model constructor
        parent::Model();
        $this->load->database();



    }

}