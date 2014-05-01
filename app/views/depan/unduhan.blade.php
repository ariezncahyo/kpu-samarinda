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
				<div class="col-md-12">
					<div class="block-flat">
						@if ($unduhan->count())
						<div class="header">	
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
											<th width="100px">Aksi</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($unduhan as $unduhan)
										<tr>
											<td>{{{ $unduhan->judul }}}</td>
											<td>{{{ $unduhan->keterangan }}}</td>
											<td>{{{ $unduhan->petugas->username }}}</td>
											<td>	
												{{ Form::open(array('method' => 'POST', 'route' => array('admin.unduhan', $unduhan->file))) }}
													<button class="btn btn-success btn-xs pull-right"><i class="glyphicon glyphicon-download-alt"></i> Download</button>
												{{ Form::close() }}
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>							
							</div>
						</div>
						@else
							<h3 class="text-center"><i class="fa fa-eye-slash"></i> Anda belum memiliki data unduhan.</h3>
							<br/>
						@endif
					</div>				
				</div>
			</div>
		</div>
	</div>
</div>
@stop