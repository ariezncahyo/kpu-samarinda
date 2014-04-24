<?php

class TpsController extends BaseController {

	/**
	 * Filter Bagian Tps
	 */
	public function __construct() {

		# Filter autentikasi
		$this->beforeFilter('auth');
		# $this->beforeFilter('csrf', array('on' => array('store', 'update')));
	}

	/*
	|--------------------------------------------------------------------------
	| Halaman Pembuatan tps baru
	|--------------------------------------------------------------------------
	*/
	public function index() {

		# Id Pengguna aktif
		$user = Petugas::where('id', '=', Auth::user()->id)->first()->id_kelurahan;
		
		# Simpan semua isi tps kedalam variabel $tps
		$tps = Tps::where('id_kelurahan', '=', $user)->get();

		# Tampilkan view yang dituju beserta variabel tps
		return View::make('admin.tps.index', compact('tps'));
	}

	/*
	|--------------------------------------------------------------------------
	| Halaman Pembuatan tps baru
	|--------------------------------------------------------------------------
	*/
	public function create() {

		# Tampilkan view yang dituju
		return View::make('admin.tps.buat');
	}

	/*
	|--------------------------------------------------------------------------
	| Proses Pembuatan tps baru
	|--------------------------------------------------------------------------
	*/
	public function store() {

		# Tarik semua inputan kedalam variabel masuk
		$masuk = Input::all();

		# Lakukan aktivitas validasi dan simpan dalam variabel validasi
		$validasi = Validator::make($masuk, Tps::$rules);

		# Bila validasi gagal
		if ($validasi->fails())	{

			# Rujuk ke identitas route yang dimaksud beserta beberapa yang dibutuhkan
			return Redirect::route('admin.tps.create')
				->withInput()
				->withErrors($validasi)
				->withPesan('Terjadi kesalahan saat validasi.');
		}

		# Inisialisai
		$nama_ketua = Input::get('nama_ketua');
		$lokasi = Input::get('lokasi');
		$nomor_urut = Input::get('nomor_urut');
		$id_kelurahan = Petugas::where('id', '=', Auth::user()->id)->first()->id_kelurahan;

		# Gabung
		$inputan = compact('nama_ketua', 'lokasi', 'nomor_urut', 'id_kelurahan');

		# Masukin tps baru kedalam database
		Tps::create($inputan);

		# Rujuk ke identitas route yang dimaksud
		return Redirect::route('admin.tps.index')
			->withPesan('Pembuatan tps baru berhasil.');
			
	}

	/*
	|--------------------------------------------------------------------------
	| Tampilan Halaman tps berdasarkan id
	|--------------------------------------------------------------------------
	*/
	public function show($id) {

		# Id Pengguna aktif
		$user = Petugas::where('id', '=', Auth::user()->id)->first()->id_kelurahan;

		$tps = Tps::where('id', '=', $id)->first();

		# Ambil penduduk berdasarkan ID TPS
		$penduduk = Penduduk::where('id_tps', '=', $id)->get();

		# Tampilkan view beserta variabel tps
		return View::make('admin.tps.penduduk', compact('penduduk', 'tps'));
	}

	/*
	|--------------------------------------------------------------------------
	| Halaman Perubahan tps berdasarkan id
	|--------------------------------------------------------------------------
	*/
	public function edit($id) {

		# Tarik berdasarkan id tps
		$tps = Tps::find($id);

		# Bila tps yang dimaksud tidak ada
		if (is_null($tps)) {

			# Rujuk ke identitas route yang dimaksud beserta variabel pesan
			return Redirect::route('admin.tps.index')
				->withPesan('Halaman yang anda cari tidak ditemukan.');
		}

		# Bila tps ada, tampilkan halaman ubah beserta variabel $tps
		return View::make('admin.tps.ubah', compact('tps'));
	}

	/*
	|--------------------------------------------------------------------------
	| Proses Perubahan tps berdasarkan id
	|--------------------------------------------------------------------------
	*/
	public function update($id)	{

		# Tarik semua inputan kedalam variabel input
		$input = array_except(Input::all(), '_method');

		# Lakukan aktivitas validasi dan simpan dalam variabel validasi
		$validasi = Validator::make($input, Tps::$rules);

		# Bila validasi gagal
		if ($validasi->fails()) {

			# Rujuk ke identitas route yang dimaksud beserta beberapa yang dibutuhkan
			return Redirect::route('admin.tps.edit', $id)
				->withInput()
				->withErrors($validasi)
				->withPesan('Terjadi kesalahan saat validasi.');
		}

		# Inisialisai
		$nama_ketua = Input::get('nama_ketua');
		$lokasi = Input::get('lokasi');
		$nomor_urut = Input::get('nomor_urut');
		$id_kelurahan = Petugas::where('id', '=', Auth::user()->id)->first()->id_kelurahan;

		# Gabung
		$inputan = compact('nama_ketua', 'lokasi', 'nomor_urut', 'id_kelurahan');

		# Bila validasi sukses, lakukan perubahan isi database
		$tps = Tps::find($id);
		$tps->update($inputan);

		# Rujuk ke identitas route yang dimaksud beserta variabel pesan
		return Redirect::route('admin.tps.index')
			->withPesan('Perubahan tps berhasil dilakukan.');
	}

	/*
	|--------------------------------------------------------------------------
	| Hapus tps berdasarkan id
	|--------------------------------------------------------------------------
	*/
	public function destroy($id) {

		# Hapus berdasarkan id tps
		Tps::find($id)->delete();

		# Rujuk ke identitas route yang dimaksud
		return Redirect::route('admin.tps.index')
			->withPesan('TPS berhasil dihapus.');
	}

}
