<div id="tabmenu">
    <ul>
        <?php if(($this->session->userdata('userTypeID') == 1 || $this->session->userdata('userTypeID') == 2 || $this->session->userdata('userTypeID') == 3  )) { ?>
            <!-- everybody can see create timecard -->
            <li style="margin-left: 1px" class="tab1"><a href="<?php echo base_url(); ?>index.php/transaction" title="Online Reports">Enter Timecard</a></li>
            <li class="tab2"><a href="<?php echo base_url(); ?>index.php/inventory" title="Inventory Management">Review Timecards</a></li>
        <?php } ?>
        <?php if(($this->session->userdata('userTypeID') == 1)) { ?>
            <!-- only managers can 'manage timecards; -->
            <li class="tab3"><a href="<?php echo base_url(); ?>index.php/users" title="Manage Users">Review Staff Timecards</a></li>
        <?php } ?>
        <?php if(($this->session->userdata('userTypeID') == 1)) { ?>
            <!-- other sections are for administrators only -->
            <li class="tab4"><a href="<?php echo base_url(); ?>index.php/agency" title="Manage Agencies">Add/Edit Timecards</a></li>
            <li class="tab5"><a href="<?php echo base_url(); ?>index.php/options" title="Manage Options">Review Submitted</a></li>
            <li class="tab6"><a href="<?php echo base_url(); ?>index.php/reports" title="Reports">Administer Users</a></li>
        <?php } ?>
    </ul>
</div>
 
