<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url("assetsAdmin"); ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url("assetsAdmin"); ?>/css/sb-admin-2.min.css" rel="stylesheet">

    <link href="<?= base_url("assetsAdmin"); ?>/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body>
    <div class="container text-gray-900">

        <div class="row justify-content-center">
            <div class="col-3">
                <img src="<?= base_url("assetsAdmin/img/logo.png"); ?>" class="img-fluid">
            </div>
            <div class="col-6 text-center mt-3">
                <h4 class="font-weight-bold text-gray-900">PEMERINTAH KABUPATEN GARUT</h4>
                <H4 class="font-weight-bold text-gray-900">KECAMATAN KADUNGORA</H4>
                <H3 class="font-weight-bold text-gray-900">DESA HARUMANSARI</H3>
                <p class="text-gray-900">Jl. Desa Harumansari No. 06 Kadungora - Garut 44153</p>
            </div>
            <div class="col-3"></div>
        </div>
        <hr>
        <div class="row">
            <div class="col text-center">
                <h3 class="text-uppercase">SURAT KETERANGAN TIDAK MAMPU</h3>
                <p>Nomor : . . . . . . / . . . . . . / . . . . . . </p>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col">
                <p style="text-align: justify; text-indent: 0.5in;">Yang bertanda tangan dibawah ini, Kepala Desa Harumansari Kecamatan Kadungora Kabupaten Garut, dengan ini menerangkan bahwa :</p>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col ml-4">
                <table>
                    <tr style="line-height: 30px;">
                        <td style="width: 200px;">Nama </td>
                        <td> : </td>
                        <td> <?= $pendaftar['nama']; ?></td>
                    </tr>
                    <tr style="line-height: 30px;">
                        <td>Nik </td>
                        <td> : </td>
                        <td> <?= $pendaftar['nik']; ?></td>
                    </tr>
                    <tr style="line-height: 30px;">
                        <td>Tempat, Tanggal Lahir </td>
                        <td> : </td>
                        <td> <?= $pendaftar['ttl']; ?></td>
                    </tr>
                    <tr style="line-height: 30px;">
                        <td>Jenis Kelamin </td>
                        <td> : </td>
                        <td> <?= $pendaftar['jk']; ?></td>
                    </tr>
                    <tr style="line-height: 30px;">
                        <td>Agama </td>
                        <td> : </td>
                        <td> <?= $pendaftar['agama']; ?></td>
                    </tr>
                    <tr style="line-height: 30px;">
                        <td>Pendidikan </td>
                        <td> : </td>
                        <td> <?= $pendaftar['pendidikan']; ?></td>
                    </tr>
                    <tr style="line-height: 30px;">
                        <td>status </td>
                        <td> : </td>
                        <td> <?= $pendaftar['status']; ?></td>
                    </tr>
                    <tr style="line-height: 30px;">
                        <td>Status Kawin </td>
                        <td> : </td>
                        <td> <?= $pendaftar['status_kawin']; ?></td>
                    </tr>
                    <tr style="line-height: 30px;">
                        <td>Alamat </td>
                        <td> : </td>
                        <td> <?= $pendaftar['alamat']; ?></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row  mt-4">
            <div class="col">
                <p style="text-align: justify; text-indent: 0.5in;">Nama tersebut diatas adalah benar penduduk Desa kami sesuai keterangan dari RT, RW dan berdasarkan catatan yang ada pada kantor kami bahwa orang tersebut diatas adalah keluarga tidak mampu dan surat keterangan ini dapat dipergunakan untuk :</p>
                <p class="font-weight-bold">Kepentingan Persyaratan <?= $pendaftar['kepentingan']; ?></p>
                <p style="text-align: justify; text-indent: 0.5in;">Demikian surat keterangan ini kami buat dengan sebenarnya dan dapat dipergunakan sebagaimana mestinya</p>
            </div>
        </div>
        <div class="row justify-content-between">
            <div class="col-9"></div>
            <div class="col-3">
                <p>Harumansari <?= date("d M y"); ?></p>
            </div>
        </div>
        <div class="row text-center mt-4 justify-content-between">
            <div class="col-4">
                <p>Ketua RW :. . . . . . . . </p>
                <p style="margin-top: 100px;">. . . . . . . . . . . . . .</p>
            </div>
            <div class="col-4">
                <p>Ketua RT :. . . . . . . . </p>
                <p style="margin-top: 100px;">. . . . . . . . . . . . . .</p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-4 text-center">
                <p>Kepala Desa Harumansari</p>
                <p style="margin-top: 100px;">DEDE ROSITA</p>
            </div>
        </div>
    </div>


    <script>
        window.print()
    </script>
    <script src="<?= base_url("assets"); ?>/js/jquery.js"></script>
    <script src="<?= base_url("assets"); ?>/js/sweetalert2.js"></script>

    <script src="<?= base_url("assetsAdmin"); ?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url("assetsAdmin"); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url("assetsAdmin"); ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url("assetsAdmin"); ?>/js/sb-admin-2.min.js"></script>

    <script src="<?= base_url("assetsAdmin"); ?>/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url("assetsAdmin"); ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url("assetsAdmin"); ?>/js/demo/datatables-demo.js"></script>
</body>

</html>