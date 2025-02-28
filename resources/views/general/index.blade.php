@extends('layouts.guest')

@section('title', 'Beranda')

@push('head')
    <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.min.css') }}">
@endpush

@section('content')
<div class="py-20 px-6 sm:px-16">
    <div class="relative w-full overflow-hidden h-full rounded-lg shadow-lg">
        <!-- Slides Wrapper -->
        <div id="carousel-slides" class="relative flex transition-transform duration-500 ease-in-out">
            <!-- Slide 1 -->
            <div class="w-full flex-shrink-0 relative h-full">
                <a href="https://www.tokopedia.com/nursajayatoner" target="_blank">
                    <img src="{{ asset('assets/images/banner-1.png') }}" alt="Nursa Jaya Comp Tokopedia" class="w-full object-cover">
                </a>
            </div>
            <!-- Slide 2 -->
            <div class="w-full flex-shrink-0 relative h-full">
                <a href="https://shopee.co.id/nursajayatoner" target="_blank">
                    <img src="{{ asset('assets/images/banner-home-2.png') }}" alt="Nursa Jaya Comp Shopee" class="w-full object-cover">
                </a>
            </div>
            <!-- Slide 3 -->
            <div class="w-full flex-shrink-0 relative h-full">
                <a href="https://www.lazada.co.id/shop/nursa-jayatoner" target="_blank">
                    <img src="{{ asset('assets/images/banner-home-3.png') }}" alt="Nursa Jaya Comp Lazada" class="w-full object-cover">
                </a>
            </div>
        </div>

        <!-- Navigation Arrows -->
        <button id="prev-btn" class="absolute top-1/2 left-2 transform -translate-y-1/2">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0_93_1054)">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M8.598 12.66L14.3408 18.405C14.634 18.6975 15.1088 18.6975 15.402 18.405C15.6945 18.105 15.6945 17.6325 15.402 17.34L10.0605 12L15.402 6.66C15.6945 6.3675 15.6945 5.89497 15.402 5.59497C15.1088 5.30247 14.634 5.30247 14.3408 5.59497L8.598 11.34C8.41875 11.52 8.3625 11.7675 8.40375 12C8.3625 12.2325 8.41875 12.48 8.598 12.66ZM12 0C18.627 0 24 5.37 24 12C24 18.63 18.627 24 12 24C5.373 24 0 18.63 0 12C0 5.37 5.373 0 12 0Z" fill="#F5B7C0"/>
                </g>
                <defs>
                <clipPath id="clip0_93_1054">
                <rect width="24" height="24" fill="white" transform="matrix(-1 0 0 1 24 0)"/>
                </clipPath>
                </defs>
            </svg>
        </button>
        <button id="next-btn" class="absolute top-1/2 right-2 transform -translate-y-1/2">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M15.402 12.66L9.65925 18.405C9.366 18.6975 8.89125 18.6975 8.598 18.405C8.3055 18.105 8.3055 17.6325 8.598 17.34L13.9395 12L8.598 6.66C8.3055 6.3675 8.3055 5.89497 8.598 5.59497C8.89125 5.30247 9.366 5.30247 9.65925 5.59497L15.402 11.34C15.5813 11.52 15.6375 11.7675 15.5962 12C15.6375 12.2325 15.5813 12.48 15.402 12.66ZM12 0C5.373 0 0 5.37 0 12C0 18.63 5.373 24 12 24C18.627 24 24 18.63 24 12C24 5.37 18.627 0 12 0Z" fill="#F5B7C0"/>
            </svg>
        </button>

        <!-- Indicators -->
        <div class="absolute bottom-4 w-full px-24 left-1/2 transform -translate-x-1/2 flex space-x-2">
            <span class="indicator w-1/3 h-1 rounded-full bg-step-active cursor-pointer" data-slide="0"></span>
            <span class="indicator w-1/3 h-1 rounded-full bg-step-inactive cursor-pointer" data-slide="1"></span>
            <span class="indicator w-1/3 h-1 rounded-full bg-step-inactive cursor-pointer" data-slide="2"></span>
        </div>
    </div>
</div>

<div class="py-20 px-6 sm:px-16">
    <section class="max-w-7xl">
        <h2 class="text-center text-3xl font-semibold mb-8 text-primary">Produk Terlaris</h2>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <div class="bg-card rounded-2xl p-6 flex flex-col items-center">
                <img src="{{ asset('storage/' .$products->first()->images->first()->image_path) }}" alt="{{ $products->first()->name }}" class="w-full max-w-md object-contain">
                <div class="text-center mt-4">
                    <h3 class="font-bold text-2xl text-primary">{{ $products->first()->name }}</h3>
                    <p class="text-secondary text-lg">{{ $products->first()->category->name }}</p>
                </div>
            </div>
            <!-- Produk Kecil -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @foreach ($products as $product)
                    @if ($loop->first)
                        @continue
                    @endif
                    <div class="bg-card rounded-2xl p-4 flex flex-col items-center">
                        <img src="{{ asset('storage/' .$product->images->first()->image_path) }}" alt="Epson EcoTank L3250" class="w-full h-[280px] object-cover">
                        <div class="text-center mt-2">
                            <h3 class="font-bold text-lg">{{ $product->name }}</h3>
                            <p class="text-secondary text-base">{{ $product->category->name }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</div>

<div class="py-20 px-6 sm:px-16">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
        <div>
        <h2 class="text-3xl sm:text-4xl font-bold text-gray-800 mb-4">
            Solusi Lengkap Tinta, Toner, dan <br class="hidden sm:block" />
            Perlengkapan Kantor untuk Bisnis Anda
        </h2>
        <p class="text-gray-600 text-base sm:text-lg leading-relaxed">
            Nursa Jaya Comp, solusi kebutuhan tinta, toner, dan perlengkapan kantor sejak 2016.
            Tersedia di Tokopedia, Shopee, dan Lazada untuk menjangkau seluruh Indonesia dengan layanan cepat dan produk berkualitas.
        </p>
        </div>
        <div>
        <img
            src="{{ asset('assets/images/banner-short-about-us.png') }}"
            alt="Printer dengan hasil cetakan berwarna"
            class="w-full object-cover"
        />
        </div>
    </div>
</div>

<div class="py-20 px-6 sm:px-16">
    <div class="flex gap-6 overflow-x-auto scrollbar-hide">
        @foreach ($categories as $category)
            <div class="relative rounded-2xl overflow-hidden group p-4 cursor-pointer bg-card-category min-w-[224px] min-h-[280px]">
                <img src="{{ asset('storage/' . $category->image) }}"
                alt="{{ $category->name }} - Nursa Jaya Comp"
                class="w-full object-cover rounded-xl h-60" />
                <h4 class="mt-4 text-lg font-bold text-[#293B53]">{{ $category->name }}</h4>
            </div>
        @endforeach
    </div>
</div>

<div class="py-20 px-6 sm:px-16">
    <div class="flex flex-col sm:flex-row gap-6 sm:justify-between sm:items-center mb-8">
        <h2 class="text-3xl font-bold text-primary sm:w-1/3">
            Jangan Ketinggalan! Berita Terbaru dan Peristiwa Penting
        </h2>
        <a href="{{ route('general.news') }}" class="w-max relative group inline-flex items-center bg-primary-btn text-base text-white font-bold py-4 px-6 rounded-full overflow-hidden hover:bg-primary-hover-btn transition-all duration-300">
            Lihat Semua
        </a>
    </div>

    <div class="flex gap-6 overflow-x-auto scrollbar-hide">
        @foreach ($news as $item)
            <a href="{{ $item['link'] }}" target="_blank">
                <div class="relative rounded-2xl overflow-hidden group cursor-pointer min-w-[280px] min-h-[380px]">
                    <img
                        src="{{ $item['image'] }}"
                        alt="{{ $item['title'] }}"
                        class="w-full h-[380px] object-cover"
                    />
                    <div class="absolute inset-0 bg-black bg-opacity-30 transition-opacity group-hover:bg-opacity-50"></div>
                    <div class="absolute bottom-4 left-4 right-4 flex items-center justify-between">
                        <p class="text-white font-semibold text-lg max-w-[80%]">
                            {{ $item['title'] }}
                        </p>
                        <span class="opacity-0 translate-x-0 group-hover:opacity-100 group-hover:translate-x-2 transition-all duration-300 ease-in-out text-white text-xl">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7 17L17 7M17 7H8M17 7V16" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </span>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>

<div class="py-20 px-6 sm:px-16">
    <a href="https://blibli.onelink.me/GNtk/a49c5djs" target="_blank">
        <img src="{{ asset('assets/images/banner-3.png') }}" alt="Nursa Jaya Com Blibli" class="w-full object-cover" draggable="false">
    </a>
</div>

{{-- <div class="py-20 px-6 sm:px-16">
    <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">Apa Kata Mereka</h2>
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-8">
        <div class="flex flex-col gap-8">
            <div class="hidden sm:block sm:h-1/2"></div>
            <div class="bg-white rounded-2xl p-6 border border-[#DEE3ED] flex flex-col justify-between">
                <div>
                    <span class="text-4xl text-gray-400">“</span>
                    <p class="text-gray-700 mt-2">Kami sudah menggunakan printer ini selama berbulan-bulan, dan kualitasnya tetap konsisten. Dukungan teknisnya juga cepat dan responsif. Terima kasih atas pelayanan terbaiknya!</p>
                </div>
                <div class="flex items-center gap-3 mt-6">
                    <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Karina Argachie" class="w-10 h-10 rounded-full object-cover" />
                    <p class="text-sm font-semibold text-gray-800">Karina Argachie</p>
                </div>
            </div>
            <div class="bg-white rounded-2xl p-6 border border-[#DEE3ED] flex flex-col justify-between">
                <div>
                    <span class="text-4xl text-gray-400">“</span>
                    <p class="text-gray-700 mt-2">Kami sudah menggunakan printer ini selama berbulan-bulan, dan kualitasnya tetap konsisten. Dukungan teknisnya juga cepat dan responsif. Terima kasih atas pelayanan terbaiknya!</p>
                </div>
                <div class="flex items-center gap-3 mt-6">
                    <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Karina Argachie" class="w-10 h-10 rounded-full object-cover" />
                    <p class="text-sm font-semibold text-gray-800">Karina Argachie</p>
                </div>
            </div>
            <div class="hidden sm:block sm:h-1/2"></div>
        </div>
        <div class="flex flex-col gap-8">
            <div class="bg-white rounded-2xl p-6 border border-[#DEE3ED] flex flex-col justify-between">
                <div>
                    <span class="text-4xl text-gray-400">“</span>
                    <p class="text-gray-700 mt-2">Kami sudah menggunakan printer ini selama berbulan-bulan, dan kualitasnya tetap konsisten. Dukungan teknisnya juga cepat dan responsif. Terima kasih atas pelayanan terbaiknya!</p>
                </div>
                <div class="flex items-center gap-3 mt-6">
                    <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Karina Argachie" class="w-10 h-10 rounded-full object-cover" />
                    <p class="text-sm font-semibold text-gray-800">Karina Argachie</p>
                </div>
            </div>
            <div class="bg-white rounded-2xl p-6 border border-[#DEE3ED] flex flex-col justify-between">
                <div>
                    <span class="text-4xl text-gray-400">“</span>
                    <p class="text-gray-700 mt-2">Kami sudah menggunakan printer ini selama berbulan-bulan, dan kualitasnya tetap konsisten. Dukungan teknisnya juga cepat dan responsif. Terima kasih atas pelayanan terbaiknya!</p>
                </div>
                <div class="flex items-center gap-3 mt-6">
                    <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Karina Argachie" class="w-10 h-10 rounded-full object-cover" />
                    <p class="text-sm font-semibold text-gray-800">Karina Argachie</p>
                </div>
            </div>
            <div class="bg-white rounded-2xl p-6 border border-[#DEE3ED] flex flex-col justify-between">
                <div>
                    <span class="text-4xl text-gray-400">“</span>
                    <p class="text-gray-700 mt-2">Kami sudah menggunakan printer ini selama berbulan-bulan, dan kualitasnya tetap konsisten. Dukungan teknisnya juga cepat dan responsif. Terima kasih atas pelayanan terbaiknya!</p>
                </div>
                <div class="flex items-center gap-3 mt-6">
                    <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Karina Argachie" class="w-10 h-10 rounded-full object-cover" />
                    <p class="text-sm font-semibold text-gray-800">Karina Argachie</p>
                </div>
            </div>
        </div>
        <div class="flex flex-col gap-8">
            <div class="hidden sm:block sm:h-1/2"></div>
            <div class="bg-white rounded-2xl p-6 border border-[#DEE3ED] flex flex-col justify-between">
                <div>
                    <span class="text-4xl text-gray-400">“</span>
                    <p class="text-gray-700 mt-2">Kami sudah menggunakan printer ini selama berbulan-bulan, dan kualitasnya tetap konsisten. Dukungan teknisnya juga cepat dan responsif. Terima kasih atas pelayanan terbaiknya!</p>
                </div>
                <div class="flex items-center gap-3 mt-6">
                    <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Karina Argachie" class="w-10 h-10 rounded-full object-cover" />
                    <p class="text-sm font-semibold text-gray-800">Karina Argachie</p>
                </div>
            </div>
            <div class="bg-white rounded-2xl p-6 border border-[#DEE3ED] flex flex-col justify-between">
                <div>
                    <span class="text-4xl text-gray-400">“</span>
                    <p class="text-gray-700 mt-2">Kami sudah menggunakan printer ini selama berbulan-bulan, dan kualitasnya tetap konsisten. Dukungan teknisnya juga cepat dan responsif. Terima kasih atas pelayanan terbaiknya!</p>
                </div>
                <div class="flex items-center gap-3 mt-6">
                    <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Karina Argachie" class="w-10 h-10 rounded-full object-cover" />
                    <p class="text-sm font-semibold text-gray-800">Karina Argachie</p>
                </div>
            </div>
            <div class="hidden sm:block sm:h-1/2"></div>
        </div>
    </div>


    <div class="flex justify-center mt-10">
        <a href="#" class="w-max relative group inline-flex items-center bg-primary-btn text-base text-white font-bold py-4 px-6 rounded-full overflow-hidden hover:bg-primary-hover-btn transition-all duration-300">
            Lihat Semua
        </a>
    </div>
</div> --}}

<div class="py-20 px-6 sm:px-16">
    <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">Kolaborasi dengan yang Terbaik</h2>
    <!-- Swiper -->
    <div class="swiper mySwiper pt-10">
        <div class="swiper-wrapper">
            <!-- Logo Items -->
            <div class="swiper-slide">
                <img src="{{ asset('assets/images/logo-canon.png') }}" alt="Canon" class="mx-auto">
            </div>
            <div class="swiper-slide">
                <img src="{{ asset('assets/images/logo-hp.png') }}" alt="Hp" class="mx-auto">
            </div>
            <div class="swiper-slide">
                <img src="{{ asset('assets/images/logo-samsung.png') }}" alt="Samsung" class="mx-auto">
            </div>
            <div class="swiper-slide">
                <img src="{{ asset('assets/images/logo-toshiba.png') }}" alt="Toshiba" class="mx-auto">
            </div>
            <div class="swiper-slide">
                <img src="{{ asset('assets/images/logo-fargo.png') }}" alt="Fargo" class="mx-auto">
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
<script>
    // START CAROUSEL
    const slides = document.getElementById('carousel-slides');
    const indicators = document.querySelectorAll('.indicator');
    const totalSlides = indicators.length;
    let currentSlide = 0;

    function showSlide(index) {
        currentSlide = (index + totalSlides) % totalSlides; // looping slide
        slides.style.transform = `translateX(-${currentSlide * 100}%)`;

        indicators.forEach((indicator, i) => {
        indicator.classList.toggle('bg-step-active', i === currentSlide);
        indicator.classList.toggle('bg-step-inactive', i !== currentSlide);
        });
    }

    document.getElementById('prev-btn').addEventListener('click', () => showSlide(currentSlide - 1));
    document.getElementById('next-btn').addEventListener('click', () => showSlide(currentSlide + 1));

    indicators.forEach(indicator => {
        indicator.addEventListener('click', () => showSlide(parseInt(indicator.dataset.slide)));
    });

    // Auto-slide every 5 seconds
    setInterval(() => showSlide(currentSlide + 1), 10000);

    showSlide(0); // initial load
    // END CAROUSEL

    // START SWIPER
    const swiper = new Swiper(".mySwiper", {
        slidesPerView: 2, // Pada mobile, tampil 1 logo
        spaceBetween: 20, // Jarak antar logo
        breakpoints: {
            768: {
                slidesPerView: 2, // Pada tablet, tampil 2 logo
            },
            1024: {
                slidesPerView: 4, // Pada desktop, tampil 4 logo
            }
        },
        loop: true, // Infinite scroll
        autoplay: {
            delay: 3000, // 3 detik
            disableOnInteraction: false, // Tidak berhenti saat user berinteraksi
        },
    });
    // END SWIPER

    // START CHANGE IMAGE DETAIL PRODUCT
    function changeImage(thumbnail) {
        const mainImage = document.getElementById('mainImage');
        mainImage.src = thumbnail.src;

        document.querySelectorAll('.thumbnail').forEach(img => img.classList.remove('active'));
        thumbnail.classList.add('active');
        }

        function scrollThumbnails(amount) {
    document.getElementById('thumbnailSlider').scrollBy({ left: amount, behavior: 'smooth' });
    }
    // END CHANGE IMAGE DETAIL PRODUCT
</script>
@endpush
