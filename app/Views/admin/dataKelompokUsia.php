<?= $this->extend('template/admin'); ?>

<?= $this->section('content'); ?>
<div class="bg-blur" style="position: absolute; top: 0; bottom: 0; right: 0; left: 0; background-color: silver; z-index: 9; display: none; opacity: .4;"></div>
<div class="row justify-content-center">
    <div class="col-md-5 formUbah" style="display: none; position: absolute; z-index: 10;">
        <div class="card shadow">
            <div class="card-body">
                <h3>Ubah Data</h3>
                <hr>
                <form action="<?= base_url("Proses/updateDataKelomUsia"); ?>" method="post" class="formEdit">
                    <div class="form-group">
                        <input type="hidden" name="id" id="id" value="">
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="number" name="jumlah" id="jumlah" class="form-control" placeholder="Jumlah">
                        <div class="invalid-feedback invalid-jumlah"></div>
                    </div>
                    <div class="form-group">
                        <button type="button" name="batal" class="btn btn-sm btn-info batal_ubah"> Batal </button>
                        <button type="submit" name="simpan" class="btn btn-sm btn-primary"> Simpan </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row" style="margin-bottom: 10%;">
    <div class="col-12">
        <div class="card- shadow">
            <div class="card-body">
                <h3><?= $title; ?></h3>
                <hr>
                <button type="submit" class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambahDataModal"> Tambah Data </button>
                <div class="getTable"></div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="tambahDataModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kelompok Usia</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url("Admin/editDataDesa"); ?>" method="post" class="tambahDataKelomUsia">
                    <div class="form-group">
                        <label for="atribut">Usia</label>
                        <input type="hidden" id="id" name="id">
                        <input type="text" name="usia" id="usia" class="form-control" placeholder="Masukan Usia">
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="number" name="jumlah" id="jumlah" class="form-control" placeholder="Masukan Jumlah">
                    </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">Cancel</button>
                <button type="submit" name="simpan" class="btn btnFormEdit btn-primary btn-sm"> Simpan </button>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
<?= $this->section('script'); ?>
<script src="<?= base_url("assets"); ?>/js/jquery.js"></script>
<script src="<?= base_url("assets"); ?>/js/sweetalert2.js"></script>
<script>
    function getTable() {
        $.ajax({
            url: "<?= base_url("Admin/getTableKelomUsia"); ?>",
            type: "post",
            dataType: 'json',
            success: function(data) {
                $(".getTable").html(data)
                $(".btnUbah").click(function() {
                    $(".formUbah").slideToggle(500)
                    $(".bg-blur").fadeToggle(1000)
                    $("#id").val($(this).attr('id'))
                    $("#jumlah").val($(this).attr('value'))
                    // console.log($(this).attr('id'))
                })
            }
        });
    }

    function resetForm() {
        $("input").val('')
    }

    function closeForm() {
        $(".form").slideToggle(500)
        $(".bg-blur").fadeToggle(1000)
    }
    $(document).ready(function() {
        $('input').click(function() {
            $(this).removeClass('is-invalid')
        })
        $(".formEdit").submit(function(e) {
            e.preventDefault()
            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: $(this).serialize(),
                dataType: 'json',
                success: function(data) {
                    console.log(data)
                    if (data.status == 200) {
                        getTable()
                        resetForm()
                        Swal.fire(
                            'Berhasil',
                            data.pesan,
                            'success'
                        )
                        $(".formUbah").slideToggle(500)
                        $(".bg-blur").fadeToggle(1000)
                    }
                    if (data.status == 400) {
                        if (data.pesan.jumlah) {
                            $("#jumlah").addClass('is-invalid')
                            $(".invalid-jumlah").text(data.pesan.jumlah)
                        }
                    }
                }
            });
        })
        getTable()
        $(".btnTambah").click(function() {
            $(".form").slideToggle(500)
            $(".bg-blur").fadeToggle(1000)
        })
        $(".batal").click(function() {
            $(".form").slideToggle(500)
            $(".bg-blur").fadeToggle(1000)
        })
        $(".batal_ubah").click(function() {
            $(".formUbah").slideToggle(500)
            $(".bg-blur").fadeToggle(1000)
        })

        $(".tambahDataKelomUsia").submit(function(e) {
            e.preventDefault();

            $.ajax({
                url: "<?= base_url('Proses/simpanDataKelompokUsia'); ?>",
                method: 'post',
                dataType: 'json',
                data: $(".tambahDataKelomUsia").serialize(),
                success: function(data) {
                    console.log(data)
                }
            })
        })
    })
</script>
<?= $this->endSection(); ?>