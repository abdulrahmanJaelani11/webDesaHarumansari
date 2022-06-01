<?= $this->extend('template/admin'); ?>
<?= $this->section('content'); ?>
<div class="card shadow" style="margin-bottom: 10%;">
    <div class="card-body">
        <h3>Atur Visi Misi Desa</h3>
        <hr>
        <form action="<?= base_url("Proses/simpanVisiMisi"); ?>" method="post">
            <div class="form-group">
                <textarea name="visiMisi" id="summernote" cols="30" rows="10" class="form-control" placeholder="Visi"></textarea>
            </div>
            <!-- <div class="form-group">
                <textarea name="misi" id="misi" cols="30" rows="10" class="form-control" placeholder="Misi"></textarea>
            </div> -->
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
        $('#summernote').summernote({
            placeholder: 'Catat Visi Dan Misi',
            tabsize: 2,
            height: 400
        });
        $("form").submit(function(e) {
            e.preventDefault()

            $.ajax({
                url: $(this).attr("action"),
                type: $(this).attr("method"),
                data: $(this).serialize(),
                dataType: 'json',
                success: function(data) {
                    console.log(data)
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