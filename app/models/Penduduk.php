<?php

class Penduduk extends Eloquent {

	# Sinkronisasi model dengan nama tabel, tentukan nama tabelnya :
	protected $table = 'Penduduk';

	# Lindungi 'id'
	protected $guarded = array('id');

	# MASS ASSIGNMENT
	protected $fillable = array();

	# Aturan validasi
	public static $rules = array(
		'kk' => 'required',
		'ktp' => 'required|unique:penduduk,ktp',
		'nama' => 'required',
		'tempat_lahir' => 'required',
		'tanggal_lahir' => 'required',
		'alamat' => 'required'
	);
	
	# Relasi Many-to-one dengan Kecamatan
	public function kecamatan() {
		return $this->belongsTo('Kecamatan', 'id_kecamatan');
	}

	# Relasi Many-to-one dengan Kelurahan
	public function kelurahan() {
		return $this->belongsTo('Kelurahan', 'id_kelurahan');
	}

	# Dropdown Jenis Kelamin
	public static function jenis_kelamin() {
		$temp = array(
			'Lk' => 'Laki-laki', 
			'Pr' => 'Perempuan');
		return $temp;
	}

	# Dropdown Status Perkawinan
	public static function status_perkawinan() {
		$temp = array('Jomblo', 'Menikah');
		return $temp;
	}
}
