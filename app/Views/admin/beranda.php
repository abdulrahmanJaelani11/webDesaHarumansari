<?= $this->extend('template/admin'); ?>

<?= $this->section('content'); ?>
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <a href="<?= base_url('data-berita'); ?>" style="text-decoration: none;">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah Berita</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($jumlahBerita); ?> Berita</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-newspaper fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <a href="<?= base_url('riwayat-pendaftar-sktm'); ?>" style="text-decoration: none;">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah Pendaftar SKTM Selesai</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= is_array($jumlahPendaftarSktmAktif) ? count($jumlahPendaftarSktmAktif) : 0; ?> Orang</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <a href="<?= base_url('pendaftar-sktm'); ?>" style="text-decoration: none;">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah Pendaftar SKTM </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($jumlahPendaftarSktm); ?> Orang</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <h3 class="font-weight-bold text-gray-800">Data Desa</h3>
        <hr>
    </div>
    <?php foreach ($dataDesa as $row) : ?>
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="<?= base_url('data-desa'); ?>" style="text-decoration: none;">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    <?= $row['atribut']; ?></div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $row['jumlah']; ?> Orang</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    <?php endforeach; ?>
</div>

<div class="row">
    <div class="col-12">
        <h3 class="font-weight-bold text-gray-800">Data Penduduk</h3>
        <hr>
    </div>
    <?php foreach ($dataPenduduk as $row) : ?>
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="<?= base_url('data-penduduk'); ?>" style="text-decoration: none;">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    <?= $row['jk']; ?></div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $row['jumlah']; ?> Orang</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    <?php endforeach; ?>
</div>

<div class="row">
    <div class="col-12">
        <h3 class="font-weight-bold text-gray-800">Data Status Perkawinan</h3>
        <hr>
    </div>
    <?php foreach ($dataStatusKawin as $row) : ?>
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="<?= base_url('status-kawin'); ?>" style="text-decoration: none;">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    <?= $row['status_kawin']; ?></div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $row['jumlah']; ?> Orang</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    <?php endforeach; ?>
</div>
<div class="row">
    <div class="col-12">
        <h3 class="font-weight-bold text-gray-800">Data Agama</h3>
        <hr>
    </div>
    <?php foreach ($dataAgama as $row) : ?>
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="<?= base_url('data-agama'); ?>" style="text-decoration: none;">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    <?= $row['agama']; ?></div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $row['jumlah']; ?> Orang</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    <?php endforeach; ?>
</div>
<div class="row">
    <div class="col-12">
        <h3 class="font-weight-bold text-gray-800">Data Kelompok Usia</h3>
        <hr>
    </div>
    <?php foreach ($dataKelomUsia as $row) : ?>
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="<?= base_url('data-kelompok-usia'); ?>" style="text-decoration: none;">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    <?= $row['usia']; ?></div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $row['jumlah']; ?> Orang</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    <?php endforeach; ?>
</div>
<?= $this->endSection(); ?>