<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/login', 'Home::login');
$routes->get('/lupa-password', 'Home::lupaPassword');
$routes->get('/berita', 'Home::berita');
$routes->get('/layanan', 'Home::layanan');
$routes->get('/berita/(:num)', 'Home::beritaKategori/$1');
$routes->get('/detail/(:num)', 'Home::detail/$1');
$routes->get('/form-sktm', 'Home::formSktm');
$routes->get('/statistik-data-desa', 'Home::dataDesa');
$routes->get('/sejarah', 'Home::sejarahDesa');
$routes->get('/visi-misi', 'Home::visiMisiDesa');
$routes->get('/statistik-penduduk', 'Home::dataPenduduk');
$routes->get('/statistik-kawin', 'Home::dataStatusKawin');
$routes->get('/statistik-agama', 'Home::dataAgama');
$routes->get('/statistik-kelompok-usia', 'Home::dataKelompokUsia');



$routes->get('/data-berita', 'Admin::dataBerita');
$routes->get('/data-desa', 'Admin::dataDesa');
$routes->get('/beranda', 'Admin::index');
$routes->get('/buat-berita', 'Admin::buatBerita');
$routes->get('/detailBerita/(:num)', 'Admin::detailBerita/$1');
$routes->get('/daftar-layanan', 'Admin::dataLayanan');
$routes->get('/tambah-layanan', 'Admin::tambahLayanan');
$routes->get('/pendaftar-sktm', 'Admin::pendaftarSktm');
$routes->get('/riwayat-pendaftar-sktm', 'Admin::riwayatPendaftar_sktm');
$routes->get('/pendaftar-sktm/(:num)', 'Admin::detailPendaftarSktm/$1');
$routes->get('/print-surat/(:num)', 'Admin::printSurat/$1');
$routes->get('/lengkapi-profil-desa', 'Admin::setProfilDesa');
$routes->get('/lengkapi-data-desa', 'Admin::setDataDesa');
$routes->get('/sejarah-desa', 'Admin::sejarahDesa');
$routes->get('/set-visi-misi', 'Admin::visiMisiDesa');
$routes->get('/data-penduduk', 'Admin::dataPenduduk');
$routes->get('/status-kawin', 'Admin::dataKawin');
$routes->get('/data-agama', 'Admin::dataAgama');
$routes->get('/data-kelompok-usia', 'Admin::dataKelompokUsia');
$routes->get('/set-aparatur-desa', 'Admin::aparaturDesa');
$routes->get('/detail-aparat/(:num)', 'Admin::detailAparat/$1');
$routes->get('/profil', 'Admin::profil');




/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
