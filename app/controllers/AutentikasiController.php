<?php

class AutentikasiController extends BaseController {

	/*
	** Koleksi Filter
	*/
	public function __construct() {

		# Filter Auth untuk method index dan keluar
		$this->beforeFilter('auth', ['only' => ['index', 'keluar']]);
		$this->beforeFilter('csrf', ['on' => ['post']]);
	}

	/*
	** GET localhost:8000/admin
	*/
	public function index() {

		# Inisialisasi variabel yang dibutuhkan
		$petugas = Petugas::where('id', '=', Auth::user()->id)->with('hak_akses')->with('kelurahan')->with('kecamatan')->first();

		# Tampilkan halaman beranda admin
		return View::make('admin', compact('petugas'));

	}

	/*
	** GET localhost:8000/masuk 
	*/
	public function masuk() {	

		# Tampilkan halaman login
		return View::make('login');
	}

	/*
	** POST localhost:8000/masuk 
	*/
	public function postMasuk() {
		
		# Buat konstruksi validasi
		$v = Validator::make(Input::all(), array('username' => 'required|min:5', 'password' => 'required|min:5'));

		# Bila validasi gagal
		if ($v->fails())

			# Kembali kehalaman yang sama beserta pesan error
			return Redirect::back()->withErrors($v)->withInput();

		# Bila sukses, buat konstruksi verifikasi
		$verifikasi = array('username' => Input::get('username'), 'password' => Input::get('password'));

		# Bila verifikasi sukses
		if (Auth::attempt($verifikasi))	

			# Kembali ke halaman yang sama beserta pesan error
			return Redirect::route('admin');

		# Bila gagal
		return Redirect::back()->withInput()->withPesan('Username & Password tidak cocok!');
		

	}

	/*
	** GET localhost:8000/admin/keluar 
	*/
	public function keluar() {
		
		# Hapus Cookies dan Session
		Auth::logout();

		# Lanjutkan menuju route login dengan pesan
		return Redirect::route('masuk')
			->withPesan('Anda telah keluar dari sistem');
	}
}