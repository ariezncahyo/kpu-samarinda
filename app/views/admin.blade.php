@extends('_tema.admin')

@section('style')
{{ HTML::style('packages/cleanzone/js/jquery.datatables/bootstrap-adapter/css/datatables.css') }}
@stop

@section('konten')
	@include('_tema.nav')
	<div id="cl-wrapper">
		<div class="container-fluid">
			<div class="page-head">
				<ol class="breadcrumb">
				  <li class="active"><a href="#"><i class="fa fa-home"></i></a></li>
				</ol>
			</div>		
			<div class="cl-mcont">
				<div class="row">
					<div class="col-md-12">
						@if(Session::has('pesan'))
						<div class="alert alert-success alert-white rounded">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							<div class="icon"><i class="fa fa-check"></i></div>
							<strong>Perhatian!</strong> {{ Session::get('pesan') }}
						</div>
						@endif
						<div class="block-flat">
							<center>
							@if($petugas->id_hak_akses == 1)
								<h1>
									Selamat Datang, {{ $petugas->hak_akses->jenis }}
									</h1>
								<hr/>
							@elseif($petugas->id_hak_akses == 2)
								<h1>
									Selamat Datang, {{ $petugas->hak_akses->jenis . ' ' . $petugas->kecamatan->nama }}
									</h1>
								<hr/>
								@if($petugas->kecamatan->sah == 0)
									{{ Form::open(array('method' => 'post', 'route' => array('post.sah.kecamatan', $petugas->kecamatan->id))) }}
										<button type="submit" class="btn btn-success btn-lg"><strong><i class="fa fa-check"></i> Sahkan Kecamatan</strong></button>
									{{ Form::close() }}
								@else
									<h3>Kecamatan Telah Disahkan.</h3>
									{{ Form::open(array('method' => 'post', 'route' => array('post.batal.kecamatan', $petugas->kecamatan->id))) }}
										<button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-times"></i> Batalkan Pengesahan</button></button>
									{{ Form::close() }}
								@endif
							@else
								<h1>
									{{ $petugas->hak_akses->jenis . ' ' . $petugas->kelurahan->nama }}
									</h1>
								<hr/>
								@if($petugas->kelurahan->sah == 0)
									{{ Form::open(array('method' => 'post', 'route' => array('post.sah.kelurahan', $petugas->kelurahan->id))) }}
										<button type="submit" class="btn btn-success btn-lg"><strong><i class="fa fa-check"></i> Sahkan Kelurahan</strong></button>
									{{ Form::close() }}
								@else
									<h3>Kelurahan Telah Disahkan.</h3>
									{{ Form::open(array('method' => 'post', 'route' => array('post.batal.kelurahan', $petugas->kelurahan->id))) }}
										<button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-times"></i> Batalkan Pengesahan</button></button>
									{{ Form::close() }}
								@endif
							@endif
							</center>
						</div>				
					</div>
				</div>
			</div>
		</div> 
	</div>
@stop

@section('script')
{{ HTML::script('packages/cleanzone/js/jquery.datatables/jquery.datatables.min.js') }}
{{ HTML::script('packages/cleanzone/js/jquery.datatables/bootstrap-adapter/js/datatables.js') }}
<script type="text/javascript">
$(document).ready(function(){//initialize the javascript
	App.init(); App.dataTables(); });
</script>
@stop