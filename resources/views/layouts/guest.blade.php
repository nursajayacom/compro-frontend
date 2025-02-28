<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | Nursa Jaya Comp</title>

    @php
        $defaultMetaDescription = 'Nursa Jaya Comp hadir untuk menyediakan tinta, toner, dan perlengkapan kantor berkualitas tinggi dengan layanan profesional dan solusi inovatif.';
    @endphp

    <link rel="shortcut icon" href="{{ asset('assets/images/logo-nursa-jaya-comp.svg') }}" type="image/x-icon">
    <meta property="og:image" itemprop="image" content="@yield('image', url(asset('assets/images/logo-nursa-jaya-comp.svg')))">
    <meta property="og:locale" content="id_ID">
    <meta property="og:type" content="@yield('type', 'website')">
    <meta property="og:title" content="@yield('title', 'Nursa Jaya Com')">
    <meta property="og:description" content="@yield('description', $defaultMetaDescription)">
    <meta property="og:site_name" content="Nursa Jaya Com">
    <meta name="twitter:title" content="@yield('title', 'Nursa Jaya Com')" />
    <meta name="twitter:description" content="@yield('description', $defaultMetaDescription)" />
    <meta name="twitter:image" content="@yield('image', url(asset('assets/images/logo-nursa-jaya-comp.svg')))" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta property="og:url" content="{{ url()->current() }}">
    <link rel="canonical" href="{{ url()->current() }}"/>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/css/theme-guest.css') }}">
    <script src="{{ asset('assets/js/tailwind-config.js') }}"></script>
    @stack('head')
</head>
<body>

    @include('components.guest-header')
    @yield('content')
    @include('components.guest-footer')

    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/guest.js') }}"></script>
    @stack('js')

</body>
</html>
