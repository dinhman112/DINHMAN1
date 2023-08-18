@extends('layoutAdmin.home')
@section('contents')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Cart</h1>
		</div>
	</div><!--/.row-->
	
	<div class="row">
		<div class="col-xs-12 col-md-12 col-lg-12">
			
			<div class="panel panel-primary">
				<div class="panel-heading">Danh sách Cart</div>
				@if (session('mess'))
					<p class="alert alert-success">{{session('mess')}}</p>
				@endif
				<div class="panel-body">
					<div class="bootstrap-table">
						<div class="table-responsive">
							{{-- <a href="{{ route('admin.product.add') }}" class="btn btn-primary">Thêm sản phẩm</a> --}}
							<table class="table table-bordered" style="margin-top:20px;">				
								<thead>
									<tr class="bg-primary">
										<th>ID</th>
										<th>Name</th>
										<th>Product</th>
										<th>Price</th>
										<th>Total</th>
										<th>Status</th>
										<th width="30%">Email</th>
										<th>Address</th>
										<th>Tùy chọn</th>
									</tr>
								</thead>
								<tbody>
									@php
										$stt = 1;
									@endphp
									@foreach ($cartadmin as $item)
										<tr>
											<td>{{$stt++}}</td>
											<td>{{$item->name}}</td>
											<td>{{$item->name_prd}}</td>
											<td>{{$item->price_prd}}</td>
											<td>{{$item->total_prd}}</td>
											<td>{{$item->status == 0 ? "Chưa Xác Thực": "Đã Xác Thực"}}</td>
											<td>{{$item->mail}}</td>
											<td><p width="15%">{!!$item->address!!}</p></td>
											<td>
												<a href="{{ route('admin.cart.cartcheckout', ['id'=>$item->id]) }}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Xác thực</a>
												<a  onclick="return confirm('Bạn có chắc chắn muốn xóa?')"  href="{{ route('admin.cart.delete', ['id'=>$item->id]) }}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
											</td>
										</tr>
									@endforeach
								</tbody>
							</table>							
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div><!--/.row-->
</div>	<!
@endsection