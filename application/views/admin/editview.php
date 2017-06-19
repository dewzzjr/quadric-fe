<!DOCTYPE html>
<html>
<head>
<title>FindingKost</title>
<?php
$this->load->view('header'); 
?>
</head>
<body>

<div class="row vertical-center valign-wrapper">
    <div class="valign hoverable card-panel col s12 m8 offset-m2 l6 offset-l3">
            <div class="row" style="margin-top: 15px">
                <span class="card-title">
                <a class="indigo-text darken-4" target="_self">
                    <!--<strong>Pencarian</strong>-->
                <div class="push-m1 col s12 m4 center-on-small-only">
                    <?php echo img('assets/images/favicon.gif', FALSE, ['height' => '80']);?>
                </div>
                <div class="right-aligned col s12 m2 center-on-small-only">
                    <h3 class="indigo-text darken-4">Finding<strong>Kost</strong></h3>
                    <h6 class="indigo-text darken-4"><strong>Administrator</strong> Mode</h6>
                </div>
                </a>
                </span>
            </div>
        <div class="row">
        
        <?php foreach ($akun as $ak) {
        ?>     
        <form method="post" action="<?php  echo base_url('admin/updateUser/') ?>">
            <div class="col s12">
                <div class="row">
                    <div class="input-field col s6">
                      <input id="id" name="id" type="hidden" class="validate" value="<?php echo $ak->id; ?>">
                      <input id="name" name="name" type="text" class="validate" value="<?php echo $ak->nama; ?>">
                      <label for="first_name">Nama</label>
                    </div>
                    <div class="input-field col s6">
                      <input id="username" name="username" type="text" class="validate" value="<?php echo $ak->username; ?>" >
                      <label for="first_name">Username</label>
                    </div>
                    <div align="center">
                    <button type="submit" id="submit" name="submit" class="waves-effect waves-light btn" >Submit</button>
                    <a class="waves-effect waves-light btn" href="<?php echo base_url('admin/detail'); ?>">Back</a>
                    </div>
                </div>
            </div>
        </form>  
        <?php } ?>      
        </div>    
    </div>
</div>
<?php 
$this->load->view('footer'); 
?>
<script>
    var Materialize;
    $(document).ready(function(){
        $('ul.tabs').tabs('select_tab', 'tab_id');
        if(location.search !== ""){
            Materialize.toast('Username atau Password Anda Salah!', 5000);
        }
    });
</script>
</body>
</html>