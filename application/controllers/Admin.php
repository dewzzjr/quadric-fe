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
    $this->load->library('form_validation');
  }

  public function index() {
    $data['title'] = "Admin";
    $data['daftar']['tanggal'] = $this->data_model->listTanggal();
    $this->load->view('admin/main', $data);
  }

  public function remove($tanggal = NULL) {
    if ($tanggal == 'all') {
      $res = $this->data_model->deleteData();
    } else {
      $res = $this->data_model->deleteData($tanggal);
    }
    if (!$res['success']) {
      $text = "Gagal menghapus data";$this->session->set_flashdata('error', $text);
    } else {
      $text = "Berhasil menghapus " . $res['rows'] . " data!";
      $this->session->set_flashdata('success', $text);
    }

    redirect('admin');
  }

  public function upload() {
    $data['title'] = "Upload";
    $this->load->view('upload/main', $data);
  }

  public function input() {
    $data['title'] = "Input Data Regional";
    if ($this->input->server('REQUEST_METHOD') == 'GET') {
      $this->load->view('reg-input/main', $data);
    } else {
      //var_dump($_POST);
      $this->form_validation->set_rules("tanggal", "Tanggal", 'required');
      $this->form_validation->set_rules("reg1", "MTD Regional 1", 'required');
      $this->form_validation->set_rules("reg2", "MTD Regional 2", 'required');
      $this->form_validation->set_rules("reg3", "MTD Regional 3", 'required');
      $this->form_validation->set_rules("reg5", "MTD Regional 5", 'required');
      $this->form_validation->set_rules("reg6", "MTD Regional 6", 'required');
      $this->form_validation->set_rules("reg7", "MTD Regional 7", 'required');
      $this->form_validation->set_rules("total", "Total MTD", 'required');
      $this->form_validation->set_rules("yreg1", "YTD Regional 1", 'required');
      $this->form_validation->set_rules("yreg2", "YTD Regional 2", 'required');
      $this->form_validation->set_rules("yreg3", "YTD Regional 3", 'required');
      $this->form_validation->set_rules("yreg5", "YTD Regional 5", 'required');
      $this->form_validation->set_rules("yreg6", "YTD Regional 6", 'required');
      $this->form_validation->set_rules("yreg7", "YTD Regional 7", 'required');
      $this->form_validation->set_rules("ytotal", "Total YTD", 'required');
      $this->form_validation->set_message('required', '{field} tidak boleh kosong.');
      if ($this->form_validation->run()) {
        $this->input_data();
      }
      else{
        $this->load->view('reg-input/main', $data);
      }
    }
  }

  public function input_data(){
    $data = array(
      'tanggal' => $this->input->post("tanggal"),
      'reg1' => $this->input->post("reg1"),
      'reg2' => $this->input->post("reg2"),
      'reg3' => $this->input->post("reg3"),
      'reg5' => $this->input->post("reg5"),
      'reg6' => $this->input->post("reg6"),
      'reg7' => $this->input->post("reg7"),
      'yreg1' => $this->input->post("yreg1"),
      'yreg2' => $this->input->post("yreg2"),
      'yreg3' => $this->input->post("yreg3"),
      'yreg5' => $this->input->post("yreg5"),
      'yreg6' => $this->input->post("yreg6"),
      'yreg7' => $this->input->post("yreg7"),
      'total' => $this->input->post("total"),
      'ytotal' => $this->input->post("ytotal")
    );
    $this->data_model->inputRegData($data);
    $tanggal = date_create($data['tanggal']);
    $d = $tanggal->format('d');
    $m = $tanggal->format('m');
    $y = $tanggal->format('Y');
    redirect('dashboard/fe/'.$d.'/'.$m.'/'.$y);
  }

  public function upload_file()
  {
    // $this->data_model->deleteData();
		//config upload file csv
   	$config['upload_path']   = './assets/';
   	$config['allowed_types'] = 'csv';
   	$config['overwrite'] = TRUE;

   	$this->upload->initialize($config);
   // 	$this->upload->data();

    if ( ! $this->upload->do_upload('data') ){
      $this->session->set_flashdata('error', $this->upload->display_errors());
    } else {
      $data = array('upload_data' => $this->upload->data());
      $submit = $this->input->post('submit');
      if($submit == 'tabs') {
        $result = $this->data_model->importData($data['upload_data']['full_path'],'\t');
      } else {
        $result = $this->data_model->importData($data['upload_data']['full_path'],',');
      }
      unlink('./assets/' . $data['upload_data']['file_name']);
      if ($result['success']) {
        $this->session->set_flashdata('success', '<br>' . $result['rows'] . ' data telah ditambah');
      } else {
        $this->session->set_flashdata('error', '<br>File yang diupload tidak sesuai!');
      }
      redirect('upload');
    }
    redirect('upload');
  }
}
