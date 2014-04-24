<?php

class Unduhan extends Eloquent {

	# Sinkronisasi model dengan nama tabel, tentukan nama tabelnya :
	protected $table = 'Unduhan';

	# Lindungi 'id'
	protected $guarded = array('id');

	# MASS ASSIGNMENT
	protected $fillable = array();

	# Aturan validasi
	public static $rules = array(
		'judul' => 'required',
		'file' => 'required|mimes:jpg,jpeg,png,gif,doc,docx,xls,xlsx,pdf,ppt,ppt,zip,rar,tar',
		'keterangan' => 'required'
	);
	
	# Relasi One-to-Many dengan Petugas
	public function petugas() {
		return $this->belongsTo('Petugas', 'id_petugas');
	}
}
