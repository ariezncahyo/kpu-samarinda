<?php

Route::get('tes', function() {
	return Petugas::where('id', '=', Auth::user()->id)->first()->id;
	return $temp->kelurahan->id;
});

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
	Route::resource('kelurahan', 'KelurahanController');
	Route::resource('tps', 'TpsController');
	Route::resource('petugas', 'PetugasController');
	Route::resource('penduduk', 'PendudukController');
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
});



