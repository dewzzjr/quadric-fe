<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct(){
        parent::__construct();
        $tipe = $this->session->userdata('tipe');

        if ( !$this->session->has_userdata('username') ) {
            redirect('login');
        }

    }

    public function index() {
			$this->load->view('main');
    }

}
