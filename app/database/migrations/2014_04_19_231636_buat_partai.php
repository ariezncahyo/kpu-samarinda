<?php

/**
 * Novay-Ways
 * @author  Noviyanto Rachmady ['novay@about.me']
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class BuatPartai extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	# Akses dengan : php artisan migrate
	public function up() {
		Schema::create('partai', function(Blueprint $table) {
			$table->increments('id');
			$table->string('nama');
			$table->string('nama_lengkap');
			$table->string('ketua');
			$table->string('sekjen');
			$table->string('bendahara');
			$table->text('alamat');
			$table->string('telp');
			$table->string('fax');
			$table->string('lambang');
			$table->decimal('vote', 4, 2)->default(0);
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
		Schema::drop('partai');
	}

}
