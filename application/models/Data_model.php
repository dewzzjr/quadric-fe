<?php

class Data_model extends CI_Model {

    function __construct(){
        parent::__construct();
        $this->load->database();
    }

    function input($data){
      $n_password = md5($password);
      $this->db->insert('reg_data');
    }

    function importData($file){
      $file = str_replace("\\","/",$file);
      $query = $this->db->query(
        "LOAD DATA INFILE '$file'
        INTO TABLE reg_data
        FIELDS TERMINATED BY ','
        LINES TERMINATED BY '\n'
        IGNORE 1 ROWS
        (
          ALPRO, BEFORE_CA, CHANEL, CHANEL_APP,
          CSEG, Cancel, MTTI_GROUP, `MTD MTTI`,
          SLG, APP,
          DURASI, DURASI_FO, DURASI_PI, DURASI_RE, DURASI_UN, DURASI_VA,
          @var1, JENISPSB, KANDATEL, KAWASAN, KODEFIKASI_SC,
          NDEM, `Number of Records`,
          ORDER_ID, PS_DONE, REASON_CANCEL,
          @var2, @var3, @var4, @var5, @var6, @var7,
          `SLG (copy)`, STATUS, STATUS_INDIHOME, STATUS_SERVICE, TYPE_PIPE, WITEL
        )
        SET
        ISISKA_TGLVA = STR_TO_DATE(@var1, '%m/%d/%Y %r'),
        SC_TGLCA = STR_TO_DATE(@var2, '%m/%d/%Y %r'),
        SC_TGLCREATE = STR_TO_DATE(@var3, '%m/%d/%Y %r'),
        SC_TGLFO = STR_TO_DATE(@var4, '%m/%d/%Y %r'),
        SC_TGLPI = STR_TO_DATE(@var5, '%m/%d/%Y %r'),
        SC_TGLPS = STR_TO_DATE(@var6, '%m/%d/%Y %r'),
        SC_TGLUNSC = STR_TO_DATE(@var7, '%m/%d/%Y %r')"
      );
      $res['success'] = $query;
      $res['rows'] = $this->db->affected_rows();
      $this->db->cache_delete_all();
      return $res;
    }

    function deleteData($tanggal = NULL) {
      $this->db->from('reg_data');

      if ( isset($tanggal) ) {
        $this->db->where('SC_TGLPS', $tanggal);
        $res['success'] = $this->db->delete();
      } else {
        $this->db->from('reg_data');
        $res['success'] = $this->db->truncate();
      }

      $res['rows'] = $this->db->affected_rows();
      return $res;
    }

    function getYTD($tahun){
      $this->db->cache_on();
			$cond = array('YEAR(SC_TGLPS)' => $tahun);

			$YTD = $this->db->select('WITEL, AVG(SLG="COMPLY") AVG_YTD')
								->from('reg_data')
								->where($cond)
								->group_by('WITEL')
								->get()
								->result_array();


			$YTD_total = $this->db->select('AVG(SLG="COMPLY") AVG_YTD_total')
								->from('reg_data')
								->where($cond)
								->get()
								->row()->AVG_YTD_total;

      //combine
      if (isset($YTD[7])) {
        $YTD[0]['AVG_YTD'] = $this->db->select('AVG(SLG="COMPLY") AVG_YTD_YKT')
  								->from('reg_data')
  								->where($cond)
  								->like('WITEL','YOGYAKARTA')
  								->get()
  								->row()->AVG_YTD_YKT;

        $YTD[0]['WITEL'] = $YTD[7]['WITEL'];
        array_splice($YTD, 7, 1);
      }
      $this->db->cache_off();
      $result = array('data' => $YTD, 'total' => $YTD_total);
			return json_encode($result);
			//echo '<pre>';var_dump($YTD_YKT->result());
		}


		function getData($tahun, $bulan = NULL){
      $this->db->cache_on();
			$cond['YEAR(SC_TGLPS)'] = $tahun;
      if (isset($bulan)) {
        $cond['MONTH(SC_TGLPS)'] = $bulan;
      }

			$data = $this->db->select('WITEL, AVG(SLG="COMPLY") AVG')
								->from('reg_data')
								->where($cond)
								->group_by('WITEL')
								->get()
								->result_array();

			$total = $this->db->select('AVG(SLG="COMPLY") TOTAL')
								->from('reg_data')
								->where($cond)
								->get()
								->row()->TOTAL;

      //combine
      if (isset($data[7])) {
        $MTD[0]['AVG_MTD'] = $this->db->select('AVG(SLG="COMPLY") YKT')
  								->from('reg_data')
  								->where($cond)
  								->like('WITEL','YOGYAKARTA')
  								->get()
  								->row()->YKT;

        $data[0]['WITEL'] = $data[7]['WITEL'];
        array_splice($data, 7, 1);
      }

      $this->db->cache_off();

      $result = array('data' => $data, 'total' => $total);
			return json_encode($result);
			//echo '<pre>';var_dump($MTD->result());
		}

    function getDataHari($tanggal1, $tanggal){
      $this->db->cache_on();
			$cond = array('SC_TGLPS <=' => $tanggal, 'SC_TGLPS >=' => $tanggal1);// "BETWEEN " . $tanggal1 . " AND " . $tanggal);

			$data = $this->db->select('SC_TGLPS AS TGL,
      AVG((SELECT SLG WHERE WITEL LIKE "%KUDUS%") = "COMPLY" ) AS KDS,
      AVG((SELECT SLG WHERE WITEL LIKE "%MAGELANG%") = "COMPLY" ) AS MGL,
      AVG((SELECT SLG WHERE WITEL LIKE "%PEKALONGAN%") = "COMPLY" ) AS PKL,
      AVG((SELECT SLG WHERE WITEL LIKE "%PURWOKERTO%") = "COMPLY" ) AS PWT,
      AVG((SELECT SLG WHERE WITEL LIKE "%SEMARANG%") = "COMPLY" ) AS SMG,
      AVG((SELECT SLG WHERE WITEL LIKE "%SOLO%") = "COMPLY" ) AS SLO,
      AVG((SELECT SLG WHERE WITEL LIKE "%YOGYAKARTA%") = "COMPLY" ) AS YKT,
      AVG( SLG="COMPLY") TOTAL')
								//->distinct('WITEL')
                ->from('reg_data')
								->where($cond)
								->group_by('SC_TGLPS' )
								->get()
								->result_array();

      $total = $this->db->select(
      'AVG((SELECT SLG WHERE WITEL LIKE "%KUDUS%") = "COMPLY" ) AS KDS,
      AVG((SELECT SLG WHERE WITEL LIKE "%MAGELANG%") = "COMPLY" ) AS MGL,
      AVG((SELECT SLG WHERE WITEL LIKE "%PEKALONGAN%") = "COMPLY" ) AS PKL,
      AVG((SELECT SLG WHERE WITEL LIKE "%PURWOKERTO%") = "COMPLY" ) AS PWT,
      AVG((SELECT SLG WHERE WITEL LIKE "%SEMARANG%") = "COMPLY" ) AS SMG,
      AVG((SELECT SLG WHERE WITEL LIKE "%SOLO%") = "COMPLY" ) AS SLO,
      AVG((SELECT SLG WHERE WITEL LIKE "%YOGYAKARTA%") = "COMPLY" ) AS YKT,
      AVG( SLG="COMPLY") TOTAL')
                //->distinct('WITEL')
                ->from('reg_data')
                ->where($cond)
                ->get()
                ->row_array();

      $this->db->cache_off();

			$result = array('data' => $data, 'total' => $total);
      return json_encode($result);
			//echo '<pre>';var_dump(array('data' => $DTD, 'total' => $DTD_total));die();
		}

    public function getDataTotalPerHari($tanggal1, $tanggal){
      $this->db->cache_on();
			$cond = array('SC_TGLPS <=' => $tanggal, 'SC_TGLPS >=' => $tanggal1);// "BETWEEN " . $tanggal1 . " AND " . $tanggal);
      $data = $this->db->select('SC_TGLPS AS TGL, AVG( SLG="COMPLY") TOTAL')
                ->from('reg_data')
                ->where($cond)
								->group_by('SC_TGLPS' )
                ->get()
                ->result_array();
      $total = $this->db->select('AVG( SLG="COMPLY") TOTAL')
                ->from('reg_data')
                ->where($cond)
                ->get()
                ->row_array();
      $this->db->cache_off();
      $result = array('data' => $data, 'total' => $total);
      return json_encode($result);
			//echo '<pre>';var_dump(array('data' => $DTD, 'total' => $DTD_total));die();
		}

}
