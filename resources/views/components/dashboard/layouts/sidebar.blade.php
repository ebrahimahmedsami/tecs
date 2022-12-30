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

            {{--     Doctors       --}}
            @can('doctors')
            <li class=" nav-item"><a href="#"><i class="feather icon-list"></i><span class="menu-title" data-i18n="Data List">{{__('dashboard.doctors')}}</span></a>
                <ul class="menu-content">
                    @can('doctors')
                    <li class="{{Route::is('admin.doctors.index')? 'active':''}}"><a href="{{route('admin.doctors.index')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="List View">{{__('dashboard.doctors_list')}}</span></a>
                    </li>
                    @endcan
                    @can('add doctors')
                    <li class="{{Route::is('admin.doctors.create')? 'active':''}}"><a href="{{route('admin.doctors.create')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Thumb View">{{__('dashboard.add_doctor')}}</span></a>
                    </li>
                        @endcan
                </ul>
            </li>
            @endcan

            {{--     Specializations       --}}
            @can('specialization')
            <li class=" nav-item"><a href="#"><i class="feather icon-list"></i><span class="menu-title" data-i18n="Data List">{{__('dashboard.specializations')}}</span></a>
                <ul class="menu-content">
                    @can('specialization')
                    <li class="{{Route::is('admin.specializations.index')? 'active':''}}"><a href="{{route('admin.specializations.index')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="List View">{{__('dashboard.specializations_list')}}</span></a>
                    </li>
                    @endcan
                    @can('add specialization')
                    <li class="{{Route::is('admin.specializations.create')? 'active':''}}"><a href="{{route('admin.specializations.create')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Thumb View">{{__('dashboard.add_specialization')}}</span></a>
                    </li>
                        @endcan
                </ul>
            </li>
            @endcan

            {{--     Clinics       --}}
            @can('clinics')
            <li class=" nav-item"><a href="#"><i class="feather icon-list"></i><span class="menu-title" data-i18n="Data List">{{__('dashboard.clinics')}}</span></a>
                <ul class="menu-content">
                    @can('clinics')
                    <li class="{{Route::is('admin.clinics.index')? 'active':''}}"><a href="{{route('admin.clinics.index')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="List View">{{__('dashboard.clinics_list')}}</span></a>
                    </li>
                    @endcan
                    @can('add clinics')
                    <li class="{{Route::is('admin.clinics.create')? 'active':''}}"><a href="{{route('admin.clinics.create')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Thumb View">{{__('dashboard.add_clinic')}}</span></a>
                    </li>
                        @endcan
                </ul>
            </li>
            @endcan

            {{--     Patients       --}}
            @can('patients')
            <li class=" nav-item"><a href="#"><i class="feather icon-list"></i><span class="menu-title" data-i18n="Data List">{{__('dashboard.patients')}}</span></a>
                <ul class="menu-content">
                    @can('patients')
                    <li class="{{Route::is('admin.patients.index')? 'active':''}}"><a href="{{route('admin.patients.index')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="List View">{{__('dashboard.patients_list')}}</span></a>
                    </li>
                    @endcan
                    @can('add patients')
                    <li class="{{Route::is('admin.patients.create')? 'active':''}}"><a href="{{route('admin.patients.create')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Thumb View">{{__('dashboard.add_patient')}}</span></a>
                    </li>
                        @endcan
                </ul>
            </li>
            @endcan

            {{--     Reservations       --}}
            @can('reservations')
            <li class=" nav-item"><a href="#"><i class="feather icon-list"></i><span class="menu-title" data-i18n="Data List">{{__('dashboard.reserve')}}</span></a>
                <ul class="menu-content">
                    @can('reservations')
                    <li class="{{Route::is('admin.reservations.index')? 'active':''}}"><a href="{{route('admin.reservations.index')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="List View">{{__('dashboard.reserve_list')}}</span></a>
                    </li>
                    @endcan
                    @can('add reservations')
                    <li class="{{Route::is('admin.reservations.create')? 'active':''}}"><a href="{{route('admin.reservations.create')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Thumb View">{{__('dashboard.add_reserve')}}</span></a>
                    </li>
                        @endcan
                        @can('show today reservations')

                        <li class="{{Route::is('admin.today_reservations')? 'active':''}}"><a href="{{route('admin.today_reservations')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Thumb View">{{__('dashboard.today_reservations')}}</span></a>
                    </li>
                        @endcan
                </ul>
            </li>
                @endcan

            {{--     Settings       --}}
            @can('update settings')
                <li class=" nav-item"><a href="#"><i class="feather icon-list"></i><span class="menu-title" data-i18n="Data List">{{__('dashboard.settings')}}</span></a>
                    <ul class="menu-content">
                        <li class="{{Route::is('admin.settings.main-section')? 'active':''}}"><a href="{{route('admin.settings.main-section')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="List View">{{__('dashboard.main_section')}}</span></a>
                        </li>

                    </ul>
                </li>
            @endcan
        </ul>
    </div>
</div>
