<?php

class Kecamatan extends Eloquent {

	# Sinkronisasi model dengan nama tabel, tentukan nama tabelnya :
	protected $table = 'Kecamatan';

	# Lindungi 'id'
	protected $guarded = array('id');

	# MASS ASSIGNMENT
	protected $fillable = array();

	# Aturan validasi
	public static $rules = array(
		'nama' => 'required'
	);

	# Relasi One-to-Many dengan Kelurahan
	public function kelurahan() {
		return $this->hasMany('Kelurahan', 'id_kecamatan');
	}

	# Relasi Many-to-one dengan Penduduk
	public function penduduk() {
		return $this->hasMany('Penduduk', 'id_kecamatan');
	}

	# Relasi One-to-one dengan Petugas
	public function petugas() {
		return $this->hasOne('Petugas', 'id_kecamatan');
	}
	
	# Dropdown Kecamatan
	public static function pilihan() {
		$kecamtan = Kecamatan::all();
		$pilihan[''] = 'Pilih Kecamatan';
		foreach($kecamtan as $temp)
		{
			$pilihan[$temp->id] = $temp->nama;
		}
		return $pilihan;
	}
}
