<nav class="navbar header-navbar pcoded-header" header-theme="theme4">
    <div class="navbar-wrapper">
    <div class="navbar-logo">
    <a class="mobile-menu" id="mobile-collapse" href="#!">
    <i class="ti-menu"></i>
    </a>
    <a class="mobile-search morphsearch-search" href="#">
    <i class="ti-search"></i>
    </a>
    <a href="index-2.html">
        <h5 style="display-4">CV. AULIA MANDIRI</h5>
    </a>
    <a class="mobile-options">
    <i class="ti-more"></i>
    </a>
    </div>
    <div class="navbar-container container-fluid">
    <div>
    <ul class="nav-left">
    <li>
    <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
    </li>
    <li>
    <a href="#!" onclick="javascript:toggleFullScreen()">
    <i class="ti-fullscreen"></i>
    </a>
    </li>
    </ul>
    <ul class="nav-right">
    <li class="header-notification">
    <a href="#!">
    <i class="ti-bell"></i>
    @if ($notifications->count() == null)
        
    @else
        <span class="badge">{{$notifications->count()}}</span>
    @endif
    </a>
    <ul class="show-notification">
    <li>
    <h6>Notifications</h6>
    @if ($notifications->count() == null)
        <label class="label label-primary">Nothing New</label>
    @else
        <label class="label label-danger">New</label>
    @endif
    </li>
    @forelse ($notifications as $notification)
    <li>
        <div class="media">
            <img class="d-flex align-self-center" src="{{asset('template/default/')}}/assets/images/user.png" alt="Generic placeholder image">
            <div class="media-body">
                <h5 class="notification-user">Pesanan Baru</h5>
                  <p class="notification-msg">From  : <b>{{$notification->data['nama']}}</b></p>
                  <span class="notification-time">{{ $notification->created_at->diffForHumans() }}</span>
            </div>
        </div>
    </li>
    @empty
    <li>
        <div class="media">
            <div class="media-body">
                TIDAK ADA NOTIFIKASI
            </div>
        </div>    
    </li>    
    @endforelse
    @if ($notifications->count() == null)
        
    @else
        <li>
            <div class="media">
                <div class="media-body" style="text-align: center">
                    <a href="/read-notify/{{ Auth::user()->id }}">Read As Mark</a>
                </div>
            </div>
        </li>
    @endif
    </ul>
    </li>
    <li class="user-profile header-notification">
    <a href="#!">
    <img src="{{asset('foto/')}}/{{Auth::user()->foto}}" class="img-circle" alt="User-Profile-Image">
    <span>{{Auth::user()->name}}</span>
    <i class="ti-angle-down"></i>
    </a>
    <ul class="show-notification profile-notification">
    <li>
    <a href="{{ (Auth::user()->level == 'admin') ? route('profile') : route('mgProfile') }}">
    <i class="ti-user"></i> Profile
    </a>
    </li>
    <li>
    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="ti-layout-sidebar-left"></i> Logout
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
    </li>
    </ul>
    </li>
    </ul>
    
    </div>
    </div>
    </div>
</nav>

<!-- MAIN SIDEBAR MENU NAVIGATION START -->

    <div class="pcoded-main-container">
    <div class="pcoded-wrapper">
    <nav class="pcoded-navbar" pcoded-header-position="relative">
    <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
     <div class="pcoded-inner-navbar main-menu">
    <div class="">
    <div class="main-menu-header">
    <img src="{{asset('foto/')}}/{{Auth::user()->foto}}" class="img-40 img-circle img-fluid" alt="User-Profile-Image">
    <div class="user-details">
    <span>{{Auth::user()->name}}</span>
    <span id="more-details">{{Auth::user()->level}}<i class="ti-angle-down"></i></span>
    </div>
    </div>
    <div class="main-menu-content">
    <ul>
    <li class="more-details">
    <a href="user-profile.html"><i class="ti-user"></i>View Profile</a>
    <a href="#!"><i class="ti-settings"></i>Settings</a>
    <a href="#!"><i class="ti-layout-sidebar-left"></i>Logout</a>
    </li>
    </ul>
    </div>
    </div>
    <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation" menu-title-theme="theme5">Navigation</div>
    <ul class="pcoded-item pcoded-left-item">
    
    @if (auth()->user()->level == 'manager')
    <li class="{{ request()->is('home') ? 'active' : ''}} nav-link">
        <a href="{{route('home')}}">
        <span class="pcoded-micon"><i class="ti-home"></i></span>
        <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
        <span class="pcoded-mcaret"></span>
        </a>
    </li>
    <li class="pcoded-hasmenu">
        <a href="javascript:void(0)">
        <span class="pcoded-micon"><i class="ti-layout"></i></span>
        <span class="pcoded-mtext" data-i18n="nav.page_layout.main">Report</span>
        <span class="pcoded-mcaret"></span>
        </a>
        <ul class="pcoded-submenu">
        <li class="{{ request()->is('manager/koran') ? 'active' : ''}} nav-link">
        <a href="{{route('getKoran')}}" data-i18n="nav.page_layout.bottom-menu">
        <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
        <span class="pcoded-mtext">Koran</span>
        <span class="pcoded-mcaret"></span>
        </a>
        </li>
        <li class="{{ request()->is('manager/customer') ? 'active' : ''}} nav-link">
        <a href="{{route('getCusts')}}" data-i18n="nav.page_layout.box-layout">
        <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
        <span class="pcoded-mtext">Customers</span>
        <span class="pcoded-mcaret"></span>
        </a>
        </li>
        <li class="{{ request()->is('manager/data-koran-harian') ? 'active' : ''}} nav-link">
        <a href="{{route('getKoranHarian')}}" data-i18n="nav.page_layout.rtl">
        <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
        <span class="pcoded-mtext">Data Koran Harian</span>
        <span class="pcoded-mcaret"></span>
        </a>
        </li>
        <li class="{{ request()->is('manager/paket') ? 'active' : ''}} nav-link">
            <a href="{{ route('getPaket') }}" data-i18n="nav.page_layout.rtl">
            <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
            <span class="pcoded-mtext">Paket</span>
            <span class="pcoded-mcaret"></span>
            </a>
        </li>
        </ul>
    </li> 
    <div class="pcoded-navigatio-lavel" data-i18n="nav.category.ui-element" menu-title-theme="theme5">Notifications</div>
    <ul class="pcoded-item pcoded-left-item">
    <li class="{{ request()->is('manager/request-order') ? 'active' : ''}} nav-link">
        <a href="{{ route('getReqOrder') }}" data-i18n="nav.animations.main">
        <span class="pcoded-micon"><i class="ti-reload rotate-refresh"></i></span>
        <span class="pcoded-mtext">Request Order</span>
        @if ($getNewOrder > 0)
          <span class="pcoded-badge label label-danger">{{$getNewOrder}} Order</span>
        @endif
        <span class="pcoded-mcaret"></span>
        </a>
    </li> 
    <div class="pcoded-navigatio-lavel" data-i18n="nav.category.forms" menu-title-theme="theme5">Management Users</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="{{ request()->is('manager/users') ? 'active' : ''}} nav-link">
                <a href="{{route('getUsers')}}" data-i18n="nav.form-select.main">
                <span class="pcoded-micon"><i class="fa fa-user-plus"></i></span>
                <span class="pcoded-mtext">Users</span>
                <span class="pcoded-mcaret"></span>
                </a>
                </li>
                <li class="{{ request()->is('manager/profile') ? 'active' : ''}} nav-link">
                <a href="{{route('mgProfile')}}" data-i18n="nav.form-masking.main">
                <span class="pcoded-micon"><i class="ti-user"></i></span>
                <span class="pcoded-mtext">&nbsp;Profile</span>
                <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>      
    @endif

    <!-- ADMIN AREA -->
    @if (auth()->user()->level == 'admin')
    <li class="{{ request()->is('home') ? 'active' : ''}} nav-link">
        <a href="{{route('home')}}">
        <span class="pcoded-micon"><i class="ti-home"></i></span>
        <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
        <span class="pcoded-mcaret"></span>
        </a>
    </li>
    <li class="pcoded-hasmenu">
    <a href="javascript:void(0)">
    <span class="pcoded-micon"><i class="ti-layout"></i></span>
    <span class="pcoded-mtext" data-i18n="nav.page_layout.main">Master Koran</span>
    <span class="pcoded-mcaret"></span>
    </a>
    <ul class="pcoded-submenu">
    <li class="{{ request()->is('admin/koran') ? 'active' : ''}} nav-link">
    <a href="{{route('koran')}}" data-i18n="nav.page_layout.bottom-menu">
    <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
    <span class="pcoded-mtext">Koran</span>
    <span class="pcoded-mcaret"></span>
    </a>
    </li>
    <li class="{{ request()->is('admin/customer') ? 'active' : ''}} nav-link">
    <a href="{{route('customers')}}" data-i18n="nav.page_layout.box-layout">
    <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
    <span class="pcoded-mtext">Customers</span>
    <span class="pcoded-mcaret"></span>
    </a>
    </li>
    <li class="{{ request()->is('admin/koran-management') ? 'active' : ''}} nav-link">
    <a href="{{route('koranManage')}}" data-i18n="nav.page_layout.rtl">
    <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
    <span class="pcoded-mtext">Manage Koran Harian</span>
    <span class="pcoded-mcaret"></span>
    </a>
    </li>
    <li class="{{ request()->is('admin/paket') ? 'active' : ''}} nav-link">
        <a href="{{route('paket')}}" data-i18n="nav.page_layout.rtl">
        <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
        <span class="pcoded-mtext">Paket</span>
        <span class="pcoded-mcaret"></span>
        </a>
    </li>
    </ul>
    </li>
    <li class="{{ request()->is('admin/tagihan') ? 'active' : ''}} nav-link">
        <a href="{{route('tagihan')}}" data-i18n="nav.animations.main">
        <span class="pcoded-micon"><i class="fa fa-money"></i></span>
        <span class="pcoded-mtext">Tagihan Sender</span>
        <span class="pcoded-mcaret"></span>
        </a>
    </li>
    </ul>
    <div class="pcoded-navigatio-lavel" data-i18n="nav.category.ui-element" menu-title-theme="theme5">Notifications</div>
    <ul class="pcoded-item pcoded-left-item">
    <li class="{{ request()->is('admin/customers/request-orders') ? 'active' : ''}} nav-link">
    <a href="{{route('reqOrder')}}" data-i18n="nav.animations.main">
    <span class="pcoded-micon"><i class="ti-reload rotate-refresh"></i></span>
    <span class="pcoded-mtext">Request Order</span>
    @if ($getNewOrder > 0)
        <span class="pcoded-badge label label-danger">{{$getNewOrder}} Order</span>
    @endif
    <span class="pcoded-mcaret"></span>
    </a>
    </li>
    </ul>
    <div class="pcoded-navigatio-lavel" data-i18n="nav.category.forms" menu-title-theme="theme5">My Account</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="{{ request()->is('admin/profile') ? 'active' : ''}} nav-link">
                <a href="{{route('profile')}}" data-i18n="nav.form-masking.main">
                    <span class="pcoded-micon"><i class="ti-user"></i></span>
                    <span class="pcoded-mtext">&nbsp;Profile</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>    
    @endif
    </li>
    
    </ul>
    
    
    </nav>