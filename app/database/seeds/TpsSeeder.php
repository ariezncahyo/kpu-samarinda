<?php

class TpsSeeder extends Seeder {

	public function run() {
		# Hapus semua isi tabel tps
		DB::table('tps')->delete();

		# Inisialisasi semua yang ingin diisi
		$tps = array(
			array(
				'id' => 1,
				'nama_ketua' => 'Satu',
				'lokasi' => 'Satu',
				'nomor_urut' => '1',
				'id_kelurahan' => 1,
				'created_at' => new DateTime,
				'updated_at' => new DateTime
			),
			array(
				'id' => 2,
				'nama_ketua' => 'Dua',
				'lokasi' => 'Dua',
				'nomor_urut' => '2',
				'id_kelurahan' => 1,
				'created_at' => new DateTime,
				'updated_at' => new DateTime
			),
			array(
				'id' => 3,
				'nama_ketua' => 'Tiga',
				'lokasi' => 'Tiga',
				'nomor_urut' => '3',
				'id_kelurahan' => 1,
				'created_at' => new DateTime,
				'updated_at' => new DateTime
			),
			array(
				'id' => 4,
				'nama_ketua' => 'Empat',
				'lokasi' => 'Empat',
				'nomor_urut' => '20',
				'id_kelurahan' => 2,
				'created_at' => new DateTime,
				'updated_at' => new DateTime
			),
			array(
				'id' => 5,
				'nama_ketua' => 'Lima',
				'lokasi' => 'Lima',
				'nomor_urut' => '20',
				'id_kelurahan' => 2,
				'created_at' => new DateTime,
				'updated_at' => new DateTime
			),
			array(
				'id' => 6,
				'nama_ketua' => 'Enam',
				'lokasi' => 'Enam',
				'nomor_urut' => '10',
				'id_kelurahan' => 2,
				'created_at' => new DateTime,
				'updated_at' => new DateTime
			),
			array(
				'id' => 7,
				'nama_ketua' => 'Tujuh',
				'lokasi' => 'Tujuh',
				'nomor_urut' => '18',
				'id_kelurahan' => 3,
				'created_at' => new DateTime,
				'updated_at' => new DateTime
			),
			array(
				'id' => 8,
				'nama_ketua' => 'Delapan',
				'lokasi' => 'Delapan',
				'nomor_urut' => '1',
				'id_kelurahan' => 4,
				'created_at' => new DateTime,
				'updated_at' => new DateTime
			),
		);

		# Masukkan kedalam tabel tps
		DB::table('tps')->insert($tps);
	}

}
