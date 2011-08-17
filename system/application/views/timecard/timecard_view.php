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
        foreach($records as $row)
        {
            echo "<tr>";

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

            echo "<td>" . $row->totalHours . "</td>";

            echo "<td>" . $row->accountNum . "</td>";

            $formattedDate = date("m/d/y", strtotime($row->entryDate));
            echo "<td>" . $formattedDate . "</td>";

            echo "</tr>";
        }
    }
    else
    {
        echo "<tr><td colspan=\"10\">No Records Returned for Filter Parameters</td></tr>";
    }

    echo "</table>";
    echo "</div>";

    echo "<div id=\"pagination_container\">";
    echo "<ul id=\"pagination-digg\">";
    //echo $pag_links;
	echo "</ul>";
    echo "</div>";

    echo "<br><br>";




?>
