<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\AparaturDesaModel;
use App\Models\BeritaModel;
use App\Models\dataAgamaModel;
use App\Models\dataDesaModel;
use App\Models\DataPendudukModel;
use App\Models\dataStatusPerkawinan;
use App\Models\KategoriModel;
use App\Models\KelompokUsiaModel;
use App\Models\PendaftarSktm;
use App\Models\ProfilDesaModel;
use Dompdf\Dompdf;

class Admin extends BaseController
{
    protected $AdminModel;
    protected $kategori;
    protected $BeritaModel;
    protected $profilDesa;
    protected $aparatDesa;
    protected $dataDesa;
    protected $dataKawin;
    protected $dataKelompokUsia;
    protected $dataAgama;
    protected $dataPendudukModel;
    protected $pendaftarSktm;
    public function __construct()
    {
        $this->AdminModel = new AdminModel();
        $this->kategori = new KategoriModel();
        $this->BeritaModel = new BeritaModel();
        $this->profilDesa = new ProfilDesaModel();
        $this->aparatDesa = new AparaturDesaModel();
        $this->dataDesa = new dataDesaModel();
        $this->dataKelompokUsia = new KelompokUsiaModel();
        $this->dataKawin = new dataStatusPerkawinan();
        $this->dataAgama = new dataAgamaModel();
        $this->dataPendudukModel = new DataPendudukModel();
        $this->pendaftarSktm = new PendaftarSktm();
    }

    public function index()
    {
        $data = [
            'title' => "Beranda",
            'jumlahBerita' => $this->BeritaModel->findAll(),
            'jumlahPendaftarSktm' => $this->pendaftarSktm->findAll(),
            'dataDesa' => $this->dataDesa->findAll(),
            'dataPenduduk' => $this->dataPendudukModel->findAll(),
            'dataStatusKawin' => $this->dataKawin->findAll(),
            'dataAgama' => $this->dataAgama->findAll(),
            'dataKelomUsia' => $this->dataKelompokUsia->findAll()
        ];
        return view('admin/beranda', $data);
    }

    public function dataBerita($data = null)
    {
        session();
        $data = [
            'title' => "Data Berita",
            'berita' => $this->BeritaModel->db->query("SELECT * FROM berita ORDER BY id DESC")->getResultArray(),
            'validasi' => \Config\Services::validation(),
        ];

        return view("admin/dataBerita", $data);
    }

    public function dataDesa($data = null)
    {
        session();
        $data = [
            'title' => "Data Desa",
            'berita' => $this->BeritaModel->db->query("SELECT * FROM berita ORDER BY id DESC")->getResultArray(),
            'dataDesa' => $this->dataDesa->findAll(),
            'validasi' => \Config\Services::validation(),
        ];

        return view("admin/dataDesa", $data);
    }

    public function buatBerita($data = null)
    {
        session();
        $data = [
            'title' => "Buat Berita",
            'kategori' => $this->kategori->semua(),
            'validasi' => \Config\Services::validation(),
        ];

        return view("admin/buatBerita", $data);
    }

    public function detailBerita($data = null)
    {
        $data = [
            'title' => "Detail Berita",
            'berita' => $this->BeritaModel->find($data),
        ];

        return view('admin/detailBerita', $data);
    }

    public function getRinciBerita($data = null)
    {
        $id = $this->request->getPost('id');

        $data = [
            'title' => "Detail Berita",
            'berita' => $this->BeritaModel->find($id),
        ];

        echo json_encode(view("admin/rinciBerita", $data));
    }

    public function dataLayanan($data = null)
    {
        $data = [
            'title' => "Data Layanan Desa",
        ];

        return view("admin/dataLayanan", $data);
    }

    public function tambahLayanan($data = null)
    {
        $data = [
            'title' => "Form Tambah Layanan",
        ];

        return view("admin/formLayanan", $data);
    }

    public function detailPendaftarSktm($data = null)
    {
        $data = [
            'title' => 'Rincian Pendaftar SKTM',
            'pendaftar' => $this->pendaftarSktm->find($data)
        ];

        return view('admin/detailPendaftar/detailPendaftarSktm', $data);
    }

    public function pendaftarSktm($data = null)
    {
        $data = [
            'title' => 'Daftar Pendaftar SKTM',
            'pendaftar' => $this->pendaftarSktm->db->query("SELECT  * FROM pendaftar_sktm WHERE status_surat = 'proses' ORDER BY id DESC")->getResultArray(),
            'selesai' => $this->pendaftarSktm->db->query("SELECT  * FROM pendaftar_sktm WHERE status_surat = 'selesai' ORDER BY id DESC")->getResultArray()
        ];

        return view('admin/pendaftarSktm', $data);
    }

    public function riwayatPendaftar_sktm($data = null)
    {
        $data = [
            'title' => 'Riwayat Pendaftar SKTM',
            'pendaftar' => $this->pendaftarSktm->db->query("SELECT  * FROM pendaftar_sktm WHERE status_surat = 'selesai' ORDER BY id DESC")->getResultArray()
        ];

        return view('admin/riwayatPendaftar_sktm', $data);
    }

    public function printSurat($data = null)
    {
        $dompdf = new Dompdf();
        $data = [
            'title' => 'Print Surat',
            'pendaftar' => $this->pendaftarSktm->find($data)
        ];

        $html = view('admin/printSurat', $data);
        $dompdf->setPaper("A4", "potrait");
        $dompdf->load_html($html);
        $dompdf->render();
        $dompdf->stream("Surat Keterangan Tidak Mampu.pdf", array("Attachment" => false));
    }

    public function suratSelesai($data = null)
    {
        $id = $this->request->getPost('id');
        $this->pendaftarSktm->update($id, [
            'status_surat' => "selesai",
            'tgl_selesai' => date("d-m-Y")
        ]);

        $pesan = [
            'status' => 200
        ];

        echo json_encode($pesan);
    }

    public function setProfilDesa($data = null)
    {
        $data = [
            'title' => "Profil Desa",
            'profilDesa' => $this->profilDesa->db->query("SELECT * FROM desa")->getRowArray()
        ];

        // dd($data['profilDesa']);

        return view("admin/formSetDesa", $data);
    }

    public function setDataDesa($data = null)
    {
        $data = [
            'title' => "Profil Desa",
            'profilDesa' => $this->profilDesa->db->query("SELECT * FROM desa")->getRowArray()
        ];

        // dd($data['profilDesa']);

        return view("admin/formDataDesa", $data);
    }

    public function getTableDataDesa($data = null)
    {
        $data = [
            'dataDesa' => $this->dataDesa->findAll()
        ];

        echo json_encode(view("admin/table/tableDataDesa", $data));
    }

    public function sejarahDesa()
    {
        $data = [
            'title' => "Sejarah Desa",
            'profilDesa' => $this->profilDesa->db->query("SELECT * FROM desa")->getRowArray(),
            'dataDesa' => $this->profilDesa->db->query("SELECT * FROM desa")->getRowArray()
        ];

        return view("admin/formSejarahDesa", $data);
    }

    public function visiMisiDesa($data = null)
    {
        $data = [
            'title' => "Visi Misi Desa",
            'profilDesa' => $this->profilDesa->db->query("SELECT * FROM desa")->getRowArray(),
            'dataDesa' => $this->profilDesa->db->query("SELECT * FROM desa")->getRowArray()
        ];

        return view("admin/visiMisiDesa", $data);
    }

    public function dataPenduduk($data = null)
    {
        $data = [
            'title' => "Data Penduduk",
            'dataPenduduk' => $this->dataPendudukModel->findAll()
        ];

        return view("admin/fomrDataPenduduk", $data);
    }

    public function getTablePenduduk($data = null)
    {
        $data = [
            'dataPenduduk' => $this->dataPendudukModel->findAll()
        ];

        echo json_encode(view("admin/table/tableDataPenduduk", $data));
    }

    public function dataKawin()
    {
        $data = [
            'title' => "Data Status Perkawinan",
            'dataKawin' => $this->dataKawin->findAll()
        ];

        return view("admin/dataKawin", $data);
    }

    public function getTableDataKawin()
    {
        $data = [
            'dataKawin' => $this->dataKawin->semua()
        ];

        echo json_encode(view('admin/table/tableDataKawin', $data));
    }

    public function dataAgama()
    {
        $data = [
            'title' => "Data Status Perkawinan",
            'dataAgama' => $this->dataAgama->findAll()
        ];

        return view("admin/dataAgama", $data);
    }

    public function getTableDataAgama()
    {
        $data = [
            'dataAgama' => $this->dataAgama->semua()
        ];

        echo json_encode(view('admin/table/tableDataAgama', $data));
    }

    public function dataKelompokUsia()
    {
        $data = [
            'title' => "Data Kelompok Usia",
            'dataAgama' => $this->dataKelompokUsia->findAll()
        ];

        return view("admin/dataKelompokUsia", $data);
    }

    public function getTableKelomUsia()
    {
        $data = [
            'dataKelompokUsia' => $this->dataKelompokUsia->semua()
        ];

        echo json_encode(view('admin/table/tableDataKelomUsia', $data));
    }

    public function aparaturDesa()
    {
        $data = [
            'title' => "Aparatur Desa",
            'aparatDesa' => $this->aparatDesa->findAll()
        ];

        return view("admin/aparaturDesa", $data);
    }

    public function detailAparat($id)
    {
        $data = [
            'title' => "Rincian Aparatur Desa",
            'aparatDesa' => $this->aparatDesa->find($id)
        ];

        return view("admin/detailAparat", $data);
    }

    public function profil()
    {
        $email = session()->get('email');
        // dd($email);
        $data = [
            'title' => "Profil",
            'data' => $this->AdminModel->getWhere(['email' => $email])->getRowArray()
        ];
        // dd(session()->get());
        return view('admin/profil', $data);
    }
}
