<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Json extends CI_Controller {

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
			redirect('');
    }

		public function ytd($year = NULL) {
			if ( $year === NULL ) {
				$year = date('Y');
			}
			// YEAR only is YTD
			echo $this->data_model->getData($year);
		}

    public function mtd($month = NULL, $year = NULL) {
			if ( $year === NULL OR $month === NULL ) {
				$year = date('Y');
        $month = date('m');
			}
			// YEAR and MONTH is MTD
			echo $this->data_model->getData($year,$month);
		}

    public function dtd($date = NULL, $month = NULL, $year = NULL) {
      if ( $year === NULL OR $month === NULL OR $date === NULL) {
        $year = date('Y');
        $month = date('m');
        $date = date('d');
      }
			$tgl1 = $year . "-" . $month . "-" . "01";
      $tgl = $year . "-" . $month . "-" . $date;
      echo $this->data_model->getDataHari($tgl1,$tgl);
    }

		public function rmtd($date = NULL, $month = NULL, $year = NULL) {
			if ( $year === NULL OR $month === NULL OR $date === NULL) {
				$year = date('Y');
				$month = date('m');
				$date = date('d');
			}
			$tgl1 = $year . "-" . $month . "-" . "01";
			$tgl = $year . "-" . $month . "-" . $date;
			echo $this->data_model->getDataTotalPerHari($tgl1,$tgl);
		}
}
