<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ route('admin.home') }}" style="line-height: 32px; font-size: 2rem; text-transform: uppercase; color: white; font-weight: 3rem;">DINHMAN</a>
            <ul class="user-menu">
                <li class="dropdown pull-right">
                    <button class="btn btn-secondary custom-link dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                     {{ (Auth::user()->email) }} 
                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                    </ul>
                  </li>
            </ul>
        </div>
    </div><!-- /.container-fluid -->
</nav>
<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <ul class="nav menu">
        <li role="presentation" class="divider"></li>
        <li class=""><a href="{{ route('admin.home') }}"><svg class=" glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Trang chủ</a></li>
        <li><a href="{{ route('admin.product') }}"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg> Sản phẩm</a></li>
        <li><a href="{{ route('admin.category') }}"><svg class="glyph stroked notepad "><use xlink:href="#stroked-notepad"/></svg> Danh mục</a></li>
        <li><a href="{{ route('admin.comment.home') }}"><svg class="glyph stroked notepad "><use xlink:href="#stroked-notepad"/></svg> Bình luận</a></li>
        <li><a href="{{ route('admin.cart.home') }}"><svg class="glyph stroked notepad "><use xlink:href="#stroked-notepad"/></svg> Cart</a></li>
        <li><a href="{{ route('admin.user') }}"><svg class="glyph stroked notepad "><use xlink:href="#stroked-notepad"/></svg> User</a></li>
        <li role="presentation" class="divider"></li>
    </ul>
    
</div>