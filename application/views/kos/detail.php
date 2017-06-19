<!DOCTYPE html>
<html>
<head>
<?php
$this->load->view('header'); 
?>
</head>
<body>

<?php 
$this->load->view('nav');
echo '<div class="container">';
$this->load->view('kos/v_detail');
echo '</div>';
$this->load->view('footer'); 
?>
</body>
</html>