@extends('_tema.admin')

@section('konten')
    @include('_tema.nav')
    <div id="cl-wrapper">
            <div class="container-fluid">
                <div class="page-head">
                    <ol class="breadcrumb">
                      <li><a href="{{ route('admin') }}"><i class="fa fa-home"></i></a></li>
                      <li><a href="#">Profil KPU</a></li>
                      <li class="active">Struktur Organisasi</li>
                    </ol>
                </div>      
            <div class="cl-mcont">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        @if(Session::has('pesan'))
                        <div class="alert alert-success alert-white rounded">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <div class="icon"><i class="fa fa-check"></i></div>
                            <strong>Perhatian!</strong> {{ Session::get('pesan') }}
                        </div>
                        @endif
                        @if($errors->has('struktur_organisasi'))
                        <div class="alert alert-warning alert-white rounded">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <div class="icon"><i class="fa fa-warning"></i></div>
                            <strong>Perhatian!</strong> {{ $errors->first('struktur_organisasi') }}
                        </div>
                        @endif
                    	<div class="block-flat">
                            {{ Form::open(array('route' => 'admin.struktur', 'files' => 'true','class' => 'form-horizontal group-border-dashed')) }}
                            <div class="header">    
                                <button class="btn btn-primary pull-right">Simpan Perubahan <i class="fa fa-caret-right"></i></button>                      
                                <h3>Struktur Organisasi KPU</h3>
                            </div>
                            <div class="content">
                            	<div class="form-group">
                                    <div class="col-sm-12">
                                        <a href="{{ asset('aset/kpu') }}/{{ $temp->struktur_organisasi }}" target="_blank">
                                            <img src="{{ asset('aset/kpu') }}/{{ $temp->struktur_organisasi }}" class="img-responsive" />
                                        </a>
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('struktur_organisasi') ? 'has-error' : '' }}">
                                    <div class="col-sm-12">
                                        {{ Form::file('struktur_organisasi') }}
                                        <span class="help-block">*Abaikan bila tidak ada perubahan struktur organisasi.</span>
                                    </div>
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
