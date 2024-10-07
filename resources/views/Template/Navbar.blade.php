<div class="header">
    <div class="logo logo-dark">
        <a href="index.html">
            <img src="/app/assets/images/logo/logo3.png" alt="Logo">
            <img class="logo-fold" src="/app/assets/images/logo/logo-fold3.png" alt="Logo">
        </a>
    </div>
    <div class="logo logo-white">
        <a href="index.html">
            <img src="/app/assets/images/logo/logo-white.png" alt="Logo">
            <img class="logo-fold" src="/app/assets/images/logo/logo-fold-white.png" alt="Logo">
        </a>
    </div>
    <div class="nav-wrap">
        <ul class="nav-left">
            <li class="desktop-toggle">
                <a href="javascript:void(0);">
                    <i class="anticon"></i>
                </a>
            </li>
            <li class="mobile-toggle">
                <a href="javascript:void(0);">
                    <i class="anticon"></i>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);" data-toggle="modal" data-target="#search-drawer">
                    <i class="anticon anticon-search"></i>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">
                    <i class="anticon anticon-appstore"></i>
                </a>
            </li>
        </ul>
        <ul class="nav-right">
            <li class="dropdown dropdown-animated scale-left">
                <div class="pointer" data-toggle="dropdown">
                    <div class="avatar-image  m-h-10 m-r-15">
                        <img src="/app/assets/images/logo/133.png"  alt="">
                    </div>
                </div>
                <div class="p-b-15 p-t-20 dropdown-menu pop-profile">
                    <div class="p-h-20 p-b-15 m-b-10 border-bottom">
                        <div class="d-flex m-r-50">
                            <div class="avatar avatar-lg avatar-image">
                                @if(Auth::user()->role == 'Admin' || Auth::user()->role == 'Verifikasi' || Auth::user()->role == 'User')
                                <img src="/app/assets/images/user/{{ $userx->gambar }}" alt="">
                                @endif
                            </div>
                            <div class="m-l-10">
                                <p class="m-b-0 text-dark font-weight-semibold">{{ auth()->user()->fullname }}</p>
                                <p class="m-b-0 opacity-07">{{ auth()->user()->role }}</p>
                            </div>
                        </div>
                    </div>
                    <a href="javascript:void(0);" class="dropdown-item d-block p-h-15 p-v-10">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <i class="anticon opacity-04 font-size-16 anticon-user"></i>
                                <span class="m-l-10">Edit Profile</span>
                            </div>
                            <i class="anticon font-size-10 anticon-right"></i>
                        </div>
                    </a>
                    <a href="/logout" class="dropdown-item d-block p-h-15 p-v-10">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                @if(Auth::user()->role == 'Admin' || Auth::user()->role == 'Verifikasi' || Auth::user()->role == 'User')
                                    <i class="anticon opacity-04 font-size-16 anticon-logout"></i>
                                    <span class="m-l-10">Logout</span>
                                @endif
                            </div>
                            <!-- <i class="anticon font-size-10 anticon-right"></i> -->
                        </div>
                    </a>
                </div>
            </li>
        </ul>
    </div>
</div>   