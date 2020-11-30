<?php $this->load->view('templates/navbar-admin'); ?>
<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block navbar-dark bg-dark sidebar collapse">
      <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="admin.html">
              <i class="fas fa-home mr-2"></i>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="admin-kategori.html">
              Category
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="fas fa-file mr-2"></i>
              Orders
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="admin-produk.html">
              <i class="fas fa-shopping-cart mr-2"></i>
              Products
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="fas fa-user mr-2"></i>
              Customers
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="fas fa-chart-bar mr-2"></i>
              Reports
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="fas fa-layer-group mr-2"></i>
              Integrations
            </a>
          </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Saved reports</span>
          <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
            <span data-feather="plus-circle"></span>
          </a>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Current month
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Last quarter
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Social engagement
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Year-end sale
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Kategori</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <a class="btn btn-sm btn-primary" href="<?= base_url(); ?>kategori/tambah">Tambah katergori</a>
          </div>
        </div>
      </div>

      <?php $this->load->view('templates/alerts'); ?>


      <div class="table-responsive mt-5">
        <div class="card card-list text-center">
          <div class="card-header white d-flex justify-content-between align-items-center text-dark">
            <h5>Kategori</h5>
          </div>
          <div class="card-body">
            <table class="table ">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Title</th>
                  <th scope="col">Slug</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $nomer = 0;
                foreach ($content as $c) :
                  $nomer++; ?>
                  <tr>
                    <th scope="row"><?= $nomer; ?></th>
                    <td><?= $c->kategori; ?></td>
                    <td><?= $c->slug; ?></td>
                    <td>
                      <form action="">
                        <a class="btn btn-sm" href="<?= base_url(); ?>kategori/ubah/<?= $c->id; ?>">
                          <i class="fas fa-edit fa-lg text-info"></i>
                        </a>
                        <button type="submit" class="btn btn-sm">
                          <i class="fas fa-trash fa-lg text-danger"></i>
                        </button>
                      </form>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
            <nav aria-label="Page navigation example">
              <?= $pagination ?>
            </nav>
          </div>
        </div>
      </div>
    </main>
  </div>
</div>