<nav class="pc-sidebar ">
    <div class="navbar-wrapper">
        <div class="navbar-content">
            <ul class="pc-navbar">
                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link "><span class="pc-micon"><i class="material-icons-two-tone">business_center</i></span><span class="pc-mtext">Profile Shop</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>

                </li>
                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link "><span class="pc-micon"><i class="material-icons-two-tone">business_center</i></span><span class="pc-mtext">Category</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
                    <ul class="pc-submenu">
                        <li class="pc-item"><a class="pc-link {{ Route::currentRouteName() == 'category.create' ? 'active' : '' }}" href="{{route('category.create')}}">Create Category</a></li>
                        <li class="pc-item"><a class="pc-link {{ Route::currentRouteName() == 'category.index' ? 'active' : '' }}" href="{{ route('category.index') }}">List Category</a></li>
                    </ul>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link "><span class="pc-micon"><i class="material-icons-two-tone">business_center</i></span><span class="pc-mtext">Products</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
                    <ul class="pc-submenu">
                        <li class="pc-item"><a class="pc-link {{ Route::currentRouteName() == 'product.create' ? 'active' : '' }}" href="{{route('product.create')}}">Create Products</a></li>
                        <li class="pc-item"><a class="pc-link {{ Route::currentRouteName() == 'product.index' ? 'active' : '' }}" href="{{ route('product.index') }}">List Products</a></li>
                    </ul>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link "><span class="pc-micon"><i class="material-icons-two-tone">business_center</i></span><span class="pc-mtext">Orders</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
                    <ul class="pc-submenu">
     
                        <li class="pc-item"><a class="pc-link {{ Route::currentRouteName() == 'order.index' ? 'active' : '' }}" href="{{ route('order.index') }}">List Order</a></li>
                    </ul>
                </li>
            
              

            </ul>
        </div>
    </div>
</nav>
