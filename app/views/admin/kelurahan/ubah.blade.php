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
                      <li><a href="{{ route('admin.kelurahan.index') }}">Kelurahan</a></li>
                      <li class="active">Ubah Informasi</li>
                    </ol>
                </div>      
            <div class="cl-mcont">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="block-flat">
                            <div class="step-content">
                                {{ Form::model($kelurahan, array('method' => 'PATCH', 'route' => array('admin.kelurahan.update', $kelurahan->id), 'class' => 'form-horizontal group-border-dashed')) }}
                                    <div class="form-group no-padding">
                                        <div class="col-sm-7">
                                            <h3 class="hthin">Ubah Informasi Kelurahan</h3>
                                        </div>
                                    </div>
                                    <div class="form-group {{ ($errors->has('nama')) ? 'has-error' : '' }}">
                                        {{ Form::label('nama', 'Nama', array('class' => 'col-sm-3 control-label')) }}
                                        <div class="col-sm-6">
                                            {{ Form::text('nama', Input::old('nama'), array('class' => 'form-control', 'placeholder' => 'Nama Keluraan')) }}
                                            @if($errors->has('nama'))
                                                <small><span class="help-block text-center">{{ $errors->first('nama') }}</span></small>
                                            @endif
                                        </div>
                                    </div>  
                                    <div class="form-group {{ ($errors->has('id_kecamatan')) ? 'has-error' : '' }}">
                                        {{ Form::label('id_kecamatan', 'Kecamatan', array('class' => 'col-sm-3 control-label')) }}
                                        <div class="col-sm-6">
                                            {{ Form::select('id_kecamatan', Kecamatan::pilihan(), null, array('class' => 'select2-container select2')) }}
                                            @if($errors->has('id_kecamatan'))
                                                <small><span class="help-block text-center">{{ $errors->first('id_kecamatan') }}</span></small>
                                            @endif
                                        </div>
                                    </div>   
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <a href="{{ route('admin.kelurahan.index') }}" class="btn btn-default"><i class="fa fa-caret-left"></i> Kembali</a>
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