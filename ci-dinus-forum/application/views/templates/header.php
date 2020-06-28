<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>DINUS Forum</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?= base_url(); ?>assets/img/favicon.png" rel="icon">
  <link href="<?= base_url(); ?>assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="<?= base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url(); ?>assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="<?= base_url(); ?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?= base_url(); ?>assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="<?= base_url(); ?>assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="<?= base_url(); ?>assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="<?= base_url(); ?>assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="<?= base_url(); ?>assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?= base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css">
  <script src="<?= base_url(); ?>assets/vendor/jquery/jquery.js"></script>

  <!-- =======================================================
  * Template Name: Company - v2.0.1
  * Template URL: https://bootstrapmade.com/company-free-html-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"><a href="<?= base_url(); ?>"><span text-align="left">DINUS</span>Forum</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->


      <div class="">
        <div class="">
          <form action="" method="post">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Cari disini.." name="keyword">
              <div class="input-group-append">
                <button class="btn btn-primary icofont search" type="submit">Cari</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li><a href="<?= base_url(); ?>">Home</a></li>
          <?php if ($this->session->userdata('logged_in')) : ?>
            <li><a href="#">Notification</a></li>

            <li class="drop-down">
              <a href="#">
                <img class="img-profile rounded-circle" src="<?= base_url('assets/img/profile/') . $user['gambar_profile']; ?>">

                <?php echo $this->session->userdata('username'); ?>
              </a>
              <ul>
                <li><a class="icofont-ui-user" href="<?= base_url(); ?>user">Profile</a></li>
                <li><a class="icofont-options" href="<?= base_url(); ?>user/changepassword">Settings</a></li>
                <li><a class="icofont-logout" href="<?= base_url(); ?>auth/logout">Logout</a></li>
            </li>
          <?php else : ?>
            <li><a href="<?= base_url(); ?>auth">Sign In</a></li>
          <?php endif; ?>
        </ul>
      </nav><!-- .nav-menu -->



    </div>
  </header><!-- End Header -->