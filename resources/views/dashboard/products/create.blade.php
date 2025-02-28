<x-app-layout>
    @section('title', 'Add Product')
    <div class="card">
        <div class="card-body">
            <div class="text-sm mb-4 text-gray-500">
                <a href="{{ route('dashboard') }}" class="text-blue-600 font-semibold">Dashboard</a> /
                <a href="{{ route('products.index') }}" class="text-blue-600 font-semibold">Products</a> /
                <span>Add Product</span>
            </div>
            <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-6">
                    <label for="name" class="block text-sm mb-2 text-gray-400">Name <span class="text-red-600">*</span></label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}"
                        class="py-3 px-4 text-gray-500 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0">
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="name" class="block text-sm mb-2 text-gray-400">Stock</label>
                    <input type="number" min="0" id="stock" name="stock" value="{{ old('stock') }}"
                        class="py-3 px-4 text-gray-500 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0">
                    @error('stock')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="category_id" class="block text-sm mb-2 text-gray-400">Category <span class="text-red-600">*</span></label>
                    <select id="category_id" name="category_id"
                        class="py-3 px-4 text-gray-500 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0">
                        <option value="">Select Category</option>
                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}" {{ old('category_id') == $item->id ? 'selected' : '' }}>
                                {{ $item->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="brand_id" class="block text-sm mb-2 text-gray-400">Brand <span class="text-red-600">*</span></label>
                    <select id="brand_id" name="brand_id"
                        class="py-3 px-4 text-gray-500 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0">
                        <option value="">Select Brand</option>
                        @foreach ($brands as $item)
                            <option value="{{ $item->id }}" {{ old('brand_id') == $item->id ? 'selected' : '' }}>
                                {{ $item->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('brand_id')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="images" class="block text-sm mb-2 text-gray-400">Images <span class="text-red-600">*</span></label>
                    <input type="file" id="images" name="images[]" multiple
                        class="py-3 px-4 text-gray-500 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0">
                    @error('images.*')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="description" class="block text-sm mb-2 text-gray-400">Description <span class="text-red-600">*</span></label>
                    <textarea id="description" name="description"
                        class="py-3 px-4 text-gray-500 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0"
                        placeholder="Product Description">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <button class="btn text-base py-2.5 text-white font-medium w-fit hover:bg-blue-700">Submit</button>
            </form>
        </div>
    </div>
</x-app-layout>
