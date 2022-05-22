<?= $this->extend('template/admin'); ?>

<?= $this->section('content'); ?>
<div class="card shadow" style="margin-bottom: 15%;">
    <div class="card-body">
        <h3>Lengkapi Profil Desa</h3>
        <hr>
        <?php if ($profilDesa == null) : ?>
            <form action="<?= base_url("proses/setProfilDesa"); ?>" method="post">
            <?php else : ?>
                <form action="<?= base_url("proses/editProfilDesa"); ?>" method="post">
                    <input type="hidden" name="id" id="id" value="<?= $profilDesa['id']; ?>">
                <?php endif ?>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="nama_desa">Nama Desa</label>
                            <input type="text" name="nama_desa" id="nama_desa" class="form-control" value="<?= $profilDesa['nama_desa'] ? $profilDesa['nama_desa'] : ''; ?>" placeholder="Masukan nama desa">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="provinsi">Provinsi</label>
                            <input type="text" name="provinsi" id="provinsi" placeholder="Masukan Provinsi" class="form-control" value="<?= $profilDesa['provinsi'] ? $profilDesa['provinsi'] : ''; ?>">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="kabupaten">Kabupaten</label>
                            <input type="text" name="kabupaten" id="kabupaten" placeholder="Masukan kabupaten" class="form-control" value="<?= $profilDesa['kabupaten'] ? $profilDesa['kabupaten'] : ''; ?>">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="kecamatan">Kecamatan</label>
                            <input type="text" name="kecamatan" id="kecamatan" placeholder="Masukan Kecamatan" class="form-control" value="<?= $profilDesa['kecamatan'] ? $profilDesa['kecamatan'] : ''; ?>">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" class="form-control" placeholder="Masukan Email" value="<?= $profilDesa['email'] ? $profilDesa['email'] : ''; ?>">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="telepon">Telepon</label>
                            <input type="text" name="telepon" id="telepon" class="form-control" placeholder="Masukan Telepon" value="<?= $profilDesa['tlp'] ? $profilDesa['tlp'] : ''; ?>">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="kode_pos">Kode Pos</label>
                            <input type="number" name="kode_pos" id="kode_pos" class="form-control" placeholder="Masukan Kode Pos" value="<?= $profilDesa['kode_pos'] ? $profilDesa['kode_pos'] : ''; ?>">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" id="alamat" cols="30" rows="10" placeholder="Masukan Alamat Desa" class="form-control"><?= $profilDesa['alamat'] ? $profilDesa['alamat'] : ''; ?></textarea>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <button type="submit" name="simpan" class="btn btn-primary"> Simpan </button>
                        </div>
                    </div>
                </div>
                </form>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script src="<?= base_url("assets"); ?>/js/jquery.js"></script>
<script src="<?= base_url("assets"); ?>/js/sweetalert2.js"></script>
<script>
    function getProvinsi() {
        $.ajax({
            url: "https://dev.farizdotid.com/api/daerahindonesia/provinsi",
            type: "GET",
            dataType: 'json',
            success: function(data) {
                // console.log(data)    
                var dataL = data.provinsi
                for (i = 0; i < dataL.length; i++) {
                    $(".provinsi").append(`
                        <option value="` + dataL[i].id + `">` + dataL[i].nama + `</option>
                    `)
                }
            }
        });
    }

    function getKabupaten() {
        $("#provinsi").click(function() {
            $.ajax({
                url: "https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi=" + $("#provinsi").val(),
                type: "GET",
                dataType: 'json',
                success: function(data) {
                    var dataL = data.kota_kabupaten
                    // console.log(dataL)
                    for (i = 0; i < dataL.length; i++) {
                        $(".kabupaten").append(`
                            <option value="` + dataL[i].id + `">` + dataL[i].nama + `</option>
                        `)
                    }
                }
            });
        })
    }

    function getKecamatan() {
        $("#kabupaten").click(function() {
            $.ajax({
                url: "https://dev.farizdotid.com/api/daerahindonesia/kecamatan?id_kota=" + $("#kabupaten").val(),
                type: "GET",
                dataType: 'json',
                success: function(data) {
                    // console.log(data)
                    var dataL = data.kecamatan
                    for (i = 0; i < dataL.length; i++) {
                        $(".kecamatan").append(`
                            <option value="` + dataL[i].id + `">` + dataL[i].nama + `</option>
                        `)
                    }
                }
            });
        })
    }
    $(document).ready(function() {
        getProvinsi()
        getKabupaten()
        getKecamatan()

        $('form').submit(function(e) {
            e.preventDefault()

            $.ajax({
                url: $(this).attr("action"),
                type: $(this).attr("method"),
                data: $(this).serialize(),
                dataType: 'json',
                success: function(data) {
                    // console.log(data)
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