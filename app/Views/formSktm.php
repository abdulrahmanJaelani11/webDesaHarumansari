<?= $this->extend('template/form'); ?>
<?= $this->section("form"); ?>
<form action="<?= base_url("Proses/pendaftaranSktm"); ?>" method="post" id="formKomentar">
    <div class="row g-3">
        <div class="col-12 col-sm-6">
            <input type="text" name="nama" id="nama" class="form-control bg-white border-0" placeholder="Masukan nama anda" style="height: 55px;" required>
            <div class="invalid-feedback invalid-nama"></div>
        </div>
        <div class="col-12 col-sm-6">
            <input type="number" name="nik" id="nik" class="form-control bg-white border-0" placeholder="Masukan NIK" style="height: 55px;" required>
            <div class="invalid-feedback invalid-nik"></div>
        </div>
        <div class="col-12 col-sm-6">
            <input type="text" name="kepentingan" id="kepentingan" class="form-control bg-white border-0" placeholder="Dibuat Untuk Kepentingan?" style="height: 55px;" required>
            <div class="invalid-feedback invalid-kepentingan"></div>
        </div>
        <div class="col-12 col-sm-6">
            <input type="text" name="tlp" id="tlp" value="+62" class="form-control bg-white border-0" placeholder="Masukan No Telepon/WA anda" style="height: 55px;" required>
            <div class="invalid-feedback invalid-tlp"></div>
        </div>
        <div class="col-12 col-sm-6">
            <input type="text" name="ttl" id="ttl" class="form-control bg-white border-0" placeholder="Tempat, Tanggal Lahir" style="height: 55px;" required>
            <div class="invalid-feedback invalid-ttl"></div>
        </div>
        <div class="col-12 col-sm-6">
            <select name="jk" id="jk" class="form-control bg-white border-0" style="height: 55px;" required>
                <option value="">Jenis Kelamin</option>
                <option value="Laki-Laki">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>
        <div class="col-12 col-sm-6">
            <select name="statusKawin" id="statusKawin" class="form-control bg-white border-0" style="height: 55px;" required>
                <option value="">Status Perkawinan</option>
                <option value="Belum kawin">Belum kawin</option>
                <option value="Menikah">Menikah</option>
            </select>
            <div class="invalid-feedback invalid-sttsKawin"></div>
        </div>
        <div class="col-12 col-sm-6">
            <select name="agama" id="agama" class="form-control bg-white border-0" style="height: 55px;" required>
                <option value="">Agama</option>
                <option value="Islam">Islam</option>
                <option value="Kristen">Kristen</option>
                <option value="Budha">Budha</option>
                <option value="Hindu">Hindu</option>
                <option value="Katolik">Katolik</option>
                <option value="Konghucu">Konghucu</option>
            </select>
        </div>
        <div class="col-12 col-sm-6">
            <select name="pendidikan" id="pendidikan" class="form-control bg-white border-0" style="height: 55px;" required>
                <option value="">Pendidikan</option>
                <option value="SLTA">SLTA</option>
            </select>
            <div class="invalid-feedback invalid-pekerjaan"></div>
        </div>
        <div class="col-12 col-sm-6">
            <select name="status" id="status" class="form-control bg-white border-0" style="height: 55px;" required>
                <option value="">Status</option>
                <option value="Pedagang">Pedagang</option>
                <option value="Karyawan">Karyawan</option>
                <option value="Pelajar/Mahasiswa">Pelajar/Mahasiswa</option>
                <option value="Buruh">Buruh</option>
                <option value="--tidak ada--">tidak ada</option>
            </select>
        </div>
        <div class="col-12">
            <textarea class="form-control bg-white border-0" name="alamat" rows="5" placeholder="Alamat"></textarea>
        </div>
        <div class="col-12">
            <button class="btn btn-primary w-100 py-3 btnSimpan" type="submit">Daftar</button>
        </div>
    </div>
</form>
<?= $this->endSection(); ?>