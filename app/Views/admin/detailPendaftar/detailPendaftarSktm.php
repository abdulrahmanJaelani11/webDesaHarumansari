<?= $this->extend("template/detailPendaftar"); ?>

<?= $this->section('table'); ?>
<table>
    <p class="text-uppercase font-weight-bold">SURAT KETERANGAN TIDAK MAMPU (SKTM)</p>
    <tr style="line-height: 30px;">
        <td style="width: 200px;">Nama </td>
        <td style="width: 20px;"> : </td>
        <td> <?= $pendaftar['nama']; ?></td>
    </tr>
    <tr style="line-height: 30px;">
        <td>Nik </td>
        <td> : </td>
        <td> <?= $pendaftar['nik']; ?></td>
    </tr>
    <tr style="line-height: 30px;">
        <td>Tlp/WA </td>
        <td> : </td>
        <td> <?= $pendaftar['tlp']; ?></td>
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
    <tr style="line-height: 30px;">
        <td>Kepentingan </td>
        <td> : </td>
        <td> <?= $pendaftar['kepentingan']; ?></td>
    </tr>
</table>
<?= $this->endSection(); ?>