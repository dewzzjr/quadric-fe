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
			$this->load->model('data_model');
    }

    public function index() {
			$this->fe();
    }

		public function ps($date = NULL, $month = NULL, $year = NULL) {
			/**
			 * Check if there is parameter else go to today date
			 */
			if ( $this->input->server('REQUEST_METHOD') == 'POST' ) {
				$tgl = $this->input->post('date');
				//echo '<pre>';var_dump($tgl);die();
				redirect('dashboard/ps/' . $tgl);
			}
			if ( $date === NULL ) {
				$date = date('d');
				$month = date('m');
				$year = date('Y');
				$tgl = date('Y-m-d');
				//echo '<pre>';var_dump($date);die();
			} elseif ( $year === NULL ) {
				redirect('dashboard/ps/');
			} else {
				$tgl = $year . "-" . $month . "-" . $date;
			}
			/**
			 * Set input for view
			 */
			$data['title'] = "Dashboard PS";
			$data['tanggal'] = date_create($year . "-" . $month . "-" . $date);
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
				$tgl = date('Y-m-d');
				//echo '<pre>';var_dump($tgl);die();
			} elseif ( $year === NULL ) {
				redirect('dashboard/fe/');
			} else {
				$tgl = $year . "-" . $month . "-" . $date;
			}
			$data['title'] = "Dashboard FE";
			$data['tanggal'] = date_create($year . "-" . $month . "-" . $date);
			$this->load->view('fe-report/main', $data);
		}

}
