<?php

class UnduhanController extends BaseController {

	/**
	 * Filter Bagian Unduhan
	 */
	public function __construct() {

		# Filter autentikasi
		$this->beforeFilter('auth');
		# $this->beforeFilter('csrf', array('on' => array('store', 'update')));
	}

	/*
	|--------------------------------------------------------------------------
	| Halaman Pembuatan unduhan baru
	|--------------------------------------------------------------------------
	*/
	public function index() {

		# Simpan semua isi unduhan kedalam variabel $unduhan
		$unduhan = Unduhan::all();

		# Tampilkan view yang dituju beserta variabel unduhan
		return View::make('admin.unduhan.index', compact('unduhan'));
	}

	/*
	|--------------------------------------------------------------------------
	| Halaman Pembuatan unduhan baru
	|--------------------------------------------------------------------------
	*/
	public function create() {

		# Tampilkan view yang dituju
		return View::make('admin.unduhan.buat');
	}

	/*
	|--------------------------------------------------------------------------
	| Proses Pembuatan unduhan baru
	|--------------------------------------------------------------------------
	*/
	public function store() {

		# Tarik semua inputan kedalam variabel masuk
		$masuk = Input::all();

		# Lakukan aktivitas validasi dan simpan dalam variabel validasi
		$validasi = Validator::make($masuk, Unduhan::$rules);

		# Bila validasi gagal
		if ($validasi->fails())	{

			# Rujuk ke identitas route yang dimaksud beserta beberapa yang dibutuhkan
			return Redirect::route('admin.unduhan.create')
				->withInput()
				->withErrors($validasi)
				->withPesan('Terjadi kesalahan saat validasi.');
		}

		# Koleksi Inputan
		$judul = Input::get('judul');
		$keterangan = Input::get('keterangan');
		$id_petugas = Auth::user()->id;

		# Untuk File
		if (Input::hasFile('file')) {
	        $file = Input::file('file');
	        $direktori = public_path().'/galeri/file/';
	        $nama_file = str_random(20).'.'.$file->getClientOriginalExtension();
	        $uploadSuccess = $file->move($direktori, $nama_file);
	    }
		$file = $nama_file;

		# Gabung Semua Inputan
		$masukin = compact('judul', 'file', 'keterangan', 'id_petugas');

		# Masukin unduhan baru kedalam database
		Unduhan::create($masukin);

		# Rujuk ke identitas route yang dimaksud
		return Redirect::route('admin.unduhan.index')
			->withPesan('Pembuatan unduhan baru berhasil.');
			
	}

	/*
	|--------------------------------------------------------------------------
	| Download Berkas
	|--------------------------------------------------------------------------
	*/
	public function download($file) {

		# Tentukan path file berdasarkan file
		$temp = public_path() . '/galeri/file/' . Unduhan::where('file', '=', $file)->first()->file;

		# Langsung Download ditempat
		return Response::download($temp);

	}

	/*
	|--------------------------------------------------------------------------
	| Hapus unduhan berdasarkan id
	|--------------------------------------------------------------------------
	*/
	public function destroy($id) {

		# Hapus berdasarkan id unduhan
		Unduhan::find($id)->delete();

		# Rujuk ke identitas route yang dimaksud
		return Redirect::route('admin.unduhan.index')
			->withPesan('Data Unduhan berhasil dihapus.');
	}

}
