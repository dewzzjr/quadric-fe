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
    $this->load->view('admin/main', $data);

  }

  public function delete() {
    $data['title'] = "Delete";
    $this->load->view('delete/main', $data);
  }

  public function upload() {
    $data['title'] = "Upload";
    $this->load->view('upload/main', $data);
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
