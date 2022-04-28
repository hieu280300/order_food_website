<header class="pc-header ">
    <div class="header-wrapper">
        <div class="mr-auto pc-mob-drp">
            <ul class="list-unstyled">
                <li class="dropdown pc-h-item">
                    <a class="pc-head-link dropdown-toggle arrow-none mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="{{asset('admin/assets/images/user/avatar-2.jpg')}}" alt="user-image" class="user-avtar">
                        <span>
                            {{-- <span class="user-name">{{auth()->admins()->name}}</span> --}}
                            <span class="user-desc">Administrator</span>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right pc-h-dropdown">
                        <div class=" dropdown-header">
                            
                        </div>

                        <a href="auth-signin.html" class="dropdown-item">
                    
                            <span> <form action="{{ route('admin.logout') }}" method="POST">
                                @csrf
                                <button type="submit" style="border: none;background:none"><i class="fa fa-sign-out" aria-hidden="true"></i>Đăng xuất</button>
                            </form></span>
                        </a>
                    </div>
                </li>
                
        <div class="ml-auto">
            <ul class="list-unstyled">
                <li class="dropdown pc-h-item">
                    <a class="pc-head-link dropdown-toggle arrow-none mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="material-icons-two-tone">search</i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right pc-h-dropdown drp-search">
                        <form class="px-3">
                            <div class="form-group mb-0 d-flex align-items-center">
                                <i data-feather="search"></i>
                                <input type="search" class="form-control border-0 shadow-none" placeholder="Search here. . .">
                            </div>
                        </form>
                    </div>
                </li>
              
            </ul>
        </div>

    </div>
</header>
