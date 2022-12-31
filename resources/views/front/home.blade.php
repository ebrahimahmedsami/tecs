<!DOCTYPE html>
<html lang="{{app()->getLocale()=='ar'?'ar':'en'}}" dir="{{app()->getLocale()=='ar'?'rtl':'ltr'}}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="csrf-token" content="{{csrf_token()}}" />
    <title>TECS</title>
    <!-- Favicon-->
    <link rel="shortcut icon" type="image/x-icon" href="{{isset($settings->logo) && !empty($settings->logo) ? asset('storage/settings/uploads/'.$settings->logo) : asset('dashboardAssets/app-assets/images/logo/main-logo-black.jpeg')}}">
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{asset('frontAssets/css/styles.css')}}" rel="stylesheet" />

    <style>
        @import url(http://fonts.googleapis.com/earlyaccess/droidarabickufi.css);

        header.masthead{
            background-image: url({{isset($settings->image) && !empty($settings->image) ? asset('storage/settings/uploads/'.$settings->image) : asset('dashboardAssets/app-assets/images/logo/main-logo-black.jpeg')}}) !important;
        }

        ul li a,html,.modal-body,.modal-header,.modal-footer{font-family: 'Droid Arabic Kufi', serif !important;font-size:100%;}
        .modal-header .btn-close{
            margin: {{app()->getLocale() == 'ar' ? '0 !important' : '-0.5rem -0.5rem -0.5rem auto !important'}};
        }

    </style>
</head>
<body id="page-top">
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
                <li class="nav-item"><a class="nav-link" href="#clinics">@lang('dashboard.clinics')</a></li>
                <li class="nav-item"><a class="nav-link" href="#contact">@lang('dashboard.contact_us')</a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- Masthead-->
<header class="masthead">
    <div class="container">
        <div class="masthead-subheading">{{isset($settings->header) ? strtoupper($settings->header) : '--'}}</div>
        <div class="masthead-heading text-uppercase">{{isset($settings->about) ? ucfirst($settings->about) : '--'}}</div>
        <a class="btn btn-primary btn-xl text-uppercase" id="reserve-modal" data-bs-toggle="modal" data-bs-target="#exampleModal">{{__('home.reserve with us')}}</a>
    </div>
</header>

<!-- start modal-->

<!-- end modal-->
<!-- Services-->
<section class="page-section" id="services">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">@lang('dashboard.service')</h2>
            <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
        </div>
        <div class="row text-center">
            <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-shopping-cart fa-stack-1x fa-inverse"></i>
                        </span>
                <h4 class="my-3">E-Commerce</h4>
                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
            </div>
            <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-laptop fa-stack-1x fa-inverse"></i>
                        </span>
                <h4 class="my-3">Responsive Design</h4>
                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
            </div>
            <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-lock fa-stack-1x fa-inverse"></i>
                        </span>
                <h4 class="my-3">Web Security</h4>
                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
            </div>
        </div>
    </div>
</section>
<!-- Portfolio Grid-->

<!-- About-->
<section class="page-section" id="about">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">About</h2>
            <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
        </div>
        <ul class="timeline">
            <li>
                <div class="timeline-image"><img class="rounded-circle img-fluid" src="{{asset('frontAssets/assets/img/about/1.jpg')}}" alt="..." /></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4>2009-2011</h4>
                        <h4 class="subheading">Our Humble Beginnings</h4>
                    </div>
                    <div class="timeline-body"><p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p></div>
                </div>
            </li>
            <li class="timeline-inverted">
                <div class="timeline-image"><img class="rounded-circle img-fluid" src="{{asset('frontAssets/assets/img/about/2.jpg')}}" alt="..." /></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4>March 2011</h4>
                        <h4 class="subheading">An Agency is Born</h4>
                    </div>
                    <div class="timeline-body"><p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p></div>
                </div>
            </li>
            <li>
                <div class="timeline-image"><img class="rounded-circle img-fluid" src="{{asset('frontAssets/assets/img/about/3.jpg')}}" alt="..." /></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4>December 2015</h4>
                        <h4 class="subheading">Transition to Full Service</h4>
                    </div>
                    <div class="timeline-body"><p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p></div>
                </div>
            </li>
            <li class="timeline-inverted">
                <div class="timeline-image"><img class="rounded-circle img-fluid" src="{{asset('frontAssets/assets/img/about/4.jpg')}}" alt="..." /></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4>July 2020</h4>
                        <h4 class="subheading">Phase Two Expansion</h4>
                    </div>
                    <div class="timeline-body"><p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p></div>
                </div>
            </li>
            <li class="timeline-inverted">
                <div class="timeline-image">
                    <h4>
                        Be Part
                        <br />
                        Of Our
                        <br />
                        Story!
                    </h4>
                </div>
            </li>
        </ul>
    </div>
</section>
<!-- Team-->
<section class="page-section bg-light" id="clinics">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Our Amazing Team</h2>
            <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="team-member">
                    <img class="mx-auto rounded-circle" src="{{asset('frontAssets/assets/img/team/1.jpg')}}" alt="..." />
                    <h4>Parveen Anand</h4>
                    <p class="text-muted">Lead Designer</p>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Parveen Anand Twitter Profile"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Parveen Anand Facebook Profile"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Parveen Anand LinkedIn Profile"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="team-member">
                    <img class="mx-auto rounded-circle" src="{{asset('frontAssets/assets/img/team/2.jpg')}}" alt="..." />
                    <h4>Diana Petersen</h4>
                    <p class="text-muted">Lead Marketer</p>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Diana Petersen Twitter Profile"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Diana Petersen Facebook Profile"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Diana Petersen LinkedIn Profile"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="team-member">
                    <img class="mx-auto rounded-circle" src="{{asset('frontAssets/assets/img/team/3.jpg')}}" alt="..." />
                    <h4>Larry Parker</h4>
                    <p class="text-muted">Lead Developer</p>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Larry Parker Twitter Profile"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Larry Parker Facebook Profile"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Larry Parker LinkedIn Profile"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 mx-auto text-center"><p class="large text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p></div>
        </div>
    </div>
</section>
<!-- Clients-->
<div class="py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-3 col-sm-6 my-3">
                <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="{{asset('frontAssets/assets/img/logos/microsoft.svg')}}" alt="..." aria-label="Microsoft Logo" /></a>
            </div>
            <div class="col-md-3 col-sm-6 my-3">
                <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="{{asset('frontAssets/assets/img/logos/google.svg')}}" alt="..." aria-label="Google Logo" /></a>
            </div>
            <div class="col-md-3 col-sm-6 my-3">
                <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="{{asset('frontAssets/assets/img/logos/facebook.svg')}}" alt="..." aria-label="Facebook Logo" /></a>
            </div>
            <div class="col-md-3 col-sm-6 my-3">
                <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="{{asset('frontAssets/assets/img/logos/ibm.svg')}}" alt="..." aria-label="IBM Logo" /></a>
            </div>
        </div>
    </div>
</div>
<!-- Contact-->
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
<!-- Footer-->
<footer class="footer py-4">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-4 text-lg-start">@lang('home.Copyright') &copy; TECS 2022</div>
            <div class="col-lg-4 my-3 my-lg-0">
                <a class="btn btn-dark btn-social mx-2" href="{{isset($settings->twitter_link) ? $settings->twitter_link : ''}}" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                <a class="btn btn-dark btn-social mx-2" href="{{isset($settings->facebook_link) ? $settings->facebook_link : ''}}" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-dark btn-social mx-2" href="{{isset($settings->instagram_link) ? $settings->instagram_link : ''}}" aria-label="LinkedIn"><i class="fab fa-instagram"></i></a>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a class="link-dark text-decoration-none me-3" href="javascript::void(0)">@lang('home.Privacy Policy')</a>
                <a class="link-dark text-decoration-none" href="javascript::void(0)">@lang('home.Terms of Use')</a>
            </div>
        </div>
    </div>
</footer>

<x-reserve-component_modal />
<!-- Bootstrap core JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="{{asset('frontAssets/js/scripts.js')}}"></script>
@yield('script')
</body>
</html>
