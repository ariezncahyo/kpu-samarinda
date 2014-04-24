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
				  <li class="active">Unduhan</li>
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
							@if ($unduhan->count())
							<div class="header">	
								<a href="{{ route('admin.unduhan.create') }}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Tambah Unduhan Baru</a>						
								<h3>Daftar Seluruh Unduhan</h3>
							</div>
							<div class="content">
								<div class="table-responsive">
									<table class="table table-bordered" id="datatable" >
										<thead>
											<tr>
												<th>Judul File</th>
												<th>Keterangan</th>
												<th>Uploader</th>
												<th width="200px">Aksi</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($unduhan as $unduhan)
											<tr>
												<td>{{{ $unduhan->judul }}}</td>
												<td>{{{ $unduhan->keterangan }}}</td>
												<td>{{{ $unduhan->petugas->username }}}</td>
												<td>
													@if(Auth::user()->id == 1)
													{{ Form::open(array('method' => 'POST', 'route' => array('admin.unduhan', $unduhan->file))) }}
														<button class="btn btn-success btn-xs pull-right">Download</button>
													{{ Form::close() }}
													{{ Form::open(array('method' => 'DELETE', 'route' => array('admin.unduhan.destroy', $unduhan->id))) }}														
														<button type="submit" class="btn btn-danger btn-xs pull-right">Hapus</button>
													{{ Form::close() }}
													
													@else
														@if($unduhan->id_petugas === Auth::user()->id)
														{{ Form::open(array('method' => 'POST', 'route' => array('admin.unduhan', $unduhan->file))) }}
															<button class="btn btn-success btn-xs pull-right">Download</button>
														{{ Form::close() }}
														{{ Form::open(array('method' => 'DELETE', 'route' => array('admin.unduhan.destroy', $unduhan->id))) }}
															<button type="submit" class="btn btn-danger btn-xs pull-right">Hapus</button>
														{{ Form::close() }}
														
														@else
															{{ Form::open(array('method' => 'POST', 'route' => array('admin.unduhan', $unduhan->file))) }}
																<button class="btn btn-success btn-xs pull-right">Download</button>
															{{ Form::close() }}
															<p class="text-center">Bukan Milik Anda.</p>
														@endif
													@endif
												</td>
											</tr>
											@endforeach
										</tbody>
									</table>							
								</div>
								@else
									<h3 class="text-center"><i class="fa fa-eye-slash"></i> Anda belum memiliki data unduhan.</h3>
									<br/>
									<center>
										<a href="{{ route('admin.unduhan.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Buat Baru</a>
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