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
                <h3 class="text-primary mb-1">Login</h3>
                <small class="text-uppercase">Selamat Datang</small>
            </div>
            <div class="p-4 pt-0">
                <form action="Proses/prosesLogin" method="post">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Masukan Email" autofocus autocomplete="off">
                        <div class="invalid-feedback invalid-email"></div>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Masukan password" autocomplete="off">
                        <div class="invalid-feedback invalid-password"></div>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="masuk" class="btn w-100 btnMasuk btn-primary"> Masuk </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script src="<?= base_url("assets"); ?>/js/jquery.js"></script>
<script>
    $(document).ready(function() {
        $("form").on('submit', function(e) {
            e.preventDefault()

            $.ajax({
                url: $(this).attr("action"),
                type: $(this).attr("method"),
                data: $(this).serialize(),
                dataType: "json",
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
                        if (data.errors.email) {
                            $("#email").addClass("is-invalid")
                            $(".invalid-email").text(data.errors.email)
                        }
                        if (data.errors.password) {
                            $("#password").addClass("is-invalid")
                            $(".invalid-password").text(data.errors.password)
                        }
                    } else {
                        if (data.status = 200) {
                            document.location = 'beranda'
                        }
                    }

                }
            });
        })
    })
</script>
<?= $this->endSection(); ?>