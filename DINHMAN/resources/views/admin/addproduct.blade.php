@extends('layoutAdmin.home')
@section('title')
	Add Product
@endsection
@section('contents')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Sản phẩm</h1>
		</div>
	</div><!--/.row-->
	
	<div class="row">
		<div class="col-xs-12 col-md-12 col-lg-12">
			@if (session('mess'))
			<p class="text-center alert-success text-center">{{session('mess')}}</p>
		@endif
			<div class="panel panel-primary">
				<div class="panel-heading">Thêm sản phẩm</div>
				@if ($errors->any())
					<p class="alert alert-danger text-danger text-center">Error ADD PRODUCT</p>
				@endif
				<div class="panel-body">
					<form method="post" action="{{ route('admin.product.add') }}" enctype="multipart/form-data">
						@csrf
						<div class="row" style="margin-bottom:40px">
							<div class="col-xs-8">
								<div class="form-group" >
									<label>Tên sản phẩm</label>
									<input  type="text" name="name" class="form-control" value="{{old('name')}}">
									@error('name')
										<span class="text-danger">{{$message}}</span>
									@enderror
								</div>
								<div class="form-group" >
									<label>Giá sản phẩm</label>
									<input  type="text" name="price" class="form-control" value="{{old('price')}}">
									@error('price')
										<span class="text-danger">{{$message}}</span>
									@enderror
								</div>
								<div class="form-group" >
									<label>Ảnh sản phẩm</label>
									<input  id="img" type="file" name="img" class="form-control " onchange="changeImg(this)" value="{{old('img')}}" >
									{{-- <img id="avatar" class="thumbnail" width="300px" src="img/new_seo-10-512.png"> --}}
									@error('img')
										<span class="text-danger">{{$message}}</span>
									@enderror
								</div>
								<div class="form-group" >
									<label>Phụ kiện</label>
									<input  type="text" name="accessories" class="form-control" value="{{old('accessories')}}">
									@error('accessories')
										<span class="text-danger">{{$message}}</span>
									@enderror
								</div>
								<div class="form-group" >
									<label>Bảo hành</label>
									<input  type="text" name="warranty" class="form-control" value="{{old('warranty')}}">
									@error('warranty')
										<span class="text-danger">{{$message}}</span>
									@enderror
								</div>
								<div class="form-group" >
									<label>Khuyến mãi</label>
									<input  type="text" name="promotion" class="form-control" value="{{old('promotion')}}">
									@error('promotion')
										<span class="text-danger">{{$message}}</span>
									@enderror
								</div>
								<div class="form-group" >
									<label>Tình trạng</label>
									<input  type="text" name="condition" class="form-control" value="{{old('condition')}}">
									@error('condition')
										<span class="text-danger">{{$message}}</span>
									@enderror
								</div>
								<div class="form-group" >
									<label>Trạng thái</label>
									<select  name="status" class="form-control">
										<option value="1">Còn hàng</option>
										<option value="0">Hết hàng</option>
									</select>
								</div>
								<div class="form-group" >
									<label>Miêu tả</label>
									<textarea  name="description" class ="ckeditor"> {{old('description')}}</textarea>
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
										{{-- {{dd($list->all())}} --}}
									<select  name="cate" class="form-control">
										@if (!empty($listcate))
											@foreach ($listcate as $item)
												<option value="{{$item->id}}">{{$item->name_category}}</option>
											@endforeach
										@endif
									</select>
								</div>
								<div class="form-group" >
									<label>Sản phẩm nổi bật</label><br>
									Có: <input type="radio" name="featured" value="1">
									Không: <input type="radio" checked name="featured" value="0">
								</div>
								<input type="submit" name="submit" value="Add" class="btn btn-primary">
								<a href="{{ route('admin.product') }}" class="btn btn-danger">Cancel</a>
							</div>
						</div>
					</form>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div><!--/.row-->
</div>	<!--/.main-->	
@endsection