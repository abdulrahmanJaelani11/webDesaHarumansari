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
                        <a href="<?= base_url("pendaftar-sktm/" . $row['id']); ?>" class="btn btn-sm btn-primary btn-block">Detail</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>