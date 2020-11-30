  <nav class="navbar navbar-expand-lg navbar-light mb-4">
    <div class="container">

      <!-- Navbar brand -->
      <a class="navbar-brand text-uppercase font-weight-bold" href="<?= base_url(); ?>">
        <img src="<?= base_url(); ?>assets/img/favicon.jpeg" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
        Pupmart
      </a>

      <!-- Collapse button -->
      <div class="navbar-toggler second-button" type="button" data-toggle="collapse" data-target="#navbarSupportedContent23" aria-controls="navbarSupportedContent23" aria-expanded="false" aria-label="Toggle navigation">
        <div class="animated-icon2"><span></span><span></span><span></span><span></span></div>
      </div>

      <!-- Collapsible content -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent23">

        <!-- Links -->
        <div class="navbar-nav ml-auto">
          <a class="nav-link active" href="<?= base_url(); ?>">Home</a>
          <a class="nav-link" href="#about">About</a>
          <a class="nav-link" href="#contact">Contact Us</a>
          <a class="nav-link" href="#portfolio">Portfolio</a>
          <!-- Memanipulasi Navbar saat Login -->
          <?php if (!$this->session->userdata('is_login')) : ?>
            <a class="nav-link" href="<?= base_url(); ?>login/"><i class="fas fa-user"></i></a>
            <a class="nav-link" href="cart.html"><i class="fas fa-shopping-cart"></i></a>
          <?php else : ?>
            <a class="nav-link" href="cart.html"><i class="fas fa-shopping-cart"></i></a>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user"></i>
                <?= ($this->session->userdata('nama')); ?>
              </a>
              <div class="dropdown-menu dropdown-menu-right dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
                <a class="dropdown-item" href="#">Ubah Profile</a>
                <a class="dropdown-item" href="#">Orders</a>
                <a class="dropdown-item" href="<?= base_url(); ?>logout/">Keluar</a>
              </div>
            </li>
        </div>
      <?php endif; ?>
      <!-- Links -->

      </div>
      <!-- Collapsible content -->
    </div>
  </nav>