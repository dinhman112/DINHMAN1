@extends('layoutAdmin.home')
@section('contents')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Checkout Cart</h1>
		</div>
	</div><!--/.row-->
	<div class="row">
		<div class="col-xs-12 col-md-12 col-lg-12">
			
			<div class="panel panel-primary">
				<div class="panel-heading">Comfirm Cart</div>
				@if (session('success'))
					<p class="alert alert-success text-center">{{session('success')}}</p>
				@endif
				<div class="panel-body">
					<form action="{{ route('admin.cart.cartcheckout', ['id'=> $getone->id]) }}" method="post" enctype="multipart/form-data">
						<div class="row" style="margin-bottom:40px">
							<div class="col-xs-8">
								@csrf
								<div class="form-group" >
									<label>Tên sản phẩm</label>
									<input type="text" name="name" value="{{$getone->name_prd}}" class="form-control">
								</div>
								<div class="form-group" >
									<label>Giá sản phẩm</label>
									<input type="number" name="price" value="{{$getone->price_prd}}" class="form-control">
								</div>
								<div class="form-group" >
									<label>Tổng Giá Sản Phẩm</label>
									<input type="number" name="totalprice" value="{{$getone->total_prd}}" class="form-control">
								</div>
								<div class="form-group" >
									<label>Ảnh sản phẩm</label>
									<img id="avatar" class="thumbnail" style="width: 100px; height: 100px;" src="{{asset('storage/images/'.$getone->img_prd)}}">
								</div>
								<div class="form-group" >
									<label>Trạng Thái</label>
									{{-- {{dd($getoneprd->cateid)}} --}}
									<select name="status" class="form-control">
                                        @if (isset($getone->status) && $getone->status == 1)
										    <option value="{{$getone->status}}"> {{$getone->status==1? 'Đã Xác Thực': false}}</option>
                                        @else
										<option value="0">{{$getone->status==0? 'Chưa Xác Thực': false}}</option>
										<option value="1"> {{$getone->status==0? 'Đã Xác Thực': false}}</option>
                                        @endif
									</select>
								</div>
								<button type="submit" class="btn btn-primary">Confirm</button>
								<a href="{{ route('admin.cart.home') }}" class="btn btn-danger">Hủy bỏ</a>
							</div>
						</div>
					</form>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div><!--/.row-->
</div>
@endsection

