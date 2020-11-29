<!--Carousel Wrapper-->
<div class="carousel slide" data-ride="carousel" id="carouselExampleIndicators">
  <ol class="carousel-indicators my-4">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="<?= base_url(); ?>assets/img/Group 46.png" class="d-block w-100">
      <div class="ml-5 carousel-caption d-none d-md-block text-left">
        <div class="container">
          <h1 class="text-uppercase font-weight-bold">pupmart</h1>
          <p>Pupuk ZA mengandung kombinasi terbaik dari Nit ate-Nitrogen, yang langsung tersedia
            untuk tanaman, dan
            Ammonium-Nitrogen, yang secara perlahan tersedia sebagai cadangan. </p>
          <a href="detail-produk.html" class="btn btn-success">Buy now</a>
        </div>
      </div>
    </div>
    <div class="carousel-item">
      <img src="<?= base_url(); ?>assets/img/Group 47.png" class="d-block w-100">
      <div class="ml-5  carousel-caption d-none d-md-block text-left">
        <div class="container">
          <h1 class="text-uppercase font-weight-bold">pupmart</h1>
          <p>Pupuk ZA mengandung kombinasi terbaik dari Nit ate-Nitrogen, yang langsung tersedia untuk tanaman, dan
            Ammonium-Nitrogen, yang secara perlahan tersedia sebagai cadangan. </p>
          <a href="detail-produk.html" class="btn btn-primary">Buy now</a>
        </div>
      </div>
    </div>
    <div class="carousel-item">
      <img src="<?= base_url(); ?>assets/img/Group 48.png" class="d-block w-100">
      <div class="ml-5 carousel-caption d-none d-md-block text-left">
        <div class="container">
          <h1 class="text-uppercase font-weight-bold">pupmart</h1>
          <p>Pupuk ZA mengandung kombinasi terbaik dari Nit ate-Nitrogen, yang langsung tersedia untuk tanaman, dan
            Ammonium-Nitrogen, yang secara perlahan tersedia sebagai cadangan. </p>
          <a href="detail-produk.html" class="btn btn-success">Buy now</a>
        </div>
      </div>
    </div>
  </div>
</div>
<!--/.Carousel Wrapper-->

<!-- About -->
<section class="about mt-5 d-flex justify-content-center align-items-center" id="about">
  <?php $this->load->view('templates/alerts'); ?>
  <div class="container">
    <h1 class="h1-responsive font-weight-bold text-center mb-4">About</h1>
    <div class="row">
      <div class="col-md-6">
        <div class="view overlay zoom ">
          <img src="<?= base_url(); ?>assets/img/Cara-Membuat-Pupuk-Kompos.jpg" class="img-fluid " alt="zoom">
        </div>
      </div>
      <div class="col-md-6">
        <div class="textc justify-content-center align-items-center">
          <h1 class="text-left text-uppercase">Pupmart</h1>
          <p>Produk kami adalah produk yang paling istimewa
            dan menghasilkan tanaman menjadi lebih baik dan
            subur.Dengan Produk dari <span class="text-uppercase font-weight-bold">pupmart</span> tanaman yang
            anda menjadi mantap. Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse ratione optio eum
            aliquam! Accusantium reiciendis obcaecati, cum optio sapiente alias animi ipsa quasi ullam quo veritatis
            aliquam consequatur atque commodi rerum excepturi. Distinctio hic voluptatibus ipsam numquam voluptates
            quia
            velit alias nulla dignissimos voluptas, deleniti autem architecto quas quos eveniet.</p>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- end About -->

<!-- /.Portfolio -->
<section class="section mt-5" id="portfolio">
  <h1 class="text-center">Portfolio</h1>
  <div class="container mt-4">
    <div class="gallery mb-5" id="gallery">
      <div class="mb-3 pics all 2 animation">
        <a data-toggle="modal" data-target="#basicExampleModal">
          <img class="img-fluid z-depth-1 rounded shadow" src="<?= base_url(); ?>assets/img/portfolio.jpg" alt="Card image cap">
        </a>
      </div>
      <div class="mb-3 pics animation all 1">
        <a data-toggle="modal" data-target="#basicExampleModal">
          <img class="img-fluid z-depth-1 rounded shadow" src="<?= base_url(); ?>assets/img/portfolio2.jpg" alt="Card image cap">
        </a>
      </div>
      <div class="mb-3 pics animation all 1">
        <a data-toggle="modal" data-target="#basicExampleModal">
          <img class="img-fluid z-depth-1 rounded shadow" src="<?= base_url(); ?>assets/img/portfolio3.jpg" alt="Card image cap">
        </a>
      </div>
      <div class="mb-3 pics all 2 animation">
        <a data-toggle="modal" data-target="#basicExampleModal">
          <img class="img-fluid z-depth-1 rounded shadow" src="<?= base_url(); ?>assets/img/portfolio4.jpg" alt="Card image cap">
        </a>
      </div>
      <div class="mb-3 pics all 2 animation">
        <a data-toggle="modal" data-target="#basicExampleModal">
          <img class="img-fluid z-depth-1 rounded shadow" src="<?= base_url(); ?>assets/img/portfolio6.jpg" alt="Card image cap">
        </a>
      </div>
    </div>
  </div>
</section>
<!-- /.end Portfolio -->

<!-- contact -->
<section class="contact mt-5" id="contact">
  <div class="container mb-5">
    <form method="POST" action="<?= base_url(); ?>">
      <h1>Contact</h1>
      <div class="form-row mt-4">

        <div class="col-md-6">
          <div class="md-form form-group">
            <input type="text" id="inputMDEx" class="form-control" autocomplete="off">
            <label for="inputMDEx">Name</label>
          </div>
        </div>
        <div class="col-md-6">
          <div class="md-form form-group">
            <input type="text" id="inputMDEx" class="form-control" autocomplete="off">
            <label for="inputMDEx">Last Name</label>
          </div>
        </div>

      </div>

      <div class="row">

        <div class="col-md-12">
          <div class="md-form form-group">
            <input type="email" id="inputMDEx" class="form-control" autocomplete="off">
            <label for="inputMDEx">Email</label>
          </div>
        </div>

        <div class="col-md-12">
          <div class="md-form form-group white-textarea active-white-textarea">
            <textarea id="form7" class="md-textarea form-control" rows="3"></textarea>
            <label for="form7">Message</label>
          </div>
        </div>
      </div>
      <button type="submit" class="btn btn-success btn-md float-right">Kirim</button>
    </form>
  </div>
</section>
<!-- end contact -->

<!-- Footer -->
<footer class="page-footer font-small pt-4 mt-4">
  <div class="container text-center text-md-left">
    <div class="row">
      <div class="col-md-6 mt-md-0">
        <a href="" class="navbar-brand logo text-uppercase font-weight-bold">
          <img src="asset/img/WhatsApp Image 2020-11-03 at 07.28.27.jpeg" alt="">
          Pupmart
        </a>
        <!-- Address -->
        <div class="address mt-4">
          <h5 class="text-uppercase">Alamat</h5>
          <p>Jl. Cemerlang No.8, Sukakarya, Kec. Warudoyong, Kota Sukabumi, Jawa Barat 43135 </p>
        </div>
        <!-- Contact us -->
        <div class="email mt-2">
          <a href="">
            <i class="fas fa-envelope fa-lg mr-2"></i>
            pupmart@gmail.com
          </a>
        </div>
        <div class="telephone mt-3">
          <a href="">
            <i class="fas fa-phone-alt fa-lg mr-2"></i>
            +6209983234
          </a>
        </div>
      </div>
      <!-- Grid column -->

      <hr class="clearfix w-100 d-md-none pb-3">

      <!-- Grid column -->
      <div class="link col-md-3 mb-md-0 mb-3 text-center">

        <!-- Links -->
        <h5 class="information text-uppercase">Information</h5>

        <ul class="list-unstyled text-center">
          <li class="mt-2">
            <a href="#home">Home</a>
          </li>
          <li class="mt-2">
            <a href="#about">About</a>
          </li>
          <li class="mt-2">
            <a href="#portfolio">Portfolio</a>
          </li>
          <li class="mt-2">
            <a href="#contact">Contact</a>
          </li>
        </ul>
      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

    <hr class="my-4 mt-2">
    <div class="row py-3 align-items-center">
      <!-- Copyright -->
      <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
        <div class="footer-copyright text-center">&copy; 2020 Copyright Allright Reserved
          <a href="index.html" class="text-uppercase font-weight-bold">pupmart</a>
        </div>
      </div>
      <!-- Copyright -->

      <!-- icons -->
      <div class="icons col-md-6 col-lg-7 text-center text-md-right">
        <!--Facebook-->
        <a class="fb-ic ml-0" href="">
          <i class="fab fa-facebook-f fa-lg mr-4"></i>
        </a>
        <!--Instagram-->
        <a class="instagram" href="">
          <i class="fab fa-instagram fa-lg white-text mr-lg-4"> </i>
        </a>
        <!--Twitter-->
        <a class="tw-ic" href="">
          <i class="fab fa-twitter fa-lg white-text mr-4"> </i>
        </a>
        <!-- Youtube -->
        <a class="yt-ic" href="">
          <i class="fab fa-youtube fa-lg mr-4"></i>
        </a>
        <!-- Pinterest -->
        <a class="pt-ic" href="">
          <i class="fab fa-pinterest fa-lg mr-4"></i>
        </a>
      </div>
    </div>
  </div>
  <!-- Footer Links -->


</footer>
<!-- Footer -->