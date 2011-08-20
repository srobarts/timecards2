<?php
/**
 * Created by Scott Robarts, Blink Web Design and Development.
 * User: srobarts
 * Date: 16/12/10
 * Time: 9:42 PM
 * All rights reserved.
 */
?>

<h2>Reset Lost Password</h2>

<div id="myDiv" style="display:none">
    <p>A new password has been sent to your e-mail address.</p>
</div>

<?php
    echo "<p class=\"redtext\">" . validation_errors() . "</p>";
    echo form_open('login/lost_password_reset');

    echo form_label('Enter your e-mail address:', 'userEmail');
    echo "<br><br>";
    echo form_input('userEmail', 'User Email');

    echo form_submit('submit', 'Submit')
?>


