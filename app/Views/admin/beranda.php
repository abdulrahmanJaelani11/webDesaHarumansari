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
        <div class="card">
            <div class="card-body">
                <h3 class="font-weight-bold text-gray-800">Data Desa</h3>
                <hr>
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </div>
</div>

<div class="row mt-3">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h3 class="font-weight-bold text-gray-800">Data Penduduk</h3>
                <hr>
                <canvas id="dataPenduduk"></canvas>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h3 class="font-weight-bold text-gray-800">Data Status Perkawinan</h3>
                <hr>
                <canvas id="dataStatusPerkawinan"></canvas>
            </div>
        </div>
    </div>
</div>


<div class="row mt-3">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h3 class="font-weight-bold text-gray-800">Data Agama</h3>
                <hr>
                <canvas id="dataAgama"></canvas>
            </div>
        </div>
    </div>
</div>

<div class="row mt-3">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h3 class="font-weight-bold text-gray-800">Data Kelompok Usia</h3>
                <hr>
                <canvas id="dataKelompokUsia"></canvas>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script src="<?= base_url("assets"); ?>/js/chart.js"></script>
<script src="<?= base_url("assets"); ?>/js/beranda/beranda.js"></script>
<script src="<?= base_url("assets"); ?>/js/jquery.js"></script>
<script>
    dataDesa("<?= base_url("proses/getDataDesa"); ?>")
    dataPenduduk('<?= base_url("proses/getDataPenduduk"); ?>')
    dataStatusKawin("<?= base_url("proses/getDataStatusKawin"); ?>")
    dataAgama("<?= base_url("proses/getDataAgama"); ?>")
    dataKelomUsia("<?= base_url("proses/getDataKelomUsia"); ?>")
</script>
<?= $this->endSection(); ?>