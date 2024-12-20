<!DOCTYPE html>
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
  <!-- SweetAlert 2 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
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
          <?php if ($this->session->userdata('logged_in')): ?>
            <li class="nav-item">
              <span class="navbar-text">Halo, <?= $this->session->userdata('name') ?>!</span>
            </li>
            <div class="separator"></div>
            <li class="nav-item">
              <a class="nav-link" href="#"><i class="fas fa-star"></i></a>
            </li>
            <div class="separator"></div>
            <li class="nav-item">
              <a class="nav-link" href="#"><i class="fas fa-dollar-sign"></i></a>
            </li>
            <div class="separator"></div>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('Logout')?>"><i class="fas fa-sign-out-alt"></i></a>
            </li>
          <?php endif; ?>
        </ul>
      </div>
    </nav>
    <!-- /.navbar -->

    <div class="content-wrapper">
      <div class="content-header">
        <div class="container">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Buku Kas</h1>
            </div>
          </div>
        </div>
      </div>

      <!-- Main content -->
      <div class="content">
        <div class="container">
          <div class="row d-flex justify-content-center">
            <div class="col-lg-6">
              <div class="card">
                <div class="card-body">
                  <form action="<?= base_url('BuatBukuKas')?>" method="post">
                    <div class="form-group">
                      <label for="namaBukuKas">Nama Buku Kas*</label>
                      <small class="form-text text-muted">Misalnya: Dompet Saya atau Rekening Bank</small>
                      <input type="text" class="form-control" id="namaBukuKas" name="nama_buku_kas" required>
                    </div>
                    <div class="form-group">
                      <label for="deskripsiBukuKas">Deskripsi Buku Kas</label>
                      <small class="form-text text-muted">Misalnya: Uang di Tabungan Saya</small>
                      <input type="text" class="form-control" id="deskripsiBukuKas" name="deskripsi_buku_kas">
                    </div>
                    <div class="form-group">
                      <label for="mataUang">Mata Uang Anda*</label>
                      <small class="form-text text-muted">Misalnya: USD atau Rp. Max 3 karakter</small>
                      <input type="text" class="form-control" id="mataUang" name="mata_uang" maxlength="3" oninput="this.value = this.value.toUpperCase()" required value="Rp">
                    </div>
                    <div class="form-group">
                      <label for="saldoAwal">Saldo Awal*</label>
                      <small class="form-text text-muted">Berapa uang yang sudah ada di Buku Kas ini?</small>
                      <input type="text" class="form-control" id="saldoAwal" name="saldo_awal" onkeypress="validateInput(event)" required>
                    </div>
                    <div class="form-group">
                      <label for="kategoriPemasukan">Buat 2 Kategori Pemasukan*</label>
                      <small class="form-text text-muted">Contoh: Gaji Bulanan atau Kerja Sampingan.</small>
                      <input type="text" class="form-control mb-2" id="kategoriPemasukan1" name="kategori_pemasukan1" required>
                      <input type="text" class="form-control" id="kategoriPemasukan2" name="kategori_pemasukan2">
                      <small class="form-text text-muted">Anda nanti bisa menambah dan mengedit kategori lagi.</small>
                    </div>
                    <div class="form-group">
                      <label for="kategoriPengeluaran">Buat 2 Kategori Pengeluaran*</label>
                      <small class="form-text text-muted">Contoh: Ongkos Makan atau Perawatan Mobil.</small>
                      <input type="text" class="form-control mb-2" id="kategoriPengeluaran1" name="kategori_pengeluaran1" required>
                      <input type="text" class="form-control" id="kategoriPengeluaran2" name="kategori_pengeluaran2">
                      <small class="form-text text-muted">Anda nanti bisa menambah dan mengedit kategori lagi.</small>
                    </div>
                    <button type="submit" class="btn btn-primary">Buat Buku Kas</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
      <div class="container">
        <div class="float-right d-none d-sm-inline">
          Anything you want
        </div>
        <strong>Copyright &copy; 2024 <a href="https://imamrenaldygumay.com">CASHFLOW</a>.</strong> All rights reserved.
      </div>
    </footer>

    <?php if ($this->session->flashdata('success')): ?>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script>
        Swal.fire({
          title: 'Sukses!',
          text: '<?= $this->session->flashdata('success') ?>',
          icon: 'success',
          confirmButtonText: 'OK'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = '<?= base_url('dashboard') ?>'; 
          }
        });
      </script>
    <?php endif; ?>

    <!-- REQUIRED SCRIPTS -->
    <script src="<?= base_url('assets/')?>plugins/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/')?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/')?>dist/js/adminlte.min.js"></script>

    <script>
      // function formatCurrency(input) {
      //   // Menghapus semua karakter yang bukan angka
      //   let value = input.value.replace(/[^0-9]/g, '');
      //   // Mengubah menjadi format mata uang
      //   if (value) {
      //       value = parseInt(value, 10);
      //       input.value = new Intl.NumberFormat('id-ID', {
      //           style: 'currency',
      //           currency: 'IDR',
      //           minimumFractionDigits: 2,
      //           maximumFractionDigits: 2
      //       }).format(value);
      //   } else {
      //       input.value = '';
      //   }
      // }

      // function clearFormatting(input) {
      //   // Menghapus format mata uang saat fokus
      //   input.value = input.value.replace(/[^0-9]/g, '');
      // }

      function validateInput(event) {
        // Mengizinkan hanya angka
        const char = String.fromCharCode(event.which);
        if (!/[0-9]/.test(char)) {
            event.preventDefault(); // Mencegah input karakter non-angka
        }
      }

      function validateCurrencyInput() {
        const mataUang = document.getElementById('mataUang');
        if (mataUang.value.length > 3) {
            alert('Mata Uang tidak boleh lebih dari 3 karakter.');
            mataUang.value = mataUang.value.substring(0, 3); // Memotong input menjadi 3 karakter
        }
      }
    </script>
  </body>
</html>
