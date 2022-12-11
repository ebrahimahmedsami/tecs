<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
    @include('components.dashboard.layouts.head')

    <body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static   menu-collapsed" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

        @include('components.dashboard.layouts.navbar')

        @include('components.dashboard.layouts.sidebar')

            @yield('content')

        <div class="sidenav-overlay"></div>
        <div class="drag-target"></div>

        @include('components.dashboard.layouts.footer')

    </body>

</html>
