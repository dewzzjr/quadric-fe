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
    //$this->load->model('data_model');
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
    if (/*$this->input->method() AND*/ isset($_FILES["data"]["tmp_name"])) {
      $path = $_FILES["data"]["tmp_name"];
    } else {
      redirect('upload');
    }
    $file = fopen($path,"r");
    $count = 0;
    while ( ($array = fgetcsv($file)) !== false ) {
      $a[] = $array;
      $count++;
    }
    print_r($count);
    fclose($file);
  }
}
