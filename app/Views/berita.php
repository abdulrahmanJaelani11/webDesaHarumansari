<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?= $title; ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="<?= base_url("assets"); ?>/img/favicon.ico" rel="icon">

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
    <link href="<?= base_url("assets"); ?>/css/mycss.css" rel="stylesheet">
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
                <h1 class="m-0 namaDesa"><i class="fa fa-home me-2"></i><?= $dataDesa['nama_desa'] ? $dataDesa['nama_desa'] : 'nama desa'; ?></h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="<?= base_url(""); ?>" class="nav-item nav-link ">Beranda</a>
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
                    <a href="<?= base_url('berita'); ?>" class="nav-item nav-link active">Berita</a>
                </div>
                <a href="<?= base_url("login"); ?>" class="btn btn-primary py-2 px-4 ms-3">Kelola</a>
            </div>
        </nav>

        <div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
            <div class="row py-5">
                <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-4 text-white animated zoomIn">Berita Terkini</h1>
                    <a href="" class="h5 text-white">Home</a>
                    <i class="far fa-circle text-white px-2"></i>
                    <a href="" class="h5 text-white">Blog Grid</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar End -->


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


    <!-- Blog Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <!-- Blog list Start -->
                <div class="col-lg-8 hasilCari">
                    <div class="row g-5">
                        <?php if (count($berita) > 0) : ?>
                            <?php foreach ($berita as $row) : ?>
                                <div class="col-md-6 wow slideInUp" data-wow-delay="0.1s">
                                    <div class="blog-item bg-light rounded overflow-hidden">
                                        <div class="blog-img position-relative overflow-hidden">
                                            <img class="img-fluid" src="<?= base_url("assetsAdmin"); ?>/img/<?= $row['img']; ?>" alt="">
                                            <a class="position-absolute top-0 start-0 bg-primary text-white rounded-end mt-5 py-2 px-4" href="">Berita</a>
                                        </div>
                                        <div class="p-4">
                                            <div class="d-flex mb-3">
                                                <small class="me-3"><i class="far fa-user text-primary me-2"></i><?= $row['penulis']; ?></small>
                                                <small><i class="far fa-calendar-alt text-primary me-2"></i><?= $row['tanggal']; ?></small>
                                            </div>
                                            <h4 class="mb-3"><?= $row['judul']; ?></h4>
                                            <a class="text-uppercase" href="<?= base_url("detail/" . $row['id']); ?>">Lihat <i class="bi bi-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <h1>Belum Ada Berita</h1>
                        <?php endif ?>
                    </div>
                </div>
                <!-- Blog list End -->

                <!-- Sidebar Start -->
                <div class="col-lg-4">
                    <!-- Search Form Start -->
                    <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                        <div class="input-group">
                            <input type="text" class="form-control p-3 cariBerita" placeholder="Cari Berita">
                            <button class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
                        </div>
                    </div>
                    <!-- Search Form End -->

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


    <!-- Vendor Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5 mb-5">
            <div class="bg-white">
                <div class="owl-carousel vendor-carousel">
                    <img src="img/vendor-1.jpg" alt="">
                    <img src="img/vendor-2.jpg" alt="">
                    <img src="img/vendor-3.jpg" alt="">
                    <img src="img/vendor-4.jpg" alt="">
                    <img src="img/vendor-5.jpg" alt="">
                    <img src="img/vendor-6.jpg" alt="">
                    <img src="img/vendor-7.jpg" alt="">
                    <img src="img/vendor-8.jpg" alt="">
                    <img src="img/vendor-9.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor End -->


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


    <script src="<?= base_url("assets"); ?>/js/jquery.js"></script>
    <script>
        $(document).ready(function() {
            $(".cariBerita").keyup(function() {
                // console.log($('.cariBerita').val())

                $.ajax({
                    url: "<?= base_url("Proses/cariBerita"); ?>",
                    type: "post",
                    dataType: 'json',
                    data: {
                        keyword: $('.cariBerita').val()
                    },
                    success: function(data) {
                        console.log(data)
                        $('.hasilCari').html(data)
                    }
                });
            })
        })
    </script>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url("assets"); ?>/lib/wow/wow.min.js"></script>
    <script src="<?= base_url("assets"); ?>/lib/easing/easing.min.js"></script>
    <script src="<?= base_url("assets"); ?>/lib/waypoints/waypoints.min.js"></script>
    <script src="<?= base_url("assets"); ?>/lib/counterup/counterup.min.js"></script>
    <script src="<?= base_url("assets"); ?>/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="<?= base_url("assets"); ?>/js/main.js"></script>
</body>

</html>