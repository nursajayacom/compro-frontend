<x-app-layout>
    @section('title','Products')
    <div class="card">
        <div class="card-body">
            <div class="flex justify-between">
                <h1 class="text-2xl font-bold text-gray-600">List Products</h1>
                <a href="{{ route('products.create') }}" class="p-2 btn rounded-md text-sm font-medium border border-transparent bg-blue-600 text-white hover:bg-blue-700">
                    Add Product
                </a>
            </div>
            @if(session('success'))
            <div class="bg-green-400 border text-sm text-white rounded-md p-4 mt-4" role="alert">
                <span class="font-bold">Success! </span> {{ session('success') }}
            </div>
            @endif
            <div class="relative overflow-x-auto mt-4">
                <!-- table -->
                <table id="product-table" class="display" style="width:100%">
                    <thead>
                        <tr class="text-gray-600 font-semibold text-sm">
                            <th>Name</th>
                            <th>Category</th>
                            <th>Image</th>
                            <th>Stock</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $item)
                            <tr class="text-gray-600 text-sm">
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->category->name }}</td>
                                <td>
                                    @if ($item->images->isNotEmpty())
                                        <img src="{{ asset('storage/' . $item->images->first()->image_path) }}"
                                            alt="{{ $item->name }}"
                                            class="w-20 h-20 object-cover rounded">
                                    @else
                                        <p class="text-gray-400">No image available</p>
                                    @endif
                                </td>
                                <td>{{ $item->stock ?: '-' }}</td>
                                <td>{{ $item->created_at->format('d M, Y') }}</td>
                                <td>
                                    <div class="flex flex-row gap-2">
                                        <a href="{{ route('products.edit', $item->slug) }}" class="btn rounded-md p-1 text-xs font-medium border border-transparent bg-yellow-500 text-white hover:bg-yellow-600">Edit</a>
                                        <a href="{{ route('products.show', $item->slug) }}" class="btn rounded-md p-1 text-xs font-medium border border-transparent bg-blue-300 text-white hover:bg-blue-400">Detail</a>
                                        <button onclick="confirmDelete({{ $item->id }})" class="btn rounded-md p-1 text-xs font-medium border border-transparent bg-red-500 text-white hover:bg-red-600">Delete</button>
                                        <!-- Form delete -->
                                        <form id="delete-form-{{ $item->id }}" action="{{ route('products.destroy', $item->id) }}" method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @push('script')
    <script>
        $(document).ready(function() {
            new DataTable('#product-table', {
                ordering: false
            });
        });

        function confirmDelete(productId) {
            Swal.fire({
                title: 'Hapus Produk?',
                text: "Produk yang dihapus tidak bisa dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + productId).submit();
                }
            })
        }
    </script>
    @endpush
</x-app-layout>
