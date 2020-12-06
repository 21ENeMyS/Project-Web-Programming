<?php

/**
 * Class Bayar
 * 
 * @author almarup21 <almarup21@email.com>
 * @package ${NAMESPACE}
 */

defined('BASEPATH') or exit('No direct script access allowed');

class Bayar extends Pupmart_Controller
{

  private $id;

  public function __construct()
  {
    parent::__construct();
    $is_login = $this->session->userdata('is_login');
    $this->id  =  $this->session->userdata('id');

    if (!$is_login) {
      redirect(base_url());
      return;
    }
  }


  public function index($input = null)
  {
    $this->bayar->table = 'cart';

    $data['cart']  = $this->bayar->select([
      'cart.id', 'cart.qty', 'cart.subtotal',
      'produk.kategori', 'produk.image', 'produk.harga'
    ])
      ->join('produk')
      ->where('cart.id_user', $this->id)
      ->getAll();

    if (!$data['cart']) {
      $this->session->set_flashdata('warning', 'Tidak ada produk di dalam keranjang.');
      redirect(base_url('/'));
    }

    $data['input']  = $input ? $input : (object) $this->bayar->getDefaultValues();
    $data['title'] = 'Pembayaran';
    $data['page'] = 'bayar/index';

    $this->view($data);
  }

  public function tambah()
  {
    if (!$_POST) {
      redirect(base_url('bayar'));
    } else {
      $input = (object) $this->input->post(null, true);
    }

    if (!$this->bayar->validate()) {
      return $this->index($input);
    }

    $total = $this->db->select_sum('subtotal')->where('id_user', $this->id)->get('cart')->row()->subtotal;

    $data = [
      'id_user' => $this->id,
      'date' => date('Y-m-d'),
      'invoice' => $this->id . date('YmdHis'),
      'total' => $total,
      'name' => $input->name,
      'address' => $input->address,
      'phone' => $input->phone,
      'status' => 'waiting'
    ];

    if ($order = $this->bayar->create($data)) {
      $cart = $this->db->where('id_user', $this->id)->get('cart')->result_array();

      foreach ($cart as $c) {
        $c['id_orders'] = $order;
        unset($c['id'], $c['id_user']);
        $this->db->insert('orders_detail', $c);
      }

      $this->db->delete('cart', ['id_user' => $this->id]);

      $this->session->set_flashdata('success', ' Data berhasil disimpan');
      $data['title'] = 'Bayar berhasil';
      $data['content'] = (object)$data;
      $data['page']  = 'bayar/berhasil';

      $this->view($data);
    } else {
      $this->session->set_flashdata('error', ' Ooww! Data gagal disimpan');
      return $this->index($input);
    }
  }
}

/* End of file Bayar.php */
