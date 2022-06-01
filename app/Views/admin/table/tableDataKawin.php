<?= $this->extend('template/table'); ?>

<?= $this->section('content'); ?>
<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Status Perkawinan</th>
                <th>Jumlah</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($dataKawin as $row) : ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $row['status_kawin']; ?></td>
                    <td><?= $row['jumlah']; ?></td>
                    <td>
                        <button type="submit" name="ubah" class="btn btn-sm btn-primary btnUbah btn-block" value="<?= $row['jumlah']; ?>" id="<?= $row['id']; ?>"> Ubah </button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection(); ?>