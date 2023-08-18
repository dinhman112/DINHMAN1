<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Email</title>
</head>
<body>
	<section id="body">
		<div class="container">
				<div id="main" class="col-md-9">
					<!-- main -->
					<div id="wrap-inner">
						<div id="khach-hang">
							<h3>Thông tin khách hàng</h3>
							<p>
								{{-- {{dd($arrr)}} --}}
								<span class="info">Khách hàng: </span>
								{{$arrr[0]->name}}
							</p>
							<p>
								<span class="info">Email: </span>
								{{$arrr[0]->mail}}
							</p>
							<p>
								<span class="info">Điện thoại: </span>
								{{$arrr[0]->phone}}
							</p>
							<p>
								<span class="info">Địa chỉ: </span>
								{{$arrr[0]->address}}
							</p>
						</div>						
						<div id="hoa-don">
							<h3>Hóa đơn mua hàng</h3>							
							<table class="table-bordered table-responsive">
								<tr class="bold">
									<td width="30%">Tên sản phẩm</td>
									<td width="25%">Giá</td>
									<td width="20%">Số lượng</td>
									<td width="15%">Thành tiền</td>
								</tr>
								<tr>
									<td>{{$arrr[0]->name_prd}}</td>
									<td>{{$arrr[0]->price_prd}}</td>
									<td>{{$arrr[0]->quanity_prd}}</td>
									<td>{{$arrr[0]->total_prd}}</td>
								</tr>
								<tr>
									<td colspan="3">Tổng tiền:</td>
									<td class="total-price">{{$arrr[0]->total_prd}}</td>
								</tr>
							</table>
						</div>
						<div id="xac-nhan">
							<br>
							<p align="justify">
								<b>Quý khách đã đặt hàng thành công!</b><br />
								Sản phẩm của Quý khách sẽ được chuyển đến Địa chỉ có trong phần Thông tin Khách hàng của chúng Tôi sau thời gian 2 đến 3 ngày, tính từ thời điểm này.<br />
								Nhân viên giao hàng sẽ liên hệ với Quý khách qua Số Điện thoại trước khi giao hàng 24 tiếng.<br />
								<b><br />Cám ơn Quý khách đã sử dụng Sản phẩm của Công ty chúng Tôi!</b>
							</p>
						</div>
					</div>					
					<!-- end main -->
				</div>
			</div>
		</div>
	</section>
</body>
</html>