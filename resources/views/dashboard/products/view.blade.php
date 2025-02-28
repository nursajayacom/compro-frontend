<x-app-layout>
    @section('title', 'Detail Product')
    <div class="card">
        <div class="card-body">
            <div class="text-sm mb-4 text-gray-500">
                <a href="{{ route('dashboard') }}" class="text-blue-600 font-semibold">Dashboard</a> /
                <a href="{{ route('products.index') }}" class="text-blue-600 font-semibold">Products</a> /
                <span>Detail Product</span>
            </div>

            <div class="mb-6">
                <label for="name" class="block text-sm mb-2 text-gray-400">Name</label>
                <p>{{ $product->name }}</p>
            </div>

            <div class="mb-6">
                <label for="name" class="block text-sm mb-2 text-gray-400">Stock</label>
                <p>{{ $product->stock ?: '-' }}</p>
            </div>

            <div class="mb-6">
                <label for="category" class="block text-sm mb-2 text-gray-400">Category</label>
                <p>{{ $product->category->name ?? '-' }}</p>
            </div>

            <div class="mb-6">
                <label for="brand" class="block text-sm mb-2 text-gray-400">Brand</label>
                <p>{{ $product->brand->name ?? '-' }}</p>
            </div>

            <div class="mb-6">
                <label for="description" class="block text-sm mb-2 text-gray-400">Description</label>
                <p>{{ $product->description }}</p>
            </div>

            <label for="description" class="block text-sm mb-2 text-gray-400">Product Images</label>
            <div class="flex flex-wrap gap-2">
                @forelse ($product->images as $image)
                    <img src="{{ asset('storage/' . $image->image_path) }}" alt="Product Image" class="w-32 h-32 object-cover">
                @empty
                    -
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
