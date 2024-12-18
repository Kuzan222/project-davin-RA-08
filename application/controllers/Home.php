<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function __construct(){
        parent::__construct();
    }
	public function index(){
        $this->db->from('konfigurasi');
        $konfig = $this->db->get()->row();

        $this->db->from('caraousel');
        $caraousel =  $this->db->get()->result_array();

        $this->db->from('konten');
        $konten = $this->db->get()->result_array();

        $this->db->from('kategori');
        $kategori =  $this->db->get()->result_array();
        
        $this->db->from('konten a');
        $this->db->join('kategori b','a.id_kategori=b.id_kategori','left');
        $this->db->join('user c','a.username=c.username','left');
        $this->db->order_by('tanggal', 'DESC');
        $konten = $this->db->get()->result_array();
        $data = array(
            'judul' => "Tawangmangu Journey",
            'konfig' => $konfig,
            'kategori' => $kategori,
            'caraousel' => $caraousel,
            'konten' => $konten,
        );
		$this->load->view('beranda',$data);
    }
    public function kategori($id){
        $this->db->from('konfigurasi');
        $konfig = $this->db->get()->row();

        $this->db->from('kategori');
        $kategori =  $this->db->get()->result_array();

        $this->db->from('konten a');
        $this->db->join('kategori b','a.id_kategori=b.id_kategori','left');
        $this->db->join('user c','a.username=c.username','left');
        $this->db->where('a.id_kategori',$id);
        $konten = $this->db->get()->result_array();

        $this->db->from('kategori');
        $this->db->where('id_kategori',$id);
        $nama_kategori =  $this->db->get()->row()->nama_kategori;
        $data = array(
            'judul' => $nama_kategori." | Herdiansa",
            'nama_kategori' => $nama_kategori,
            'konfig' => $konfig,
            'kategori' => $kategori,
            'konten' => $konten,
        );
		$this->load->view('kategori',$data);
    }
    public function artikel($id){
        $this->db->from('konfigurasi');
        $konfig = $this->db->get()->row();

        $this->db->from('kategori');
        $kategori =  $this->db->get()->result_array();

        $this->db->from('konten a');

        $this->db->join('kategori b','a.id_kategori=b.id_kategori','left');
        $this->db->join('user c','a.username=c.username','left');

        $this->db->where('slug',$id);
        $konten = $this->db->get()->row();
        $data = array(
            'judul' => " Details | ".$konten->judul,
            'konfig' => $konfig,
            'kategori' => $kategori,
            'konten' => $konten,
        );
		$this->load->view('detail',$data);
    }
    public function blog(){
		$this->db->from('konfigurasi');
		$konfig = $this->db->get()->row();

		$this->db->from('kategori');
		$kategori = $this->db->get()->result_array();

		$this->db->order_by('tanggal', 'DESC');
        $this->db->from('konten a');

		$this->db->join('kategori b', 'a.id_kategori=b.id_kategori','left');
		$this->db->join('user c', 'a.username=c.username','left');

        $konten = $this->db->get()->result_array();
		$data = array(
			'judul_blog'		=> "Konten | Lengkap",
			'konfig'	=> $konfig,
			'kategori'	=> $kategori,
			'konten'	=> $konten
		);
		$this->load->view('blog',$data);
    }
    
    public function galeri(){
        $this->db->from('konfigurasi');
        $konfig = $this->db->get()->row();

        $this->db->from('kategori');
        $kategori = $this->db->get()->result_array();

        $this->db->from('galeri');
        $galeri = $this->db->get()->result_array();

		$this->db->from('caraousel');
		$caraousel = $this->db->get()->result_array();

        $data = array(
			'title'   => 'Halaman Galeri',
            'judul' => "galeri | foods",
            'konfig' => $konfig,
            'kategori' => $kategori,
            'galeri' => $galeri,
			'caraousel'	=> $caraousel
        );  
        $this->load->view('galeri',$data);
	}
}