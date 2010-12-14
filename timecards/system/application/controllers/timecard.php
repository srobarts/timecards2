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

function open_new_timecard()
{
    //this is a new function
}

function add_timecard()
{
    //the system is adding a new timecard
}
