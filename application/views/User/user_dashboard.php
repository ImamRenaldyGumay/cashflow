<style>
        body {
            background-color: #f8f9fa;
        }
        .header {
            background-color: #ffffff;
            padding: 20px;
            border-bottom: 1px solid #dee2e6;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .header .title {
            font-size: 24px;
            font-weight: bold;
            color: #007bff;
        }
        .header .description {
            font-size: 16px;
            color: #6c757d;
        }
        .saldo {
            font-size: 24px;
            font-weight: bold;
            color: #007bff;
        }
        .saldo-info {
            font-size: 14px;
            color: #6c757d;
        }
        .icon-buttons {
            display: flex;
            gap: 10px;
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .btn-custom {
            margin: 5px;
        }
        .description {
            background-color: #f8d7da; /* Warna latar belakang */
            padding: 10px; /* Padding untuk ruang di dalam */
            border-radius: 5px; /* Sudut melengkung */
            border: 1px solid #f5c6cb; /* Border */
        }
        .table-success {
            background-color: #d4edda; /* Warna hijau muda */
        }

        .table-danger {
            background-color: #f8d7da; /* Warna merah muda */
        }

        table.dataTable {
            border: 1px solid #ccc;
        }
        table.dataTable thead th {
            background-color: #f2f2f2;
            color: #333;
        }
        table.dataTable tbody tr:hover {
            background-color: #e0e0e0;
        }
    </style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Starter Page</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Starter Page</li>
            </ol>
        </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container mt-5">
            <div class="header">
                <div>
                    <div class="title">Dompet Saya</div>
                    <div class="description">Uang dompet</div>
                </div>
                <div class="icon-buttons">
                    <button id="exportExcel" class="btn btn-success">Ekspor ke Excel</button>
                    <button id="exportCSV" class="btn btn-info">Ekspor ke CSV</button>
                    <button id="exportPDF" class="btn btn-danger">Ekspor ke PDF</button>
                </div>
            </div>

        <div class="saldo mt-3">
            Rp 8.402.221,00
        </div>
        <div class="saldo-info">
            Semua Buku Kas: Rp 8.402.221,00
        </div>

        <div class="mb-3">
            <button class="btn btn-success btn-custom" data-toggle="modal" data-target="#modalPemasukan">Catat Pemasukan</button>
            <button class="btn btn-danger btn-custom" data-toggle="modal" data-target="#modalPengeluaran">Catat Pengeluaran</button>
            <button class="btn btn-info btn-custom" data-toggle="modal" data-target="#transaksiModal">Transfer</button>
        </div>

        <div class="form-group">
            <label for="bulan">Tampilkan:</label>
            <select class="form-control" id="bulan">
                <option value="november">November</option>
                <option value="desember">Desember</option>
            </select>
        </div>

        <table id="transaksiTable" class="table table-bordered">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Type</th>
                    <th>Tanggal</th>
                    <th>Kategori</th>
                    <th>Deskripsi</th>
                    <th>Nominal</th>
                    <th>Saldo</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;?>
                <?php foreach ($transaksi as $transaksi): ?>
                    <tr class="<?= ($transaksi['type'] == 'pemasukan') ? 'table-success' : 'table-danger' ?>">
                    <!-- <tr> -->
                        <td><?= $no++ ?></td>
                        <td><?= $transaksi['type']; ?></td>
                        <td><?= date('d M Y, H:i', strtotime($transaksi['tanggal'])); ?></td>
                        <td><?= $transaksi['kategori']; ?></td>
                        <td>
                            <div class="deskripsi">
                                <strong><?= $transaksi['deskripsi']; ?></strong>
                                <p>ditulis oleh: <?= $transaksi['penulis']; ?></p>
                            </div>
                        </td>
                        <td>Rp <?= number_format($transaksi['nominal'], 2, ',', '.'); ?></td>
                        <td>ss</td>
                        <td><button class="btn btn-warning btn-sm">Edit</button></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Modal Pengeluaran -->
<div class="modal fade" id="modalPengeluaran" tabindex="-1" role="dialog" aria-labelledby="modalPengeluaranLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalPengeluaranLabel">Tambah Pengeluaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="tambah_pengeluaran" action="<?= base_url('Pengeluaran')?>" method="post">
                <div class="modal-body">
                    <input type="hidden" id="user_id" name="user_id" value="<?= $this->session->userdata('user_id')?>">
                    <input type="hidden" id="book_id" name="book_id" value="<?= $book_id?>">
                    <div class="form-group">
                        <label for="tanggalPemasukan">Tanggal</label>
                        <input type="datetime-local" class="form-control" id="tanggal" name="tanggal" required>
                    </div>
                    <div class="form-group">
                        <label for="nominalPemasukan">Nominal</label>
                        <input type="number" class="form-control" id="nominal" name="nominal" required>
                    </div>
                    <div class="form-group">
                        <label for="kategoriPemasukan">Kategori</label>
                        <select class="form-control" id="kategori" name="kategori" required>
                            <option selected>Choose...</option>
                            <?php foreach ($pengeluaran as $category): ?>
                                <option value="<?= $category['category_name'] ?>"><?= $category['category_name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="deskripsiPemasukan">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi"></textarea>
                    </div>
                    <input type="hidden" id="penulis" name="penulis" value="<?= $this->session->userdata('name'); ?>">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-danger">Simpan Pemasukan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Pemasukan -->
<div class="modal fade" id="modalPemasukan" tabindex="-1" role="dialog" aria-labelledby="modalPemasukanLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalPemasukanLabel">Tambah Pemasukan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="tambah_pemasukkan" action="<?= base_url('Pemasukkan')?>" method="post">
                <div class="modal-body">
                    <input type="hidden" id="user_id" name="user_id" value="<?= $this->session->userdata('user_id')?>">
                    <input type="hidden" id="book_id" name="book_id" value="<?= $book_id?>">
                    <div class="form-group">
                        <label for="tanggalPemasukan">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                    </div>
                    <div class="form-group">
                        <label for="nominalPemasukan">Nominal</label>
                        <input type="number" class="form-control" id="nominal" name="nominal" required>
                    </div>
                    <div class="form-group">
                        <label for="kategoriPemasukan">Kategori</label>
                        <select class="form-control" id="kategori" name="kategori" required>
                            <option selected>Choose...</option>
                            <?php foreach ($pemasukkan as $category): ?>
                                <option value="<?= $category['category_name'] ?>"><?= $category['category_name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="deskripsiPemasukan">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi"></textarea>
                    </div>
                    <input type="hidden" id="penulis" name="penulis" value="<?= $this->session->userdata('name'); ?>">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-success">Simpan Pemasukan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- <script>
    // Event listener untuk form Pemasukan
    $('#formPemasukan').on('submit', function(e) {
        e.preventDefault();
        // Ambil data dari form dan kirim ke server
        const data = $(this).serialize();
        console.log('Data Pemasukan:', data);
        // Lakukan AJAX untuk menyimpan data
        // $.post('url_to_save_pemasukan', data, function(response) {
        //     // Handle response
        // });
        $('#modalPemasukan').modal('hide'); // Tutup modal setelah simpan
    });

    // Event listener untuk form Pengeluaran
    $('#formPengeluaran').on('submit', function(e) {
        e.preventDefault();
        // Ambil data dari form dan kirim ke server
        const data = $(this).serialize();
        console.log('Data Pengeluaran:', data);
        // Lakukan AJAX untuk menyimpan data
        // $.post('url_to_save_pengeluaran', data, function(response) {
        //     // Handle response
        // });
        $('#modalPengeluaran').modal('hide'); // Tutup modal setelah simpan
    });
</script> -->

