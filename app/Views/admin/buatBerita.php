<?= $this->extend("template/admin"); ?>

<?= $this->section('content'); ?>
<div class="row">
    <div class="col">
        <div class="card shadow" style="margin-bottom: 15%;">
            <div class="card-header">
                <h3>Buat Berita</h3>
            </div>
            <div class="card-body">
                <form action="Proses/prosesBuatBerita" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-4 form-group">
                            <label for="judul">Judul</label>
                            <input type="text" name="judul" id="judul" value="<?= old("judul") ? old("judul") : ''; ?>" class="form-control <?= $validasi->getError('judul') ? 'is-invalid' : ''; ?>" placeholder="Judul Berita">
                            <?php if ($validasi->getError('foto')) : ?>
                                <div class="invalid-feedback invalid-foto"><?= $validasi->getError('judul'); ?></div>
                            <?php endif ?>
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="kategori">Kategori</label>
                            <select name="kategori" id="kategori" class="form-control <?= $validasi->getError('kategori') ? 'is-invalid' : ''; ?>">
                                <option value="">Pilih Kategori</option>
                                <?php foreach ($kategori as $row) : ?>
                                    <option value="<?= $row['id']; ?>"><?= $row['kategori']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?php if ($validasi->getError('kategori')) : ?>
                                <div class="invalid-feedback invalid-kategori"><?= $validasi->getError('kategori'); ?></div>
                            <?php endif ?>
                        </div>
                        <div class="col-md-4 form-group row">
                            <div class="col-4">
                                <img src="" class="img-fluid" alt="" id="liveImg">
                            </div>
                            <div class="col-8">
                                <label for="foto">Foto</label>
                                <input type="file" name="foto" id="foto" onchange="LiatIMG()" class="form-control <?= $validasi->getError('foto') ? 'is-invalid' : ''; ?>" placeholder="foto Berita">
                                <?php if ($validasi->getError('foto')) : ?>
                                    <div class="invalid-feedback invalid-foto"><?= $validasi->getError('foto'); ?></div>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="judul">Keterangan</label>
                            <textarea name="keterangan" id="keterangan" cols="30" rows="15" placeholder="Keterangan Berita" class="form-control"><?= old("judul") ? old("keterangan") : ''; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="reset" name="reset" class="btn btn-sm btn-primary"> Hapus </button>
                        <button type="submit" name="simpan" class="btn btn-sm btn-primary"> Buat Berita </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section("script"); ?>
<script src="<?= base_url("assets"); ?>/js/jquery.js"></script>

<script>
    function LiatIMG(e) {
        const foto = document.querySelector("#foto")
        const liveImg = document.querySelector("#liveImg")

        const fileFoto = new FileReader()
        fileFoto.readAsDataURL(foto.files[0])

        fileFoto.onload = function(e) {
            liveImg.src = e.target.result
        }
    }
    $(document).ready(function() {
        $("input").click(function() {
            $(this).removeClass('is-invalid')
        })

        // $("form").submit(function(e) {
        //     e.preventDefault()

        //     $.ajax({
        //         url: $(this).attr("action"),
        //         type: $(this).attr("method"),
        //         data: $(this).serialize(),
        //         dataType: 'json',
        //         success: function(data) {
        //             console.log(data)
        //             if (data.error) {
        //                 if (data.error.judul) {
        //                     $("#judul").addClass("is-invalid")
        //                     $(".invalid-judul").text(data.error.judul)
        //                 }
        //                 if (data.error.foto) {
        //                     $("#foto").addClass("is-invalid")
        //                     $(".invalid-foto").text(data.error.foto)
        //                 }
        //             }
        //         }
        //     });
        // })
    })
</script>
<?= $this->endSection(); ?>