<?php

class Komentar extends Eloquent {

	# Tentukan tabel terkait
	protected $table = 'komentar';

	# MASS ASSIGNMENT
	protected $fillable = array('nama', 'email', 'komentar');
}