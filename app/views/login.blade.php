@extends('_tema.admin')

@section('konten')
<div id="cl-wrapper" class="login-container">
	<div class="middle-login">
		<div class="block-flat">
			<div class="header">							
				<h3 class="text-center">{{ HTML::image('packages/cleanzone/images/logo.png', 'Logo', array('class' => 'logo-img')) }}KPU Login System</h3>
			</div>
			<div>
				{{ Form::open(array('class' => 'form-horizontal', 'style' => 'margin-bottom: 0px !important;')) }}
					<div class="content">
						<h4 class="title">Masukkan Akun Anda :</h4>
						@if(Session::has('pesan'))
						<div class="alert alert-danger alert-white rounded">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							<div class="icon"><i class="fa fa-times-circle"></i></div>
							<strong>Perhatian!</strong> {{ Session::get('pesan') }}
						</div>
						@endif
						<div class="form-group {{ ($errors->has('username')) ? 'has-error' : '' }}">
							<div class="col-sm-12">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user"></i></span>
									{{ Form::text('username', null, array('class' => 'form-control', 'placeholder' => 'Username')) }}
								</div>
								@if ($errors->has('username'))
									<span class="help-block small text-center" style="margin-top:-10px;">{{ $errors->first('username') }}</span>
								@endif
							</div>
						</div>
						<div class="form-group {{ ($errors->has('password')) ? 'has-error' : '' }}">
							<div class="col-sm-12">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock"></i></span>
									{{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password')) }}
								</div>
								@if ($errors->has('password'))
									<span class="help-block small text-center" style="margin-top:-10px;">{{ $errors->first('password') }}</span>
								@endif
							</div>
						</div>
					</div>
					<div class="foot">
						{{ Form::submit('Masuk', array('class' => 'btn btn-primary')) }}	
					</div>
				{{ Form::close() }}
			</div>
		</div>
		<div class="text-center out-links"><a href="http://novay.web.id/">&copy; 2014 KPU Kota Samarinda. Hak Cipta Dilindungi Undang-undang.
	</div> 	
</div>
@stop