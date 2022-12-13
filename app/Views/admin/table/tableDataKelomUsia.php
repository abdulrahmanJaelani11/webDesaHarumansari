<?= $this->extend('template/table'); ?>

<?= $this->section('content'); ?>
<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Usia</th>
                <th>Jumlah</th>
                <th style="width: 70px;">Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($dataKelompokUsia as $row) : ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $row['usia']; ?></td>
                    <td><?= $row['jumlah']; ?></td>
                    <td>
                        <button type="submit" name="ubah" class="btn btn-sm btn-block btn-primary btnUbah" value="<?= $row['jumlah']; ?>" id="<?= $row['id']; ?>">
                            <i class="fa fa-fw fa-edit"></i>
                        </button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection(); ?>