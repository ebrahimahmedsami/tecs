<nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-light navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-container content">
            <div class="navbar-collapse" id="navbar-mobile">
                <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                    <ul class="nav navbar-nav">
                        <li class="nav-item mobile-menu d-xl-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ficon feather icon-menu"></i></a></li>
                    </ul>
                    <ul class="nav navbar-nav bookmark-icons">
                        <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i class="ficon feather icon-maximize"></i></a></li>
                        <li class="dropdown dropdown-language nav-item">
                            <a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="flag-icon {{app()->getLocale() == 'ar'?'flag-icon-eg':'flag-icon-us'}}"></i><span class="selected-language">{{app()->getLocale() == 'ar'?'العربية':'English'}}</span></a>
                            <div class="dropdown-menu" aria-labelledby="dropdown-flag">
                                <a class="dropdown-item" href="{{ LaravelLocalization::getLocalizedURL('en') }}" data-language="en"><i class="flag-icon flag-icon-us"></i> English</a>
                                <a class="dropdown-item" href="{{ LaravelLocalization::getLocalizedURL('ar') }}" data-language="fr"><i class="flag-icon flag-icon-eg"></i> العربية</a>
                            </div>
                        </li>
                        <li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-chat.html" data-toggle="tooltip" data-placement="top" title="{{__('dashboard.chat')}}"><i class="ficon feather icon-message-square"></i></a></li>
                    </ul>

                </div>
                <ul class="nav navbar-nav float-right">

                    @if(auth()->user()->hasRole('clinic'))
                        <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon feather icon-bell"></i><span class="badge badge-pill badge-primary badge-up">{{auth()->user()->unreadNotifications()->count()}}</span></a>
                            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                                <li class="dropdown-menu-header">
                                    <div class="dropdown-header m-0 p-2">
                                        <h3 class="white">{{auth()->user()->unreadNotifications()->count()}} {{__('dashboard.New')}}</h3><span class="notification-title">{{__('dashboard.App Notifications')}}</span>
                                    </div>
                                </li>
                                <li class="scrollable-container media-list">
                                    @foreach(auth()->user()->notifications as $notification)
                                        <a class="d-flex justify-content-between" href="javascript:void(0)">
                                            <div class="media d-flex align-items-start">
                                                <div class="media-left"><i class="feather icon-download-cloud font-medium-5 success"></i></div>
                                                <div class="media-body">
                                                    <h6 class="success media-heading red darken-1">{{\App\Models\Patient::find($notification->data['reservation_data']['patient_id'])->name}}</h6><small class="notification-text text-bold-700">{{$notification->data['reservation_data']['type_text']}} ({{$notification->data['reservation_data']['date']}} - {{\Carbon\Carbon::parse($notification->data['reservation_data']['date'])->dayName}})</small>
                                                </div><small>
                                                    <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">{{$notification->created_at->diffForHumans()}}</time></small>
                                            </div>
                                        </a>
                                    @endforeach
                                </li>
                                <li class="dropdown-menu-footer"><a class="dropdown-item p-1 text-center" href="{{route('admin.user.mark-all-read')}}">@lang('dashboard.read_all')</a></li>
                            </ul>
                        </li>
                    @endif
                    <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                            <div class="user-nav d-sm-flex d-none"><span class="user-name text-bold-600">{{optional(auth('web')->user()->clinic)->name ?? auth('web')->user()->name}}</span><span class="user-status">{{auth()->user()->hasRole("clinic") ? __('dashboard.clinic') : optional(auth()->user())->name}}</span></div><span><img class="round" src="{{asset('dashboardAssets/app-assets/images/logo/main-logo-black.jpeg')}}" alt="avatar" height="40" width="40"></span>
                        </a>
                        <div style="width: 200px;" class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="javascript::void(0)"><i class="feather icon-user"></i> {{__('dashboard.Edit Profile')}}</a>
                            <div class="dropdown-divider"></div><a class="dropdown-item" href="{{route('admin.logout')}}"><i class="feather icon-power"></i> {{__('dashboard.Logout')}}</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
