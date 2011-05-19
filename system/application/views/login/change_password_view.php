<?php
/**
 * Created by Scott Robarts, Blink Web Design and Development.
 * User: srobarts
 * Date: 16/12/10
 * Time: 4:21 PM
 * All rights reserved.
 */
?>

<h2>Change Password</h2>

<?php $userID = $this->session->userdata('userID'); ?>

<?php echo form_open('login/process_change_password'); ?>

<?php
    echo "<p align=\"right\">";
    echo "<a href=\"javascript:history.go(-1)\">Cancel and Go Back</a>";
    echo "</p>";
?>

<div id="validation_errors_block">
    <?php echo validation_errors('<p class="error">'); ?>
</div>


<table class="mytable">
    <tr><td colspan="2" class="noborder"><em>You must know your old password to be allowed to change it.<br>If you
        have lost your password please CLICK HERE to go to the 'lost password' page.</em></td></tr>
    <tr>
        <th>Old password:</th>
        <td class="firsttopcell"><?php echo form_password('oldpassword', set_value('oldpassword', 'Old Password')); ?></td>
    </tr>
    <tr>
        <th>New password:</th>
        <td><?php echo form_password('password', set_value('password2', 'Password')); ?></td>
    </tr>
    <tr>
        <th>New password confirmation:</th>
        <td><?php echo form_password('password2', set_value('password', 'Password Confirm')); ?></td>
    </tr>
</table>
    
    <?php echo form_submit('submit', 'Change Password'); ?>

    <?php form_hidden('userID', $userID); ?>




