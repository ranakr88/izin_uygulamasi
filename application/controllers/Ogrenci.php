<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ogrenci extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
    }

  public function index() {
    // 1. Modeli yüklüyoruz
    $this->load->model('IzinModel');
    
    // 2. Modeldeki fonksiyonu çağırıp verileri bir değişkene atıyoruz
    $data['izinler'] = $this->IzinModel->get_izinler();
    
    // 3. Verileri View (Arayüz) dosyasına gönderiyoruz
    $this->load->view('izin_sistemi', $data);
}

    public function izin_kaydet() {
        $data = array(
            'ad_soyad'         => $this->input->post('ad_soyad'),
            'tc_no'          => $this->input->post('tc_no'),
            'baslangic_tarihi' => $this->input->post('baslangic'),
            'bitis_tarihi' => $this->input->post('bitis'),
            'gidecegi_sehir'  => $this->input->post('sehir'), // Yeni
            'gidecegi_ilce'   => $this->input->post('ilce'),  // Yeni
            'sebep' => $this->input->post('sebep'),
            'durum' => 'Beklemede'
        );
        $this->db->insert('izinler', $data);
        redirect('ogrenci');
    }
   
}
