@extends('_tema.admin')

@section('style')
{{ HTML::style('packages/summernote/summernote.css') }}
@stop

@section('konten')
    @include('_tema.nav')
    <div id="cl-wrapper">
            <div class="container-fluid">
                <div class="page-head">
                    <ol class="breadcrumb">
                      <li><a href="{{ route('admin') }}"><i class="fa fa-home"></i></a></li>
                      <li><a href="#">Profil KPU</a></li>
                      <li class="active">Visi &amp; Misi</li>
                    </ol>
                </div>      
            <div class="cl-mcont">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        @if(Session::has('pesan'))
                        <div class="alert alert-success alert-white rounded">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <div class="icon"><i class="fa fa-check"></i></div>
                            <strong>Perhatian!</strong> {{ Session::get('pesan') }}
                        </div>
                        @endif
                        <div class="block-flat">
                        	{{ Form::open(array('route' => 'admin.visimisi', 'class' => 'form-horizontal group-border-dashed')) }}
                        	<div class="header">	
								<button class="btn btn-primary pull-right">Simpan Perubahan <i class="fa fa-caret-right"></i></button>						
								<h3>Visi Misi Instansi</h3>
							</div>
							<div class="content">
								<div class="form-group">
                                    <div class="col-sm-12">
                                        <textarea class="input-block-level" id="summernote" name="visimisi">{{ $temp->visimisi }}</textarea>
                                        @if($errors->has('sejarah'))
                                            <small><span class="help-block text-center">{{ $errors->first('sejarah') }}</span></small>
                                        @endif
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

@section('script')
{{ HTML::script('packages/summernote/summernote.min.js') }}
<script type="text/javascript">
$(document).ready(function(){//initialize the javascript
    App.init(); 
    $('#summernote').summernote({
        height: 500, 
        focus: true
    }); 
});
</script>
@stop