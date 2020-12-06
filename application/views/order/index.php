<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow py-2">
  <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="admin.html">
    <img src="<?= base_url(); ?>assets/img/favicon.jpeg" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
    Pupmart
  </a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-t oggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <form action="<?= base_url(); ?>order/cari" method="POST" class="d-flex w-100">
    <input class="form-control form-control-dark  text-dark" type="text" placeholder="Search" aria-label="Search" id="form-control" name="keyword" value="<?= $this->session->userdata('keyword'); ?>" autocomplete="off">
    <a href="<?= base_url('order/reset') ?>" class="btn btn-info btn-sm">
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

<div class="container-fluid">
  <div class="row">
    <?php $this->load->view('templates/navbar-side-admin') ?>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Order</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
          </div>
        </div>
      </div>

      <?php $this->load->view('templates/alerts'); ?>

      <div class="table-responsive">
        <div class="card card-list text-center">
          <div class="card-header white d-flex justify-content-between align-items-center text-dark">
            <h5>Order</h5>
          </div>
          <div class="card-body">
            <table class="table text-dark text-center">
              <thead>
                <tr>
                  <th scope="col">Nomer Order</th>
                  <th scope="col">Tanggal</th>
                  <th scope="col">Total</th>
                  <th scope="col">Status</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($content as $c) : ?>
                  <tr>
                    <td><a class="font-weight-bold" href="<?= base_url(); ?>order/detail/<?= $c->id; ?>"># <?= $c->invoice; ?></a></td>
                    <td><?= str_replace('-', '/', date("d-m-Y", strtotime($c->date))) ?></td>
                    <td>Rp. <?= number_format($c->total, 0, ',', '.') ?>,-</td>
                    <td><?php $this->load->view('templates/status', ['status' => $c->status]); ?></td>
                  </tr>


                <?php endforeach; ?>
              </tbody>
            </table>
            <nav aria-label="Page navigation example">
              <?= $pagination; ?>
            </nav>
          </div>
        </div>
      </div>
    </main>
  </div>
</div>