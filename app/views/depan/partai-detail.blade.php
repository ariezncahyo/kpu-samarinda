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
				<div class="row">
                    <div class="col-md-4">
                        <div class="block-flat">
							<div class="content form-horizontal">
								@if($partai->lambang)
								<a href="{{ asset('aset/img/partai/'.$partai->lambang) }}" target="_blank">
									<img class="img-responsive" src="{{ asset('aset/img/partai/'.$partai->lambang) }}"/>
								</a>
								@else
								<p class="text-center">Anda belum memilih lambang untuk partai ini.</p>
								@endif
							</div>
                        </div>              
                    </div>
                    <div class="col-md-8">
                        <div class="block-flat">
                            <div class="header">	
                            	<a href="{{ route('partai') }}" class="btn btn-info pull-right"><i class="glyphicon glyphicon-arrow-left"></i> Kembali</a>
								<h3>Detail Lengkap Partai</h3>
							</div>
							<div class="content form-horizontal">
								<div class="form-group">
									<label class="col-sm-3 control-label">Nama</label>
									<div class="col-sm-9">
										<label class="control-label">{{{ $partai->nama_lengkap }}} <strong>({{{$partai->nama}}})</strong></label>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Ketua</label>
									<div class="col-sm-9">
										<label class="control-label">{{ $partai->ketua }}</label>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Sekjen</label>
									<div class="col-sm-9">
										<label class="control-label">{{ $partai->sekjen }}</label>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Bendahara</label>
									<div class="col-sm-9">
										<label class="control-label">{{ $partai->bendahara }}</label>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Alamat</label>
									<div class="col-sm-9">
										<label class="control-label">{{ $partai->alamat }}</label>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Kontak</label>
									<div class="col-sm-9">
										<label class="control-label">Telp. {{ $partai->telp }} Fax. {{{ $partai->fax }}}</label>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Persentase Voting</label>
									<div class="col-sm-9">
										<label class="control-label">{{{ $partai->vote }}} %</label>
									</div>
								</div>
							</div>
                        </div>              
                    </div>
                </div>
			</div>
		</div>
	</div>
</div>
@stop