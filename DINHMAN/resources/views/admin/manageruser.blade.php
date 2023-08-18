@extends('layoutAdmin.home')	
@section('contents')
@section('title')
	Product
@endsection
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Manager User</h1>
		</div>
	</div><!--/.row-->
	
	<div class="row">
		<div class="col-xs-12 col-md-12 col-lg-12">
			<div class="panel panel-primary">
				<div class="panel-heading">Danh sách User</div>
				@if (session('mess'))
					
				@endif
				<div class="panel-body">
					<div class="bootstrap-table">
						<div class="table-responsive">
							<table class="table table-bordered" style="margin-top:20px;">				
								<thead>
									<tr class="bg-primary">
										<th>ID</th>
										<th width="30%">Name</th>
										<th>Email</th>
										<th width="20%">Pass</th>
										<th>Tùy chọn</th>
									</tr>
								</thead>
								<tbody>
									@php
										$stt = 1;
									@endphp
									@if (isset($users))
										@foreach ($users as $item)
											<tr>
												<td>{{$stt++}}</td>
												<td>{{$item->name}}</td>
												<td>
													{{$item->email}}
												</td>
												<td><p width="15%">{{$item->password}}</p></td>
												<td>
													<a href="{{ route('admin.user.post', ['id'=>$item->id]) }}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</a>
													<a  onclick="return confirm('Bạn có chắc chắn muốn xóa?')"  href="{{ route('admin.user.delete', ['id'=>$item->id]) }}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
												</td>
											</tr>
										@endforeach
									@endif
								</tbody>
							</table>	
							@if (isset($users))
								{{$users->links('pagination::bootstrap-5')}}
							@endif					
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div><!--/.row-->
</div>	<!--/.main-->
@endsection