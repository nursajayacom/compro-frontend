<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="{{ asset('assets/images/logo-nursa-jaya-comp.svg') }}" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@2.44.0/tabler-icons.min.css">
    <!-- Core Css -->
    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/theme-dashboard.css') }}" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.css">
    <link rel="stylesheet" href="{{ asset('assets/css/datatable-custom.css') }}">

    @vite(['resources/js/app.js'])

    <title>@yield('title') - Nursa Jaya Comp</title>

</head>
<body class="bg-surface">
    <main>
        <!--start the project-->
        <div id="main-wrapper" class=" flex p-5 xl:pr-0">
           @include('components.sidebar')

           <div class=" w-full page-wrapper xl:px-6 px-0">
              <!-- Main Content -->
              <main class="h-full  max-w-full">
                 <div class="container full-container p-0 flex flex-col gap-6">
                    <!--  Header Start -->
                    @include('components.header')
                    <!--  Header End -->

                    {{ $slot }}
                 </div>
              </main>
              <!-- Main Content End -->
           </div>
        </div>
        <!--end of project-->
     </main>
     <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
     <script src="{{ asset('assets/libs/simplebar/dist/simplebar.min.js') }}"></script>
     <script src="{{ asset('assets/libs/iconify-icon/dist/iconify-icon.min.js') }}"></script>
     <script src="{{ asset('assets/libs/@preline/dropdown/index.js') }}"></script>
     <script src="{{ asset('assets/libs/@preline/overlay/index.js') }}"></script>
     <script src="{{ asset('assets/js/sidebarmenu.js') }}"></script>
     <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

     @stack('script')
</body>
</html>
