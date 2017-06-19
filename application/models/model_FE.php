<?php
	class Model_FE extends CI_Model{

		public function __construct() 
	    {
	        parent::__construct(); 
	        $this->load->database();
	    }

		function YTD($tahun){
			$YTD = $this->db->select('WITEL, AVG(SLG="COMPLY") AVG_YTD')
								->from('reg_data')
								->where('YEAR(SC_TGLPS)', $tahun)
								->group_by('WITEL')
								->get();

			$YTD_YKT = $this->db->select('AVG(SLG="COMPLY") AVG_YTD_YKT')
								->from('reg_data')
								->where('YEAR(SC_TGLPS)', $tahun)
								->like('WITEL','YOGYAKARTA')
								->get();

			$YTD_total = $this->db->select('AVG(SLG="COMPLY") AVG_YTD_total')
								->from('reg_data')
								->where('YEAR(SC_TGLPS)', $tahun)
								->get();
			echo '<pre>';var_dump($YTD_YKT->result());

		}

		function MTD($bulan, $tahun){
			$MTD = $this->db->select('WITEL, AVG(SLG="COMPLY") AVG_MTD')
								->from('reg_data')
								->where('MONTH(SC_TGLPS)', $bulan)
								->where('YEAR(SC_TGLPS)', $tahun)
								->group_by('WITEL')
								->get();

			$MTD_YKT = $this->db->select('AVG(SLG="COMPLY") AVG_MTD_YKT')
								->from('reg_data')
								->where('MONTH(SC_TGLPS)', $bulan)
								->where('YEAR(SC_TGLPS)', $tahun)
								->like('WITEL','YOGYAKARTA')
								->get();

			$MTD_total = $this->db->select('AVG(SLG="COMPLY") AVG_MTD_total')
								->from('reg_data')
								->where('MONTH(SC_TGLPS)', $bulan)
								->where('YEAR(SC_TGLPS)', $tahun)
								->get();
			echo '<pre>';var_dump($MTD->result());
		}

		function DTD($tanggal){
			$DTD = $this->db->select('WITEL, AVG(SLG="COMPLY") AVG_DTD')
								->from('reg_data')
								->where('SC_TGLPS', $tanggal)
								->group_by('WITEL')
								->get();

			$DTD_YKT = $this->db->select('AVG(SLG="COMPLY") AVG_DTD_YKT')
								->from('reg_data')
								->where('SC_TGLPS', $tanggal)
								->like('WITEL','YOGYAKARTA')
								->get();

			$DTD_total = $this->db->select('AVG(SLG="COMPLY") AVG_DTD_total')
								->from('reg_data')
								->where('SC_TGLPS', $tanggal)
								->get();
			echo '<pre>';var_dump($DTD->result());
		}

		function REPORT_PS_DTD($tanggal){
			$PS_3 = $this->db->select('WITEL, SUM(SLG="COMPLY") CNT_COMPLY, SUM(SLG="NOT COMPLY") CNT_NOTCOMPLY, COUNT(SLG)')
								->from('reg_data')
								->where('SC_TGLPS', $tanggal)
								->where('MTTI_GROUP', '2 HARI')
								->where('MTTI_GROUP', '1 HARI')
								->group_by('WITEL')
								->get();

			$PS_3_YKT = $this->db->select('WITEL, SUM(SLG="COMPLY") CNT_COMPLY, SUM(SLG="NOT COMPLY") CNT_NOTCOMPLY, COUNT(SLG)')
								->from('reg_data')
								->where('SC_TGLPS', $tanggal)
								->where('MTTI_GROUP', '2 HARI')
								->where('MTTI_GROUP', '1 HARI')
								->like('WITEL','YOGYAKARTA')
								->group_by('WITEL')
								->get();

			$PS_3_total = $this->db->select('SUM(SLG="COMPLY") CNT_COMPLY, SUM(SLG="NOT COMPLY") CNT_NOTCOMPLY, COUNT(SLG)')
								->from('reg_data')
								->where('SC_TGLPS', $tanggal)
								->where('MTTI_GROUP', '2 HARI')
								->where('MTTI_GROUP', '1 HARI')
								->get();

			$PS_2 = $this->db->select('WITEL, SUM(SLG="COMPLY") CNT_COMPLY, SUM(SLG="NOT COMPLY") CNT_NOTCOMPLY, COUNT(SLG)')
								->from('reg_data')
								->where('SC_TGLPS', $tanggal)
								->where('MTTI_GROUP', '1 HARI')
								->group_by('WITEL')
								->get();

			$PS_2_YKT = $this->db->select('WITEL, SUM(SLG="COMPLY") CNT_COMPLY, SUM(SLG="NOT COMPLY") CNT_NOTCOMPLY, COUNT(SLG)')
								->from('reg_data')
								->where('SC_TGLPS', $tanggal)
								->where('MTTI_GROUP', '1 HARI')
								->like('WITEL','YOGYAKARTA')
								->group_by('WITEL')
								->get();

			$PS_2_total = $this->db->select('SUM(SLG="COMPLY") CNT_COMPLY, SUM(SLG="NOT COMPLY") CNT_NOTCOMPLY, COUNT(SLG)')
								->from('reg_data')
								->where('SC_TGLPS', $tanggal)
								->where('MTTI_GROUP', '1 HARI')
								->get();
			echo '<pre>';var_dump($PS_3->result());
		}

		function REPORT_PS_MTD($bulan, $tahun){
			$PS_3 = $this->db->select('WITEL, SUM(SLG="COMPLY") CNT_COMPLY, SUM(SLG="NOT COMPLY") CNT_NOTCOMPLY, COUNT(SLG)')
								->from('reg_data')
								->where('MONTH(SC_TGLPS)', $bulan)
								->where('YEAR(SC_TGLPS)', $tahun)
								->where('MTTI_GROUP', '2 HARI')
								->where('MTTI_GROUP', '1 HARI')
								->group_by('WITEL')
								->get();

			$PS_3_YKT = $this->db->select('WITEL, SUM(SLG="COMPLY") CNT_COMPLY, SUM(SLG="NOT COMPLY") CNT_NOTCOMPLY, COUNT(SLG)')
								->from('reg_data')
								->where('MONTH(SC_TGLPS)', $bulan)
								->where('YEAR(SC_TGLPS)', $tahun)
								->where('MTTI_GROUP', '2 HARI')
								->where('MTTI_GROUP', '1 HARI')
								->like('WITEL','YOGYAKARTA')
								->group_by('WITEL')
								->get();

			$PS_3_total = $this->db->select('SUM(SLG="COMPLY") CNT_COMPLY, SUM(SLG="NOT COMPLY") CNT_NOTCOMPLY, COUNT(SLG)')
								->from('reg_data')
								->where('MONTH(SC_TGLPS)', $bulan)
								->where('YEAR(SC_TGLPS)', $tahun)
								->where('MTTI_GROUP', '2 HARI')
								->where('MTTI_GROUP', '1 HARI')
								->get();

			$PS_2 = $this->db->select('WITEL, SUM(SLG="COMPLY") CNT_COMPLY, SUM(SLG="NOT COMPLY") CNT_NOTCOMPLY, COUNT(SLG)')
								->from('reg_data')
								->where('MONTH(SC_TGLPS)', $bulan)
								->where('YEAR(SC_TGLPS)', $tahun)
								->where('MTTI_GROUP', '1 HARI')
								->group_by('WITEL')
								->get();

			$PS_2_YKT = $this->db->select('WITEL, SUM(SLG="COMPLY") CNT_COMPLY, SUM(SLG="NOT COMPLY") CNT_NOTCOMPLY, COUNT(SLG)')
								->from('reg_data')
								->where('MONTH(SC_TGLPS)', $bulan)
								->where('YEAR(SC_TGLPS)', $tahun)
								->where('MTTI_GROUP', '1 HARI')
								->like('WITEL','YOGYAKARTA')
								->group_by('WITEL')
								->get();

			$PS_2_total = $this->db->select('SUM(SLG="COMPLY") CNT_COMPLY, SUM(SLG="NOT COMPLY") CNT_NOTCOMPLY, COUNT(SLG)')
								->from('reg_data')
								->where('MONTH(SC_TGLPS)', $bulan)
								->where('YEAR(SC_TGLPS)', $tahun)
								->where('MTTI_GROUP', '1 HARI')
								->get();
			echo '<pre>';var_dump($PS_3->result());
		}

	}