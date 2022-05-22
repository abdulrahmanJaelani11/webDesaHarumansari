<?= $this->extend("template/admin"); ?>

<?= $this->section('content'); ?>
<a href="<?= base_url("tambah-layanan"); ?>" class="btn btn-sm btn-primary mb-3">Tambah Layanan</a>
<div class="card">
    <div class="card-body">
        <h3>Daftar Layanan Online Desa Harumansari</h3>
        <hr>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Layanan</th>
                        <th>Singkatan</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($jns_layanan as $row) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $row['layanan']; ?></td>
                            <td><?= $row['singkatan']; ?></td>
                            <td>
                                <a href="<?= base_url("pendaftar/" . $row['id']); ?>" class="btn btn-sm btn-primary btn-block">Lihat</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>