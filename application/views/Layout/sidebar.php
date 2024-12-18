<?php
$segment1 = $this->uri->segment(1);
$segment2 = $this->uri->segment(2);
?>
<style>
    .nav-header {
        font-weight: bold;
        font-size: 18px;
        color: #6c757d;
        margin: 10px 0px 5px 0px;
    }
    .nav_icon {

    }
</style>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-dark elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?= base_url('assets/')?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">CashFlow</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-4">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header">BUKU KAS</li>
                <li class="nav-item">
                <a href="<?= site_url('Admin')?>" class="nav-link <?= ($segment1 == 'User' && $segment2 == "") ? 'active': ""; ?>">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-header">LAPORAN KAS</li>
                <li class="nav-item">
                    <a href="<?= base_url('Harian')?>" class="nav-link <?= ($segment1 == 'Harian' && $segment2 == "") ? 'active': ""; ?>">
                        <p>Harian</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('Report')?>" class="nav-link">
                        <p>Bulanan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('Report')?>" class="nav-link">
                        <p>Tahunan</p>
                    </a>
                </li>
                <li class="nav-header">PENGATURAN</li>
                <li class="nav-item">
                    <a href="<?= base_url('#')?>" class="nav-link">
                        <p>Kategori</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('#')?>" class="nav-link">
                        <p>Buku Saya</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('#')?>" class="nav-link">
                        <p>Akun Saya</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('#')?>" class="nav-link">
                        <p>Multi User</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('#')?>" class="nav-link">
                        <p>Riwayat Pembayaran</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('Logout')?>" class="nav-link">
                        <p>Logout
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>