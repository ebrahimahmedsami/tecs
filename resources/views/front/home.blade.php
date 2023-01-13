@extends('front.layouts.master')
@section('content')
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="#page-top"><img src="{{isset($settings->logo) && !empty($settings->logo) ? asset('storage/settings/uploads/'.$settings->logo) : asset('dashboardAssets/app-assets/images/logo/main-logo-black.jpeg')}}" alt="logo image" /></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars ms-1"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                <li class="nav-item"><a class="nav-link" href="#services">@lang('dashboard.service')</a></li>
                <li class="nav-item"><a class="nav-link" href="#about">@lang('dashboard.about')</a></li>
                <li class="nav-item"><a class="nav-link" href="#contact">@lang('dashboard.contact_us')</a></li>
                <li class="nav-item"><a class="nav-link" href="#clinics">@lang('dashboard.clinics')</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('admin.login')}}">@lang('dashboard.login')</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ LaravelLocalization::getLocalizedURL('en') }}" data-language="en"><img title="english" style="width: 20px;" src="{{asset('frontAssets/images/en.png')}}"></a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ LaravelLocalization::getLocalizedURL('ar') }}" data-language="en"> <img title="arabic" style="width: 20px;" src="{{asset('frontAssets/images/ar.png')}}"></a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- Masthead-->
<header class="masthead">
    <div class="container">
        <div class="masthead-subheading">{{isset($settings->header) ? strtoupper($settings->header) : '--'}}</div>
        <div class="masthead-heading text-uppercase">{{isset($settings->about) ? ucfirst($settings->about) : '--'}}</div>
        <a class="btn btn-primary btn-xl text-uppercase" id="reserve-modal" data-bs-toggle="modal" data-bs-target="#exampleModal" style="border: 2px solid #272424;color: #000;">{{__('home.reserve with us')}}</a>
    </div>
</header>

<!-- start modal-->

<!-- end modal-->
<!-- Services-->
<section class="page-section" id="services">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">@lang('dashboard.service')</h2>
            <h3 class="section-subheading text-muted">@lang('dashboard.service_text')</h3>
        </div>
        <div class="row text-center">
            @if(isset($services))
                @foreach($services as $service)
                    <div class="col-md-4">
                                <span class="fa-stack fa-4x">
                                    <i class="fas fa-circle fa-stack-2x text-primary"></i>
                                    <i class="{{$service->icon}} fa-stack-1x fa-inverse"></i>
                                </span>
                        <h4 class="my-3">{{$service->title}}</h4>
                        <p class="text-muted">{{$service->text}}</p>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</section>
<!-- Portfolio Grid-->

<section id="clinics" class="page-section" style="background: #f6f6f6;">
    <div class="container mx-auto py-8">
        <div class="flex flex-col text-center gap-4 mb-8 p-4 wow bounceInDown" data-wow-duration="2s">
            <h1  style="text-transform:uppercase" class="">@lang('dashboard.our_clinics')</h1>
            <div style="color: #a3a3a3;text-transform:capitalize;letter-spacing: 2px;">@lang('dashboard.our_clinics_text_one')</div>
            <div  style="text-transform:capitalize;letter-spacing: 2px;">@lang('dashboard.our_clinics_text_two')</div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-12 mb-2" data-wow-duration="2s">
                <div style="border: 2px dashed #e5dddd;padding: 10px;">
                    <img src="{{asset('frontAssets/images/doc.png')}}" class="img-thumbnail">

                    <div style="font-weight: bold" class="text-center mt-2">Clinic : EL-Hayah</div>

                    <div class="text-dark text-center mt-2" style="color: #fff !important;background: #ffc800 !important;">DR/Ahmed Yasser</div>

                    <div style="font-size: 14px;" class="text-dark text-center mt-2">All Information About Clinic.</div>

                    <div class="d-flex justify-content-around mt-3 mb-3">
                        <i style="color: #ffc800;background: #212529;padding: 8px;border-radius:25px;" class="fa-brands fa-twitter fa-lg cursor-pointer transition duration-200 hover:text-gray-400"></i>
                        <i style="color: #ffc800;background: #212529;padding: 8px;border-radius:25px;" class="fa-brands fa-linkedin fa-lg cursor-pointer transition duration-200 hover:text-gray-400"></i>
                        <i style="color: #ffc800;background: #212529;padding: 8px;border-radius:25px;" class="fa-brands fa-dribbble fa-lg cursor-pointer transition duration-200 hover:text-gray-400"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 mb-2" data-wow-duration="2s">
                <div style="border: 2px dashed #e5dddd;padding: 10px;">
                    <img src="{{asset('frontAssets/images/doc.png')}}" class="img-thumbnail">

                    <div style="font-weight: bold" class="text-center mt-2">Clinic : EL-Hayah</div>

                    <div class="text-dark text-center mt-2" style="color: #fff !important;background: #ffc800 !important;">DR/Ahmed Yasser</div>

                    <div style="font-size: 14px;" class="text-dark text-center mt-2">All Information About Clinic.</div>

                    <div class="d-flex justify-content-around mt-3 mb-3">
                        <i style="color: #ffc800;background: #212529;padding: 8px;border-radius:25px;" class="fa-brands fa-twitter fa-lg cursor-pointer transition duration-200 hover:text-gray-400"></i>
                        <i style="color: #ffc800;background: #212529;padding: 8px;border-radius:25px;" class="fa-brands fa-linkedin fa-lg cursor-pointer transition duration-200 hover:text-gray-400"></i>
                        <i style="color: #ffc800;background: #212529;padding: 8px;border-radius:25px;" class="fa-brands fa-dribbble fa-lg cursor-pointer transition duration-200 hover:text-gray-400"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 mb-2" data-wow-duration="2s">
                <div style="border: 2px dashed #e5dddd;padding: 10px;">
                    <img src="{{asset('frontAssets/images/doc.png')}}" class="img-thumbnail">

                    <div style="font-weight: bold" class="text-center mt-2">Clinic : EL-Hayah</div>

                    <div class="text-dark text-center mt-2" style="color: #fff !important;background: #ffc800 !important;">DR/Ahmed Yasser</div>

                    <div style="font-size: 14px;" class="text-dark text-center mt-2">All Information About Clinic.</div>

                    <div class="d-flex justify-content-around mt-3 mb-3">
                        <i style="color: #ffc800;background: #212529;padding: 8px;border-radius:25px;" class="fa-brands fa-twitter fa-lg cursor-pointer transition duration-200 hover:text-gray-400"></i>
                        <i style="color: #ffc800;background: #212529;padding: 8px;border-radius:25px;" class="fa-brands fa-linkedin fa-lg cursor-pointer transition duration-200 hover:text-gray-400"></i>
                        <i style="color: #ffc800;background: #212529;padding: 8px;border-radius:25px;" class="fa-brands fa-dribbble fa-lg cursor-pointer transition duration-200 hover:text-gray-400"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 mb-2" data-wow-duration="2s">
                <div style="border: 2px dashed #e5dddd;padding: 10px;">
                    <img src="{{asset('frontAssets/images/doc.png')}}" class="img-thumbnail">

                    <div style="font-weight: bold" class="text-center mt-2">Clinic : EL-Hayah</div>

                    <div class="text-dark text-center mt-2" style="color: #fff !important;background: #ffc800 !important;">DR/Ahmed Yasser</div>

                    <div style="font-size: 14px;" class="text-dark text-center mt-2">All Information About Clinic.</div>

                    <div class="d-flex justify-content-around mt-3 mb-3">
                        <i style="color: #ffc800;background: #212529;padding: 8px;border-radius:25px;" class="fa-brands fa-twitter fa-lg cursor-pointer transition duration-200 hover:text-gray-400"></i>
                        <i style="color: #ffc800;background: #212529;padding: 8px;border-radius:25px;" class="fa-brands fa-linkedin fa-lg cursor-pointer transition duration-200 hover:text-gray-400"></i>
                        <i style="color: #ffc800;background: #212529;padding: 8px;border-radius:25px;" class="fa-brands fa-dribbble fa-lg cursor-pointer transition duration-200 hover:text-gray-400"></i>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>

<!-- About-->
<section class="page-section" id="about">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">@lang('dashboard.about_us')</h2>
            <h3 class="section-subheading text-muted">{{isset($settings->about_text) ? strtoupper($settings->about_text) : '--'}}</h3>
        </div>
    </div>
</section>
<section class="page-section" id="contact">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">@lang('home.Contact')</h2>
            <h3 class="section-subheading text-muted">@lang('home.contact_us_desc')</h3>
        </div>
        <form id="contactForm" method="POST" action="{{route('home.send-contact-us')}}">
            @csrf
            <div class="row align-items-stretch mb-5">
                <div class="col-md-6">
                    <div class="form-group">
                        <!-- Name input-->
                        <input name="name" class="form-control" id="name" type="text" placeholder="{{__('home.name')}} *" />
                        @error('name')
                        <span style="font-size: 12px;" class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <!-- Email address input-->
                        <input name="email" class="form-control" id="email" type="email" placeholder="{{__('home.email')}}" />
                        @error('email')
                            <span style="font-size: 12px;" class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-md-0">
                        <!-- Phone number input-->
                        <input name="phone" class="form-control" id="phone" type="tel" placeholder="{{__('home.phone')}} *" />
                        @error('phone')
                            <span style="font-size: 12px;" class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group form-group-textarea mb-md-0">
                        <textarea name="message" class="form-control" id="message" placeholder="{{__('home.message')}} *"></textarea>
                        @error('message')
                            <span style="font-size: 12px;" class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>
            @if(\Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{\Session::get('success')}}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <!-- Submit Button-->
            <div class="text-center"><button class="btn btn-primary btn-xl text-uppercase" id="submitButton" type="submit">@lang('home.send_message')</button></div>
        </form>
    </div>
</section>


<!--FOOTER-->
<img src="{{asset('frontAssets/images/footer_image.png')}}" class="footer_image">
<footer>
    <div class="container">
    <div class="column">
        <a class="footer_title">TECS</a>
        <a>{{isset($settings->about) ? ucfirst($settings->about) : '--'}}</a>
        <a class="btn btn-dark btn-social mx-2" href="{{isset($settings->twitter_link) ? $settings->twitter_link : ''}}" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
        <a class="btn btn-dark btn-social mx-2" href="{{isset($settings->facebook_link) ? $settings->facebook_link : ''}}" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
        <a class="btn btn-dark btn-social mx-2" href="{{isset($settings->instagram_link) ? $settings->instagram_link : ''}}" aria-label="LinkedIn"><i class="fab fa-instagram"></i></a>
    </div>
    <div class="column">
        <a class="footer_title">@lang('dashboard.touch')</a>
        <a href="#services">@lang('dashboard.service')</a>
        <a href="#about">@lang('dashboard.about')</a>
        <a href="#contact">@lang('dashboard.contact_us')</a>
    </div>
    <div class="column">
        <a class="footer_title">@lang('dashboard.our_links')</a>
        <a  href="{{route('admin.login')}}">@lang('dashboard.login')</a>
        <a href="{{ LaravelLocalization::getLocalizedURL('en') }}" data-language="en"><img title="english" style="width: 20px;" src="{{asset('frontAssets/images/en.png')}}"></a>
        <a href="{{ LaravelLocalization::getLocalizedURL('ar') }}" data-language="en"><img title="english" style="width: 20px;" src="{{asset('frontAssets/images/ar.png')}}"></a>
    </div>
    <div class="column">
        <a class="footer_title">@lang('dashboard.latest_news')</a>
        <a href="" title="Lorem ipsum dolor sit amet"><img style="width: 45px" src="{{asset('frontAssets/images/doctor.jpg')}}"></a>
        <a href="" title="Lorem ipsum dolor sit amet"><img style="width: 45px" src="{{asset('frontAssets/images/doctor.jpg')}}"></a>
        <a href="" title="Lorem ipsum dolor sit amet"><img style="width: 45px" src="{{asset('frontAssets/images/doctor.jpg')}}"></a>
        <a href="" title="Lorem ipsum dolor sit amet"><img style="width: 45px" src="{{asset('frontAssets/images/doctor.jpg')}}"></a>
        <a href="" title="Lorem ipsum dolor sit amet"><img style="width: 45px" src="{{asset('frontAssets/images/doctor.jpg')}}"></a>
    </div>
    <div class="column">
        <a class="footer_title">@lang('dashboard.get_touch')</a>
        <a title="Address"><i class="fa fa-map-marker"></i> Mansoura - AL-Manzala - EL-Bosrat</a>
        <a href="emailto:" title="Email"><i class="fa fa-envelope"></i> himasami0000@gmail.com</a>
        <a href="tel:" title="Contact"><i class="fa fa-phone"></i> +015 509 09724</a>
    </div>
    </div>
    <div class="sub-footer">
        @lang('home.Privacy Policy') @lang('home.Terms of Use') || @lang('home.Copyright') &copy; TECS 2022
    </div>
</footer>
<x-reserve-component_modal />

@endsection
