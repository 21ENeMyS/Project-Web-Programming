  <div class="container mt-5">
    <h1>Konfirmasi Order</h1>
    <div class="row mt-5">
      <?php $this->load->view('templates/menu'); ?>
      <div class="col-md-8">
        <div class="card">
          <div class="card-header text-dark">
            <h5 class="float-left">
              Transaksi
              <span class="font-weight-bold">#<?= $order->invoice; ?></span>
            </h5>
            <div class="float-right">

              <?php $this->load->view('templates/status', ['status' => $order->status]); ?>
            </div>
          </div>
          <div class="card-body text-dark">
            <?= form_open_multipart($form_action, ['method' => 'POST']); ?>
            <input type="hidden" name="id_orders" value="<?= $order->id; ?>">
            <div class="form-group mt-2">
              <label for="transaksi" class="text-dark">Transaksi</label>
              <input type="text" class="form-control text-dark" readonly value="<?= $order->invoice; ?>">
            </div>

            <div class="form-group mt-2">
              <label for="rekening" class="text-dark">Nama</label>
              <input type="text" class="form-control text-dark" id="rekening" name="account_name" value="<?= $input->account_name; ?>">
            </div>
            <?= form_error('account_name'); ?>

            <div class="form-group mt-2">
              <label for="rekening" class="text-dark">No. Rekening</label>
              <input type="text" class="form-control text-dark" id="rekening" name="account_number" value="<?= $input->account_number; ?>" autocomplete="off">
            </div>
            <?= form_error('account_number'); ?>


            <div class="form-group mt-2">
              <label for="total" class="text-dark">Sebesar</label>
              <input type="text" class="form-control text-dark" id="total" name="nominal" readonly value="<?= $order->total; ?>">
            </div>
            <?= form_error('nominal'); ?>

            <div class="form-group  mt-2">
              <label for="catatan" class="text-dark">Catatan</label>
              <textarea type="text" class="form-control text-dark" id="catatan" name="note" autocomplete="off">-</textarea>
            </div>

            <div class="form-group md-form w-50">
              <h5 class="mb-3">Kirim Bukti Transfer</h5>
              <div class="file-field">
                <div class="z-depth-1-half mb-4">
                </div>
                <input type="file" name="image" class="form-control-file">
                <?php if ($this->session->flashdata('image_error')) : ?>
                  <small class="form-text text-danger"><?= $this->session->flashdata('image_error') ?></small>
                <?php endif; ?>
              </div>
            </div>

            <button type="submit" class="btn btn-success float-right">Konfirmasi</button>
            <?= form_close(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>