<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title; ?></title>


    <!-- Favicon -->
    <link href="<?= base_url("assets"); ?>/img/favicon.ico" rel="icon">

    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url("assets"); ?>/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url("assets"); ?>/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url("assets"); ?>/img/favicon-16x16.png">
    <link rel="manifest" href="<?= base_url("assets"); ?>/img/site.webmanifest">

    <!-- Custom fonts for this template-->
    <link href="<?= base_url("assetsAdmin"); ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url("assetsAdmin"); ?>/css/sb-admin-2.min.css" rel="stylesheet">

    <link href="<?= base_url("assetsAdmin"); ?>/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <style>
        #lokasi {
            width: 100%;
            height: 400px;
        }
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar" style="display: none; z-index: 10;">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url("beranda"); ?>">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-home"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Harumansari</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url("beranda"); ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tentang_desa" aria-expanded="true" aria-controls="tentang_desa">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Tentang Desa</span>
                </a>
                <div id="tentang_desa" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?= base_url("data-desa"); ?>">Data Desa</a>
                        <a class="collapse-item" href="<?= base_url("sejarah-desa"); ?>">Sejarah Desa</a>
                        <a class="collapse-item" href="<?= base_url("set-visi-misi"); ?>">Visi & Misi Desa</a>
                        <a class="collapse-item" href="<?= base_url("set-aparatur-desa"); ?>">Aparatur Desa</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#statistik_desa" aria-expanded="true" aria-controls="statistik_desa">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Statistk Desa</span>
                </a>
                <div id="statistik_desa" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?= base_url("data-desa"); ?>">Data Desa</a>
                        <a class="collapse-item" href="<?= base_url("data-penduduk"); ?>">Data Penduduk</a>
                        <a class="collapse-item" href="<?= base_url("status-kawin"); ?>">Data Status Perkawinan</a>
                        <a class="collapse-item" href="<?= base_url("data-agama"); ?>">Data Agama</a>
                        <a class="collapse-item" href="<?= base_url("data-kelompok-usia"); ?>">Data Kelompok Usia</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#berita" aria-expanded="true" aria-controls="berita">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Menejemen Berita</span>
                </a>
                <div id="berita" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?= base_url("data-berita"); ?>">Lihat Berita</a>
                        <a class="collapse-item" href="<?= base_url("buat-berita"); ?>">Buat Berita</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pendaftar" aria-expanded="true" aria-controls="pendaftar">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Pendaftar</span>
                </a>
                <div id="pendaftar" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?= base_url("pendaftar-sktm"); ?>">SKTM</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#setProfil" aria-expanded="true" aria-controls="setProfil">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Pengaturan</span>
                </a>
                <div id="setProfil" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?= base_url("lengkapi-profil-desa"); ?>">Atur Profil Desa</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <li class="nav-item">
                <a class="nav-link logout" href="">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Log out</span></a>
            </li>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column" style="height: 100vh;">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sideBar" onclick="showSidebar()" class="btn rounded-circle mr-3" style="color: #090979;">
                        <i id="iconBar" class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= session('email'); ?></span>
                                <img class="img-profile rounded-circle" src="<?= base_url("assetsAdmin"); ?>/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="<?= base_url('profil'); ?>">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item logout" href="#" id="logout">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid" style="margin-bottom: 10%;">

                    <!-- Page Heading -->
                    <?= $this->renderSection('content'); ?>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-light fixed-bottom" style="z-index: 1;">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Abdurahman Jaelani <?= date("Y"); ?></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->

    <?= $this->renderSection('script'); ?>

    <script src="<?= base_url("assets"); ?>/js/jquery.js"></script>
    <script src="<?= base_url("assets"); ?>/js/sweetalert2.js"></script>

    <script src="<?= base_url("assetsAdmin"); ?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url("assetsAdmin"); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url("assetsAdmin"); ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url("assetsAdmin"); ?>/js/sb-admin-2.min.js"></script>

    <script src="<?= base_url("assetsAdmin"); ?>/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url("assetsAdmin"); ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url("assetsAdmin"); ?>/js/demo/datatables-demo.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

    <script>
        function showSidebar() {
            $("#accordionSidebar").fadeToggle(200)
        }
        $(document).ready(function() {

            $(".logout").click(function(e) {
                e.preventDefault()
                Swal.fire({
                    icon: 'question',
                    title: 'Yakin?',
                    text: "Yakin untuk Logout?",
                    showDenyButton: false,
                    showCancelButton: true,
                    confirmButtonText: 'Yakin',
                    denyButtonText: `Don't save`,
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        window.location = "<?= base_url("Proses/logout"); ?>"
                    } else if (result.isDenied) {
                        Swal.fire('Changes are not saved', '', 'info')
                    }
                })
            })
        })
    </script>

</body>

</html>