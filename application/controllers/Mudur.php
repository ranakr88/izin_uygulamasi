<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mudur extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
    }

    public function index() {
        $data['talepler'] = $this->db->get('izinler')->result();
        $this->load->view('mudur_view', $data);
    }

    public function onayla($id) {
        $this->db->where('id', $id)->update('izinler', ['durum' => 'Onaylandı']);
        redirect('mudur');
    }

    public function reddet($id) {
        $this->db->where('id', $id)->update('izinler', ['durum' => 'Reddedildi']);
        redirect('mudur');
    }
    public function sil($id) {
    // Veritabanından ilgili ID'ye sahip kaydı siliyoruz
    $this->db->where('id', $id);
    $this->db->delete('izinler');
    
    // İşlem bittikten sonra müdür paneline geri dönüyoruz
    redirect('mudur');
}
}