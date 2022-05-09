<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\BeritaModel;
use App\Models\KomentarModel;
use CodeIgniter\CodeIgniter;

class Proses extends BaseController
{
    protected $validasi;
    protected $AdminModel;
    protected $BeritaModel;
    protected $KomentarModel;
    public function __construct()
    {
        $this->validasi = \Config\Services::validation();
        $this->AdminModel = new AdminModel();
        $this->BeritaModel = new BeritaModel();
        $this->KomentarModel = new KomentarModel();
    }

    public function prosesLogin()
    {
        $data = $this->request->getVar();

        if (!$this->validate([
            'email' => [
                'rules' => "required",
                'errors' => [
                    'required' => "Maaf {field} tidak boleh kosong",
                ]
            ],
        ])) {
            $pesan = [
                'status' => 400,
                'errors' => [
                    'email' => $this->validasi->getError('email')
                ]
            ];
            echo json_encode($pesan);
        } else {
            $admin = $this->AdminModel->getWhere(['email' => $data['email']])->getResultArray();
            if (count($admin) > 0) {
                if ($data['password'] == $admin[0]['password']) {
                    $session = [
                        'login' => true,
                        'username' => $admin[0]['username'],
                        'email' => $admin[0]['email']
                    ];
                    session()->set($session);
                    $pesan = [
                        'status' => 200,
                        'sukses' => 'Sukses',

                    ];
                    echo json_encode($pesan);
                } else {
                    $pesan = [
                        'status' => 400,
                        'errors' => [
                            'password' => "Maaf, Sepertinya password yang anda masukan salah",
                        ]
                    ];
                    echo json_encode($pesan);
                }
            } else {
                $pesan = [
                    'status' => 400,
                    'errors' => [
                        'email' => "Maaf, Sepertinya Email yang anda masukan salah",
                    ]
                ];
                echo json_encode($pesan);
            }
        }

        // echo json_encode($data);
    }

    public function prosesBuatBerita($data = null)
    {
        $data = $this->request->getVar();
        $foto = $this->request->getFile('foto');
        // dd($foto, $data);

        if (!$this->validate([
            'judul' => [
                'rules' => "required",
                'errors' => [
                    'required' => "Maaf Judul harus di isi"
                ]
            ],
            'foto' => [
                'rules' => 'uploaded[foto]|max_size[foto,5000]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_sizes' => 'Maaf Foto Terlalu besar, Max 2 MB',
                    'uploaded' => 'Maaf Anda harus menyertakan foto',
                    'max_size' => "Ukuran Gambar Terlalu Besar",
                    'is_image' => "Maaf, Yang Anda Masukan bukan Gambar",
                    'mime_in' => "Maaf, Yang Anda Masukan bukan Gambar",
                ]
            ],
            'kategori' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "Anda harus memberikan kategori pada postingan"
                ]
            ]
        ])) {
            return redirect()->to(base_url("buat-berita"))->withInput();
        } else {
            $namaFoto = $foto->getRandomName();
            $foto->move('assetsAdmin/img', $namaFoto);

            $this->BeritaModel->save([
                'judul' => $data['judul'],
                'id_kategori' => $data['kategori'],
                'keterangan' => $data['keterangan'],
                'penulis' => session('username'),
                'tanggal' => date("d-M-Y"),
                'img' => $namaFoto
            ]);

            session()->setFlashdata("pesan", "Berhasil Membuat Berita");
            return redirect()->to("/data-berita");
        }

        // echo json_encode($data);
    }

    public function prosesKomentar($data = null)
    {
        $data = $this->request->getVar();
        // echo json_encode($data);
        // die;

        if (!$this->validate([
            'nama' => [
                'rules' => "required",
                'errors' => [
                    'required' => "Masukan nama anda sebelum berkomentar"
                ]
            ]
        ])) {
            $pesan = [
                'error' => [
                    'nama' => $this->validasi->getError('nama')
                ]
            ];
            echo json_encode($pesan);
        } else {
            $this->KomentarModel->save([
                'nama' => htmlspecialchars($data['nama']),
                'tlp' => htmlspecialchars($data['telepon']),
                'alamat' => htmlspecialchars($data['alamat']),
                'komentar' => htmlspecialchars($data['komentar']),
                'tanggal' => date("d-M-Y"),
                'id_berita' => htmlspecialchars($data['id_berita']),
            ]);

            $pesan = [
                'sukses' => "Komentar Berhasil disimpan"
            ];

            echo json_encode($pesan);
        }
    }

    public function hapusBerita($data = null)
    {
        $id = $this->request->getPost('id');
        // echo json_encode($id);

        $this->BeritaModel->delete($id);
        $this->KomentarModel->db->query("DELETE FROM komentar WHERE id_berita = $id");

        $pesan = [
            'sukses' => "Berhasil Menghapus Berita"
        ];

        echo json_encode($pesan);
    }

    public function updateBerita($data = null)
    {
        $data = $this->request->getVar();

        if (!$this->validate([
            'judul' => [
                'rules' => "required",
                'errors' => [
                    'required' => "Maaf Judul harus di isi"
                ]
            ],
            'keterangan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "Maaf keterangan tidak boleh kosong"
                ]
            ]
        ])) {
            $pesan = [
                'error' => [
                    'judul' => $this->validasi->getError('judul'),
                    'keterangan' => $this->validasi->getError('keterangan'),
                ]
            ];

            echo json_encode($pesan);
        } else {
            $this->BeritaModel->update($data['id'], [
                'judul' => $data['judul'],
                'keterangan' => $data['keterangan'],
                'penulis' => session('username'),
                'tanggal' => date("d-M-Y"),
            ]);

            $pesan = [
                'sukses' => "Berhasil Mengubah berita"
            ];

            echo json_encode($pesan);
        }
    }

    public function cariBerita($data = null)
    {
        $keyword = $this->request->getPost('keyword');

        $data = [
            'berita' => $this->BeritaModel->db->query("SELECT * FROM berita WHERE judul LIKE '%$keyword%'")->getResultArray()
        ];

        echo json_encode(view("getCariBerita", $data));
    }
}
