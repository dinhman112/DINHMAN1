<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>@yield('title')</title>
	<link href="{{ asset('asset/backend/css/styles.css') }}" rel="stylesheet">
	<link href="{{ asset('asset/backend/css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<style>
	.customer{
		display: flex;
		list-style: none;
		gap: 32px;
	}
</style>
<body>
	<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
		<ul class="customer">
			<li><a href="{{route('login')}}">Login</a></li>|
			<li><a href="{{ route('formRegister') }}">Register</a></li>	
		</ul>
	</div> 
        @yield('content')
    </div>
</body>
</html>