@extends('layouts.guest')

@section('title', 'Detail Product - '. $product->name)

@section('content')
<div class="py-20 px-6 sm:px-16">
    <a href="{{ route('general.product') }}" class="flex items-center text-primary hover:text-gray-800 mb-6 font-bold">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
        Kembali
    </a>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
        <!-- Thumbnails & Main Image -->
        <div class="flex flex-col items-center lg:items-start space-y-4">
            <div class="flex flex-col items-center lg:items-start w-full">
                <img id="mainImage" class="w-full h-[300px] md:h-[400px] object-contain rounded-lg border mb-4" />
                <div class="relative w-full max-w-md">
                    {{-- <button onclick="scrollThumbnails(-100)" class="absolute left-0 top-1/2 -translate-y-1/2 bg-white shadow rounded-full p-1 hidden md:block">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button> --}}
                    <div id="thumbnailContainer" class="relative">
                        <div id="thumbnailSlider" class="thumbnail-slider flex overflow-x-auto space-x-2 py-2">
                            @foreach ($product->images as $item)
                                <img src="{{ Storage::url($item->image_path) }}" onclick="changeImage(this)" class="thumbnail w-20 h-20 aspect-square object-cover rounded cursor-pointer @if($loop->first) active @endif" alt="{{ $product->name }}" />
                            @endforeach
                        </div>
                    </div>
                    {{-- <button onclick="scrollThumbnails(100)" class="absolute right-0 top-1/2 -translate-y-1/2 bg-white shadow rounded-full p-1 hidden md:block">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button> --}}
                </div>
            </div>
        </div>

        <!-- Product Details -->
        <div>
            <h1 class="text-3xl text-primary font-bold mb-2">{{ $product->name }}</h1>
            <p class="text-secondary mb-4">{{ $product->category->name }} • {{ $product->brand->name }} • Stok <span class="text-triary">Tersedia</span></p>

            <div class="border-t pt-4 mt-4">
                <h2 class="text-secondary">Deskripsi</h2>
                <div class="text-primary leading-6 whitespace-pre-line">
                    {{ $product->description }}
                </div>
            </div>
        </div>
    </div>

    <hr class="border border-[#DEE3ED] mt-10">

    <!-- Related Products -->
    <div class="mt-10">
        <h2 class="text-lg text-primary font-bold mb-4">Produk Terkait</h2>
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-6 mt-8">
            @include('general.partials.product-list', ['products' => $recommendProduct])
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    changeImage(document.querySelector('.thumbnail.active'));

    function changeImage(thumbnail) {
        const mainImage = document.getElementById('mainImage');
        mainImage.src = thumbnail.src;

        document.querySelectorAll('.thumbnail').forEach(img => img.classList.remove('active'));
        thumbnail.classList.add('active');
    }

    function scrollThumbnails(amount) {
        document.getElementById('thumbnailSlider').scrollBy({ left: amount, behavior: 'smooth' });
    }
</script>
@endpush
