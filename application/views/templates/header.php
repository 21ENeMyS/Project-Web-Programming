<!doctype html>
<html lang="en" id="home">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Material Design Bootstrap -->
  <link href="<?= base_url(); ?>/assets/libs/mdbootstrap/css/mdb.min.css" rel="stylesheet">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/libs/bootstrap/css/bootstrap.min.css">
  <!-- Fonts  -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <!-- Fontawesome -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/libs/fontawesome/css/all.min.css">
  <!-- Favicon -->
  <link rel="shortcut icon" href="<?= base_url(); ?>assets/img/favicon.jpeg" type="image/x-icon">

  <!-- Local Css -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/main.css">


  <title><?= $title; ?></title>
</head>

<body>

  <!--Navbar-->
  <?php $this->load->view('templates/navbar'); ?>
  <!--/.Navbar-->

  <!-- Content -->
  <?php $this->load->view($page); ?>
  <!-- End Content -->


  <!-- Footer -->
  <?php $this->load->view('templates/footer'); ?>
  <!-- End Footer -->