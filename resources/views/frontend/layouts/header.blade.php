<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="index" class="logo">Food Store <em> Website</em></a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li><a href="{{url('index')}}" class="active">Home</a></li>
                        <li><a href="{{url('products')}}">Products</a></li>
                        <li><a href="{{url('checkout')}}">Checkout</a></li>
                        <li>
                            <ul class="nav-right">
                                <li class="cart-icon"><a href="#">
                                        {{-- <i class="icon_bag_alt"></i> --}}
                                        <i class="fas fa-shopping-cart" style="margin-top:12px"></i>
                                        <span style="margin-top:12px">3</span>
                                    </a>
                                    <div class="cart-hover">
                                        <div class="select-items">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td class="si-pic"><img src="{{ asset('frontend/assets/images/select-product-1.jpg')}}"
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
                                                        <td class="si-pic"><img src="{{ asset('frontend/assets/images/select-product-2.jpg')}}"
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
                                            <a href="#" class="primary-btn view-card">VIEW CARD</a>
                                            <a href="#" class="primary-btn checkout-btn">CHECK OUT</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <?php
                                        $check = Auth::check();
                                        if(Auth::check()){
                            ?>
                            <li><a href="<?php echo e(route('member-logout')); ?>"><i class="fa fa-lock"></i><?php echo e(" Logout"); ?></a></li>
                             <?php

                                        }
                                        else {
                            ?>
                            <li><a href="<?php echo e(asset('member-login')); ?>"><i class="fa fa-lock"></i><?php echo e(" Login"); ?></a></li>
                            <?php

                                        }
                            ?>
                    </ul>
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>
