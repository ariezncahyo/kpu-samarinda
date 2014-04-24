<?php

class HakAksesSeeder extends Seeder {

	public function run() {
		# Hapus semua isi tabel
		DB::table('hak_akses')->delete();

		# Inisialisasi semua yang ingin diisi
		$hak_akses = array(
			array('id' => 1, 'jenis' => 'Administrator'),
			array('id' => 2, 'jenis' => 'Kecamatan'),
			array('id' => 3, 'jenis' => 'Kelurahan')
		);

		# Masukkan kedalam tabel
		DB::table('hak_akses')->insert($hak_akses);
	}
}