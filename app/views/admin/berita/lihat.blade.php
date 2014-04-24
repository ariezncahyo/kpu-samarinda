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
                      <li class="active">{{ $berita->judul }}</li>
                    </ol>
                </div>      
            <div class="cl-mcont">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="block-flat">
                        	<h1>{{ $berita->judul }}</h1>
                        	<p>
                        		<i class="fa fa-calendar"></i> Dibuat tanggal : {{ $berita->created_at }} | 
                        		<i class="fa fa-user"></i> Oleh : {{ $berita->petugas->username }}
                        	</p>
                        	<hr/>
							{{ $berita->isi }}   
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