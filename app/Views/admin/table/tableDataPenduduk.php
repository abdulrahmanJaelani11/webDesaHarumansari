<?= $this->extend('template/table'); ?>

<?= $this->section('content'); ?>
<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Jenis Kelamin</th>
                <th>Jumlah</th>
                <th style="width: 100px;">Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($dataPenduduk as $row) : ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $row['jk']; ?></td>
                    <td><?= $row['jumlah']; ?></td>
                    <td>
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" name="ubah" class="btn btn-sm btn-block btn-primary btnUbah" value="<?= $row['jumlah']; ?>" id="<?= $row['id']; ?>"> <i class="fa fa-fw fa-edit "></i> </button>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection(); ?>