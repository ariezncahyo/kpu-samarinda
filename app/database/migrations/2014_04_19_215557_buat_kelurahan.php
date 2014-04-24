<?php

/**
 * Novay-Ways
 * @author  Noviyanto Rachmady ['novay@about.me']
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class BuatKelurahan extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	# Akses dengan : php artisan migrate
	public function up() {
		Schema::create('kelurahan', function(Blueprint $table) {
			$table->increments('id');
			$table->string('nama');
			$table->unsignedInteger('id_kecamatan');
			$table->foreign('id_kecamatan')->references('id')->on('kecamatan')->onDelete('CASCADE')->onUpdate('CASCADE');
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
		Schema::drop('kelurahan');
	}

}
