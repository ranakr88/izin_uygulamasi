<?php
class IzinModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        // Veritabanı kütüphanesini burada veya autoload.php'de yüklemelisin
        $this->load->database();
    }

    // Tüm izinleri veritabanından çeker
    public function get_izinler() {
        $query = $this->db->get('izinler');
        return $query->result(); // Verileri nesne (object) olarak döndürür
    }
}