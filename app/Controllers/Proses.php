<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\BeritaModel;
use App\Models\dataDesaModel;
use App\Models\KomentarModel;
use App\Models\PendaftarSktm;
use App\Models\ProfilDesa;

class Proses extends BaseController
{
    protected $validasi;
    protected $AdminModel;
    protected $BeritaModel;
    protected $profilDesa;
    protected $dataDesa;
    protected $pendaftarSktm;
    protected $KomentarModel;
    public function __construct()
    {
        $this->validasi = \Config\Services::validation();
        $this->AdminModel = new AdminModel();
        $this->BeritaModel = new BeritaModel();
        $this->profilDesa = new ProfilDesa();
        $this->dataDesa = new dataDesaModel();
        $this->pendaftarSktm = new PendaftarSktm();
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

    public function pendaftaranSktm($data = null)
    {
        $data = $this->request->getVar();
        $nik = $data['nik'];

        $dataPendaftar = $this->pendaftarSktm->db->query("SELECT * FROM pendaftar_sktm WHERE nik = $nik AND status_surat = 'proses'");
        // echo $dataPendaftar->getNumRows();
        // die;

        if (!$this->validate([
            'nik' => [
                'rules' => "required|numeric|max_length[16]|min_length[16]",
                'errors' => [
                    'required' => "Maaf Judul harus di isi",
                    'numeric' => "Maaf Sepertinya anda salah memasukan nik",
                    'max_length' => "Maaf Sepertinya anda salah memasukan nik, Nik Harus Berjumlah 16 angka",
                    'min_length' => "Maaf Sepertinya anda salah memasukan nik, Nik Harus Berjumlah 16 angka",
                ]
            ],
            'tlp' => [
                'rules' => "required|max_length[14]",
                'errors' => [
                    'required' => "Maaf Telepon Tidak Boleh Kosong",
                    'max_length' => "Maaf Sepertinya No yang anda masukan salah, Silahkan cek kembali"
                ]
            ]
        ])) {
            $pesan = [
                'errors' => [
                    "nik" => $this->validasi->getError('nik'),
                    "tlp" => $this->validasi->getError('tlp'),
                ]
            ];

            echo json_encode($pesan);
        } else {

            if ($dataPendaftar->getNumRows() > 0) {
                $pesan = [
                    'errors' => [
                        "nik" => "Maaf Anda Sudah Mendaftar, Surat Anda Sedang Di Proses Mohon Di Tunggu"
                    ]
                ];

                echo json_encode($pesan);
            } else {

                if (substr($data['nik'], 0, 4) != 3205) {
                    $pesan = [
                        'errors' => [
                            "nik" => "Maaf Sepertinya yang anda masukan bukan nik, Silahkan Coba Lagi"
                        ]
                    ];

                    echo json_encode($pesan);
                } else {
                    if (substr($data['tlp'], 0, 4) != '+628') {
                        $pesan = [
                            'errors' => [
                                "tlp" => "Maaf format telepon harus +62, contoh +6281234567890"
                            ]
                        ];

                        echo json_encode($pesan);
                    } else {

                        $this->pendaftarSktm->save([
                            'nama' => $data['nama'],
                            'nik' => $data['nik'],
                            'jk' => $data['jk'],
                            'ttl' => $data['ttl'],
                            'agama' => $data['agama'],
                            'status' => $data['status'],
                            'pendidikan' => $data['pendidikan'],
                            'status_kawin' => $data['statusKawin'],
                            'alamat' => $data['alamat'],
                            'status_surat' => 'proses',
                            'tlp' => $data['tlp'],
                            'kepentingan' => $data['kepentingan']
                        ]);

                        $pesan = [
                            'sukses' => "Berhasil Mendaftar"
                        ];

                        echo json_encode($pesan);
                    }
                }
            }
        }
    }

    public function logout($data = null)
    {
        session()->remove('login');
        session()->remove('username');
        session()->remove('email');

        return redirect()->to(base_url(""));
    }

    public function cekSurat($data = null)
    {
        $nik = $this->request->getPost('nik');

        $data = $this->pendaftarSktm->db->query("SELECT * FROM pendaftar_sktm WHERE nik = $nik");
        // $data = $this->pendaftarSktm->where('nik', $nik)->get();

        if ($data->getNumRows() > 0) {
            $data = $data->getRowArray();
            $data = [
                'status' => 200,
                'data' => $data
            ];

            echo json_encode($data);
        } else {
            $data = [
                'status' => 400,
                'data' => null
            ];

            echo json_encode($data);
        }
    }

    public function setProfilDesa($data = null)
    {
        $data = $this->request->getVar();

        $this->profilDesa->save([
            'nama_desa' => htmlspecialchars($data['nama_desa']),
            'provinsi' => htmlspecialchars($data['provinsi']),
            'kabupaten' => htmlspecialchars($data['kabupaten']),
            'kecamatan' => htmlspecialchars($data['kecamatan']),
            'email' => htmlspecialchars($data['email']),
            'tlp' => htmlspecialchars($data['telepon']),
            'kode_pos' => htmlspecialchars($data['kode_pos']),
            'alamat' => htmlspecialchars($data['alamat']),
        ]);

        $pesan = [
            'status' => 200,
            'pesan' => "Berhasil Melengkapi Profil Desa"
        ];

        echo json_encode($pesan);
    }

    public function editProfilDesa($data = null)
    {
        $data = $this->request->getVar();
        // echo json_encode($data);
        // die;

        $this->profilDesa->update($data['id'], [
            'nama_desa' => htmlspecialchars($data['nama_desa']),
            'provinsi' => htmlspecialchars($data['provinsi']),
            'kabupaten' => htmlspecialchars($data['kabupaten']),
            'kecamatan' => htmlspecialchars($data['kecamatan']),
            'email' => htmlspecialchars($data['email']),
            'tlp' => htmlspecialchars($data['telepon']),
            'kode_pos' => htmlspecialchars($data['kode_pos']),
            'alamat' => htmlspecialchars($data['alamat']),
        ]);

        $pesan = [
            'status' => 200,
            'pesan' => "Berhasil Mengubah Profil Desa"
        ];

        echo json_encode($pesan);
    }

    public function simpanDataDesa()
    {
        $data = $this->request->getVar();

        $this->dataDesa->save([
            'atribut' => $data['data'],
            'jumlah' => $data['jumlah']
        ]);

        $pesan = [
            'status' => 200,
            'pesan' => "Berhasil Menambahkan Data Desa"
        ];

        echo json_encode($pesan);
    }

    public function getDataDesa()
    {
        $data = $this->dataDesa->db->query("SELECT * FROM data_desa")->getResultArray();
        foreach ($data as $row) {
            $atribut[] = $row['atribut'];
        }
        foreach ($data as $row) {
            $jumlah[] = $row['jumlah'];
        }

        $dataArray = [
            'atribut' => $atribut,
            'jumlah' => $jumlah
        ];

        // {
        //     atribut : ['dadsada', 'dasdadad', 'adsadadad', 'dasdadad'],
        //     jumlah : ['asdadad', 'adsadadad', 'dasdadad', 'dasdadadad']
        // }
        // var_dump($data);

        // $data = [
        //     'dataDesa' => 
        // ];

        echo json_encode($dataArray);
    }
}
