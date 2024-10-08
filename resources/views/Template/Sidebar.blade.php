<div class="side-nav">
    <div class="side-nav-inner">
        <ul class="side-nav-menu scrollable">
            <li @if(isset($active_home1)){{ $active_home1 }} @endif>
                <a class="dropdown-toggle" href="{{ url('/dashboard') }}">
                    <span class="icon-holder">
                        <i class="anticon anticon-dashboard"></i>
                    </span>
                    <span class="title">Dashboard</span>
                    <span class="arrow">
                        <i class="arrow-icon"></i>
                    </span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="anticon anticon-appstore"></i>
                    </span>
                    <span class="title">Pengaturan</span>
                    <span class="arrow">
                        <i class="arrow-icon"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li class="nav-item dropdown">
                        <a href="javascript:void(0);">
                            <span>Master Data</span>
                            <span class="arrow">
                                <i class="arrow-icon"></i>
                            </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="app-project-list.html">Data OPD</a>
                            </li>
                            <li>
                                <a href="app-project-details.html">Data Jenis Pajak</a>
                            </li>
                            <li>
                                <a href="app-project-details.html">Data Akun Pajak</a>
                            </li>
                            <li>
                                <a href="app-project-details.html">Data Pegawai</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown @if(isset($active_side)){{ $active_side }} @endif">
                        <a href="javascript:void(0);">
                            <span>Kelola USer</span>
                            <span class="arrow">
                                <i class="arrow-icon"></i>
                            </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="@if(isset($active_kuser)){{ $active_kuser }} @endif">
                                <a href="{{ url('/tampiluser') }}">List User</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown @if(isset($active_side_tarik)){{ $active_side_tarik }} @endif">
                        <a href="javascript:void(0);">
                            <span>Tarik Data SIPD RI</span>
                            <span class="arrow">
                                <i class="arrow-icon"></i>
                            </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="@if(isset($active_tarik)){{ $active_tarik }} @endif">
                                <a href="/tarikpajaksipdri">LS</a>
                            </li>
                            <li class="@if(isset($active_tarikgu)){{ $active_tarikgu }} @endif">
                                <a href="/tarikpajaksipdrigu">GU</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="anticon anticon-build"></i>
                    </span>
                    <span class="title">Penatausahaan</span>
                    <span class="arrow">
                        <i class="arrow-icon"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li class="nav-item dropdown">
                        <a href="javascript:void(0);">
                            <span>Data Pajak</span>
                            <span class="arrow">
                                <i class="arrow-icon"></i>
                            </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="">LS</a>
                            </li>
                            <li>
                                <a href="app-e-commerce-order-list.html">GU</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="javascript:void(0);">
                            <span>Data Potongan</span>
                            <span class="arrow">
                                <i class="arrow-icon"></i>
                            </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="app-e-commerce-order-list.html">BPJS</a>
                            </li>
                            <li>
                                <a href="app-e-commerce-order-list.html">TASPEN</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="anticon anticon-build"></i>
                    </span>
                    <span class="title">Laporan</span>
                    <span class="arrow">
                        <i class="arrow-icon"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li class="nav-item dropdown">
                        <a href="javascript:void(0);">
                            <span>Data Pajak</span>
                            <span class="arrow">
                                <i class="arrow-icon"></i>
                            </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="app-e-commerce-order-list.html">LS</a>
                            </li>
                            <li>
                                <a href="app-e-commerce-order-list.html">GU</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="javascript:void(0);">
                            <span>Data Potongan</span>
                            <span class="arrow">
                                <i class="arrow-icon"></i>
                            </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="app-e-commerce-order-list.html">BPJS</a>
                            </li>
                            <li>
                                <a href="app-e-commerce-order-list.html">TASPEN</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
    </div>
</div>