<?= $this->extend('template/table'); ?>
<?= $this->section('content'); ?>
<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Atribut</th>
                <th>Jumlah</th>
                <th style="width: 100px;">Opsi</th>
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
                        <div class="row">
                            <div class="col-lg-6">
                                <form action="<?= base_url("proses/hapusDataDesa"); ?>" method="post" class="formHapus">
                                    <input type="hidden" name="id" id="id" value="<?= $row['id']; ?>">
                                    <button type="submit" name="hapus" class="btn btnHapus btn-sm btn-danger btnDel btn-block"> <i class="fa fa-fw fa-trash "></i> </button>
                                </form>
                            </div>
                            <div class="col-lg-6">
                                <button class="btn btn-sm btnEdit btn-primary btn-block" onclick="getDataDesa(<?= $row['id']; ?>)" href="#" data-toggle="modal" data-target="#logoutModal"> <i class="fa fa-fw fa-edit "></i> </button>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection(); ?>