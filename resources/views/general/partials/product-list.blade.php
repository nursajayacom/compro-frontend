@foreach ($products as $product)
    <a href="{{ route('general.product-detail', $product->slug) }}">
        <div class="text-center">
            <img src="{{ asset('storage/' . $product->images->first()->image_path) }}" alt="{{ $product->name }}" class="w-full h-40 sm:h-80 object-cover mb-4">
            <h3 class="text-base font-semibold">{{ $product->name }}</h3>
            <p class="text-sm text-gray-500">{{ $product->category->name }}</p>
        </div>
    </a>
@endforeach
