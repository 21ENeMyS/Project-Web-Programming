	 <div class="container my-5 py-5">


	 	<!--Section: Content-->
	 	<section class="px-md-5 mx-md-5 text-center text-lg-left ">

	 		<!--Grid row-->
	 		<div class="row d-flex justify-content-center">

	 			<!--Grid column-->
	 			<div class="col-md-6">

	 				<!-- Default form login -->
	 				<?= form_open('login', ['method' => 'POST']); ?>
	 				<p class="h4 mb-5 text-center">Masuk</p>

	 				<?php $this->load->view('templates/alerts'); ?>


	 				<!-- Email -->
	 				<div class="md-form">
	 					<?= form_input(['type' => 'email', 'name' => 'email', 'value' => $input->email, 'class' => 'form-control',]); ?>
	 					<label for="inputMDEx">Email</label>
	 					<?= form_error('email'); ?>
	 				</div>

	 				<!-- Password -->
	 				<div class="md-form">
	 					<?= form_password('password', '', ['class' => 'form-control',]); ?>
	 					<label for="inputMDEx">Password</label>
	 					<?= form_error('password'); ?>
	 				</div>

	 				<!-- Sign in button -->
	 				<button class="btn btn-success btn-block my-4" type="submit">Masuk</button>
	 				<?= form_close();  ?>
	 				<!-- Register -->
	 				<p>Tidak punya akun ?
	 					<a href="<?= base_url(); ?>register/" class="text-white">Registrasi</a>
	 				</p>

	 			</div>
	 			<!--Grid column-->

	 		</div>
	 		<!--Grid row-->


	 	</section>
	 	<!--Section: Content-->


	 </div>