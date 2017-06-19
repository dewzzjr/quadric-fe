<?php
$modal = [
[
    'class' => "modal-trigger",
    'id'    => "login"
], 
[
    'class' => "modal-trigger",
    'id'    => "signup"
]
];
$list = [
    [
        anchor('kos/cari', '<i class="material-icons right">search</i>CARI'),
        anchor('akun#login', '<i class="material-icons right">play_for_work</i>MASUK'),
        anchor('akun#signup', '<i class="material-icons right">new_releases</i>DAFTAR')    
    ], 
    [
        anchor('kos/cari', '<i class="material-icons right">search</i> CARI'),
        anchor('akun', '<i class="material-icons right">person_pin</i><b>' . strtoupper($this->session->nama)) . '</b>',
        anchor('akun/keluar', '<i class="material-icons right">power_settings_new</i> KELUAR')    
    ]
];

$attributes = [
    'class' => 'right hide-on-med-and-down',
    'id'    => 'nav-mobile'
];
$attributesa = [
    'class' => 'side-nav',
    'id'    => 'mobile'
];
$ul = ($this->session->has_userdata('username') ) ? $list[1] : $list[0];
$ul_side = ($this->session->has_userdata('username') ) ? $list[1] : $list[0];
?>
<nav class="indigo darken-4">
<div class="container">
    <div class="nav-wrapper">
            <image width="37px" style="margin: 10px" src="<?php echo base_url('assets/images/favicon.gif')?>" />
        <a href="<?php echo base_url(); ?>" class="brand-logo" >
            Finding<strong>Kost</strong>
        </a>
        <a href="#" data-activates="mobile" class="button-collapse">
            <i class="material-icons">menu</i>
        </a>
        <?php echo ul($ul, $attributes); ?>
        <?php echo ul($ul, $attributesa); ?>
    </div>
</div>
</nav>