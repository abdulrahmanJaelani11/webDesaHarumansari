<?= $this->extend('template/table'); ?>

<?= $this->section('content'); ?>
<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Jenis Kelamin</th>
                <th>Jumlah</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($dataAgama as $row) : ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $row['agama']; ?></td>
                    <td><?= $row['jumlah']; ?></td>
                    <td>
                        <button type="submit" name="ubah" class="btn btn-sm btn-block btn-primary btnUbah" value="<?= $row['jumlah']; ?>" id="<?= $row['id']; ?>"> Ubah </button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection(); ?>