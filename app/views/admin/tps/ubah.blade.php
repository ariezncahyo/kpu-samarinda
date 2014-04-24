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
                      <li><a href="{{ route('admin.tps.index') }}">Data TPS</a></li>
                      <li class="active">Ubah Informasi</li>
                    </ol>
                </div>      
            <div class="cl-mcont">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="block-flat">
                            <div class="step-content">
                                {{ Form::model($tps, array('method' => 'PATCH', 'route' => array('admin.tps.update', $tps->id), 'class' => 'form-horizontal group-border-dashed')) }}
                                    <div class="form-group no-padding">
                                        <div class="col-sm-7">
                                            <h3 class="hthin">Buat TPS Baru</h3>
                                        </div>
                                    </div>
                                    <div class="form-group {{ ($errors->has('nama_ketua')) ? 'has-error' : '' }}">
                                        {{ Form::label('nama_ketua', 'Nama Ketua', array('class' => 'col-sm-3 control-label')) }}
                                        <div class="col-sm-6">
                                            {{ Form::text('nama_ketua', Input::old('nama_ketua'), array('class' => 'form-control', 'placeholder' => 'Nama Ketua TPS')) }}
                                            @if($errors->has('nama_ketua'))
                                                <small><span class="help-block text-center">{{ $errors->first('nama_ketua') }}</span></small>
                                            @endif
                                        </div>
                                    </div>  
                                    <div class="form-group {{ ($errors->has('lokasi')) ? 'has-error' : '' }}">
                                        {{ Form::label('lokasi', 'Lokasi', array('class' => 'col-sm-3 control-label')) }}
                                        <div class="col-sm-6">
                                            {{ Form::text('lokasi', Input::old('lokasi'), array('class' => 'form-control', 'placeholder' => 'Lokasi TPS')) }}
                                            @if($errors->has('lokasi'))
                                                <small><span class="help-block text-center">{{ $errors->first('lokasi') }}</span></small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group {{ ($errors->has('nomor_urut')) ? 'has-error' : '' }}">
                                        {{ Form::label('nomor_urut', 'Nomor Urut', array('class' => 'col-sm-3 control-label')) }}
                                        <div class="col-sm-6">
                                            {{ Form::text('nomor_urut', Input::old('nomor_urut'), array('class' => 'form-control', 'placeholder' => 'Nomor Urut TPS')) }}
                                            @if($errors->has('nomor_urut'))
                                                <small><span class="help-block text-center">{{ $errors->first('nomor_urut') }}</span></small>
                                            @endif
                                        </div>
                                    </div>  
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <a href="{{ route('admin.tps.index') }}" class="btn btn-default"><i class="fa fa-caret-left"></i> Kembali</a>
                                            <button class="btn btn-primary">Ubah Informasi <i class="fa fa-caret-right"></i></button>
                                        </div>
                                    </div> 
                                {{ Form::close() }}
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