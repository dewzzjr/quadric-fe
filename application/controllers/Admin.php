<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    function __construct()
    {
        parent::__construct();

        if ( !$this->session->has_userdata('username') ) {
            redirect('login');
        }
        if ( $this->session->usertype !== 'admin' ) {
            redirect('login');
        }
        $this->load->model('data_model');
    }

    public function delete() {

    }

    public function upload() {

    }
}
