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
                      <li><a href="{{ route('admin.partai.index') }}">Partai Politik</a></li>
                      <li class="active">Buat Baru</li>
                    </ol>
                </div>      
            <div class="cl-mcont">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="block-flat">
                            <div class="step-content">
                                {{ Form::open(array('route' => 'admin.partai.store', 'files' => 'true','class' => 'form-horizontal group-border-dashed')) }}
                                    <div class="form-group no-padding">
                                        <div class="col-sm-7">
                                            <h3 class="hthin">Buat Partai Baru</h3>
                                        </div>
                                    </div>
                                    <div class="form-group {{ ($errors->has('nama')) ? 'has-error' : '' }}">
                                        {{ Form::label('nama', 'Nama', array('class' => 'col-sm-3 control-label')) }}
                                        <div class="col-sm-6">
                                            {{ Form::text('nama', Input::old('nama'), array('class' => 'form-control', 'placeholder' => 'Singkatan Partai')) }}
                                            @if($errors->has('nama'))
                                                <small><span class="help-block text-center">{{ $errors->first('nama') }}</span></small>
                                            @endif
                                        </div>
                                    </div>  
                                    <div class="form-group {{ ($errors->has('nama_lengkap')) ? 'has-error' : '' }}">
                                        {{ Form::label('nama_lengkap', 'Nama Lengkap', array('class' => 'col-sm-3 control-label')) }}
                                        <div class="col-sm-6">
                                            {{ Form::text('nama_lengkap', Input::old('nama_lengkap'), array('class' => 'form-control', 'placeholder' => 'Kepanjangan Partai')) }}
                                            @if($errors->has('nama_lengkap'))
                                                <small><span class="help-block text-center">{{ $errors->first('nama_lengkap') }}</span></small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('ketua', 'Ketua', array('class' => 'col-sm-3 control-label')) }}
                                        <div class="col-sm-6">
                                            {{ Form::text('ketua', null, array('class' => 'form-control', 'placeholder' => 'Nama Ketua Partai')) }}
                                        </div>
                                    </div>  
                                    <div class="form-group">
                                        {{ Form::label('sekjen', 'Sekjen', array('class' => 'col-sm-3 control-label')) }}
                                        <div class="col-sm-6">
                                            {{ Form::text('sekjen', null, array('class' => 'form-control', 'placeholder' => 'Nama Sekertaris Jendral')) }}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('bendahara', 'Bendahara', array('class' => 'col-sm-3 control-label')) }}
                                        <div class="col-sm-6">
                                            {{ Form::text('bendahara', null, array('class' => 'form-control', 'placeholder' => 'Nama Bendahara')) }}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('alamat', 'Alamat', array('class' => 'col-sm-3 control-label')) }}
                                        <div class="col-sm-6">
                                            {{ Form::textarea('alamat', null, array('class' => 'form-control', 'placeholder' => 'Alamat Partai')) }}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('telp', 'Kontak', array('class' => 'col-sm-3 control-label')) }}
                                        <div class="col-sm-3">
                                            {{ Form::text('telp', null, array('class' => 'form-control', 'placeholder' => 'Nomor Telepon', 'data-mask' => 'phone')) }} 
                                        </div>
                                        <div class="col-sm-3">
                                            {{ Form::text('fax', null, array('class' => 'form-control', 'placeholder' => 'Fax', 'data-mask' => 'phone')) }}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('lambang', 'Lambang Partai', array('class' => 'col-sm-3 control-label')) }}
                                        <div class="col-sm-6">
                                            {{ Form::file('lambang', null, array('class' => 'form-control')) }}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <a href="{{ route('admin.partai.index') }}" class="btn btn-default"><i class="fa fa-caret-left"></i> Kembali</a>
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