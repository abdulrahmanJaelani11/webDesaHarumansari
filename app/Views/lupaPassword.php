<?= $this->extend('template/main'); ?>
<?= $this->section('style'); ?>
<style>
    .form-group {
        margin-top: 30px;
    }
</style>
<?= $this->endSection(); ?>
<?= $this->section('content'); ?>
<div class="row justify-content-center">
    <div class="col-md-5 wow zoomIn" style="margin-top: 10%;" data-wow-delay="0.3s">
        <div class="bg-white rounded shadow position-relative" style="z-index: 1;">
            <div class="border-bottom py-4 px-4 mb-4">
                <h3 class="text-primary mb-1">Lupa Password</h3>
                <!-- <small class="text-uppercase">Silahkan Masukan Email Akun Anda Supaya Kami Bisa Mengirimkan Password Ke Email Anda</small> -->
            </div>
            <div class="p-4 pt-0">
                <form action="<?= base_url("Proses/lupaPassword"); ?>" method="post">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Masukan Email" autofocus autocomplete="off">
                        <div class="invalid-feedback invalid-email"></div>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="masuk" class="btn w-100 btnMasuk btn-primary"> Kirim </button>
                    </div>
                </form>
            </div>
            <div class="row pb-3">
                <div class="col text-center">
                    <a href="<?= base_url('login'); ?>" style="font-size: 12px;">Login ?</a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script src="<?= base_url("assets"); ?>/js/jquery.js"></script>
<script src="<?= base_url("assets"); ?>/js/sweetalert2.js"></script>
<script>
    $(document).ready(function() {

        $("form").on('submit', function(e) {
            e.preventDefault()

            $.ajax({
                url: $(this).attr("action"),
                type: $(this).attr("method"),
                data: $(this).serialize(),
                // dataType:` "json",
                beforeSend: function() {
                    $(".btnMasuk").prop('disabled', true)
                    $(".btnMasuk").text("Memproses..")
                },
                complete: function() {
                    $(".btnMasuk").prop('disabled', false)
                    $(".btnMasuk").text("Masuk")
                },
                success: function(data) {
                    console.log(data)
                    if (data.status == 400) {
                        $("#email").addClass("is-invalid")
                        $(".invalid-email").text(data.pesan)
                    }
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