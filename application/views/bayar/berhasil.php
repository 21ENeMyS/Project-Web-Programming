  <!-- Section -->
  <section class="bayar mt-5">
    <!-- Container -->
    <div class="container">
      <?php $this->load->view('templates/alerts') ?>
      <h1 class="text-uppercase">informasi pembayaran</h1>
      <p>Termikasih telah melakukan pesanan produk di Pupmart.com Kode Transaksi anda adalah <span class="font-weight-bold"><?= $content->invoice; ?></span></p>
      <p>Silahkan Transfer total sebesar <strong>Rp.<?= number_format($content->total, 0, ',', '.') ?> ,-</strong> ke salah satu rekening Pupmart
        berikut ini:</p>
      <!-- Row -->
      <div class="row mt-4">
        <!-- Grid column -->
        <div class="col-md-6">
          <!-- BCA -->
          <div class="bca">
            <img src="<?= base_url(); ?>assets/img/bca.png" alt="" class="img-fluid w-50">
            <h5>Bank BCA</h5>
            <p>Nomer Rekening : 176.300.7573</p>
            <p>Atas nama : Corporation Pupmart TBK</p>
          </div>

        </div>
        <!-- Grid column -->
        <!-- Grid column -->
        <div class=" col-md-6">
          <h1>Butuh Bantuan ?</h1>
          <div class="cs">
            <img src="" alt="" class="img-fluid w-50">
            <p>Customer support kami siap membantu anda.Silahkan hubungi kami</p>
            <p>Email : pupmart@gmail.com </p>
            <p>Telepon : (022)522 5766</p>
            <p>SMS : (0878) 258 44366</p>
          </div>
          <div class="statification">
            <img src="" alt="" class="img-fluid w-50">
            <p>100% Satisfation guanratee !
              Jika anda tidak puas dengan kualitas barang yang dikirim,akan kami ganti dengan yang baru,atau uang anda
              kembali 100%</p>
          </div>
        </div>
        <!-- Grid column -->
      </div>
      <!-- Row -->
      <!-- Row -->
      <div class="row">
        <!-- Grid column -->
        <div class="col-md-6">
          <div class="mandiri">
            <img src="<?= base_url(); ?>assets/img/Mandiri.png" alt="" class="img-fluid w-50">
            <h5 class="mt-5">Mandiri</h5>
            <p>Nomer Rekening : 040701.000581.303</p>
            <p>Atas nama : Corporation Pupmart TBK</p>
          </div>

          <div class="bri">
            <img src="<?= base_url(); ?>assets/img/BRI.png" alt="" class="img-fluid w-50">
            <h5>Bank BRI</h5>
            <p>Nomer Rekening : 038.025.0423</p>
            <p>Atas nama : Corporation Pupmart TBK</p>
          </div>

          <div class="bni">
            <img src="<?= base_url(); ?>assets/img/BNI.png" alt="" class="img-fluid w-50">
            <h5>Bank BNI</h5>
            <p>Nomer Rekening : 13000.799.79905</p>
            <p>Atas nama : Corporation Pupmart TBK</p>
          </div>

          <div class="alfa">
            <img src="<?= base_url(); ?>assets/img/Alfamart-logo.png" alt="" class="img-fluid w-50 mt-3">
            <h5 class="mt-5">Alfamart</h5>
            <p>Nomer Rekening : 104300020202</p>
            <p>Atas nama : Corporation Pupmart TBK</p>
          </div>

          <div class="indo">
            <img src="<?= base_url(); ?>assets/img/indomaret.png" alt="" class="img-fluid mt-5">
            <h5>Indomaret</h5>
            <p>Nomer Rekening : 104300020202</p>
            <p>Atas nama : Corporation Pupmart TBK</p>
          </div>
        </div>
        <!-- Grid column -->
        <!-- Grid column -->
        <div class="col-md-6"></div>
        <!-- Grid column -->
      </div>
      <!-- Row -->
      <div class="angker mt-5 mb-5">
        <a href="<?= base_url(); ?>" class="btn btn-success">Back</a>
        <a href="<?= base_url(); ?>myorder/detail/<?= $content->invoice; ?>" class="btn btn-primary float-right">Kirim Bukti Pembayaran</a>
      </div>
    </div>
    <!-- Container -->
  </section>
  <!-- Section -->