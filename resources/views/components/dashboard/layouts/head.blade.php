<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="tecs">
    <meta name="keywords" content="tecs">
    <meta name="author" content="tecs">
    <title>@yield('title')</title>
    <link rel="apple-touch-icon" href="{{asset('dashboardAssets/app-assets/images/logo/main-logo-black.jpeg')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('dashboardAssets/app-assets/images/logo/main-logo-black.jpeg')}}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">
    @if(app()->getLocale()=='ar')
        <!-- BEGIN: Vendor CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset('dashboardAssets/app-assets/vendors/css/vendors-rtl.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('dashboardAssets/app-assets/vendors/css/charts/apexcharts.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('dashboardAssets/app-assets/vendors/css/extensions/tether-theme-arrows.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('dashboardAssets/app-assets/vendors/css/extensions/tether.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('dashboardAssets/app-assets/vendors/css/extensions/shepherd-theme-default.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('dashboardAssets/app-assets/vendors/css/vendors-rtl.min.css')}}/">
        <link rel="stylesheet" type="text/css" href="{{ asset('dashboardAssets/app-assets/vendors/css/forms/spinner/jquery.bootstrap-touchspin.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('dashboardAssets/app-assets/vendors/css/extensions/swiper.min.css')}}">
        <!-- END: Vendor CSS-->

        <!-- BEGIN: Theme CSS-->
        <link rel="stylesheet" type="text/css" href="{{asset('dashboardAssets/app-assets/css-rtl/bootstrap.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('dashboardAssets/app-assets/css-rtl/bootstrap-extended.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('/dashboardAssets/app-assets/css-rtl/colors.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('dashboardAssets/app-assets/css-rtl/components.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('dashboardAssets/app-assets/css-rtl/themes/dark-layout.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('dashboardAssets/app-assets/css-rtl/themes/semi-dark-layout.css')}}">

        <!-- BEGIN: Page CSS-->
        <link rel="stylesheet" type="text/css" href="{{asset('dashboardAssets/app-assets/css-rtl/core/menu/menu-types/vertical-menu.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('dashboardAssets/app-assets/css-rtl/core/colors/palette-gradient.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('dashboardAssets/app-assets/css-rtl/pages/dashboard-analytics.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('dashboardAssets/app-assets/css-rtl/pages/card-analytics.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('dashboardAssets/app-assets/css-rtl/plugins/tour/tour.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('dashboardAssets/app-assets/css-rtl/pages/app-user.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('dashboardAssets/app-assets/css-rtl/pages/app-ecommerce-details.css')}}">


        <!-- END: Page CSS-->

        <!-- BEGIN: Custom CSS-->
        <link rel="stylesheet" type="text/css" href="{{asset('dashboardAssets/app-assets/css-rtl/custom-rtl.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('dashboardAssets/assets/css/style-rtl.css')}}">
        <!-- END: Custom CSS-->
    @else
        <!-- BEGIN: Vendor CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset('dashboardAssets/app-assets/vendors/css/vendors.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('dashboardAssets/app-assets/vendors/css/charts/apexcharts.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('dashboardAssets/app-assets/vendors/css/extensions/tether-theme-arrows.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('dashboardAssets/app-assets/vendors/css/extensions/tether.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('dashboardAssets/app-assets/vendors/css/extensions/shepherd-theme-default.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('dashboardAssets/app-assets/vendors/css/vendors.min.css')}}/">
        <link rel="stylesheet" type="text/css" href="{{ asset('dashboardAssets/app-assets/vendors/css/forms/spinner/jquery.bootstrap-touchspin.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('dashboardAssets/app-assets/vendors/css/extensions/swiper.min.css')}}">
        <!-- END: Vendor CSS-->

        <!-- BEGIN: Theme CSS-->
        <link rel="stylesheet" type="text/css" href="{{asset('dashboardAssets/app-assets/css/bootstrap.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('dashboardAssets/app-assets/css/bootstrap-extended.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('/dashboardAssets/app-assets/css/colors.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('dashboardAssets/app-assets/css/components.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('dashboardAssets/app-assets/css/themes/dark-layout.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('dashboardAssets/app-assets/css/themes/semi-dark-layout.css')}}">


        <!-- BEGIN: Page CSS-->
        <link rel="stylesheet" type="text/css" href="{{asset('dashboardAssets/app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('dashboardAssets/app-assets/css/core/colors/palette-gradient.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('dashboardAssets/app-assets/css/pages/dashboard-analytics.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('dashboardAssets/app-assets/css/pages/card-analytics.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('dashboardAssets/app-assets/css/plugins/tour/tour.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('dashboardAssets/app-assets/css/pages/app-user.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('dashboardAssets/app-assets/css/pages/app-ecommerce-details.css')}}">

        <!-- END: Page CSS-->

        <!-- BEGIN: Custom CSS-->
        <link rel="stylesheet" type="text/css" href="{{asset('dashboardAssets/app-assets/css/custom.css')}}">

        <link rel="stylesheet" type="text/css" href="{{asset('dashboardAssets/assets/css/style.css')}}">
        <!-- END: Custom CSS-->
    @endif
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{asset('dashboardAssets/app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dashboardAssets/app-assets/css/pickers/pickadate/pickadate.css')}}">

</head>
