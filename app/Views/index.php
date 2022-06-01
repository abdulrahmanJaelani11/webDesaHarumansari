<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Desa <?= $dataDesa['nama_desa'] ? $dataDesa['nama_desa'] : 'nama desa'; ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="<?= base_url("assets"); ?>/img/favicon.ico" rel="icon">

    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url("assets"); ?>/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url("assets"); ?>/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url("assets"); ?>/img/favicon-16x16.png">
    <link rel="manifest" href="<?= base_url("assets"); ?>/img/site.webmanifest">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?= base_url("assets"); ?>/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="<?= base_url("assets"); ?>/lib/animate/animate.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?= base_url("assets"); ?>/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?= base_url("assets"); ?>/css/style.css" rel="stylesheet">
    <style>
        #lokasi {
            width: 100%;
            height: 600px;
        }

        @media screen and (max-width: 400px) {
            #lokasi {
                width: 100%;
                height: 700px;
            }
        }
    </style>

</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner"></div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid bg-dark px-5 d-none d-lg-block">
        <div class="row gx-0">
            <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <small class="me-3 text-light"><i class="fa fa-map-marker-alt me-2"></i><?= $dataDesa['alamat'] ? $dataDesa['alamat'] : 'alamat'; ?></small>
                    <small class="me-3 text-light"><i class="fa fa-phone-alt me-2"></i><?= $dataDesa['tlp'] ? $dataDesa['tlp'] : 'telepon'; ?></small>
                    <small class="text-light"><i class="fa fa-envelope-open me-2"></i><?= $dataDesa['email'] ? $dataDesa['email'] : 'email'; ?></small>
                </div>
            </div>
            <div class="col-lg-4 text-center text-lg-end">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-twitter fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-facebook-f fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-linkedin-in fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-instagram fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle" href=""><i class="fab fa-youtube fw-normal"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar & Carousel Start -->
    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-dark px-5 py-3 py-lg-0">
            <a href="<?= base_url(""); ?>" class="navbar-brand p-0">
                <h1 class="m-0"><i class="fa fa-home me-2"></i><?= $dataDesa['nama_desa'] ? $dataDesa['nama_desa'] : 'nama desa'; ?></h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="<?= base_url(""); ?>" class="nav-item nav-link active">Beranda</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Profil Desa</a>
                        <div class="dropdown-menu m-0">
                            <a href="<?= base_url("sejarah"); ?>" class="dropdown-item">Sejarah</a>
                            <a href="<?= base_url("visi-misi"); ?>" class="dropdown-item">Visi & Misi</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Statistk</a>
                        <div class="dropdown-menu m-0">
                            <a href="<?= base_url("statistik-data-desa"); ?>" class="dropdown-item">Data Desa</a>
                            <a href="<?= base_url("statistik-penduduk"); ?>" class="dropdown-item">Data Penduduk</a>
                            <a href="<?= base_url("statistik-kawin"); ?>" class="dropdown-item">Data Status Perkawinan</a>
                            <a href="<?= base_url("statistik-agama"); ?>" class="dropdown-item">Data Agama</a>
                            <a href="<?= base_url("statistik-kelompok-usia"); ?>" class="dropdown-item">Data Kelompok Usia</a>
                        </div>
                    </div>
                    <a href="<?= base_url('layanan'); ?>" class="nav-item nav-link">Layanan Online</a>
                    <a href="<?= base_url('berita'); ?>" class="nav-item nav-link">Berita</a>
                </div>
                <a href="<?= base_url("login"); ?>" class="btn btn-primary py-2 px-4 ms-3">Kelola</a>
            </div>
        </nav>

        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="<?= base_url("assets"); ?>/img/alam-3.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h6 class="display-5 text-white mb-md-4 animated zoomIn">Selamat Datang di Website Resmi Desa <?= $dataDesa['nama_desa'] ? $dataDesa['nama_desa'] : 'nama desa'; ?></h6>
                            <a href="<?= $dataDesa['email'] ? 'mailto:' . $dataDesa['email'] : '#'; ?>" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft"><i class="fas fa-envelope"></i> Email</a>
                            <a href="" class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight"><i class="fab fa-whatsapp"></i> WhatsApp</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="<?= base_url("assets"); ?>/img/alam-1.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h6 class="display-5 text-white mb-md-4 animated zoomIn">Hubungi Kami</h6>
                            <a href="quote.html" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft"><i class="fas fa-envelope"></i> Email</a>
                            <a href="" class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight"><i class="fab fa-whatsapp"></i> WhatsApp</a>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Navbar & Carousel End -->


    <!-- Full Screen Search Start -->
    <div class="modal fade" id="searchModal" tabindex="-1">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content" style="background: rgba(9, 30, 62, .7);">
                <div class="modal-header border-0">
                    <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center justify-content-center">
                    <div class="input-group" style="max-width: 600px;">
                        <input type="text" class="form-control bg-transparent border-primary p-3" placeholder="Type search keyword">
                        <button class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Full Screen Search End -->


    <!-- Facts Start -->
    <div class="container-fluid facts py-5 pt-lg-0">
        <div class="container py-5 pt-lg-0">
            <div class="row gx-0 justify-content-center">
                <?php foreach ($dataDesa2 as $row) : ?>
                    <div class="col-lg-4 wow zoomIn" data-wow-delay="0.1s">
                        <div class="bg-primary shadow d-flex align-items-center justify-content-center p-4" style="height: 150px;">
                            <div class="bg-white d-flex align-items-center justify-content-center rounded mb-2" style="width: 60px; height: 60px;">
                                <i class="fa fa-users text-primary"></i>
                            </div>
                            <div class="ps-4">
                                <h5 class="text-white mb-0"><?= $row['atribut']; ?></h5>
                                <h1 class="text-white mb-0" data-toggle="counter-up"><?= $row['jumlah']; ?></h1>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <!-- Facts Start -->


    <!-- Lokasi Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s" id="about">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-12">
                    <div class="section-title position-relative pb-3 mb-5">
                        <h5 class="fw-bold text-primary text-uppercase">Lokasi Kami</h5>
                        <h1 class="mb-0">Lokasi Geografis Desa</h1>
                    </div>
                    <div id="lokasi" class=" row">
                        <div class="col-lg-9">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2685.920279791697!2d107.926603697704!3d-7.0730448079964505!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68c97d1e7e995d%3A0x22a5ab71114a7520!2sBUMDes%20Harummakmur!5e1!3m2!1sen!2sid!4v1653052304379!5m2!1sen!2sid" width="100%" height="85%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="card-body">

                                    <p style="line-height: 10px;">Provinsi : <?= $dataDesa['provinsi']; ?></p>
                                    <p style="line-height: 10px;">Kabupaten : <?= $dataDesa['kabupaten']; ?></p>
                                    <p style="line-height: 10px;">Kecamatan : <?= $dataDesa['kecamatan']; ?></p>
                                    <p style="line-height: 10px;">Email : <?= $dataDesa['email']; ?></p>
                                    <p style="line-height: 10px;">Telepon : <?= $dataDesa['tlp']; ?></p>
                                    <p style="line-height: 10px;">alamat : <?= $dataDesa['alamat']; ?></p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Team Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Aparatur Desa</h5>
                <h1 class="mb-0">Para Kesatria hebat Desa <?= $dataDesa['nama_desa'] ? $dataDesa['nama_desa'] : 'nama desa'; ?></h1>
            </div>
            <div class="row g-5 justify-content-center">
                <?php foreach ($dataAparatDesa as $row) : ?>
                    <div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
                        <div class="team-item bg-light rounded overflow-hidden">
                            <div class="team-img position-relative overflow-hidden">
                                <img class="img-fluid w-100" src="<?= base_url("assets"); ?>/img/team-1.jpg" alt="">
                                <div class="team-social">
                                    <?php if ($row['wa']) : ?>
                                        <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i class="fab fa-whatsapp fw-normal"></i></a>
                                    <?php endif ?>
                                    <?php if ($row['email']) : ?>
                                        <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i class="fas fa-envelope fw-normal"></i></a>
                                    <?php endif ?>
                                </div>
                            </div>
                            <div class="text-center py-4">
                                <h4 class="text-primary"><?= $row['nama']; ?></h4>
                                <p class="text-uppercase m-0"><?= $row['jabatan']; ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <!-- Team End -->


    <!-- Blog Start -->
    <!-- Blog Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Berita Terbaru</h5>
                <h1 class="mb-0">Lihat Semua Berita di halaman berita kami</h1>
            </div>
            <div class="row g-5">
                <div class="col-lg-8">
                    <!-- Blog Detail Start -->
                    <div class="mb-5">
                        <div class="row">
                            <div class="col-md-12 wow slideInUp" data-wow-delay="0.1s">
                                <div class="blog-item bg-light rounded overflow-hidden">
                                    <div class="blog-img position-relative overflow-hidden">
                                        <img class="img-fluid" src="<?= base_url("assetsAdmin"); ?>/img/<?= $viewBerita['img']; ?>" alt="">
                                        <a class="position-absolute top-0 start-0 bg-primary text-white rounded-end mt-5 py-2 px-4" href="">Berita</a>
                                    </div>
                                    <div class="p-4">
                                        <div class="d-flex mb-3">
                                            <small class="me-3"><i class="far fa-user text-primary me-2"></i><?= $viewBerita['penulis']; ?></small>
                                            <small><i class="far fa-calendar-alt text-primary me-2"></i><?= $viewBerita['tanggal']; ?></small>
                                        </div>
                                        <h4 class="mb-3"><?= $viewBerita['judul']; ?></h4>
                                        <a class="text-uppercase" href="<?= base_url("detail/" . $viewBerita['id']); ?>">Lihat <i class="bi bi-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Blog Detail End -->

                    <div class="daftar-komentar"></div>
                </div>

                <!-- Sidebar Start -->
                <div class="col-lg-4">

                    <!-- Category Start -->
                    <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                        <div class="section-title section-title-sm position-relative pb-3 mb-4">
                            <h3 class="mb-0">Kategori Berita</h3>
                        </div>
                        <div class="link-animated d-flex flex-column justify-content-start">
                            <?php foreach ($kategori as $row) : ?>
                                <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="<?= base_url("berita/" . $row['id']); ?>"><i class="bi bi-arrow-right me-2"></i><?= $row['kategori']; ?></a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <!-- Category End -->

                    <!-- Recent Post Start -->
                    <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                        <div class="section-title section-title-sm position-relative pb-3 mb-4">
                            <h3 class="mb-0">Berita Terbaru</h3>
                        </div>
                        <?php foreach ($beritaBaru as $row) : ?>
                            <div class="d-flex rounded overflow-hidden mb-3">
                                <img class="img-fluid" src="<?= base_url("assetsAdmin"); ?>/img/<?= $row['img']; ?>" style="width: 100px; height: 100px; object-fit: cover;" alt="">
                                <a href="<?= base_url("detail/" . $row['id']); ?>" class="h5 fw-semi-bold d-flex align-items-center bg-light px-3 mb-0"><?= $row['judul']; ?></a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <!-- Recent Post End -->

                    <!-- Image Start -->
                    <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                        <img src="img/blog-1.jpg" alt="" class="img-fluid rounded">
                    </div>
                    <!-- Image End -->
                </div>
                <!-- Sidebar End -->
            </div>
        </div>
    </div>
    <!-- Blog End -->
    <!-- Blog Start -->


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light mt-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-4 col-md-6 footer-about">
                    <div class="d-flex flex-column align-items-center justify-content-center text-center h-100 bg-primary p-4">
                        <a href="index.html" class="navbar-brand">
                            <h1 class="m-0 text-white"><i class="fa fa-user-tie me-2"></i>Harumansari </h1>
                        </a>
                        <p class="mt-3 mb-4">Lorem diam sit erat dolor elitr et, diam lorem justo amet clita stet eos sit. Elitr dolor duo lorem, elitr clita ipsum sea. Diam amet erat lorem stet eos. Diam amet et kasd eos duo.</p>
                    </div>
                </div>
                <div class="col-lg-8 col-md-6">
                    <div class="row gx-5">
                        <div class="col-lg-4 col-md-12 pt-5 mb-5">
                            <div class="section-title section-title-sm position-relative pb-3 mb-4">
                                <h3 class="text-light mb-0">Kontak</h3>
                            </div>
                            <div class="d-flex mb-2">
                                <i class="bi bi-geo-alt text-primary me-2"></i>
                                <p class="mb-0"><?= $dataDesa['alamat']; ?></p>
                            </div>
                            <div class="d-flex mb-2">
                                <i class="bi bi-envelope-open text-primary me-2"></i>
                                <p class="mb-0"><?= $dataDesa['email']; ?></p>
                            </div>
                            <div class="d-flex mb-2">
                                <i class="bi bi-telephone text-primary me-2"></i>
                                <p class="mb-0"><?= $dataDesa['tlp']; ?></p>
                            </div>
                            <div class="d-flex mt-4">
                                <a class="btn btn-primary btn-square me-2" href="#"><i class="fab fa-twitter fw-normal"></i></a>
                                <a class="btn btn-primary btn-square me-2" href="#"><i class="fab fa-facebook-f fw-normal"></i></a>
                                <a class="btn btn-primary btn-square me-2" href="#"><i class="fab fa-linkedin-in fw-normal"></i></a>
                                <a class="btn btn-primary btn-square" href="#"><i class="fab fa-instagram fw-normal"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                            <div class="section-title section-title-sm position-relative pb-3 mb-4">
                                <h3 class="text-light mb-0">Sosmed Desa</h3>
                            </div>
                            <div class="link-animated d-flex flex-column justify-content-start">
                                <a class="text-light mb-2" href="#"><i class="bi bi-facebook text-primary me-2"></i>Facebook</a>
                                <a class="text-light mb-2" href="https://www.instagram.com/abdurahman_jaelani/"><i class="bi bi-instagram text-primary me-2"></i>Instagram</a>
                                <a class="text-light mb-2" href="https://www.linkedin.com/in/abdul-rahman-jaelani-bb8496206/"><i class="bi bi-linkedin text-primary me-2"></i>LinkedIn</a>
                                <a class="text-light" href="mailto:<?= $dataDesa['email']; ?>"><i class="bi bi-envelope text-primary me-2"></i>Email</a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                            <div class="section-title section-title-sm position-relative pb-3 mb-4">
                                <h3 class="text-light mb-0">Developer</h3>
                            </div>
                            <div class="link-animated d-flex flex-column justify-content-start">
                                <a class="text-light mb-2" href="#"><i class="bi bi-facebook text-primary me-2"></i>Facebook</a>
                                <a class="text-light mb-2" href="https://www.instagram.com/abdurahman_jaelani/"><i class="bi bi-instagram text-primary me-2"></i>Instagram</a>
                                <a class="text-light mb-2" href="https://www.linkedin.com/in/abdul-rahman-jaelani-bb8496206/"><i class="bi bi-linkedin text-primary me-2"></i>LinkedIn</a>
                                <a class="text-light" href="mailto:randikaangga9044@gmail.com"><i class="bi bi-envelope text-primary me-2"></i>Email</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid text-white" style="background: #061429;">
        <div class="container text-center">
            <div class="row justify-content-end">
                <div class="col-lg-8 col-md-6">
                    <div class="d-flex align-items-center justify-content-center" style="height: 75px;">
                        <p class="mb-0">&copy; <a class="text-white border-bottom" href="#">Sistem Informasi Desa Harumansari</a>. Created by Abdurahman Jaelani.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i class="bi bi-arrow-up"></i></a>


    <?= $this->renderSection('script'); ?>
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url("assets"); ?>/lib/wow/wow.min.js"></script>
    <script src="<?= base_url("assets"); ?>/lib/easing/easing.min.js"></script>
    <script src="<?= base_url("assets"); ?>/lib/waypoints/waypoints.min.js"></script>
    <script src="<?= base_url("assets"); ?>/lib/counterup/counterup.min.js"></script>
    <script src="<?= base_url("assets"); ?>/lib/owlcarousel/owl.carousel.min.js"></script>

    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAnhQbXIdtanl9x-zSJJb8SeGKevu3m1zA&callback=initialize"></script>

    <!-- Template Javascript -->
    <script src="<?= base_url("assets"); ?>/js/main.js"></script>
    <script src="<?= base_url("assets"); ?>/js/chart.js"></script>
    <!-- <script>
        function initialize() {
            var propertiPeta = {
                center: new google.maps.LatLng(-7.06629, 107.93293),
                zoom: 8
            }

            var peta = new google.maps.Map(document.getElementById("lokasi"), propertiPeta)
        }
        $(document).ready(function() {
            initialize()
        })
    </script> -->
</body>

</html>