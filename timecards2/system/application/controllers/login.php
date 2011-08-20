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
        if(($this->session->userdata) != null)
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
            //load user information into the session
            foreach($query as $row)
            {
                $userID = $row->userID;
                $userFirstName = $row->firstName;
                $userLastName = $row->lastName;
                $userEmail = $row->userEmail;
                $userTypeID = $row->userTypeID;
            }
            $data = array(
                'userID' => $userID,
                'firstName' => $userFirstName,
                'lastName' => $userLastName,
                'userEmail' => $userEmail,
                'userTypeID' => $userTypeID,
                'is_logged_in' => true,
                'timeout' => time()
            );
            //Create session
            $this->session->set_userdata($data);

            //and send user to the timecard controller
            redirect('timecard');
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

    function logout()
    {
        $data = array(
            'username' => '',
            'is_logged_in' => false
        );
        $this->session->unset_userdata($data);
        redirect('login');
    }

}
