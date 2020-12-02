  <div class="container mt-5">
    <!-- Row -->
    <div class="row">
      <!-- Grid column -->
      <div class="col-md-12">
        <!-- Card -->
        <div class="card">
          <!-- Card Header -->
          <div class="card-header text-dark">
            <h5>Tambah Produk</h5>
          </div>
          <!-- Card Header -->
          <!-- Card Body -->
          <div class="card-body">
            <!-- Form -->
            <form action="<?= $form_action; ?>" method="POST" class="text-dark">
              <?php isset($input->id) ? form_hidden('id', $input->id) : '' ?>
              <!-- Input -->
              <div class="form-group">
                <label for="nama">Produk</label>
                <input type="text" class="form-control" id="kategori" aria-describedby="namaHelp" autofocus onkeyup="CreateSlug();" name="kategori" value="<?= $input->kategori; ?>" autocomplete="off">
                <?= form_error('kategori'); ?>
              </div>
              <!-- Input -->

              <!-- Input -->
              <div class="form-group">
                <label for="harga">Harga</label>
                <input type="text" class="form-control" id="harga" aria-describedby="hargaHelp" autofocus autocomplete="off" name="harga" value="<?= $input->harga; ?>">
                <?= form_error('harga'); ?>
              </div>

              <!-- Input -->
              <div class="form-group">
                <label for="desk">Deskripsi</label>
                <?= form_textarea(['name' => 'desk', 'value' => $input->desk, 'row' => 4, 'class' => 'form-control']) ?>
                <?= form_error('desk') ?>
              </div>
              <!-- Input -->



              <!-- Input -->
              <div class="form-group">
                <label for="kategori">Kategori</label>
                <?= form_dropdown('id_kategori', getDropdownList('kategori', ['id', 'kategori']), $input->id_kategori, ['class' => 'form-control']); ?>
                <?= form_error('id_kategori'); ?>
              </div>
              <!-- Input -->

              <!-- Radio button -->
              <div class="radio-button mt-3">
                <h5>Stock</h5>
                <br>
                <div class="form-check form-check-inline">
                  <?= form_radio(['name' => 'is_avaiable', 'value' => 1, 'checked' => $input->is_avaiable == 1 ? true : false, 'form-check-input']) ?>
                  <label for="" class="form-check-label"> Tersedia</label>
                </div>
                <div class="form-check form-check-inline">
                  <?= form_radio(['name' => 'is_avaiable', 'value' => 0, 'checked' => $input->is_avaiable == 0 ? true : false, 'form-check-input']) ?>
                  <label for="" class="form-check-label"> Kosong</label>
                </div>
              </div>

              <!-- Input -->
              <div class="form-group mt-4">
                <label for="slug">Slug</label>
                <input type="text" class="form-control" id="slug" aria-describedby="emailHelp" readonly autocomplete="off" name="slug" value="<?= $input->slug; ?>">
                <?= form_error('slug'); ?>
              </div>

              <div class="form-group md-form w-25">
                <div class="file-field">
                  <div class="z-depth-1-half mb-4">
                    <img src="<?= $input->image ? base_url("images/produk/$input->image") : base_url("images/produk/default.png") ?>" class="img-fluid" alt="example placeholder">
                  </div>
                  <?= form_upload('image'); ?>
                  <?php if ($this->session->flashdata('image_error')) : ?>
                    <small class="form-text text-danger"><?= $this->session->flashdata('image_error') ?></small>
                  <?php endif; ?>

                </div>
              </div>

              <!-- Radio button -->
              <button type="submit" class="btn btn-primary float-right mt-4"><?= $tombol; ?></button>
            </form>
            <!-- Form -->
          </div>
          <!-- Card Body -->
        </div>
        <!-- Card -->
      </div>
      <!-- Grid column -->
    </div>
    <!-- Row -->
  </div>