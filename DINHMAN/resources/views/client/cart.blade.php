@extends('layoutClient.home')
<!-- main -->
	@section('content')
	<section id="body">
		<div class="container">
			<div class="row">
				<div id="main" class="col-md-12">
					<div id="wrap-inner">
						<div id="list-cart">
							<h3>Giỏ hàng</h3>
							@if (session('success'))
								<h6 class="alert alert-success text-center text-success">{{session('success')}}</h6>
							@endif 	
							<form method="POST" action="{{route('home.cart.updatecart')}}" class="ajax-content">
								
								<table class="table table-bordered .table-responsive text-center">
									@if (isset($cart) && $cart->count()>0)
									<tr class="active">
										<td width="11.111%">Ảnh</td>
										<td width="22.222%">Tên sản phẩm</td>
										<td width="22.222%">Số lượng</td>
										<td width="16.6665%">Đơn giá</td>
										<td width="16.6665%">Thành tiền</td>
										<td width="11.112%">Xóa</td>
									</tr>
										@foreach ($cart as $item)
											<tr>
												@csrf
												<input type="hidden" name="hiden_id" value="{{$item->id}}">
												{{-- {{dd($item->attributes['img'])}} --}}
												<td><img style="width: 100px; height: 100px;" class="img-responsive" src="{{ asset('storage/images/'.$item->attributes['img']) }}"></td>
												<td>{{$item->name}}</td>
												<td>
													<div class="form-group">
														<input class="form-control quantity" name="quantity" type="number" value="{{$item->quantity}}">
													</div>
												</td>
												
												<td><span class="price">{{$item->price}} đ</span></td>
												<td><span id="intoprice" class="price">{{$item->getPriceSum()}}</span>đ</td>
												<td><a href="{{ route('home.cart.deletecart', ['id'=>$item->id]) }}">Xóa</a></td>
											</tr>
										@endforeach
								</table>
									@else
									 <p class="alert-warnig">Giỏ Hàng Không Sản Phẩm Nào!</p>
									@endif

									@if (isset($cart) && ($cart->count())>0)
									<div class="row" id="total-price">
										<div class="col-md-6 col-sm-12 col-xs-12">										
											Tổng thanh toán: <span class="total-price">{{number_format($total, 2)}} VND</span>																
									</div>
									<div class="col-md-6 col-sm-12 col-xs-12">
										<a href="{{ route('home.home') }}" class="my-btn btn">Mua tiếp</a>
										<button type="submit"  class="my-btn btn updatecart">Cập nhật</button>
										<a href="{{ route('home.cart.deletecartALL') }}" class="my-btn btn">Xóa giỏ hàng</a>
									</div>
									@endif
									<a href="{{ route('home.cart.sendmail') }}" class="my-btn btn">Xem trạng thái đơn hàng</a>
								</div>
							</form>             	                	
						</div>

						<div id="xac-nhan">
							<h3>Xác nhận mua hàng</h3>
							@if (session('error'))
								<p class="alert text-center alert-danger">{{session('error')}}</p>
							@endif
							<form method="POST" action="{{ route('home.cart.sendmail')}}" >
								@if (isset($cart) && ($cart->count())>0)
										@foreach ($cart as $item)
										{{-- {{dd($item->price)}} --}}
											<tr>
												<input type="hidden" name="hiden_id_prd" value="{{$item->id}}"/>
												<input type="hidden" name="img_prd" value="{{ $item->attributes['img']}}"/>
												<input type="hidden" name="name_prd" value="{{$item->name}}"/>
												<input type="hidden" name="quantity" value="{{$item->quantity}}"/>
												
												<input type="hidden" name="price_prd" value="{{$item->price}}"/>
												<input type="hidden" name="total_price" value="{{$item->getPriceSum()}}"/>
											</tr>
										@endforeach
									@endif
								@csrf
								<div class="form-group">
									<label for="email">Email address:</label>
									<input type="text" class="form-control" id="email" value="{{isset($users)?$users->email:''}}" name="email">
									@error('email')
										<span class="text-danger">{{$message}}</span>
									@enderror
								</div>
								<div class="form-group">
									<label for="name">Họ và tên:</label>
									<input type="text" class="form-control" id="name" value="{{isset($users)?$users->name:''}}" name="name">
									@error('name')
										<span class="text-danger">{{$message}}</span>
									@enderror
								</div>
								<div class="form-group">
									<label for="phone">Số điện thoại:</label>
									<input type="text" class="form-control" id="phone" name="phone" value="{{old('phone')}}" >
									@error('phone')
										<span class="text-danger">{{$message}}</span>
									@enderror
								</div>
								<div class="form-group">
									<label for="address">Địa chỉ:</label>
									<input type="text"  class="form-control" id="add" name="address" value="{{old('address')}}">
									@error('address')
										<span class="text-danger">{{$message}}</span>
									@enderror
								</div>
								<div class="form-group text-right">
									<button type="submit" class="btn btn-default">Thực hiện đơn hàng</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	@endsection
	<!-- endmain -->