<!DOCTYPE html>
<html>
<head>
<?php $this->load->view('header', $title); ?>
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
      UPLOAD DATA BARU
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i>Admin</a></li>
      <li class="active">Upload Data</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <?php //$this->load->view('upload/upload'); ?>
    <form action="admin/upload_file" method="post" enctype="multipart/form-data" id="upload_form">
        <input id="fileupload" name="data" type="file" />
        <input name="submit" type="submit" value="Upload"/>
    </form>
    <?php if ($this->session->flashdata('success')) { ?>
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="icon fa fa-check"></i> Success!</h4>
      <?php echo $this->session->flashdata('success'); ?>
    </div>
    <?php } elseif ($this->session->flashdata('error')) { ?>
      <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-ban"></i> Error!</h4>
        <?php echo $this->session->flashdata('error'); ?>
      </div>
    <?php }?>
  </section>
  <!-- /.content -->
</div>
</div>
<?php
$this->load->view('footer');
?>
<script>
$("#fileupload").change(function () {
    var fileExtension = ['csv', 'txt'];
    if ($.inArray($(this).val().lastIndexOf('.').pop().toLowerCase(), fileExtension) == -1) {
        alert("Only formats are allowed : "+fileExtension.join(', '));
    }
});
</script>

</body>
</html>
