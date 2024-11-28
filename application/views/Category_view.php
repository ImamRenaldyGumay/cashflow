<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kategori Buku Kas</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            flex-direction: column;
            height: 100vh;
        }
        .sidebar {
            min-height: 100vh;
            background-color: #f8f9fa;
            width: 250px;
        }
        .sidebar a {
            color: #333;
        }
        .sidebar a:hover {
            background-color: #e9ecef;
        }
        .content {
            flex-grow: 1;
            padding: 20px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Akun Saya</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url('logout'); ?>">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar p-3">
            <h4>Menu</h4>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url('dashboard'); ?>">Buku Kas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url('category'); ?>">Kategori</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url('transaction'); ?>">Transaksi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url('report'); ?>">Laporan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url('settings'); ?>">Pengaturan</a>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="content">
            <h2>Kategori Buku Kas</h2>
            <div class="row">
                <div class="col-md-6">
                    <h4>Pengeluaran</h4>
                    <ul class="list-group">
                        <?php foreach ($categories as $category): ?>
                            <?php if ($category->type == 'expense'): ?>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <?php echo $category->name; ?>
                                    <div>
                                        <a href="#" class="btn btn-sm btn-warning">Edit</a>
                                        <a href="<?php echo site_url('category/delete/' . $category->id); ?>" class="btn btn-sm btn-danger">Hapus</a>
                                    </div>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>
                    <form action="<?php echo site_url('category/add'); ?>" method="post" class="mt-3">
                        <input type="hidden" name="type" value="expense">
                        <div class="input-group">
                            <input type="text" name="name" class="form-control" placeholder="Buat kategori Pengeluaran" required>
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">Tambah</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                    <h4>Pemasukan</h4>
                    <ul class="list-group">
                        <?php foreach ($categories as $category): ?>
                            <?php if ($category->type == 'income'): ?>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <?php echo $category->name; ?>
                                    <div>
                                        <a href="#" class="btn btn-sm btn-warning">Edit</a>
                                        <a href="<?php echo site_url('category/delete/' . $category->id); ?>" class="btn btn-sm btn-danger">Hapus</a>
                                    </div>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>
                    <form action="<?php echo site_url('category/add'); ?>" method="post" class="mt-3">
                        <input type="hidden" name="type" value="income">
                        <div class="input-group">
                            <input type="text" name="name" class="form-control" placeholder="Buat kategori Pemasukan" required>
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">Tambah</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
