@extends('layoutAdmin.home')

@section('title')
	Category
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
					<div class="panel-heading">
						Thêm danh mục
					</div>
					<form action="{{ route('admin.category.add') }}" method="post">
						<div class="panel-body">
							<div class="form-group">
								<label>Tên danh mục:</label>
								<input type="text" name="name" class="form-control" placeholder="Tên danh mục...">
								@error('name')
								<span class="text-danger">{{$message}}</span>
								@enderror
							</div>
							<div class="form-group">
								<button class="btn btn-primary" type="submit">Add</button>
								<button class="btn btn-danger" type="reset">Refresh Name</button>
							</div>
						</div>
						@csrf
					</form>
				</div>
		</div>
		<div class="col-xs-12 col-md-7 col-lg-7">
			<div class="panel panel-primary">
				<div class="panel-heading">Danh sách danh mục</div>
				@if (session('mes'))
					<p class="alert alert-success">{{session('mes')}}</p>
				@endif
				<div class="panel-body">
					<div class="bootstrap-table">
						<table class="table table-bordered">
							  <thead>
								<tr class="bg-primary">
								  <th>Tên danh mục</th>
								  <th style="width:30%">Tùy chọn</th>
								</tr>
							  </thead>
							  {{-- table body --}}
							  <tbody>							  
								@foreach ($list as $item)
									<tr>
										<td>{{$item->name_category}}</td>
										<td>
											<a href="{{ route('admin.category.edit', ['id'=>$item->id]) }}" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Sửa</a>
											<a href="{{ route('admin.category.delete', ['id'=>$item->id]) }}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Xóa</a>
										</td>
									</tr>
								@endforeach
							  </tbody>
						</table>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div><!--/.row-->
</div>	<!--/.main-->


@endsection