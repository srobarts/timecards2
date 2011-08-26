<?php
/**
 * Created by JetBrains PhpStorm.
 * User: srobarts
 * Date: 12/14/10
 * Time: 2:17 PM
 * To change this template use File | Settings | File Templates.
 */
 
class timecard_model extends Model {

    function timecard_model()
    {
        // Call the Model constructor
        parent::Model();
        $this->load->database();
    }

    function getTimecardForUser($userID)
    {
        $sql = 'SELECT t.userID, t.approvalStatusID, t.processedStatusID, t.entryDate, t.periodEnding, t.totalHours,
            u.firstName, u.lastName, u.username, u.employeeNum, u.accountNum, up.userPayTypeDesc
            FROM timecards t
            LEFT JOIN users u ON t.userID = u.userID
            LEFT JOIN userPayType up ON u.userPayTypeID = up.userPayTypeID
            WHERE t.userID = ' . $userID;
        $query = $this->db->query($sql);
        return $query->result();
    }

}
