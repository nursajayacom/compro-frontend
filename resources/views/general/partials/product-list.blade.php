@foreach ($products as $product)
    <a href="{{ route('general.product-detail', $product->slug) }}" class="bg-white rounded-lg border border-[#DEE3ED]" data-aos="fade-down">
        <div class="relative w-full aspect-square">
            {{-- @if ($product->stock == 0)
                <span class="absolute top-0 left-0 bg-gray-200 text-secondary px-2 py-1 rounded-br-lg rounded-tl font-bold text-xs md:text-base">Tidak Tersedia</span>
            @endif --}}
            <img src="{{ Storage::url($product->images->first()->image_path) }}" alt="{{ $product->name }}" class="w-full h-full object-contain rounded-t">
        </div>
        <div class="px-2 md:px-4 py-4 md:py-6">
            <p class="font-bold text-sm md:text-lg text-primary line-clamp-2">{{ $product->name }}</p>
            <p class="text-secondary text-xs md:text-sm">{{ $product->category->name }}</p>
        </div>
    </a>
@endforeach
