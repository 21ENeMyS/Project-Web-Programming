  <div class="container mt-5">
    <h1>Daftar Orders</h1>
    <div class="row mt-5">
      <?php $this->load->view('templates/menu'); ?>
      <div class="col-md-8">
        <table class="table text-white text-center">
          <thead>
            <tr>
              <th scope="col">Nomer</th>
              <th scope="col">Tanggal</th>
              <th scope="col">Total</th>
              <th scope="col">Status</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($content as $c) : ?>
              <tr>
                <td><a href="<?= base_url(); ?>myorder/detail/<?= $c->invoice; ?>" class="text-white">#<?= $c->invoice; ?></a></td>
                <td><?= str_replace('-', '/', date('d-m-Y', strtotime($c->date))); ?></td>
                <td>Rp. <?= number_format($c->total, 0, ',', '.'); ?></td>
                <td><?php $this->load->view('templates/status', ['status' => $c->status]); ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>

      </div>
    </div>
  </div>