<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TambahSahPenduduk extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('penduduk', function($tabel) {
			$tabel->integer('sah_kelurahan')->after('id_tps');
			$tabel->integer('sah_kecamatan')->after('id_tps');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('penduduk', function($tabel) {
			$tabel->dropColumn(array('sah_kelurahan', 'sah_kecamatan'));
		});
	}

}
