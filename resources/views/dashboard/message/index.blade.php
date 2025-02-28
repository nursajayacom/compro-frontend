<x-app-layout>
    @section('title', 'Message')
    <div class="card">
        <div class="card-body">
            <div class="flex justify-between">
                <h1 class="text-2xl font-bold text-gray-600">List Messages</h1>
            </div>

            @if(session('success'))
                <div class="bg-green-400 border text-sm text-white rounded-md p-4 mt-4" role="alert">
                    <span class="font-bold">Success! </span> {{ session('success') }}
                </div>
            @endif

            <div class="relative overflow-x-auto mt-4">
                <table id="message-table" class="display" style="width:100%">
                    <thead>
                        <tr class="text-gray-600 font-semibold text-sm">
                            <th>Name</th>
                            <th>Email</th>
                            <th>Telp</th>
                            <th>Message</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($messages as $item)
                            <tr class="text-gray-600 text-sm">
                                <td class="">{{ $item->name }}</td>
                                <td class="">{{ $item->email }}</td>
                                <td class="">{{ $item->telp }}</td>
                                <td class="">{{ $item->message }}</td>
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
            new DataTable('#message-table', {
                ordering: false
            });
        });
    </script>
    @endpush
</x-app-layout>
