<?php
/**
 * User: srobarts
 * Date: 10-Oct-2010
 * Time: 10:48:21 PM
 * Login Controller
 */

class Login extends Controller {

	function index()
	{
        //load the model
        $this->load->model('user_model');
        //$this->load->library('customlibraries');

        //is user already logged in?
        if(!($this->session->userdata) == null)
        {
            if($this->session->userdata('is_logged_in') == true)
            {
                redirect('timecard');
            }
        }

        $data['loginStatus'] = TRUE;

        $data['main_content'] = 'login/login_view';
        $this->load->view('includes/login/template', $data);
	}

    function validate()
    {
        $this->load->model('user_model');
        $this->load->helper('cookie');

        if($query = $this->user_model->validate()) //succesful validation
        {
            foreach($query as $row)
            {
                $userID = $row->userID;
                $userFirstName = $row->userFirstName;
                $userLastName = $row->userLastName;
                $userEmail = $row->userEmail;
                $userTypeID = $row->userTypeID;
                $userPhone = $row->userPhone;
            }
            $data = array(
                'userID' => $userID,
                'userFirstName' => $userFirstName,
                'userLastName' => $userLastName,
                'userEmail' => $userEmail,
                'userTypeID' => $userTypeID,
                'userPhone' => $userPhone,
                'is_logged_in' => true,
                'timeout' => time()
            );
            //Create session
            $this->session->set_userdata($data);

            redirect('transaction');
        }
        else
        {
            //failed login validation - send back to login page
            $data['loginStatus'] = FALSE;

            $data['main_content'] = 'login/login_view';
            $this->load->view('includes/login/template', $data);
            //$this->index();
        }
    }

}
