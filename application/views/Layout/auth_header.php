<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title ?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= base_url('assets/')?>plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url('assets/')?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets/')?>dist/css/adminlte.min.css">
  <!-- Tambahkan di view/header Anda -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <style>
  .navbar.bg-success .navbar-brand,
  .navbar.bg-success .nav-link {
    color: white !important;
  }
  .navbar-custom {
      background-color: #f8f9fa; /* Warna latar belakang navbar */
  }
  .navbar-custom .nav-link {
      color: #343a40; /* Warna teks */
  }
  .separator {
      border-left: 1px solid #343a40; /* Garis pemisah */
      height: auto; /* Tinggi garis pemisah */
      margin: 0 10px; /* Margin di kiri dan kanan */
  }
</style>
</head>
<body class="hold-transition layout-top-nav">
  <div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md bg-success">
    <div class="container">
      <a href="<?= base_url('assets/')?>index3.html" class="navbar-brand">
        <img src="<?= base_url('assets/')?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
              <span class="navbar-text">CASHFLOW</span>
          </li>
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->