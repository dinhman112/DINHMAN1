@extends('layoutAdmin.home')
@section('title')
	Edit User
@endsection
@section('contents')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Danh mục User</h1>
		</div>
	</div><!--/.row-->
	
	<div class="row">
		<div class="col-xs-12 col-md-5 col-lg-5">
				<div class="panel panel-primary">
					@if (session('mess'))
						<p class="alert alert-success">{{session('mess')}}</p>
					@endif
					<div class="panel-heading">
						Sửa User
					</div>
					<div class="panel-body">
						<form action="{{ route('admin.user.post', ['id'=> $users->id])}}" method="post">
							@csrf 
							<div class="form-group">
								<label>Name:</label>
								<input type="text" name="name" class="form-control" placeholder="Enter User..." value="{{$users->name}}">
								@error('name')
									<p class="text-danger">{{$message}}</p>
								@enderror
							</div>
							<div class="form-group">
								<label>Email:</label>
								<input type="text" name="email" class="form-control" placeholder="Enter Email..." value="{{$users->email}}">
								@error('email')
									<p class="text-danger">{{$message}}</p>
								@enderror
							</div>
							<div class="form-group">
								<label>Password:</label>
								<input type="password" name="password" class="form-control" placeholder="Enter Password Change..." value="">
								@error('password')
									<p class="text-danger">{{$message}}</p>
								@enderror
							</div>
							<button type="submit" class="btn btn-success">Update</button>
							<a href="{{ route('admin.user') }}" class="btn btn-danger">Cancel</a>
						</form>
					</div>
				</div>
		</div>
	</div><!--/.row-->
</div>	<!--/.main-->

@endsection