<?php

class PetugasController extends BaseController {

	/**
	 * Filter Bagian Petugas
	 */
	public function __construct() {

		# Filter autentikasi
		$this->beforeFilter('auth');
		$this->beforeFilter('admin');
		# $this->beforeFilter('csrf', array('on' => array('store', 'update')));
	}

	/*
	|--------------------------------------------------------------------------
	| Halaman Pembuatan petugas baru
	|--------------------------------------------------------------------------
	*/
	public function index() {

		# Simpan semua isi petugas kedalam variabel $petugas
		$petugas = Petugas::where('id', '>', 1)->with('kelurahan')->with('kecamatan')->get();

		# Tampilkan view yang dituju beserta variabel petugas
		return View::make('admin.petugas.index', compact('petugas'));
	}

	/*
	|--------------------------------------------------------------------------
	| Halaman Pembuatan petugas baru
	|--------------------------------------------------------------------------
	*/
	public function create() {

		# Tampilkan view yang dituju
		return View::make('admin.petugas.buat');
	}

	/*
	|--------------------------------------------------------------------------
	| Proses Pembuatan petugas baru
	|--------------------------------------------------------------------------
	*/
	public function store() {

		# Tarik semua inputan kedalam variabel masuk
		$masuk = Input::all();

		# Kondisi
		if((Input::get('id_kecamatan') == null) && (Input::get('id_kelurahan') == null)) {
			$aturan = array(
				'username' => 'required|min:5|unique:petugas,username',
				'password' => 'required|min:5',
				'id_kecamatan' => 'required',
				'id_kelurahan' => 'required');
		} else {
			$aturan = Petugas::$rules;
		}

		# Lakukan aktivitas validasi dan simpan dalam variabel validasi
		$validasi = Validator::make($masuk, $aturan);

		# Bila validasi gagal
		if ($validasi->fails())	{

			# Rujuk ke identitas route yang dimaksud beserta beberapa yang dibutuhkan
			return Redirect::route('admin.petugas.create')
				->withInput()
				->withErrors($validasi)
				->withPesan('Terjadi kesalahan saat validasi.');
		}

		# Koleksi Inputan
		$username = Input::get('username');
		$password = Hash::make(Input::get('password'));
		$id_kecamatan = (Input::get('id_kecamatan') == null) ? null : Input::get('id_kecamatan');
		$id_kelurahan = (Input::get('id_kelurahan') == null) ? null : Input::get('id_kelurahan');

		# Kondisi Hak Akses
		$id_hak_akses = (Input::get('id_kecamatan') == null) ? '3' : '2';

		# Masukin petugas baru kedalam database
		Petugas::create(compact('username', 'password', 'id_kecamatan', 'id_kelurahan', 'id_hak_akses'));

		# Rujuk ke identitas route yang dimaksud
		return Redirect::route('admin.petugas.index')
			->withPesan('Pembuatan petugas baru berhasil.');
			
	}

	/*
	|--------------------------------------------------------------------------
	| Halaman Perubahan petugas berdasarkan id
	|--------------------------------------------------------------------------
	*/
	public function edit($id) {

		# Tarik berdasarkan id petugas
		$petugas = Petugas::find($id);

		# Bila petugas yang dimaksud tidak ada
		if (is_null($petugas)) {

			# Rujuk ke identitas route yang dimaksud beserta variabel pesan
			return Redirect::route('admin.petugas.index')
				->withPesan('Halaman yang anda cari tidak ditemukan.');
		}

		# Bila petugas ada, tampilkan halaman ubah beserta variabel $petugas
		return View::make('admin.petugas.ubah', compact('petugas'));
	}

	/*
	|--------------------------------------------------------------------------
	| Proses Perubahan petugas berdasarkan id
	|--------------------------------------------------------------------------
	*/
	public function update($id)	{

		# Tarik semua inputan kedalam variabel input
		$input = array_except(Input::all(), '_method');
		# Kondisi
		if((Input::get('id_kecamatan') == null) && (Input::get('id_kelurahan') == null)) {
			$aturan = array(
				'username' => 'required|min:5',
				'password' => 'required|min:5',
				'id_kecamatan' => 'required',
				'id_kelurahan' => 'required');
		} else {
			$aturan = array('username' => 'required|min:5', 'password' => 'required|min:5');
		}

		# Lakukan aktivitas validasi dan simpan dalam variabel validasi
		$validasi = Validator::make($input, $aturan);

		# Bila validasi gagal
		if ($validasi->fails()) {

			# Rujuk ke identitas route yang dimaksud beserta beberapa yang dibutuhkan
			return Redirect::route('admin.petugas.edit', $id)
				->withInput()
				->withErrors($validasi)
				->withPesan('Terjadi kesalahan saat validasi.');
		}

		# Bila validasi sukses, lakukan perubahan isi database
		$petugas = Petugas::find($id);
		$petugas->username = Input::get('username');
		$petugas->password = Hash::make(Input::get('password'));
		$petugas->id_kecamatan = (Input::get('id_kecamatan') == null) ? null : Input::get('id_kecamatan');
		$petugas->id_kelurahan = (Input::get('id_kelurahan') == null) ? null : Input::get('id_kelurahan');
		$petugas->id_hak_akses = (Input::get('id_kecamatan') == null) ? '3' : '2';
		$petugas->save();

		# Rujuk ke identitas route yang dimaksud beserta variabel pesan
		return Redirect::route('admin.petugas.index')
			->withPesan('Perubahan petugas berhasil dilakukan.');
	}

	/*
	|--------------------------------------------------------------------------
	| Hapus petugas berdasarkan id
	|--------------------------------------------------------------------------
	*/
	public function destroy($id) {

		# Hapus berdasarkan id petugas
		Petugas::find($id)->delete();

		# Rujuk ke identitas route yang dimaksud
		return Redirect::route('admin.petugas.index')
			->withPesan('Petugas berhasil dihapus.');
	}

}
