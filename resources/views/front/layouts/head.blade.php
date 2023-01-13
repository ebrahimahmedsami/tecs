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
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />--}}
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.3.0/animate.css"
    />
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
