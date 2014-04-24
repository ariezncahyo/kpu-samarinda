<?php

class Berita extends Eloquent {

	# Sinkronisasi model dengan nama tabel, tentukan nama tabelnya :
	protected $table = 'Berita';

	# Lindungi 'id'
	protected $guarded = array('id');

	# MASS ASSIGNMENT
	protected $fillable = array();

	# Aturan validasi
	public static $rules = array(
		'judul' => 'required',
		'isi' => 'required'
	);
	
	# Relasi One-to-Many dengan Petugas
	public function petugas() {
		return $this->belongsTo('Petugas', 'id_petugas');
	}
}
