<?= $this->extend('template/table'); ?>
<?= $this->section('content'); ?>
<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Atribut</th>
                <th>Jumlah</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($dataDesa as $row) : ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $row['atribut']; ?></td>
                    <td><?= $row['jumlah']; ?></td>
                    <td>
                        <form action="<?= base_url("proses/hapusDataDesa"); ?>" method="post" class="formHapus">
                            <input type="hidden" name="id" id="id" value="<?= $row['id']; ?>">
                            <button type="submit" name="hapus" class="btn btnHapus btn-sm btn-danger btnDel btn-block"> Hapus </button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection(); ?>