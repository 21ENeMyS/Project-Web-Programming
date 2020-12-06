  <!-- Form -->
  <section class="form mt-5">
    <!-- Container -->
    <div class="container">
      <!-- Form -->
      <form action="<?= base_url(); ?>bayar/tambah/" method="POST">
        <!-- row -->
        <div class="row align-items-center">
          <!-- Grid column -->
          <div class="col-md-8">
            <!-- Nama -->
            <div class="md-form">
              <input type="text" id="inputMDEx" class="form-control" name="name" value="<?= $input->name; ?>">
              <label for="inputMDEx">Nama</label>
              <?= form_error('name'); ?>
            </div>

            <!-- Nomer Telepon -->
            <div class="md-form">
              <input type="text" id="inputMDEx" class="form-control" name="phone" value="<?= $input->phone; ?>">
              <label for="inputMDEx">Telepon</label>
              <?= form_error('phone'); ?>
            </div>

            <!-- Alamat -->
            <div class="md-form form-group white-textarea active-white-textarea ">
              <textarea id="form7" class="md-textarea form-control" rows="3" name="address" value="<?= $input->address; ?>"></textarea>
              <label for="form7">Alamat</label>
              <?= form_error('address'); ?>
            </div>
          </div>
          <!-- Grid column -->
          <!-- Row -->
          <!-- Grid column -->
          <div class="col-md-4">
            <!-- Nama Produk -->
            <?php foreach ($cart as $c) : ?>
              <div class="md-form mt-4 text-center">
                <input type="text" id="inputMDEx" class="form-control mt-4" value="<?= $c->kategori; ?>" readonly name="kategori">
                <label for="inputMDEx">Produk</label>
              </div>
              <!-- Harga -->
              <div class="md-form mt-4 text-center">
                <input type="text" id="inputMDEx" class="form-control mt-4" readonly value="Rp.<?= number_format($c->harga, 0, ',', '.') ?>,-" name="harga">
                <label for="inputMDEx">Harga</label>
              </div>
              <!-- Jumlah -->
              <div class="md-form mt-4 text-center">
                <input type="text" id="inputMDEx" class="form-control mt-4" value="<?= $c->qty ?>" name="qty" readonly>
                <label for="inputMDEx">Jumlah Produk</label>
              </div>
              <!-- Total -->
              <div class="md-form mt-4 text-center">
                <input type="text" id="inputMDEx" class="form-control mt-4" readonly value="Rp.<?= number_format(array_sum(array_column($cart, 'subtotal')), 0, ',', '.') ?>,-" name="subtotal">
                <label for="inputMDEx">Total</label>
              </div>
            <?php endforeach; ?>
          </div>
          <!-- Grid column -->
        </div>
        <!-- row -->
        <button class="btn btn-success float-right" type="submit">Simpan</button>
      </form>
    </div>
    <!-- Container -->
  </section>
  <!-- end Form -->