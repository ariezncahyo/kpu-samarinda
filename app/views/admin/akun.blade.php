@extends('_tema.admin')

@section('konten')
    @include('_tema.nav')
    <div id="cl-wrapper">
            <div class="container-fluid">
                <div class="page-head">
                    <ol class="breadcrumb">
                      <li><a href="{{ route('admin') }}"><i class="fa fa-home"></i></a></li>
                      <li class="active">Kelola Akun</li>
                    </ol>
                </div>      
            <div class="cl-mcont">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        @if(Session::has('pesan'))
                        <div class="alert alert-success alert-white rounded">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <div class="icon"><i class="fa fa-check"></i></div>
                            <strong>Perhatian!</strong> {{ Session::get('pesan') }}
                        </div>
                        @endif
                        <div class="block-flat">
                        	{{ Form::open(array('route' => 'admin.akun', 'class' => 'form-horizontal group-border-dashed')) }}
                                    <div class="form-group no-padding">
                                        <div class="col-sm-7">
                                            <h3 class="hthin">Kelola Akun Anda</h3>
                                        </div>
                                    </div>
                                    <div class="form-group {{ ($errors->has('username')) ? 'has-error' : '' }}">
                                        {{ Form::label('username', 'Username Baru', array('class' => 'col-sm-3 control-label')) }}
                                        <div class="col-sm-5">
                                            {{ Form::text('username', $temp, array('class' => 'form-control', 'placeholder' => 'Username Baru Anda')) }}
                                            @if($errors->has('username'))
                                                <small><span class="help-block text-center">{{ $errors->first('username') }}</span></small>
                                            @endif
                                        </div>
                                    </div>  
                              		<div class="form-group {{ ($errors->has('password')) ? 'has-error' : '' }}">
                                        {{ Form::label('password', 'Password Baru', array('class' => 'col-sm-3 control-label')) }}
                                        <div class="col-sm-5">
                                            {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Ketik Password Baru')) }}
                                            @if($errors->has('password'))
                                                <small><span class="help-block text-center">{{ $errors->first('password') }}</span></small>
                                            @endif
                                        </div>
                                    </div> 
                                    <div class="form-group {{ ($errors->has('konfirmasi_password')) ? 'has-error' : '' }}">
                                        {{ Form::label('konfirmasi_password', 'Konfirmasi Password', array('class' => 'col-sm-3 control-label')) }}
                                        <div class="col-sm-5">
                                            {{ Form::password('konfirmasi_password', array('class' => 'form-control', 'placeholder' => 'Ketik Ulang Password Baru Anda')) }}
                                            @if($errors->has('konfirmasi_password'))
                                                <small><span class="help-block text-center">{{ $errors->first('konfirmasi_password') }}</span></small>
                                            @endif
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button class="btn btn-primary">Simpan Perubahan<i class="fa fa-caret-right"></i></button>
                                        </div>
                                    </div> 
                                {{ Form::close() }}
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
    App.init(); 
});
</script>
@stop