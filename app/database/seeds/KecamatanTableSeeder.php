<?php

class KecamatanTableSeeder extends Seeder {

	public function run() {
		# Hapus semua isi tabel kecamatan
		DB::table('kecamatan')->delete();

		# Inisialisasi semua yang ingin diisi
		$kecamatan = array(
			array('id' => 1, 
				'nama' => 'Loa Janan Ilir', 
				'kodepos' => '', 
				'sah' => 0, 
				'created_at' => new DateTime, 
				'updated_at' => new DateTime
			),
			array('id' => 2, 
				'nama' => 'Palaran', 
				'kodepos' => '', 
				'sah' => 0, 
				'created_at' => new DateTime, 
				'updated_at' => new DateTime
			),
			array('id' => 3, 
				'nama' => 'Samarinda Ilir', 
				'kodepos' => '', 
				'sah' => 0, 
				'created_at' => new DateTime, 
				'updated_at' => new DateTime
			),
			array('id' => 4, 
				'nama' => 'Samarinda Kota', 
				'kodepos' => '', 
				'sah' => 0, 
				'created_at' => new DateTime, 
				'updated_at' => new DateTime
			),
			array('id' => 5, 
				'nama' => 'Samarinda Seberang', 
				'kodepos' => '', 
				'sah' => 0, 
				'created_at' => new DateTime, 
				'updated_at' => new DateTime
			),
			array('id' => 6, 
				'nama' => 'Samarinda Ulu', 
				'kodepos' => '', 
				'sah' => 0, 
				'created_at' => new DateTime, 
				'updated_at' => new DateTime
			),
			array('id' => 7, 
				'nama' => 'Samarinda Utara', 
				'kodepos' => '', 
				'sah' => 0, 
				'created_at' => new DateTime, 
				'updated_at' => new DateTime
			),
			array('id' => 8, 
				'nama' => 'Sambutan', 
				'kodepos' => '', 
				'sah' => 0, 
				'created_at' => new DateTime, 
				'updated_at' => new DateTime
			),
			array('id' => 9, 
				'nama' => 'Sungai Kunjang', 
				'kodepos' => '', 
				'sah' => 0, 
				'created_at' => new DateTime, 
				'updated_at' => new DateTime
			),
			array('id' => 10, 
				'nama' => 'Sungai Pinang', 
				'kodepos' => '', 
				'sah' => 0, 
				'created_at' => new DateTime, 
				'updated_at' => new DateTime
			),
		);

		# Masukkan kedalam tabel kecamatan
		DB::table('kecamatan')->insert($kecamatan);
	}

}
