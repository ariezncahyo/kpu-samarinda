<?php

/**
 * Novay-Ways
 * @author  Noviyanto Rachmady ['novay@about.me']
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class BuatUnduhan extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	# Akses dengan : php artisan migrate
	public function up() {
		Schema::create('unduhan', function(Blueprint $table) {
			$table->increments('id');
			$table->string('judul');
			$table->string('file');
			$table->text('keterangan');
			$table->integer('id_petugas');
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
		Schema::drop('unduhan');
	}

}
