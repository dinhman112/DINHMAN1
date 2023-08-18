@extends('layoutAdmin.home')
@section('title')
	Edit Category
@endsection
@section('contents')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Danh mục sản phẩm</h1>
		</div>
	</div><!--/.row-->
	
	<div class="row">
		<div class="col-xs-12 col-md-5 col-lg-5">
				<div class="panel panel-primary">
					@if (session('mess'))
						<p class="alert alert-success">{{session('mess')}}</p>
					@endif
					<div class="panel-heading">
						Sửa danh mục
					</div>
					<div class="panel-body">
						<form action="{{ route('admin.category.post', ['id'=>$cateone->id]) }}" method="post">
							@csrf 
							<div class="form-group">
								<label>Tên danh mục:</label>
								<input type="text" name="name" class="form-control" placeholder="Tên danh mục..." value="{{$cateone->name_category}}">
								@error('name')
									<p class="text-danger">{{$message}}</p>
								@enderror
							</div>
							<button type="submit" class="btn btn-success">Update</button>
							<a href="{{ route('admin.category') }}" class="btn btn-danger">Cancel</a>
						</form>
					</div>
				</div>
		</div>
	</div><!--/.row-->
</div>	<!--/.main-->

@endsection