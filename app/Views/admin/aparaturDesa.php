<?= $this->extend('template/admin'); ?>

<?= $this->section('content'); ?>
<div class="card shadow" style="margin-bottom: 10%;">
    <div class="card-body">
        <h3><?= $title; ?></h3>
        <hr>
        <?php foreach ($aparatDesa as $row) : ?>
            <div class="col-lg-4">
                <div class="card text-center">
                    <img class="img-fluid" src="<?= base_url("assets"); ?>/img/<?= $row['img']; ?>">
                    <div class="card-body">
                        <h4 class="font-weight-bold my-2"><?= $row['nama']; ?></h4>
                        <p><?= $row['jabatan']; ?></p>
                        <a href="<?= base_url("detail-aparat/" . $row['id']); ?>" class="btn btn-sm btn-primary">Selengkapnya</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?= $this->endSection(); ?>