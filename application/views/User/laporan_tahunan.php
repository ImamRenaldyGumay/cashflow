<style>
    .content-wrapper {
            background-color: #f8f9fa;
            padding: 20px;
        }
    .header {
        /* background-color: #ffffff; */
        padding: 20px;
        /* border-bottom: 1px solid #dee2e6; */
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
<!-- <div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Laporan Tahunan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Starter Page</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    
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
        </div>
    </div>
</div> -->

<div class="container mt-5">
    <h2>Monthly Financial Report - December 2024</h2>
    
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">Monthly Balance</h5>
            <p class="card-text">Rp 10,000,000.00</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <h3>Income</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>Category</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Salary</td>
                        <td>Rp 8,000,000.00</td>
                    </tr>
                    <tr>
                        <td>Freelance</td>
                        <td>Rp 2,000,000.00</td>
                    </tr>
                    <tr class="table-primary">
                        <td><strong>Total Income</strong></td>
                        <td><strong>Rp 10,000,000.00</strong></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-6">
            <h3>Expenses</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>Category</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Rent</td>
                        <td>Rp 3,000,000.00</td>
                    </tr>
                    <tr>
                        <td>Groceries</td>
                        <td>Rp 2,000,000.00</td>
                    </tr>
                    <tr>
                        <td>Utilities</td>
                        <td>Rp 1,000,000.00</td>
                    </tr>
                    <tr class="table-danger">
                        <td><strong>Total Expenses</strong></td>
                        <td><strong>Rp 6,000,000.00</strong></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-4">
        <h3>Navigation</h3>
        <div class="btn-group" role="group" aria-label="Month navigation">
            <a href="#" class="btn btn-secondary">&laquo; Previous Month</a>
            <a href="#" class="btn btn-primary">Current Month</a>
            <a href="#" class="btn btn-secondary">Next Month &raquo;</a>
        </div>
    </div>
</div>
