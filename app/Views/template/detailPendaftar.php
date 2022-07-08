<?= $this->extend("template/admin"); ?>

<?= $this->section("content"); ?>
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h3>Rincian Pendaftar</h3>
                <hr>
                <?= $this->renderSection('table'); ?>
                <hr>
                <div class="row">
                    <div class="col-6">
                        <p> Daftar Pada <?= $pendaftar['tgl_daftar']; ?></p>
                    </div>
                    <div class="col-6">
                        <p> Selesai Pada <?= $pendaftar['tgl_selesai'] ? $pendaftar['tgl_selesai'] : ''; ?></p>
                    </div>
                </div>
                <?php if ($pendaftar['status_surat'] == 'selesai') : ?>
                    <button type="submit" name="selesai" disabled class="btn btn-sm btn-primary" id="selesai"> Surat Sudah Selesai </button>
                <?php else : ?>
                    <button type="submit" name="selesai" class="btn btn-sm btn-primary" id="selesai"> Selesai </button>
                <?php endif ?>
                <a href="<?= base_url("print-surat/" . $pendaftar['id']); ?>" class="btn btn-sm btn-primary" target="blank"><i class="fa fa-fw fa-print"></i> Print Surat</a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section("script"); ?>
<script src="<?= base_url("assets"); ?>/js/jquery.js"></script>
<script src="<?= base_url("assets"); ?>/js/sweetalert2.js"></script>
<script>
    $(document).ready(function() {
        $("#selesai").click(function(e) {
            e.preventDefault()
            Swal.fire({
                icon: 'question',
                title: 'Yakin?',
                text: "Yakin untuk menandai bahwa surat sudah selesai?",
                showDenyButton: false,
                showCancelButton: true,
                confirmButtonText: 'Ya, Yakin',
                cancelButtonText: `Batal`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $.ajax({
                        url: "<?= base_url("Admin/suratSelesai"); ?>",
                        type: "post",
                        dataType: "json",
                        data: {
                            id: <?= $pendaftar['id']; ?>
                        },
                        success: function(data) {
                            if (data.status == 200) {
                                Swal.fire(
                                    'Berhasil',
                                    'Berhasil Menyelesaikan Surat',
                                    'success'
                                )
                                $("#selesai").prop('disabled', true)
                                $("#selesai").text("Surat Sudah Selesai")
                            }
                        }
                    })
                }
            })
        })
    })
</script>
<?= $this->endSection(); ?>