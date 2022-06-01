<?= $this->extend('template/admin'); ?>

<?= $this->section('content'); ?>
<div class="bg-blur" style="position: absolute; top: 0; bottom: 0; right: 0; left: 0; background-color: silver; z-index: 9; display: none; opacity: .4;"></div>
<div class="row justify-content-center">
    <div class="col-lg-5 formUbah" style="position: absolute; z-index: 10; display: none;">
        <div class="card shadow">
            <div class="card-body">
                <h3>Ubah Data</h3>
                <hr>
                <form action="<?= base_url("proses/ubahDataAgama"); ?>" method="post">
                    <div class="form-group">
                        <input type="hidden" name="id" id="id" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="text" name="jumlah" id="jumlah" class="form-control">
                    </div>
                    <hr>
                    <div class="form-group">
                        <button type="button" name="simpan" class="btn btnBatal btn-sm btn-info"> Batal </button>
                        <button type="submit" name="simpan" class="btn btn-sm btn-primary"> Simpan <i class="fa fa-fw fa-paper-plane"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="card shadow">
    <div class="card-body">
        <h3><?= $title; ?></h3>
        <hr>
        <div class="getTable"></div>
    </div>
</div>
<?= $this->endSection(); ?>
<?= $this->section('script'); ?>
<script src="<?= base_url("assets"); ?>/js/jquery.js"></script>
<script src="<?= base_url("assets"); ?>/js/sweetalert2.js"></script>
<script>
    $(document).ready(function() {
        function getTable() {
            $.ajax({
                url: "<?= base_url("Admin/getTableDataAgama"); ?>",
                type: "post",
                dataType: 'json',
                success: function(data) {
                    // console.log(data)
                    $(".getTable").html(data)
                    $(".btnUbah").click(function() {
                        $(".formUbah").slideToggle(500)
                        $(".bg-blur").fadeToggle(1000)
                        $("#id").val($(this).attr('id'))
                        $("#jumlah").val($(this).attr('value'))
                    })
                }
            });
        }
        getTable()
        $(".btnBatal").click(function() {
            $('.formUbah').slideToggle(500)
            $(".bg-blur").fadeToggle(1000)
        })

        $("form").submit(function(e) {
            e.preventDefault()

            $.ajax({
                url: $(this).attr('action'),
                type: "post",
                data: $(this).serialize(),
                dataType: 'json',
                success: function(data) {
                    if (data.status == 200) {
                        // console.log(data)
                        Swal.fire(
                            'Berhasil',
                            data.pesan,
                            'success'
                        )
                        getTable()
                        $(".formUbah").slideToggle(500)
                        $(".bg-blur").fadeToggle(1000)
                    }
                }
            });
        })
    })
</script>
<?= $this->endSection(); ?>