<?php
/**
 * Created By: srobarts
 * Date: 11-08-14
 * Time: 9:11 PM
 * BlinkLab Web Development, all rights reserved
 */
?>

<h4>Enter Timecard</h4>

<div id="listing">

	<?php echo form_open('timecard/process_add_timecard'); ?>

    <table class="mytable">
        <tr>
            <th width="200">Emp Num</th>
            <th width="200">Emp Name</th>
            <th width="200">Pay Type Desc</th>
            <th width="200">Hours</th>
            <th width="200">Acct Num</th>
            <th width="200">Date</th>
			<th width="200">Action</th>
        </tr>

<?php

    echo "<tr>";

    if(isset($records))
    {
        foreach($records as $row)
        {
            echo "<tr>";

			echo form_open('timeentry/process_add_timeentry');

            echo "<td class=\"firstleftcell\">";
            echo $row->employeeNum;
            echo "</td>";

            echo "<td>";
            echo $row->lastName . ", " . $row->firstName;
            echo "</td>";

            ?>
            <td>
            <select name="paytype" class="filter">
                <?php
                    foreach($paytypes as $paytype)
                    {
                        echo "<option value=" . "'$paytype->userPayTypeID'" . ">" . $paytype->userPayTypeDesc . "</option>";
                    }
                ?>
            </select>
            </td>

            <?php

            echo "<td>";
            echo form_input('totalHours', set_value('totalHours', $row->totalHours));
            echo "</td>";

            echo "<td>" . $row->accountNum . "</td>";

            /************************* Date ****************************/
            $formattedDate = date("m/d/y", strtotime($row->entryDate));
            echo "<td>";
            echo "<input type=\"text\" id=\"datepicker\">";
            echo "<input type=\"hidden\" id=\"alternate\" name=\"dateInput\">";
            echo "</td>";

			echo "<td>";
			echo form_submit('submit', 'Save Entry');
			echo "</td>";

			echo "</tr>";

        }
    }
    else
    {
        echo "<tr><td colspan=\"10\">No Records Returned for Filter Parameters</td></tr>";
    }



    echo "</table>";
    echo "</div>";

	echo form_submit('submit', 'Submit Timecard');

    echo "</div>";

    echo "<br><br>";




?>
