<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Saran_model extends CI_Model {

    public function simpanSaran($data)
    {
        // Menyimpan data saran ke database
        $this->db->insert('saran',$data);
    }
}