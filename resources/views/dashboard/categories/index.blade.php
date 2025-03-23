<x-app-layout>
    @section('title', 'Categories')
    <div class="card">
        <div class="card-body">
            <div class="flex justify-between">
                <h1 class="text-2xl font-bold text-gray-600">List Categories</h1>
                <button
                    x-data
                    x-on:click.prevent="$dispatch('open-modal', 'categoryModal')"
                    class="p-2 btn rounded-md text-sm font-medium border border-transparent bg-blue-600 text-white hover:bg-blue-700"
                >
                    Add Category
                </button>
            </div>
            @if(session('success'))
                <div class="bg-green-400 border text-sm text-white rounded-md p-4 mt-4" role="alert">
                    <span class="font-bold">Success! </span> {{ session('success') }}
                </div>
            @endif
            <div class="relative overflow-x-auto mt-4">
                <!-- table -->
                <table id="category-table" class="display" style="width:100%">
                    <thead>
                        <tr class="text-gray-600 font-semibold text-sm">
                            <th>Name</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $key => $category)
                            <tr class="text-gray-600 text-sm">
                                <td class="">{{ $category->name }}</td>
                                <td>
                                    @if ($category->image)
                                        <img src="{{ asset('storage/' . $category->image) }}"
                                            alt="{{ $category->name }}"
                                            class="w-20 h-20 object-cover rounded">
                                    @else
                                        <p class="text-gray-400">No image available</p>
                                    @endif
                                </td>
                                <td class="flex gap-2">
                                    <button onclick="openEditModal({{ $category->id }})"
                                        class="btn rounded-md p-1 text-xs font-medium border border-transparent bg-yellow-500 text-white hover:bg-yellow-600">
                                        Edit
                                    </button>
                                    <button onclick="openDeleteModal({{ $category->id }})"
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

    <x-modal name="categoryModal">
        <div class="p-6">
            <h2 class="text-lg font-semibold text-gray-700">Add New Category</h2>

            <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mt-4">
                    <label for="name" class="block text-sm text-gray-600 mb-2">Category Name</label>
                    <input type="text" name="name" id="name"
                        class="py-3 px-4 text-gray-500 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0">
                </div>

                <div class="mt-4">
                    <label for="name" class="block text-sm text-gray-600 mb-2">Image</label>
                    <input type="file" name="image" id="image">
                </div>

                <div class="mt-6 flex justify-end">
                    <button type="button" @click="$dispatch('close-modal', 'categoryModal')"
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

    <x-modal name="editCategoryModal">
        <div class="p-6">
            <h2 class="text-lg font-semibold text-gray-700">Edit Category</h2>

            <form id="editCategoryForm" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" id="editCategoryId">
                <div class="mt-4">
                    <label for="editCategoryName" class="block text-sm text-gray-600 mb-2">Category Name</label>
                    <input type="text" name="name" id="editCategoryName"
                        class="py-3 px-4 text-gray-500 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0">
                </div>

                <div class="mt-4">
                    <label class="block text-sm text-gray-600 mb-2">Current Image</label>
                    <img id="currentImagePreview" src="" alt="No image" class="w-32 h-32 object-cover rounded mb-2 hidden">
                </div>

                <div class="mt-4">
                    <label for="image" class="block text-sm text-gray-600 mb-2">Upload New Image</label>
                    <input type="file" name="image" id="editImage" accept="image/*" class="w-full text-sm">
                    <p class="text-xs text-gray-400 mt-1">Leave empty if you don't want to change the image.</p>
                </div>

                <div class="mt-6 flex justify-end">
                    <button type="button" @click="$dispatch('close-modal', 'editCategoryModal')"
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

    <x-modal name="deleteCategoryModal">
        <div class="p-6">
            <h2 class="text-lg font-semibold text-gray-700">Delete Category</h2>
            <p class="text-sm text-gray-600">Are you sure you want to delete this category?</p>

            <form id="deleteCategoryForm" method="POST">
                @csrf
                @method('DELETE')
                <input type="hidden" id="deleteCategoryId">

                <div class="mt-6 flex justify-end">
                    <button type="button" @click="$dispatch('close-modal', 'deleteCategoryModal')"
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
            new DataTable('#category-table', {
                ordering: false
            });
        });

        function openEditModal(id) {
            fetch(`/04c14af7709150a20c8c327a9e2628f43fe039be/categories/${id}/edit`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('editCategoryId').value = id;
                    document.getElementById('editCategoryName').value = data.name;
                    document.getElementById('editCategoryForm').action = `/04c14af7709150a20c8c327a9e2628f43fe039be/categories/${id}`;

                    const imagePreview = document.getElementById('currentImagePreview');
                    if (data.image) {
                        imagePreview.src = data.image;
                        imagePreview.classList.remove('hidden');
                    } else {
                        imagePreview.classList.add('hidden');
                    }

                    window.dispatchEvent(new CustomEvent('open-modal', { detail: 'editCategoryModal' }));
                });
        }

        function openDeleteModal(id) {
            document.getElementById('deleteCategoryId').value = id;
            document.getElementById('deleteCategoryForm').action = `/04c14af7709150a20c8c327a9e2628f43fe039be/categories/${id}`;
            window.dispatchEvent(new CustomEvent('open-modal', { detail: 'deleteCategoryModal' }));
        }
    </script>
    @endpush
</x-app-layout>
