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
				  <li class="active">Saran &amp; Komentar</li>
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
							@if ($komentar->count())
							<div class="header">	
								<h3>Daftar Saran &amp; Komentar Masuk</h3>
							</div>
							<div class="content">
								<div class="table-responsive">
									<table class="table table-bordered" id="datatable" >
										<thead>
											<tr>
												<th>Nama</th>
												<th>Email</th>
												<th>Komentar</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($komentar as $temp)
											<tr>
												<td>{{{ $temp->nama }}}</td>
												<td><a href="mailto:{{{ $temp->email }}}">{{{ $temp->email }}}</a></td>
												<td>{{ $temp->komentar }}</td>
												<td>
													{{ Form::open(array('method' => 'post', 'route' => array('post.admin.saran', $temp->id))) }}
														<button type="submit" class="btn btn-success btn-xs pull-right">Hapus</button>
													{{ Form::close() }}
												</td>
											</tr>
											@endforeach
										</tbody>
									</table>							
								</div>
								@else
									<h3 class="text-center"><i class="fa fa-eye-slash"></i> Anda belum memiliki saran ataupun komentar.</h3>
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