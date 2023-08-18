@extends('layoutAdmin.home')
@section('contents')
@section('title')
	Edit Product
@endsection
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Sản phẩm</h1>
		</div>
	</div><!--/.row-->
	<div class="row">
		<div class="col-xs-12 col-md-12 col-lg-12">
			
			<div class="panel panel-primary">
				<div class="panel-heading">Sửa sản phẩm</div>
				@if (session('mess'))
					<p class="alert alert-success text-center">{{session('mess')}}</p>
				@endif
				<div class="panel-body">
					<form action="{{ route('admin.product.post', ['id'=> ''.$getoneprd->id.'']) }}" method="post" enctype="multipart/form-data">
						<div class="row" style="margin-bottom:40px">
							<div class="col-xs-8">
								@csrf
								<div class="form-group" >
									<label>Tên sản phẩm</label>
									<input type="text" name="name" value="{{$getoneprd->name_product}}" class="form-control">
									@error('name')
										<span class="text-danger">{{$message}}</span>
									@enderror
								</div>
								<div class="form-group" >
									<label>Giá sản phẩm</label>
									<input type="number" name="price" value="{{$getoneprd->price}}" class="form-control">
									@error('price')
										<span class="text-danger">{{$message}}</span>
									@enderror
								</div>
								<div class="form-group" >
									<label>Ảnh sản phẩm</label>
									<input id="img" type="file" name="img" value="{{$getoneprd->img}}" class="form-control " onchange="changeImg(this)">
									<img id="avatar" class="thumbnail" style="width: 100px; height: 100px;" src="{{ asset('storage/images/'.$getoneprd->img) }}">
									@error('img')
										<span class="text-danger">{{$message}}</span>
									@enderror
								</div>
								<div class="form-group" >
									<label>Phụ kiện</label>
									<input type="text" name="accessories" value="{{$getoneprd->accessories}}" class="form-control">
									@error('accessories')
										<span class="text-danger">{{$message}}</span>
									@enderror
								</div>
								<div class="form-group" >
									<label>Bảo hành</label>
									<input type="text" name="warranty" value="{{$getoneprd->warranty}}" class="form-control">
									@error('warranty')
										<span class="text-danger">{{$message}}</span>
									@enderror
								</div>
								<div class="form-group" >
									<label>Khuyến mãi</label>
									<input type="text" name="promotion" value="{{$getoneprd->promotion}}" class="form-control">
									@error('promotion')
										<span class="text-danger">{{$message}}</span>
									@enderror
								</div>
								<div class="form-group" >
									<label>Tình trạng</label>
									<input type="text" name="condition" value="{{$getoneprd->condition}}" class="form-control">
									@error('condition')
										<span class="text-danger">{{$message}}</span>
									@enderror
								</div>
								<div class="form-group" >
									<label>Trạng thái</label>
									<select name="status" class="form-control">
										@error('status')
											<span class="text-danger">{{$message}}</span>
										@enderror
										<option value="1">Còn hàng</option>
										<option value="0">Hết hàng</option>
									</select>
								</div>
								<div class="form-group" >
									<label>Miêu tả</label>
									<textarea name="description" class="ckeditor">{{$getoneprd->description}}</textarea>
									@error('description')
										<span class="text-danger">{{$message}}</span>
									@enderror
									<script>
										let editor = CKEDITOR.replace('description', {
											filebrowerImageBrowseUrl:'../../asset/backend/ckfinder/ckfinder.html?Type=Images', 
											filebrowerFlashBrowseUrl:'../../asset/backend/ckfinder/ckfinder.html?Type=Flash', 
											filebrowerImageUploadUrl:'../../asset/backend/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images', 
											filebrowerFlashUploadUrl:'../../asset/backend/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash' ,});
										// online
										// ClassicEditor
											// 	.create( document.querySelector( '.description' ) )
											// 	.catch( error => {
											// 		console.error( error );
											// 	} );
									</script>
								</div>
								<div class="form-group" >
									<label>Danh mục</label>
									{{-- {{dd($getoneprd->cateid)}} --}}
									<select name="cate" class="form-control">
										<option value="{{$getoneprd->cateid}}">{{$getoneprd->name_category }}</option>
									</select>
									@error('cate')
										<span class="text-danger">{{$message}}</span>
									@enderror
								</div>
								<div class="form-group" >
									<label>Sản phẩm nổi bật</label><br>
									Có: <input type="radio" value="{{$getoneprd->featured}}" name="featured">
									Không: <input type="radio" value="{{$getoneprd->featured}}" checked name="featured">
								</div>
								<button type="submit" class="btn btn-primary">Update</button>
								<a href="{{ route('admin.product') }}" class="btn btn-danger">Hủy bỏ</a>
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