<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatPetugas extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('petugas', function(Blueprint $table)
		{
			$table->increments('id');

			$table->string('username', 30);
			$table->string('password', 60);
			$table->unsignedInteger('id_kelurahan')->nullable();
			$table->foreign('id_kelurahan')->references('id')->on('kelurahan')->onDelete('CASCADE')->onUpdate('CASCADE');
			$table->unsignedInteger('id_kecamatan')->nullable();
			$table->foreign('id_kecamatan')->references('id')->on('kecamatan')->onDelete('CASCADE')->onUpdate('CASCADE');
			$table->unsignedInteger('id_hak_akses');
			$table->foreign('id_hak_akses')->references('id')->on('hak_akses')->onDelete('CASCADE')->onUpdate('CASCADE');

			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('petugas');
	}

}
