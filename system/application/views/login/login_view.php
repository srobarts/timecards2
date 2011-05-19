
<html>
<head>
<title>Login</title>
</head>
<body onload="document.forms.loginform.userEmail.focus()">

<div id="login_form">
    <h1>Login</h1>

    <?php

    if(!$loginStatus)
    {
        echo "<em>Sorry, username or password were incorrect,<br> please try again.</em><br><br>";
    }

    $attributes = array('id' => 'loginform');
    echo form_open('login/validate', $attributes);

    echo "User Email: ";
    echo form_input('userEmail', '');
    echo "User Password: ";
    echo form_password('userPassword', '');
    $data = array(
        'name'        => 'rememberMe',
        'id'          => 'rememberMe',
        'value'       => 'accept',
        'checked'     => FALSE,
    );	
   /* echo form_checkbox($data);
    echo "<em>Remember me for two weeks.</em>";
    echo "<br><br>";*/

    echo form_submit('submit', 'Login');

    echo anchor('login/lost_password', 'I Lost My Password');	echo "<br /><br />";	
	echo "<em>Having trouble logging in?  </em>";
	echo anchor('http://raeyco.com/contact/', 'Contact Customer Care', 'class="italiclink"');
	
    ?>
</div>
</body>
</html>

