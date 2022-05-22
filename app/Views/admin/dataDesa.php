<?= $this->extend('template/admin'); ?>

<?= $this->section('content'); ?>
<div class="bg-blur" style="position: absolute; top: 0; bottom: 0; right: 0; left: 0; background-color: silver; z-index: 9; display: none; opacity: .4;"></div>
<div class="row justify-content-center">
    <div class="col-lg-5 formTambahData" style="display: none; position: absolute; z-index: 10;">
        <div class="card shadow">
            <div class="card-body">
                <h3>Tambah Data Desa</h3>
                <hr>
                <form action="<?= base_url("Proses/simpanDataDesa"); ?>" method="post">
                    <div class="form-group">
                        <label for="data">Atribut</label>
                        <input type="text" name="data" id="data" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="text" name="jumlah" id="jumlah" class="form-control" required>
                    </div>
                    <div class="form-group row">
                        <div class="col-6">
                            <button type="button" name="batal" class="btn batal btn-warning btn-sm btn-block"> Batal </button>
                        </div>
                        <div class="col-6">
                            <button type="submit" name="simpan" class="btn btn-primary btn-sm btn-block"> Simpan </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="card shadow">
    <div class="card-body">
        <h3>Data Desa</h3>
        <hr>
        <button type="submit" name="tambahData" class="btn btn-primary btn-sm my-3 tambahData"> Tambah Data </button>
        <div class="getTable"></div>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script src="<?= base_url("assets"); ?>/js/jquery.js"></script>
<script src="<?= base_url("assets"); ?>/js/sweetalert2.js"></script>
<script>
    function getTable() {
        $.ajax({
            url: "<?= base_url('Admin/getTableDateDesa'); ?>",
            type: "post",
            dataType: 'json',
            success: function(data) {
                $(".getTable").html(data)
            }
        });
    }
    $(document).ready(function() {
        getTable()
        $(".tambahData").click(function() {
            $(".formTambahData").slideToggle(500)
            $(".bg-blur").fadeToggle(1000)
        })
        $(".batal").click(function() {
            $(".formTambahData").slideToggle(500)
            $(".bg-blur").fadeToggle(1000)
        })

        $("form").submit(function(e) {
            e.preventDefault()

            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: $(this).serialize(),
                dataType: 'json',
                success: function(data) {
                    if (data.status == 200) {
                        getTable()
                        $(".formTambahData").slideToggle(500)
                        $(".bg-blur").fadeToggle(1000)
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