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
                      <li><a href="#">Modul</a></li>
                      <li><a href="{{ route('admin.berita.index') }}">Berita</a></li>
                      <li class="active">Ubah Informasi</li>
                    </ol>
                </div>      
            <div class="cl-mcont">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="block-flat">
                            <div class="step-content">
                                {{ Form::model($berita, array('method' => 'PATCH', 'route' => array('admin.berita.update', $berita->id), 'class' => 'form-horizontal group-border-dashed')) }}
                                    <div class="form-group no-padding">
                                        <div class="col-sm-7">
                                            <h3 class="hthin">Ubah Informasi Berita</h3>
                                        </div>
                                    </div>
                                    <div class="form-group {{ ($errors->has('judul')) ? 'has-error' : '' }}">
                                        {{ Form::label('judul', 'Judul', array('class' => 'col-sm-3 control-label')) }}
                                        <div class="col-sm-6">
                                            {{ Form::text('judul', Input::old('judul'), array('class' => 'form-control', 'placeholder' => 'Judul Berita')) }}
                                            @if($errors->has('judul'))
                                                <small><span class="help-block text-center">{{ $errors->first('judul') }}</span></small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group {{ ($errors->has('isi')) ? 'has-error' : '' }}">
                                        {{ Form::label('isi', 'Isi Berita', array('class' => 'col-sm-3 control-label')) }}
                                        <div class="col-sm-9">
                                            <textarea class="input-block-level" id="summernote" name="isi" rows="18">{{ $berita->isi }}</textarea>
                                            @if($errors->has('isi'))
                                                <small><span class="help-block text-center">{{ $errors->first('isi') }}</span></small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <a href="{{ route('admin.berita.index') }}" class="btn btn-default"><i class="fa fa-caret-left"></i> Kembali</a>
                                            <button class="btn btn-primary">Update Berita <i class="fa fa-caret-right"></i></button>
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
{{ HTML::script('packages/summernote/summernote.min.js') }}
<script type="text/javascript">
$(document).ready(function(){//initialize the javascript
    App.init(); 
    $('#summernote').summernote({
        height: 300, 
        focus: true
    }); 
});
var postForm = function() {
    var content = $('textarea[name="content"]').html($('#summernote').code());
}
</script>
@stop