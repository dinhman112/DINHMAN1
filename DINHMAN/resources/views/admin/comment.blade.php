@extends('LayoutAdmin.home')
@section('contents')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Comment</h1>
		</div>
	</div><!--/.row-->
	
	<div class="row">
		<div class="col-xs-12 col-md-12 col-lg-12">
			
			<div class="panel panel-primary">
				<div class="panel-heading">Danh sách Comment</div>
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
										<th width="30%">Email</th>
										<th>Messages</th>
										<th>Tùy chọn</th>
									</tr>
								</thead>
								<tbody>
									@php
										$stt = 1;
									@endphp
									@foreach ($displaycoment as $item)
										<tr>
											<td>{{$stt++}}</td>
											<td>{{$item->name}}</td>
											<td>{{$item->email}}</td>
											<td><p width="15%">{!!$item->comments!!}</p></td>
											<td>
												<a href="{{ route('admin.comment.edit', ['id'=>$item->id]) }}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</a>
												<a  onclick="return confirm('Bạn có chắc chắn muốn xóa?')"  href="{{ route('admin.comment.delete', ['id'=>$item->id]) }}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
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
</div>	<!--
@endsection