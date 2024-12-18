<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model'); // Memuat model User_model untuk digunakan dalam metode
        if ($this->session->userdata('level') != 'Admin') {
            // Mengarahkan ke halaman login jika pengguna bukan Admin
            redirect('auth');
        }
    }

    public function index() {
        // Mengambil data pengguna dari tabel 'user' dan mengurutkannya berdasarkan nama secara ascending
        $this->db->from('user');
        $this->db->order_by('nama', 'ASC');
        $user = $this->db->get()->result_array();

        // Data yang akan dikirimkan ke view
        $data = array(
            'judul_halaman' => 'Data Pengguna', // Judul halaman
            'user'          => $user           // Data pengguna
        );

        // Memuat template admin dan menampilkan halaman data pengguna
        $this->template->load('template_admin', 'admin/user_index', $data);
    }

    public function simpan() {
        // Mengecek apakah username yang diinput sudah digunakan
        $this->db->from('user');
        $this->db->where('username', $this->input->post('username'));
        $cek = $this->db->get()->result_array();

        if ($cek != NULL) {
            // Jika username sudah ada, tampilkan pesan error
            $this->session->set_flashdata('alert', 
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Maaf!</strong> Username Sudah Digunakan
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>'
            );
            redirect('admin/user'); // Redirect ke halaman data pengguna
        }

        // Menyimpan data pengguna baru menggunakan metode simpan pada model User_model
        $this->User_model->simpan();

        // Menampilkan pesan sukses
        $this->session->set_flashdata('alert', 
            '<div class="alert alert-primary alert-dismissible fade show" role="alert">
                <strong>Selamat!</strong> User Berhasil Ditambahkan
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>'
        );
        redirect('admin/user'); // Redirect ke halaman data pengguna
    }

    public function hapus($id) {
        // Menentukan kondisi penghapusan berdasarkan ID pengguna
        $where = array('id_user' => $id);

        // Menghapus data pengguna dari tabel 'user'
        $this->db->delete('user', $where);

        // Menampilkan pesan sukses
        $this->session->set_flashdata('alert', 
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Selamat!</strong> User Berhasil Dihapus
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>'
        );
        redirect('admin/user'); // Redirect ke halaman data pengguna
    }

    public function update() {
        // Memperbarui data pengguna menggunakan metode update pada model User_model
        $this->User_model->update();

        // Menampilkan pesan sukses
        $this->session->set_flashdata('alert', 
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Selamat!</strong> User Berhasil Diperbarui
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>'
        );
        redirect('admin/user'); // Redirect ke halaman data pengguna
    }
}
