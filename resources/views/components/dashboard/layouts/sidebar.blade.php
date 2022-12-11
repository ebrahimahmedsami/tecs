<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="{{route('admin.home')}}">
                    <div class="brand-logo">
                        <img style="width: 40px" src="{{asset('dashboardAssets/app-assets/images/logo/main-logo-black.jpeg')}}">
                    </div>
                    <h2 class="brand-text mb-0">TECS</h2>
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item {{Route::is('admin.home')? 'active':''}}"><a href="{{route('admin.home')}}"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard">{{__('dashboard.dashboard')}}</span></a>
            </li>
            @can('roles')
                <li class=" nav-item"><a href="#"><i class="feather icon-list"></i><span class="menu-title" data-i18n="Data List">{{__('dashboard.roles')}}</span></a>
                    <ul class="menu-content">
                        @can('roles')
                        <li class="{{Route::is('admin.roles.index')? 'active':''}}"><a href="{{route('admin.roles.index')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="List View">{{__('dashboard.roles list')}}</span></a>
                        </li>
                        @endcan
                        @can('add role')
                        <li class="{{Route::is('admin.roles.create')? 'active':''}}"><a href="{{route('admin.roles.create')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Thumb View">{{__('dashboard.add roles')}}</span></a>
                        </li>
                        @endcan
                    </ul>
                </li>
            @endcan
        </ul>
    </div>
</div>
