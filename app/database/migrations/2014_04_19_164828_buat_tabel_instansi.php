<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTabelInstansi extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('instansi', function($i) {
			$i->increments('id');
			$i->string('nama');
			$i->string('slogan');
			$i->text('alamat');
			$i->string('telp');
			$i->string('fax');
			$i->text('visimisi');
			$i->string('struktur_organisasi');
			$i->text('sejarah');
			$i->text('tugas');
			$i->string('logo');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('instansi');
	}

}
