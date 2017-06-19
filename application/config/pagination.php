<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['per_page'] = 6;
$config['uri_segment'] = 3;

$config['full_tag_open']    = '<div class="center-align">';
$config['full_tag_close']   = '</div>';
$config['prev_tag_open']    = '<li class="waves-effect">';
$config['prev_link']        = '<i class="material-icons">chevron_left</i>';
$config['prev_tag_close']   = '</li>';
$config['num_tag_open']     = '<li class="waves-effect">';
$config['num_tag_close']    = '</li>';
$config['next_tag_open']    = '<li class="waves-effect">';
$config['next_link']        = '<i class="material-icons">chevron_right</i>';
$config['next_tag_close']   = '</li>';
$config['cur_tag_open']     = '<li class="active"><a href="#">';
$config['cur_tag_close']    = '</a></li>';