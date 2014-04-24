
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>KPU Provinsi Samarinda</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{ HTML::style('aset/css/bootstrap.css') }}
    {{ HTML::style('aset/css/bootswatch.min.css') }}
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      {{ HTML::script('aset/js/html5shiv.js') }}
      {{ HTML::script('aset/js/respond.min.js') }}
    <![endif]-->
  </head>
  <body>
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
          <ul class="nav navbar-nav">
            <li class="active"><a href="{{ route('index') }}"><i class="glyphicon glyphicon-home"></i></a></li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes">KPU <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="{{ route('sejarah') }}">Sejarah</a></li>
                <li><a href="{{ route('visimisi') }}">Visi &amp; Misi</a></li>
                <li><a href="{{ route('struktur') }}">Struktur Organisasi &amp; Tugas</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes">Sekilas Pemilu <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="{{ route('partai') }}">Partai</a></li>
                <li><a href="{{ route('pemilu') }}">Hasil Akhir Pemilu</a></li>
              </ul>
            </li>
            <li>
              <a href="{{ route('unduhan') }}">Pemutakhiran Data</a>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="{{ route('admin') }}"><i class="glyphicon glyphicon-user"></i></a></li>
          </ul>
        </div>
      </div>
    </div>


    <div class="container">
      <div class="page-header" id="banner" style="margin: 25px 0 25px;">
        <div class="row">
          <div style="margin-top:-158px;transform:rotate(15deg);-moz-transform:rotate(15deg);-webkit-transform:rotate(-15deg);position:absolute;opacity:0.1;">
            <img src="{{asset('aset/kpu/logo.png')}}">
          </div>
          <div class="col-lg-12 text-right">
            <h1>{{ $instansi->nama }}</h1>
            <p class="lead" style="font-weight:100;line-height: 1;">
              {{ $instansi->slogan }}
            </p>
            <p style="margin-top: 0px;">
              <i class="glyphicon glyphicon-map-marker"></i> {{ $instansi->alamat }}
              <i class="glyphicon glyphicon-phone"></i> Telp : {{ $instansi->telp }} 
              <i class="glyphicon glyphicon-phone-alt"></i> Fax : {{ $instansi->fax }}
            </p>
          </div>
        </div>
      </div>

      @yield('konten')
      
      <hr/>
      <footer style="margin: 2em 0;">
        <div class="row">
          <div class="col-lg-12">
            <a href="#top" class="pull-right">Kembali <i class="glyphicon glyphicon-arrow-up"></i></a>
            <p>&copy; 2014 Hak Cipta dilindungi undang-undang.</p>
          </div>
        </div>
      </footer>
    </div>
    {{ HTML::script('aset/js/jquery-1.10.2.min.js') }}
    {{ HTML::script('aset/js/bootstrap.min.js') }}
    {{ HTML::script('aset/js/bootswatch.js') }}
  </body>
</html>
