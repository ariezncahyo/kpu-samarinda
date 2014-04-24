<?php

/**
 * Novay-Ways
 * @author  Noviyanto Rachmady ['novay@about.me']
 */

class KelurahanTableSeeder extends Seeder {

	public function run() {
		# Hapus semua isi tabel kelurahan
		DB::table('kelurahan')->delete();

		# Inisialisasi semua yang ingin diisi
		$kelurahan = array(
			array(
				'id' => 1,
				'nama' => 'Baqa',
				'id_kecamatan' => 5,
				'created_at' => new DateTime,
				'updated_at' => new DateTime
			),
			array(
				'id' => 2,
				'nama' => 'Mesjid',
				'id_kecamatan' => 5,
				'created_at' => new DateTime,
				'updated_at' => new DateTime
			),
			array(
				'id' => 3,
				'nama' => 'Sungai Kedeledang',
				'id_kecamatan' => 5,
				'created_at' => new DateTime,
				'updated_at' => new DateTime
			),
			array(
				'id' => 4,
				'nama' => 'Gunung Kelua',
				'id_kecamatan' => 6,
				'created_at' => new DateTime,
				'updated_at' => new DateTime
			),
		);

		# Masukkan kedalam tabel kelurahan
		DB::table('kelurahan')->insert($kelurahan);
	}

}
