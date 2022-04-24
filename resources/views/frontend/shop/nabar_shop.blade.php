<nav class="pc-sidebar ">
    <div class="navbar-wrapper">
        <div class="navbar-content">
            <ul class="pc-navbar">
                <li class="pc-item pc-hasmenu">
                    <a href="{{route('info-user')}}" class="pc-link "><span class="pc-micon"><i class="material-icons-two-tone">home</i></span><span class="pc-mtext">Dashboard</span></a>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a class="pc-link {{ Route::currentRouteName() == 'info-shop' ? 'active' : '' }}" href="{{route('info-shop')}}" class="pc-link "><span class="pc-micon"><i class="material-icons-two-tone">business_center</i></span><span class="pc-mtext">Hồ sơ cửa hàng</span></a>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link "><span class="pc-micon"><i class="material-icons-two-tone">business_center</i></span><span class="pc-mtext">Thể loại</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
                    <ul class="pc-submenu">
                        <li class="pc-item"><a class="pc-link {{ Route::currentRouteName() == 'category.create' ? 'active' : '' }}" href="{{route('category.create')}}">Tạo thể loại</a></li>
                        <li class="pc-item"><a class="pc-link {{ Route::currentRouteName() == 'category.index' ? 'active' : '' }}" href="{{ route('category.index') }}">Danh sách thể loại</a></li>
                    </ul>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link "><span class="pc-micon"><i class="material-icons-two-tone">business_center</i></span><span class="pc-mtext">Sản phẩm</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
                    <ul class="pc-submenu">
                        <li class="pc-item"><a class="pc-link {{ Route::currentRouteName() == 'product.create' ? 'active' : '' }}" href="{{route('product.create')}}">Tạo sản phẩm</a></li>
                        <li class="pc-item"><a class="pc-link {{ Route::currentRouteName() == 'product.index' ? 'active' : '' }}" href="{{ route('product.index') }}">Danh sách</a></li>
                    </ul>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link "><span class="pc-micon"><i class="material-icons-two-tone">business_center</i></span><span class="pc-mtext">Đơn hàng</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
                    <ul class="pc-submenu">
     
                        <li class="pc-item"><a class="pc-link {{ Route::currentRouteName() == 'order.index' ? 'active' : '' }}" href="{{ route('order.index') }}">Danh sách đơn hàng</a></li>
                    </ul>
                </li>
            
              

            </ul>
        </div>
    </div>
</nav>
