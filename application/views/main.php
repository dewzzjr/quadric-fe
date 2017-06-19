<!DOCTYPE html>
<html>
<head>
<?php
$data['title'] = "Dashboard";
$this->load->view('header', $data);
?>
</head>
<body class="skin-red sidebar-mini sidebar-collapse">
  <div class="wrapper">
<?php
$this->load->view('main/header');
$this->load->view('main/sidebar');
$this->load->view('main/content');
?>
  </div>
<?php
$this->load->view('footer');
?>

</body>
</html>
