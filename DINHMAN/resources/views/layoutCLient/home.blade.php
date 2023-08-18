<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">	
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>DinhManshop - Home</title>
	
		<link rel="stylesheet" href="css/category.css">
	<link rel="stylesheet" href="{{ asset('asset/frontend/css/cart.css') }}">
	<link rel="stylesheet" href="{{ asset('asset/frontend/css/category.css') }}">
	<link rel="stylesheet" href="{{ asset('asset/frontend/css/complete.css') }}">
	<link rel="stylesheet" href="{{ asset('asset/frontend/css/details.css') }}">
	<link rel="stylesheet" href="{{ asset('asset/frontend/css/email.css') }}">
	<link rel="stylesheet" href="{{ asset('asset/frontend/css/search.css')}}">
	<link rel="stylesheet" href="{{ asset('asset/frontend/css/home.css') }}">
	<link rel="stylesheet" href="{{ asset('asset/frontend/css/bootstrap.min.css') }}">
	<script type="text/javascript" src="{{ asset('asset/frontend/js/jquery-3.2.1.min.js ') }}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
	<script type="text/javascript" src="{{ asset('asset/frontend/js/bootstrap.min.js') }}"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script type="text/javascript">
		$(function() {
			var pull        = $('#pull');
			menu        = $('nav ul');
			menuHeight  = menu.height();

			$(pull).on('click', function(e) {
				e.preventDefault();
				menu.slideToggle();
			});
		});

		$(window).resize(function(){
			var w = $(window).width();
			if(w > 320 && menu.is(':hidden')) {
				menu.removeAttr('style');
			}
		});
	</script>
</head>
<body>    
	@include('layoutCLient.header')	
	<section id="body">
		<div class="container">
			<div class="row">
				<div class="col-md-3" id="sidebar">
					<nav id="menu">
						<ul>
							<li class="menu-item">danh mục sản phẩm</li>
							@if (isset($list))
								@foreach ($list as $item)
									<li class="menu-item"><a href="{{ route('home.cate', ['id'=>$item->id]) }}" title="">{{$item->name_category}}</a></li>			
								@endforeach
							@endif
						</ul>
						<!-- <a href="#" id="pull">Danh mục</a> -->
					</nav>
				</div>
				@yield('content')
			</div>
		</div>
	</section>
	<!-- main -->
	
	<!-- endmain -->
    @include('layoutCLient.footer')
	@yield('script')
</body>
</html>