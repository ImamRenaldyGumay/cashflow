<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Kategori</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
</head>
<body>
    <div class="container mt-5">
        <h1>Input Kategori</h1>
        <form action="<?= base_url('BuatBukuKas/input_kategori/' . $book_id) ?>" method="post">
            <div class="form-group">
                <label for="kategoriPemasukan1">Buat Kategori Pemasukan 1*</label>
                <input type="text" class="form-control" id="kategoriPemasukan1" name="kategori_pemasukan1" required>
            </div>
            <div class="form-group">
                <label for="kategoriPemasukan2">Buat Kategori Pemasukan 2</label>
                <input type="text" class="form-control" id="kategoriPemasukan2" name="kategori_pemasukan2">
            </div>
            <div class="form-group">
                <label for="kategoriPengeluaran1">Buat Kategori Pengeluaran 1*</label>
                <input type="text" class="form-control" id="kategoriPengeluaran1" name="kategori_pengeluaran1" required>
            </div>
            <div class="form-group">
                <label for="kategoriPengeluaran2">Buat Kategori Pengeluaran 2*</label>
                <input type="text" class="form-control" id="kategoriPengeluaran2" name="kategori_pengeluaran2" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Kategori</button>
        </form>
        <a href="<?= base_url('Dashboard') ?>" class="btn btn-secondary mt-3">Kembali ke Dashboard</a>
    </div>
    <script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
</body>
</html>
