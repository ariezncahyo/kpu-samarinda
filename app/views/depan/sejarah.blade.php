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
	      <h2>Sejarah</h2>
	    </div>
	    {{ $instansi->sejarah }}
	  </div>
	</div>
  </div>
</div>
@stop