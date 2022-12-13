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
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Desa</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url("Admin/editDataDesa"); ?>" method="post" class="formEdit">
                    <div class="form-group">
                        <label for="atribut">Atribut</label>
                        <input type="hidden" id="id_for_edit" name="id">
                        <input type="text" name="atribut" id="atribut" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="number" name="jumlah" id="jumlahAtribut" class="form-control">
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
            url: "<?= base_url('Admin/getTableDataDesa'); ?>",
            type: "post",
            dataType: 'json',
            success: function(data) {
                $(".getTable").html(data)
                $(".btnHapus").click(function(e) {
                    e.preventDefault()
                    Swal.fire({
                        icon: 'question',
                        title: 'Yakin?',
                        text: "Yakin untuk menghapus data?",
                        showDenyButton: false,
                        showCancelButton: true,
                        confirmButtonText: 'Yakin',
                        denyButtonText: `Don't save`,
                    }).then((result) => {
                        /* Read more about isConfirmed, isDenied below */
                        if (result.isConfirmed) {
                            $.ajax({
                                url: $(".formHapus").attr('action'),
                                type: "post",
                                data: $(".formHapus").serialize(),
                                dataType: 'json',
                                success: function(data) {
                                    if (data.status == 200) {
                                        getTable()
                                        Swal.fire(
                                            'Berhasil',
                                            data.pesan,
                                            'success'
                                        )
                                    }
                                }
                            });
                        } else if (result.isDenied) {
                            Swal.fire('Changes are not saved', '', 'info')
                        }
                    })
                })
            }
        });
    }

    function getDataDesa(id) {
        $.ajax({
            url: "<?= base_url('Admin/getDataDesaOne'); ?>" + '/' + id,
            method: "POST",
            dataType: 'json',
            success: function(data) {
                $("#id_for_edit").val(data.id)
                $("#atribut").val(data.atribut)
                $("#jumlahAtribut").val(data.jumlah)
            }
        })
    }

    function resetForm() {
        $("#data").val('')
        $("#jumlah").val('')
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
                    console.log(data)
                    if (data.status == 200) {
                        getTable()
                        $(".formTambahData").slideToggle(500)
                        $(".bg-blur").fadeToggle(1000)
                        Swal.fire(
                            'Berhasil',
                            data.pesan,
                            'success'
                        )
                        resetForm()
                    }
                }
            });
        })

        $(".btnFormEdit").click(function(e) {
            e.preventDefault()

            $.ajax({
                url: "<?= base_url("Admin/editDataDesa"); ?>",
                method: "POST",
                data: $(".formEdit").serialize(),
                dataType: 'json',
                success: function(data) {
                    Swal.fire(
                        'Berhasil',
                        data.pesan,
                        'success'
                    )
                    getTable()
                }
            })
        })

    })
</script>
<?= $this->endSection(); ?>