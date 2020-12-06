<?php

/**
 * Class Order
 * 
 * @author almarup21 <almarup21@email.com>
 * @package ${NAMESPACE}
 */

defined('BASEPATH') or exit('No direct script access allowed');

class Order extends Pupmart_Controller
{



  public function __construct()
  {
    parent::__construct();
    $role = $this->session->userdata('role');
    if ($role != 'admin') {
      redirect(base_url('/'));
      return;
    }
  }


  public function index($page = null)
  {
    $data['title'] = "Order";
    $data['content'] = $this->order->orderBy('date', 'DESC')->paginate($page)->getAll();
    $data['total_rows'] = $this->order->count();
    $data['pagination'] = $this->order->makePagination(base_url('order'), 2, $data['total_rows']);
    $data['page'] = 'order/index';
    $this->view($data);
  }

  public function cari($page = null)
  {
    if (isset($_POST['keyword'])) {
      $this->session->set_userdata('keyword', $this->input->post('keyword', true));
    } else {
      $this->session->set_flashdata('error', 'Maaf saya tidak menemukan data yang anda cari');
      redirect(base_url('order'));
    }

    $keyword = $this->session->userdata('keyword');
    $data['title']    = 'Order';
    $data['content']  = $this->order->like('invoice', $keyword)->paginate($page)->getAll();
    $data['total_rows']  = $this->order->like('invoice', $keyword)->count();
    $data['pagination']  = $this->order->makePagination(
      base_url('order/cari'),
      3,
      $data['total_rows'],
    );
    $data['page']    = 'order/index';

    $this->view($data);
  }


  public function reset()
  {
    $this->session->unset_userdata('keyword');
    redirect(base_url('order'));
  }


  public function detail($id)
  {
    $data['order']      = $this->order->where('id', $id)->first();
    if (!$data['order']) {
      $this->session->set_flashdata('warning', 'Data tidak ditemukan.');
      redirect(base_url('order'));
    }

    $this->order->table  = 'orders_detail';
    $data['order_detail']  = $this->order->select([
      'orders_detail.id_orders', 'orders_detail.id_produk', 'orders_detail.qty',
      'orders_detail.subtotal', 'produk.kategori', 'produk.image', 'produk.harga'
    ])
      ->join('produk')
      ->where('orders_detail.id_orders', $id)
      ->getAll();

    if ($data['order']->status !== 'waiting') {
      $this->order->table = 'orders_confirm';
      $data['order_confirm']  = $this->order->where('id_orders', $id)->first();
    }

    $data['title'] = 'Detail Order';
    $data['page']      = 'order/detail';

    $this->view($data);
  }

  public function ubah($id)
  {
    if (!$_POST) {
      $this->session->set_flashdata('error', ' Oow! Terjadi kesalahan');
      redirect(base_url("order/detail/$id"));
    }

    if ($this->order->where('id', $id)->update(['status' => $this->input->post('status')])) {
      $this->session->set_flashdata('success', ' Data berhasil diubah');
    } else {
      $this->session->set_flashdata('error', ' Ooww! Data gagal diubah');
    }

    redirect(base_url("order/detail/$id"));
  }
}

/* End of file Order.php */
