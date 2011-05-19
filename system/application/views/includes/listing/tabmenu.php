<div id="tabmenu">
    <ul>
        <li style="margin-left: 1px" class="tab1"><a href="<?php echo base_url(); ?>index.php/transaction" title="Online Reports">Transactions</a></li>
        <?php if(($this->session->userdata('userTypeID') == 3 || $this->session->userdata('userTypeID') == 1  )) { ?>
            <li class="tab2"><a href="<?php echo base_url(); ?>index.php/inventory" title="Inventory Management">Inventory Mgmt</a></li>
        <?php } ?>
        <?php if(($this->session->userdata('userTypeID') == 1)) { ?>
            <li class="tab3"><a href="<?php echo base_url(); ?>index.php/users" title="Manage Users">Manage Users</a></li>
            <li class="tab4"><a href="<?php echo base_url(); ?>index.php/agency" title="Manage Agencies">Manage Agencies</a></li>
            <li class="tab5"><a href="<?php echo base_url(); ?>index.php/options" title="Manage Options">Manage Options</a></li>
            <li class="tab6"><a href="<?php echo base_url(); ?>index.php/reports" title="Reports">Reports</a></li>
        <?php } ?>
    </ul>
</div>
 
