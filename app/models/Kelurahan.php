<?php

class Kelurahan extends Eloquent {

	# Sinkronisasi model dengan nama tabel, tentukan nama tabelnya :
	protected $table = 'Kelurahan';

	# Lindungi 'id'
	protected $guarded = array('id');

	# MASS ASSIGNMENT
	protected $fillable = array();

	# Aturan validasi
	public static $rules = array(
		'nama' => 'required',
		'id_kecamatan' => 'required'
	);

	# Relasi Many-to-one dengan Kecamatan
	public function kecamatan() {
		return $this->belongsTo('Kecamatan', 'id_kecamatan');
	}

	# Relasi One-to-one dengan Petugas
	public function petugas() {
		return $this->hasOne('Petugas', 'id_kelurahan');
	}

	# Relasi Many-to-one dengan Penduduk
	public function penduduk() {
		return $this->hasMany('Penduduk', 'id_kelurahan');
	}

	# Relasi Many-to-one dengan TPS
	public function tps() {
		return $this->hasMany('TPS', 'id_kelurahan');
	}
	
	# Dropdown Kelurahan
	public static function pilihan() {
		$kelurahan = Kelurahan::all();
		$pilihan[''] = 'Pilih Kelurahan';
		foreach($kelurahan as $temp)
		{
			$pilihan[$temp->id] = $temp->nama;
		}
		return $pilihan;
	}
}
