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
      Delete Data
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
      <li class="active">Delete Data</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-sm-6">
      <?php if ($this->session->flashdata('success')) : ?>
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-check"></i> Success!</h4>
          <?php echo $this->session->flashdata('success'); ?>
        </div>
      <?php elseif ($this->session->flashdata('error')) : ?>
        <div class="alert alert-danger alert-dismissible">
          <button type="butto n" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-ban"></i> Error!</h4>
          <?php echo $this->session->flashdata('error'); ?>
        </div>
      <?php endif; ?>
      <?php if ($this->session->flashdata('confirm')) : ?>
      <?php endif; ?>
      </div>
      <div class="col-md-12">
        <!-- daftar tanggal-->
        <?php echo $this->parser->parse('delete/table', $daftar, true); ?>
      </div>
      <!-- /.col (left) -->
    </div>
    <!-- /.row -->


    <div class="modal modal-danger fade" id="delete">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Danger Modal</h4>
          </div>
          <div class="modal-body">
            <p>One fine body&hellip;</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">No</button>
            <button type="button" class="btn btn-outline" id="yes-button" href="">Yes</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
  </section>
  <!-- /.content -->
</div>
</div>
<?php $this->load->view('footer'); ?>
</body>
<script>
$('#delete').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var tanggal = button.data('tanggal')
  var jumlah = button.data('count') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  if (tanggal === '') {
    tanggal = 'semua data'
    var body = 'semua data'
    var link = 'all'
  } else {
    var body = jumlah + ' data pada tanggal ' + tanggal
    var link = tanggal
  }
  modal.find('.modal-title').text('Delete ' + tanggal)
  modal.find('.modal-body p').text('Apakah Anda yakin untuk menghapus ' + body + ' ?')
  modal.find('#yes-button').attr("onclick", "location.href='admin/remove/" + link + "';")
})
</script>
</html>
