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
        $this->load->library('customlibraries');

        //is user already logged in?
        if($this->session->userdata('is_logged_in') == true)
        {
            redirect('transaction');
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

            //create two-week cookie if requested
            /*if($this->input->post('rememberMe'))
            {
                $cookie = array(
                    'name'   => 'rjm_cookie',
                    'userEmail'  => $this->input->post('userEmail'),
                    'userPassword' => md5($this->input->post('userPassword')),
                    'expire' => '1209600', //two weeks
                    'domain' => '.raeyco.com',
                    'path'   => '/',
                    'prefix' => 'raeycojobmgr_',
                );
                set_cookie($cookie);
            }*/
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

    function logout()
    {
        $data = array(
            'username' => '',
            'is_logged_in' => false
        );
        $this->session->unset_userdata($data);
        redirect('login');
    }

/*    function register()
    {
        $data['main_content'] = 'login/register_view';
        $this->load->view('includes/login/template', $data);
    }

    function create_user()
    {
        $this->load->library('form_validation');
        //field name, error msg, validation rules

        $this->form_validation->set_rules('userFirstName', 'First Name', 'trim|required');
        $this->form_validation->set_rules('userLastName', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('userEmail', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('userTitle', 'Title', 'trim');
        $this->form_validation->set_rules('userPhone', 'Phone', 'trim|required');
        $this->form_validation->set_rules('userMobile', 'Mobile', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]');
        $this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|required|matches[password]');

        if($this->form_validation->run() == FALSE) //there was a problem
        {
            $data['main_content'] = 'login/register_view';
            $this->load->view('includes/login/template', $data);
        }
        else
        {
            $this->load->model('user_model');
            if($query = $this->user_model->create_user())
            {
                //login is successful
                $data['main_content'] = 'login/register_success';
                $this->load->view('includes/login/template', $data);
            }
            else
            {
                //there was a problem with the login - send them back to the prompt
                $data['main_content'] = 'login/register_view';
                $this->load->view('includes/login/template', $data);
            }
        }
    }*/

    function change_password()
    {
        $data['main_content'] = 'login/change_password_view';
        $this->load->view('includes/smallform/template', $data);
    }

    function process_change_password()
    {
        $this->load->library('form_validation');
        $this->load->model('user_model');
        $userID = $this->session->userdata('userID');

        $this->form_validation->set_rules('oldpassword', 'Old Password', 'callback_password_check');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
        $this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|required|matches[password]');

        if($this->form_validation->run() == FALSE) //there was a problem
        {
            $data['main_content'] = 'login/change_password_view';
            $this->load->view('includes/smallform/template', $data);
        }
        else
        {
            $data = array(
                'userPassword' => md5($this->input->post('password')),
                'userID' => $userID
            );
            $this->user_model->change_password_user($data);

            //change is successfull
            $data['main_content'] = 'login/change_password_success';
            $this->load->view('includes/smallform/template', $data);
        }
    }

    function password_check($str)
	{
        $this->load->model('user_model');
        $userID = $this->session->userdata('userID');
        if($query = $this->user_model->get_password_for_user($userID, $str))
        {
            foreach($query as $row)
            {
                if($row->userPassword != md5($str))
                {
                    //user and password no match
                    $this->form_validation->set_message('password_check', 'Old password incorrect, please try again');
                    return FALSE;
                }
                else
                {
                    return TRUE;
                }
            }
        }
	}

    function lost_password()
    {
        $data['main_content'] = 'login/lost_password_view';
        $this->load->view('includes/lost_pass/template', $data);
    }

    function lost_password_reset()
    {
        $this->load->library('email');
        $this->load->library('form_validation');
        $this->load->library('customlibraries');
        $this->load->model('user_model');
        //$userID = $this->session->userdata('userID');

        $this->form_validation->set_rules('userEmail', 'E-mail', 'trim|required|valid_email|callback_email_check');

        if($this->form_validation->run() == FALSE) //there was a problem
        {
            $data['main_content'] = 'login/lost_password_view';
            $this->load->view('includes/lost_pass/template', $data);
        }
        else
        {
            //user exists
            $userEmail = $this->input->post('userEmail');

            //get userid
            $query = $this->user_model->verify_user_by_email($userEmail);
            foreach($query as $row)
            {
                $userID = $row->userID;
            }

            //generate new password
            $newPass = $this->customlibraries->get_random_password();

            //set password in database associated with user
            $data = array(
                'userPassword' => md5($newPass),
                'userID' => $userID
            );
            $this->user_model->change_password_user($data);

            //email user new password
            $this->email->from('customercare@raeyco.com', 'Raeyco');
            $this->email->to($userEmail);  //change to user's email
            $this->email->subject('Raeyco Password Reset');
            $html = "<strong>Password Reset Request</strong>";
            $html = $html . "<p>Password reset for " . $userEmail . "</p>";
            $html = $html . "<p>New password is " . $newPass . "</p>";
            $html = $html . "<p>Use this password to login to your account, then you can <br>
                            change it to something of your choosing.</p>";
            $html = $html . "<a href=\"http://www.raeyco.com/jobmgr/\">Click here to go to login page</a>";
            $this->email->message($html);
            $this->email->send();
            //echo $this->email->print_debugger();
            $data['main_content'] = 'login/lost_password_success';
            $this->load->view('includes/lost_pass/template', $data);
        }
    }

    function email_check($str)
    {
        if(!($this->user_model->verify_user_by_email($str)))
        {
            //user and password no match
            $this->form_validation->set_message('email_check', 'That e-mail does not exist on our system, please try again');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

}
