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
				  <li><a href="#">Data TPS</a></li>
				  <li class="active">Nomor Urut {{ $tps->nomor_urut }}</li>
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
							@if ($penduduk->count())
							<div class="header">	
								<a href="{{ route('admin.penduduk.create') }}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Tambah Penduduk</a>						
								<h3>Daftar Penduduk di TPS <strong>{{ $tps->nomor_urut }}</strong></h3>	
							</div>
							<div class="content">
								<div class="table-responsive">
									<table class="table table-bordered" id="datatable" >
										<thead>
											<tr>
												<th>KK</th>
												<th>KTP</th>
												<th>Nama</th>
												<th>TTL</th>
												<th>Jenis Kelamin</th>
												<th style="width:200px">Sah</th>
												<th style="width:170px">Aksi</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($penduduk as $penduduk)
											<tr>
												<td>{{{ $penduduk->kk }}}</td>
												<td>{{{ $penduduk->ktp }}}</td>
												<td>{{{ $penduduk->nama }}}</td>
												<td>{{{ $penduduk->tempat_lahir }}}, {{{ $penduduk->tanggal_lahir }}}</td>
												<td>{{{ ($penduduk->jenis_kelamin==0) ? 'Laki-laki' : 'Perempuan' }}}</td>
												<td>
													@if($penduduk->sah_kelurahan == 0)
														{{ Form::open(array('method' => 'post', 'route' => array('post.sah.penduduk.kelurahan', $penduduk->id))) }}
															<button type="submit" class="btn btn-warning btn-xs pull-right">Sahkan</button>
														{{ Form::close() }}
														{{ Form::checkbox('sah_kelurahan', $penduduk->sah_kelurahan, '', array('disabled' => 'disabled')) }} Belum Sah 
													@else
														{{ Form::open(array('method' => 'post', 'route' => array('post.batal.penduduk.kelurahan', $penduduk->id))) }}
															<button type="submit" class="btn btn-danger btn-xs pull-right">Batalkan</button>
														{{ Form::close() }}
														{{ Form::checkbox('sah_kelurahan', $penduduk->sah_kelurahan, 'checked', array('disabled' => 'disabled')) }} Telah Disahkan 
													@endif
												</td>
												<td>
													{{ Form::open(array('method' => 'DELETE', 'route' => array('admin.penduduk.destroy', $penduduk->id))) }}
														<button type="submit" class="btn btn-danger btn-xs pull-right">Hapus</button>
													{{ Form::close() }}
													{{ link_to_route('admin.penduduk.edit', 'Edit', array($penduduk->id), array('class' => 'btn btn-info btn-xs pull-right')) }}
													{{ link_to_route('admin.penduduk.show', 'Detail', array($penduduk->id), array('class' => 'btn btn-info btn-xs pull-right')) }}
												</td>
											</tr>
											@endforeach
										</tbody>
									</table>							
								</div>
								@else
									<h3 class="text-center"><i class="fa fa-eye-slash"></i> Anda belum memiliki data penduduk untuk TPS <strong>{{ $tps->nomor_urut }}</strong>.</h3>
									<br/>
									<center>
										<a href="{{ route('admin.penduduk.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Buat Baru</a>
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