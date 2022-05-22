<?= $this->extend('template/admin'); ?>

<?= $this->section('content'); ?>
<div class="card shadow" style="margin-bottom: 20%;">
    <div class="card-header">
        <h3 class=" font-weight-bold"><?= $title; ?></h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Nik</th>
                        <th>Telepon</th>
                        <th>Status</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($pendaftar as $row) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $row['nama']; ?></td>
                            <td><?= $row['nik']; ?></td>
                            <td>
                                <div class="text-center">
                                    <p class="<?= $row['status_surat'] == 'selesai' ? 'bg-success' : 'bg-warning'; ?> text-light p-1" style="border-radius: 7px;"><?= $row['status_surat']; ?></p>
                                </div>
                            </td>
                            <td><a href="http://wa.me/<?= $row['tlp']; ?>" class="btn btn-primary btn-block" target="blank">Hubungi WA</a></td>
                            <td>
                                <a href="<?= base_url("pendaftar-sktm/" . $row['id']); ?>" class="btn btn-sm btn-primary btn-block">Detail</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>