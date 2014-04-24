<?php

class KecamatanController extends BaseController {

	/**
	 * Filter Bagian Kecamatan
	 */
	public function __construct() {

		# Filter autentikasi
		$this->beforeFilter('auth');
		# $this->beforeFilter('csrf', array('on' => array('store', 'update')));
	}

	/*
	|--------------------------------------------------------------------------
	| Halaman Pembuatan kecamatan baru
	|--------------------------------------------------------------------------
	*/
	public function index() {

		# Simpan semua isi kecamatan kedalam variabel $kecamatan
		$kecamatan = Kecamatan::all();

		# Tampilkan view yang dituju beserta variabel kecamatan
		return View::make('admin.kecamatan.index', compact('kecamatan'));
	}

	/*
	|--------------------------------------------------------------------------
	| Halaman Pembuatan kecamatan baru
	|--------------------------------------------------------------------------
	*/
	public function create() {

		# Tampilkan view yang dituju
		return View::make('admin.kecamatan.buat');
	}

	/*
	|--------------------------------------------------------------------------
	| Proses Pembuatan kecamatan baru
	|--------------------------------------------------------------------------
	*/
	public function store() {

		# Tarik semua inputan kedalam variabel masuk
		$masuk = Input::all();

		# Lakukan aktivitas validasi dan simpan dalam variabel validasi
		$validasi = Validator::make($masuk, Kecamatan::$rules);

		# Bila validasi gagal
		if ($validasi->fails())	{

			# Rujuk ke identitas route yang dimaksud beserta beberapa yang dibutuhkan
			return Redirect::route('admin.kecamatan.create')
				->withInput()
				->withErrors($validasi);
		}

		# Masukin kecamatan baru kedalam database
		Kecamatan::create($masuk);

		# Rujuk ke identitas route yang dimaksud
		return Redirect::route('admin.kecamatan.index')
			->withPesan('Pembuatan kecamatan baru berhasil.');
			
	}

	/*
	|--------------------------------------------------------------------------
	| Halaman Perubahan kecamatan berdasarkan id
	|--------------------------------------------------------------------------
	*/
	public function edit($id) {

		# Tarik berdasarkan id kecamatan
		$kecamatan = Kecamatan::find($id);

		# Bila kecamatan yang dimaksud tidak ada
		if (is_null($kecamatan)) {

			# Rujuk ke identitas route yang dimaksud beserta variabel pesan
			return Redirect::route('admin.kecamatan.index')
				->withPesan('Halaman yang anda cari tidak ditemukan.');
		}

		# Bila kecamatan ada, tampilkan halaman ubah beserta variabel $kecamatan
		return View::make('admin.kecamatan.ubah', compact('kecamatan'));
	}

	/*
	|--------------------------------------------------------------------------
	| Proses Perubahan kecamatan berdasarkan id
	|--------------------------------------------------------------------------
	*/
	public function update($id)	{

		# Tarik semua inputan kedalam variabel input
		$input = array_except(Input::all(), '_method');

		# Lakukan aktivitas validasi dan simpan dalam variabel validasi
		$validasi = Validator::make($input, Kecamatan::$rules);

		# Bila validasi gagal
		if ($validasi->fails()) {

			# Rujuk ke identitas route yang dimaksud beserta beberapa yang dibutuhkan
			return Redirect::route('admin.kecamatan.edit', $id)
				->withInput()
				->withErrors($validasi);
		}

		# Bila validasi sukses, lakukan perubahan isi database
		$kecamatan = Kecamatan::find($id);
		$kecamatan->update($input);

		# Rujuk ke identitas route yang dimaksud beserta variabel pesan
		return Redirect::route('admin.kecamatan.index')
			->withPesan('Perubahan kecamatan berhasil dilakukan.');
	}

	/*
	|--------------------------------------------------------------------------
	| Hapus kecamatan berdasarkan id
	|--------------------------------------------------------------------------
	*/
	public function destroy($id) {

		# Hapus berdasarkan id kecamatan
		Kecamatan::find($id)->delete();

		# Rujuk ke identitas route yang dimaksud
		return Redirect::route('admin.kecamatan.index')
			->withPesan('Kecamatan berhasil dihapus.');
	}

}
