<?php

/**
 * Novay-Ways
 * @author  Noviyanto Rachmady ['novay@about.me']
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class BuatTps extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	# Akses dengan : php artisan migrate
	public function up() {
		Schema::create('tps', function(Blueprint $table) {
			$table->increments('id');
			$table->string('nama_ketua');
			$table->string('lokasi');
			$table->string('nomor_urut');
			$table->integer('id_kelurahan');
			$table->integer('sah')->default(0);
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	# Akses dengan : php artisan migrate:rollback
	public function down() {
		Schema::drop('tps');
	}

}
