  <div class="container my-5">
    <?php $this->load->view('templates/alerts'); ?>

    <!-- Section: Block Content -->
    <section>

      <div class="row">
        <div class="col-md-12">
          <div class="card card-list">
            <div class="card-header white d-flex justify-content-between align-items-center py-3">
              <p class="h5-responsive font-weight-bold mb-0 text-dark">Keranjang Belanja
                <?= ($this->session->userdata('nama')); ?>

              </p>
              <ul class="list-unstyled d-flex align-items-center mb-0">
                <li><i class="far fa-window-minimize fa-sm pl-3"></i></li>
                <li><i class="fas fa-times fa-sm pl-3"></i></li>
              </ul>
            </div>
            <div class="card-body">
              <table class="table text-center text-capitalize">
                <thead>
                  <tr>
                    <th scope="col">Barang</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Total</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($content as $c) : ?>
                    <tr>
                      <td class=" text-uppercase"> <img src="<?= $c->image ? base_url("/images/produk/$c->image") : base_url("/images/produk/default.png"); ?>" alt="" height="30" width="30">
                        <?= $c->kategori; ?></td>
                      <td>Rp.<?= number_format($c->harga, 0, ',', '.') ?>,-</td>
                      <td>
                        <form action="<?= base_url(); ?>cart/ubah/<?= $c->id; ?>" method="POST">
                          <input type="hidden" name="id" value="<?= $c->id; ?>">
                          <div class="input-group">
                            <input type="number" class="form-control text-dark text-center" name="qty" value="<?= $c->qty; ?>">
                            <div class="input-group-append">
                              <button class="btn btn-info" type="submit" id="button-addon2">
                                <i class="fas fa-check"></i>
                              </button>
                            </div>
                          </div>
                        </form>
                      </td>
                      <td><strong>Rp.<?= number_format(array_sum(array_column($content, 'subtotal')), 0, ',', '.') ?>,-</strong></td>
                      <td>
                        <form action="<?= base_url(); ?>cart/hapus/<?= $c->id; ?>" method="POST">
                          <input type="hidden" name="id" value="<?= $c->id; ?>">
                          <button type="submit" class="btn btn-danger" onclick="return confirmm('Apakah anda yakin ingin menghapus <?= $c->kategori ?> ?')">
                            <i class="fas fa-trash-alt">
                            </i>
                          </button>
                        </form>
                      </td>
                    </tr>
                    <tr>
                      <td class="font-weight-bold text-uppercase">Total :</td>
                      <td></td>
                      <td></td>
                      <td><strong class="font-weight-bold">Rp.<?= number_format(array_sum(array_column($content, 'subtotal')), 0, ',', '.') ?>,-</strong></td>
                      <td></td>
                      <td></td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
            <div class="card-footer white py-3 d-flex justify-content-between">
              <a class="btn btn-primary btn-md px-3 my-0 mr-0" href="<?=
                                                                        base_url(); ?>">Kembali Belanja</a>
              <a class="btn btn-success btn-md px-3 my-0 ml-0" href="<?= base_url(); ?>bayar/">Bayar</a>
            </div>
          </div>
        </div>
      </div>

    </section>
    <!-- Section: Block Content -->


  </div>