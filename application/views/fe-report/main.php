<!DOCTYPE html>
<html>
<head>
<?php
$this->load->view('header', $title);
?>
</head>
<body class="skin-red sidebar-mini">
  <div class="wrapper">
<?php
$this->load->view('main/header');
$this->load->view('main/sidebar');
?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      REPORT FULFILLMENT EXPERIENCES
      <br />R4 Data PS
      <small class="full-date">13 Juni 2017</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> View Report</a></li>
      <li class="active">Fulfillment Experiencesx</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <?php
        $date['open'] = form_open('dashboard/fe');
        $date['close'] = form_close();
        echo $this->parser->parse('main/date', $date, true); ?>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
    <div class="row">
      <!-- harian -->
      <div class="col-md-6">
        <!-- FE HARIAN -->
        <?php $this->load->view('fe-report/harian'); ?>
        <!-- FE MTD -->
        <?php $this->load->view('fe-report/fe-mtd'); ?>
        <!-- FE YTD -->
        <?php $this->load->view('fe-report/fe-ytd'); ?>
      </div>
      <!-- /.col (left) -->
      <div class="col-md-3">
        <!-- MTD-->
        <?php $this->load->view('fe-report/mtd'); ?>
      </div>
      <!-- /.col (right-mtd) -->
      <div class="col-md-3">
        <!-- YTD-->
        <?php $this->load->view('fe-report/ytd'); ?>
      </div>
      <!-- /.col (right-ytd) -->
    </div>
  </section>
  <!-- /.content -->
</div>
</div>
<?php
$this->load->view('footer');
?>

</body>
</html>
