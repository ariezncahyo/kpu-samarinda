<?php

class HakAkses extends Eloquent {

	# Tentukan tabel
	protected $table = 'hak_akses';

	# Relasi One-to-Many dengan petugas
	public function petugas() {
		return $this->hasMany('Petugas', 'id_hak_akses');
	}
}