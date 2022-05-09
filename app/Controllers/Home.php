<?php

namespace App\Controllers;

use App\Models\BeritaModel;
use App\Models\KategoriModel;
use App\Models\KomentarModel;

class Home extends BaseController
{
    protected $kategori;
    protected $BeritaModel;
    protected $KomentarModel;
    public function __construct()
    {
        $this->kategori = new KategoriModel();
        $this->BeritaModel = new BeritaModel();
        $this->KomentarModel = new KomentarModel();
    }

    public function index()
    {
        return view('index');
    }

    public function login($data = null)
    {
        $data = [
            'title' => "Harumansari"
        ];
        return view("login", $data);
    }

    public function berita($data = null)
    {
        $data = [
            'title' => "Berita",
            'berita' => $this->BeritaModel->db->query("SELECT * FROM berita ORDER BY berita.id ASC LIMIT 10")->getResultArray(),
            'beritaBaru' => $this->BeritaModel->db->query("SELECT * FROM berita ORDER BY id DESC LIMIT 5")->getResultArray(),
            'kategori' => $this->kategori->semua()
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
            'kategori' => $this->kategori->semua()
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
            'komentar' => $this->KomentarModel->findAll()
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
}
