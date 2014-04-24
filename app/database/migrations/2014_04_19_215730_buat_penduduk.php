<?php

/**
 * Novay-Ways
 * @author  Noviyanto Rachmady ['novay@about.me']
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class BuatPenduduk extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	# Akses dengan : php artisan migrate
	public function up() {
		Schema::create('penduduk', function(Blueprint $table) {
			$table->increments('id');
			$table->string('kk');
			$table->string('ktp')->unique();
			$table->string('nama');
			$table->string('tempat_lahir');
			$table->string('tanggal_lahir');
			$table->integer('status_perkawinan');
			$table->string('jenis_kelamin', 2);
			$table->text('alamat');
			$table->integer('rt');
			$table->unsignedInteger('id_kecamatan');
			$table->foreign('id_kecamatan')->references('id')->on('kecamatan')->onDelete('CASCADE')->onUpdate('CASCADE');
			$table->unsignedInteger('id_kelurahan');
			$table->foreign('id_kelurahan')->references('id')->on('kelurahan')->onDelete('CASCADE')->onUpdate('CASCADE');
			$table->integer('id_tps')->nullable();
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
		Schema::drop('penduduk');
	}

}
