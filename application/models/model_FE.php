<?php
	class Model_FE extends CI_Model{

		public function __construct() 
	    {
	        parent::__construct(); 
	        $this->load->database();
	    }

		function importData(){
			$file = fopen($_FILES['userfile']['tmp_name'],'r') or die("can't open file");

			return $query = $this->db->query(
			"LOAD DATA INFILE '<?php $file ?>' 
			INTO TABLE reg_data 
			FIELDS TERMINATED BY '\t' 
			LINES TERMINATED BY '\n'
			IGNORE 1 ROWS
			(ALPRO, BEFORE_CA, CHANEL, CHANEL_APP, CSEG, Cancel, MTTI_GROUP, `MTD MTTI`, SLG, APP, DURASI, DURASI_FO, DURASI_PI, DURASI_RE, DURASI_UN, DURASI_VA, @var1, JENISPSB, KANDATEL, KAWASAN, KODEFIKASI_SC, NDEM, `Number of Records`, ORDER_ID, PS_DONE, REASON_CANCEL, @var2, @var3, @var4, @var5, @var6, @var7, `SLG (copy)`, STATUS, STATUS_INDIHOME, STATUS_SERVICE, TYPE_PIPE, WITEL)
			SET ISISKA_TGLVA = STR_TO_DATE(@var1, '%m/%d/%Y %r'), SC_TGLCA = STR_TO_DATE(@var2, '%m/%d/%Y %r'), SC_TGLCREATE = STR_TO_DATE(@var3, '%m/%d/%Y %r'), SC_TGLFO = STR_TO_DATE(@var4, '%m/%d/%Y %r'), SC_TGLPI = STR_TO_DATE(@var5, '%m/%d/%Y %r'), SC_TGLPS = STR_TO_DATE(@var6, '%m/%d/%Y %r'), SC_TGLUNSC = STR_TO_DATE(@var7, '%m/%d/%Y %r')");
		}

		function listTanggal(){
			$listTanggal = $this->db->select('DATE(SC_TGLPS) TGL_PS, COUNT(SC_TGLPS) CNT_PS')
									->from('reg_data')
									->group_by('SC_TGLPS')
									->get();
									
			return $listTanggal->result();
		}

		function deleteData($tanggal){
			$this->db->where('SC_TGLPS', $tanggal);
			$this->db->delete('reg_data'); 
		}

		function YTD($tahun){
			$cond = array('YEAR(SC_TGLPS)' => $tahun);

			$YTD = $this->db->select('WITEL, AVG(SLG="COMPLY") AVG_YTD')
								->from('reg_data')
								->where($cond)
								->group_by('WITEL')
								->get()
								->result();

			$YTD_YKT = $this->db->select('AVG(SLG="COMPLY") AVG_YTD_YKT')
								->from('reg_data')
								->where($cond)
								->like('WITEL','YOGYAKARTA')
								->get()
								->result();

			$YTD_total = $this->db->select('AVG(SLG="COMPLY") AVG_YTD_total')
								->from('reg_data')
								->where($cond)
								->get()
								->result();

			return array('YTD' => $YTD, 'YTD_total' => $YTD_total);
			//echo '<pre>';var_dump($YTD_YKT->result());

		}

		function MTD($bulan, $tahun){
			$cond = array('YEAR(SC_TGLPS)' => $tahun, 'MONTH(SC_TGLPS)' => $bulan);

			$MTD = $this->db->select('WITEL, AVG(SLG="COMPLY") AVG_MTD')
								->from('reg_data')
								->where($cond)
								->group_by('WITEL')
								->get()
								->result();

			$MTD_YKT = $this->db->select('AVG(SLG="COMPLY") AVG_MTD_YKT')
								->from('reg_data')
								->where($cond)
								->like('WITEL','YOGYAKARTA')
								->get()
								->result();

			$MTD_total = $this->db->select('AVG(SLG="COMPLY") AVG_MTD_total')
								->from('reg_data')
								->where($cond)
								->get()
								->result();

			return array('MTD' => $MTD, 'MTD_total' => $MTD_total);
			//echo '<pre>';var_dump($MTD->result());
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