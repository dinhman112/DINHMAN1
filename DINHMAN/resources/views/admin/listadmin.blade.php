@extends('layoutAdmin.home')
@section('contents')
<div class="container">
    <div class="row">
    	<div class="col-sm-12">
        	<div class="alert alert-success">Added user success!</div>
        	<table class="table table-striped">
            	<tr id="tbl-first-row">
                	<td width="5%">#</td>
                    <td width="30%">Fullname</td>
                    <td width="25%">Username</td>
                    <td width="25%">Email</td>
                    <td width="5%">Level</td>
                    <td width="5%">Edit</td>
                    <td width="5%">Delete</td>
                </tr>
                <tr>
                	<td>1</td>
                    <td>Nguyễn Văn A</td>
                    <td>nguyenvana</td>
                    <td>nguyenvana@gmail.com</td>
                    <td>2</td>
                    <td><a href="#">Edit</a></td>
                    <td><a href="#">Delete</a></td>
                </tr>
                <tr>
                	<td>2</td>
                    <td>Lê Thị B</td>
                    <td>lethib</td>
                    <td>lethib@gmail.com</td>
                    <td>2</td>
                    <td><a href="#">Edit</a></td>
                    <td><a href="#">Delete</a></td>
                </tr>
                <tr>
                	<td>3</td>
                    <td>Nguyễn Văn A</td>
                    <td>nguyenvana</td>
                    <td>nguyenvana@gmail.com</td>
                    <td>2</td>
                    <td><a href="#">Edit</a></td>
                    <td><a href="#">Delete</a></td>
                </tr>
                <tr>
                	<td>4</td>
                    <td>Lê Thị B</td>
                    <td>lethib</td>
                    <td>lethib@gmail.com</td>
                    <td>2</td>
                    <td><a href="#">Edit</a></td>
                    <td><a href="#">Delete</a></td>
                </tr>
                <tr>
                	<td>5</td>
                    <td>Nguyễn Văn A</td>
                    <td>nguyenvana</td>
                    <td>nguyenvana@gmail.com</td>
                    <td>2</td>
                    <td><a href="#">Edit</a></td>
                    <td><a href="#">Delete</a></td>
                </tr>
                <tr>
                	<td>6</td>
                    <td>Lê Thị B</td>
                    <td>lethib</td>
                    <td>lethib@gmail.com</td>
                    <td>2</td>
                    <td><a href="#">Edit</a></td>
                    <td><a href="#">Delete</a></td>
                </tr>
			</table>
            <div aria-label="Page navigation">
            	<ul class="pagination">
                	<li>
                    	<a aria-label="Previous" href="#">
                        	<span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">6</a></li>
                    <li>
                    	<a href="#" aria-label="Next">
        					<span aria-hidden="true">&raquo;</span>
      					</a>
      				</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

