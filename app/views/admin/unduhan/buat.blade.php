@extends('_tema.admin')

@section('konten')
    @include('_tema.nav')
    <div id="cl-wrapper">
            <div class="container-fluid">
                <div class="page-head">
                    <ol class="breadcrumb">
                      <li><a href="{{ route('admin') }}"><i class="fa fa-home"></i></a></li>
                      <li><a href="#">Modul</a></li>
                      <li><a href="{{ route('admin.unduhan.index') }}">Unduhan</a></li>
                      <li class="active">Buat Baru</li>
                    </ol>
                </div>      
            <div class="cl-mcont">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="block-flat">
                            <div class="step-content">
                                {{ Form::open(array('route' => 'admin.unduhan.store', 'files' => 'true','class' => 'form-horizontal group-border-dashed')) }}
                                    <div class="form-group no-padding">
                                        <div class="col-sm-7">
                                            <h3 class="hthin">Buat Unduhan Baru</h3>
                                        </div>
                                    </div>
                                    <div class="form-group {{ ($errors->has('judul')) ? 'has-error' : '' }}">
                                        {{ Form::label('judul', 'Judul', array('class' => 'col-sm-3 control-label')) }}
                                        <div class="col-sm-6">
                                            {{ Form::text('judul', Input::old('judul'), array('class' => 'form-control', 'placeholder' => 'Judul File')) }}
                                            @if($errors->has('judul'))
                                                <small><span class="help-block text-center">{{ $errors->first('judul') }}</span></small>
                                            @endif
                                        </div>
                                    </div> 
                                    <div class="form-group {{ ($errors->has('file')) ? 'has-error' : '' }}">
                                        {{ Form::label('file', 'File Unduhan', array('class' => 'col-sm-3 control-label')) }}
                                        <div class="col-sm-6">
                                            {{ Form::file('file', null, array('class' => 'form-control', 'placeholder' => 'File Unduhan')) }}
                                            @if($errors->has('file'))
                                                <small><span class="help-block text-center">{{ $errors->first('file') }}</span></small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group {{ ($errors->has('keterangan')) ? 'has-error' : '' }}">
                                        {{ Form::label('keterangan', 'Keterangan', array('class' => 'col-sm-3 control-label')) }}
                                        <div class="col-sm-6">
                                            {{ Form::textarea('keterangan', Input::old('keterangan'), array('class' => 'form-control', 'placeholder' => 'Keterangan File')) }}
                                            @if($errors->has('keterangan'))
                                                <small><span class="help-block text-center">{{ $errors->first('keterangan') }}</span></small>
                                            @endif
                                        </div>
                                    </div>  
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <a href="{{ route('admin.unduhan.index') }}" class="btn btn-default"><i class="fa fa-caret-left"></i> Kembali</a>
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