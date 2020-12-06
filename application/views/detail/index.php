  <div class="container my-5 py-5">


    <!--Section: Content-->
    <section class="text-center">

      <!-- Section heading -->
      <h3 class="font-weight-bold mb-5">Produk Details</h3>

      <div class="row">

        <div class="col-lg-6">
          <?php foreach ($content as $c) : ?>
            <!--Carousel Wrapper-->
            <div id="carousel-thumb" class="carousel slide carousel-fade carousel-thumbnails" data-ride="carousel">

              <!--Slides-->
              <div class="carousel-inner text-center text-md-left" role="listbox">
                <div class="carousel-item active">
                  <img src="<?= $c->image ? base_url("/images/produk/$c->image") : base_url("/images/produk/default.png"); ?>" alt="First slide" class="img-fluid">
                </div>
                <div class="carousel-item">
                  <img src="<?= $c->image ? base_url("/images/produk/$c->image") : base_url("/images/produk/default.png") ?>" alt="Second slide" class="img-fluid">
                </div>
                <div class="carousel-item">
                  <img src="<?= $c->image ? base_url("/images/produk/$c->image") : base_url("/images/produk/default.png") ?>" alt="Third slide" class="img-fluid">
                </div>
              </div>
              <!--/.Slides-->

              <!--Thumbnails-->
              <a class="carousel-control-prev" href="#carousel-thumb" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carousel-thumb" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
              <!--/.Thumbnails-->

            </div>
            <!--/.Carousel Wrapper-->

        </div>

        <div class="col-lg-5 text-center text-md-left">

          <h2 class="h2-responsive text-center text-md-left product-name font-weight-bold dark-grey-text mb-1 ml-xl-0 ml-4">
            <strong class="text-white"><?= $c->produk_kategori; ?></strong>
          </h2>
          <span class="badge badge-danger product mb-4 ml-xl-0 ml-4"><i class="fas fa-tags mr-2"></i><?= $c->kategori; ?></span>
          <h3 class="h3-responsive text-center text-md-left mb-5 ml-xl-0 ml-4">
            <span class="text-white font-weight-bold">
              <strong>Rp.<?= number_format($c->harga, 0, ',', '.') ?>,-</strong>
            </span>
          </h3>

          <!--Accordion wrapper-->
          <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">

            <!-- Accordion card -->
            <div class="card">

              <!-- Card header -->
              <div class="card-header" role="tab" id="headingOne1">
                <a data-toggle="collapse" data-parent="#accordionEx" href="#collapseOne1" aria-expanded="true" aria-controls="collapseOne1">
                  <h5 class="mb-0 text-dark">
                    Deskripsi Produk
                    <i class="fas fa-angle-down rotate-icon"></i>
                  </h5>
                </a>
              </div>

              <!-- Card body -->
              <div id="collapseOne1" class="collapse show" role="tabpanel" aria-labelledby="headingOne1" data-parent="#accordionEx">
                <div class="card-body text-dark"><?= $c->deskripsi; ?>
                </div>
              </div>
            </div>
            <!-- Accordion card -->

            <!-- Accordion card -->
          </div>
          <!--/.Accordion wrapper-->

          <!-- Add to Cart -->
          <section class="color text-white">
            <div class="mt-5">
              <div class="row mt-3">
                <div class="col-md-12 text-center text-md-left text-md-right">
                  <form action="<?= base_url(); ?>cart/tambah" method="POST">
                    <input type="hidden" name="id_produk" value="<?= $c->id; ?>">
                    <div class="input-group">
                      <input type="number" name="qty" value="1" class="form_control text-center">
                      <div class="input-group-append">
                        <button class="btn btn-primary btn-rounded">
                          <i class="fas fa-cart-plus mr-2" aria-hidden="true"></i> Add to cart</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </section>
        <?php endforeach; ?>

        <!-- /.Add to Cart -->

        </div>

      </div>

    </section>
    <!--Section: Content-->


  </div>