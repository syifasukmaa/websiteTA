<!--
=========================================================
* Soft UI Dashboard Tailwind - v1.0.5
=========================================================

* Product Page: https://www.creative-tim.com/product/soft-ui-dashboard-tailwind
* Copyright 2023 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="{{ asset('assets/img/logoMasjid.png') }}" />
    <title>Masjid Jami At Taubah Juanda</title>
    @include('admin.layouts.partials.links')
    @vite('resources/css/app.css')
</head>

<body class="m-0 font-sans text-base antialiased font-normal leading-default bg-gray-50 text-slate-500">
    <!-- sidenav  -->
    @include('admin.layouts.partials.header')

    @yield('contents')
    <!-- end cards -->
    @include('admin.layouts.partials.footer')
    @include('admin.layouts.partials.scripts')
</body>

</html>
