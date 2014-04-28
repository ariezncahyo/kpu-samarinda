<?php

class KelurahanController extends BaseController {

	/**
	 * Filter Bagian Kelurahan
	 */
	public function __construct() {

		# Filter autentikasi
		$this->beforeFilter('auth');
		$this->beforeFilter('admin');
		# $this->beforeFilter('csrf', array('on' => array('store', 'update')));
	}

	/*
	|--------------------------------------------------------------------------
	| Halaman Pembuatan kelurahan baru
	|--------------------------------------------------------------------------
	*/
	public function index($id=null) {

		# Simpan semua isi kelurahan kedalam variabel $kelurahan

		$kelurahan = Kelurahan::all();

		if($id!=null)
			$kelurahan = Kelurahan::where('id_kecamatan', $id)->get();

		# Tampilkan view yang dituju beserta variabel kelurahan
		return View::make('admin.kelurahan.index', compact('kelurahan'));
	}

	/*
	|--------------------------------------------------------------------------
	| Halaman Pembuatan kelurahan baru
	|--------------------------------------------------------------------------
	*/
	public function create() {

		# Tampilkan view yang dituju
		return View::make('admin.kelurahan.buat');
	}

	/*
	|--------------------------------------------------------------------------
	| Proses Pembuatan kelurahan baru
	|--------------------------------------------------------------------------
	*/
	public function store() {

		# Tarik semua inputan kedalam variabel masuk
		$masuk = Input::all();

		# Lakukan aktivitas validasi dan simpan dalam variabel validasi
		$validasi = Validator::make($masuk, Kelurahan::$rules);

		# Bila validasi gagal
		if ($validasi->fails())	{

			# Rujuk ke identitas route yang dimaksud beserta beberapa yang dibutuhkan
			return Redirect::route('admin.kelurahan.create')
				->withInput()
				->withErrors($validasi)
				->withPesan('Terjadi kesalahan saat validasi.');
		}

		# Masukin kelurahan baru kedalam database
		Kelurahan::create($masuk);

		# Rujuk ke identitas route yang dimaksud
		return Redirect::route('admin.kelurahan.index')
			->withPesan('Pembuatan kelurahan baru berhasil.');
			
	}

	/*
	|--------------------------------------------------------------------------
	| Halaman Perubahan kelurahan berdasarkan id
	|--------------------------------------------------------------------------
	*/
	public function edit($id) {

		# Tarik berdasarkan id kelurahan
		$kelurahan = Kelurahan::find($id);

		# Bila kelurahan yang dimaksud tidak ada
		if (is_null($kelurahan)) {

			# Rujuk ke identitas route yang dimaksud beserta variabel pesan
			return Redirect::route('admin.kelurahan.index')
				->withPesan('Halaman yang anda cari tidak ditemukan.');
		}

		# Bila kelurahan ada, tampilkan halaman ubah beserta variabel $kelurahan
		return View::make('admin.kelurahan.ubah', compact('kelurahan'));
	}

	/*
	|--------------------------------------------------------------------------
	| Proses Perubahan kelurahan berdasarkan id
	|--------------------------------------------------------------------------
	*/
	public function update($id)	{

		# Tarik semua inputan kedalam variabel input
		$input = array_except(Input::all(), '_method');

		# Lakukan aktivitas validasi dan simpan dalam variabel validasi
		$validasi = Validator::make($input, Kelurahan::$rules);

		# Bila validasi gagal
		if ($validasi->fails()) {

			# Rujuk ke identitas route yang dimaksud beserta beberapa yang dibutuhkan
			return Redirect::route('admin.kelurahan.edit', $id)
				->withInput()
				->withErrors($validasi)
				->withPesan('Terjadi kesalahan saat validasi.');
		}

		# Bila validasi sukses, lakukan perubahan isi database
		$kelurahan = Kelurahan::find($id);
		$kelurahan->update($input);

		# Rujuk ke identitas route yang dimaksud beserta variabel pesan
		return Redirect::route('admin.kelurahan.index')
			->withPesan('Perubahan kelurahan berhasil dilakukan.');
	}

	/*
	|--------------------------------------------------------------------------
	| Hapus kelurahan berdasarkan id
	|--------------------------------------------------------------------------
	*/
	public function destroy($id) {

		# Hapus berdasarkan id kelurahan
		Kelurahan::find($id)->delete();

		# Rujuk ke identitas route yang dimaksud
		return Redirect::route('admin.kelurahan.index')
			->withPesan('Data Kelurahan berhasil dihapus.');
	}

}
