<?= $this->extend('template/admin'); ?>

<?= $this->section('content'); ?>
<button type="submit" name="hapusBerita" class="btn btn-sm btn-danger btnHapus"><i class="fa fa-fw fa-trash"></i> Hapus Berita </button>
<div class="row  mt-2" style="margin-bottom: 10%;">
    <div class="col-md-7 text-gray-900">
        <div class="rinciBerita"></div>
    </div>
    <div class="col-md-5 text-gray-900">
        <div class="card shadow">
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="hidden" name="id" value="<?= $berita['id']; ?>">
                        <input type="text" name="judul" id="judul" class="form-control" value="<?= $berita['judul']; ?>">
                        <div class="invalid-feedback invalid-judul"></div>
                    </div>
                    <div class="form-group">
                        <label for="keterangan">keterangan</label>
                        <textarea name="keterangan" id="keterangan" cols="30" rows="15" class="form-control"><?= $berita['keterangan']; ?></textarea>
                        <div class="invalid-feedback invalid-keterangan"></div>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="update" class="btn btn-sm btn-primary"> Update </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
<?= $this->section('script'); ?>
<script src="<?= base_url("assets"); ?>/js/jquery.js"></script>
<script>
    function getRinciBerita() {
        $.ajax({
            url: "<?= base_url("Admin/getRinciBerita"); ?>",
            type: "post",
            data: {
                id: <?= $berita['id']; ?>
            },
            dataType: 'json',
            success: function(data) {
                $(".rinciBerita").html(data)
            }
        });
    }

    $(document).ready(function() {
        getRinciBerita()

        // Hapus Berita 
        $(".btnHapus").click(function(e) {
            e.preventDefault()


            Swal.fire({
                title: 'Yakin',
                icon: 'warning',
                text: 'Yakin untuk menghapus berita?',
                showDenyButton: false,
                showCancelButton: true,
                confirmButtonText: 'Yakin',
                denyButtonText: `Don't save`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $.ajax({
                        url: "<?= base_url("Proses/hapusBerita"); ?>",
                        type: "post",
                        data: {
                            id: <?= $berita['id']; ?>
                        },
                        dataType: 'json',
                        success: function(data) {
                            console.log(data)
                            if (data.sukses) {
                                Swal.fire({
                                    title: 'Sukses',
                                    icon: 'success',
                                    text: data.sukses,
                                    showDenyButton: false,
                                    showCancelButton: false,
                                    confirmButtonText: 'OK',
                                }).then((result) => {
                                    /* Read more about isConfirmed, isDenied below */
                                    if (result.isConfirmed) {
                                        document.location = "<?= base_url("data-berita"); ?>"
                                    }
                                })
                            }
                        }
                    });
                }
            })
        })

        // Update Berita
        $("form").on('submit', function(e) {
            e.preventDefault()

            $.ajax({
                url: "<?= base_url("Proses/updateBerita"); ?>",
                type: "post",
                data: $(this).serialize(),
                dataType: 'json',
                success: function(data) {
                    console.log(data)
                    if (data.error) {
                        if (data.error.judul) {
                            $("#judul").addClass('is-invalid')
                            $(".invalid-judul").text(data.error.judul)
                        }
                        if (data.error.keterangan) {
                            $("#keterangan").addClass('is-invalid')
                            $(".invalid-keterangan").text(data.error.keterangan)
                        }
                    }

                    if (data.sukses) {
                        Swal.fire(
                            'Berhasil!',
                            data.sukses,
                            'success'
                        )
                        getRinciBerita()
                    }
                }
            });
        })
    })
</script>
<?= $this->endSection(); ?>