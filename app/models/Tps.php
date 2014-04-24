<?php

class Tps extends Eloquent {

	# Sinkronisasi model dengan nama tabel, tentukan nama tabelnya :
	protected $table = 'Tps';

	# Lindungi 'id'
	protected $guarded = array('id');

	# MASS ASSIGNMENT
	protected $fillable = array();

	# Aturan validasi
	public static $rules = array(
		'nama_ketua' => 'required',
		'lokasi' => 'required',
		'nomor_urut' => 'required'
	);
	
	# Relasi Many-to-one dengan Kelurahan
	public function kelurahan() {
		return $this->hasMany('Kelurahan', 'id_kelurahan');
	}

	# Dropdown TPS
	public static function pilihan() {
		# Id Pengguna aktif
		$user = Petugas::where('id', '=', Auth::user()->id)->first()->id_kelurahan;
		# Simpan semua isi tps kedalam variabel $tps
		$tps = Tps::where('id_kelurahan', '=', $user)->get();
		$pilihan[''] = 'Pilih TPS';
		foreach($tps as $temp)
		{
			$pilihan[$temp->id] = $temp->nomor_urut;
		}
		return $pilihan;
	}
}

