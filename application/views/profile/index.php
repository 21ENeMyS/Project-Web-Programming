  <div class="container mt-5">
    <div class="row mt-5">
      <?php $this->load->view('templates/menu'); ?>
      <div class="col-md-8">
        <div class="row">
          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <img src="<?= $content->image ? base_url("/images/user/$content->image") : base_url("/images/user/avatar.png") ?>" alt="" class="img-fluid">
              </div>
            </div>
          </div>
          <div class="col-md-8">
            <div class="card">
              <div class="card-body">
                <p>Nama : <?= $content->nama; ?></p>
                <p>Email : <?= $content->email; ?></p>
              </div>
              <div class="card-footer">
                <a href="<?= base_url(); ?>profile/ubah/<?=
                                                          $content->id; ?>" class="btn btn-primary text-capitalize float-right">Ubah Profile</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>