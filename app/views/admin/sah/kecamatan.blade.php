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
				  <li><a href="{{ route('admin') }}"><i class="fa fa-home"></i></a></li>
				  <li><a href="#">Keabsahan</a></li>
				  <li class="active">Kecamatan</li>
				</ol>
			</div>		
			<div class="cl-mcont">
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						@if(Session::has('pesan'))
						<div class="alert alert-success alert-white rounded">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							<div class="icon"><i class="fa fa-check"></i></div>
							<strong>Perhatian!</strong> {{ Session::get('pesan') }}
						</div>
						@endif
						<div class="block-flat">
							@if ($kecamatan->count())
							<div class="header">	
								<h3>Daftar Sah Kecamatan</h3>
							</div>
							<div class="content">
								<div class="table-responsive">
									<table class="table table-bordered" id="datatable" >
										<thead>
											<tr>
												<th>ID</th>
												<th>Nama Kecamatan</th>
												<th>Sah</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($kecamatan as $kecamatan)
											<tr>
												<td>{{{ $kecamatan->id }}}</td>
												<td>{{{ $kecamatan->nama }}}</td>
												<td>
												@if($kecamatan->sah == 0)
													{{ Form::checkbox('sah', $kecamatan->sah, '', array('disabled' => 'disabled')) }} Belum Sah
												@else
													{{ Form::checkbox('sah', $kecamatan->sah, 'checked', array('disabled' => 'disabled')) }} Telah Disahkan
												@endif
												</td>
												<td>
												@if($kecamatan->sah == 0)
													{{ Form::open(array('method' => 'post', 'route' => array('post.sah.kecamatan', $kecamatan->id))) }}
														<button type="submit" class="btn btn-success btn-xs pull-right">Sahkan</button>
													{{ Form::close() }}
												@else
													{{ Form::open(array('method' => 'post', 'route' => array('post.batal.kecamatan', $kecamatan->id))) }}
														<button type="submit" class="btn btn-danger btn-xs pull-right">Batalkan</button>
													{{ Form::close() }}
												@endif
												</td>
											</tr>
											@endforeach
										</tbody>
									</table>							
								</div>
								@else
									<h3 class="text-center"><i class="fa fa-eye-slash"></i> Anda belum memiliki data kecamatan.</h3>
									<br/>
								@endif
							</div>
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