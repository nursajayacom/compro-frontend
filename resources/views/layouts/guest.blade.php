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

    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Organization",
            "name": "Nursa Jaya Com",
            "url": "{{ url('/') }}",
            "logo": "{{ asset('assets/images/logo-nursa-jaya-comp.svg') }}",
            "description": "Nursa Jaya Comp hadir untuk menyediakan tinta, toner, printer, dan perlengkapan kantor berkualitas tinggi",
            "contactPoint": {
                "@type": "ContactPoint",
                "telephone": "+62 812-4276-7761",
                "contactType": "Lead"
            }
        }
    </script>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/css/theme-guest.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/aos.css') }}">
    <script src="{{ asset('assets/js/tailwind-config.js') }}"></script>
    @stack('head')
</head>
<body>

    @include('components.guest-header')
    @yield('content')
    @include('components.guest-footer')

    <!-- Tombol untuk membuka popup -->
    <a href="http://wa.me/6281242767761" target="_blank" class="fixed bottom-6 right-6 text-white transition duration-300 z-[51]">
        <svg width="72" height="81" viewBox="0 0 72 81" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M58.733 78.08C58.4286 78.9995 57.1256 78.9926 56.831 78.0699L46.657 46.2008C46.3026 45.0908 46.9684 43.9141 48.1024 43.6461L68.5167 38.823C70.0394 38.4632 71.3669 39.9125 70.8753 41.3979L58.733 78.08Z" fill="#07994F"/>
            <rect width="72" height="72" rx="36" fill="#07994F"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M25.9474 21H46.054C46.785 21 47.4158 21 47.938 21.0356C48.4876 21.0731 49.0375 21.1556 49.5808 21.3806C50.8058 21.8881 51.7793 22.8615 52.2867 24.0866C52.5117 24.6298 52.5942 25.1796 52.6318 25.7294C52.6673 26.2515 52.6673 26.8823 52.6673 27.6133V41.0533C52.6673 41.7843 52.6673 42.4152 52.6318 42.9373C52.5942 43.487 52.5117 44.0368 52.2867 44.5802C51.7793 45.8052 50.8058 46.7787 49.5808 47.286C49.0375 47.511 48.4876 47.5935 47.938 47.6312C47.4158 47.6667 46.785 47.6667 46.054 47.6667H25.9473C25.2163 47.6667 24.5855 47.6667 24.0634 47.6312C23.5136 47.5935 22.9638 47.511 22.4206 47.286C21.1954 46.7787 20.2221 45.8052 19.7146 44.5802C19.4896 44.0368 19.4071 43.487 19.3696 42.9373C19.334 42.4152 19.334 41.7843 19.334 41.0533V27.6134C19.334 26.8823 19.334 26.2515 19.3696 25.7294C19.4071 25.1796 19.4896 24.6298 19.7146 24.0866C20.2221 22.8615 21.1954 21.8881 22.4206 21.3806C22.9638 21.1556 23.5136 21.0731 24.0634 21.0356C24.5855 21 25.2163 21 25.9474 21ZM23.1964 24.7963C23.8026 24.1036 24.8555 24.0334 25.5482 24.6395L34.9032 32.825C35.5315 33.3748 36.4698 33.3748 37.0982 32.825L46.4531 24.6395C47.1458 24.0334 48.1988 24.1036 48.8048 24.7963C49.411 25.489 49.3408 26.542 48.6481 27.1481L39.2931 35.3337C37.408 36.9832 34.5933 36.9832 32.7082 35.3337L23.3532 27.1481C22.6605 26.542 22.5903 25.489 23.1964 24.7963Z" fill="white"/>
            <ellipse opacity="0.3" cx="36" cy="51" rx="13" ry="1.25" fill="#F6F9FC"/>
        </svg>
    </a>

    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/guest.js') }}"></script>
    <script src="{{ asset('assets/js/aos.js') }}"></script>
    <script>
        AOS.init();
    </script>
    @stack('js')

</body>
</html>
