<div class="card shadow">
    <img src="<?= base_url("assetsAdmin"); ?>/img/<?= $berita['img']; ?>" alt="">
    <div class="card-body">
        <p><i class="fa fa-fw fa-user"></i> <?= $berita['penulis']; ?></p>
        <p><i class="fa fa-fw fa-clock"></i> <?= $berita['tanggal']; ?></p>
        <h3 class="font-weight-bold"><?= $berita['judul']; ?></h3>
        <p><?= $berita['keterangan']; ?></p>
    </div>
</div>