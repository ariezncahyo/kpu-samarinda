@extends('_tema.admin')

@section('konten')
    @include('_tema.nav')
    <div id="cl-wrapper">
            <div class="container-fluid">
                <div class="page-head">
                    <ol class="breadcrumb">
                      <li><a href="{{ route('admin') }}"><i class="fa fa-home"></i></a></li>
                      <li class="active">Pengaturan</li>
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
                        	{{ Form::open(array('route' => 'admin.instansi', 'class' => 'form-horizontal group-border-dashed')) }}
                                    <div class="form-group no-padding">
                                        <div class="col-sm-7">
                                            <h3 class="hthin">Pengaturan Aplikasi</h3>
                                        </div>
                                    </div>
                                    <div class="form-group {{ ($errors->has('nama')) ? 'has-error' : '' }}">
                                        {{ Form::label('nama', 'Nama Aplikasi', array('class' => 'col-sm-3 control-label')) }}
                                        <div class="col-sm-5">
                                            {{ Form::text('nama', $temp->nama, array('class' => 'form-control', 'placeholder' => 'Nama Aplikasi')) }}
                                            @if($errors->has('nama'))
                                                <small><span class="help-block text-center">{{ $errors->first('nama') }}</span></small>
                                            @endif
                                        </div>
                                    </div>  
                                    <div class="form-group {{ ($errors->has('slogan')) ? 'has-error' : '' }}">
                                        {{ Form::label('slogan', 'Slogan', array('class' => 'col-sm-3 control-label')) }}
                                        <div class="col-sm-8">
                                            {{ Form::text('slogan', $temp->slogan, array('class' => 'form-control', 'placeholder' => 'Slogan Aplikasi')) }}
                                            @if($errors->has('slogan'))
                                                <small><span class="help-block text-center">{{ $errors->first('slogan') }}</span></small>
                                            @endif
                                        </div>
                                    </div>  
                                    <div class="form-group {{ ($errors->has('alamat')) ? 'has-error' : '' }}">
                                        {{ Form::label('alamat', 'Alamat Instansi', array('class' => 'col-sm-3 control-label')) }}
                                        <div class="col-sm-8">
                                            {{ Form::textarea('alamat', $temp->alamat, array('class' => 'form-control', 'placeholder' => 'Alamat Instansi', 'rows' => 3)) }}
                                            @if($errors->has('alamat'))
                                                <small><span class="help-block text-center">{{ $errors->first('alamat') }}</span></small>
                                            @endif
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                        {{ Form::label('telp', 'Kontak', array('class' => 'col-sm-3 control-label')) }}
                                        <div class="col-sm-4">
                                            {{ Form::text('telp', $temp->telp, array('class' => 'form-control', 'placeholder' => 'Nomor Telepon', 'data-mask' => 'phone')) }} 
                                        </div>
                                        <div class="col-sm-4">
                                            {{ Form::text('fax', $temp->fax, array('class' => 'form-control', 'placeholder' => 'Fax', 'data-mask' => 'phone')) }}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('logo', 'Logo', array('class' => 'col-sm-3 control-label')) }}
                                        <div class="col-sm-4">
                                            <img src="{{ asset('aset/img') }}/{{ $temp->logo }}" class="img-responsive" />
                                            <br/>
                                            {{ Form::file('logo', null, array('class' => 'form-control')) }}
                                            <span class="help-block small italic">*Abaikan bila tidak ada perubahan logo.</span>
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