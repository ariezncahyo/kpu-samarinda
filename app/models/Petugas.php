<?php

class Petugas extends Eloquent {

	# Sinkronisasi model dengan nama tabel, tentukan nama tabelnya :
	protected $table = 'Petugas';

	# Lindungi 'id'
	protected $guarded = array('id');

	# MASS ASSIGNMENT
	protected $fillable = array();

	# Aturan validasi
	public static $rules = array(
		'username' => 'required|unique:petugas,username|min:5',
		'password' => 'required|min:5'
	);
	
	# Relasi One-to-one dengan Kelurahan
	public function kelurahan() {
		return $this->belongsTo('Kelurahan', 'id_kelurahan');
	}

	# Relasi One-to-one dengan Kecamatan
	public function kecamatan() {
		return $this->belongsTo('Kecamatan', 'id_kecamatan');
	}

	# Relasi One-to-Many dengan petugas
	public function hak_akses() {
		return $this->belongsTo('HakAkses', 'id_hak_akses');
	}

	# Relasi One-to-Many dengan Berita
	public function berita() {
		return $this->hasMany('Berita', 'id_petugas');
	}

	# Relasi One-to-Many dengan Unduhan
	public function unduhan() {
		return $this->hasMany('Unduhan', 'id_petugas');
	}
}
