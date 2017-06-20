<?php
	class Model_FE extends CI_Model{

		public function __construct() 
	    {
	        parent::__construct(); 
	        $this->load->database();
	    }

		function YTD($tahun){
			$cond = array('YEAR(SC_TGLPS)' => $tahun);

			$YTD = $this->db->select('WITEL, AVG(SLG="COMPLY") AVG_YTD')
								->from('reg_data')
								->where($cond)
								->group_by('WITEL')
								->get();

			$YTD_YKT = $this->db->select('AVG(SLG="COMPLY") AVG_YTD_YKT')
								->from('reg_data')
								->where($cond)
								->like('WITEL','YOGYAKARTA')
								->get();

			$YTD_total = $this->db->select('AVG(SLG="COMPLY") AVG_YTD_total')
								->from('reg_data')
								->where($cond)
								->get();
			echo '<pre>';var_dump($YTD_YKT->result());

		}

		function MTD($bulan, $tahun){
			$cond = array('YEAR(SC_TGLPS)' => $tahun, 'MONTH(SC_TGLPS)' => $bulan);

			$MTD = $this->db->select('WITEL, AVG(SLG="COMPLY") AVG_MTD')
								->from('reg_data')
								->where($cond)
								->group_by('WITEL')
								->get();

			$MTD_YKT = $this->db->select('AVG(SLG="COMPLY") AVG_MTD_YKT')
								->from('reg_data')
								->where($cond)
								->like('WITEL','YOGYAKARTA')
								->get();

			$MTD_total = $this->db->select('AVG(SLG="COMPLY") AVG_MTD_total')
								->from('reg_data')
								->where($cond)
								->get();
			echo '<pre>';var_dump($MTD->result());
		}

		function DTD($tanggal){
			$cond = array('SC_TGLPS' => $tanggal);

			$DTD = $this->db->select('WITEL, AVG(SLG="COMPLY") AVG_DTD')
								->from('reg_data')
								->where($cond)
								->group_by('WITEL')
								->get();

			$DTD_YKT = $this->db->select('AVG(SLG="COMPLY") AVG_DTD_YKT')
								->from('reg_data')
								->where($cond)
								->like('WITEL','YOGYAKARTA')
								->get();

			$DTD_total = $this->db->select('AVG(SLG="COMPLY") AVG_DTD_total')
								->from('reg_data')
								->where($cond)
								->get();
			echo '<pre>';var_dump($DTD->result());
		}

		function REPORT_PS_DTD($tanggal){
			$cond = array('SC_TGLPS' => $tanggal);

			$PS_3 = $this->db->select('WITEL, SUM(SLG="COMPLY") CNT_COMPLY, SUM(SLG="NOT COMPLY") CNT_NOTCOMPLY, COUNT(SLG)')
								->from('reg_data')
								->where($cond)
								->group_by('WITEL')
								->get();

			$PS_3_YKT = $this->db->select('WITEL, SUM(SLG="COMPLY") CNT_COMPLY, SUM(SLG="NOT COMPLY") CNT_NOTCOMPLY, COUNT(SLG)')
								->from('reg_data')
								->where($cond)
								->like('WITEL','YOGYAKARTA')
								->get();

			$PS_3_total = $this->db->select('SUM(SLG="COMPLY") CNT_COMPLY, SUM(SLG="NOT COMPLY") CNT_NOTCOMPLY, COUNT(SLG)')
								->from('reg_data')
								->where($cond)
								->get();

			$PS_2 = $this->db->select('WITEL, SUM(DURASI <= 2) CNT_COMPLY, SUM(DURASI >= 3) CNT_NOTCOMPLY, COUNT(DURASI)')
								->from('reg_data')
								->where($cond)
								->group_by('WITEL')
								->get();

			$PS_2_YKT = $this->db->select('SUM(DURASI <= 2) CNT_COMPLY, SUM(DURASI >= 3) CNT_NOTCOMPLY, COUNT(DURASI)')
								->from('reg_data')
								->where($cond)
								->get();

			$PS_2_total = $this->db->select('SUM(DURASI <= 2) CNT_COMPLY, SUM(DURASI >= 3) CNT_NOTCOMPLY, COUNT(DURASI)')
								->from('reg_data')
								->where($cond)
								->get();
			echo '<pre>';var_dump($PS_2->result());
		}

		function REPORT_PS_MTD($bulan, $tahun){
			$cond = array('YEAR(SC_TGLPS)' => $tahun, 'MONTH(SC_TGLPS)' => $bulan);

			$PS_3 = $this->db->select('WITEL, SUM(SLG="COMPLY") CNT_COMPLY, SUM(SLG="NOT COMPLY") CNT_NOTCOMPLY, COUNT(SLG)')
								->from('reg_data')
								->where($cond)
								->group_by('WITEL')
								->get();

			$PS_3_YKT = $this->db->select('WITEL, SUM(SLG="COMPLY") CNT_COMPLY, SUM(SLG="NOT COMPLY") CNT_NOTCOMPLY, COUNT(SLG)')
								->from('reg_data')
								->like('WITEL','YOGYAKARTA')
								->where($cond)
								->get();

			$PS_3_total = $this->db->select('SUM(SLG="COMPLY") CNT_COMPLY, SUM(SLG="NOT COMPLY") CNT_NOTCOMPLY, COUNT(SLG)')
								->from('reg_data')
								->where($cond)
								->get();

			$PS_2 = $this->db->select('WITEL, SUM(DURASI <= 2) CNT_COMPLY, SUM(DURASI >= 3) CNT_NOTCOMPLY, COUNT(DURASI)')
								->from('reg_data')
								->where($cond)
								->group_by('WITEL')
								->get();

			$PS_2_YKT = $this->db->select('SUM(DURASI <= 2) CNT_COMPLY, SUM(DURASI >= 3) CNT_NOTCOMPLY, COUNT(DURASI)')
								->from('reg_data')
								->where($cond)
								->like('WITEL','YOGYAKARTA')
								->get();

			$PS_2_total = $this->db->select('SUM(DURASI <= 2) CNT_COMPLY, SUM(DURASI >= 3) CNT_NOTCOMPLY, COUNT(DURASI)')
								->from('reg_data')
								->where($cond)
								->get();
		
			echo '<pre>';var_dump($PS_2_YKT->result());
		}

	}