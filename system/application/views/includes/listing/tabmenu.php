<div id="tabmenu">
    <ul>
        <li style="margin-left: 1px" class="tab1"><a href="<?php echo base_url(); ?>index.php/transaction" title="Online Reports">Transactions</a></li>
        <?php if(($this->session->userdata('userTypeID') == 1 || $this->session->userdata('userTypeID') == 2 || $this->session->userdata('userTypeID') == 3  )) { ?>
            <!-- everybody can see create timecard -->
            <li class="tab2"><a href="<?php echo base_url(); ?>index.php/inventory" title="Inventory Management">Create/Edit Timecard</a></li>
        <?php } ?>
        <?php if(($this->session->userdata('userTypeID') == 2)) { ?>
            <!-- only managers can 'manage timecards; -->
            <li class="tab3"><a href="<?php echo base_url(); ?>index.php/users" title="Manage Users">Manage Timecards</a></li>
        <?php } ?>
        <?php if(($this->session->userdata('userTypeID') == 3)) { ?>
            <!-- other sections are for administrators only -->
            <li class="tab4"><a href="<?php echo base_url(); ?>index.php/agency" title="Manage Agencies">Manage Users</a></li>
            <li class="tab5"><a href="<?php echo base_url(); ?>index.php/options" title="Manage Options">Manage Options</a></li>
            <li class="tab6"><a href="<?php echo base_url(); ?>index.php/reports" title="Reports">Administer System</a></li>
        <?php } ?>
    </ul>
</div>
 
