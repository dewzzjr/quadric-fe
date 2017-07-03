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
      Admin Dashboard
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
      <li class="active">Delete Data</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">

    <div class="row">
      <!-- harian -->
      <div class="col-md-12">
        <div id = "alert_placeholder"></div>
        <form action="admin/upload_file" method="post" enctype="multipart/form-data" id="upload_form">
          <div class="btn-group">
            <input class="btn btn-default btn-flat" id="submit" name="submit" type="submit" value="Upload" disabled/>
            <div class="input-group">
                <label class="input-group-btn">
                    <span class="btn btn-default btn-flat">
                        Browse&hellip; <input type="file" id="fileupload" style="display: none;" multiple>
                    </span>
                </label>
                <input type="text" class="form-control" readonly>
            </div>
          </div>
        </form>
      </div>
    </div>
      <div class="row">
        <!-- harian -->
        <div class="col-md-12">
        <!-- FE HARIAN < 3-->
        <?php
        $fe['title'] = 'Data Harian';
        echo $this->parser->parse('delete/table', $fe, true); ?>
      </div>
      <!-- /.col (left) -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
</div>
<?php $this->load->view('footer'); ?>
<script>
$("#fileupload").change(function () {
    var fileExtension = ['csv', 'txt'];


    if ($('#fileupload').get(0).files.length === 0) {
      $('#submit').prop('disabled', true);
    } else {
      if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
        message = 'Gunakan file extension .CSV atau .TXT !'
        div = `<div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <i class="icon fa fa-warning"></i>`+message+`
              </div>`
        $('#alert_placeholder').html(div)
      } else {
        console.log($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension))
        $('#submit').prop('disabled', false);
      }
    }
});




$(function() {
  // We can attach the `fileselect` event to all file inputs on the page
  $(document).on('change', ':file', function() {
    var input = $(this),
        numFiles = input.get(0).files ? input.get(0).files.length : 1,
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [numFiles, label]);
  });
  // We can watch for our custom `fileselect` event like this
  $(document).ready( function() {
      $(':file').on('fileselect', function(event, numFiles, label) {

          var input = $(this).parents('.input-group').find(':text'),
              log = numFiles > 1 ? numFiles + ' files selected' : label;

          if( input.length ) {
              input.val(log);
          } else {
              if( log ) alert(log);
          }

      });
  });
});
</script>
</body>
</html>
