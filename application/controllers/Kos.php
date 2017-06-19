<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kos extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('kos_model');
        $this->load->model('akun_model');
    }

    public function index(){
        $this->cari();
    }

    public function cari(){
        $this->load->library('pagination');
        
//        if ( $this->input->post('search') ) {
//            $search['lokasi'] = $this->input->post('lokasi');
//            $search['fasilitas'] = $this->input->post('fasilitas');
//        }
        $config['base_url'] = base_url().'kos/cari';
        $config['total_rows'] = $this->kos_model->hitung();
        $config['per_page'] = 6;
        $config['uri_segment'] = 3;
        $this->pagination->initialize($config);
        
        $page = ( $this->uri->segment(3) ) ? $this->uri->segment(2) : 0;
        $links   = $this->pagination->create_links();
        
        $this->show_cari($config['per_page'], $page, $links);
    }

    private function show_cari( $limit, $start, $links ){
        $option = '<option value="1">Option 1</option>';
        $results = $this->kos_model->semua_page( $limit, $start );
        $data = [
            'title'       => 'FindingKost | Kos',
            'pagination'  => $links
        ];
        foreach ($results as $result):
            $detail =[
                'image'    => base_url('assets/images/' . $result->foto ),
                'id'       => $result->id_pemilik,
                'alamat'   => $result->alamat,
                'fasilitas'=> $result->fasilitas,
                'harga'    => number_format($result->harga,0,',','.'),
                'link'     => base_url('kos/detail/' . $result->id)
            ]; 
            $data['detail'][] = $detail;
        endforeach;
        
        $this->parser->parse('main', $data);
    }
    
    public function detail($id){
        $kos = $this->kos_model->kos( $id );
        if ( $kos ) :
            $status = $this->akun_model->status();
            if ( $status == 1) {
                $button = '&nbsp;';
            } else if ( $status == 0){
                $button = '<a class="btn waves-effect" href="' . base_url('pencari/daftar/' . $id) . '">Daftar sekarang</a>';
            } else {
                $button = '<a href="' . base_url('akun/masuk') . '">Masuk</a> terlebih dahulu, untuk daftar kos ';
            }
            $id_p    = $kos->id_pemilik;
            $pemilik = $this->akun_model->akun( $id_p );
            $data = [
                'title'         => 'FindingKost | ' . ucwords( $pemilik->nama ),
                'link_foto'     => base_url( 'assets/images/' . $kos->foto ),
                'link_username' => base_url( 'akun/profil/' . $pemilik->username ),
                'fasilitas'     => $kos->fasilitas,
                'nama'          => ucwords( $pemilik->nama ),
                'alamat'        => $kos->alamat,
                'telepon'       => $pemilik->telepon,
                'harga'         => number_format( $kos->harga, 2, ",", "." ),
                'button_daftar' => $button
            ];
            
            $this->parser->parse('kos/detail', $data);
        else :
            show_404();
        endif;
    }
}