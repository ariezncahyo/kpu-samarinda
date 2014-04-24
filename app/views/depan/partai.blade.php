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
				<div class="col-lg-12">
					<div class="page-header">
						<h1 id="tables">Daftar Partai</h1>
					</div>

					<div class="bs-component">
						<table class="table table-striped table-hover ">
							<thead>
								<tr>
									<th>#</th>
									<th>Nama Partai</th>
									<th>Detail</th>
								</tr>
							</thead>
							{{-- */$id=1/* --}}
							<tbody>
								@foreach($partai as $partai)
								<tr>
									<td>{{ $id }}</td>
									<td>{{ $partai->nama_lengkap }} <strong>({{ $partai->nama }})</strong></td>
									<td>{{ link_to_route('partai.lihat', 'Detail', array($partai->id), array('class' => 'btn btn-info btn-xs')) }}</td>
								</tr>
								{{-- */$id++/* --}}
								@endforeach
							</tbody>
						</table> 
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop