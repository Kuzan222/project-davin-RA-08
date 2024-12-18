<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        // Redirect ke halaman login jika level user tidak ada di session
        if ($this->session->userdata('level') == NULL) {
            redirect('auth');
        }
    }

    public function index() {
        // Mengambil data kategori dari database
        $this->db->from('kategori');
        $this->db->order_by('nama_kategori', 'ASC');
        $kategori = $this->db->get()->result_array();

        // Mengirim data ke view
        $data = array(
            'judul_halaman' => 'Kategori Konten', 
            'kategori'      => $kategori
        );

        // Memuat template dan halaman kategori
        $this->template->load('template_admin', 'admin/kategori_index', $data);
    }

    public function simpan() {
        // Mengecek apakah nama kategori sudah ada di database
        $this->db->from('kategori');
        $this->db->where('nama_kategori', $this->input->post('nama_kategori'));
        $cek = $this->db->get()->result_array();

        if ($cek != NULL) {
            // Menampilkan pesan error jika nama kategori sudah digunakan
            $this->session->set_flashdata('alert', 
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Maaf!</strong> Kategori Konten Sudah Digunakan !!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>'
            );
            redirect('admin/kategori');
        }

        // Menyimpan kategori baru ke database
        $data = array(
            'nama_kategori' => $this->input->post('nama_kategori')
        );
        $this->db->insert('kategori', $data);

        // Menampilkan pesan sukses
        $this->session->set_flashdata('alert', 
            '<div class="alert alert-primary alert-dismissible fade show" role="alert">
                <strong>Selamat!</strong> Kategori Berhasil Ditambahkan !!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>'
        );
        redirect('admin/kategori');
    }

    public function hapus($id) {
        // Menghapus kategori berdasarkan ID
        $where = array('id_kategori' => $id);
        $this->db->delete('kategori', $where);

        // Menampilkan pesan sukses
        $this->session->set_flashdata('alert', 
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Selamat!</strong> Kategori Berhasil Dihapus !!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>'
        );
        redirect('admin/kategori');
    }

    public function update() {
        // Mendapatkan data dari form
        $where = array('id_kategori' => $this->input->post('id_kategori'));
        $data = array('nama_kategori' => $this->input->post('nama_kategori'));

        // Memperbarui data kategori di database
        $this->db->update('kategori', $data, $where);

        // Menampilkan pesan sukses
        $this->session->set_flashdata('alert', 
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Selamat!</strong> Kategori Berhasil Diperbarui !!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>'
        );
        redirect('admin/kategori');
    }
}
