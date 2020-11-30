  <div class="container mt-5">
    <!-- Row -->
    <div class="row d-flex justify-content-center align-items-center">
      <!-- Grid column -->
      <div class="col-md-12">
        <!-- Card -->
        <div class="card">
          <!-- Card Header -->
          <div class="card-header text-dark">
            <h5>Tambah Kategori</h5>
          </div>
          <!-- Card Header -->
          <!-- Card Body -->
          <div class="card-body">
            <!-- Form -->
            <?= form_open($form_action, ['method' => 'POST']); ?>
            <?= isset($input->id) ? form_hidden('id', $input->id) : '' ?>
            <!-- Input -->
            <div class="form-group">
              <label for="kategori">Kategori</label>
              <input type="text" class="form-control" id="kategori" onkeyup="CreateSlug()" autofocus name="kategori" autocomplete="off">
              <?= form_error('kategori'); ?>
            </div>
            <!-- Input -->

            <!-- Input -->
            <div class="form-group">
              <label for="slug">Slug</label>
              <input type="slug" class="form-control" id="slug" aria-describedby="slugHelp" readonly name="slug" autocomplete="off">
            </div>
            <?= form_error('slug'); ?>
            <!-- Input -->

            <button type="submit" class="btn btn-primary mt-4">Tambahkan</button>
            <?php form_close() ?>
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