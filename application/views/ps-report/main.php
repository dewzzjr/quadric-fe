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
      REPORT QUADRIC's FULFILLMENT EXPERIENCES
      <small class="full-date"><?php echo date_format($tanggal,"j F Y"); ?></small>
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
        $date['open'] = form_open('dashboard/ps');
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
        <?php
        $fe['title'] = '%PS < 3 hari Tgl 13 Juni 2017';
        echo $this->parser->parse('ps-report/table', $fe, true); ?>
      </div>
      <!-- /.col (left) -->
      <div class="col-md-6">
        <!-- MTD-->
        <?php
        $fe['title'] = '%PS < 3 Hari MTD 1-13 Juni 2017';
        echo $this->parser->parse('ps-report/table', $fe, true); ?>
      </div>
      <!-- /.col (right) -->
    </div>
    <!-- /.row -->
    <div class="row">
      <!-- harian -->
      <div class="col-md-6">
        <!-- FE HARIAN -->
        <?php
        $fe['title'] = '%PS < 2 hari Tgl 13 Juni 2017';
        echo $this->parser->parse('ps-report/table', $fe, true); ?>
      </div>
      <!-- /.col (left) -->
      <div class="col-md-6">
        <!-- MTD-->
        <?php
        $fe['title'] = '%PS < 2 Hari MTD 1-13 Juni 2017';
        echo $this->parser->parse('ps-report/table', $fe, true); ?>
      </div>
      <!-- /.col (right) -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
</div>
<?php
$this->load->view('footer');
?>

</body>
</html>
