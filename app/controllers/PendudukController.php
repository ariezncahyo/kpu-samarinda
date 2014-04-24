<?php

class PendudukController extends BaseController {

	/**
	 * Filter Bagian Penduduk
	 */
	public function __construct() {

		# Filter autentikasi
		$this->beforeFilter('auth');
		# $this->beforeFilter('csrf', array('on' => array('store', 'update')));
	}

	/*
	|--------------------------------------------------------------------------
	| Halaman Pembuatan penduduk baru
	|--------------------------------------------------------------------------
	*/
	public function index() {

		# Id Pengguna aktif
		$user = Petugas::where('id', '=', Auth::user()->id)->first()->id_kelurahan;

		# Simpan semua isi tps kedalam variabel $tps
		$penduduk = Penduduk::where('id_kelurahan', '=', $user)->get();

		# Tampilkan view yang dituju beserta variabel penduduk
		return View::make('admin.penduduk.index', compact('penduduk'));
	}

	/*
	|--------------------------------------------------------------------------
	| Halaman Pembuatan penduduk baru
	|--------------------------------------------------------------------------
	*/
	public function create() {

		# Tampilkan view yang dituju
		return View::make('admin.penduduk.buat');
	}

	/*
	|--------------------------------------------------------------------------
	| Proses Pembuatan penduduk baru
	|--------------------------------------------------------------------------
	*/
	public function store() {

		# Tarik semua inputan kedalam variabel masuk
		$masuk = Input::all();

		# Lakukan aktivitas validasi dan simpan dalam variabel validasi
		$validasi = Validator::make($masuk, Penduduk::$rules);

		# Bila validasi gagal
		if ($validasi->fails())	{
			# Rujuk ke identitas route yang dimaksud beserta beberapa yang dibutuhkan
			return Redirect::route('admin.penduduk.create')
				->withInput()
				->withErrors($validasi)
				->withPesan('Terjadi kesalahan saat validasi.');
		}

		

		# Koleksi Inputan
		$kk = Input::get('kk');
		$ktp = Input::get('ktp');
		$nama = Input::get('nama');
		$tempat_lahir = Input::get('tempat_lahir');
		$tanggal_lahir = Input::get('tanggal_lahir');
#		$tanggal_lahir = date("Y/d/m", strtotime(Input::get('tanggal_lahir')));

		$status_perkawinan = Input::get('status_perkawinan');
		$jenis_kelamin = Input::get('jenis_kelamin');
		$alamat = Input::get('alamat');
		$rt = Input::get('rt');
		$id_tps = Input::get('id_tps');
		$id_kelurahan = Petugas::where('id', '=', Auth::user()->id)->first()->id_kelurahan;
		$id_kecamatan = Kelurahan::where('id', '=', $id_kelurahan)->first()->id_kecamatan;


		# Masukin penduduk baru kedalam database
		Penduduk::create(compact('kk', 'ktp', 'nama', 'tempat_lahir', 'tanggal_lahir', 'status_perkawinan', 
			'jenis_kelamin', 'alamat', 'rt', 'id_tps', 'id_kelurahan', 'id_kecamatan'));

		# Rujuk ke identitas route yang dimaksud
		return Redirect::route('admin.tps.show', $id_tps)
			->withPesan('Pembuatan penduduk baru berhasil.');
			
	}

	/*
	|--------------------------------------------------------------------------
	| Tampilan Halaman penduduk berdasarkan id
	|--------------------------------------------------------------------------
	*/
	public function show($id) {

		# Tarik penduduk berdasarkan id
		$penduduk = Penduduk::findOrFail($id);

		# Tampilkan view beserta variabel penduduk
		return View::make('admin.penduduk.lihat', compact('penduduk'));
	}

	/*
	|--------------------------------------------------------------------------
	| Halaman Perubahan penduduk berdasarkan id
	|--------------------------------------------------------------------------
	*/
	public function edit($id) {

		# Tarik berdasarkan id penduduk
		$penduduk = Penduduk::find($id);

		# Bila penduduk yang dimaksud tidak ada
		if (is_null($penduduk)) {

			# Rujuk ke identitas route yang dimaksud beserta variabel pesan
			return Redirect::route('admin.penduduk.index')
				->withPesan('Halaman yang anda cari tidak ditemukan.');
		}

		# Bila penduduk ada, tampilkan halaman ubah beserta variabel $penduduk
		return View::make('admin.penduduk.ubah', compact('penduduk'));
	}

	/*
	|--------------------------------------------------------------------------
	| Proses Perubahan penduduk berdasarkan id
	|--------------------------------------------------------------------------
	*/
	public function update($id)	{

		# Tarik semua inputan kedalam variabel input
		$input = array_except(Input::all(), '_method');

		# Lakukan aktivitas validasi dan simpan dalam variabel validasi
		$validasi = Validator::make($input, array(
			'kk' => 'required',
			'ktp' => 'required',
			'nama' => 'required',
			'tempat_lahir' => 'required',
			'tanggal_lahir' => 'required',
			'alamat' => 'required'));


		# Bila validasi gagal
		if ($validasi->fails()) {

			# Rujuk ke identitas route yang dimaksud beserta beberapa yang dibutuhkan
			return Redirect::route('admin.penduduk.edit', $id)
				->withInput()
				->withErrors($validasi)
				->withPesan('Terjadi kesalahan saat validasi.');
		}

		# Koleksi Inputan
		$kk = Input::get('kk');
		$ktp = Input::get('ktp');
		$nama = Input::get('nama');
		$tempat_lahir = Input::get('tempat_lahir');
		$tanggal_lahir = Input::get('tanggal_lahir');
		#$tanggal_lahir = date("Y/d/m", strtotime(Input::get('tanggal_lahir')));

		$status_perkawinan = Input::get('status_perkawinan');
		$jenis_kelamin = Input::get('jenis_kelamin');
		$alamat = Input::get('alamat');
		$rt = Input::get('rt');
		$id_tps = Input::get('id_tps');
		$id_kelurahan = Input::get('id_kelurahan');
		$id_kecamatan = Kelurahan::where('id', '=', $id_kelurahan)->first()->id_kecamatan;

		# Masukin penduduk baru kedalam database
		$masukin = compact('kk', 'ktp', 'nama', 'tempat_lahir', 'tanggal_lahir', 'status_perkawinan', 
			'jenis_kelamin', 'alamat', 'rt', 'id_tps', 'id_kelurahan', 'id_kecamatan');

		# Bila validasi sukses, lakukan perubahan isi database
		$penduduk = Penduduk::find($id);
		$penduduk->update($masukin);

		# Rujuk ke identitas route yang dimaksud beserta variabel pesan
		return Redirect::route('admin.tps.show', $id_tps)
			->withPesan('Perubahan penduduk berhasil dilakukan.');
	}

	/*
	|--------------------------------------------------------------------------
	| Hapus penduduk berdasarkan id
	|--------------------------------------------------------------------------
	*/
	public function destroy($id) {

		# Hapus berdasarkan id penduduk
		Penduduk::find($id)->delete();

		# Rujuk ke identitas route yang dimaksud
		return Redirect::route('admin.penduduk.index')
			->withPesan('Penduduk berhasil dihapus.');
	}

}
