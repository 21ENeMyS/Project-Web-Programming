<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow py-2">
  <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="admin.html">
    <img src="<?= base_url(); ?>assets/img/favicon.jpeg" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
    Pupmart
  </a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-t oggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <form action="<?= base_url(); ?>order/cari" method="POST" class="d-flex w-100">
    <input class="form-control form-control-dark  text-dark" type="text" placeholder="Search" aria-label="Search" id="form-control" name="keyword" value="<?= $this->session->userdata('keyword'); ?>" autocomplete="off">
    <a href="<?= base_url('order/reset') ?>" class="btn btn-info btn-sm">
      <i class="fas fa-eraser"></i>
    </a>
  </form>
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="<?= base_url(); ?>logout/">Logout</a>
    </li>
  </ul>
</nav>
<!-- Navbar -->
<div class="container-fluid">
  <div class="row">
    <?php $this->load->view('templates/navbar-side-admin'); ?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Order Detail</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
          </div>
        </div>
      </div>

      <?php $this->load->view('templates/alerts'); ?>

      <div class="table-responsive">
        <div class="card card-list">
          <div class="card-header white d-flex justify-content-between align-items-center text-dark">
            <h5>Order Detail # <?= $order->invoice; ?></h5>
            <div class="pemberitahuan float-right">
              <?php $this->load->view('templates/status', ['status' => $order->status]); ?>
            </div>
          </div>
          <div class="card-body">
            <p>Tanggal: <?= str_replace('-', '/', date("d-m-Y", strtotime($order->date))); ?></p>
            <p>Nama : <?= $order->name; ?></p>
            <p>Telepon : <?= $order->phone; ?></p>
            <p>Alamat : <?= $order->address; ?></p>
            <div class="row">
              <div class="col-md-12">
                <table class="table text-center">
                  <thead>
                    <tr>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                    </tr>
                    <tr>
                      <th scope="col">Produk</th>
                      <th scope="col">Harga</th>
                      <th scope="col">Jumlah</th>
                      <th scope="col">Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($order_detail as $c) : ?>
                      <tr>
                        <td>
                          <img src="https://placehold.co/70x70" alt="">
                          <?= $c->kategori; ?>
                        </td>
                        <td>Rp. <?= number_format($c->harga, 0, ',', '.') ?>,-</td>
                        <td><?= $c->qty; ?></td>
                        <td>Rp. <?= number_format($c->subtotal, 0, ',', '.') ?>,-</td>
                      </tr>
                      <tr>
                        <td class=" font-weight-bold">
                          Total :
                        </td>
                        <td></td>
                        <td></td>
                        <td class=" font-weight-bold">
                          Rp. <?= number_format(array_sum(array_column($order_detail, 'subtotal')), 0, ',', '.') ?>,-
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
                <div class="row">
                  <div class="col-md-12">
                    <div class="card-footer">
                      <form action="<?= base_url(); ?>order/ubah/<?= $order->id ?>" method="POST">
                        <input type="hidden" name="id" value="<?= $order->id; ?>">
                        <div class="input-group mb-3">
                          <select class="form-control text-dark" aria-describedby="button-addon2" name="status">
                            <option value="waiting" <?= $order->status == 'waiting' ? 'selected' : ''; ?>>Menunggu Pembayaran</option>
                            <option value="paid" <?= $order->status == 'paid' ? 'selected' : ''; ?>>Dibayar</option>
                            <option value="delivered" <?= $order->status == 'delivered' ? 'selected' : ''; ?>>Dikirim</option>
                            <option value="cancel" <?= $order->status == 'cancel' ? 'selected' : ''; ?>>batal</option>
                          </select>
                          <div class="input-group-append">
                            <button class="btn btn-md btn-primary m-0 px-3 py-2" type="submit" id="button-addon2">Simpan</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php if (isset($order_confirm)) : ?>
              <div class="row mb-3">
                <div class="col-md-8">
                  <div class="card-header">
                    Bukti Transfer
                  </div>
                  <div class="card-body">
                    <p>No Rekening: <?= $order_confirm->account_number ?></p>
                    <p>Atas Nama: <?= $order_confirm->account_name ?></p>
                    <p>Nominal: Rp. <?= number_format($order_confirm->nominal, 0, ',', '.') ?>,-</p>
                    <p>Catatan: <?= $order_confirm->note ?></p>
                  </div>
                </div>
                <div class="col-md-4">
                  <img src="<?= base_url("/images/confirm/$order_confirm->image") ?>" alt="" height="200">
                </div>
              </div>
            <?php endif ?>
          </div>
        </div>
      </div>
    </main>
  </div>
</div>