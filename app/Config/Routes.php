<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');
$routes->get('/lp', 'Home::indexx');
$routes->get('/dash', 'Dashboard::dash');
$routes->get('/dash1', 'Dashboard::dash1');

$routes->get('/signup', 'Signup::index');
$routes->match(['get', 'post'], 'store', 'Signup::store');
$routes->match(['get', 'post'], 'loginAuth', 'Signin::loginAuth');
$routes->get('/signin', 'Signin::index');
$routes->get('/profile', 'ProfileController::index',['filter' => 'authGuard']);


// $routes->get('/org', 'Home::indexx');

$routes->get('/login', 'Login::index');
$routes->get('/login/process', 'Login::process');
$routes->get('/v_login', 'Admin::login');
$routes->get('/register', 'Admin::register');
$routes->get('/password', 'Admin::password');


// $routes->get('/', 'SignupController::index');
$routes->get('/signup', 'Signup::index');
$routes->match(['get', 'post'], 'store', 'Signup::store');
$routes->match(['get', 'post'], 'loginAuth', 'Signin::loginAuth');
$routes->get('/signin', 'Signin::index');
$routes->get('/profile', 'ProfileController::index',['filter' => 'authGuard']);


// $routes->get('reg', 'RegulasiControllers::index');
$routes->get('reg/create', 'RegulasiControllers::create');
$routes->post('reg/store', 'RegulasiControllers::store');

$routes->get('peserta', 'PesertaControllers::index');
$routes->get('peserta/tambah', 'PesertaControllers::create');
$routes->get('peserta/store', 'PesertaControllers::store');
$routes->post('peserta/update/(:num)', 'PesertaControllers::updateData/$1');
$routes->get('peserta/store', 'PesertaControllers::store');
$routes->get('peserta/delete/(:num)', 'PesertaControllers::delete/$1');
$routes->get('peserta/download/(:num)', 'PesertaControllers::download/$1');

$routes->get('tabterm', 'RegulasiControllers::tabterm');
$routes->get('reg', 'RegulasiControllers::index');
$routes->get('reg/edit/(:num)', 'RegulasiControllers::edit/$1');
$routes->post('reg/update/(:num)', 'RegulasiControllers::update/$1');
$routes->get('reg/delete/(:num)', 'RegulasiControllers::delete/$1');
$routes->get('reg/download/(:num)', 'RegulasiControllers::download/$1');

// $routes->match(['get', 'post'], 'store', 'Signup::store');

// Rute Modul Statistik Baru
$routes->get('googleOrgChart', 'StatistikControllers::googleOrgChart');
$routes->get('balkanOrgChart', 'StatistikControllers::balkanOrgChart');

$routes->get('/', 'Home::index');
$routes->get('/profile_pejabat', 'Home::profile_pejabat');
$routes->get('/ragam', 'Home::ragam');
$routes->get('/dashstisla', 'Home::indexstisla');

$routes->get('/login', 'Login::index');
$routes->get('/login/process', 'Login::process');
$routes->get('/v_login', 'Admin::login');
$routes->get('/register', 'Admin::register');
$routes->get('/password', 'Admin::password');
$routes->get('/users', 'Admin::users');
$routes->get('/admin', 'Admin::admin');
$routes->get('/table', 'Admin::table');
$routes->get('/galeri', 'Galeri::galeri');
$routes->get('/gambar', 'Galeri::gambar');
$routes->get('/tampil_galeri', 'Galeri::tampil_galeri');
$routes->get('/video', 'Galeri::video');
$routes->get('/carousel_video', 'Galeri::carousel_video');
$routes->get('/owltematik', 'Kepeg::owltematik');
$routes->get('/owlsimple', 'Kepeg::owlsimple');
$routes->get('/org', 'Kepeg::organ');
$routes->get('/organ', 'Kepeg::organ');
$routes->get('/owll', 'Kepeg::owll');
$routes->get('/owl_carousel', 'Kepeg::owl_carousel');
$routes->get('/tematik_korsel', 'Korsel::tematik_korsel');
$routes->get('/pengunjung', 'Admin::pengunjung');
$routes->get('/berkala', 'Berkala::berkala');
$routes->get('/profile_kami', 'Berkala::profile_kami');
$routes->get('/berita', 'Berita::berita');
$routes->get('/tambah_berita', 'Berita::tambah_berita');
$routes->get('/index', 'Berita::index');
$routes->get('/add', 'News::add');
$routes->get('/news', 'News::add');
$routes->get('/index_all', 'News::index');
// $routes->get('/detail_berita', 'Berita::detail_berita');
$routes->post('/saven', 'News::save');
$routes->post('/save', 'Berita::save');
// $routes->get('artikel/(:segment)', 'Artikel::detail/$1');
// $route->get('detailberita/(:any)', 'Berita::detail/([^/]+)/([^/]+)');
// $routes->get('detailberita/(:any)', 'Berita::detailberita/slug');
$routes->get('detailberita/(:segment)', 'Berita::detailberita/$1');
$routes->get('/detail', 'Berita::detail_detail_berita');    
$routes->get('/greek', 'Greek::index');    

$routes->get('/produk_hukum', 'ProdukHukum::produk_hukum');
$routes->get('/produk_hukum_uu', 'ProdukHukum::produk_hukum_uu');
$routes->get('/tambah_produk_hukum', 'ProdukHukum::tambah_produk_hukum');

$routes->get('/setiap_saat', 'Setiap_saat::setiap_saat');
$routes->get('/serta_merta', 'Serta_merta::serta_merta');
$routes->get('/iss', "Serta_merta::iss");//
$routes->get('/iss_3', "Serta_merta::iss_3");//
$routes->get('/g_155plus', "Serta_merta::g_155plus");//
$routes->get('/g_shake', "Serta_merta::g_shake");//
$routes->get('/g_rasakan', "Serta_merta::g_rasakan");//
$routes->get('/g_terkini', "Serta_merta::g_terkini");//
$routes->get('/g_tutor', "Serta_merta::g_tutor");//
$routes->get('/jalur_evakuasi', "Serta_merta::jalur_evakuasi");//
$routes->get('/skenario', "Serta_merta::skenario");//
$routes->get('/isoseismal', "Serta_merta::isoseismal");//
$routes->get('/grabbing', "Setiap_saat::grabbing");//
$routes->get('/dikecualikan', "Kecuali::dikecualikan");

// $routes->get('/', 'SignupController::index');
$routes->get('/signup', 'Signup::index');
$routes->match(['get', 'post'], 'store', 'Signup::store');
$routes->match(['get', 'post'], 'loginAuth', 'Signin::loginAuth');
$routes->get('/signin', 'Signin::index');
$routes->get('/profile', 'ProfileController::index',['filter' => 'authGuard']);

// $routes->get('/login', 'Login::index');
$routes->get('/login/process', 'Login::process');
$routes->post('/login/process', 'Login::process');
$routes->get('/logoutus155', 'Serta_merta::plus155');
$routes->get('/tutor', 'Serta_merta::tutor');

$routes->get('/sdmslider', 'SdmController::sdmSlider');


$routes->get('/login', 'Auth::index');
$routes->post('/auth/login', 'Auth::login');
$routes->get('/index/sdm', 'SdmPostController::index');
$routes->get('/create/sdm', 'SdmPostController::create');
$routes->get('/edit/sdm', 'SdmPostController::edit');
$routes->post('/update/sdm', 'SdmPostController::update');

$routes->get('/sdm', 'SdmControllers::index');
$routes->get('admin/berita/tambah', 'SdmControllers::tambah');
$routes->get('admin/berita/edit/$1', 'SdmControllers::edit/$1');
$routes->get('admin/berita/delete/$1', 'SdmControllers::delete/$1');

$routes->get('auth_login', 'DistControllers::auth_login');
$routes->get('auth_forgot_password', 'DistControllers::auth_forgot_password');

$routes->get('pegawai', 'Karyawan::index');

$routes->get('peserta', 'PesertaControllers::index'); //bisa dipakai
$routes->get('peserta/create', 'PesertaControllers::create');
$routes->post('peserta/store', 'PesertaControllers::store');
$routes->get('peserta/edit/(:num)', 'PesertaControllers::edit/$1');
$routes->post('peserta/update/(:num)', 'PesertaControllers::updateData/$1');
$routes->get('peserta/delete/(:num)', 'PesertaControllers::delete/$1');
$routes->get('peserta/statistik_peserta', 'PesertaControllers::statistik_peserta');
