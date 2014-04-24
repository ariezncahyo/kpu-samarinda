@extends('_tema.admin')

@section('konten')
<div id="cl-wrapper" class="error-container">
	<div class="page-error">
		<h1 class="number text-center">404</h1>
		<h2 class="description text-center">Maaf, halaman yang Anda cari tidak ditemukan!</h2>
		<h3 class="text-center">Kembali Ke <a href="{{route('admin')}}">Beranda</a></h3>
	</div>
	<div class="text-center copy">&copy; 2014 KPU Kota Samarinda. Hak Cipta Dilindungi Undang-undang.
</div>
@stop