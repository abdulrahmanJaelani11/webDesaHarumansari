<?php

namespace App\Controllers;

use App\Models\AparaturDesaModel;
use App\Models\BeritaModel;
use App\Models\dataAgamaModel;
use App\Models\dataDesaModel;
use App\Models\DataPendudukModel;
use App\Models\dataStatusPerkawinan;
use App\Models\KategoriModel;
use App\Models\KelompokUsiaModel;
use App\Models\KomentarModel;
use App\Models\ProfilDesaModel;

class Home extends BaseController
{
    protected $kategori;
    protected $BeritaModel;
    protected $profilDesa;
    protected $dataDesa;
    protected $dataPenduduk;
    protected $dataAgama;
    protected $dataKelompokUsia;
    protected $dataStatusPerkawinanModel;
    protected $KomentarModel;
    public function __construct()
    {
        $this->kategori = new KategoriModel();
        $this->BeritaModel = new BeritaModel();
        $this->profilDesa = new ProfilDesaModel();
        $this->dataDesa = new dataDesaModel();
        $this->dataKelompokUsia = new KelompokUsiaModel();
        $this->dataAparatDesa = new AparaturDesaModel();
        $this->dataPenduduk = new DataPendudukModel();
        $this->dataAgama = new dataAgamaModel();
        $this->dataStatusPerkawinanModel = new dataStatusPerkawinan();
        $this->KomentarModel = new KomentarModel();
    }

    public function index()
    {
        $data = [
            'title' => "Berita",
            'berita' => $this->BeritaModel->db->query("SELECT * FROM berita ORDER BY berita.id ASC LIMIT 10")->getResultArray(),
            'beritaBaru' => $this->BeritaModel->db->query("SELECT * FROM berita ORDER BY berita.id DESC LIMIT 3")->getResultArray(),
            'viewBerita' => $this->BeritaModel->db->query("SELECT * FROM berita ORDER BY berita.id DESC")->getRowArray(),
            'kategori' => $this->kategori->semua(),
            'dataDesa' => $this->profilDesa->db->query("SELECT * FROM desa")->getRowArray(),
            'dataDesa2' => $this->dataDesa->db->query("SELECT * FROM data_desa LIMIT 3")->getResultArray(),
            'dataAparatDesa' => $this->dataAparatDesa->findAll()
        ];
        // dd($data['dataDesa2']);
        return view('index', $data);
    }

    public function login($data = null)
    {
        $data = [
            'title' => "Login"
        ];

        return view("login", $data);
    }

    public function lupaPassword()
    {
        $data = [
            'title' => "Lupa Password"
        ];
        return view("lupaPassword", $data);
    }

    public function berita($data = null)
    {
        $data = [
            'title' => "Berita",
            'berita' => $this->BeritaModel->db->query("SELECT * FROM berita ORDER BY berita.id ASC LIMIT 10")->getResultArray(),
            'beritaBaru' => $this->BeritaModel->db->query("SELECT * FROM berita ORDER BY id DESC LIMIT 5")->getResultArray(),
            'kategori' => $this->kategori->semua(),
            'dataDesa' => $this->profilDesa->db->query("SELECT * FROM desa")->getRowArray(),
        ];

        // dd($data);

        return view("berita", $data);
    }

    public function beritaKategori($id = null)
    {
        $data = [
            'title' => "Berita",
            'berita' => $this->BeritaModel->db->query("SELECT * FROM berita WHERE id_kategori = $id ORDER BY id DESC")->getResultArray(),
            'beritaBaru' => $this->BeritaModel->db->query("SELECT * FROM berita ORDER BY id DESC LIMIT 5")->getResultArray(),
            'kategori' => $this->kategori->semua(),
            'dataDesa' => $this->profilDesa->db->query("SELECT * FROM desa")->getRowArray(),
        ];

        return view("berita", $data);
    }

    public function detail($data = null)
    {
        $data = [
            'title' => "Berita",
            'berita' => $this->BeritaModel->find($data),
            // 'berita' => $this->BeritaModel->db->query("SELECT * FROM berita JOIN kategori ON berita.id_kategori=kategori.id WHERE berita.id = $data")->getResultArray(),
            'beritaBaru' => $this->BeritaModel->db->query("SELECT * FROM berita ORDER BY id DESC LIMIT 5")->getResultArray(),
            'kategori' => $this->kategori->semua(),
            'komentar' => $this->KomentarModel->findAll(),
            'dataDesa' => $this->profilDesa->db->query("SELECT * FROM desa")->getRowArray(),
        ];

        // dd($data);

        return view('detailBerita', $data);
    }

    public function getKomentar($data = null)
    {
        $id_berita = $this->request->getPost('id_berita');

        $data = [
            'komentar' => $this->KomentarModel->db->query("SELECT * FROM komentar WHERE id_berita = $id_berita LIMIT 6")->getResultArray()
        ];

        echo json_encode(view("komentar", $data));
        // echo json_encode($data);
    }

    public function layanan($data = null)
    {
        $data = [
            'title' => "Layanan Online",
            'dataDesa' => $this->profilDesa->db->query("SELECT * FROM desa")->getRowArray(),
        ];

        return view('layanan', $data);
    }

    public function formSktm($data = null)
    {
        $data = [
            'title' => "Form Pendaftaran SKTM",
            'dataDesa' => $this->profilDesa->db->query("SELECT * FROM desa")->getRowArray(),
        ];

        return view("formSktm", $data);
    }

    public function dataDesa()
    {
        $dataDesa = new dataDesaModel();
        $data = [
            'title' => "Data Desa",
            'dataDesa2' => $dataDesa->findAll(),
            'dataDesa' => $this->profilDesa->db->query("SELECT * FROM desa")->getRowArray(),
            'berita' => $this->BeritaModel->db->query("SELECT * FROM berita ORDER BY berita.id ASC LIMIT 10")->getResultArray(),
            'beritaBaru' => $this->BeritaModel->db->query("SELECT * FROM berita ORDER BY berita.id DESC LIMIT 3")->getResultArray(),
            'kategori' => $this->kategori->semua(),
        ];

        return view("dataDesa", $data);
    }

    public function sejarahDesa($data = null)
    {
        $data = [
            'title' => "Sejarah Desa",
            'dataDesa' => $this->profilDesa->db->query("SELECT * FROM desa")->getRowArray(),
            'berita' => $this->BeritaModel->db->query("SELECT * FROM berita ORDER BY berita.id ASC LIMIT 10")->getResultArray(),
            'beritaBaru' => $this->BeritaModel->db->query("SELECT * FROM berita ORDER BY berita.id DESC LIMIT 3")->getResultArray(),
            'kategori' => $this->kategori->semua(),
        ];

        // var_dump($data['dataDesa']);
        // die;
        return view("sejarahDesa", $data);
    }

    public function visiMisiDesa($data = null)
    {
        $data = [
            'title' => "Visi Dan Misi Desa",
            'dataDesa' => $this->profilDesa->db->query("SELECT * FROM desa")->getRowArray(),
            'berita' => $this->BeritaModel->db->query("SELECT * FROM berita ORDER BY berita.id ASC LIMIT 10")->getResultArray(),
            'beritaBaru' => $this->BeritaModel->db->query("SELECT * FROM berita ORDER BY berita.id DESC LIMIT 3")->getResultArray(),
            'kategori' => $this->kategori->semua(),
        ];

        // var_dump($data['dataDesa']);
        // die;
        return view("visiMisiDesa", $data);
    }

    public function dataPenduduk($data = null)
    {
        $data = [
            'title' => "Data Penduduk",
            'dataDesa' => $this->profilDesa->db->query("SELECT * FROM desa")->getRowArray(),
            'berita' => $this->BeritaModel->db->query("SELECT * FROM berita ORDER BY berita.id ASC LIMIT 10")->getResultArray(),
            'beritaBaru' => $this->BeritaModel->db->query("SELECT * FROM berita ORDER BY berita.id DESC LIMIT 3")->getResultArray(),
            'kategori' => $this->kategori->semua(),
            'dataPenduduk' => $this->dataPenduduk->findAll()
        ];

        return view("dataPenduduk", $data);
    }

    public function dataStatusKawin($data = null)
    {
        $data = [
            'title' => "Data Status Perkawinan",
            'dataDesa' => $this->profilDesa->db->query("SELECT * FROM desa")->getRowArray(),
            'berita' => $this->BeritaModel->db->query("SELECT * FROM berita ORDER BY berita.id ASC LIMIT 10")->getResultArray(),
            'beritaBaru' => $this->BeritaModel->db->query("SELECT * FROM berita ORDER BY berita.id DESC LIMIT 3")->getResultArray(),
            'kategori' => $this->kategori->semua(),
            'dataPenduduk' => $this->dataPenduduk->findAll(),
            'dataKawin' => $this->dataStatusPerkawinanModel->semua()
        ];

        // dd($data['dataKawin']);

        return view("dataStatusKawin", $data);
    }

    public function dataAgama()
    {
        $data = [
            'title' => "Data Agama",
            'dataDesa' => $this->profilDesa->db->query("SELECT * FROM desa")->getRowArray(),
            'berita' => $this->BeritaModel->db->query("SELECT * FROM berita ORDER BY berita.id ASC LIMIT 10")->getResultArray(),
            'beritaBaru' => $this->BeritaModel->db->query("SELECT * FROM berita ORDER BY berita.id DESC LIMIT 3")->getResultArray(),
            'kategori' => $this->kategori->semua(),
            'dataPenduduk' => $this->dataPenduduk->findAll(),
            'dataAgama' => $this->dataAgama->semua()
        ];

        // dd($data['dataKawin']);

        return view("dataAgama", $data);
    }

    public function dataKelompokUsia()
    {
        $data = [
            'title' => "Data Kelompok Usia",
            'dataDesa' => $this->profilDesa->db->query("SELECT * FROM desa")->getRowArray(),
            'berita' => $this->BeritaModel->db->query("SELECT * FROM berita ORDER BY berita.id ASC LIMIT 10")->getResultArray(),
            'beritaBaru' => $this->BeritaModel->db->query("SELECT * FROM berita ORDER BY berita.id DESC LIMIT 3")->getResultArray(),
            'kategori' => $this->kategori->semua(),
            'dataKelompokUsia' => $this->dataKelompokUsia->semua()
        ];

        // dd($data['dataKawin']);

        return view("dataKelompokUsiaModel", $data);
    }
}
