<div class="container mt-4">
    <h1><?= $title ?></h1>

    <form method="get" action="<?= base_url('Report') ?>">
        <div class="form-group">
            <label for="filter">Filter</label>
            <select class="form-control" id="filter" name="filter" required>
                <option value="">-- Pilih Filter --</option>
                <option value="harian" <?= isset($filter) && $filter == 'harian' ? 'selected' : '' ?>>Harian</option>
                <option value="bulanan" <?= isset($filter) && $filter == 'bulanan' ? 'selected' : '' ?>>Bulanan</option>
                <option value="tahunan" <?= isset($filter) && $filter == 'tahunan' ? 'selected' : '' ?>>Tahunan</option>
            </select>
        </div>
        <div class="form-group">
            <label for="tanggal">Tanggal (untuk harian)</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= isset($tanggal) ? $tanggal : '' ?>">
        </div>
        <div class="form-group">
            <label for="bulan">Bulan (untuk bulanan)</label>
            <input type="month" class="form-control" id="bulan" name="bulan" value="<?= isset($bulan) ? $bulan : '' ?>">
        </div>
        <div class="form-group">
            <label for="tahun">Tahun (untuk tahunan)</label>
            <input type="number" class="form-control" id="tahun" name="tahun" placeholder="Contoh: 2024" value="<?= isset($tahun) ? $tahun : '' ?>">
        </div>
        <button type="submit" class="btn btn-primary">Tampilkan</button>
    </form>

    <h2>Hasil Laporan</h2>
    <?php if (!empty($transaksi)): ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Keterangan</th>
                    <th>Jenis</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($transaksi as $i => $item): ?>
                    <tr>
                        <td><?= $i + 1 ?></td>
                        <td><?= $item['tanggal'] ?></td>
                        <td><?= $item['keterangan'] ?></td>
                        <td><?= ucfirst($item['jenis']) ?></td>
                        <td><?= number_format($item['jumlah'], 2) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Tidak ada data untuk ditampilkan.</p>
    <?php endif; ?>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const filter = document.getElementById('filter');
        const tanggalInput = document.getElementById('tanggal');
        const bulanInput = document.getElementById('bulan');
        const tahunInput = document.getElementById('tahun');

        filter.addEventListener('change', function() {
            const today = new Date();

            if (this.value === 'harian') {
                const todayDate = today.toISOString().split('T')[0];
                tanggalInput.value = todayDate;
                bulanInput.value = '';
                tahunInput.value = '';
            } else if (this.value === 'bulanan') {
                const currentMonth = today.toISOString().slice(0, 7);
                tanggalInput.value = '';
                bulanInput.value = currentMonth;
                tahunInput.value = '';
            } else if (this.value === 'tahunan') {
                const currentYear = today.getFullYear();
                tanggalInput.value = '';
                bulanInput.value = '';
                tahunInput.value = currentYear;
            } else {
                tanggalInput.value = '';
                bulanInput.value = '';
                tahunInput.value = '';
            }
        });
    });
</script>
