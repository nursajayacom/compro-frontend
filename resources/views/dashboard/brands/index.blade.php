<x-app-layout>
    @section('title', 'Brands')
    <div class="card">
        <div class="card-body">
            <div class="flex justify-between">
                <h1 class="text-2xl font-bold text-gray-600">List Brands</h1>
                <button
                    x-data
                    x-on:click.prevent="$dispatch('open-modal', 'brandModal')"
                    class="p-2 btn rounded-md text-sm font-medium border border-transparent bg-blue-600 text-white hover:bg-blue-700"
                >
                    Add Brand
                </button>
            </div>

            @if(session('success'))
                <div class="bg-green-400 border text-sm text-white rounded-md p-4 mt-4" role="alert">
                    <span class="font-bold">Success! </span> {{ session('success') }}
                </div>
            @endif

            <div class="relative overflow-x-auto mt-4">
                <table id="brand-table" class="display" style="width:100%">
                    <thead>
                        <tr class="text-gray-600 font-semibold text-sm">
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($brands as $brand)
                            <tr class="text-gray-600 text-sm">
                                <td class="">{{ $brand->name }}</td>
                                <td class="">{{ $brand->slug }}</td>
                                <td class="flex gap-2">
                                    <button onclick="openEditModal({{ $brand->id }})"
                                        class="btn rounded-md p-1 text-xs font-medium border border-transparent bg-yellow-500 text-white hover:bg-yellow-600">
                                        Edit
                                    </button>
                                    <button onclick="openDeleteModal({{ $brand->id }})"
                                        class="btn rounded-md p-1 text-xs font-medium border border-transparent bg-red-500 text-white hover:bg-red-600">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Add Modal -->
    <x-modal name="brandModal">
        <div class="p-6">
            <h2 class="text-lg font-semibold text-gray-700">Add New Brand</h2>
            <form action="{{ route('brands.store') }}" method="POST">
                @csrf
                <div class="mt-4">
                    <label for="name" class="block text-sm text-gray-600 mb-2">Brand Name</label>
                    <input type="text" name="name" id="name"
                        class="py-3 px-4 text-gray-500 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0">
                </div>
                <div class="mt-6 flex justify-end">
                    <button type="button" @click="$dispatch('close-modal', 'brandModal')"
                        class="px-4 py-2 text-gray-600 bg-gray-200 rounded mr-2">
                        Cancel
                    </button>
                    <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </x-modal>

    <!-- Edit Modal -->
    <x-modal name="editBrandModal">
        <div class="p-6">
            <h2 class="text-lg font-semibold text-gray-700">Edit Brand</h2>
            <form id="editBrandForm" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" id="editBrandId">
                <div class="mt-4">
                    <label for="editBrandName" class="block text-sm text-gray-600 mb-2">Brand Name</label>
                    <input type="text" name="name" id="editBrandName"
                        class="py-3 px-4 text-gray-500 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0">
                </div>
                <div class="mt-6 flex justify-end">
                    <button type="button" @click="$dispatch('close-modal', 'editBrandModal')"
                        class="px-4 py-2 text-gray-600 bg-gray-200 rounded mr-2">
                        Cancel
                    </button>
                    <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </x-modal>

    <!-- Delete Modal -->
    <x-modal name="deleteBrandModal">
        <div class="p-6">
            <h2 class="text-lg font-semibold text-gray-700">Delete Brand</h2>
            <p class="text-sm text-gray-600">Are you sure you want to delete this brand?</p>
            <form id="deleteBrandForm" method="POST">
                @csrf
                @method('DELETE')
                <input type="hidden" id="deleteBrandId">
                <div class="mt-6 flex justify-end">
                    <button type="button" @click="$dispatch('close-modal', 'deleteBrandModal')"
                        class="px-4 py-2 text-gray-600 bg-gray-200 rounded mr-2">
                        Cancel
                    </button>
                    <button type="submit" class="px-4 py-2 text-white bg-red-500 rounded">
                        Delete
                    </button>
                </div>
            </form>
        </div>
    </x-modal>

    @push('script')
    <script>
        $(document).ready(function() {
            new DataTable('#brand-table', {
                ordering: false
            });
        });

        function openEditModal(id) {
            fetch(`/04c14af7709150a20c8c327a9e2628f43fe039be/brands/${id}/edit`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('editBrandId').value = id;
                    document.getElementById('editBrandName').value = data.name;
                    document.getElementById('editBrandForm').action = `/04c14af7709150a20c8c327a9e2628f43fe039be/brands/${id}`;
                    window.dispatchEvent(new CustomEvent('open-modal', { detail: 'editBrandModal' }));
                });
        }

        function openDeleteModal(id) {
            document.getElementById('deleteBrandId').value = id;
            document.getElementById('deleteBrandForm').action = `/04c14af7709150a20c8c327a9e2628f43fe039be/brands/${id}`;
            window.dispatchEvent(new CustomEvent('open-modal', { detail: 'deleteBrandModal' }));
        }
    </script>
    @endpush
</x-app-layout>
