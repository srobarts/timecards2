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
        //load model
        $this->load->model('timecard_model');
	}

	function index()
	{
		$this->load->view('welcome_message');
	}
}


function add_timecard()
{
    //the system is adding a new timecard
    //this comment was just added
    $this->timecard_model->add_new();
}
