	 <div class="container my-5 py-5">


	 	<!--Section: Content-->
	 	<section class="px-md-5 mx-md-5 text-center text-lg-left ">
	 		<?php $this->load->view('templates/alerts'); ?>
	 		<!--Grid row-->
	 		<div class="row d-flex justify-content-center">

	 			<!--Grid column-->
	 			<div class="col-md-6">

	 				<!-- Default form login -->
	 				<?= form_open('register', ['method' => 'POST']); ?>
	 				<p class="h4 mb-5 text-center">Registrasi</p>

	 				<!-- Nama -->
	 				<div class="md-form">
	 					<?= form_input('nama', $input->nama, ['class' => 'form-control',  'autocomplete' => true]); ?>
	 					<label for="inputMDEx">Nama</label>
	 					<?= form_error('nama'); ?>
	 				</div>

	 				<!-- Email -->
	 				<div class="md-form">
	 					<?= form_input(['type' => 'email', 'name' => 'email', 'value' => $input->email, 'class' => 'form-control',  'autocomplete' => true]); ?>
	 					<label for="inputMDEx">Email</label>
	 					<?= form_error('email'); ?>
	 				</div>

	 				<!-- Password -->
	 				<div class="md-form">
	 					<?= form_password('password', '', ['class' => 'form-control',]); ?>
	 					<label for="inputMDEx">Password</label>
	 					<?= form_error('password'); ?>
	 				</div>

	 				<!-- Konfirmasi Password -->
	 				<div class="md-form">
	 					<?= form_password('password_confirmation', '', ['class' => 'form-control']); ?>
	 					<label for="inputMDEx">Konfirmasi Password</label>
	 					<?= form_error('password_confirmation'); ?>
	 				</div>

	 				<!-- Sign in button -->
	 				<button class="btn btn-success btn-block my-4" type="submit">Registrasi</button>
	 				<?= form_close();  ?>
	 			</div>
	 			<!--Grid column-->

	 		</div>
	 		<!--Grid row-->


	 	</section>
	 	<!--Section: Content-->


	 </div>