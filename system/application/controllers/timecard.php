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
        $this->load->model('user_model');
        $this->load->model('paytypes_model');
	}

	function index()
	{
        //get the userid of the user so that we can determine what he can see
        $userID = $this->session->userdata('userID');

        if( $query = $this->timecard_model->getTimecardForUser($userID) )
        {
            $data['records'] = $query;
        }

        if( $query = $this->paytypes_model->getAll() )
        {
            $data['paytypes'] = $query;
        }

        //page values
        $data['title'] = "NVDPL Timecards Application";
        $data['heading'] = "NVDPL Timecards Application";
        $data['tabnum'] = 1;

        $data['main_content'] = 'timecard/timecard_view';
        $this->load->view('includes/listing/template', $data);
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
        //add a new timecard - add timecard
    }

    function edit_timecard()
    {
        //edit an existing timecard

    }

    function delete_timecard()
    {
        //delete a timecard

    }

    function manage_users()
    {
        //this is a new comment
    }

}
