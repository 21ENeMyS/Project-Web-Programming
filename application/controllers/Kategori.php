<?php



defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends Pupmart_Controller
{

  /**
   * Class Kategori
   * 
   * @author
   * @package
   */

  public function __construct()
  {
    parent::__construct();
    //Do your magic here
  }


  public function index($page = null)
  {
    $data['title']    = 'Kategori';
    $data['content']  = $this->kategori->paginate($page)->getAll();
    $data['total_rows']  = $this->kategori->count();
    $data['pagination']  = $this->kategori->makePagination(
      base_url('kategori'),
      2,
      $data['total_rows'],
    );
    $data['page']    = 'kategori/index';

    $this->view($data);
  }

  public function tambah()
  {
    /**
     * Apakah Mengakses Method Tambah ini menggunakan
     * Method POST ?
     * Jika tidak menggunakan Method POST maka akan menampilkan kategori form
     * dengan membawa inputan kosong 
     */

    if (!$_POST) {
      $input = (object) $this->kategori->getDefaultValues();
    } else {
      $input = (object) $this->input->post(null, true);
    }

    if (!$this->kategori->validate()) {
      $data = [
        'title' => 'Tambah Kategori',
        'input' => $input,
        'form_action' => base_url('kategori/tambah'),
        'page' => 'kategori/tambah'
      ];

      $this->view($data);
      return;
    }

    if ($this->kategori->create($input)) {
      $this->session->set_flashdata('success', ' Data berhasil ditambahkan');
    } else {
      $this->session->set_flashdata('error', ' Oooow!! Data gagal ditambahkan Coba lagi nanti ya tetap semangat');
    }
    // Jika berhasil ditambahkan akan di pindahkan kehalaman kategori atau ke 
    // halaman utama
    redirect(base_url('kategori'));
  }


  /**
   * Memvalidasi Form Slug dan menambahkan Kategori kedalam 
   * Database 
   * 
   * @author
   * @package
   */

  public function unique_slug()
  {
    $slug = $this->input->post('slug', true);
    $id = $this->input->post('id');
    $kategori = $this->kategori->where('slug', $slug)->first();

    if ($kategori) {
      if ($id == $kategori->id) {
        return true;
      }
      $this->load->library('form_validation');
      $this->form_validation->set_message('unique_slug', '%s Sudah digunakan');
      return false;
    }
    return true;
  }


  /** 
   * Mengubah Data kedalam database melawati form edit
   * 
   * @author
   * @package
   */

  public function ubah($id)
  {
    /**  
     * Apakah suatu data dengan $id yang 
     * kita pilih di dalam tabel tersebut 
     * 
     * @author
     * @package
     * */

    $data['content'] = $this->kategori->where('id', $id)->first();

    /* jika data tidak ditemukan akan diredirect ke halaman kategori
      dan muncul notifikasi dibawah ini
    */

    if (!$data['content']) {
      $this->session->set_flashdata('warning', ' Mohon maaf saya tidak menemukan data yang anda cari');
      redirect(base_url('kategori'));
    }

    /* jika data tersebut di temukan dan apakah data yang anda inputkan berupa 
      method post ?
      jika tidak menggunakan method post akan otomatis menggunakan data $data['content] yang berada diatas atau dari hasil query      
    */

    if (!$_POST) {
      $data['input'] = $data['content'];
    } else {
      $data['input'] = (object) $this->input->post(null, true);
    }

    if (!$this->kategori->validate()) {
      $data = [
        'title' => 'Edit Kategori',
        'form_action' => base_url("kategori/ubah/$id"),
        'page' => 'kategori/tambah'
      ];

      $this->view($data);
      return;
    }

    /* Jika berhasil akan melakukan proses mengubah / update 
      jika berhasil akan di redirectke halaman Kategori dan akan keluar notifikasi
      berhasil
      dan jika tidak akan diredirect ke halaman kategori dan keluar notifikasi 
      error message
    */

    if ($this->kategori->where('id', $id)->update($data['input'])) {
      $this->session->set_flashdata('success', ' Data berhasil diperbaharui');
    } else {
      $this->session->set_flashdata('error', ' Ooow! Data gagal diperbaharui');
    }

    redirect(base_url('kategori'));
  }
}

/* End of file Kategori.php */
