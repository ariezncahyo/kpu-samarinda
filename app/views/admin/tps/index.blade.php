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
				  <li class="active">Data TPS</li>
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
							@if ($tps->count())
							<div class="header">	
								<a href="{{ route('admin.tps.create') }}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Tambah Data TPS</a>						
								<h3>Daftar Seluruh Data TPS</h3>
							</div>
							<div class="content">
								<div class="table-responsive">
									<table class="table table-bordered" id="datatable" >
										<thead>
											<tr>
												<th>ID</th>
												<th>Nama Ketua</th>
												<th>Lokasi</th>
												<th>No Urut</th>
												<th>Sah</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($tps as $tps)
											<tr>
												<td>{{{ $tps->id }}}</td>
												<td>{{{ $tps->nama_ketua }}}</td>
												<td>{{{ $tps->lokasi }}}</td>
												<td>{{{ $tps->nomor_urut }}}</td>
												<td>
												@if($tps->sah == 0)
														
														{{ Form::open(array('method' => 'post', 'route' => array('post.sah.tps', $tps->id))) }}
															<button type="submit" class="btn btn-warning btn-xs pull-right">Sahkan</button>
														{{ Form::close() }}
														{{ Form::checkbox('sah', $tps->sah, '', array('disabled' => 'disabled')) }} Belum Sah 
													@else
														
														{{ Form::open(array('method' => 'post', 'route' => array('post.batal.tps', $tps->id))) }}
															<button type="submit" class="btn btn-danger btn-xs pull-right">Batalkan</button>
														{{ Form::close() }}
														{{ Form::checkbox('sah', $tps->sah, 'checked', array('disabled' => 'disabled')) }} Telah Disahkan 
													@endif
												</td>
												<td>
													{{ Form::open(array('method' => 'DELETE', 'route' => array('admin.tps.destroy', $tps->id))) }}
														<button type="submit" class="btn btn-danger btn-xs pull-right">Hapus</button>
													{{ Form::close() }}
													{{ link_to_route('admin.tps.edit', 'Edit', array($tps->id), array('class' => 'btn btn-info btn-xs pull-right')) }}
													{{ link_to_route('admin.tps.show', 'Data Penduduk', array($tps->id), array('class' => 'btn btn-success btn-xs pull-right')) }}
												</td>
											</tr>
											@endforeach
										</tbody>
									</table>							
								</div>
								@else
									<h3 class="text-center"><i class="fa fa-eye-slash"></i> Anda belum memiliki data TPS.</h3>
									<br/>
									<center>
										<a href="{{ route('admin.tps.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Buat Baru</a>
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