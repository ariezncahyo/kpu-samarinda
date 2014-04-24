@extends('_tema.utama')

@section('konten')
<div class="row">
  <div class="col-lg-12">
    <div class="page-header" style="margin: 0px 0 20px;">
    </div>
  </div>
</div>

<div class="row">
  <div class="col-lg-10 col-lg-offset-1">
  	<div class="panel panel-default">
	  <div class="panel-body">
	    <div class="page-header" style="margin-top: -10px;">
	      <h2>{{ $berita->judul }}</h2>
	      <p>
	      	Diterbitkan pada <i class="glyphicon glyphicon-calendar"></i> {{{ date("d F Y", strtotime($berita->created_at)) }}}.
	      	Oleh <i class="glyphicon glyphicon-user"></i> {{{ $berita->petugas->username }}}
	      </p>
	    </div>
	    {{ $berita->isi }}
	  </div>
	</div>
  </div>
</div>
@stop