@extends('layouts.guest')

@section('title', 'Our Service')

@section('content')
<div class="px-6 sm:px-16 py-6 md:py-16 mt-20" data-aos="fade-down">
    <!-- Hero Section -->
    <div class="flex flex-col md:flex-row gap-8 items-start h-full">
        <div class="w-full md:w-2/3">
            <h1 class="text-2xl md:text-5xl font-bold text-primary">
                Layanan Profesional & Produk Unggulan untuk Cetakan Maksimal
            </h1>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-start mt-7">
                <p class="text-secondary">
                    Kami menyediakan berbagai solusi pencetakan yang andal dan efisien untuk memenuhi kebutuhan bisnis dan personal Anda. Dengan berbagai pilihan produk berkualitas tinggi dan layanan profesional, kami memastikan setiap cetakan memiliki hasil yang tajam, jelas, dan tahan lama. Dukungan terbaik dari tim kami siap membantu Anda mendapatkan solusi cetak yang tepat, baik untuk kebutuhan sehari-hari maupun skala besar.
                </p>
                <img src="{{ asset('assets/images/image-our-service-hero.png') }}"
                    alt="Our Service"
                    class="w-full h-full object-cover rounded-lg">
            </div>
        </div>
        <div class="w-full md:w-1/3 h-full">
            <div class="h-full">
                <img src="{{ asset('assets/images/image-our-service-hero-1.png') }}"
                    alt="Our Service"
                    class="w-full h-full object-cover rounded-lg">
            </div>
        </div>
    </div>
</div>


<!-- Keunggulan Layanan Kami -->
<div class="py-6 md:py-16 px-6 sm:px-16 text-center" data-aos="fade-right">
    <h2 class="text-lg md:text-3xl font-bold text-primary">Keunggulan Layanan Kami</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 mt-6 md:mt-16">
        <div class="bg-white hover:bg-[#E74C62] group p-6 rounded-xl border border-[#DEE3ED] flex flex-col justify-between h-80">
            <img src="{{ asset('assets/images/icons/our-service-1.png') }}" alt="Pilihan Produk Lengkap" class="w-[40px]">
            <div class="text-start">
                <span class="block text-lg md:text-2xl font-bold text-primary group-hover:text-white">
                    Pilihan Produk Lengkap
                </span>
                <p class="text-secondary mt-2 group-hover:text-white">
                    Mulai dari printer, tinta, toner, hingga kertas berkualitas, semua tersedia dalam satu tempat.
                </p>
            </div>
        </div>
        <div class="bg-white hover:bg-[#E74C62] group p-6 rounded-xl border border-[#DEE3ED] flex flex-col justify-between h-80">
            <img src="{{ asset('assets/images/icons/our-service-2.png') }}" alt="Layanan Cepat & Responsif" class="w-[40px]">
            <div class="text-start">
                <span class="block text-lg md:text-2xl font-bold text-primary group-hover:text-white">
                    Layanan Cepat & Responsif
                </span>
                <p class="text-secondary mt-2 group-hover:text-white">
                    Tim profesional kami siap membantu Anda dengan solusi cepat.
                </p>
            </div>
        </div>
        <div class="bg-white hover:bg-[#E74C62] group p-6 rounded-xl border border-[#DEE3ED] flex flex-col justify-between h-80">
            <img src="{{ asset('assets/images/icons/our-service-3.png') }}" alt="Pengiriman Aman & Tepat Waktu" class="w-[40px]">
            <div class="text-start">
                <span class="block text-lg md:text-2xl font-bold text-primary group-hover:text-white">
                    Pengiriman Aman & Tepat Waktu
                </span>
                <p class="text-secondary mt-2 group-hover:text-white">
                    Pesanan dikemas dengan perlindungan terbaik.
                </p>
            </div>
        </div>
        <div class="bg-white hover:bg-[#E74C62] group p-6 rounded-xl border border-[#DEE3ED] flex flex-col justify-between h-80">
            <img src="{{ asset('assets/images/icons/our-service-4.png') }}" alt="Harga Kompetitif" class="w-[40px]">
            <div class="text-start">
                <span class="block text-lg md:text-2xl font-bold text-primary group-hover:text-white">
                    Harga Kompetitif
                </span>
                <p class="text-secondary mt-2 group-hover:text-white">
                    Dapatkan produk berkualitas dengan harga terbaik.
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Temukan Produk Cetak Terbaik -->
<div class="py-6 md:py-16 px-6 sm:px-16 flex flex-col md:flex-row gap-10 overflow-hidden">
    <div class="w-full md:w-[35%] space-y-4" data-aos="fade-right">
        <h2 class="text-lg md:text-3xl font-bold text-gray-900">Temukan Produk Cetak Terbaik untuk Kebutuhan Anda</h2>
        <p class="text-sm md:text-base text-primary">Dari printer hingga kertas berkualitas tinggi, kami menyediakan solusi lengkap untuk mencetak lebih mudah dan efisien.</p>
    </div>
    <div class="w-full md:w-[65%] flex flex-col gap-5" data-aos="fade-left">
        <div class="flex flex-col md:flex-row gap-9">
            <img src="{{ asset('assets/images/our-service-printer.png') }}" alt="w-full h-full object-cover rounded-lg">
            <div>
                <h3 class="font-bold text-lg text-primary">Printer</h3>
                <p class="text-secondary mt-4">Beragam pilihan printer untuk kebutuhan cetak profesional maupun rumahan. Dari printer inkjet hingga laser, semua tersedia untuk mendukung produktivitas Anda.</p>
            </div>
        </div>
        <div class="flex flex-col md:flex-row gap-9">
            <img src="{{ asset('assets/images/our-service-tinta.png') }}" alt="w-full h-full object-cover rounded-lg">
            <div>
                <h3 class="font-bold text-lg text-primary">Toner & Tinta</h3>
                <p class="text-secondary mt-4">Produk berkualitas tinggi untuk hasil cetak yang tajam, jelas, dan tahan lama. Cocok untuk berbagai jenis printer dan kebutuhan cetak skala kecil hingga besar.</p>
            </div>
        </div>
        <div class="flex flex-col md:flex-row gap-9">
            <img src="{{ asset('assets/images/our-service-kertas.png') }}" alt="w-full h-full object-cover rounded-lg">
            <div>
                <h3 class="font-bold text-lg text-primary">Kertas Foto & Termal</h3>
                <p class="text-secondary mt-4">Berbagai jenis kertas foto dan termal untuk hasil cetak berkualitas tinggi. Ideal untuk mencetak gambar, struk transaksi, hingga dokumen penting.</p>
            </div>
        </div>
    </div>
</div>

@endsection
