<?= $this->extend('template/admin'); ?>

<?= $this->section('content'); ?>
<?php if (session()->getFlashdata('pesan')) : ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('pesan'); ?>
    </div>
<?php endif ?>
<div class="card shadow">
    <div class="card-header">
        <h3>Data Berita</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <a class="btn btn-sm btn-primary" href="<?= base_url("buat-berita"); ?>"><i class="fas fa-newspaper"></i> Buat Berita</a>
                <div class="row">
                    <?php foreach ($berita as $row) : ?>
                        <div class="col-md-4">
                            <div class="card shadow mt-3">
                                <a href="<?= base_url("assetsAdmin"); ?>/img/<?= $row['img']; ?>" target="blank">
                                    <img src="<?= base_url("assetsAdmin"); ?>/img/<?= $row['img']; ?>" class="card-img-top" alt="...">
                                </a>
                                <div class="card-body">
                                    <h5 class="card-title font-weight-bold"><?= $row['judul']; ?></h5>
                                    <span>Penulis : <?= $row['penulis']; ?></span>
                                    <br>
                                    <span>pada : <?= $row['tanggal']; ?></span>
                                    <a href="<?= base_url("detailBerita/" . $row['id']); ?>" class="btn btn-primary btn-block btn-sm mt-3">Lihat</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>