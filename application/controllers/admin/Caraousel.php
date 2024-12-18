<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Caraousel extends CI_Controller {

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
    
        // Mengambil data dari tabel 'caraousel' dan melakukan join dengan tabel 'kategori'
        $this->db->select('d.*, b.nama_kategori'); // Ambil semua kolom dari caraousel dan nama_kategori dari kategori
        $this->db->from('caraousel d');
        $this->db->join('kategori b', 'd.id_kategori = b.id_kategori', 'left');
        $caraousel = $this->db->get()->result_array();
    
        // Debugging: Tampilkan hasil query
        // print_r($caraousel); // Uncomment untuk debugging
    
        $data = array(
            'judul_halaman' => 'Halaman Caraousel',
            'kategori'      => $kategori,
            'caraousel'     => $caraousel
        );
    
        // Memuat template admin dan menampilkan halaman konten
        $this->template->load('template_admin', 'admin/caraousel_index', $data);
    }

    public function simpan() {
        $namafoto = date('YmdHis') . '.jpg';
        $config['upload_path'] = 'template/upload/caraousel/';
        $config['max_size'] = '*'; // dalam KB
        $config['file_name'] = $namafoto;
        $config['allowed_types'] = 'jpg|jpeg|png'; // Jenis file yang diizinkan
    
        $this->load->library('upload', $config);
    
        // Periksa ukuran file secara manual
        if (!$this->upload->do_upload('foto')) {
            $error = array('error'=>$this->upload->display_errors());
        } else {
            $data = array('upload_data' => $this->upload->data());
        }
        $data = array(
            'judul' => $this->input->post('judul'),
            'id_kategori' => $this->input->post('id_kategori'),
            'keterangan' => $this->input->post('keterangan'),
            'foto' => $namafoto,

        );

        // Menyimpan data ke tabel 'kategori'
        $this->db->insert('caraousel', $data);

        // Menampilkan pesan sukses
        $this->session->set_flashdata('alert', 
            '<div class="alert alert-primary alert-dismissible fade show" role="alert">
                <strong>Selamat!</strong> Caraousel Berhasil Ditambahkan !!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>'
        );
        redirect('admin/caraousel'); // Redirect ke halaman kategori
    }

    public function hapus($id) {
        $filename=FCPATH.'template/upload/caraousel/'.$id;
            if(file_exists($filename)){
                unlink("./template/upload/caraousel/".$id);
            }
        // Data kategori yang akan dihapus berdasarkan ID
        $where = array('foto' => $id);

        // Menghapus data dari tabel 'kategori'
        $this->db->delete('caraousel', $where);

        // Menampilkan pesan sukses
        $this->session->set_flashdata('alert', 
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Selamat!</strong> Caraousel Berhasil Dihapus !!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>'
        );
        redirect('admin/caraousel'); // Redirect ke halaman kategori
    }
}
  