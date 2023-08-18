@extends('layoutCLient.home')
	<!-- main -->
	@section('content')
				<div id="main" class="col-md-9"> 	
					<div id="wrap-inner">
						@foreach ($oneproduct as $item)
						<div id="product-info">
							<div class="clearfix"></div>
							@if (session('successcart'))
								<h6 class="alert alert-success text-success text-center">{{session('successcart')}}</h6>
							@endif
							<h3>{{$item->name_product}}</h3>
							<div class="row">
								<div id="product-img" class="col-xs-12 col-sm-12 col-md-3 text-center">
									<img style="width: 100%; min-height: 250px; object-fit: contain;" src="{{ asset('storage/images/'.$item->img) }}">
								</div>
								<div id="product-details" class="col-xs-12 col-sm-12 col-md-9">
									<p>Giá: <span class="price">{{$item->price}}</span></p>
									<p>Bảo hành: {{$item->warranty}}</p> 
									<p>Phụ kiện: {{$item->accessories}}</p>
									<p>Tình trạng: {{$item->condition}}</p>
									<p>Khuyến mại: {{$item->promotion}}</p>
									<p>Còn hàng: {{$item->status == 1? 'Stocking': 'notStock'}}</p>
									<p class="add-cart text-center"><a href="{{ route('cart.addcart', ['id'=>$item->id]) }}">Add into Cart</a></p>
								</div>
							</div>							
						</div>
						<div id="product-detail">
							<h3>Chi tiết sản phẩm</h3>
							<p class="text-justify">{!!$item->description!!}</p>
						</div>
						@endforeach
						<div id="comment">
							<h3>Bình luận</h3>
							@if($errors->any())
								<p class="alert alert-danger text-center text-danger">Lỗi nhập sai hoặc nhập thiếu</p>
							@endif
							@if (session('mess'))
								<p class="alert alert-success text-center">{{session('mess')}}</p>
							@endif
							<div class="col-md-9 comment">
								{{-- {{dd($oneproduct)}} --}}
								<form method="post" action="{{ route('home.comment', ['id'=>$oneproduct[0]->id])}}">
									@csrf
									<div class="form-group">
										<label for="email">Email:</label>
										<input type="text" value="{{old('email')}}" class="form-control" id="email" name="email">
										@error('email')
										<p class="text-danger">{{$message}}</p>
										@enderror
									</div>
									<div class="form-group">
										<label for="name">Tên:</label>
										<input type="text" value="{{old('name')}}" class="form-control" id="name" name="name">
										@error('name')
										<p class="text-danger">{{$message}}</p>
										@enderror
									</div>
									<div class="form-group">
										<label for="cm">Bình luận:</label>
										<textarea rows="10" id="cm" class="form-control" name="comment">{{old('comment')}}</textarea>
										@error('comment')
											<p class="text-danger">{{$message}}</p>
										@enderror
									</div>
									<div class="form-group text-right">
										<button type="submit" class="btn btn-primary">Gửi</button>
									</div>
								</form>
							</div>
						</div>
						<div id="comment-list">
							@if (isset($displaycomment))
								@foreach ($displaycomment as $item)
									<ul>
										<li class="com-title">
											<h6>Name: {{$item->name}}</h6>
											<span>2017-19-01 10:00:00</span>	
										</li>
										<li class="com-details">
											{{$item->comments}}
										</li>
									</ul>
								@endforeach
							@endif
						</div>
					</div>					
				</div>					
					<!-- end main -->
	@endsection
	<!-- endmain -->