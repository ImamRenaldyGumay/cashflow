<style>
    .content-wrapper{
        padding: 10px 60px;
    }
    .content {
            /* background-color: #f8f9fa; */
            /* background-color: #007bff; */
            /* padding: 20px; */
        }
    .header {
        /* background-color: #ffffff; */
        /* padding: 20px; */
        /* border-bottom: 1px solid #dee2e6; */
        /* padding: 5px; */
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
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <!-- <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Laporan Harian</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Starter Page</li>
                    </ol>
                </div>
            </div>
        </div> -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="header">
                <div class="d-flex align-items-center">
                    <img width="100" height="100" src="https://img.icons8.com/plasticine/100/chart.png" alt="chart"/>
                    <div class="">
                        <div class="title">Dompet Saya<?= $user_id ?></div>
                        <div class="description"><?= formatTanggal($tanggal_sekarang, 'long')?></div>
                    </div>
                </div>
                <?php if (empty($transaksi)) : ?>
                    <div class="icon-buttons">
                        <button id="exportExcel" class="btn btn-success">Ekspor ke Excel</button>
                        <button id="exportCSV" class="btn btn-info">Ekspor ke CSV</button>
                        <button id="exportPDF" class="btn btn-danger">Ekspor ke PDF</button>
                    </div>
                <?php endif ?>
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
        </div>
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->