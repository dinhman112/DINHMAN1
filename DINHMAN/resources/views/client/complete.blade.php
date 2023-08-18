	@extends('layoutCLient.home')
	<!-- main -->
	@section('content')
	<section id="body">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div id="wrap-inner">
						{{-- {{dd($viewcart->count())}}	 --}}
						@if(isset($viewcart) && ($viewcart->count()) > 0)
						<table class="border w-100 text-center">
							<thead>
								<tr>
									<th class="border w-30%">ID </th>
									<th class="border w-30%">Name</th>
									<th class="border w-30%">Price</th>
									<th class="border w-30%">Email</th>
									<th class="border w-30%">Product</th>
									<th class="border w-30%">Img</th>
									<th class="border w-30%">Status</th>
								</tr>
							</thead>
							<tbody>
							
									@foreach ($viewcart as $key=>$item)
									<tr>
										<td class="border w-30%">{{++$key}}</td>
										<td class="border w-30%">{{$item->name}}</td>
										<td class="border w-30%">{{$item->price_prd}}</td>
										<td class="border w-30%">{{$item->mail}}</td>
										<td class="border w-30%">{{$item->name_prd}}</td>
										<td class="border w-30%"><img style="width: 100px; height:100px;" src="{{ asset('storage/images/'.$item->img_prd) }}" alt=""></td>
										<td class="border w-30%">{{$item->status==1? 'Đơn hàng đã được xác thực': 'Đơn hàng chưa được xác thức!'}}</td>
									</tr>
									@endforeach
							</tbody>
						</table>
						@else
							<p class="text-warning text-center alert-warning">Bạn chưa có đơn hàng nào cả!</p>
						@endif 
					</div>
				</div>
			</div>
			<div class="row">
				<div id="main" class="col-md-12">
					{{-- {{dd($viewcart[0]->status)}} --}}
					@foreach($viewcart as $item)
						<input type="hidden" name="status" value="{{ $status = $item->status}}">
					@endforeach
					@if (isset($viewcart) && ($viewcart->count()) > 0 && ($status) == 0)
					<div id="wrap-inner">
						<div id="complete">
							<p class="info">Đơn hàng của quý khách đang được xác thức! Xin vui lòng chờ</p>
							
							<p>Hóa đơn mua hàng của Quý khách đã được chuyển đến Địa chỉ Email có trong phần Thông tin Khách hàng của chúng Tôi</p>
							<p>Sản phẩm của Quý khách sẽ được chuyển đến Địa có trong phần Thông tin Khách hàng của chúng Tôi sau thời gian 2 đến 3 ngày, tính từ thời điểm này.</p>
							<p>Nhân viên giao hàng sẽ liên hệ với Quý khách qua Số Điện thoại trước khi giao hàng 24 tiếng</p>
							<p>Trụ sở chính: B8A Võ Văn Dũng - Hoàng Cầu Đống Đa - Hà Nội</p>
							<p>Cám ơn Quý khách đã sử dụng Sản phẩm của Công ty chúng Tôi!</p>
						</div>
						<p class="text-right return"><a href="{{ route('home.home') }}">Quay lại trang chủ</a></p>
					</div>
					@elseif (isset($viewcart) && ($viewcart->count()) > 0 && ($status) == 1)
						<div id="complete">
							<p class="info">Đơn hàng của quý khách đã được xác thực</p>
							
							<p> Hóa đơn mua hàng của Quý khách đã được chuyển đến Địa chỉ Email có trong phần Thông tin Khách hàng của chúng Tôi</p>
							<p> Sản phẩm của Quý khách sẽ được chuyển đến Địa có trong phần Thông tin Khách hàng của chúng Tôi sau thời gian 2 đến 3 ngày, tính từ thời điểm này.</p>
							<p> Nhân viên giao hàng sẽ liên hệ với Quý khách qua Số Điện thoại trước khi giao hàng 24 tiếng</p>
							<p>Cám ơn Quý khách đã sử dụng Sản phẩm của Công ty chúng Tôi!</p>
						</div>
					@else 
					<p class="alert-warnig">Bạn Chưa mua Sản Phẩm Nào!</p>		
					@endif
					<!-- end main -->
				</div>
			</div>
		</div>
	</section>
	@endsection
	<!-- endmain -->