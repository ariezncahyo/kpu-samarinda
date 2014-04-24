<!-- Fixed navbar -->
<div id="head-nav" class="navbar navbar-default navbar-fixed-top" style="background-color: #212525;">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="fa fa-gear"></span>
			</button>
			<a class="navbar-brand" href="{{ route('admin') }}"><span>KPU Admin</span></a>
		</div>
		<div class="navbar-collapse collapse">
			@if(Auth::user()->id_hak_akses == 1)
			<ul class="nav navbar-nav">
				<li><a href="{{ route('admin') }}"><i class="fa fa-home"></i></a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Data Master <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="{{ route('admin.kecamatan.index') }}">Kecamatan</a></li>
						<li><a href="{{ route('admin.kelurahan.index') }}">Kelurahan</a></li>
						<li><a href="{{ route('admin.petugas.index') }}">Data Petugas</a></li>  
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Modul <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="{{ route('admin.berita.index') }}">Berita</a></li>
						<li class="divider"></li>   
						<li><a href="{{ route('admin.partai.index') }}">Partai</a></li>
						<li><a href="{{ route('admin.unduhan.index') }}">Unduhan</a></li>            
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Profil KPU <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="{{ route('admin.sejarah') }}">Sejarah</a></li>
						<li><a href="{{ route('admin.visimisi') }}">Visi &amp; Misi</a></li>
						<li><a href="{{ route('admin.struktur') }}">Struktur Organisasi</a></li>            
						<li><a href="{{ route('admin.tugas') }}">Tugas-Tugas</a></li>            
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Keabsahan <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="{{ route('sah.kecamatan') }}">Sah Kecamatan</a></li>
						<li><a href="{{ route('sah.kelurahan') }}">Sah Kelurahan</a></li>     
					</ul>
				</li>
			</ul>
			@elseif(Auth::user()->id_hak_akses == 2)
			<ul class="nav navbar-nav">
				<li><a href="{{ route('admin') }}"><i class="fa fa-home"></i></a></li>
				<li><a href="{{ route('sah.kelurahan') }}">Data Kelurahan</a></li>
				<li><a href="{{ route('admin.berita.index') }}">Buat Berita</a></li>
				<li><a href="{{ route('admin.unduhan.index') }}">Unduhan</a></li>
			</ul>
			@else
			<ul class="nav navbar-nav">
				<li><a href="{{ route('admin') }}"><i class="fa fa-home"></i></a></li>
				<li><a href="{{ route('admin.tps.index') }}">Data TPS</a></li>
				<li><a href="{{ route('admin.berita.index') }}">Buat Berita</a></li>
				<li><a href="{{ route('admin.unduhan.index') }}">Unduhan</a></li>
			</ul>
			@endif
			<ul class="nav navbar-nav navbar-right user-nav">
				<li class="dropdown profile_menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<img alt="Avatar" src="{{asset('aset/img/logo.png')}}" class="img-responsive" style="width:25px;float:left" />
						<b class="caret"></b>
					</a>
					@if(Auth::user()->id_hak_akses == 1)
					<ul class="dropdown-menu">
						<li><a href="{{ route('admin.akun') }}"><i class="fa fa-user"></i> Akun</a></li>
						<li><a href="{{ route('admin.instansi') }}"><i class="fa fa-cogs"></i> Pengaturan</a></li>
						<li class="divider"></li>
						<li><a href="{{ route('keluar') }}">Keluar <i class="fa fa-sign-out"></i></a></li>
					</ul>
					@else
					<ul class="dropdown-menu">
						<li><a href="{{ route('admin.akun') }}"><i class="fa fa-user"></i> Akun</a></li>
						<li class="divider"></li>
						<li><a href="{{ route('keluar') }}">Keluar <i class="fa fa-sign-out"></i></a></li>
					</ul>
					@endif
				</li>
			</ul>			

		</div><!--/.nav-collapse -->
	</div>
</div>
