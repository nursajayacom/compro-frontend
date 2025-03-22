<header class="fixed top-0 left-0 w-full flex py-4 px-6 sm:px-16 bg-white font-[sans-serif] min-h-[70px] tracking-wide z-50">
    <div class="flex items-center justify-between w-full">
        <!-- Logo (kiri) -->
        <a href="{{ route('general.home') }}" class="flex-shrink-0">
            <img src="{{ asset('assets/images/logo-nursa-jaya-comp.svg') }}" alt="logo" class="w-full h-7" />
        </a>

        <!-- Navbar (tengah - hanya desktop) -->
        <nav class="hidden lg:flex flex-1 justify-center">
            <ul class="flex gap-x-8">
                <li><a href="{{ route('general.home') }}" class="{{ request()->routeIs('general.home') ? 'font-bold' : '' }} text-gray-primary text-[15px]">Beranda</a></li>
                <li><a href="{{ route('general.product') }}" class="{{ request()->routeIs('general.product') ? 'font-bold' : '' }} text-gray-primary text-[15px]">Produk</a></li>
                <li><a href="{{ route('general.our-service') }}" class="{{ request()->routeIs('general.our-service') ? 'font-bold' : '' }} text-gray-primary text-[15px]">Layanan Kami</a></li>
                <li><a href="{{ route('general.about-us') }}" class="{{ request()->routeIs('general.about-us') ? 'font-bold' : '' }} text-gray-primary text-[15px]">Tentang Kami</a></li>
                <li><a href="{{ route('general.news') }}" class="{{ request()->routeIs('general.news') ? 'font-bold' : '' }} text-gray-primary text-[15px]">Berita</a></li>
            </ul>
        </nav>

        <!-- Kontak (kanan - desktop) & Hamburger (mobile) -->
        <div class="flex items-center">
            <div class="flex flex-row gap-4">
                <!-- Search -->
                <button href="{{ route('general.contact-us') }}" id="searchBtn"
                    class="hidden lg:inline-block">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16.6725 16.6412L21 21M19 11C19 15.4183 15.4183 19 11 19C6.58172 19 3 15.4183 3 11C3 6.58172 6.58172 3 11 3C15.4183 3 19 6.58172 19 11Z" stroke="#333333" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
                <!-- Contact -->
                <a href="{{ route('general.contact-us') }}"
                    class="hidden lg:inline-block py-2 px-4 border border-[#333333] text-secondary rounded-full">
                    Hubungi Kami
                </a>
            </div>
            <div class="lg:hidden ml-4 flex gap-6">
               <div class="flex flex-row gap-2">
                    <!-- Search -->
                    <button id="searchBtnMobile">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.6725 16.6412L21 21M19 11C19 15.4183 15.4183 19 11 19C6.58172 19 3 15.4183 3 11C3 6.58172 6.58172 3 11 3C15.4183 3 19 6.58172 19 11Z" stroke="#333333" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                    <!-- Contact -->
                    <a href="{{ route('general.contact-us') }}" class="py-1 px-3 border border-[#333333] text-secondary rounded-full text-sm">
                        Hubungi Kami
                    </a>
               </div>
                <button id="toggleOpen">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4 12H20M4 8H20M4 16H12" stroke="#333333" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Sidebar (mobile) -->
    <div id="mobileMenu" class="fixed top-0 left-0 w-64 h-full bg-white shadow-lg transform -translate-x-full transition-transform duration-300 z-50">
        <div class="flex justify-between items-center p-4 border-b">
            <a href="{{ route('general.home') }}">
                <img src="{{ asset('assets/images/logo-nursa-jaya-comp.svg') }}" alt="logo" class="w-full h-7" />
            </a>
            <button id="toggleClose" class="text-gray-700">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M6 18L18 6M6 6L18 18" stroke="#222222" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>
        </div>
        <ul class="p-6 space-y-4">
            <li><a href="{{ route('general.home') }}" class="{{ request()->routeIs('general.home') ? 'font-bold' : '' }} block text-gray-800 text-[15px]">Beranda</a></li>
            <li><a href="{{ route('general.product') }}" class="{{ request()->routeIs('general.product') ? 'font-bold' : '' }} block text-gray-800 text-[15px]">Produk</a></li>
            <li><a href="{{ route('general.our-service') }}" class="{{ request()->routeIs('general.our-service') ? 'font-bold' : '' }} block text-gray-800 text-[15px]">Layanan Kami</a></li>
            <li><a href="{{ route('general.about-us') }}" class="{{ request()->routeIs('general.about-us') ? 'font-bold' : '' }} block text-gray-800 text-[15px]">Tentang Kami</a></li>
            <li><a href="{{ route('general.news') }}" class="{{ request()->routeIs('general.news') ? 'font-bold' : '' }} block text-gray-800 text-[15px]">Berita</a></li>
        </ul>
    </div>

    <!-- Overlay saat menu mobile terbuka -->
    <div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 hidden z-40"></div>
</header>

<div id="searchOverlay" class="fixed w-full min-h-[70px] bg-white flex px-6 sm:px-16 top-0 z-[100] hidden">
    <div class="w-full relative flex items-center">
        <span class="absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-500">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M16.6725 16.6412L21 21M19 11C19 15.4183 15.4183 19 11 19C6.58172 19 3 15.4183 3 11C3 6.58172 6.58172 3 11 3C15.4183 3 19 6.58172 19 11Z" stroke="#333333" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </span>
        <input id="searchInput" type="text" placeholder="Search..." class="w-full py-3 pl-16 pr-12 focus:outline-none" />
        <button id="closeSearch" class=" text-gray-700 hover:text-black">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M18 18L12 12M12 12L6 6M12 12L18 6M12 12L6 18" stroke="#333333" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </button>
    </div>
</div>

<script>
    document.getElementById('searchInput').addEventListener('keydown', function (e) {
        if (e.key === 'Enter') {
            const query = this.value.trim();
            if (query) {
                window.location.href = `{{ route('general.product') }}?search=${encodeURIComponent(query)}`;
            }
        }
    });
</script>
