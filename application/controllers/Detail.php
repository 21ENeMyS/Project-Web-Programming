<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Detail extends Pupmart_Controller
{

  public function index()
  {
    $data['title'] = "Detail Produk";
    $data['content'] = $this->detail->select([
      'produk.id',
      'produk.kategori AS produk_kategori',
      'produk.desk AS deskripsi',
      'produk.image AS image',
      'produk.harga AS harga',
      'produk.is_avaiable AS stok',
      'kategori.kategori AS kategori'
    ])->join('kategori')->where('produk.is_avaiable', 1)->getAll();
    $data['page'] = 'detail/index';

    $this->view($data);
  }
}

/* End of file Detail.php */
