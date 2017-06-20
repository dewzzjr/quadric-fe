<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
  <div class="sidebar">
    <!-- user panel (Optional) -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo base_url('assets/lte/dist/img/avatar5.png'); ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $this->session->display; ?></p>

        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div><!-- /.user-panel -->

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">
      <li class="header">Main Menu</li>
      <!-- Optionally, you can add icons to the links -->
      <li class="treeview active">
        <a href="#" ><i class="fa fa-book"></i> <span>View Report</span> <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
          <li><a href="<?php echo site_url('dashboard/ps'); ?>"><i class="fa fa-circle-o"></i> Put in Service</a></li>
          <li><a href="<?php echo site_url('dashboard/fe'); ?>"><i class="fa fa-circle-o"></i> Fullfillment Experiences</a></li>
        </ul>
      </li>
      <?php if ( $this->session->usertype === 'admin' ) { ?>
      <li><a href="<?php echo site_url('upload'); ?>"><i class="fa fa-upload"></i> <span>Upload Data</span></a></li>
      <li><a href="<?php echo site_url('delete'); ?>"><i class="fa fa-trash"></i> <span>Delete Data</span></a></li>
      <?php } ?>

    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>
