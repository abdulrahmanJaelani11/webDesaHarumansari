<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\BeritaModel;
use App\Models\dataAgamaModel;
use App\Models\dataDesaModel;
use App\Models\DataPendudukModel;
use App\Models\dataStatusPerkawinan;
use App\Models\KelompokUsiaModel;
use App\Models\KomentarModel;
use App\Models\PendaftarSktm;
use App\Models\ProfilDesaModel;

class Proses extends BaseController
{
    protected $validasi;
    protected $AdminModel;
    protected $BeritaModel;
    protected $profilDesa;
    protected $dataDesa;
    protected $dataAgama;
    protected $dataPenduduk;
    protected $dataStatusPerkawinanModel;
    protected $pendaftarSktm;
    protected $KomentarModel;
    public function __construct()
    {
        $this->validasi = \Config\Services::validation();
        $this->AdminModel = new AdminModel();
        $this->BeritaModel = new BeritaModel();
        $this->profilDesa = new ProfilDesaModel();
        $this->dataDesa = new dataDesaModel();
        $this->dataAgama = new dataAgamaModel();
        $this->dataKelompokUsia = new KelompokUsiaModel();
        $this->dataPenduduk = new DataPendudukModel();
        $this->dataStatusPerkawinanModel = new dataStatusPerkawinan();
        $this->pendaftarSktm = new PendaftarSktm();
        $this->KomentarModel = new KomentarModel();
        helper("email_helper");
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
                if (password_verify($data['password'], $admin[0]['password'])) {
                    $id = $admin[0]['id'];
                    $session = [
                        'id' => $id,
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
                    // return redirect()->to("beranda");
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
                'rules' => "required|max_length[14]|min_length[14]",
                'errors' => [
                    'required' => "Maaf Telepon Tidak Boleh Kosong",
                    'max_length' => "Maaf Sepertinya No Tlp yang anda masukan salah, Silahkan cek kembali",
                    'min_length' => "Maaf Sepertinya No Tlp yang anda masukan salah, Silahkan cek kembali",
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
                            'kepentingan' => $data['kepentingan'],
                            'tgl_daftar' => date('d-m-Y')
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
            if ($data['status_surat'] == 'proses') {
                $pesan = "Maaf, Surat Anda Sedang Di Proses";
            } else {
                $pesan = "Surat Anda Telah Selesai, Silahkan Ambil Di Kantor Desa Harumansari";
            }
            $data = [
                'status' => 200,
                'data' => $data,
                'pesan' => $pesan
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
        echo json_encode($dataArray);
    }

    public function getDataPenduduk()
    {
        $data = $this->dataDesa->db->query("SELECT * FROM data_penduduk")->getResultArray();
        if ($data == [] and count($data) < 2) {
            echo json_encode($data);
        } else {
            $total = $data[0]['jumlah'] + $data[1]['jumlah'];
            $dataArray = [
                'atribut' => [$data[0]['jk'], $data[1]['jk'], 'total'],
                'jumlah' => [$data[0]['jumlah'], $data[1]['jumlah'], $total],
            ];

            echo json_encode($dataArray);
        }
    }

    public function hapusDataDesa($data = null)
    {
        $id = $this->request->getVar('id');

        $this->dataDesa->delete($id);

        $pesan = [
            'status' => 200,
            'pesan' => "Data Berhasil dihapus"
        ];

        echo json_encode($pesan);
    }

    public function simpanSejarah($data = null)
    {
        $data = $this->request->getPost('sejarah');

        $this->profilDesa->update(1, [
            'sejarah' => $data
        ]);

        $pesan = [
            'status' => 200,
            'pesan' => "Berhasil Menambahkan Sejarah"
        ];

        echo json_encode($pesan);
    }

    public function simpanVisiMisi($data = null)
    {
        $data = $this->request->getPost('visiMisi');

        $this->profilDesa->update(1, [
            'visi_misi' => $data
        ]);
        $pesan = [
            'status' => 200,
            'pesan' => "Berhasil Menambahkan Visi Misi"
        ];

        echo json_encode($pesan);
    }

    public function simpanDataPenduduk($data = null)
    {
        $data = $this->request->getPost();
        if (!$this->validate([
            'jk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "Field tidak boleh kosong",
                ]
            ],
            'jumlah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "Field tidak boleh kosong",
                ]
            ],
        ])) {
            $pesan = [
                'status' => 400,
                'pesan' => [
                    'jk' => $this->validasi->getError('jk'),
                    'jumlah' => $this->validasi->getError('jumlah'),
                ]
            ];

            echo json_encode($pesan);
        } else {
            $this->dataPenduduk->save([
                'jk' => $data['jk'],
                'jumlah' => $data['jumlah'],
            ]);

            $pesan = [
                'status' => 200,
                'pesan' => "Berhasil Menambahkan Data Penduduk"
            ];
            echo json_encode($pesan);
        }
    }

    public function updateDataPenduduk($data = null)
    {
        $data = $this->request->getPost();
        if (!$this->validate([
            'jumlah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "Field tidak boleh kosong",
                ]
            ],
        ])) {
            $pesan = [
                'status' => 400,
                'pesan' => [
                    'jumlah' => $this->validasi->getError('jumlah'),
                ]
            ];

            echo json_encode($pesan);
        } else {
            $this->dataPenduduk->update($data['id'], [
                'jumlah' => $data['jumlah'],
            ]);

            $pesan = [
                'status' => 200,
                'pesan' => "Berhasil Mengubah Data Penduduk"
            ];
            echo json_encode($pesan);
        }
    }

    public function getDataStatusKawin($data = null)
    {
        $data = $this->dataStatusPerkawinanModel->db->query("SELECT * FROM statistik_status_kawin")->getResultArray();
        foreach ($data as $row) {
            $status_kawin[] = $row['status_kawin'];
        }
        foreach ($data as $row) {
            $jumlah[] = $row['jumlah'];
        }

        $dataArray = [
            'status_kawin' => $status_kawin,
            'jumlah' => $jumlah
        ];
        echo json_encode($dataArray);
    }

    public function getDataAgama()
    {
        $data = $this->dataStatusPerkawinanModel->db->query("SELECT * FROM statistik_agama")->getResultArray();
        foreach ($data as $row) {
            $agama[] = $row['agama'];
        }
        foreach ($data as $row) {
            $jumlah[] = $row['jumlah'];
        }

        $dataArray = [
            'agama' => $agama,
            'jumlah' => $jumlah
        ];
        echo json_encode($dataArray);
    }

    public function getDataKelomUsia()
    {
        $kelompokUsia = new KelompokUsiaModel();
        $data = $kelompokUsia->db->query("SELECT * FROM statistik_kelompok_usia")->getResultArray();
        foreach ($data as $row) {
            $usia[] = $row['usia'];
        }
        foreach ($data as $row) {
            $jumlah[] = $row['jumlah'];
        }

        $dataArray = [
            'usia' => $usia,
            'jumlah' => $jumlah
        ];
        echo json_encode($dataArray);
    }

    public function ubahStatusKawin()
    {
        $data = $this->request->getPost();

        $this->dataStatusPerkawinanModel->update($data['id'], [
            'jumlah' => $data['jumlah']
        ]);

        $pesan = [
            'status' => 200,
            'pesan' => "Berhasil Mengubah data"
        ];

        echo json_encode($pesan);
    }

    public function ubahDataAgama()
    {
        $data = $this->request->getPost();

        $this->dataAgama->update($data['id'], [
            'jumlah' => $data['jumlah']
        ]);

        $pesan = [
            'status' => 200,
            'pesan' => "Berhasil Mengubah data"
        ];

        echo json_encode($pesan);
    }

    public function updateDataKelomUsia()
    {
        $data = $this->request->getPost();

        $this->dataKelompokUsia->update($data['id'], [
            'jumlah' => $data['jumlah']
        ]);

        $pesan = [
            'status' => 200,
            'pesan' => "Berhasil Mengubah data"
        ];

        echo json_encode($pesan);
    }

    public function lupaPassword()
    {
        $email = $this->request->getVar('email');
        if (!$this->validate([
            'email' => [
                'rules' => "required",
                'errors' => [
                    'required' => "Maaf Email Harus Di Isi"
                ]
            ]
        ])) {
            $pesan = [
                'status' => "400",
                'pesan' => $this->validasi->getError('email')
            ];

            echo json_encode($pesan);
        } else {
            $dataAkunLama = $this->AdminModel->getWhere(['email' => $email])->getRowArray();

            // echo json_encode($dataAkunLama);
            // die;
            if (!$dataAkunLama) {

                $pesan = [
                    'status' => "400",
                    'pesan' => "Maaf Email Tidak Terdaftar"
                ];

                echo json_encode($pesan);
            } else {
                $email = $dataAkunLama['email'];
                $token = md5(date('ymdhis'));

                $link = site_url("Admin/resetPass/?email=$email&token=$token");
                $attachment = "";
                $title = "Reset Password";
                $to = $email;
                $pesan = "Berikut ini adalah link untuk melakukan reset password Anda, Silahkan klik link berikut untuk melakukan reset password " . $link;

                kirim_email($attachment, $to, $title, $pesan);

                $this->AdminModel->update($dataAkunLama['id'], [
                    'token' => $token
                ]);

                $pesan = [
                    'status' => "200",
                    'pesan' => "Email Untuk Recovery sudah kami kirimkan ke Email Anda"
                ];

                echo json_encode($pesan);
            }
        }
    }

    public function simpanDataMe()
    {
        $data = $this->request->getVar();
        // echo json_encode($data);
        $validasi = [
            'nik' => [
                'rules' => "required|max_length[16]|min_length[16]",
                'errors' => [
                    'required' => 'Maaf, Nik tidak boleh kosong',
                    'max_length' => "Maaf Sepertinya nik yang anda masukan Salah, Nik harus berjumlah 16 angka",
                    'min_length' => "Maaf Sepertinya nik yang anda masukan Salah, Nik harus berjumlah 16 angka",
                ]
            ],
            'nama_lengkap' => [
                'rules' => "required",
                'errors' => [
                    'required' => 'Maaf, Nama tidak boleh kosong',
                ]
            ],
        ];
        if (!$this->validate($validasi)) {
            $pesan = [
                'status' => 200,
                'pesan' => [
                    'nik' => $this->validasi->getError('nik'),
                    'nama' => $this->validasi->getError('nama_lengkap')
                ]
            ];
            echo json_encode($pesan);
        } else {
            $email = session()->get('email');
            $id = session()->get('id');
            $cek = $this->AdminModel->getWhere(['nik' => $data['nik']])->getRowArray();
            $dataAkunLama = $this->AdminModel->getWhere(['email' => $email])->getRowArray();
            if ($cek) {
                if ($data['nik'] == $dataAkunLama['nik']) {
                    $this->AdminModel->update($id, [
                        'email' => htmlspecialchars($data['email']),
                        'username' => htmlspecialchars($data['username']),
                        'nama_lengkap' => htmlspecialchars($data['nama_lengkap']),
                        'nik' => htmlspecialchars($data['nik']),
                        'img' => ''
                    ]);
                    $pesan = [
                        'status' => 400,
                        'pesan' => "Berhasil MengUpdate Data"
                    ];
                    echo json_encode($pesan);
                } else {
                    $pesan = [
                        'status' => 200,
                        'pesan' => [
                            'nik' => "Maaf Nik Sudah Terdaftar"
                        ]
                    ];
                    echo json_encode($pesan);
                }
            } else {
                $this->AdminModel->update($id, [
                    'email' => htmlspecialchars($data['email']),
                    'username' => htmlspecialchars($data['username']),
                    'nama_lengkap' => htmlspecialchars($data['nama_lengkap']),
                    'nik' => htmlspecialchars($data['nik']),
                    'img' => ''
                ]);
                $pesan = [
                    'status' => 400,
                    'pesan' => "Berhasil MengUpdate Data"
                ];
                echo json_encode($pesan);
            }
        }
    }

    public function tambahDataPenduduk()
    {
        $data = $this->request->getVar();

        $this->dataPenduduk->save([
            'jk' => htmlspecialchars($data['jenis_kelamin']),
            'jumlah' => htmlspecialchars($data['jumlah'])
        ]);

        $pesan = [
            'status' => 200,
            'pesan' => 'Berhasil Menambahkan data penduduk'
        ];

        echo json_encode($pesan);
    }

    public function simpanDataKelompokUsia()
    {
        $data = $this->request->getVar();
        $this->dataKelompokUsia->save([
            'usia' => htmlspecialchars($data['usia']),
            'jumlah' => htmlspecialchars($data['jumlah'])
        ]);

        $pesan = [
            'status' => 200,
            'pesan' => "Berhasil Menambahkan Data Kelompok Usia"
        ];

        echo json_encode($pesan);
    }
}
