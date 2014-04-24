@extends('_tema.admin')

@section('konten')
    @include('_tema.nav')
    <div id="cl-wrapper">
            <div class="container-fluid">     
            <div class="cl-mcont">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="block-flat">
                            <div class="step-content">
                                {{ Form::open(array('route' => 'admin.penduduk.store', 'class' => 'form-horizontal group-border-dashed')) }}
                                    <div class="form-group no-padding">
                                        <div class="col-sm-7">
                                            <h3 class="hthin">Buat Data Penduduk</h3>
                                        </div>
                                    </div>
                                    <div class="form-group {{ ($errors->has('kk')) ? 'has-error' : '' }}">
                                        {{ Form::label('kk', 'Nomor KK', array('class' => 'col-sm-3 control-label')) }}
                                        <div class="col-sm-6">
                                            {{ Form::text('kk', Input::old('kk'), array('class' => 'form-control', 'placeholder' => 'Nomor Kartu Keluarga')) }}
                                            @if($errors->has('kk'))
                                                <small><span class="help-block text-center">{{ $errors->first('kk') }}</span></small>
                                            @endif
                                        </div>
                                    </div>  
                                    <div class="form-group {{ ($errors->has('ktp')) ? 'has-error' : '' }}">
                                        {{ Form::label('ktp', 'Nomor KTP', array('class' => 'col-sm-3 control-label')) }}
                                        <div class="col-sm-6">
                                            {{ Form::text('ktp', Input::old('ktp'), array('class' => 'form-control', 'placeholder' => 'Nomor Kartu Tanda Penduduk')) }}
                                            @if($errors->has('ktp'))
                                                <small><span class="help-block text-center">{{ $errors->first('ktp') }}</span></small>
                                            @endif
                                        </div>
                                    </div>  
                                    <div class="form-group {{ ($errors->has('nama')) ? 'has-error' : '' }}">
                                        {{ Form::label('nama', 'Nama', array('class' => 'col-sm-3 control-label')) }}
                                        <div class="col-sm-8">
                                            {{ Form::text('nama', Input::old('nama'), array('class' => 'form-control', 'placeholder' => 'Nama')) }}
                                            @if($errors->has('nama'))
                                                <small><span class="help-block text-center">{{ $errors->first('nama') }}</span></small>
                                            @endif
                                        </div>
                                    </div>  
                                    <div class="form-group {{ (($errors->has('tempat_lahir')) || ($errors->has('tanggal_lahir'))) ? 'has-error' : '' }}">
                                        {{ Form::label('tempat_lahir', 'TTL', array('class' => 'col-sm-3 control-label')) }}
                                        <div class="col-sm-4">
                                            {{ Form::text('tempat_lahir', Input::old('tempat_lahir'), array('class' => 'form-control', 'placeholder' => 'Tempat Lahir')) }}
                                            @if($errors->has('tempat_lahir'))
                                                <small><span class="help-block text-center">{{ $errors->first('tempat_lahir') }}</span></small>
                                            @endif
                                        </div>
                                        <div class="col-sm-4">
                                            {{ Form::text('tanggal_lahir', Input::old('tanggal_lahir'), array('class' => 'form-control', 'data-mask' => 'date', 'placeholder' => 'DD/MM/YYYY')) }}
                                            @if($errors->has('tanggal_lahir'))
                                                <small><span class="help-block text-center">{{ $errors->first('tanggal_lahir') }}</span></small>
                                            @endif
                                        </div>  
                                    </div>  
                                    <div class="form-group">
                                        {{ Form::label('status_perkawinan', 'Status Kawin', array('class' => 'col-sm-3 control-label')) }}
                                        <div class="col-sm-4">
                                            {{ Form::select('status_perkawinan', Penduduk::status_perkawinan(), null, array('class' => 'form-control')) }}
                                        </div>
                                    </div>  
                                    <div class="form-group">
                                        {{ Form::label('jenis_kelamin', 'Jenis Kelamin', array('class' => 'col-sm-3 control-label')) }}
                                        <div class="col-sm-4">
                                            {{ Form::select('jenis_kelamin', Penduduk::jenis_kelamin(), null, array('class' => 'form-control')) }}
                                        </div>
                                    </div> 
                                    <div class="form-group {{ ($errors->has('alamat')) ? 'has-error' : '' }}">
                                        {{ Form::label('alamat', 'Alamat', array('class' => 'col-sm-3 control-label')) }}
                                        <div class="col-sm-8">
                                            {{ Form::textarea('alamat', Input::old('alamat'), array('class' => 'form-control', 'placeholder' => 'Alamat', 'rows' => '3')) }}
                                            @if($errors->has('alamat'))
                                                <small><span class="help-block text-center">{{ $errors->first('alamat') }}</span></small>
                                            @endif
                                        </div>
                                    </div>  
                                    <div class="form-group">
                                        {{ Form::label('rt', 'RT', array('class' => 'col-sm-3 control-label')) }}
                                        <div class="col-sm-2">
                                            {{ Form::text('rt', null, array('class' => 'form-control', 'placeholder' => 'RT')) }}
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                        {{ Form::label('id_tps', 'TPS', array('class' => 'col-sm-3 control-label')) }}
                                        <div class="col-sm-6">
                                            {{ Form::select('id_tps', TPS::pilihan(), null, array('class' => 'select2-container select2')) }}
                                        </div>
                                    </div>     
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <a href="{{ route('admin.penduduk.index') }}" class="btn btn-default"><i class="fa fa-caret-left"></i> Kembali</a>
                                            <button class="btn btn-primary">Buat Baru <i class="fa fa-caret-right"></i></button>
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
{{ HTML::script('packages/cleanzone/js/jquery.maskedinput/jquery.maskedinput.js') }}

<script type="text/javascript">
$(document).ready(function(){//initialize the javascript
    App.init(); App.masks(); });
</script>
@stop