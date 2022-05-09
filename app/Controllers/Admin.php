<?php

namespace App\Controllers;

use App\Models\BeritaModel;
use App\Models\KategoriModel;

class Admin extends BaseController
{
    protected $kategori;
    protected $BeritaModel;
    public function __construct()
    {
        $this->kategori = new KategoriModel();
        $this->BeritaModel = new BeritaModel();
    }

    public function index()
    {
        $data = [
            'title' => "Beranda",
            'jumlahBerita' => $this->BeritaModel->findAll()
        ];
        return view('admin/beranda', $data);
    }

    public function dataBerita($data = null)
    {
        session();
        $data = [
            'title' => "Data Berita",
            'berita' => $this->BeritaModel->db->query("SELECT * FROM berita ORDER BY id DESC")->getResultArray(),
            'validasi' => \Config\Services::validation()
        ];

        return view("admin/dataBerita", $data);
    }

    public function buatBerita($data = null)
    {
        session();
        $data = [
            'title' => "Buat Berita",
            'kategori' => $this->kategori->semua(),
            'validasi' => \Config\Services::validation()
        ];

        return view("admin/buatBerita", $data);
    }

    public function detailBerita($data = null)
    {
        $data = [
            'title' => "Detail Berita",
            'berita' => $this->BeritaModel->find($data)
        ];

        return view('admin/detailBerita', $data);
    }

    public function getRinciBerita($data = null)
    {
        $id = $this->request->getPost('id');

        $data = [
            'title' => "Detail Berita",
            'berita' => $this->BeritaModel->find($id)
        ];

        echo json_encode(view("admin/rinciBerita", $data));
    }
}
