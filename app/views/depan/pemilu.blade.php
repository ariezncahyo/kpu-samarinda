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
	    <div class="page-header" style="margin-top: -10px;">
	      <h2>Hasil Pemilu</h2>
	    </div>
	    <div class="block-flat">
			@if ($partai->count())
			<div class="content">
				<div class="table-responsive">
					<table class="table table-bordered" id="datatable" >
						<thead>
							<tr>
								<th>ID</th>
								<th>Nama Partai</th>
								<th>% Vote</th>
							</tr>
						</thead>
						<tbody>
							{{-- */$total=0/* --}}
							@foreach ($partai as $partai)
							<tr>
								<td>{{{ $partai->id }}}</td>
								<td>{{{ $partai->nama_lengkap }}} <strong>({{{ $partai->nama }}})</strong></td>
								<td>{{{ $vote = $partai->vote }}} %</td>
							</tr>
							{{-- */$total = $total+$vote;/* --}}
							@endforeach
							<tr>
								<td colspan="2"><strong>TOTAL DATA MASUK</strong></td>
								<td>
									{{ $total }} %
								</td>
							</tr>
						</tbody>
					</table>							
				</div>
				@else
					<h3 class="text-center"><i class="fa fa-eye-slash"></i> Anda belum memiliki data partai.</h3>
					<br/>
				@endif
				<p class="pull-right"><em>*Update terakhir: 9 April 2014 pukul 22.34 WIB</em></p>
			</div>
		</div>
	  </div>
	</div>
  </div>
</div>
@stop