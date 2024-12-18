<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Saran extends CI_Controller {

    public function index()
    {
        // Mengambil input dari formulir
        $data = array(
            'tanggal' => $this->input->post('tanggal'),
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'saran' => $this->input->post('saran')
        );

        // Menyimpan data ke database atau mengirimkan email
        // Misalnya menggunakan model untuk menyimpan data
        $this->load->model('Saran_model');
        $this->Saran_model->simpanSaran($data);

        // Redirect atau tampilkan pesan sukses
        $this->session->set_flashdata('message', 'Saran Anda berhasil dikirim!');
        redirect(base_url('home'));
    }
}