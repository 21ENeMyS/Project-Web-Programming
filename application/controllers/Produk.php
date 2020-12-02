<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends Pupmart_Controller
{

  /**
   * Class Produk
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
    $data['title'] = 'Admin Produk';
    $data['content'] = $this->produk->select([
      'produk.id',
      'produk.kategori AS produk_kategori',
      'produk.image AS image',
      'produk.harga AS harga',
      'produk.is_avaiable AS stok',
      'kategori.kategori AS kategori'
    ])->join('kategori')->paginate($page)->getAll();

    $data['total_rows'] = $this->produk->count();
    $data['pagination'] = $this->produk->makePagination(
      base_url('produk'),
      2,
      $data['total_rows']
    );
    $data['page'] = 'produk/index';
    $this->view($data);
  }


  public function tambah()
  {
    if (!$_POST) {
      $input = (object) $this->produk->getDefaultValues();
    } else {
      $input = (object) $this->input->post(null, true);
    }

    if (!empty($_FILES) && $_FILES['image']['name'] !== '') {
      $imageName  = url_title($input->kategori, '-', true) . '-' . date('YmdHis');
      $upload    = $this->produk->uploadImage('image', $imageName);
      if ($upload) {
        $input->image  = $upload['file_name'];
      } else {
        redirect(base_url('produk/tambah'));
      }
    }

    if (!$this->produk->validate()) {
      $data['title']      = 'Tambah Produk';
      $data['input']      = $input;
      $data['form_action']  = base_url('produk/tambah');
      $data['page']      = 'produk/tambah';
      $data['tombol'] = 'tambahkan';

      $this->view($data);
      return;
    }


    if ($this->produk->create($input)) {
      $this->session->set_flashdata('success', ' Data berhasil ditambahkan');
    } else {
      $this->session->set_flashdata('error', ' Oooow!! Data gagal ditambahkan Coba lagi nanti ya tetap semangat');
    }

    redirect('produk');
  }

  public function ubah($id)
  {
    $data['content'] = $this->produk->where('id', $id)->first();

    if (!$data['content']) {
      $this->session->set_flashdata('warning', ' Mohon maaf saya tidak menemukan data yang anda cari');
      redirect(base_url('produk'));
    }

    if (!$_POST) {
      $data['input'] = $data['content'];
    } else {
      $data['input'] = (object) $this->input->post(null, true);
    }

    if (!empty($_FILES) && $_FILES['image']['name'] !== '') {
      $imageName  = url_title($data['input']->kategori, '-', true) . '-' . date('YmdHis');
      $upload    = $this->produk->uploadImage('image', $imageName);
      if ($upload) {
        if ($data['content']->image !== '') {
          $this->produk->deleteImage($data['content']->image);
        }
        $data['input']->image = $upload['fileName'];
      } else {
        redirect(base_url("produk/ubah/$id"));
      }
    }

    if (!$this->produk->validate()) {
      $data['title'] = "Ubah produk";
      $data['form_action'] = base_url("produk/ubah/$id");
      $data['page'] = 'produk/tambah';
      $data['tombol'] = 'simpan';

      $this->view($data);
      return;
    }

    if ($this->produk->where('id', $id)->update($data['input'])) {
      $this->session->set_flashdata('success', 'Data berhasil diperbaharui');
    } else {
      $this->session->set_flashdata('error', 'Ooow! Data gagal diperbaharui');
    }
    redirect(base_url('produk'));
  }

  public function hapus($id)
  {
    if (!$_POST) {
      redirect(base_url('produk'));
    }

    $produk = $this->produk->where('id', $id)->first();

    if (!$produk) {
      $this->session->set_flashdata('warning', ' Mohon maaf saya tidak menemukan data yang anda cari');
      redirect(base_url('produk'));
    }

    if ($this->produk->where('id', $id)->delete()) {
      $this->produk->deleteImage($produk->image);
      $this->session->set_flashdata('success', ' Data sudah berhasil dihapus!');
    } else {
      $this->session->set_flashdata('error', ' Oow! Terjadi suatu kesalahan!');
    }
    redirect(base_url('produk'));
  }

  public function unique_slug()
  {
    $slug = $this->input->post('slug', true);
    $id = $this->input->post('id');
    $produk = $this->produk->where('slug', $slug)->first();

    if ($produk) {
      if ($id  == $produk->id) {
        return true;
      }
      $this->load->library('form_validation');
      $this->form_validation->set_message('unique_slug', '%s slug sudah digunakan');
      return false;
    }
    return true;
  }

  public function cari($page = null)
  {
    if (isset($_POST['keyword'])) {
      $this->session->set_userdata('keyword', $this->input->post('keyword', true));
    } else {
      $this->session->set_flashdata('error', 'Maaf saya tidak menemukan data yang anda cari');
      redirect(base_url('kategori'));
    }

    $keyword = $this->session->userdata('keyword');
    $data['title']    = 'Admin Produk';
    $data['content'] = $this->produk->select([
      'produk.id',
      'produk.kategori AS produk_kategori',
      'produk.image AS image',
      'produk.harga AS harga',
      'produk.is_avaiable AS stok',
      'kategori.kategori AS kategori'
    ])->join('kategori')->like('produk.kategori', $keyword)->orLike('desk', $keyword)->paginate($page)->getAll();

    $data['total_rows']  = $this->produk->like('produk.kategori', $keyword)->orLike('desk', $keyword)->count();
    $data['pagination']  = $this->produk->makePagination(
      base_url('produk/cari'),
      3,
      $data['total_rows'],
    );
    $data['page']    = 'produk/index';

    $this->view($data);
  }


  public function reset()
  {
    $this->session->unset_userdata('keyword');
    redirect(base_url('produk'));
  }
}

/* End of file Produk.php */
