<?php


/*
| FRONTEND ROUTE ==========================
*/
Route::get('/', ['as' => 'index', 'uses' => 'KpuController@index']);
Route::get('berita', ['as' => 'berita', 'uses' => 'KpuController@berita']);
Route::get('berita/{slug}', ['as' => 'detail.berita', 'uses' => 'KpuController@isiBerita']);
Route::get('sejarah', ['as' => 'sejarah', 'uses' => 'KpuController@sejarah']);
Route::get('visimisi', ['as' => 'visimisi', 'uses' => 'KpuController@visiMisi']);
Route::get('struktur', ['as' => 'struktur', 'uses' => 'KpuController@struktur']);
Route::get('partai', ['as' => 'partai', 'uses' => 'KpuController@partai']);
Route::get('partai/{id}', ['as' => 'partai.lihat', 'uses' => 'KpuController@lihatPartai']);
Route::get('pemilu', ['as' => 'pemilu', 'uses' => 'KpuController@pemilu']);
Route::get('unduhan', ['as' => 'unduhan', 'uses' => 'KpuController@unduhan']);
Route::post('saran', ['as' => 'post.saran', 'before' =>'csrf', 'uses' => 'KpuController@saran']);

/*
| BACKEND ROUTE ==========================
*/
Route::group(['prefix' => 'admin'], function() {

	# Autentikasi Route ==========================
	Route::get('/', ['as' => 'admin', 'uses' => 'AutentikasiController@index']);
	Route::get('masuk', ['as' => 'masuk', 'uses' => 'AutentikasiController@masuk']);
	Route::post('masuk', ['uses' => 'AutentikasiController@postMasuk']);
	Route::get('keluar', ['as' => 'keluar', 'uses' => 'AutentikasiController@keluar']);

	# Fitur Resource Controller ==================
	Route::resource('kecamatan', 'KecamatanController');
	Route::get('/per-kecamatan/{id?}', 'KelurahanController@index');

	Route::resource('kelurahan', 'KelurahanController');
	Route::get('/per-kelurahan/{id?}/{tps?}', 'PendudukController@index');

	Route::resource('tps', 'TpsController');
	Route::resource('petugas', 'PetugasController');

	Route::resource('penduduk', 'PendudukController');
	Route::get('camat/penduduk', array('as' => 'penduduk.kecamatan', 'uses' => 'PendudukController@kecamatan'));

	Route::resource('berita', 'BeritaController');
	Route::resource('partai', 'PartaiController');
	Route::resource('unduhan', 'UnduhanController');
	# GET ===============
	Route::get('sejarah', ['as' => 'admin.sejarah', 'uses' => 'ProfilController@sejarah']);
	Route::get('visimisi', ['as' => 'admin.visimisi', 'uses' => 'ProfilController@visiMisi']);
	Route::get('struktur', ['as' => 'admin.struktur', 'uses' => 'ProfilController@struktur']);
	Route::get('tugas', ['as' => 'admin.tugas', 'uses' => 'ProfilController@tugas']);
	Route::get('instansi', ['as' => 'admin.instansi', 'uses' => 'ProfilController@instansi']);
	Route::get('akun', ['as' => 'admin.akun', 'uses' => 'ProfilController@akun']);
	Route::get('sah/kecamatan', ['as' => 'sah.kecamatan', 'uses' => 'SahController@kecamatan']);
	Route::get('sah/kelurahan', ['as' => 'sah.kelurahan', 'uses' => 'SahController@kelurahan']);
	Route::get('sah/tps', ['as' => 'sah.tps', 'uses' => 'SahController@tps']);
	Route::get('saran', ['as' => 'admin.saran', 'uses' => 'KpuController@adminSaran']);
	Route::get('dpt', ['as' => 'admin.penduduk.dpt', 'uses' => 'PendudukController@dpt']);
	Route::get('dps', ['as' => 'admin.penduduk.dps', 'uses' => 'PendudukController@dps']);
	# Tambahan ====================
	# POST ===============
	Route::post('sejarah', ['uses' => 'ProfilController@postSejarah']);
	Route::post('visimisi', ['uses' => 'ProfilController@postVisiMisi']);
	Route::post('struktur', ['uses' => 'ProfilController@postStruktur']);
	Route::post('tugas', ['uses' => 'ProfilController@postTugas']);
	Route::post('instansi', ['uses' => 'ProfilController@postInstansi']);
	Route::post('akun', ['uses' => 'ProfilController@postAkun']);
	Route::post('unduh/{file}', ['as' => 'admin.unduhan', 'uses' => 'UnduhanController@download']);
	Route::post('sah/kecamatan/{id}', ['as' => 'post.sah.kecamatan', 'uses' => 'SahController@postKecamatan']);
	Route::post('sah/kecamatan/batal/{id}', ['as' => 'post.batal.kecamatan', 'uses' => 'SahController@postBatalKecamatan']);
	Route::post('sah/kelurahan/{id}', ['as' => 'post.sah.kelurahan', 'uses' => 'SahController@postKelurahan']);
	Route::post('sah/kelurahan/batal/{id}', ['as' => 'post.batal.kelurahan', 'uses' => 'SahController@postBatalKelurahan']);
	Route::post('sah/tps/{id}', ['as' => 'post.sah.tps', 'uses' => 'SahController@postTps']);
	Route::post('sah/tps/batal/{id}', ['as' => 'post.batal.tps', 'uses' => 'SahController@postBatalTps']);
	Route::post('sah/penduduk/kelurahan/{id}', ['as' => 'post.sah.penduduk.kelurahan', 'uses' => 'SahController@postPendudukKelurahan']);
	Route::post('sah/penduduk/kelurahan/batal/{id}', ['as' => 'post.batal.penduduk.kelurahan', 'uses' => 'SahController@postBatalPendudukKelurahan']);
	Route::post('sah/penduduk/kecamatan/{id}', ['as' => 'post.sah.penduduk.kecamatan', 'uses' => 'SahController@postPendudukKelurahan']);
	Route::post('sah/penduduk/kecamatan/batal/{id}', ['as' => 'post.batal.penduduk.kecamatan', 'uses' => 'SahController@postBatalPendudukKelurahan']);
	Route::post('saran/{id}', ['as' => 'post.admin.saran', 'uses' => 'KpuController@postAdminSaran']);
});



