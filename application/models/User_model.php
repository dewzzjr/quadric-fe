<?php

class User_model extends CI_Model {

    function __construct(){
        parent::__construct();
        $this->load->database();
    }

    function cek_user($username, $password){
      $n_password = md5($password);
      $this->db->select('*');
      $this->db->from('user');
      $this->db->where('username', $username);
      $this->db->where('password', $n_password);
      $query = $this->db->get();
      $result['status'] = ($query->num_rows() > 0) ? true : false;
      $result['data'] = $query->row_array();
      return $result;
    }

}
