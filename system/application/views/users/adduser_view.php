<?php
/**
 * Created By: srobarts
 * Date: 11-06-07
 * Time: 3:27 PM
 * BlinkLab Web Development, all rights reserved
 */

    echo "<h2>Add User</h2>";
    echo "<p align=\"right\">";
    echo anchor('users', 'Back to User List', 'class="button"');
    echo "</p>";

    if(validation_errors() != "")
    {
        echo "<div id=\"validation_errors_block\">";
        echo validation_errors('<p class="error">');
        echo "</div>";
    }

    echo form_open('users/user_insert');

?>

<table class="mytable">
    <thead>Add User</thead>
    <tr>
        <th>User First Name:</th>
        <td><?php echo form_input('userFirstName', set_value('userFirstName', '')); ?></td>
    </tr>
    <tr>
        <th>User Last Name:</th>
        <td><?php echo form_input('userLastName', set_value('userLastName', '')); ?></td>
    </tr>


</table>



