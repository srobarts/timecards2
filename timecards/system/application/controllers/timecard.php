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
    $this->timecard_model->add_new();
}
