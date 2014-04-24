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
				  <li><a href="#">Modul</a></li>
				  <li class="active">Partai Politik</li>
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
							@if ($partai->count())
							<div class="header">	
								<a href="{{ route('admin.partai.create') }}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Tambah Partai Politik</a>						
								<h3>Daftar Seluruh Partai</h3>
							</div>
							<div class="content">
								<div class="table-responsive">
									<table class="table table-bordered" id="datatable" >
										<thead>
											<tr>
												<th>ID</th>
												<th>Nama Partai</th>
												<th>Ketua</th>
												<th>% Vote</th>
												<th width="200px">Aksi</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($partai as $partai)
											<tr>
												<td>{{{ $partai->id }}}</td>
												<td>{{{ $partai->nama_lengkap }}} <strong>({{{ $partai->nama }}})</strong></td>
												<td>{{{ $partai->ketua }}}</td>
												<td>{{{ $partai->vote }}} %</td>
												<td>
													{{ Form::open(array('method' => 'DELETE', 'route' => array('admin.partai.destroy', $partai->id))) }}
														<button type="submit" class="btn btn-danger btn-xs pull-right">Hapus</button>
													{{ Form::close() }}
													{{ link_to_route('admin.partai.edit', 'Edit', array($partai->id), array('class' => 'btn btn-info btn-xs pull-right')) }}
													{{ link_to_route('admin.partai.show', 'Detail', array($partai->id), array('class' => 'btn btn-info btn-xs pull-right')) }}
												</td>
											</tr>
											@endforeach
										</tbody>
									</table>							
								</div>
								@else
									<h3 class="text-center"><i class="fa fa-eye-slash"></i> Anda belum memiliki data partai.</h3>
									<br/>
									<center>
										<a href="{{ route('admin.partai.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Buat Baru</a>
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