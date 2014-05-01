<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Informasi Umum -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="Noviyanto Rachmady">
		<link rel="shortcut icon" href="{{ asset('aset/img/favicon.ico') }}">
		<title>KPU Kota Samarinda</title>
		<!-- Koleksi CSS -->
		{{ HTML::style('packages/cleanzone/js/bootstrap/dist/css/bootstrap.css') }}
		{{ HTML::style('packages/cleanzone/fonts/font-awesome-4/css/font-awesome.min.css') }}
		<!-- Kustom CSS -->
		{{ HTML::style('packages/cleanzone/js/jquery.select2/select2.css') }}
		{{ HTML::style('packages/cleanzone/css/style.css') }}
		{{ HTML::style('aset/css/kpu.css') }}	
		@yield('style')
	</head>
	<body class="texture">

		@yield('konten')

		<!-- Koleksi JS -->
		{{ HTML::script('packages/cleanzone/js/jquery.js') }}
		{{ HTML::script('packages/cleanzone/js/jquery.ui/jquery-ui.js') }}
		{{ HTML::script('packages/cleanzone/js/bootstrap/dist/js/bootstrap.min.js') }}
		{{ HTML::script('packages/cleanzone/js/jquery.nanoscroller/jquery.nanoscroller.js') }}
		{{ HTML::script('packages/cleanzone/js/behaviour/general.js') }}
		{{ HTML::script('packages/cleanzone/js/jquery.nestable/jquery.nestable.js') }}
		{{ HTML::script('packages/cleanzone/js/bootstrap.switch/bootstrap-switch.min.js') }}
		{{ HTML::script('packages/cleanzone/js/bootstrap.datetimepicker/js/bootstrap-datetimepicker.min.js') }}
		{{ HTML::script('packages/cleanzone/js/jquery.select2/select2.min.js') }}
		{{ HTML::script('packages/cleanzone/js/bootstrap.slider/js/bootstrap-slider.js') }}
	
		@yield('script')
	</body>
</html>
