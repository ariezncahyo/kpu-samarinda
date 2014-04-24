<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		// $this->call('UserTableSeeder');
		$this->call('PartaiSeeder');
		$this->call('KecamatanTableSeeder');
		$this->call('KelurahanTableSeeder');
		$this->call('InstansiSeeder');
		$this->call('HakAksesSeeder');
		$this->call('PetugasSeeder');
		$this->call('TpsSeeder');
	}

}