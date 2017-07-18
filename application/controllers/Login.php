<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->helper('security');
    $this->load->model('user_model');
  }

  public function index() {
    $this->load->view('login');
  }

  public function proses() {

    $this->form_validation->set_rules('username', 'username', 'required|trim|xss_clean');
    $this->form_validation->set_rules('password', 'password', 'required|trim|xss_clean');
    if ($this->form_validation->run() == FALSE) {
      $this->session->set_flashdata('error', validation_errors());
      redirect('login');
    } else {
      $usr = $this->input->post('username');
      $psw = $this->input->post('password');
      $cek = $this->user_model->cek_user($usr, $psw);
      if ($cek['status']) {
        //login berhasil, buat session
        $data = [
          'id'       => $cek['data']['id'],
          'username' => $cek['data']['username'],
          'usertype' => $cek['data']['usertype'],
          'display'  => $cek['data']['display_name']
        ];
        $this->session->set_userdata($data);
        redirect('');
      } else {
        $this->session->set_flashdata('error', '<br>Username atau Password yang anda masukkan salah.');
        redirect('login');
      }
    }
  }

  public function prosesGuest() {
    $data = [
      'id'       => '0',
      'username' => '0',
      'usertype' => 'guest',
      'display'  => 'Guest'
    ];
    $this->session->set_userdata($data);
    redirect('');
  }

  public function logout() {
    $this->session->sess_destroy();
    redirect('login');
  }
}
