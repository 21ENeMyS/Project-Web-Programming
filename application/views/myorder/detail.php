<div class="container mt-5">
  <?php $this->load->view('templates/alerts'); ?>
  <h1>Orders Detail</h1>
  <div class="row mt-5">
    <?php $this->load->view('templates/menu'); ?>
    <div class="col-md-8">
      <div class="card text-dark">
        <div class="card-header">
          Order Details <span class="font-weight-bold">#<?= $order->invoice;  ?></span>
          <div class="float-right">
            <?php $this->load->view('templates/status', ['status' => $order->status]); ?>
          </div>
        </div>
        <div class="card-body" style="color: black;">
          <p class="float-right">Tanggal : <?= str_replace('-', '/', date('d-m-Y', strtotime($order->date))); ?></p>
          <h6>Nama : <?= $order->name ?></h6>
          <h6>Telephone : <?= $order->phone; ?></h6>
          <h6>Alamat : <?= $order->address; ?></h6>
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
                  <td class="text-uppercase">
                    <img src="<?= $c->image ? base_url("/images/product/$c->image") : base_url('/images/product/default.png') ?>" alt="" height="50">
                    <?= $c->kategori; ?>
                  </td>
                  <td>Rp. <?= number_format($c->harga, 0, ',', '.'); ?>,-</td>
                  <td><?= $c->qty; ?></td>
                  <td>Rp. <?= number_format($c->subtotal, 0, ',', '.') ?>,-</td>
                </tr>
                <tr>
                  <td class="text-uppercase font-weight-bold">Total :</td>
                  <td></td>
                  <td></td>
                  <td class="font-weight-bold">Rp. <?= number_format(array_sum(array_column($order_detail, 'subtotal')), 0, ',', '.') ?>,-</td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        <?php if ($order->status == 'waiting') : ?>
          <div class="card-footer">
            <a href="<?= base_url(); ?>myorder/confirm/<?= $order->invoice; ?>" class="btn btn-success">Konfirmasi Pembayaran</a>
          </div>
        <?php endif; ?>
      </div>

      <?php if (isset($order_confirm)) : ?>
        <div class="row">
          <div class="col-md-12">
            <div class="card text-dark">
              <div class="card-header">
                <h5>Bukti Transfer</h5>
              </div>
              <div class="card-body">
                <div class="float-right">
                  <img src="<?= base_url("/images/confirm/$order_confirm->image"); ?>" alt="" height="200">

                </div>
                <p>Dari Rekening : <?= $order_confirm->account_number; ?></p>
                <p>Atas Nama : <?= $order_confirm->account_name; ?></p>
                <p>Nominal : Rp. <?= number_format($order_confirm->nominal, 0, ',', '.') ?>,-</p>
                <p>Catatan : <?= $order_confirm->note; ?></p>
              </div>
            </div>
          </div>

        </div>

      <?php endif; ?>
    </div>
  </div>
</div>