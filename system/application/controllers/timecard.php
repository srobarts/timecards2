<?php
/**
 * Created by JetBrains PhpStorm.
 * User: srobarts
 * Date: 12/14/10
 * Time: 2:17 PM
 * To change this template use File | Settings | File Templates.
 */


class Timecard extends Controller {


	function Timecard()
	{
        parent::Controller();

        //check to see if the user is logged in
        $this->is_logged_in();
        
        $this->load->model('timecard_model');
	}

	function index()
	{
		$this->load->view('welcome_message');
	}

    function is_logged_in()
    {
        //function to check if user is logged in
        $is_logged_in = $this->session->userdata('is_logged_in');

        if(!isset($is_logged_in) || $is_logged_in != true )
        {
            $data['main_content'] = 'login/notloggedin_view';
            $this->load->view('includes/template', $data);
        }
    }


    function add_timecard()
    {
        //add a new timecard
    }

    function edit_timecard()
    {
        //edit an existing timecard

    }

    function delete_timecard()
    {
        //delete a timecard

    }

}
