@extends('_tema.utama')

@section('konten')
<div class="row">
  <div class="col-lg-12">
    <div class="page-header" style="margin: 0px 0 20px;">
    </div>
  </div>
</div>

<div class="row">
  <div class="col-lg-7">
    <blockquote>
      <p>Selamat Datang di Komisi Pemilihan Umum Samarinda. Meningkatnya bangsa ini ditentukan oleh kecerdasan Anda dalam memilih. Gunakan hak pilih Anda!</p>
      <small>Nurjanah [10150150XX]</small>
    </blockquote>
    <div class="well bs-component">
      {{ Form::open(array('class' => 'form-horizontal')) }}
        <fieldset>
          <h3><i class="glyphicon glyphicon-envelope"></i> Kritik &amp; Saran</h3>
          <hr/>
          <div class="form-group">
            {{ Form::label('nama', 'Nama', array('class' => 'col-lg-3 control-label')) }}
            <div class="col-lg-9">
              {{ Form::text('nama', null, array('class' => 'form-control', 'placeholder' => 'Tuliskan Nama Anda')) }}
            </div>
          </div>
          <div class="form-group">
            {{ Form::label('email', 'Email', array('class' => 'col-lg-3 control-label')) }}
            <div class="col-lg-9">
              {{ Form::text('email', null, array('class' => 'form-control', 'placeholder' => 'Email Anda')) }}
            </div>
          </div>
          <div class="form-group">
            {{ Form::label('komentar', 'Komentar', array('class' => 'col-lg-3 control-label')) }}
            <div class="col-lg-9">
              {{ Form::textarea('komentar', null, array('rows' => '5', 'class' => 'form-control', 'placeholder' => 'Suarakan Komentar Anda')) }}
            </div>
          </div>
          
          <div class="form-group">
            <div class="col-lg-9 col-lg-offset-3">
              <button type="submit" class="btn btn-primary">Kirim</button>
            </div>
          </div>
        </fieldset>
      {{ Form::close() }}
    </div>
  </div>
  <div class="col-lg-5">
      <div class="panel panel-primary">
        <div class="panel-heading"><h4><i class="glyphicon glyphicon-tags"></i> Berita Terkini</h4></div>
        <div class="panel-body">
          <div class="list-group"> 
            @foreach($berita as $temp)
            <a href="{{ route('detail.berita', $temp->slug) }}" class="list-group-item">
              <h4 class="list-group-item-heading">{{ $temp->judul }}</h4>
              <br/>
              <p class="list-group-item-text">
                <i class="glyphicon glyphicon-calendar"></i> {{ $temp->created_at->diffForHumans() }}
                <i class="glyphicon glyphicon-user"></i> {{ $temp->petugas->username }}
              </p>
            </a>
            @endforeach
            <div class="pull-right">
              {{ $berita->links() }}
            </div>
          </div>
        </div>
      </div>

  </div>
</div>
@stop