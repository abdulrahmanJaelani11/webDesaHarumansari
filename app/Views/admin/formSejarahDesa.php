<?= $this->extend('template/admin'); ?>
<?= $this->section('content'); ?>
<div class="card shadow" style="margin-bottom: 10%;">
    <div class="card-body">
        <h3>Atur Sejarah Desa</h3>
        <hr>
        <form action="<?= base_url("Proses/simpanSejarah"); ?>" method="post">
            <div class="form-group">
                <textarea name="sejarah" id="sejarah" cols="30" rows="10" class="form-control" placeholder="Catat Sejarah Disini"><?= $dataDesa['sejarah'] ? $dataDesa['sejarah'] : ''; ?></textarea>
            </div>
            <div class="form-group">
                <button type="submit" name="simpan" class="btn btn-sm btn-primary"> Simpan </button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script src="<?= base_url("assets"); ?>/js/jquery.js"></script>
<script src="<?= base_url("assets"); ?>/js/sweetalert2.js"></script>
<script>
    $(document).ready(function() {
        $("form").submit(function(e) {
            e.preventDefault()

            $.ajax({
                url: $(this).attr("action"),
                type: $(this).attr("method"),
                data: $(this).serialize(),
                dataType: 'json',
                success: function(data) {
                    if (data.status == 200) {
                        Swal.fire(
                            'Berhasil',
                            data.pesan,
                            'success'
                        )
                    }
                }
            });
        })
    })
</script>
<?= $this->endSection(); ?>