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
    $this->load->library('upload');
  }

  public function index() {
    $data['title'] = "Admin";
    $data['daftar']['tanggal'] = $this->data_model->listTanggal();
    $this->load->view('admin/main', $data);
  }

  public function remove($tanggal = NULL) {

  }

  public function upload() {
    $data['title'] = "Upload";
    $this->load->view('upload/main', $data);
  }

  public function input() {
    $data['title'] = "Input Data Regional";
    $this->load->view('reg-input/main', $data);
  }

  public function input_data(){
    $this->load->library('form_validation');
    $this->form_validation->set_rules("reg1", "Regional 1", 'required');
    $this->form_validation->set_rules("reg2", "Regional 2", 'required');
    $this->form_validation->set_rules("reg3", "Regional 3", 'required');
    $this->form_validation->set_rules("reg5", "Regional 5", 'required');
    $this->form_validation->set_rules("reg6", "Regional 6", 'required');
    $this->form_validation->set_rules("reg7", "Regional 7", 'required');

    if ($this->form_validation->run()) {

      $data = array(
        'tanggal' => $this->input->post("tanggal"),
        'reg1' => $this->input->post("reg1"),
        'reg2' => $this->input->post("reg2"),
        'reg3' => $this->input->post("reg3"),
        'reg5' => $this->input->post("reg5"),
        'reg6' => $this->input->post("reg6"),
        'reg7' => $this->input->post("reg7")
      );
      $this->data_model->inputData($data);
      $this->input();
    }
    else{
      $this->input();
    }

    
  }

  public function upload_file()
  {
    $this->data_model->deleteData();
		//config upload file csv
   	$config['upload_path']   = './assets/';
   	$config['allowed_types'] = 'csv';
   	$config['overwrite'] = TRUE;

   	$this->upload->initialize($config);
   	$this->upload->data();

    if ( ! $this->upload->do_upload('data') ){
      $this->session->set_flashdata('error', $this->upload->display_errors());
      redirect('upload');
    } else {
      $data = array('upload_data' => $this->upload->data());
      $result = $this->data_model->importData($data['upload_data']['full_path']);
  		unlink('./assets/' . $data['upload_data']['file_name']);
      if ($result['success']) {
        $this->session->set_flashdata('success', '<br>' . $result['rows'] . ' data telah ditambah');
      } else {
        $this->session->set_flashdata('error', '<br>File yang diupload tidak sesuai!');
      }
      redirect('upload');
    }
  }
}
