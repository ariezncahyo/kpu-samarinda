@extends('_tema.admin')

@section('konten')
    @include('_tema.nav')
    <div id="cl-wrapper">
            <div class="container-fluid">
                <div class="page-head">
                    <ol class="breadcrumb">
                      <li><a href="{{ route('admin') }}"><i class="fa fa-home"></i></a></li>
                      <li><a href="#">Data Master</a></li>
                      <li><a href="{{ route('admin.petugas.index') }}">Petugas</a></li>
                      <li class="active">Buat Baru</li>
                    </ol>
                </div>      
            <div class="cl-mcont">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="block-flat">
                            <div class="step-content">
                                {{ Form::open(array('route' => 'admin.petugas.store', 'class' => 'form-horizontal group-border-dashed')) }}
                                    <div class="form-group no-padding">
                                        <div class="col-sm-7">
                                            <h3 class="hthin">Buat Petugas Baru</h3>
                                        </div>
                                    </div>
                                    <div class="form-group {{ ($errors->has('username')) ? 'has-error' : '' }}">
                                        {{ Form::label('username', 'Nama', array('class' => 'col-sm-3 control-label')) }}
                                        <div class="col-sm-6">
                                            {{ Form::text('username', Input::old('username'), array('class' => 'form-control', 'placeholder' => 'Nama Pengguna')) }}
                                            @if($errors->has('username'))
                                                <small><span class="help-block text-center">{{ $errors->first('username') }}</span></small>
                                            @endif
                                        </div>
                                    </div>  
                                    <div class="form-group {{ ($errors->has('password')) ? 'has-error' : '' }}">
                                        {{ Form::label('password', 'Password', array('class' => 'col-sm-3 control-label')) }}
                                        <div class="col-sm-6">
                                            {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Kata Sandi Petugas')) }}
                                            @if($errors->has('password'))
                                                <small><span class="help-block text-center">{{ $errors->first('password') }}</span></small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group {{ ($errors->has('id_kecamatan')) ? 'has-error' : '' }}">
                                        {{ Form::label('id_kecamatan', 'Kecamatan', array('class' => 'col-sm-3 control-label')) }}
                                        <div class="col-sm-6">
                                            {{ Form::select('id_kecamatan', Kecamatan::pilihan(), null, array('class' => 'select2-container select2')) }}
                                        </div>
                                    </div> 
                                    <div class="form-group {{ ($errors->has('id_kelurahan')) ? 'has-error' : '' }}">
                                        {{ Form::label('id_kelurahan', 'Kelurahan', array('class' => 'col-sm-3 control-label')) }}
                                        <div class="col-sm-6">
                                            {{ Form::select('id_kelurahan', Kelurahan::pilihan(), null, array('class' => 'select2-container select2')) }}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <a href="{{ route('admin.petugas.index') }}" class="btn btn-default"><i class="fa fa-caret-left"></i> Kembali</a>
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
<script type="text/javascript">
$(document).ready(function(){//initialize the javascript
    App.init(); });
</script>
@stop