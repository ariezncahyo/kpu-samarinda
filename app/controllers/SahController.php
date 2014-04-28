<?php

class SahController extends BaseController {

	/**
	 * Filter Bagian Kecamatan
	 */
	public function __construct() {

		# Filter autentikasi & Admin
		$this->beforeFilter('auth');
		
	}

	/*
	** GET localhost:8000/admin/sah/kecamatan
	*/
	public function kecamatan() {
		
		# Simpan semua isi kecamatan kedalam variabel $kecamatan
		$kecamatan = Kecamatan::all();

		# Tampilkan view yang dituju beserta variabel kecamatan
		return View::make('admin.sah.kecamatan', compact('kecamatan'));
	}

	/*
	** POST localhost:8000/admin/sah/kecamatan/{id}
	*/
	public function postKecamatan($id) {
		
		# Temukan id kecamatan
		$temp = Kecamatan::where('id', '=', $id)->first();

		# Ubah keabsahan
		$temp->sah = 1;
		$temp->save();

		# Kembali kehalaman sebelumnya dengan pesan perubahan
		return Redirect::back()->withPesan($temp->nama . ' telah disahkan.');
	}

	/*
	** POST localhost:8000/admin/sah/kecamatan/batal/{id}
	*/
	public function postBatalKecamatan($id) {
		
		# Temukan id kecamatan
		$temp = Kecamatan::where('id', '=', $id)->first();

		# Ubah keabsahan
		$temp->sah = 0;
		$temp->save();

		# Kembali kehalaman sebelumnya dengan pesan perubahan
		return Redirect::back()->withPesan('Pengasahan ' . $temp->nama . ' telah dibatalkan.');
	}

	/*
	** GET localhost:8000/admin/sah/kelurahan
	*/
	public function kelurahan() {

		# Kondisi Jika Admin yang login
		if(Auth::user()->id_hak_akses === 1) {

			# Ambil semua data kelurahan
			$kelurahan = Kelurahan::all();

		# Sedangkan selain Admin
		} else {

			# Id Pengguna aktif
			$user = Petugas::where('id', '=', Auth::user()->id)->first()->id_kecamatan;

			# Simpan semua isi tps kedalam variabel $tps
			$kelurahan = Kelurahan::where('id_kecamatan', '=', $user)->get();
		
		}

		# Tampilkan view yang dituju beserta variabel kelurahan
		return View::make('admin.sah.kelurahan', compact('kelurahan'));
		
		
	}

	/*
	** POST localhost:8000/admin/sah/kelurahan/{id}
	*/
	public function postKelurahan($id) {
		
		# Temukan id kecamatan
		$temp = Kelurahan::where('id', '=', $id)->first();

		# Ubah keabsahan
		$temp->sah = 1;
		$temp->save();

		# Kembali kehalaman sebelumnya dengan pesan perubahan
		return Redirect::back()->withPesan($temp->nama . ' telah disahkan.');
	}

	/*
	** POST localhost:8000/admin/sah/kelurahan/batal/{id}
	*/
	public function postBatalKelurahan($id) {
		
		# Temukan id kecamatan
		$temp = Kelurahan::where('id', '=', $id)->first();

		# Ubah keabsahan
		$temp->sah = 0;
		$temp->save();

		# Kembali kehalaman sebelumnya dengan pesan perubahan
		return Redirect::back()->withPesan('Pengasahan ' . $temp->nama . ' telah dibatalkan.');
	}

	/*
	** POST localhost:8000/admin/sah/kelurahan/{id}
	*/
	public function postTps($id) {
		
		# Temukan id kecamatan
		$temp = Tps::where('id', '=', $id)->first();

		# Ubah keabsahan
		$temp->sah = 1;
		$temp->save();

		# Kembali kehalaman sebelumnya dengan pesan perubahan
		return Redirect::back()->withPesan($temp->nama . ' telah disahkan.');
	}

	/*
	** POST localhost:8000/admin/sah/kelurahan/batal/{id}
	*/
	public function postBatalTps($id) {
		
		# Temukan id kecamatan
		$temp = Tps::where('id', '=', $id)->first();

		# Ubah keabsahan
		$temp->sah = 0;
		$temp->save();

		# Kembali kehalaman sebelumnya dengan pesan perubahan
		return Redirect::back()->withPesan('Pengesahan ' . $temp->nama . ' telah dibatalkan.');
	}

	/*
	** POST localhost:8000/admin/sah/penduduk/{id}
	*/
	public function postPendudukKelurahan($id) {
		
		# Temukan id kecamatan
		$temp = Penduduk::where('id', '=', $id)->first();

		# Ubah keabsahan
		$temp->sah_kelurahan = 1;
		$temp->save();

		# Kembali kehalaman sebelumnya dengan pesan perubahan
		return Redirect::back()->withPesan($temp->nama . ' telah disahkan.');
	}

	/*
	** POST localhost:8000/admin/sah/penduduk/batal/{id}
	*/
	public function postBatalPendudukKelurahan($id) {
		
		# Temukan id kecamatan
		$temp = Penduduk::where('id', '=', $id)->first();

		# Ubah keabsahan
		$temp->sah_kelurahan = 0;
		$temp->save();

		# Kembali kehalaman sebelumnya dengan pesan perubahan
		return Redirect::back()->withPesan('Pengesahan ' . $temp->nama . ' telah dibatalkan.');
	}

	/*
	** POST localhost:8000/admin/sah/penduduk/{id}
	*/
	public function postPendudukKecamatan($id) {
		
		# Temukan id kecamatan
		$temp = Penduduk::where('id', '=', $id)->first();

		# Ubah keabsahan
		$temp->sah_kecamatan = 1;
		$temp->save();

		# Kembali kehalaman sebelumnya dengan pesan perubahan
		return Redirect::back()->withPesan($temp->nama . ' telah disahkan.');
	}

	/*
	** POST localhost:8000/admin/sah/penduduk/batal/{id}
	*/
	public function postBatalPendudukKecamatan($id) {
		
		# Temukan id kecamatan
		$temp = Penduduk::where('id', '=', $id)->first();

		# Ubah keabsahan
		$temp->sah_kecamatan = 0;
		$temp->save();

		# Kembali kehalaman sebelumnya dengan pesan perubahan
		return Redirect::back()->withPesan('Pengesahan ' . $temp->nama . ' telah dibatalkan.');
	}
}