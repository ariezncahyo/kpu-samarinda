@extends('_tema.admin')

@section('konten')
    @include('_tema.nav')
    <div id="cl-wrapper">
            <div class="container-fluid">
                <div class="page-head">
                    <ol class="breadcrumb">
                      <li><a href="{{ route('admin') }}"><i class="fa fa-home"></i></a></li>
                      <li>Data TPS</li>
                      <li>Penduduk</li>
                      <li class="active">{{ $penduduk->nama }}</li>
                    </ol>
                </div>      
            <div class="cl-mcont">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="block-flat">
                            <div class="header">	
                    
								<h3>Detail Lengkap Penduduk</h3>
							</div>
							<div class="content form-horizontal">
								<div class="form-group">
									<label class="col-sm-3 control-label">No. KK</label>
									<div class="col-sm-9">
										<label class="control-label">{{ $penduduk->kk }}</label>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">No. KTP</label>
									<div class="col-sm-9">
										<label class="control-label">{{ $penduduk->ktp }}</label>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Nama</label>
									<div class="col-sm-9">
										<label class="control-label">{{ $penduduk->nama }}</label>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">TTL</label>
									<div class="col-sm-9">
										<label class="control-label">{{ $penduduk->tempat_lahir }}, {{ date("d F Y",strtotime($penduduk->tanggal_lahir)) }}</label>
									</div>
								</div>	
								<div class="form-group">
									<label class="col-sm-3 control-label">Status Kawin</label>
									<div class="col-sm-9">
										<label class="control-label">{{ ($penduduk->status_perkawinan==0) ? 'Belum Menikah' : 'Menikah' }}</label>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Jenis Kelamin</label>
									<div class="col-sm-9">
										<label class="control-label">{{ ($penduduk->jenis_kelamin==0) ? 'Laki-laki' : 'Perempuan' }}</label>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Alamat</label>
									<div class="col-sm-9">
										<label class="control-label">{{ $penduduk->alamat }}</label>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">RT</label>
									<div class="col-sm-9">
										<label class="control-label">{{ $penduduk->rt }}</label>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">TPS</label>
									<div class="col-sm-9">
										<label class="control-label">{{ $penduduk->tps }}</label>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Kelurahan</label>
									<div class="col-sm-9">
										<label class="control-label">{{ $penduduk->kelurahan->nama }}</label>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Kecamatan</label>
									<div class="col-sm-9">
										<label class="control-label">{{ $penduduk->kecamatan->nama }}</label>
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

@section('script')

<script type="text/javascript">
$(document).ready(function(){//initialize the javascript
    App.init(); });
</script>
@stop