<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow py-2">
  <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="admin.html">
    <img src="<?= base_url(); ?>assets/img/favicon.jpeg" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
    Pupmart
  </a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-t oggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <form action="<?= base_url(); ?>produk/cari" method="POST" class="d-flex w-100">
    <input class="form-control form-control-dark  text-dark" type="text" placeholder="Search" aria-label="Search" id="form-control" name="keyword" value="<?= $this->session->userdata('keyword'); ?>" autocomplete="off">
    <a href="<?= base_url('produk/reset') ?>" class="btn btn-info btn-sm">
      <i class="fas fa-eraser"></i>
    </a>
  </form>
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="<?= base_url(); ?>logout/">Logout</a>
    </li>
  </ul>
</nav>
<!-- Navbar -->
<div class="continer-fluide">
  <div class="row">
    <?php $this->load->view('templates/navbar-side-admin') ?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <?php $this->load->view('templates/alerts'); ?>
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Produk</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <a class="btn btn-sm btn-primary" href="<?= base_url(); ?>produk/tambah">Tambah Produk</a>
          </div>
        </div>
      </div>


      <div class="table-responsive">
        <div class="card card-list text-center">
          <div class="card-header white d-flex justify-content-between align-items-center text-dark">
            <h5>Produk</h5>
          </div>
          <div class="card-body">
            <table class="table ">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Title</th>
                  <th scope="col">Kategori</th>
                  <th scope="col">Harga</th>
                  <th scope="col">Stok</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $nomer = 1;
                foreach ($content as $c) :  ?>
                  <tr>
                    <th scope="row"><?= $nomer++; ?></th>
                    <td>
                      <img src="<?= $c->image ? base_url("images/produk/$c->image") : base_url("images/produk/default.png") ?>" alt="" height="60" width="60" loading="lazy" class="img-fluid">
                      <?= $c->produk_kategori; ?>
                    </td>
                    <td><span class="badge badge-primary"><i class="fas fa-tags mr-1"></i><?= $c->kategori; ?></span></td>
                    <td>Rp.<?= number_format($c->harga, 0, ',', '.'); ?></td>
                    <td><?= $c->stok ? 'Tersedia' : 'Kosong' ?></td>
                    <td>
                      <form action="<?= base_url(); ?>produk/hapus/<?= $c->id; ?>" method="POST">
                        <?= form_hidden('id', $c->id); ?>
                        <a class="btn btn-sm" href="<?= base_url(); ?>produk/ubah/<?= $c->id ?>">
                          <i class="fas fa-edit fa-lg text-info"></i>
                        </a>
                        <button type="submit" class="btn btn-sm" onclick="return confirm('Apakah Anda yakin <?= $c->kategori; ?> ?')">
                          <i class="fas fa-trash fa-lg text-danger"></i>
                        </button>
                      </form>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
            <nav aria-label="Page navigation example mt-4">
              <?= $pagination; ?>
            </nav>
          </div>
        </div>
      </div>
    </main>
  </div>
</div>