<?= $this->extend('template/admin'); ?>

<?= $this->section('content'); ?>
<div class="row">
    <div class="col-md-4">
        <div class="card shadow mt-2">
            <div class="card-body">
                <img src="<?= base_url('assetsAdmin'); ?>/img/undraw_profile.svg" alt="">
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card shadow mt-2 mb-5">
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="nama_lengkap">Nama Lengkap</label>
                        <input type="text" id="nama_lengkap" value="<?= $data['nama_lengkap']; ?>" class="form-control" name="nama_lengkap" readonly>
                        <div class="invalid-feedback invalid-nama"></div>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" value="<?= $data['username']; ?>" class="form-control" name="username" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nik">Nik</label>
                        <input type="text" id="nik" value="<?= $data['nik']; ?>" class="form-control" name="nik" readonly>
                        <div class="invalid-feedback invalid-nik"></div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" id="email" value="<?= $data['email']; ?>" class="form-control" name="email" readonly>
                    </div>
                    <div class="form-group">
                        <button type="button" name="simpan" onclick="simpanData(`<?= base_url('Proses/simpanDataMe'); ?>`)" class="btn btn-sm btn-primary" id="simpan" disabled> Simpan </button>
                        <button type="button" id="btnUpdate" onclick="ubahFormUpdate()" name="update" class="btn btn-sm btn-primary"> update </button>
                        <button type="button" id="btnHide" onclick="hideForm()" name="btnHide" class="btn btn-sm btn-primary" style="display: none;"> Batal </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
<?= $this->section('script'); ?>
<script src="<?= base_url("assets"); ?>/js/jquery.js"></script>
<script src="<?= base_url("assetsAdmin"); ?>/js/myjs.js"></script>
<script src="<?= base_url("assets"); ?>/js/sweetalert2.js"></script>
<script>
    // $("form").click(function(e){
    //     e.preventDefault()
    //     $.ajax({
    //         url: ,
    //         type: ,
    //         data: $("form").serialize(),
    //     });
    // })
</script>
<?= $this->endSection(); ?>