<?php

class Data_model extends CI_Model {

    function __construct(){
        parent::__construct();
        $this->load->database();
    }

    /**
    * Admin function
    */

    function importData($file){
      $file = str_replace("\\","/",$file);
      $query = $this->db->query(
        "LOAD DATA INFILE '$file'
        INTO TABLE reg_data
        FIELDS TERMINATED BY '\t'
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

    function inputData($data){
      $this->db->insert('regional', $data);
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

    function listTanggal(){
      $listTanggal = $this->db->select('DATE(SC_TGLPS) TGL_PS, COUNT(SC_TGLPS) CNT_PS')
                  ->from('reg_data')
                  ->group_by('SC_TGLPS')
                  ->get();

      return $listTanggal->result();
    }

    /**
    * PS function
    * getData (JSON->ytd; JSON->mtd; )
    * getDataHari (JSON->dtd; )
    * getDataTotalPerHari (JSON->rmtd; )
    * getDataTotalPerBulan (JSON->rytd; )
    */

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
			$cond = array('SC_TGLPS <=' => $tanggal, 'SC_TGLPS >=' => $tanggal1);
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

    public function getDataTotalPerBulan($bulan, $tahun){
      $this->db->cache_on();
			$cond = array('MONTH(SC_TGLPS) <=' => $bulan, 'YEAR(SC_TGLPS) =' => $tahun);// "BETWEEN " . $tanggal1 . " AND " . $tanggal);
      $data = $this->db->select('MONTH(SC_TGLPS) AS BLN, AVG( SLG="COMPLY") TOTAL')
                ->from('reg_data')
                ->where($cond)
								->group_by('MONTH(SC_TGLPS)' )
                ->get()
                ->result_array();
      $this->db->cache_off();
      $result = array('data' => $data);
      return json_encode($result);
			// echo '<pre>';var_dump($result);die();
		}

    /**
    * FE function
    * getDataPS3PerHari (JSON->psd3; )
    * getDataPS3PerBulan (JSON->psm3; )
    * getDataPS2PerHari (JSON->psd2; )
    * getDataPS2PerBulan (JSON->psm2; )
    */
    public function getDataPS3PerHari($tanggal){
      $date = date_create($tanggal);
      date_sub($date,date_interval_create_from_date_string("1 day"));
      $tanggalSebelum = date_format($date,"Y-m-d");

      $this->db->cache_on();
      $data = $this->db->select(
        'WITEL,
				SUM(SLG="COMPLY") AS COMPLY,
				SUM(SLG="NOT COMPLY") AS NOTCOMPLY,
				SUM(DATE(SC_TGLPS) = "'.$tanggal.'") TOTAL,
				AVG(SLG="COMPLY") NOW')
        ->from('reg_data')
        ->where('DATE(SC_TGLPS)', $tanggal)
        ->group_by('WITEL')->get()->result_array();

      $dataPrev = $this->db->select(
        'WITEL,
        SUM(DATE(SC_TGLPS) = "'.$tanggalSebelum.'") TOTAL,
        AVG(SLG="COMPLY") AVG')
        ->from('reg_data')
        ->where('DATE(SC_TGLPS)', $tanggalSebelum)
        ->group_by('WITEL')->get()->result_array();

      $result['total'] = $this->db->select(
        'SUM(SLG="COMPLY") AS COMPLY,
				SUM(SLG="NOT COMPLY") AS NOTCOMPLY,
        SUM(DATE(SC_TGLPS) = "'.$tanggal.'") TOTAL,
        AVG(SLG="COMPLY") NOW')
        ->from('reg_data')
        ->where('DATE(SC_TGLPS)', $tanggal)
        ->get()->row_array();

      $dataTotalPrev = $this->db->select(
        '
        SUM(DATE(SC_TGLPS) = "'.$tanggalSebelum.'") TOTAL,
        AVG(SLG="COMPLY") AVG')
        ->from('reg_data')
        ->where('DATE(SC_TGLPS)', $tanggalSebelum)
        ->get()->row_array();

      $this->db->cache_off();
      $result['data'] = $data;

      // insert prev avg
      for ($i=0; $i < sizeof($result['data']) ; $i++) {
        $result['data'][$i]['BEFORE'] =  $dataPrev[$i]['AVG'];
      }
      $result['total']['BEFORE'] =  $dataTotalPrev['AVG'];

      // combine
      if (isset($result['data'][7])) {
        $new['WITEL'] = $result['data'][7]['WITEL'];
        $new['COMPLY'] = strval( intval($result['data'][0]['COMPLY']) + intval($result['data'][7]['COMPLY']) );
        $new['NOTCOMPLY'] = strval( intval($result['data'][0]['NOTCOMPLY']) + intval($result['data'][7]['NOTCOMPLY']) );
        $new['TOTAL'] = strval( intval($result['data'][0]['TOTAL']) + intval($result['data'][7]['TOTAL']) );
        $total['a'] = floatval($result['data'][0]['TOTAL']);
        $total['b'] = floatval($result['data'][7]['TOTAL']);
        $new['NOW'] = number_format((
          (floatval($result['data'][0]['NOW']) * $total['a']) +
          (floatval($result['data'][7]['NOW']) * $total['b'])
        ) / floatval($new['TOTAL']) , 4);
        $new['BEFORE'] = number_format((
          (floatval($result['data'][0]['BEFORE']) * $total['a']) +
          (floatval($result['data'][7]['BEFORE']) * $total['b'])
        ) / floatval($new['TOTAL']) , 4);
        $result['data'][0] = $new;
        array_splice($result['data'], 7, 1);
      }
      return json_encode($result);
      // var_dump($result);die();
    }


    public function getDataPS2PerHari($tanggal){
      $date = date_create($tanggal);
      date_sub($date,date_interval_create_from_date_string("1 day"));
      $tanggalSebelum = date_format($date,"Y-m-d");

      $this->db->cache_on();
      $data = $this->db->select(
        'WITEL,
				SUM(MTTI_GROUP = "1 HARI" OR MTTI_GROUP = "2 HARI") AS COMPLY,
				SUM(NOT (MTTI_GROUP = "1 HARI" OR MTTI_GROUP = "2 HARI")) AS NOTCOMPLY,
				SUM(DATE(SC_TGLPS) = "'.$tanggal.'") TOTAL,
				AVG(MTTI_GROUP = "1 HARI" OR MTTI_GROUP = "2 HARI") NOW')
        ->from('reg_data')
        ->where('DATE(SC_TGLPS)', $tanggal)
        ->group_by('WITEL')->get()->result_array();

      $dataPrev = $this->db->select(
        'WITEL,
        SUM(DATE(SC_TGLPS) = "'.$tanggalSebelum.'") TOTAL,
        AVG(MTTI_GROUP = "1 HARI" OR MTTI_GROUP = "2 HARI") AVG')
        ->from('reg_data')
        ->where('DATE(SC_TGLPS)', $tanggalSebelum)
        ->group_by('WITEL')->get()->result_array();

      $result['total'] = $this->db->select(
        'SUM(MTTI_GROUP = "1 HARI" OR MTTI_GROUP = "2 HARI") AS COMPLY,
				SUM(NOT(MTTI_GROUP = "1 HARI" OR MTTI_GROUP = "2 HARI")) AS NOTCOMPLY,
        SUM(DATE(SC_TGLPS) = "'.$tanggal.'") TOTAL,
        AVG(MTTI_GROUP = "1 HARI" OR MTTI_GROUP = "2 HARI") NOW')
        ->from('reg_data')
        ->where('DATE(SC_TGLPS)', $tanggal)
        ->get()->row_array();

      $dataTotalPrev = $this->db->select(
        '
        SUM(DATE(SC_TGLPS) = "'.$tanggalSebelum.'") TOTAL,
        AVG(MTTI_GROUP = "1 HARI" OR MTTI_GROUP = "2 HARI") AVG')
        ->from('reg_data')
        ->where('DATE(SC_TGLPS)', $tanggalSebelum)
        ->get()->row_array();

      $this->db->cache_off();
      $result['data'] = $data;

      // insert prev avg
      for ($i=0; $i < sizeof($result['data']) ; $i++) {
        $result['data'][$i]['BEFORE'] =  $dataPrev[$i]['AVG'];
      }
      $result['total']['BEFORE'] =  $dataTotalPrev['AVG'];

      // combine
      if (isset($result['data'][7])) {
        $new['WITEL'] = $result['data'][7]['WITEL'];
        $new['COMPLY'] = strval( intval($result['data'][0]['COMPLY']) + intval($result['data'][7]['COMPLY']) );
        $new['NOTCOMPLY'] = strval( intval($result['data'][0]['NOTCOMPLY']) + intval($result['data'][7]['NOTCOMPLY']) );
        $new['TOTAL'] = strval( intval($result['data'][0]['TOTAL']) + intval($result['data'][7]['TOTAL']) );
        $total['a'] = floatval($result['data'][0]['TOTAL']);
        $total['b'] = floatval($result['data'][7]['TOTAL']);
        $new['NOW'] = number_format((
          (floatval($result['data'][0]['NOW']) * $total['a']) +
          (floatval($result['data'][7]['NOW']) * $total['b'])
        ) / floatval($new['TOTAL']) , 4);
        $new['BEFORE'] = number_format((
          (floatval($result['data'][0]['BEFORE']) * $total['a']) +
          (floatval($result['data'][7]['BEFORE']) * $total['b'])
        ) / floatval($new['TOTAL']) , 4);
        $result['data'][0] = $new;
        array_splice($result['data'], 7, 1);
      }
      return json_encode($result);
      // var_dump($result);die();
    }

    public function getDataPS3PerBulan($tanggal){
      $date = date_create($tanggal);
      $tanggal1 = date_format($date,"Y-m-") . '01';

      date_sub($date,date_interval_create_from_date_string("1 day"));
      $tanggalSebelum = date_format($date,"Y-m-d");

      if ($tanggal == $tanggal1 ){
        $where = array(
          'DATE(SC_TGLPS) =' => $tanggal
        );
        $whereBefore = array(
          'DATE(SC_TGLPS) =' => $tanggalSebelum,
        );
      } else {
        $where = array(
          'DATE(SC_TGLPS) <=' => $tanggal,
          'DATE(SC_TGLPS) >=' => $tanggal1
        );
        $whereBefore = array(
          'DATE(SC_TGLPS) <=' => $tanggalSebelum,
          'DATE(SC_TGLPS) >=' => $tanggal1
        );
      }

      $this->db->cache_on();
      $data = $this->db->select(
        'WITEL,
				SUM(SLG="COMPLY") AS COMPLY,
				SUM(SLG="NOT COMPLY") AS NOTCOMPLY,
				SUM(DATE(SC_TGLPS) <= "'.$tanggal.'" AND DATE(SC_TGLPS) >= "'.$tanggal1.'" ) TOTAL,
				AVG(SLG="COMPLY") NOW')
        ->from('reg_data')
        ->where($where)
        ->group_by('WITEL')->get()->result_array();

      $dataPrev = $this->db->select(
        'WITEL,
        SUM(DATE(SC_TGLPS) = "'.$tanggalSebelum.'" AND DATE(SC_TGLPS) >= "'.$tanggal1.'" ) TOTAL,
        AVG(SLG="COMPLY") AVG')
        ->from('reg_data')
        ->where($whereBefore)
        ->group_by('WITEL')->get()->result_array();

      $result['total'] = $this->db->select(
        'SUM(SLG="COMPLY") AS COMPLY,
				SUM(SLG="NOT COMPLY") AS NOTCOMPLY,
        COUNT(SLG) TOTAL,
        AVG(SLG="COMPLY") NOW')
        ->from('reg_data')
        ->where($where)
        ->get()->row_array();

      $dataTotalPrev = $this->db->select(
        '
        SUM(DATE(SC_TGLPS) = "'.$tanggalSebelum.'" AND DATE(SC_TGLPS) >= "'.$tanggal1.'" ) TOTAL,
        AVG(SLG="COMPLY") AVG')
        ->from('reg_data')
        ->where($whereBefore)
        ->get()->row_array();

      $this->db->cache_off();
      $result['data'] = $data;

      // insert prev avg
      for ($i=0; $i < sizeof($result['data']) ; $i++) {
        $result['data'][$i]['BEFORE'] =  $dataPrev[$i]['AVG'];
      }
      $result['total']['BEFORE'] =  $dataTotalPrev['AVG'];

      // combine
      if (isset($result['data'][7])) {
        $new['WITEL'] = $result['data'][7]['WITEL'];
        $new['COMPLY'] = strval( intval($result['data'][0]['COMPLY']) + intval($result['data'][7]['COMPLY']) );
        $new['NOTCOMPLY'] = strval( intval($result['data'][0]['NOTCOMPLY']) + intval($result['data'][7]['NOTCOMPLY']) );
        $new['TOTAL'] = strval( intval($result['data'][0]['TOTAL']) + intval($result['data'][7]['TOTAL']) );
        $total['a'] = floatval($result['data'][0]['TOTAL']);
        $total['b'] = floatval($result['data'][7]['TOTAL']);
        $new['NOW'] = number_format((
          (floatval($result['data'][0]['NOW']) * $total['a']) +
          (floatval($result['data'][7]['NOW']) * $total['b'])
        ) / floatval($new['TOTAL']) , 4);
        $new['BEFORE'] = number_format((
          (floatval($result['data'][0]['BEFORE']) * $total['a']) +
          (floatval($result['data'][7]['BEFORE']) * $total['b'])
        ) / floatval($new['TOTAL']) , 4);
        $result['data'][0] = $new;
        array_splice($result['data'], 7, 1);
      }
      return json_encode($result);
      // var_dump($result);die();
    }


    public function getDataPS2PerBulan($tanggal){
      $date = date_create($tanggal);
      $tanggal1 = date_format($date,"Y-m-") . '01';

      date_sub($date,date_interval_create_from_date_string("1 day"));
      $tanggalSebelum = date_format($date,"Y-m-d");

      if ($tanggal == $tanggal1 ){
        $where = array(
          'DATE(SC_TGLPS) =' => $tanggal
        );
        $whereBefore = array(
          'DATE(SC_TGLPS) =' => $tanggalSebelum,
        );
      } else {
        $where = array(
          'DATE(SC_TGLPS) <=' => $tanggal,
          'DATE(SC_TGLPS) >=' => $tanggal1
        );
        $whereBefore = array(
          'DATE(SC_TGLPS) <=' => $tanggalSebelum,
          'DATE(SC_TGLPS) >=' => $tanggal1
        );
      }

      $this->db->cache_on();
      $data = $this->db->select(
        'WITEL,
				SUM(MTTI_GROUP = "1 HARI" OR MTTI_GROUP = "2 HARI") AS COMPLY,
				SUM(NOT (MTTI_GROUP = "1 HARI" OR MTTI_GROUP = "2 HARI")) AS NOTCOMPLY,
				SUM(DATE(SC_TGLPS) = "'.$tanggal.'" AND DATE(SC_TGLPS) >= "'.$tanggal1.'" ) TOTAL,
				AVG(MTTI_GROUP = "1 HARI" OR MTTI_GROUP = "2 HARI") NOW')
        ->from('reg_data')
        ->where($where)
        ->group_by('WITEL')->get()->result_array();

      $dataPrev = $this->db->select(
        'WITEL,
        SUM(DATE(SC_TGLPS) = "'.$tanggalSebelum.'" AND DATE(SC_TGLPS) >= "'.$tanggal1.'" ) TOTAL,
        AVG(MTTI_GROUP = "1 HARI" OR MTTI_GROUP = "2 HARI") AVG')
        ->from('reg_data')
        ->where($whereBefore)
        ->group_by('WITEL')->get()->result_array();

      $result['total'] = $this->db->select(
        'SUM(MTTI_GROUP = "1 HARI" OR MTTI_GROUP = "2 HARI") AS COMPLY,
				SUM(NOT(MTTI_GROUP = "1 HARI" OR MTTI_GROUP = "2 HARI")) AS NOTCOMPLY,
        COUNT(SLG) TOTAL,
        AVG(MTTI_GROUP = "1 HARI" OR MTTI_GROUP = "2 HARI") NOW')
        ->from('reg_data')
        ->where($where)
        ->get()->row_array();

      $dataTotalPrev = $this->db->select(
        '
        SUM(DATE(SC_TGLPS) = "'.$tanggalSebelum.'" AND DATE(SC_TGLPS) >= "'.$tanggal1.'" ) TOTAL,
        AVG(MTTI_GROUP = "1 HARI" OR MTTI_GROUP = "2 HARI") AVG')
        ->from('reg_data')
        ->where($whereBefore)
        ->get()->row_array();

      $this->db->cache_off();
      $result['data'] = $data;

      // insert prev avg
      for ($i=0; $i < sizeof($result['data']) ; $i++) {
        $result['data'][$i]['BEFORE'] =  $dataPrev[$i]['AVG'];
      }
      $result['total']['BEFORE'] =  $dataTotalPrev['AVG'];

      // combine
      if (isset($result['data'][7])) {
        $new['WITEL'] = $result['data'][7]['WITEL'];
        $new['COMPLY'] = strval( intval($result['data'][0]['COMPLY']) + intval($result['data'][7]['COMPLY']) );
        $new['NOTCOMPLY'] = strval( intval($result['data'][0]['NOTCOMPLY']) + intval($result['data'][7]['NOTCOMPLY']) );
        $new['TOTAL'] = strval( intval($result['data'][0]['TOTAL']) + intval($result['data'][7]['TOTAL']) );
        $total['a'] = floatval($result['data'][0]['TOTAL']);
        $total['b'] = floatval($result['data'][7]['TOTAL']);
        $new['NOW'] = number_format((
          (floatval($result['data'][0]['NOW']) * $total['a']) +
          (floatval($result['data'][7]['NOW']) * $total['b'])
        ) / floatval($new['TOTAL']) , 4);
        $new['BEFORE'] = number_format((
          (floatval($result['data'][0]['BEFORE']) * $total['a']) +
          (floatval($result['data'][7]['BEFORE']) * $total['b'])
        ) / floatval($new['TOTAL']) , 4);
        $result['data'][0] = $new;
        array_splice($result['data'], 7, 1);
      }
      return json_encode($result);
      // var_dump($result);die();
    }
}
