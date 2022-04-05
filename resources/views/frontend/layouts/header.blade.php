<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="{{ url('/') }}" class="logo">Food Store <em> Website</em></a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    @php
                $route=Route::getFacadeRoot()->current()->uri();
                echo $route;
            @endphp
                    <ul class="nav">
                        <li><a href="{{ url('/') }}"
                            @php if ($route == '/') { echo ('class="active"'); } @endphp >Home</a></li>
                        <li><a href="{{ url('products') }}"
                            @php if ($route == 'products/{id}') { echo ('class="active"'); } @endphp>Products</a></li>
                        {{-- <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                                aria-expanded="false">About</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="about.html">About Us</a>
                                <a class="dropdown-item" href="blog.html">Blog</a>
                                <a class="dropdown-item" href="testimonials.html">Testimonials</a>
                                <a class="dropdown-item" href="terms.html">Terms</a>
                            </div>
                        </li> --}}
                        <li>
                            <ul class="nav-right">
                                <li class="cart-icon" style="padding: 0px"><a href="{{url('cart')}}"
                                    @php if ($route == 'cart') { echo ('class="active"'); } @endphp>
                                        {{-- <i class="icon_bag_alt"></i> --}}
                                        <i class="fas fa-shopping-cart" style="margin-top:12px"></i>
                                        <span style="margin-top:12px">3</span>
                                    </a>
                                    <div class="cart-hover">
                                        <div class="select-items">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td class="si-pic"><img
                                                                src="{{ asset('frontend/assets/images/select-product-1.jpg') }}"
                                                                alt=""></td>
                                                        <td class="si-text">
                                                            <div class="product-selected">
                                                                <p>₫60.00 x 1</p>
                                                                <h6>Kabino Bedside Table</h6>
                                                            </div>
                                                        </td>
                                                        <td class="si-close">
                                                            <i class="ti-close"></i>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="si-pic"><img
                                                                src="{{ asset('frontend/assets/images/select-product-2.jpg') }}"
                                                                alt=""></td>
                                                        <td class="si-text">
                                                            <div class="product-selected">
                                                                <p>₫60.00 x 1</p>
                                                                <h6>Kabino Bedside Table</h6>
                                                            </div>
                                                        </td>
                                                        <td class="si-close">
                                                            <i class="ti-close"></i>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="select-total">
                                            <span>total:</span>
                                            <h5>₫120.00</h5>
                                        </div>
                                        <div class="select-button">
                                            <a href="{{url('cart')}}" class="primary-btn view-card">VIEW CARD</a>
                                            <a href="{{url('checkout')}}" class="primary-btn checkout-btn">CHECK OUT</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        @if (Route::has('login'))
                            @auth
                                @if (Auth::user()->utype == 'ADM')

                                    <li class="menu-item menu-item-has-children parent">
                                        <a title="My account">My account ({{ Auth::user()->name }}) <i class="
                                             fa
                                        fa-angle-down"
                                            aria-hidden="true"></i></a>
                                    </li>
                                    {{-- <li class="menu-item menu-item-has-children parent">
                                        <a title="My account" >My account ({{ Auth::user()->name }}) <i class="
                                             fa
                                        fa-angle-down"
                                            aria-hidden="true"></i></a>
                                    </li> --}}
                                @else
                                    <li><a title="My account"
                                            href="{{ route('info-user') }}"  @php if ($route == 'info-user') echo ('class="text-sm text-gray-700 underline active"'); else echo ('class="text-sm text-gray-700 underline"'); @endphp>
                                            {{ Auth::user()->name }}</a></li>
                                    <li>
                                    <form method="get" action="{{ route('member-logout') }}">
                                        @csrf

                                        <a title="Logout" class="text-sm text-gray-700 underline" type="button"
                                                onclick="event.preventDefault();
                                            this.closest('form').submit();">{{ __('Logout') }}</a>


                                    </form>
                                    </li>
                                @endif
                            @else
                                <li><a href="{{ route('member-login') }}" @php if ($route == 'member-login') echo ('class="text-sm text-gray-700 underline active"'); else echo ('class="text-sm text-gray-700 underline"'); @endphp>Login</a></li>
                                {{-- <li> <a href="{{ route('member-register') }}" class="text-sm text-gray-700 underline">Register</a> --}}
                                </li>
                            @endif
                        @endif
                        </li>
                    </ul>
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                </nav>

            </div>
        </div>
        </div>
    </header>
