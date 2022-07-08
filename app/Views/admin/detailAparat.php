<?= $this->extend('template/admin'); ?>

<?= $this->section('content'); ?>
<div class="card shadow">
    <div class="row">
        <div class="col-lg-4">
            <img class="img-fluid img-thumbnail" src="<?= base_url("assets"); ?>/img/<?= $aparatDesa['img']; ?>">
        </div>
        <div class="col-lg-8">
            <input type="text" class="form-control" readonly value="<?= $aparatDesa['nama']; ?>">
        </div>
    </div>
</div>
<?= $this->endSection(); ?>