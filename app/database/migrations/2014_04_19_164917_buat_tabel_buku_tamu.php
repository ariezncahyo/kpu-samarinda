<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTabelBukuTamu extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('buku_tamu', function($b) {
			$b->increments('id');
			$b->string('nama');
			$b->string('email');
			$b->string('telp');
			$b->text('pesan');
			$b->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('buku_tamu');
	}

}
