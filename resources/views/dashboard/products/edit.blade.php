<x-app-layout>
    @section('title', 'Edit Product')
    <div class="card">
        <div class="card-body">
            <div class="text-sm mb-4 text-gray-500">
                <a href="{{ route('dashboard') }}" class="text-blue-600 font-semibold">Dashboard</a> /
                <a href="{{ route('products.index') }}" class="text-blue-600 font-semibold">Products</a> /
                <span>Edit Product</span>
            </div>
            <form method="POST" action="{{ route('products.update', $product->slug) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-6">
                    <label for="name" class="block text-sm mb-2 text-gray-400">Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $product->name ?? '') }}"
                        class="py-3 px-4 text-gray-500 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0">
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="name" class="block text-sm mb-2 text-gray-400">Stock</label>
                    <input type="number" min="0" id="stock" name="stock" value="{{ old('stock', $product->stock ?? '') }}"
                        class="py-3 px-4 text-gray-500 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0">
                    @error('stock')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="category_id" class="block text-sm mb-2 text-gray-400">Category</label>
                    <select id="category_id" name="category_id"
                        class="py-3 px-4 text-gray-500 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0">
                        <option value="">Select Category</option>
                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}" {{ old('category_id', $product->category_id ?? '') == $item->id ? 'selected' : '' }}>
                                {{ $item->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="brand_id" class="block text-sm mb-2 text-gray-400">Brand</label>
                    <select id="brand_id" name="brand_id"
                        class="py-3 px-4 text-gray-500 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0">
                        <option value="">Select Brand</option>
                        @foreach ($brands as $item)
                            <option value="{{ $item->id }}" {{ old('brand_id', $product->brand_id ?? '') == $item->id ? 'selected' : '' }}>
                                {{ $item->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('brand_id')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block text-sm mb-2 text-gray-400">Current Images</label>
                    <div class="flex gap-3">
                        @foreach ($product->images as $image)
                            <div class="relative">
                                <img src="{{ asset('storage/' . $image->image_path) }}"
                                    class="w-20 h-20 object-cover rounded border">
                                <input type="checkbox" name="remove_images[]" value="{{ $image->id }}" class="absolute top-0 right-0">
                            </div>
                        @endforeach
                    </div>
                    <p class="text-xs text-gray-500 mt-2">Centang untuk menghapus gambar</p>
                </div>

                <div class="mb-6">
                    <label for="images" class="block text-sm mb-2 text-gray-400">Upload New Images (Max 5)</label>
                    <input type="file" id="images" name="images[]" multiple
                        class="py-3 px-4 text-gray-500 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0">
                    @error('images.*')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="description" class="block text-sm mb-2 text-gray-400">Description</label>
                    <textarea id="description" name="description"
                        class="py-3 px-4 text-gray-500 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0"
                        placeholder="Product Description">{{ old('description', $product->description ?? '') }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <button class="btn text-base py-2.5 text-white font-medium w-fit hover:bg-blue-700">
                    Update
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
