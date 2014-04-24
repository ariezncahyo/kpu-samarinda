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
				  <li><a href="#">Data Master</a></li>
				  <li class="active">Petugas</li>
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
							@if ($petugas->count())
							<div class="header">	
								<a href="{{ route('admin.petugas.create') }}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Tambah Petugas</a>						
								<h3>Daftar Seluruh Petugas</h3>
							</div>
							<div class="content">
								<div class="table-responsive">
									<table class="table table-bordered" id="datatable" >
										<thead>
											<tr>
												<th>ID</th>
												<th>Nama Pengguna</th>
												<th>Kecamatan</th>
												<th>Kelurahan</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($petugas as $petugas)
											<tr>
												<td>{{{ $petugas->id }}}</td>
												<td>{{{ $petugas->username }}}</td>
												<td>
													{{ (is_null($petugas->id_kecamatan)) ? '-' : $petugas->kecamatan->nama }}

												</td>
												<td>
													{{ (is_null($petugas->id_kelurahan)) ? '-' : $petugas->kelurahan->nama }}
												</td>
												<td>
													{{ Form::open(array('method' => 'DELETE', 'route' => array('admin.petugas.destroy', $petugas->id))) }}
														<button type="submit" class="btn btn-danger btn-xs pull-right">Hapus</button>
													{{ Form::close() }}
													{{ link_to_route('admin.petugas.edit', 'Edit', array($petugas->id), array('class' => 'btn btn-info btn-xs pull-right')) }}
												</td>
											</tr>
											@endforeach
										</tbody>
									</table>							
								</div>
								@else
									<h3 class="text-center"><i class="fa fa-eye-slash"></i> Anda belum memiliki data petugas.</h3>
									<br/>
									<center>
										<a href="{{ route('admin.petugas.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Buat Baru</a>
									</center>
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