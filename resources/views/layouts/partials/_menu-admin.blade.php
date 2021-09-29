<li class="menu-section">
    <h4 class="menu-text">Admin</h4>
    <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
</li>

<li class="menu-item {{ Route::is('admin.dashboard') ? 'menu-item-active' : '' }}" aria-haspopup="true">
    <a href="{{ route('admin.dashboard') }}" class="menu-link">
        <span class="svg-icon menu-icon">

            <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <polygon points="0 0 24 0 24 24 0 24" />
                    <path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" fill="#000000" fill-rule="nonzero" />
                    <path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" fill="#000000" opacity="0.3" />
                </g>
            </svg>

            <!--end::Svg Icon-->
        </span>
        <span class="menu-text">Dashboard</span>
    </a>
</li>


<li class="menu-item menu-item-submenu {{
    Route::is('admin.bank-sampah.*') ||
    Route::is('admin.barang.*') ||
    Route::is('admin.barang-kategori.*') ||
    Route::is('admin.barang-berat.*')
    ? 'menu-open menu-item-open' : '' }}" aria-haspopup="true" data-menu-toggle="hover">
    <a href="javascript:;" class="menu-link menu-toggle">
        <span class="svg-icon menu-icon">
            <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo2/dist/../src/media/svg/icons/Layout/Layout-top-panel-2.svg-->
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <rect x="0" y="0" width="24" height="24"/>
                    <path d="M3,4 L20,4 C20.5522847,4 21,4.44771525 21,5 L21,7 C21,7.55228475 20.5522847,8 20,8 L3,8 C2.44771525,8 2,7.55228475 2,7 L2,5 C2,4.44771525 2.44771525,4 3,4 Z M10,10 L20,10 C20.5522847,10 21,10.4477153 21,11 L21,19 C21,19.5522847 20.5522847,20 20,20 L10,20 C9.44771525,20 9,19.5522847 9,19 L9,11 C9,10.4477153 9.44771525,10 10,10 Z" fill="#000000"/>
                    <rect fill="#000000" opacity="0.3" x="2" y="10" width="5" height="10" rx="1"/>
                </g>
            </svg>
            <!--end::Svg Icon-->
        </span>

        <span class="menu-text">Data Master</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="menu-submenu">
        <i class="menu-arrow"></i>
        <ul class="menu-subnav">
            <li class="menu-item menu-item-submenu {{ Route::is('admin.bank-sampah.*') ? 'menu-item-active' : '' }}" aria-haspopup="true" data-menu-toggle="hover">
                <a href="{{ route('admin.bank-sampah.index') }}" class="menu-link menu-toggle">
                    <i class="menu-bullet menu-bullet-line">
                        <span></span>
                    </i>
                    <span class="menu-text">Master Bank Sampah</span>
                </a>
            </li>

            <li class="menu-item menu-item-submenu {{ Route::is('admin.barang.*') ? 'menu-item-active' : '' }}" aria-haspopup="true" data-menu-toggle="hover">
                <a href="{{ route('admin.barang.index') }}" class="menu-link menu-toggle">
                    <i class="menu-bullet menu-bullet-line">
                        <span></span>
                    </i>
                    <span class="menu-text">Master Barang</span>
                </a>
            </li>

            <li class="menu-item menu-item-submenu {{ Route::is('admin.barang-kategori.*') ? 'menu-item-active' : '' }}" aria-haspopup="true" data-menu-toggle="hover">
                <a href="{{ route('admin.barang-kategori.index') }}" class="menu-link menu-toggle">
                    <i class="menu-bullet menu-bullet-line">
                        <span></span>
                    </i>
                    <span class="menu-text">Master Kategori Barang</span>
                </a>
            </li>

            <li class="menu-item menu-item-submenu {{ Route::is('admin.barang-berat.*') ? 'menu-item-active' : '' }}" aria-haspopup="true" data-menu-toggle="hover">
                <a href="{{ route('admin.barang-berat.index') }}" class="menu-link menu-toggle">
                    <i class="menu-bullet menu-bullet-line">
                        <span></span>
                    </i>
                    <span class="menu-text">Master Berat Barang</span>
                </a>
            </li>
        </ul>
    </div>
</li>

<li class="menu-item menu-item-submenu {{
    Route::is('admin.pengguna.*') ||
    Route::is('admin.pengguna-kategori.*')
    ? 'menu-open menu-item-open' : '' }}" aria-haspopup="true" data-menu-toggle="hover">
    <a href="javascript:;" class="menu-link menu-toggle">
        <span class="svg-icon menu-icon">
            <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo2/dist/../src/media/svg/icons/Layout/Layout-top-panel-2.svg-->
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <rect x="0" y="0" width="24" height="24"/>
                    <path d="M3,4 L20,4 C20.5522847,4 21,4.44771525 21,5 L21,7 C21,7.55228475 20.5522847,8 20,8 L3,8 C2.44771525,8 2,7.55228475 2,7 L2,5 C2,4.44771525 2.44771525,4 3,4 Z M10,10 L20,10 C20.5522847,10 21,10.4477153 21,11 L21,19 C21,19.5522847 20.5522847,20 20,20 L10,20 C9.44771525,20 9,19.5522847 9,19 L9,11 C9,10.4477153 9.44771525,10 10,10 Z" fill="#000000"/>
                    <rect fill="#000000" opacity="0.3" x="2" y="10" width="5" height="10" rx="1"/>
                </g>
            </svg>
            <!--end::Svg Icon-->
        </span>
        <span class="menu-text">Pengguna</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="menu-submenu">
        <i class="menu-arrow"></i>
        <ul class="menu-subnav">
            <li class="menu-item menu-item-submenu {{ Route::is('admin.pengguna.*') ? 'menu-item-active' : '' }}" aria-haspopup="true" data-menu-toggle="hover">
                <a href="{{ route('admin.pengguna.index') }}" class="menu-link menu-toggle">
                    <i class="menu-bullet menu-bullet-line">
                        <span></span>
                    </i>
                    <span class="menu-text">Daftar Pengguna</span>
                </a>
            </li>
            <li class="menu-item menu-item-submenu {{ Route::is('admin.pengguna-kategori.*') ? 'menu-item-active' : '' }}" aria-haspopup="true" data-menu-toggle="hover">
                <a href="{{ route('admin.pengguna-kategori.index') }}" class="menu-link menu-toggle">
                    <i class="menu-bullet menu-bullet-line">
                        <span></span>
                    </i>
                    <span class="menu-text">Kategori Pengguna</span>
                </a>
            </li>
        </ul>
    </div>
</li>

<li class="menu-item menu-item-submenu {{
    Route::is('admin.kader-status.*') ||
    Route::is('admin.kader-kategori.*')
    ? 'menu-open menu-item-open' : '' }}" aria-haspopup="true" data-menu-toggle="hover">
    <a href="javascript:;" class="menu-link menu-toggle">
        <span class="svg-icon menu-icon">
            <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo2/dist/../src/media/svg/icons/Layout/Layout-top-panel-2.svg-->
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <rect x="0" y="0" width="24" height="24"/>
                    <path d="M3,4 L20,4 C20.5522847,4 21,4.44771525 21,5 L21,7 C21,7.55228475 20.5522847,8 20,8 L3,8 C2.44771525,8 2,7.55228475 2,7 L2,5 C2,4.44771525 2.44771525,4 3,4 Z M10,10 L20,10 C20.5522847,10 21,10.4477153 21,11 L21,19 C21,19.5522847 20.5522847,20 20,20 L10,20 C9.44771525,20 9,19.5522847 9,19 L9,11 C9,10.4477153 9.44771525,10 10,10 Z" fill="#000000"/>
                    <rect fill="#000000" opacity="0.3" x="2" y="10" width="5" height="10" rx="1"/>
                </g>
            </svg>
            <!--end::Svg Icon-->
        </span>
        <span class="menu-text">Kader</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="menu-submenu">
        <i class="menu-arrow"></i>
        <ul class="menu-subnav">
            <li class="menu-item menu-item-submenu {{ Route::is('admin.kader-status.*') ? 'menu-item-active' : '' }}" aria-haspopup="true" data-menu-toggle="hover">
                <a href="{{ route('admin.kader-status.index') }}" class="menu-link menu-toggle">
                    <i class="menu-bullet menu-bullet-line">
                        <span></span>
                    </i>
                    <span class="menu-text">Status Kader</span>
                </a>
            </li>
            <li class="menu-item menu-item-submenu {{ Route::is('admin.kader-kategori.*') ? 'menu-item-active' : '' }} " aria-haspopup="true" data-menu-toggle="hover">
                <a href="{{ route('admin.kader-kategori.index') }}" class="menu-link menu-toggle">
                    <i class="menu-bullet menu-bullet-line">
                        <span></span>
                    </i>
                    <span class="menu-text">Kategori Kader</span>
                </a>
            </li>
        </ul>
    </div>
</li>


<li class="menu-item menu-item-submenu {{ Route::is('admin.laporan.*') ? 'menu-open menu-item-open' : '' }}" aria-haspopup="true" data-menu-toggle="hover">
    <a href="javascript:;" class="menu-link menu-toggle">
        <span class="svg-icon menu-icon">
            <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo2/dist/../src/media/svg/icons/Files/Selected-file.svg-->
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <polygon points="0 0 24 0 24 24 0 24"/>
                    <path d="M4.85714286,1 L11.7364114,1 C12.0910962,1 12.4343066,1.12568431 12.7051108,1.35473959 L17.4686994,5.3839416 C17.8056532,5.66894833 18,6.08787823 18,6.52920201 L18,19.0833333 C18,20.8738751 17.9795521,21 16.1428571,21 L4.85714286,21 C3.02044787,21 3,20.8738751 3,19.0833333 L3,2.91666667 C3,1.12612489 3.02044787,1 4.85714286,1 Z M8,12 C7.44771525,12 7,12.4477153 7,13 C7,13.5522847 7.44771525,14 8,14 L15,14 C15.5522847,14 16,13.5522847 16,13 C16,12.4477153 15.5522847,12 15,12 L8,12 Z M8,16 C7.44771525,16 7,16.4477153 7,17 C7,17.5522847 7.44771525,18 8,18 L11,18 C11.5522847,18 12,17.5522847 12,17 C12,16.4477153 11.5522847,16 11,16 L8,16 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                    <path d="M6.85714286,3 L14.7364114,3 C15.0910962,3 15.4343066,3.12568431 15.7051108,3.35473959 L20.4686994,7.3839416 C20.8056532,7.66894833 21,8.08787823 21,8.52920201 L21,21.0833333 C21,22.8738751 20.9795521,23 19.1428571,23 L6.85714286,23 C5.02044787,23 5,22.8738751 5,21.0833333 L5,4.91666667 C5,3.12612489 5.02044787,3 6.85714286,3 Z M8,12 C7.44771525,12 7,12.4477153 7,13 C7,13.5522847 7.44771525,14 8,14 L15,14 C15.5522847,14 16,13.5522847 16,13 C16,12.4477153 15.5522847,12 15,12 L8,12 Z M8,16 C7.44771525,16 7,16.4477153 7,17 C7,17.5522847 7.44771525,18 8,18 L11,18 C11.5522847,18 12,17.5522847 12,17 C12,16.4477153 11.5522847,16 11,16 L8,16 Z" fill="#000000" fill-rule="nonzero"/>
                </g>
            </svg>
            <!--end::Svg Icon-->
        </span>

        <span class="menu-text">Laporan</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="menu-submenu">
        <i class="menu-arrow"></i>
        <ul class="menu-subnav">
            <li class="menu-item menu-item-submenu {{ Route::is('admin.laporan.setoran') ? 'menu-item-active' : '' }}" aria-haspopup="true" data-menu-toggle="hover">
                <a href="{{ route('admin.laporan.setoran') }}" class="menu-link menu-toggle">
                    <i class="menu-bullet menu-bullet-line">
                        <span></span>
                    </i>
                    <span class="menu-text">Setoran</span>
                </a>
            </li>
            <li class="menu-item menu-item-submenu {{ Route::is('admin.laporan.edukasi') ? 'menu-item-active' : '' }} " aria-haspopup="true" data-menu-toggle="hover">
                <a href="{{ route('admin.laporan.edukasi') }}" class="menu-link menu-toggle">
                    <i class="menu-bullet menu-bullet-line">
                        <span></span>
                    </i>
                    <span class="menu-text">Edukasi</span>
                </a>
            </li>
        </ul>
    </div>
</li>

<li class="menu-item {{ Route::is('admin.profile') ? 'menu-item-active' : '' }}" aria-haspopup="true">
    <a href="{{ route('admin.profile') }}" class="menu-link">
        <span class="svg-icon menu-icon">
            <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo2/dist/../src/media/svg/icons/General/User.svg-->
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <polygon points="0 0 24 0 24 24 0 24"/>
                    <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                    <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
                </g>
            </svg>
            <!--end::Svg Icon-->
        </span>
        <span class="menu-text">Profil Saya</span>
    </a>
</li>