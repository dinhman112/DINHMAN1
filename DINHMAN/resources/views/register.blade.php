@extends('layout.loginlayout')
@section('title')
	Register
@endsection
@section('content')
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Register</div>
				@if($errors->all())
					<p class="alert alert-danger">Dang ki Khong thanh cong</p>
				@endif
				@if (session('mess'))
						<p class="alert alert-danger">{{session('mess')}}</p>
						@endif
				<div class="panel-body">
					<form action="{{ route('formRegister') }}" method="post" >
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Enter Name..." name="name" value="{{old('name')}}" type="text" autofocus="">
								@error('name')
								<p class="form-text text-danger">{{$message}}</p>
								@enderror
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Enter E-mail..." name="email" value="{{old('email')}}" type="text" autofocus="">
								@error('email')
								<p class="form-text text-danger">{{$message}}</p>
								@enderror
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Enter Password..." name="password" type="password" value="{{old('password')}}">
								@error('password')
								<p class="form-text text-danger">{{$message}}</p>
								@enderror
							</div>
							<div class="checkbox">
								<label>
									<input name="remember" type="checkbox" value="Remember Me">Remember Me
								</label>
							</div>
							<button type="submit" class="btn btn-primary">Register</button>
						</fieldset>
						@csrf
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
@endsection
