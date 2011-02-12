<?php
/**
 * Created by PhpStorm.
 * User: srobarts
 * Date: Feb 11, 2011
 * Time: 9:36:25 PM
 * To change this template use File | Settings | File Templates.
 */
 
class Users extends Controller {

    function Users()
    {
        parent::Controller();
        //check to see if the user is logged in --
        $this->is_logged_in();

        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('table');
        $this->load->model('user_model');
        $this->load->model('agency_model');
		$this->load->library('form_validation');
        $this->load->library('pdf');
    }

    function index()
    {
        
    }

}