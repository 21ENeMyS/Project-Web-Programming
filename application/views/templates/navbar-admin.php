  <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow py-2">
    <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="admin.html">
      <img src="<?= base_url(); ?>assets/img/favicon.jpeg" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
      Pupmart
    </a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-t oggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <form action="<?= $action; ?>" method="POST" class="d-flex w-100">
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
  Navbar