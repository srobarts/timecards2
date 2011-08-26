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
        </tr>

<?php

    echo "<tr>";

    if(isset($records))
    {
    	//this should only return one row
        foreach($records as $row)
        {
			//first just save the variables so they can be reused
			$employeeNum = $row->employeeNum;
			$name = $row->lastName . ", " . $row->firstName;
			$totalHours = $row->totalHours;
			$accountNum = $row->accountNum;
			$entryDate = $row->entryDate;
			$index = 1;

			//then iterate to create 6 rows
			for($i=0; $i<7; $i++) {
				
				echo "<tr>";
				//employee number column
				echo "<td class=\"firstleftcell\">";
            	echo $employeeNum;
            	echo "</td>";
            	
            	//employee name column
            	echo "<td>";
            	echo $name;
            	echo "</td>";
            	
            	//pay types column
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
	            
	            //total hours column
				//set to a default value from database for first instance, 0 thereafter
            	echo "<td>";
            	echo form_input('totalHours', set_value('totalHours', $totalHours));
            	echo "</td>";
            	
            	//account num column
            	echo "<td>" . $accountNum . "</td>";
            	
            	//date column
            	$formattedDate = date("m/d/y", strtotime($entryDate));
	            echo "<td>";
	            echo "<input type=\"text\" id=\"datepicker" . $index . "\">";
	            echo "<input type=\"hidden\" id=\"alternate\" name=\"dateInput\">";
	            echo "</td>";
				
				echo "</tr>";

				$index++;
        	
			}

			echo "<tr><td>";
			echo form_submit('submit', 'Save Entry');
			echo "</td></tr>";
        }
    }
    else
    {
        echo "<tr><td colspan=\"10\">No Records Returned for Filter Parameters</td></tr>";
    }



    echo "</table>";
    echo "</div>";

    echo "</div>";

    echo "<br><br>";




?>
