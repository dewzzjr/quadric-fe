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


}
