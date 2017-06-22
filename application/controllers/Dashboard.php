<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct(){
			parent::__construct();
			//setlocale(LC_ALL, 'id_ID') or die('Locale not installed');
			$tipe = $this->session->userdata('tipe');
      if ( !$this->session->has_userdata('username') ) {
          redirect('login');
      }
    }

    public function index() {
			$this->fe();
    }

		public function ps($date = NULL, $month = NULL, $year = NULL) {
			if ( $this->input->server('REQUEST_METHOD') == 'POST' ) {
				$tgl = $this->input->post('date');
				//echo '<pre>';var_dump($tgl);die();
				redirect('dashboard/ps/' . $tgl);
			}
			if ( $date === NULL ) {
				$date = date('d');
				$month = date('m');
				$year = date('Y');
				//echo '<pre>';var_dump($date);die();
			} elseif ( $year === NULL ) {
				redirect('dashboard/ps/');
			}
			$data['title'] = "Dashboard";
			$data['tanggal'] = date_create($year . "-" . $month . "-" . $date);

			//echo '<pre>';var_dump($data);die();
			$this->load->view('ps-report/main', $data);
		}

		public function fe($date = NULL, $month = NULL, $year = NULL) {
			if ( $this->input->server('REQUEST_METHOD') == 'POST' ) {
				$tgl = $this->input->post('date');
				//echo '<pre>';var_dump($tgl);die();
				redirect('dashboard/fe/' . $tgl);
			}
			if ( $date === NULL ) {
				$date = date('d');
				$month = date('m');
				$year = date('Y');
				//echo '<pre>';var_dump($date);die();
			} elseif ( $year === NULL ) {
				redirect('dashboard/ps/');
			}
			$data['title'] = "Dashboard2";
			$this->load->view('fe-report/main', $data);
		}

}
