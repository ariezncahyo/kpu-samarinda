<?php

class PetugasSeeder extends Seeder {

	public function run() {
		# Hapus semua isi tabel petugas
		DB::table('petugas')->delete();

		# Inisialisasi semua yang ingin diisi
		$petugas = array(
			array('id' => 1, 
				'username' => 'admin', 
				'password' => Hash::make('admins'), 
				'id_kelurahan' => NULL,
				'id_kecamatan' => NULL,
				'id_hak_akses' => 1,
				'created_at' => new DateTime,
				'updated_at' => new DateTime
			),
			array('id' => 2, 
				'username' => 'kecamatan', 
				'password' => Hash::make('admins'),
				'id_kelurahan' => NULL, 
				'id_kecamatan' => 2, 
				'id_hak_akses' => 2,
				'created_at' => new DateTime,
				'updated_at' => new DateTime
			),
			array('id' => 3, 
				'username' => 'kelurahan', 
				'password' => Hash::make('admins'),
				'id_kelurahan' => 1, 
				'id_kecamatan' => NULL, 
				'id_hak_akses' => 3,
				'created_at' => new DateTime,
				'updated_at' => new DateTime
			)
		);

		# Masukkan kedalam tabel petugas
		DB::table('petugas')->insert($petugas);
	}
}