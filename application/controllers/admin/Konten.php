<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konten extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Redirect ke halaman login jika user belum memiliki sesi 'level'
        if ($this->session->userdata('level') == NULL) {
            redirect('auth');
        }
    }
    public function index() {
        // Mengambil data kategori dari tabel 'kategori' dan mengurutkan berdasarkan 'nama_kategori' secara ascending
        $this->db->from('kategori');
        $this->db->order_by('nama_kategori', 'ASC');
        $kategori = $this->db->get()->result_array();

        // Mengambil data konten dari tabel 'konten' dan mengurutkan berdasarkan 'tanggal' secara descending
        $this->db->from('konten a');
        $this->db->join('kategori b','a.id_kategori=b.id_kategori','left');
        $this->db->join('user c','a.username=c.username','left');
        $this->db->order_by('tanggal', 'DESC');
        $konten = $this->db->get()->result_array();

        // Data yang akan dikirim ke view
        $data = array(
            'judul_halaman' => 'Halaman Konten', 
            'kategori'      => $kategori, // List kategori
            'konten'        => $konten   // List konten
        );

        // Memuat template admin dan menampilkan halaman konten
        $this->template->load('template_admin', 'admin/konten_index', $data);
    }

    public function simpan() {
        $namafoto = date('YmdHis') . '.jpg';
    
        $config['upload_path'] = 'template/upload/konten/';
        $config['max_size'] = 500; // dalam KB
        $config['file_name'] = $namafoto;
        $config['allowed_types'] = 'jpg|jpeg|png'; // Jenis file yang diizinkan
    
        $this->load->library('upload', $config);
    
        // Periksa ukuran file secara manual
        if ($_FILES['foto']['size'] > (500 * 1024)) { // 500 KB
            $this->session->set_flashdata('alert', 
                '<div class="alert alert-danger alert-dismissible" role="alert">
                    Ukuran foto terlalu besar, upload ulang foto dengan ukuran kurang dari 500 KB.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>'
            );
            redirect('admin/konten/' . $this->input->post('kode_produk'));
        }
    
        // Upload file
        if (!$this->upload->do_upload('foto')) {
            $error = $this->upload->display_errors();
            echo "Upload gagal: " . $error;
            die; // Debugging
        } else {
            $data = $this->upload->data();
            echo "Upload berhasil: ";
            print_r($data);
        }
        // Mengecek apakah kategori dengan nama yang sama sudah ada
        $this->db->from('konten');
        $this->db->where('judul', $this->input->post('judul'));
        $cek = $this->db->get()->result_array();

        if ($cek != NULL) {
            // Jika kategori sudah ada, tampilkan pesan error
            $this->session->set_flashdata('alert', 
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Maaf!</strong> Judul Konten Sudah Digunakan !!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>'
            );
            redirect('admin/konten'); // Redirect ke halaman kategori
        }

        // Data baru untuk disimpan
        $data = array(
            'judul' => $this->input->post('judul'),
            'id_kategori' => $this->input->post('id_kategori'),
            'keterangan' => $this->input->post('keterangan'),
            'tanggal' => date('Y-m-d'),
            'foto' => $namafoto,
            'username' => $this->session->userdata('username'),
            'slug' => str_replace(' ', '-',$this->input->post('judul')),
        );

        // Menyimpan data ke tabel 'kategori'
        $this->db->insert('konten', $data);

        // Menampilkan pesan sukses
        $this->session->set_flashdata('alert', 
            '<div class="alert alert-primary alert-dismissible fade show" role="alert">
                <strong>Selamat!</strong> Konten Berhasil Ditambahkan !!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>'
        );
        redirect('admin/konten'); // Redirect ke halaman kategori
    }

    public function hapus($id) {
        $filename=FCPATH.'template/upload/konten/'.$id;
            if(file_exists($filename)){
                unlink("./template/upload/konten/".$id);
            }
        // Data kategori yang akan dihapus berdasarkan ID
        $where = array('foto' => $id);

        // Menghapus data dari tabel 'kategori'
        $this->db->delete('konten', $where);

        // Menampilkan pesan sukses
        $this->session->set_flashdata('alert', 
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Selamat!</strong> Konten Berhasil Dihapus !!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>'
        );
        redirect('admin/konten'); // Redirect ke halaman kategori
    }
    public function update() {
        $namafoto = $this->input->post('nama_foto');
        $config['upload_path'] = 'template/upload/konten/';
        $config['max_size'] = 500; // dalam KB
        $config['file_name'] = $namafoto;
        $config['overwrite'] = true;
        $config['allowed_types'] = '*'; // Jenis file yang diizinkan
    
        $this->load->library('upload', $config);
    
        // Periksa ukuran file secara manual
        if ($_FILES['foto']['size'] > (500 * 1024)) { // 500 KB
            $this->session->set_flashdata('alert', 
                '<div class="alert alert-danger alert-dismissible" role="alert">
                    Ukuran foto terlalu besar, upload ulang foto dengan ukuran kurang dari 500 KB.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>'
            );
            redirect('admin/konten');
        }
    
        // Upload file
        if (!$this->upload->do_upload('foto')) {
            $error = $this->upload->display_errors();
            echo "Upload gagal: " . $error;
        }
    
        $data = $this->upload->data();
        echo "Upload berhasil: ";
        print_r($data);

    
        // Data baru untuk disimpan
        $data = array(
            'judul' => $this->input->post('judul'),
            'id_kategori' => $this->input->post('id_kategori'),
            'keterangan' => $this->input->post('keterangan'),
            'slug' => str_replace(' ', '-',$this->input->post('judul')),
        );
        $where = array(
            'foto' => $this->input->post('nama_foto')
        );
        // Menyimpan data ke tabel 'kategori'
        $this->db->update('konten', $data, $where);
    
        // Menampilkan pesan sukses
        $this->session->set_flashdata('alert', 
            '<div class="alert alert-primary alert-dismissible fade show" role="alert">
                <strong>Selamat!</strong> Konten Berhasil Diperbarui !!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>'
        );
        redirect('admin/konten'); // Redirect ke halaman kategori
    }
}    