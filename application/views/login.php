<!DOCTYPE html>
<html>
<head>
<?php
$data['title'] = "Login";
$this->load->view('header', $data);
?>
<link rel="stylesheet" href="<?php echo base_url('assets/lte/plugins/iCheck/square/red.css'); ?>">
</head>
<!-- class="hold-transition skin-red sidebar-mini" -->
<body class="hold-transition bg-black" >
<div class="login-box">
  <div class="login-logo">
    <a href="<?php echo site_url(); ?>">Dashboard <b>Fulfillment Experience</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <?php echo form_open(site_url('login/proses' )); ?>
    <?php if (validation_errors() || $this->session->flashdata('error')) { ?>
    <div class="alert alert-error">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Warning!</strong>

        <?php echo $this->session->flashdata('error'); ?>
    </div>
    <?php } ?>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Username" name="username">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <!-- <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div> -->
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    <?php echo form_close(); ?>

    <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="<?php echo site_url('login/prosesGuest'); ?>" class="btn btn-block btn-social btn-google btn-flat"> Sign in using
        Guest</a>
    </div>
    <!-- /.social-auth-links -->
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
<?php
$this->load->view('footer');
?>
<script src="<?php echo base_url('assets/lte/plugins/iCheck/icheck.min.js'); ?>"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
