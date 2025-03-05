@extends('layouts.guest')

@section('title', 'Product')

@section('content')
@if (!$search && !$categorySlug)
    <div class="pt-20 px-6 sm:px-16">
        <a href="">
            <img src="{{ asset('assets/images/banner-2.png')}}" alt="Slide 1" class="w-full object-cover" draggable="false">
        </a>
    </div>
@endif

<div class="py-10 sm:py-20 px-6 sm:px-16">
    <div class="flex flex-col gap-4">
        <!-- Sidebar Kategori (Desktop) -->
        <aside class="hidden md:grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
            @foreach ($categories as $category)
            <div class="p-4 relative overflow-hidden min-h-[170px] border border-[#DEE3ED] rounded-lg bg-[#F6F9FC] z-0">
                <!-- Nama Kategori dan Link -->
                <div class="relative z-10">
                    <p class="font-bold mt-2 text-[#293B53] text-lg mb-2">{{ $category->name }}</p>
                    <a href="{{ route('general.product', ['search' => $search, 'category' => $category->slug]) }}" class="text-[#E74C62] text-xs font-semibold flex flex-row items-center gap-2">
                        Lihat Produk
                        <svg width="11" height="10" viewBox="0 0 11 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2.65528 4.99999H8.54784M8.54784 4.99999L5.89619 2.34834M8.54784 4.99999L5.89619 7.65164" stroke="#E74C62" stroke-width="0.8" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>
                </div>

                <!-- Gambar Kategori -->
                <div class="absolute bottom-0 right-0 w-full h-[150px] -mt-6 -mr-6 z-0">
                    <img src="{{ Storage::url($category->image) }}" alt="{{ $category->name }}" class="w-full h-full object-cover">
                </div>
            </div>
            @endforeach
        </aside>
        {{-- <aside class=" mb-8 lg:mb-0">
            <ul class="space-y-2 text-gray-700">
                <li><a href="{{ route('general.product', ['search' => $search]) }}" class="{{ !$categorySlug ? 'font-semibold text-blue-600' : '' }}">Semua</a></li>
                @foreach ($categories as $category)
                    <li>
                        <a href="{{ route('general.product', ['search' => $search, 'category' => $category->slug]) }}"
                            class="{{ $categorySlug == $category->slug ? 'font-semibold text-blue-600' : '' }}">
                            {{ $category->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </aside> --}}

        <div class="w-full mt-2 md:mt-16">
            @if($search)
                <h2 class="mb-6 text-primary">Menampilkan {{ $countProduct }} barang untuk <span class="font-bold">"{{ $search }}"</span></h2>
            @endif

            <!-- Produk -->
            <main id="product-list" class="grid grid-cols-2 lg:grid-cols-4 gap-6">
                @include('general.partials.product-list', ['products' => $products])
            </main>

            @if ($products->hasMorePages() && $products)
                <div id="loadMoreTrigger" class="text-center py-4">
                    <span class="text-gray-500">Loading more products...</span>
                </div>
            @endif

            @unless($products->count())
                <div class="flex flex-col items-center justify-center w-full gap-2 text-center">
                    <img src="{{ asset('assets/images/product-is-empty.png') }}" alt="Produk Kosong">
                    <h2 class="text-primary text-2xl font-bold">Produk tidak ditemukan</h2>
                    <p class="w-full sm:w-1/3 text-[#5A5B5D]">Coba kategori atau pencarian lain 😊</p>
                </div>
            @endunless
        </div>
    </div>

      <!-- Tombol Filter (Mobile) -->
    <button
        onclick="toggleFilter()"
        class="fixed bottom-0 left-0 right-0 lg:hidden py-3 text-base font-semibold border-t-[#F7F7F7] text-primary bg-white w-full shadow-lg z-50"
    >
        Filter
    </button>

      <!-- Modal Filter (Mobile) -->
    <div id="filterModal" class="fixed bottom-0 left-0 right-0 z-50 bg-white rounded-t-2xl shadow-2xl p-4 filter-modal">
        <div class="flex justify-between items-center border-b pb-2 mb-4">
            <h2 class="text-xl font-semibold">Filter Kategori</h2>
            <button onclick="toggleFilter()" class="text-gray-600 text-2xl font-bold">&times;</button>
        </div>
        <ul class="space-y-2 text-gray-700">
            <li><a href="{{ route('general.product', ['search' => $search]) }}" class="{{ !$categorySlug ? 'font-semibold text-blue-600' : '' }}">Semua</a></li>
            @foreach ($categories as $category)
                <li>
                    <a href="{{ route('general.product', ['search' => $search, 'category' => $category->slug]) }}"
                        class="{{ $categorySlug == $category->slug ? 'font-semibold text-blue-600' : '' }}">
                        {{ $category->name }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>

      <!-- Overlay -->
    <div id="overlay" onclick="toggleFilter()" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden"></div>
</div>
@endsection

@push('js')
<script>
    // START FILTER PRODUCT CATEGORY
    const filterModal = document.getElementById('filterModal');
    const overlayFilter = document.getElementById('overlay');

    function toggleFilter() {
        filterModal.classList.toggle('open');
        overlayFilter.classList.toggle('hidden');
    }
    // END FILTER PRODUCT CATEGORY

    document.addEventListener('DOMContentLoaded', function () {
        const loadMoreTrigger = document.getElementById('loadMoreTrigger');
        let page = {{ $products->currentPage() }};
        const lastPage = {{ $products->lastPage() }};
        const searchQuery = '{{ request('search') }}';
        const categoryQuery = '{{ request('category') }}';

        if (loadMoreTrigger) {
            const observer = new IntersectionObserver(entries => {
                if (entries[0].isIntersecting && page < lastPage) {
                    loadMoreProducts();
                }
            }, { threshold: 0.1 });

            observer.observe(loadMoreTrigger);

            function loadMoreProducts() {
                page++;
                fetch(`{{ route('general.product.load') }}?page=${page}&search=${searchQuery}&category=${categoryQuery}`)
                    .then(response => response.text())
                    .then(html => {
                        document.getElementById('product-list').insertAdjacentHTML('beforeend', html);
                        if (page >= lastPage) loadMoreTrigger.remove();
                    });
            }
        }
    });
</script>
@endpush
