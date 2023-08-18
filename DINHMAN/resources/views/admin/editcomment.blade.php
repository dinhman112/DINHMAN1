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
				<div class="panel-heading">Edit Comment</div>
				@if (session('mess'))
					<p class="alert alert-success">{{session('mess')}}</p>
				@endif
				<div class="panel-body">
					<div class="col-md-9 comment">
						<form method="post" action="{{ route('admin.comment.edit', ['id'=>$displaycomentone->id])}}">
							@csrf
							<div class="form-group">
								<label for="email">Email:</label>
								<input type="text" value="{{$displaycomentone->email}}" class="form-control" id="email" name="email">
								@error('email')
								<p class="text-danger">{{$message}}</p>
								@enderror
							</div>
							<div class="form-group">
								<label for="name">Tên:</label>
								<input type="text" value="{{$displaycomentone->name}}" class="form-control" id="name" name="name">
								@error('name')
								<p class="text-danger">{{$message}}</p>
								@enderror
							</div>
							<div class="form-group">
								<label for="cm">Bình luận:</label>
								<textarea rows="10" id="cm" class="form-control" name="comment">{{$displaycomentone->comments}}</textarea>
								@error('comment')
									<p class="text-danger">{{$message}}</p>
								@enderror
							</div>
							<div class="form-group text-right">
								<button type="submit" class="btn btn-primary">Update</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div><!--/.row-->
</div>	<!--
@endsection