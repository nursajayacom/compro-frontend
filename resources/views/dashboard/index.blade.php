<x-app-layout>
    @section('title', 'Dashboard')
    <div class="grid grid-cols-1 lg:grid-cols-3 lg:gap-x-6 gap-x-0 lg:gap-y-0 gap-y-6">
        <div class="card">
            <div class="card-body">
                <h4 class="text-gray-500 text-lg font-semibold mb-4">Products</h4>
                <div class="flex items-center justify-between gap-12">
                    <div>
                        <h3 class="text-[30px] font-semibold text-gray-500 mb-4">{{ $productCount }}</h3>
                    </div>
                    <a href="{{ route('products.index') }}" class="flex items-center text-blue-600 hover:text-blue-800 text-sm font-semibold">
                        Detail
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="text-gray-500 text-lg font-semibold mb-4">Category</h4>
                <div class="flex items-center justify-between gap-12">
                    <div>
                        <h3 class="text-[30px] font-semibold text-gray-500 mb-4">{{ $categoryCount }}</h3>
                    </div>
                    <a href="{{ route('categories.index') }}" class="flex items-center text-blue-600 hover:text-blue-800 text-sm font-semibold">
                        Detail
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="text-gray-500 text-lg font-semibold mb-4">Brand</h4>
                <div class="flex items-center justify-between gap-12">
                    <div >
                        <h3 class="text-[30px] font-semibold text-gray-500 mb-4">{{ $brandCount }}</h3>
                    </div>
                    <a href="{{ route('brands.index') }}" class="flex items-center text-blue-600 hover:text-blue-800 text-sm font-semibold">
                        Detail
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
     </div>
</x-app-layout>
