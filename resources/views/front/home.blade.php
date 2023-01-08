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
                <li class="nav-item"><a class="nav-link" href="#contact">@lang('dashboard.contact_us')</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('admin.login')}}">@lang('dashboard.login')</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ LaravelLocalization::getLocalizedURL('en') }}" data-language="en"><i class="flag-icon flag-icon-us"></i> English</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ LaravelLocalization::getLocalizedURL('ar') }}" data-language="en"><i class="flag-icon flag-icon-us"></i> العربية</a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- Masthead-->
<header class="masthead">
    <div class="container">
        <div class="masthead-subheading text-black">{{isset($settings->header) ? strtoupper($settings->header) : '--'}}</div>
        <div class="masthead-heading text-uppercase text-black">{{isset($settings->about) ? ucfirst($settings->about) : '--'}}</div>
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
            <h3 class="section-subheading text-muted">كل ما يخص الخدمات وما تقدمه الشركه</h3>
        </div>
        <div class="row text-center">
            <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-shopping-cart fa-stack-1x fa-inverse"></i>
                        </span>
                <h4 class="my-3">الإعلانات والتسويق</h4>
                <p class="text-muted">تعتبر الإعلانات أحد جوانب التسويق؛ وعلى الرغم من أن عملية التسويق تعتبر نهجاً كلياً يمكن من خلاله التحدث مع العملاء عن علامتك التجارية، عادة ما يكون الإعلان شكلاً مدفوعاً من أشكال الرسائل المصممة لتشجيع المبيعات؛ وقد تكون الإعلانات مقدمة على المدى القصير للترويج لعروض خاصة أو مستمرة، إلا أنها عادة ما تحتاج إلى استثمار مالي؛ وإذا كنت على علم بأن الإعلانات قد تقدم المساعدة لمشروعك ولكن غير متأكد من النقطة التي يتعين عليك البدء منها، اطلع على نصائح التسويق الواردة أدناه للتعرف على الخيارلإحتياجاتك الأنسب لاحتياجات وموازنتك.</p>
            </div>
            <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-laptop fa-stack-1x fa-inverse"></i>
                        </span>
                <h4 class="my-3">تصميم اللوجوهات والبانر</h4>
                <p class="text-muted">هو الهوية المميزة لاي مشروع او منشأة تجارية . وهو يعبر عن طبيعة وماهية هذه المنشأة ويعطي لمحة عنها وشعار الموقع أول ما يلفت نظر العميل أو زائر الموقع . حيث أن الشعار كلما كان متميزاً ومتناسقاً مع طبيعة المنشأة كلما كان له تأثير أكبر لدى الزبائن والعملاء وليس المهم فقط أن يتميز المصمم باتقانه للعمل على برامج التصميم المختلفة وانما الاهم ان يكون لديه المقدرة على التفكير والابداع وتشكيل الفكرة المناسبة لخلق شعار يتوافق مع طبيعة نشاط الموقع . وهذا ما يتطلبه تصميم شعار او لوجو ناجح . وحياة هوست من هذا المنطلق تقدم هذه الخدمة لعملائها في تصميم الشعارات للمواقع والمؤسسات معتمدة على فريق مصممين مبدع قادر على خلق الفكرة وابتكارها وتطبيقها بصورة أفضل من المتوقع.</p>
            </div>
            <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-lock fa-stack-1x fa-inverse"></i>
                        </span>
                <h4 class="my-3">تصميم التطبيقات والمواقع</h4>
                <p class="text-muted">صميم المواقع او تصميم مواقع الانترنت هو عملية تجميع عناصر وتخطيط محتويات الوسائط المتعددة بواسطه عدة لغات وبرامج لاخراج تصميم مناسب للعرض

                    على متصفحات الانترنت بطريقة صحيحة وسهلة الاستخدام لرواد وبالتالى يكون الموقع قد ادى الغرض الذى انشأ من اجله حيث يحتاج كل موقع لـ

                    استضافة المواقع الالكترونية لكي تضع بيانات الموقع في مساحة تخزين تمتاز بالحماية والامان لحماية بياناتك من السرقة من قبل قرصنة الانترنت.</p>
            </div>
        </div>
    </div>
</section>
<!-- Portfolio Grid-->
<div style="border-top: 1px solid #ced4da;border-bottom:  1px solid #ced4da" class="py-5">
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

<!-- About-->
<section class="page-section" id="about">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">عنا</h2>
            <h3 class="section-subheading text-muted">شركه TECS كل ما يخص التكنولوجيا</h3>
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
