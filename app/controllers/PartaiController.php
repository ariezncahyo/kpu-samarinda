<?php

class PartaiController extends BaseController {

	/**
	 * Filter Bagian Partai
	 */
	public function __construct() {

		# Filter autentikasi
		$this->beforeFilter('auth');
		$this->beforeFilter('admin');
		# $this->beforeFilter('csrf', array('on' => array('store', 'update')));
	}

	/*
	|--------------------------------------------------------------------------
	| Halaman Pembuatan partai baru
	|--------------------------------------------------------------------------
	*/
	public function index() {

		# Simpan semua isi partai kedalam variabel $partai
		$partai = Partai::all();

		# Tampilkan view yang dituju beserta variabel partai
		return View::make('admin.partai.index', compact('partai'));
	}

	/*
	|--------------------------------------------------------------------------
	| Halaman Pembuatan partai baru
	|--------------------------------------------------------------------------
	*/
	public function create() {

		# Tampilkan view yang dituju
		return View::make('admin.partai.buat');
	}

	/*
	|--------------------------------------------------------------------------
	| Proses Pembuatan partai baru
	|--------------------------------------------------------------------------
	*/
	public function store() {

		# Tarik semua inputan kedalam variabel masuk
		$masuk = Input::all();

		# Lakukan aktivitas validasi dan simpan dalam variabel validasi
		$validasi = Validator::make($masuk, Partai::$rules);

		# Bila validasi gagal
		if ($validasi->fails())	{

			# Rujuk ke identitas route yang dimaksud beserta beberapa yang dibutuhkan
			return Redirect::route('admin.partai.create')
				->withInput()
				->withErrors($validasi)
				->withPesan('Terjadi kesalahan saat validasi.');
		}

		# Koleksi Inputan
		$nama = Input::get('nama');
		$nama_lengkap = Input::get('nama_lengkap');
		$ketua = Input::get('ketua');
		$sekjen = Input::get('sekjen');
		$bendahara = Input::get('bendahara');
		$alamat = Input::get('alamat');
		$telp = Input::get('telp');
		$fax = Input::get('fax');

		# Untuk Lambang
		if (Input::hasFile('lambang')) {
	        $file = Input::file('lambang');
	        $direktori = public_path().'/aset/img/partai/';
	        $nama_file = $nama . '.' . $file->getClientOriginalExtension();
	        $uploadSuccess = $file->move($direktori, $nama_file);
	    }
		$lambang = (Input::hasFile('lambang')) ? $nama_file : '';

		$vote = 0;

		# Kumpulkan seluruh inputan
		$masukin = compact('nama', 'nama_lengkap','ketua', 'sekjen', 'bendahara', 'alamat', 'telp', 'fax', 'lambang', 'vote');

		# Masukin partai baru kedalam database
		Partai::create($masukin);

		# Rujuk ke identitas route yang dimaksud
		return Redirect::route('admin.partai.index')
			->withPesan('Pembuatan partai baru berhasil.');
			
	}

	/*
	|--------------------------------------------------------------------------
	| Tampilan Halaman partai berdasarkan id
	|--------------------------------------------------------------------------
	*/
	public function show($id) {

		# Tarik partai berdasarkan id
		$partai = Partai::findOrFail($id);

		# Tampilkan view beserta variabel partai
		return View::make('admin.partai.lihat', compact('partai'));
	}

	/*
	|--------------------------------------------------------------------------
	| Halaman Perubahan partai berdasarkan id
	|--------------------------------------------------------------------------
	*/
	public function edit($id) {

		# Tarik berdasarkan id partai
		$partai = Partai::find($id);

		# Bila partai yang dimaksud tidak ada
		if (is_null($partai)) {

			# Rujuk ke identitas route yang dimaksud beserta variabel pesan
			return Redirect::route('admin.partai.index')
				->withPesan('Halaman yang anda cari tidak ditemukan.');
		}

		# Bila partai ada, tampilkan halaman ubah beserta variabel $partai
		return View::make('admin.partai.ubah', compact('partai'));
	}

	/*
	|--------------------------------------------------------------------------
	| Proses Perubahan partai berdasarkan id
	|--------------------------------------------------------------------------
	*/
	public function update($id)	{

		# Tarik semua inputan kedalam variabel input
		$input = array_except(Input::all(), '_method');

		# Lakukan aktivitas validasi dan simpan dalam variabel validasi
		$validasi = Validator::make($input, Partai::$rules);

		# Bila validasi gagal
		if ($validasi->fails()) {

			# Rujuk ke identitas route yang dimaksud beserta beberapa yang dibutuhkan
			return Redirect::route('admin.partai.edit', $id)
				->withInput()
				->withErrors($validasi)
				->withPesan('Terjadi kesalahan saat validasi.');
		}

		# Koleksi Inputan
		$nama = Input::get('nama');
		$nama_lengkap = Input::get('nama_lengkap');
		$ketua = Input::get('ketua');
		$sekjen = Input::get('sekjen');
		$bendahara = Input::get('bendahara');
		$alamat = Input::get('alamat');
		$telp = Input::get('telp');
		$fax = Input::get('fax');

		# Untuk Lambang
		if (Input::hasFile('lambang')) {
	        $direktori = public_path().'/aset/img/partai/';
	        File::delete($direktori . Partai::where('id', '=', $id)->first()->lambang);
	        $file = Input::file('lambang');
	        $nama_file = $nama . '.' . $file->getClientOriginalExtension();
	        $uploadSuccess = $file->move($direktori, $nama_file);
	    }
		$lambang = (Input::hasFile('lambang')) ? $nama_file : Partai::where('id', '=', $id)->first()->lambang;

		$vote = round(Input::get('vote'), 2);

		# Kumpulkan seluruh inputan
		$masukin = compact('nama', 'nama_lengkap','ketua', 'sekjen', 'bendahara', 'alamat', 'telp', 'fax', 'lambang', 'vote');

		# Bila validasi sukses, lakukan perubahan isi database
		$partai = Partai::find($id);
		$partai->update($masukin);

		# Rujuk ke identitas route yang dimaksud beserta variabel pesan
		return Redirect::route('admin.partai.index')
			->withPesan('Perubahan partai berhasil dilakukan.');
	}

	/*
	|--------------------------------------------------------------------------
	| Hapus partai berdasarkan id
	|--------------------------------------------------------------------------
	*/
	public function destroy($id) {

		# Hapus berdasarkan id partai
		Partai::find($id)->delete();

		# Rujuk ke identitas route yang dimaksud
		return Redirect::route('admin.partai.index')
			->withPesan('Partai berhasil dihapus.');
	}

}
