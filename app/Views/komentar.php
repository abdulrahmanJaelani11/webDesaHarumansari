<!-- Comment List Start -->
<div class="mb-5">
    <div class="section-title section-title-sm position-relative pb-3 mb-4">
        <h3 class="mb-0"> <?= count($komentar); ?> Komentar</h3>
    </div>
    <?php foreach ($komentar as $row) : ?>
        <div class="d-flex mb-4">
            <img src="<?= base_url("assetsAdmin"); ?>/img/undraw_profile.svg" class="img-fluid rounded" style="width: 45px; height: 45px;">
            <div class="ps-3">
                <h6><a href=""><?= $row['nama']; ?></a> <small><i><?= $row['tanggal']; ?></i></small></h6>
                <p><?= $row['komentar']; ?></p>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<!-- Comment List End -->