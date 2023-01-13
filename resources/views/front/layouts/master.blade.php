<!DOCTYPE html>
<html lang="{{app()->getLocale()=='ar'?'ar':'en'}}" dir="{{app()->getLocale()=='ar'?'rtl':'ltr'}}">
    @include('front.layouts.head')
    <body id="page-top">
        @yield('content')
        @include('front.layouts.footer')
    </body>
</html>
