<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>


<head>
    <title></title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/styles.css" type="text/css" media="screen" charset="utf-8">
    <!--[if IE]><link rel="stylesheet" href="<?php echo base_url(); ?>css/ieoverride.css" type="text/css" media="screen" charset="utf-8"><![endif]-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/little_cal.css" type="text/css" media="screen" charset="utf-8">
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
    <!-- <script type="text/javascript" charset="utf-8"> -->

        <script>
	        $(function() {
		        $( "#datepicker1, #datepicker2, #datepicker3, #datepicker4, #datepicker5, #datepicker6, #datepicker7" ).datepicker({
                    dateFormat: "DD, d MM yy",
			        altField: "#alternate",
			        altFormat: 'yy-mm-dd'
		        });
	        });
	    </script>

</head>

<body id="<?php echo "tab" . $tabnum ?>">

<?php
//    if(($this->session->userdata('userTypeID')))
//    {
//        //session variable exists
//        if(($this->session->userdata('userTypeID') != 1) && (($tabnum == 3 || $tabnum == 4 || $tabnum == 5 || $tabnum == 6)))
//        {
//            //user is a technician or client - not allowed to see pages
//            echo "sorry you are not authorized to view this page";
//            die();
//        }
//    }
//    else
//    {
//        redirect(login);
//    }

    // set timeout period in seconds
    $inactive = 1800;
    $userexists = false;

    // check to see if $_SESSION['timeout'] is set
    if($this->session->userdata('timeout'))
    {
        $session_life = time() - $this->session->userdata('timeout');
        if($session_life > $inactive)
        {
            $this->session->sess_destroy();
            echo anchor('login', 'You have been inactive for 20 minutes, please login again');
            die();
        }
        $this->session->set_userdata('timeout', time());
    }

?>

	<div id="wrapper">
	    <div id="header">

            <?php
                $firstName = $this->session->userdata['firstName'];
                $lastName = $this->session->userdata['lastName'];
                $clientName = $firstName . " " . $lastName;
            ?>

            <p align="right"><img src="<?php echo base_url(); ?>images/icons/lock.png" /> Logged In: <?php echo $clientName; ?></p>
            
            <p align="right"><a href="<?php echo base_url(); ?>index.php/login/change_password">Change Your Password</a> | <a href="<?php echo base_url(); ?>index.php/login/logout">Logout</a></p>
            <div id="header_image">
                <img src="<?php echo base_url(); ?>images/doc_banner2.png" alt="Raeyco Lab Equipment Systems Management"/>
            </div>
        </div>
        <div id="tabmenu">
            <?php $this->load->view('includes/listing/tabmenu'); ?>
        </div>
	    <div id="main">

        <?php



