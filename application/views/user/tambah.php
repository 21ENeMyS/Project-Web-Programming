  <!-- Container -->
  <div class="container ">
    <!-- Row -->
    <div class="row">
      <!-- Grid column -->
      <div class="col-md-12">
        <!-- Card -->
        <div class="card">
          <!-- Card Header -->
          <div class="card-header text-dark">
            <h5>Tambah Pengguna</h5>
          </div>
          <!-- Card Header -->
          <!-- Card Body -->
          <div class="card-body">
            <!-- Form -->
            <form action="<?= $form_action; ?>" method="POST" class="text-dark">
              <!-- Input -->
              <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" aria-describedby="emailHelp" name="nama" value="<?= $input->nama; ?>" autocomplete="off">
                <?= form_error('nama'); ?>
              </div>
              <!-- Input -->

              <!-- Input -->
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" autocomplete="off" name="email" value="<?= $input->email; ?>">
                <?= form_error('email'); ?>
              </div>
              <!-- Input -->

              <!-- Input -->
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" aria-describedby="passwordHelp" autocomplete="off" name="password">
                <?= form_error('password'); ?>
              </div>
              <!-- Input -->

              <!-- Input -->
              <div class="form-group">
                <label for="">Role</label>
                <br>
                <div class="form-check form-check-inline">
                  <?= form_radio(['name' => 'role', 'value' => 'admin', 'checked' => $input->role == 'admin' ? true : false, 'form-check-input']); ?>
                  <label for="" class="form-check-label text-dark"> Admin</label>
                </div>
                <div class="form-check form-check-inline">
                  <?= form_radio(['name' => 'role', 'value' => 'member', 'checked' =>  $input->role == 'member' ? true : false, 'form-check-input']); ?>
                  <label for="" class="form-check-label text-dark"> Member</label>
                </div>
              </div>
              <!-- Input -->

              <!-- Radio button -->
              <div class="radio-button mt-3">
                <h5>Status</h5>
                <br>
                <div class="form-check form-check-inline">
                  <?= form_radio(['name' => 'is_active', 'value' => 1, 'checked' => $input->is_active == 1 ? true : false, 'form-check-input']) ?>
                  <label for="" class="form-check-label"> Aktif</label>
                </div>
                <div class="form-check form-check-inline">
                  <?= form_radio(['name' => 'is_active', 'value' => 0, 'checked' => $input->is_active == 0 ? true : false, 'form-check-input']) ?>
                  <label for="" class="form-check-label"> Non-Aktif</label>
                </div>
              </div>
              <!-- Radio button -->

              <div class="form-group md-form w-25">
                <div class="file-field">
                  <div class="z-depth-1-half mb-4">
                    <?php if (isset($input->image)) : ?>
                      <img src="<?= base_url("images/user/$input->image") ?>" class="img-fluid" alt="example placeholder">
                    <?php endif; ?>
                  </div>
                  <?= form_upload('image'); ?>
                  <?php if ($this->session->flashdata('image_error')) : ?>
                    <small class="form-text text-danger"><?= $this->session->flashdata('image_error') ?></small>
                  <?php endif; ?>

                </div>
              </div>

              <button type="submit" class="btn btn-primary float-right mt-4">Tambahkan</button>
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
  <!-- Container -->