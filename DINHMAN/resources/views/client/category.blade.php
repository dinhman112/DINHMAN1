@extends('layoutCLient.home')
	<!-- main -->
	@section('content')
				<div id="main" class="col-md-9">
					<div id="slider">
						<div id="demo" class="carousel slide" data-ride="carousel">
			
							<!-- Indicators -->
							<ul class="carousel-indicators">
								<li data-target="#demo" data-slide-to="0" class="active"></li>
								<li data-target="#demo" data-slide-to="1"></li>
								<li data-target="#demo" data-slide-to="2"></li>
							</ul>
			
							<div class="carousel-inner">
								<div class="carousel-item active">
									<img src="{{ asset('asset/frontend/img/home/slide-1.png') }}" alt="Los Angeles" >
								</div>
								<div class="carousel-item">
									<img src="{{ asset('asset/frontend/img/home/slide-2.png') }}" alt="Chicago">
								</div>
								<div class="carousel-item">
									<img src="{{ asset('asset/frontend/img/home/slide-3.png') }}" alt="New York" >
								</div>
							</div>
			
							<!-- Left and right controls -->
							<a class="carousel-control-prev" href="#demo" data-slide="prev">
								<span class="carousel-control-prev-icon"></span>
							</a>
							<a class="carousel-control-next" href="#demo" data-slide="next">
								<span class="carousel-control-next-icon"></span>
							</a>
						</div>
					</div>
			

					<div id="wrap-inner">
						<div class="products">
							<h3>{{isset($cates[0]->name_category) ? $cates[0]->name_category : 'Danh muc nay khong ton tai san pham' }}</h3>           	                	
							<div class="product-list row">
								@if (isset($cates))
									@foreach ($cates as $item)
											<div class="product-item col-md-3 col-sm-6 col-xs-12">
												<a href="#"><img style="width: 100%; height: 180px; object-fit: contain;"	 src="{{ asset('storage/images/'.$item->img) }}" class="img-thumbnail"></a>
												<p><a href="#">{{$item->name_product}}</a></p>
												<p class="price">{{$item->price}}</p>	  
												<div class="marsk">
													<a href="{{ route('home.details', ['id'=>$item->id]) }}">Xem chi tiết</a>
												</div>                                    
											</div>
									@endforeach
								@endif
							</div>  
						</div>
					</div>
					{{$cates->links('pagination::bootstrap-5')}}

					
					<!-- end main -->
				</div>
	@endsection
	<!-- endmain -->