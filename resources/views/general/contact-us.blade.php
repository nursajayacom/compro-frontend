@extends('layouts.guest')

@section('title', 'Tentang Kami')

@section('content')
<div class="py-20 px-6 sm:px-16 grid grid-cols-1 md:grid-cols-2 gap-12 mt-10">
    <!-- Contact Info -->
    <div>
        <h3 class="text-3xl font-bold text-primary leading-snug mt-1">
        Kontak Kami untuk <br> Solusi Printer Digital Printing<br />Berkualitas &amp; Layanan Profesional
        </h3>

        <div class="mt-8 space-y-4 text-gray-600">
            <div>
                <p class="text-triary">Alamat</p>
                <p class="font-semibold text-primary text-lg mt-2">
                    Jl. Guntur Pasar Manggis Lantai 1 Blok A Nomor 75
                </p>
            </div>
            <div>
                <p class="text-triary">Alamat Email</p>
                <p class="font-semibold text-primary text-lg mt-2">nursajayavelo@gmail.com</p>
            </div>
            <div>
                <p class="text-triary">No. Telepon</p>
                <ul class="list-disc list-inside font-semibold text-primary text-lg mt-2">
                    <li>0812-4276-7761</li>
                    <li>0822-8507-4882</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Contact Form -->
    <div>
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Berhasil!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif
        <form action="{{ route('general.contact-us.send') }}" method="POST" class="space-y-4">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="name-contact" class="text-secondary">Nama Lengkap</label>
                    <input type="text" id="name-contact" name="name" placeholder="Nama Lengkap" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-[#E74C62] focus:border-[#E74C62] mt-4" required />
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="email-contact" class="text-secondary">Alamat Email</label>
                    <input type="email" id="email-contact" name="email" placeholder="Alamat Email" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-[#E74C62] focus:border-[#E74C62] mt-4" required />
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div>
                <label for="telp-contact" class="text-secondary">Nomor Telepon</label>
                <input type="tel" id="telp-contact" name="telp" placeholder="Nomor Telepon" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-[#E74C62] focus:border-[#E74C62] mt-4" required />
                @error('telp')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="message-contact" class="text-secondary">Pesan</label>
                <textarea id="message-contact" name="message" placeholder="Pesan" rows="4" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-[#E74C62] focus:border-[#E74C62] mt-4" required></textarea>
                @error('message')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="w-max bg-[#E74C62] text-white py-3 px-8 rounded-full">
                Kirim
            </button>
        </form>
    </div>
</div>

  <!-- Map Section -->
<div class="py-20 px-6 sm:px-16">
    <div class="rounded-lg overflow-hidden">
        <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.418837518752!2d106.8374792!3d-6.2083569999999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5001c8745bf%3A0x72b709d51e3f8c86!2sPasar%20Manggis!5e0!3m2!1sid!2sid!4v1740759366460!5m2!1sid!2sid"
        width="100%" height="400" frameborder="0" style="border:0;" allowfullscreen="" loading="lazy">
        </iframe>
    </div>
</div>
@endsection
