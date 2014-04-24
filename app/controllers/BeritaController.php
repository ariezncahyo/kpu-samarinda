<?php

class BeritaController extends BaseController {

	/**
	 * Filter Bagian Berita
	 */
	public function __construct() {

		# Filter autentikasi
		$this->beforeFilter('auth');
		# $this->beforeFilter('csrf', array('on' => array('store', 'update')));
	}

	/*
	|--------------------------------------------------------------------------
	| Halaman Pembuatan berita baru
	|--------------------------------------------------------------------------
	*/
	public function index() {

		# Simpan semua isi berita kedalam variabel $berita
		$berita = Berita::all();

		# Tampilkan view yang dituju beserta variabel berita
		return View::make('admin.berita.index', compact('berita'));
	}

	/*
	|--------------------------------------------------------------------------
	| Halaman Pembuatan berita baru
	|--------------------------------------------------------------------------
	*/
	public function create() {

		# Tampilkan view yang dituju
		return View::make('admin.berita.buat');
	}

	/*
	|--------------------------------------------------------------------------
	| Proses Pembuatan berita baru
	|--------------------------------------------------------------------------
	*/
	public function store() {

		# Tarik semua inputan kedalam variabel masuk
		$masuk = Input::all();

		# Lakukan aktivitas validasi dan simpan dalam variabel validasi
		$validasi = Validator::make($masuk, Berita::$rules);

		# Bila validasi gagal
		if ($validasi->fails())	{

			# Rujuk ke identitas route yang dimaksud beserta beberapa yang dibutuhkan
			return Redirect::route('admin.berita.create')
				->withInput()
				->withErrors($validasi)
				->withPesan('Terjadi kesalahan saat validasi.');
		}

		# Koleksi Inputan
		$judul = Input::get('judul');
		$slug = Str::slug($judul);
		$isi = Input::get('isi');
		$id_petugas = Auth::user()->id;

		# Masukin berita baru kedalam database
		Berita::create(compact('judul', 'slug', 'isi', 'id_petugas'));

		# Rujuk ke identitas route yang dimaksud
		return Redirect::route('admin.berita.index')
			->withPesan('Pembuatan berita baru berhasil.');
			
	}

	/*
	|--------------------------------------------------------------------------
	| Tampilan Halaman berita berdasarkan id
	|--------------------------------------------------------------------------
	*/
	public function show($id) {

		# Tarik berita berdasarkan id
		$berita = Berita::findOrFail($id);

		# Tampilkan view beserta variabel berita
		return View::make('admin.berita.lihat', compact('berita'));
	}

	/*
	|--------------------------------------------------------------------------
	| Halaman Perubahan berita berdasarkan id
	|--------------------------------------------------------------------------
	*/
	public function edit($id) {

		# Tarik berdasarkan id berita
		$berita = Berita::find($id);

		# Bila berita yang dimaksud tidak ada
		if (is_null($berita)) {

			# Rujuk ke identitas route yang dimaksud beserta variabel pesan
			return Redirect::route('admin.berita.index')
				->withPesan('Halaman yang anda cari tidak ditemukan.');
		}

		# Bila berita ada, tampilkan halaman ubah beserta variabel $berita
		return View::make('admin.berita.ubah', compact('berita'));
	}

	/*
	|--------------------------------------------------------------------------
	| Proses Perubahan berita berdasarkan id
	|--------------------------------------------------------------------------
	*/
	public function update($id)	{

		# Tarik semua inputan kedalam variabel input
		$input = array_except(Input::all(), '_method');

		# Lakukan aktivitas validasi dan simpan dalam variabel validasi
		$validasi = Validator::make($input, Berita::$rules);

		# Bila validasi gagal
		if ($validasi->fails()) {

			# Rujuk ke identitas route yang dimaksud beserta beberapa yang dibutuhkan
			return Redirect::route('admin.berita.edit', $id)
				->withInput()
				->withErrors($validasi)
				->withPesan('Terjadi kesalahan saat validasi.');
		}

		# Koleksi Inputan
		$judul = Input::get('judul');
		$slug = Str::slug($judul);
		$isi = Input::get('isi');
		$id_petugas = Auth::user()->id;

		# Masukin berita baru kedalam database
		$masukin = compact('judul', 'slug', 'isi', 'id_petugas');

		# Bila validasi sukses, lakukan perubahan isi database
		$berita = Berita::find($id);
		$berita->update($masukin);

		# Rujuk ke identitas route yang dimaksud beserta variabel pesan
		return Redirect::route('admin.berita.index')
			->withPesan('Perubahan berita berhasil dilakukan.');
	}

	/*
	|--------------------------------------------------------------------------
	| Hapus berita berdasarkan id
	|--------------------------------------------------------------------------
	*/
	public function destroy($id) {

		# Hapus berdasarkan id berita
		Berita::find($id)->delete();

		# Rujuk ke identitas route yang dimaksud
		return Redirect::route('admin.berita.index')
			->withPesan('Berita berhasil dihapus.');
	}

}
