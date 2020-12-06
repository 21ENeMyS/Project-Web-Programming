  <div class="container mt-5">
    <h1>Halaman Edit Profile</h1>
    <div class="row mt-5">
      <div class="col-md-3">
        <h3>Menu</h3>
        <div class="link mt-3">
          <a href="profile.html" class="text-white">Profile</a>
          <hr class="white">
          <a href="orders.html" class="text-white">Orders</a>
        </div>
      </div>
      <div class="col-md-8">
        <div class="card">
          <div class="card-header text-dark">
            <h5>
              Edit Profile
            </h5>
          </div>
          <div class="card-body">
            <form method="POST" action="<?= $form_action; ?>">
              <?= isset($input->id) ? form_hidden('id', $input->id) : '' ?>
              <div class="form-group mt-2">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" name="nama" autocomplete="off" autofocus id="nama" value="<?= $input->nama; ?>">
                <?= form_error('nama'); ?>
              </div>

              <div class="form-group mt-2">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" autocomplete="off" value="<?= $input->email; ?>">
                <?= form_error('email'); ?>
              </div>

              <div class="form-group mt-2">
                <label for="passord">Password</label>
                <input type="password" class="form-control" id="password" name="password" autocomplete="off">
                <?= form_error('password'); ?>
              </div>

              <div class="form-group md-form w-50">
                <div class="file-field">
                  <div class="z-depth-1-half mb-4">
                    <?php if (isset($input->image)) : ?>
                      <img src="<?= base_url() ?>/images/user/<?= $input->image ?>" class="img-fluid" alt="example placeholder">
                    <?php endif; ?>
                  </div>
                  <?= form_upload(); ?>
                  <?php if ($this->session->flashdata('image_error')) : ?>
                    <small class="form-text text-danger"><?= $this->session->flashdata('image_error') ?></small>
                  <?php endif ?>
                </div>
              </div>

              <button type="submit" class="btn btn-primary float-right">Simpan</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>