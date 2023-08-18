<!-- header -->
<header id="header">
    <div class="container">
        <div class="row">
            <div id="logo" class="col-md-3 col-sm-12 col-xs-12">
                <h1>
                    <a href="{{ route('home.home') }}"><img style="width: 100%; height:80px" src="{{ asset('asset/frontend/img/home/logo.png') }}"></a>						
                    <nav><a id="pull" class="btn btn-danger" href="#">
                        <i class="fa fa-bars"></i>
                    </a></nav>	
                </h1>
            </div>
            <div id="search" class="col-md-7 col-sm-12 col-xs-12">
              <form class="input-group mb-2" action="{{ route('home.findProduct') }}" method="post">
                @csrf
                <input class="form-control" type="search" placeholder="@if($errors->any())@error('keyfind'){{$message}} @enderror @else Nhập từ khóa ...@endif" name="keyfind">
                {{-- <button class="btn btn-primary" type="submit">Tiềm Kiếm</button> --}}
                <input style="height: 42px; cursor: pointer; " type="submit" name="submit" value="Tìm Kiếm">    
              </form>
            </div>
            {{-- @foreach ($users as $item)
                {{dd($item)}}
            @endforeach --}}
            <div  id="cart" class="before col-md-2 col-sm-12 col-xs-12">
                <a style="margin-left: 115px; padding: 5px; " href="{{ route('home.cart.carthome') }}">{{$quanity}}</a>
            </div>
            <a href="{{ route('logout') }}">Logout: {{Auth::user()->name}}</a>	
        </div>			
    </div>
</header>