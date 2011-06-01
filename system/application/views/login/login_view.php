
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

    echo "Username: ";
    echo form_input('username', '');
    echo "Password: ";
    echo form_password('password', '');

    echo form_submit('submit', 'Login');

    echo anchor('login/lost_password', 'I Lost My Password');	echo "<br /><br />";	
	echo "<em>Having trouble logging in?  </em>";
	echo anchor('http://raeyco.com/contact/', 'Contact Customer Care', 'class="italiclink"');
	
    ?>
</div>
</body>
</html>

