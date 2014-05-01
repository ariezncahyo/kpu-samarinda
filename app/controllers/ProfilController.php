<?php

class ProfilController extends BaseController {

	/*
	** Filter Konstruksi
	*/
	public function __construct() {

		# Filter Auth
		$this->beforeFilter('auth');
		$this->beforeFilter('admin', array('except' => array('akun', 'postAkun')));

		# Instansi Konstruksi
		$this->temp = Instansi::find(1);
	}

	/*
	** GET localhost:8000/admin/sejarah
	*/
	public function sejarah() {
		
		# Inisialisasi Instansi
		$temp = $this->temp;

		# Tampilkan View
		return View::make('admin.profil.sejarah', compact('temp'));
	}

	/*
	** POST localhost:8000/admin/sejarah
	*/
	public function postSejarah() {

		# validasi
		$v = Validator::make(Input::all(), array('sejarah' => 'required'));
		
		# Bila gagal
		if($v->fails())

			# Kembali kehalaman sama dengan pesan error
			return Redirect::back()->withErrors($v);

		# Ubah Isi Database
		$this->temp->sejarah = Input::get('sejarah');
		$this->temp->save();

		# Kembali ke halaman sama dengan pesan sukses
		return Redirect::back()->withPesan('Informasi sejarah berhasil diubah.');

	}

	/*
	** GET localhost:8000/admin/visimisi
	*/
	public function visiMisi() {
		
		$temp = $this->temp;

		# Tampilkan View
		return View::make('admin.profil.visimisi', compact('temp'));
	}

	/*
	** POST localhost:8000/admin/visimisi
	*/
	public function postVisiMisi() {
		
		# validasi
		$v = Validator::make(Input::all(), array('visimisi' => 'required'));
		
		# Bila gagal
		if($v->fails())

			# Kembali kehalaman sama dengan pesan error
			return Redirect::back()->withErrors($v);

		# Ubah Isi Database
		$this->temp->visimisi = Input::get('visimisi');
		$this->temp->save();

		# Kembali ke halaman sama dengan pesan sukses
		return Redirect::back()->withPesan('Informasi visi &amp; misi berhasil diubah.');
	}

	/*
	** GET localhost:8000/admin/struktur
	*/
	public function struktur() {
		
		# Inisialisasi Instansi
		$temp = $this->temp;

		# Tampilkan View
		return View::make('admin.profil.struktur', compact('temp'));
	}

	/*
	** POST localhost:8000/admin/struktur
	*/
	public function postStruktur() {
		
		# validasi
		$v = Validator::make(Input::all(), array('struktur_organisasi' => 'mimes:png,jpg,jpeg,gif'));
		
		# Bila gagal
		if($v->fails())

			# Kembali kehalaman sama dengan pesan error
			return Redirect::back()->withErrors($v);

		# Kelola file
		if (Input::hasFile('struktur_organisasi')) {
	        $file = Input::file('struktur_organisasi');
	        $direktori = public_path().'/aset/kpu/';
	        $nama_file = 'struktur.' . $file->getClientOriginalExtension();
	        File::delete($direktori . $nama_file);
	        $uploadSuccess = $file->move($direktori, $nama_file);
	    }

		# Ubah Isi Database
		$this->temp->struktur_organisasi = (Input::hasFile('struktur_organisasi')) ? $nama_file : $this->temp->struktur_organisasi;
		$this->temp->save();

		# Kondisional Pesan
		$pesan = (Input::hasFile('struktur_organisasi')) ? 'Struktur Organisasi berhasil diubah.' : 'Tidak ada perubahan yang terjadi.';

		# Kembali ke halaman sama dengan pesan sukses
		return Redirect::back()->withPesan($pesan);
	}

	/*
	** GET localhost:8000/admin/tugas
	*/
	public function tugas() {
		
		# Inisialisasi Instansi
		$temp = $this->temp;

		# Tampilkan View
		return View::make('admin.profil.tugas', compact('temp'));
	}

	/*
	** POST localhost:8000/admin/tugas
	*/
	public function postTugas() {
		
		# validasi
		$v = Validator::make(Input::all(), array('tugas' => 'required'));
		
		# Bila gagal
		if($v->fails())

			# Kembali kehalaman sama dengan pesan error
			return Redirect::back()->withErrors($v);

		# Ubah Isi Database
		$this->temp->tugas = Input::get('tugas');
		$this->temp->save();

		# Kembali ke halaman sama dengan pesan sukses
		return Redirect::back()->withPesan('Informasi tugas berhasil diubah.');
	}

	/*
	** GET localhost:8000/admin/instansi
	*/
	public function instansi() {
		
		# Inisialisasi Instansi
		$temp = $this->temp;

		# Tampilkan View
		return View::make('admin.pengaturan', compact('temp'));
	}

	/*
	** POST localhost:8000/admin/instansi
	*/
	public function postInstansi() {
		
		# validasi
		$v = Validator::make(Input::all(), array(
			'nama' => 'required',
			'slogan' => 'required',
			'alamat' => 'required',
			'telp' => 'required',
			'logo' => 'mimes:png,jpg,jpeg,gif'));
		
		# Bila gagal
		if($v->fails())

			# Kembali kehalaman sama dengan pesan error
			return Redirect::back()->withErrors($v)->withPesan('Bermasalah dengan validasi');

		# Ubah Isi Database
		$this->temp->nama = Input::get('nama');
		$this->temp->slogan = Input::get('slogan');
		$this->temp->alamat = Input::get('alamat');
		$this->temp->telp = Input::get('telp');
		$this->temp->fax = Input::get('fax');

		# Kelola file
		if (Input::hasFile('logo')) {
	        $file = Input::file('logo');
	        $direktori = public_path().'/aset/img/';
	        $nama_file = 'logo' . $file->getClientOriginalExtension();
	        File::delete($direktori . $nama_file);
	        $uploadSuccess = $file->move($direktori, $nama_file);
	    }

	    $this->temp->logo = (Input::hasFile('logo')) ? $nama_file : $this->temp->logo;
		$this->temp->save();

		# Kembali ke halaman sama dengan pesan sukses
		return Redirect::back()->withPesan('Pengaturan aplikasi berhasil diubah.');
	}

	/*
	** GET localhost:8000/admin/akun
	*/
	public function akun() {
		
		# Inisialisasi Username Aktif
		$temp = Auth::user()->username;

		# Tampilkan View
		return View::make('admin.akun', compact('temp'));
	}

	/*
	** POST localhost:8000/admin/akun
	*/
	public function postAkun() {
		
		# validasi
		$v = Validator::make(Input::all(), array(
			'username' => 'required|min:5',
			'password' => 'required|min:5',
			'konfirmasi_password' => 'required|same:password'));
		
		# Bila gagal
		if($v->fails())

			# Kembali kehalaman sama dengan pesan error
			return Redirect::back()->withErrors($v)->withPesan('Bermasalah dengan validasi');

		# Inisialisasi Penggunaaktif
		$temp = Petugas::find(Auth::user()->id);

		# Isi database
		$temp->username = Input::get('username');
		$temp->password = Hash::make(Input::get('password'));
		$temp->save();

		# Kembali ke halaman sama dengan pesan sukses
		return Redirect::back()->withPesan('Informasi Akun Anda telah diubah.');
		
	}

}



