<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TambahFieldPetugas extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('petugas', function($tabel) {
			$tabel->integer('remember_token');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('petugas', function($tabel) {
			$tabel->dropColumn('remember_token');
		});
	}

}
