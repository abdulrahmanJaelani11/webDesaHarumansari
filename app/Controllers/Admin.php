<?php

namespace App\Controllers;

use App\Models\BeritaModel;
use App\Models\dataDesaModel;
use App\Models\KategoriModel;
use App\Models\PendaftarSktm;
use App\Models\ProfilDesa;

class Admin extends BaseController
{
    protected $kategori;
    protected $BeritaModel;
    protected $profilDesa;
    protected $dataDesa;
    protected $pendaftarSktm;
    public function __construct()
    {
        $this->kategori = new KategoriModel();
        $this->BeritaModel = new BeritaModel();
        $this->profilDesa = new ProfilDesa();
        $this->dataDesa = new dataDesaModel();
        $this->pendaftarSktm = new PendaftarSktm();
    }

    public function index()
    {
        $data = [
            'title' => "Beranda",
            'jumlahBerita' => $this->BeritaModel->findAll(),
            'jumlahPendaftarSktm' => $this->pendaftarSktm->findAll()
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
            'pendaftar' => $this->pendaftarSktm->db->query("SELECT  * FROM pendaftar_sktm ORDER BY id DESC")->getResultArray()
        ];

        return view('admin/pendaftarSktm', $data);
    }

    public function printSurat($data = null)
    {
        $data = [
            'title' => 'Print Surat',
            'pendaftar' => $this->pendaftarSktm->find($data)
        ];

        return view('admin/printSurat', $data);
    }

    public function suratSelesai($data = null)
    {
        $id = $this->request->getPost('id');
        $this->pendaftarSktm->update($id, [
            'status_surat' => "selesai"
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

    public function getTableDateDesa($data = null)
    {
        $data = [
            'dataDesa' => $this->dataDesa->findAll()
        ];

        echo json_encode(view("admin/table/tableDataDesa", $data));
    }
}
